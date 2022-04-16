<template>
  <div class="add-branch-view">
    <h1>Add Branch</h1>
    <hr />
    <v-form ref="form" @submit.prevent="submit" v-model="valid" lazy-validation>
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
        label="Branch Location (Google Maps)"
        required
      ></v-text-field>
      <v-text-field
        v-model="location_description"
        :counter="25"
        label="Location Description"
        required
      ></v-text-field>
      <v-text-field
        v-model="number_of_floors"
        :counter="25"
        label="Number of Floors"
        required
      ></v-text-field>

      <v-text-field
        v-model="number_of_rooms"
        :counter="25"
        label="Number Of Rooms"
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
        :counter="12"
        label="Branch Phone Number"
        required
      ></v-text-field>
      <hr />
      <h6>Rooms Details</h6>
      <v-row align="center">
        <v-checkbox
          v-model="has_single"
          hide-details
          label="Has Single Rooms"
          class="shrink mr-2 mt-0"
        ></v-checkbox>
        <v-text-field
          :disabled="!has_single"
          v-model="number_of_single"
          label="Number Of Single Rooms"
        ></v-text-field>
      </v-row>

      <v-row align="center">
        <v-checkbox
          v-model="has_double"
          hide-details
          label="Has Double Rooms"
          class="shrink mr-2 mt-0"
        ></v-checkbox>
        <v-text-field
          :disabled="!has_double"
          v-model="number_of_double"
          label="Number Of Double Rooms"
        ></v-text-field>
      </v-row>

      <v-row align="center">
        <v-checkbox
          v-model="has_trible"
          hide-details
          label="Has Trible Rooms"
          class="shrink mr-2 mt-0"
        ></v-checkbox>
        <v-text-field
          :disabled="!has_trible"
          v-model="number_of_trible"
          label="Number Of Trible Rooms"
        ></v-text-field>
      </v-row>

      <v-row align="center">
        <v-checkbox
          v-model="has_suite"
          hide-details
          label="Has Suites"
          class="shrink mr-2 mt-0"
        ></v-checkbox>
        <v-text-field
          :disabled="!has_suite"
          v-model="number_of_suites"
          label="Number Of Suites"
        ></v-text-field>
      </v-row>

      <hr />
      <h6>Branch Galary</h6>
      <div class="row">
        <div class="col">
          <v-file-input
            label="Hotel Photos"
            filled
            prepend-icon="mdi-camera"
          ></v-file-input>
        </div>
        <div class="col">Preview</div>
      </div>
      <div class="row">
        <div class="col">
          <v-file-input
            label="View Photos"
            filled
            prepend-icon="mdi-camera"
          ></v-file-input>
        </div>
        <div class="col">Preview</div>
      </div>
      <div class="row">
        <div class="col">
          <v-file-input
            label="Rooms Photos"
            filled
            prepend-icon="mdi-camera"
          ></v-file-input>
        </div>
        <div class="col">Preview</div>
      </div>

      <hr />
      <h6>Feachers</h6>
      <v-checkbox
        v-model="smoking"
        hide-details
        label="Smoking"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="swimming_pool"
        hide-details
        label="Swimming Pool"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="wi_fi"
        hide-details
        label="Wi-Fi"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="pets"
        hide-details
        label="Pets"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="buffet"
        hide-details
        label="Buffet"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="launch_included"
        hide-details
        label="Launch Included"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-checkbox
        v-model="ac"
        hide-details
        label="Air Conditions"
        class="shrink mr-2 mt-0"
      ></v-checkbox>
      <v-btn color="success" class="mr-4" type="submit"> Submit </v-btn>
    </v-form>
  </div>
</template>

<script>
export default {
  data: () => ({
    valid: true,
    name: "",

    phone: null,
    has_single: null,
    has_double: null,
    has_trible: null,
    has_suite: null,
    number_of_single: null,
    number_of_double: null,
    number_of_trible: null,
    number_of_suites: null,
    number_of_rooms: null,
    number_of_floors: null,
    smoking: null,
    pets: null,
    wi_fi: null,
    ac: null,
    buffet: null,
    launch_included: null,
    swimming_pool: null,
    location_description: null,
    map_location: null,

    items: [true, false],

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
  }),

  methods: {
    submit() {
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
      console.log("submitted");
    },
  },
};
</script>
<style>
.add-branch-view {
  padding: 10px;
}
</style>