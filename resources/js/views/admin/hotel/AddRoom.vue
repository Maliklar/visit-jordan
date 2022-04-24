<template>
  <div class="add-branch-view">
    <h1>Add Room Category</h1>
    <hr />

    <div v-if="isLoading" class="text-center">
      <v-progress-circular :size="100" :width="7" color="purple" indeterminate>
        Loading...</v-progress-circular
      >
    </div>
    <validation-observer ref="observer" v-else v-slot="{ invalid }">
      <v-form ref="form" @submit.prevent="submit" lazy-validation>
        <h6>General Information</h6>

        <validation-provider v-slot="{ errors }" name="Branch">
          <v-autocomplete
            @change="branchSelected"
            v-model="branch_id"
            :items="branches"
            :error-messages="errors"
            item-text="name"
            item-value="id"
            dense
            filled
            label="Branch"
          ></v-autocomplete>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Room Category"
          rules="required|max:10"
        >
          <v-autocomplete
            v-model="category_id"
            :error-messages="errors"
            :items="categories"
            item-text="name"
            item-value="id"
            dense
            label="Room Category"
          ></v-autocomplete>
        </validation-provider>

        <validation-provider
          v-slot="{ errors }"
          name="Number Of Rooms"
          rules="required|max:10"
        >
          <v-text-field
            v-model="count"
            :error-messages="errors"
            :counter="25"
            label="Number Of Rooms"
            required
          ></v-text-field>
        </validation-provider>

        <v-btn color="success" class="mr-4" :disabled="invalid" type="submit">
          Submit
        </v-btn>
      </v-form>
    </validation-observer>
  </div>
  <!-- <div v-html="ht"></div> -->
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
    this.$hotelBranchAdminService.getAll().then((result) => {
      this.branches = result.data;
    });
  },
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    valid: true,
    ht: null,
    isLoading: false,

    branch_id: "",
    branches: [],
    category_id: "",
    categories: [],
    count: 0,
  }),

  methods: {
    submit() {
      this.isLoading = true;
      let data = {
        branch_id: this.branch_id,
        category_id: this.category_id,
        count: this.count,
      };

      console.log(data);

      this.$hotelRoomAdminService.add(data).then((result) => {
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

    branchSelected() {
      console.log(this.branch_id);
      this.$roomCategoryAdminService
        .getSingleBranch(this.branch_id)
        .then((result) => {
          this.categories = [];
          this.categories = result.data;
        });
    },
  },
};
</script>
<style>
.add-branch-view {
  padding: 10px;
}
</style>