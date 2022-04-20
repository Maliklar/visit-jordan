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

      <v-btn color="success" class="mr-4" type="submit"> Submit </v-btn>
    </v-form>
  </div>
  <!-- <div v-html="ht"></div> -->
</template>

<script>
export default {
  data: () => ({
    valid: true,
    name: "",
    ht: null,
    location_description: null,
    map_location: null,
    phone: null,
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

  methods: {
    submit() {
      this.isLoading = true;
      let data = {
        name: this.name,
        map_location: this.map_location,
        location_description: this.location_description,
        email: this.email,
        phone: this.phone,
      };

      this.carBranchAdminService.add(data).then((result) => {
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
  },
};
</script>
<style>
.add-branch-view {
  padding: 10px;
}
</style>