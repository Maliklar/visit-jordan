<template>
  <div class="add-branch-view">
    <h1>Add Branch</h1>
    <hr />
    <v-form ref="form" v-model="valid" lazy-validation>
      <h6>General Information</h6>
      <v-text-field
        v-model="name"
        :counter="25"
        :rules="nameRules"
        label="Branch Name"
        required
      ></v-text-field>

      <v-text-field
        v-model="name"
        :counter="25"
        :rules="nameRules"
        label="Branch Location (Google Maps)"
        required
      ></v-text-field>
      <v-text-field
        v-model="name"
        :counter="25"
        :rules="nameRules"
        label="Number of Floors"
        required
      ></v-text-field>

      <v-text-field
        v-model="name"
        :counter="25"
        :rules="nameRules"
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
        v-model="number"
        :counter="12"
        :rules="numberRules"
        label="Branch Phone Number"
        required
      ></v-text-field>
      <hr />
      <h6>Rooms Details</h6>
      <div class="row">
        <div class="col">
          <v-select
            v-model="select"
            :items="items"
            :rules="[(v) => !!v || 'Item is required']"
            label="Has Single Rooms"
            required
          ></v-select>
        </div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col">
          <v-select
            v-model="select"
            :items="items"
            :rules="[(v) => !!v || 'Item is required']"
            label="Has Double Rooms"
            required
          ></v-select>
        </div>
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col">
          <v-select
            v-model="select"
            :items="items"
            :rules="[(v) => !!v || 'Item is required']"
            label="Has Trible Rooms"
            required
          ></v-select>
        </div>
        <div class="col"></div>
      </div>

      <div class="row">
        <div class="col">
          <v-select
            v-model="select"
            :items="items"
            :rules="[(v) => !!v || 'Item is required']"
            label="Has Suites"
            required
          ></v-select>
        </div>
        <div class="col"></div>
      </div>

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
      <v-select
        v-model="select"
        :items="items"
        :rules="[(v) => !!v || 'Item is required']"
        label="Smoking Allowed"
        required
      ></v-select>
      <v-select
        v-model="select"
        :items="items"
        :rules="[(v) => !!v || 'Item is required']"
        label="Wi-Fi"
        required
      ></v-select>
      <v-select
        v-model="select"
        :items="items"
        :rules="[(v) => !!v || 'Item is required']"
        label="Pets"
        required
      ></v-select>
      <v-select
        v-model="select"
        :items="items"
        :rules="[(v) => !!v || 'Item is required']"
        label="Swiming pool"
        required
      ></v-select>
      <v-select
        v-model="select"
        :items="items"
        :rules="[(v) => !!v || 'Item is required']"
        label="Boofe"
        required
      ></v-select>

      <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">
        Validate
      </v-btn>

      <v-btn color="error" class="mr-4" @click="reset"> Reset Form </v-btn>

      <v-btn color="warning" @click="resetValidation"> Reset Validation </v-btn>
    </v-form>
  </div>
</template>

<script>
export default {
  data: () => ({
    valid: true,
    name: "",

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
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    },
  },
};
</script>
<style>
.add-branch-view {
  padding: 10px;
}
</style>