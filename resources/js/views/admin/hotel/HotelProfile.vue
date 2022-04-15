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
        v-model="number"
        :counter="12"
        :rules="numberRules"
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
    number: "",
    numberRules: [
      (v) => !!v || "Name is required",
      (v) => (v && v.length <= 12) || "Name must be less than 10 characters",
    ],
  }),

  methods: {
    submit() {
      let data = new FormData();
      data.append("name", this.name);
      data.append("tagline", this.tagline);
      data.append("website", this.website);
      data.append("email", this.email);
      data.append("phone", this.number);
      data.append("logo", this.hotelLogo);
      this.hotelAdminService.edit(data).then((result) => {
        console.log(result);
      });
    },
    uploadLogo(e) {
      this.previewImage = URL.createObjectURL(e.target.files[0]);
      this.hotelLogo = e.target.files[0];
    },
  },

  async created() {
    this.hotelAdminService.get().then((result) => {
      if (result.status == 404) {
        this.actionMessage = result.data.message;
      }

      this.name = result.data.name;
      this.tagline = result.data.tagline;
      this.website = result.data.website;
      this.email = result.data.email;
      this.previewImage = result.data.logo;
      this.number = result.data.phone;
      console.log(result.data);
    });
  },
};
</script>

<style>
.hotel-profile-view {
  padding: 10px;
}
</style>