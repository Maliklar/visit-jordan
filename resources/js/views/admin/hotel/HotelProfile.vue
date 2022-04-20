<template>
  <div class="hotel-profile-view">
    <h1>Hotel Profile {{ actionMessage }}</h1>
    <hr />
    <v-form ref="form" @submit.prevent="submit" lazy-validation>
      <v-text-field
        v-model="name"
        :counter="25"
        :rules="nameRules"
        label="Hotel Name"
        required
      ></v-text-field>

      <v-text-field
        v-model="tagline"
        :counter="100"
        :rules="taglineRules"
        label="Hotel Tagline"
        required
      ></v-text-field>

      <v-text-field
        v-model="website"
        :rules="websiteRules"
        label="Hotel Offical Website"
        required
      ></v-text-field>

      <v-text-field
        v-model="email"
        :rules="emailRules"
        label="Hotel Offical Email"
        required
      ></v-text-field>
      <v-text-field
        v-model="photo"
        :counter="12"
        :rules="photoRules"
        label="Central Phone Number"
        required
      ></v-text-field>

      <div class="row">
        <div class="col">
          <v-file-input
            label="Hotel Logo"
            filled
            @change="uploadLogo"
            prepend-icon="mdi-camera"
            required
          ></v-file-input>
        </div>
        <div class="col">
          <img :src="previewImage" alt="" height="60" />
        </div>
      </div>
      <div>
        <v-alert
          v-if="submitionResult == true"
          class="slide-left"
          type="success"
        >
          Hotel Information Updated Successfully
          <template v-slot:append>
            <v-btn size="small" variant="text" @click="closeAlert">Close</v-btn>
          </template>
        </v-alert>

        <v-alert
          v-else-if="submitionResult == false"
          class="slide-left"
          type="error"
        >
          {{ actionMessage }}
          <template v-slot:append>
            <v-btn size="small" variant="text" @click="closeAlert">Close</v-btn>
          </template></v-alert
        >
      </div>
      <br />

      <v-btn color="success" class="mr-4" type="submit"> Update </v-btn>
    </v-form>
  </div>
</template>

<script>
export default {
  data: () => ({
    name: "",
    actionMessage: null,
    previewImage: null,
    hotelLogo: null,
    submitionResult: null,
    nameRules: [
      (v) => !!v || "Name is required",
      (v) => (v && v.length <= 25) || "Name must be less than 10 characters",
    ],
    email: "",
    emailRules: [
      (v) => !!v || "E-mail is required",
      (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
    ],
    tagline: "",
    taglineRules: [
      (v) => !!v || "Name is required",
      (v) => (v && v.length <= 100) || "Name must be less than 10 characters",
    ],
    website: "",
    websiteRules: [(v) => !!v || "Name is required"],
    photo: "",
    photoRules: [
      (v) => !!v || "Name is required",
      (v) => (v && v.length <= 16) || "Name must be less than 16 characters",
    ],
    ht: null,
  }),

  methods: {
    closeAlert() {
      this.submitionResult = null;
    },
    submit() {
      let data = new FormData();
      data.append("name", this.name);
      data.append("tagline", this.tagline);
      data.append("website", this.website);
      data.append("email", this.email);
      data.append("phone", this.photo);
      data.append("logo", this.hotelLogo);
      this.$hotelAdminService.update(data).then((result) => {
        if (result.status == 422) {
          console.log(result.data);
          this.actionMessage = result.data.message;
          this.submitionResult = false;
        }
        if (result.status == 200) {
          this.submitionResult = true;
        }
        this.ht = result.data;
      });
    },
    uploadLogo(e) {
      this.previewImage = URL.createObjectURL(e.target.files[0]);
      this.hotelLogo = e.target.files[0];
    },
  },

  async created() {
    console.log(this.$appName);

    this.$hotelAdminService.get().then((result) => {
      if (result.status == 404) {
        this.actionMessage = result.data.message;
      }

      if (result.data.name) {
        this.name = result.data.name;
        this.tagline = result.data.tagline;
        this.website = result.data.website;
        this.email = result.data.email;
        this.photo = result.data.phone;
        this.previewImage = "http://localhost:8000/" + result.data.logo;
      }
    });
  },
};
</script>

<style scoped>
.hotel-profile-view {
  padding: 10px;
  /* background-color: black; */
}

.slide-left {
  animation: slide-left 1s;
}
@keyframes slide-left {
  from {
    transform: translateX(-100%);
    opacity: 0;
  }
  to {
    transform: translateX(0%);
    opacity: 1;
  }
}
</style>