<template>
  <div class="hotel-profile-view">
    <h1>Hotel Profile</h1>
    <hr />
    <v-form ref="form" v-model="valid" lazy-validation>
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
            label="File input"
            filled
            prepend-icon="mdi-camera"
          ></v-file-input>
        </div>
        <div class="col">Preview</div>
      </div>

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
.hotel-profile-view {
  padding: 10px;
}
</style>