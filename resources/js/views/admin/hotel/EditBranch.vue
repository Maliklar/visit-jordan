<template>
  <div class="add-branch-view">
    <h1>Edit Branch</h1>
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

      <v-alert type="error">
        Only Numbers can be displayed : It is an internal Vueitry 3 error Looked
        everywhere : github, stackoverflow any everywhere no answer
      </v-alert>
      <v-autocomplete
        v-model="city_id"
        :items="cities"
        item-text="name"
        item-value="id"
        dense
        filled
        label="City"
      ></v-autocomplete>

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

      <h6>Feachers</h6>
      <v-checkbox
        v-model="gym"
        hide-details
        label="Gym"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="swimming_pool"
        hide-details
        label="Swimming Pool"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="laundry"
        hide-details
        label="laundry"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="resturant"
        hide-details
        label="Resturant"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-btn color="success" class="mr-4" type="submit"> Submit </v-btn>
    </v-form>
  </div>
  <!-- <div v-html="ht"></div> -->
</template>

<script>
export default {
  async created() {
    this.$cityService.get().then((result) => {
      for (let i = 0; i < result.data.length; i++) {
        this.cities.push(result.data[i].id);
      }
    });

    console.log(this.$route);
    this.$hotelBranchAdminService.get(this.$route.params.id).then((result) => {
      this.name = result.data.name;
      this.phone = result.data.phone;
      this.location_description = result.data.location_description;
      this.map_location = result.data.map_location;
      this.tagline = result.data.tagline;
      this.email = result.data.email;
      this.website = result.data.website;
      this.gym = result.data.gym;
      this.resturant = result.data.resturant;
      this.swimming_pool = result.data.swimming_pool;
      this.laundry = result.data.laundry;
      this.city_id = result.data.city_id;
    });
  },
  data: () => ({
    valid: true,
    ht: null,
    isLoading: false,

    name: "",
    phone: "",
    location_description: "",
    map_location: "",
    tagline: "",
    email: "",
    website: "",
    city_id: 1,

    cities: [],

    //Check boxes
    gym: false,
    resturant: false,
    swimming_pool: false,
    laundry: false,

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
        location_description: this.location_description,
        map_location: this.map_location,
        phone: this.phone,
        email: this.email,
        gym: this.gym,
        swimming_pool: this.swimming_pool,
        resturant: this.resturant,
        laundry: this.laundry,
        city_id: this.city_id,
        branch_id: this.$route.params.id,
      };

      console.log(data);

      this.$hotelBranchAdminService.update(data).then((result) => {
        // console.log(result.data);
        this.ht = result.data;
        console.log(result);
        this.isLoading = false;
      });
    },
    // validate() {
    //   console.log("validate");
    //   this.$refs.form.validate();
    // },
  },
};
</script>
<style>
.add-branch-view {
  padding: 10px;
}
</style>