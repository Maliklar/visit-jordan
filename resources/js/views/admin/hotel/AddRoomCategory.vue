<template>
  <div class="add-branch-view">
    <h1>Add Room Category</h1>
    <hr />

    <div v-if="isLoading" class="text-center">
      <v-progress-circular :size="100" :width="7" color="purple" indeterminate>
        Loading...</v-progress-circular
      >
    </div>
    <validation-observer v-else ref="observer" v-slot="{ invalid }">
      <v-form
        ref="form"
        @submit.prevent="submit"
        v-model="valid"
        @input="validate"
        lazy-validation
      >
        <h6>General Information</h6>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-autocomplete
            v-model="branch_id"
            :items="branches"
            item-text="name"
            item-value="id"
            :error-messages="errors"
            dense
            filled
            label="Branch"
          ></v-autocomplete>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-text-field
            v-model="name"
            :error-messages="errors"
            :counter="25"
            label="Category Name (e.g. Single Room)"
            required
          ></v-text-field>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-text-field
            v-model="description"
            label="Description (e.g. single room with a greate view...)"
            :error-messages="errors"
            required
          ></v-text-field>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-text-field
            v-model="price"
            :error-messages="errors"
            label="Price (USD)"
            required
          ></v-text-field>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-text-field
            v-model="rooms"
            :error-messages="errors"
            label="Number Of Rooms"
            required
          ></v-text-field>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-text-field
            v-model="bathrooms"
            label="Number Of Bathrooms"
            :error-messages="errors"
            required
          ></v-text-field>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-text-field
            :error-messages="errors"
            v-model="capacity"
            label="Capacity (Number of people allowed)"
            required
          ></v-text-field>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-text-field
            v-model="single_beds"
            label="Single Beds (Number of single beds)"
            :error-messages="errors"
            type="number"
            required
          ></v-text-field>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Name"
          rules="required|max:10"
        >
          <v-text-field
            v-model="double_beds"
            label="Double Beds (Number of Double Beds)"
            :error-messages="errors"
            type="number"
            required
          ></v-text-field>
        </validation-provider>
        <hr />

        <h6>Feachers</h6>
        <v-checkbox
          v-model="wifi"
          hide-details
          label="Wi-Fi"
          class="shrink mr-2 mt-0"
        ></v-checkbox>
        <v-checkbox
          v-model="balcony"
          hide-details
          label="Balcony"
          class="shrink mr-2 mt-0"
        ></v-checkbox>
        <v-checkbox
          v-model="tv"
          hide-details
          label="TV"
          class="shrink mr-2 mt-0"
        ></v-checkbox>
        <v-checkbox
          v-model="ac"
          hide-details
          label="Air Condition"
          class="shrink mr-2 mt-0"
        ></v-checkbox>

        <v-checkbox
          v-model="lunch"
          hide-details
          label="Is Lunch Included"
          class="shrink mr-2 mt-0"
        ></v-checkbox>
        <v-btn color="success" :disabled="invalid" class="mr-4" type="submit">
          Submit
        </v-btn>
      </v-form>
    </validation-observer>
  </div>
  <!-- <div v-html="ht"></div> -->
</template>

<script>
import {
  extend,
  ValidationObserver,
  ValidationProvider,
  setInteractionMode,
} from "vee-validate";
import { required, digits, email, max, regex } from "vee-validate/dist/rules";
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
  async created() {
    this.$hotelBranchAdminService.getAll().then((result) => {
      for (let i = 0; i < result.data.length; i++) {
        this.branches = result.data;
      }
    });
  },
  data: () => ({
    valid: true,
    ht: null,
    isLoading: false,

    branch_id: "",
    branches: [],
    name: "",
    description: "",
    price: "",
    capacity: "",
    single_beds: "",
    double_beds: "",
    rooms: "",
    bathrooms: 1,

    //Check boxes
    tv: false,
    balcony: false,
    lunch: false,
    wifi: false,
    ac: false,
  }),

  methods: {
    submit() {
      this.$refs.observer.validate();

      this.isLoading = true;
      let data = {
        name: this.name,
        branch_id: this.branch_id,
        description: this.description,
        price: this.price,
        rooms: this.rooms,
        bathrooms: this.bathrooms,
        single_beds: this.single_beds,
        double_beds: this.double_beds,
        capacity: this.capacity,
        wifi: this.wifi,
        balcony: this.balcony,
        lunch: this.lunch,
        tv: this.tv,
      };

      console.log(data);

      this.$roomCategoryAdminService.add(data).then((result) => {
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