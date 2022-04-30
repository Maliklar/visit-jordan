<template>
  <v-card
    elevation="18"
    outlined
    class="signup-card"
    :loading="isLoading"
    :disabled="isLoading"
  >
    <v-container>
      <v-card-title> Signup as Hotel </v-card-title>
      <validation-observer ref="observer" v-slot="{ invalid }">
        <form @submit.prevent="submit">
          <validation-provider
            v-slot="{ errors }"
            name="Name"
            rules="required|max:10"
          >
            <v-text-field
              v-model="name"
              :counter="25"
              :error-messages="errors"
              label="Full Name"
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
              label="E-mail"
              required
            ></v-text-field>
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            name="password"
            rules="required"
          >
            <v-text-field
              v-model="password"
              :error-messages="errors"
              label="Password"
              required
            ></v-text-field>
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            rules="required"
            name="checkbox"
          >
            <v-checkbox
              v-model="checkbox"
              :error-messages="errors"
              value="1"
              label="Option"
              type="checkbox"
              required
            ></v-checkbox>
          </validation-provider>

          <v-btn class="mr-4" type="submit" color="success" :disabled="invalid">
            Signup
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
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    password: "",
    name: "",
    email: "",
    isLoading: false,
    checkbox: null,
  }),

  methods: {
    submit() {
      this.isLoading = true;

      this.$refs.observer.validate();
      let data = {
        name: this.name,
        password: this.password,
        email: this.email,
      };
      this.$hotelAdminService.register(data).then((result) => {
        this.isLoading = false;
        console.log(result.data);
      });
    },
    clear() {
      this.name = "";
      this.password = "";
      this.email = "";
      this.checkbox = null;
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