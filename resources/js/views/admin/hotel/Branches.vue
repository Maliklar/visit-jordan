<template>
  <div class="branches-view">
    <h1>Branches</h1>
    <hr />
    <v-card class="mx-auto" max-width="400">
      <v-img
        class="align-end text-white"
        height="200"
        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
        cover
      >
        <v-card-title>Top 10 Australian beaches</v-card-title>
      </v-img>

      <v-card-subtitle class="pt-4"> Number 10 </v-card-subtitle>

      <v-card-text>
        <div>Whitehaven Beach</div>

        <div>Whitsunday Island, Whitsunday Islands</div>
      </v-card-text>

      <v-card-actions>
        <v-btn color="orange"> Share </v-btn>

        <v-btn color="orange"> Explore </v-btn>
      </v-card-actions>
    </v-card>
    <v-divider inset></v-divider>
    <v-card class="mx-auto" max-width="400">
      <v-img
        class="align-end text-white"
        height="200"
        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
        cover
      >
        <v-card-title>Top 10 Australian beaches</v-card-title>
      </v-img>

      <v-card-subtitle class="pt-4"> Number 10 </v-card-subtitle>

      <v-card-text>
        <div>Whitehaven Beach</div>

        <div>Whitsunday Island, Whitsunday Islands</div>
      </v-card-text>

      <v-card-actions>
        <v-btn color="orange"> Share </v-btn>

        <v-btn color="orange"> Explore </v-btn>
      </v-card-actions>
    </v-card>
  </div>
  <v-btn
    size="x-large"
    class="add-branch-floating-action-button"
    color="success"
    @click="addBranch"
  >
    Add Branch
  </v-btn>
</template>

<script>
export default {
  methods: {
    addBranch() {
      this.$router.push({
        path: "/admin/hotel/dashboard/branches/add",
      });
    },
  },
};
</script>

<style>
.branches-view {
  padding: 10px;
}

.add-branch-floating-action-button {
  position: fixed;
  right: 10px;
  bottom: 10px;
}
</style>