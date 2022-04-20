<template>
  <div class="add-branch-view">
    <h1>Add Room Category</h1>
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
      <v-alert type="error">
        Only Numbers can be displayed : It is an internal Vueitry 3 error Looked
        everywhere : github, stackoverflow any everywhere no answer
      </v-alert>
      <v-autocomplete
        v-model="branch_id"
        :items="branches"
        @select="branchSelected"
        item-text="name"
        item-value="id"
        dense
        filled
        label="Branch"
      ></v-autocomplete>

      <v-autocomplete
        v-model="category_id"
        :items="categories"
        item-text="name"
        item-value="id"
        dense
        filled
        label="Category"
      ></v-autocomplete>

      <v-text-field
        v-model="count"
        :counter="25"
        label="Number Of Rooms"
        required
      ></v-text-field>

      <v-btn color="success" class="mr-4" type="submit"> Submit </v-btn>
    </v-form>
  </div>
  <!-- <div v-html="ht"></div> -->
</template>

<script>
export default {
  async created() {
    this.hotelBranchAdminService.getAll().then((result) => {
      for (let i = 0; i < result.data.length; i++) {
        this.branches.push(result.data[i].id);
      }
    });
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

      this.hotelRoomAdminService.add(data).then((result) => {
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
      this.roomCategoryAdminService
        .getSingleBranch(this.branch_id)
        .then((result) => {
          this.categories = [];
          for (let i = 0; i < result.data.length; i++) {
            this.categories.push(result.data[i].id);
          }
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