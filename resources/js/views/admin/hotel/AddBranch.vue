<template>
  <v-card
    elevation="18"
    outlined
    class="signup-card"
    :loading="isLoading"
    :disabled="isLoading"
  >
    <v-container>
      <v-card-title> Create Hotel Branch </v-card-title>
      <validation-observer ref="observer" v-slot="{ invalid }">
        <form @submit.prevent="submit">
          <v-card-subtitle> Location Details </v-card-subtitle>

          <validation-provider
            v-slot="{ errors }"
            name="map_location"
            rules="required"
          >
            <v-text-field
              v-model="map_location"
              :error-messages="errors"
              label="Google Maps Location"
              required
            ></v-text-field>
          </validation-provider>

          <validation-provider
            v-slot="{ errors }"
            name="location_description"
            rules="required"
          >
            <v-text-field
              v-model="location_description"
              :error-messages="errors"
              label="Location Description"
              required
            ></v-text-field>
          </validation-provider>

          <validation-provider
            v-slot="{ errors }"
            name="select"
            rules="required"
          >
            <v-select
              v-model="city_id"
              :items="cities"
              item-text="name"
              item-value="id"
              :error-messages="errors"
              label="Select"
              data-vv-name="select"
              required
            ></v-select>
          </validation-provider>

          <v-card-subtitle> Contact Details </v-card-subtitle>
          <validation-provider
            v-slot="{ errors }"
            name="phone"
            rules="required"
          >
            <v-text-field
              v-model="phone"
              :error-messages="errors"
              label="Phone Number"
              required
            ></v-text-field>
          </validation-provider>

          <validation-provider
            v-slot="{ errors }"
            name="email"
            rules="required|email"
          >
            <v-text-field
              v-model="email"
              :error-messages="errors"
              label="Branch Email"
              required
            ></v-text-field>
          </validation-provider>

          <v-btn class="mr-4" type="submit" color="success" :disabled="invalid">
            Create Branch
          </v-btn>
          <v-btn @click="clear"> clear </v-btn>
        </form>
      </validation-observer>
    </v-container>
  </v-card>
</template>
</template>

<script>
import { required, digits, email, max, regex } from "vee-validate/dist/rules";
import {
  extend,
  ValidationObserver,
  ValidationProvider,
  setInteractionMode,
} from "vee-validate";

setInteractionMode("eager");

extend("digits", {
  ...digits,
  message: "{_field_} needs to be {length} digits. ({_value_})",
});

extend("required", {
  ...required,
  message: "{_field_} can not be empty",
});

extend("max", {
  ...max,
  message: "{_field_} may not be greater than {length} characters",
});

extend("regex", {
  ...regex,
  message: "{_field_} {_value_} does not match {regex}",
});

extend("email", {
  ...email,
  message: "Email must be valid",
});

export default {
  async created() {
    this.$cityService.get().then((result) => {
      this.cities = result.data;
    });
  },
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    phone: "",
    location_description: "",
    map_location: "",
    city_id: "",

    cities: [],
    email: "",
    isLoading: false,
    checkbox: null,
  }),

  methods: {
    submit() {
      this.isLoading = true;

      this.$refs.observer.validate();
      let data = {
        email: this.email,
        map_location: this.map_location,
        location_description: this.location_description,
        city_id: this.city_id,
        phone: this.phone,
      };
      this.$hotelBranchAdminService.add(data).then((result) => {
        this.isLoading = false;
        console.log(result.data);
      });
    },
    clear() {
      this.email = "";
      this.$refs.observer.reset();
    },
  },
};
</script>

<style scoped>
.signup-card {
  margin: 20px;
}
</style>