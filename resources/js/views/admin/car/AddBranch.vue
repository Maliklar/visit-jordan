<template>
  <div class="add-branch-view">
    <h1>Add Branch</h1>
    <hr />

    <div v-if="isLoading" class="text-center">
      <v-progress-circular :size="100" :width="7" color="purple" indeterminate>
        Loading...</v-progress-circular
      >
    </div>
    <v-form
      v-else
      ref="form"
      @submit.prevent="submit"
      v-model="valid"
      @input="validate"
      lazy-validation
    >
      <h6>General Information</h6>
      <v-text-field
        v-model="name"
        :counter="25"
        :rules="nameRules"
        label="Branch Name"
        required
      ></v-text-field>

      <v-text-field
        v-model="map_location"
        :counter="25"
        :rules="map_locationRules"
        label="Branch Location (Google Maps)"
        required
      ></v-text-field>
      <v-text-field
        v-model="location_description"
        :counter="500"
        :rules="location_descriptionRules"
        label="Location Description"
        required
      ></v-text-field>

      <v-text-field
        v-model="email"
        :rules="emailRules"
        label="Branch  Email"
        required
      ></v-text-field>
      <v-text-field
        v-model="phone"
        :rules="phoneRules"
        :counter="12"
        label="Branch Phone Number"
        required
      ></v-text-field>
      <hr />

      <h6>Cars Details</h6>

      <hr />

      <h6>Branch Galary</h6>
      <v-file-input
        @change="buildingImages"
        label="Branch Photo"
        filled
        accept="image/*"
        required
        prepend-icon="mdi-camera"
      ></v-file-input>

      <hr />

      <v-btn color="success" class="mr-4" type="submit"> Submit </v-btn>
    </v-form>
  </div>
  <div v-html="ht"></div>
</template>

<script>
export default {
  data: () => ({
    valid: true,
    name: "",
    ht: null,
    views_img: null,
    building_img: [],
    rooms_img: null,

    phone: null,
    has_single: false,
    has_double: null,
    has_trible: null,
    has_suite: null,
    number_of_single: 0,
    number_of_double: 0,
    number_of_trible: 0,
    number_of_suites: 0,
    number_of_rooms: 0,
    number_of_floors: 0,
    smoking: null,
    pets: null,
    wi_fi: null,
    ac: null,
    buffet: null,
    launch_included: null,
    swimming_pool: null,
    location_description: null,
    map_location: null,
    tagline: "",
    email: "",
    website: "",
    isLoading: false,

    items: [true, false],

    //Rules
    emailRules: [
      (v) => !!v || "E-mail is required",
      (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
    ],
    nameRules: [(v) => !!v || "Branch name is required"],
    phoneRules: [
      (v) => !!v || "Phone number is required",
      (v) => /^\d[0-9]+$/.test(v) || "Only numbers are allowed",
    ],
    websiteRules: [(v) => !!v || "Website required"],
    number_of_floorsRules: [(v) => !!v || "Number of floors is required"],
    number_of_roomsRules: [(v) => !!v || "Number of rooms is required"],
    map_locationRules: [(v) => !!v || "Google Maps location is required"],
    location_descriptionRules: [
      (v) => !!v || "Location Description is required",
    ],
  }),

  computed: {
    number_of_singleRules() {
      if (this.has_single) {
        return [
          (v) => !!v || "Required",
          (v) => /^\d[0-9]+$/.test(v) || "Only numbers are allowed",
        ];
      } else {
        return [];
      }
    },
    number_of_doubleRules() {
      if (this.has_double) {
        return [
          (v) => !!v || "Required",
          (v) => /^\d[0-9]+$/.test(v) || "Only numbers are allowed",
        ];
      } else {
        return [];
      }
    },
    number_of_tribleRules() {
      if (this.has_trible) {
        return [
          (v) => !!v || "Required",
          (v) => /^\d[0-9]+$/.test(v) || "Only numbers are allowed",
        ];
      } else {
        return [];
      }
    },
    number_of_suitesRules() {
      if (this.has_suite) {
        return [
          (v) => !!v || "Required",
          (v) => /^\d[0-9]+$/.test(v) || "Only numbers are allowed",
        ];
      }
      return [];
    },
  },

  methods: {
    submit() {
      this.isLoading = true;
      let data = new FormData();
      data.append("name", this.name);
      data.append("location_description", this.location_description);
      data.append("map_location", this.map_location);
      data.append("email", this.email);
      data.append("number_of_floors", this.number_of_floors);
      data.append("number_of_rooms", this.number_of_rooms);
      data.append("phone", this.phone);
      data.append("has_single", this.has_single);
      data.append("has_double", this.has_double);
      data.append("has_trible", this.has_trible);
      data.append("has_suite", this.has_suite);
      data.append("number_of_single", this.number_of_single);
      data.append("number_of_double", this.number_of_double);
      data.append("number_of_trible", this.number_of_trible);
      data.append("number_of_suites", this.number_of_suites);
      data.append("smoking", this.smoking);
      data.append("wi_fi", this.wi_fi);
      data.append("pets", this.pets);
      data.append("swimming_pool", this.swimming_pool);
      data.append("buffet", this.buffet);
      data.append("launch_included", this.launch_included);
      data.append("ac", this.ac);

      for (let i = 0; i < this.building_img.length; i++) {
        data.append("building_img[]", this.building_img[i]);
      }
      for (let i = 0; i < this.rooms_img.length; i++) {
        data.append("rooms_img[]", this.rooms_img[i]);
      }

      console.log(this.views_img);
      for (let i = 0; i < this.views_img.length; i++) {
        data.append("views_img[]", this.views_img[i]);
      }

      this.branchService.add(data).then((result) => {
        // console.log(result.data);
        this.ht = result.data;
        console.log(result);
        this.isLoading = false;
      });
    },
    validate() {
      console.log("validate");
      this.$refs.form.validate();
    },

    buildingImages(e) {
      this.building_img = Array.from(e.target.files);
    },
    viewsImages(e) {
      this.views_img = Array.from(e.target.files);
      console.log(e.target.files);
    },
    roomsImages(e) {
      this.rooms_img = Array.from(e.target.files);
    },
  },
};
</script>
<style>
.add-branch-view {
  padding: 10px;
}
</style>