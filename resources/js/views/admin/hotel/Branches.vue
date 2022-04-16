<template>
  <div class="branches-view">
    <h1>Branches</h1>
    <hr />

    <div class="admin-branches-container">
      <div v-for="branch in branches" :key="branch">
        <v-card class="mx-auto" max-width="400">
          <v-img
            class="align-end text-white"
            height="200"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            cover
          >
            <v-card-title>{{ branch.name }}</v-card-title>
          </v-img>

          <v-card-subtitle class="pt-4">
            {{ branch.created_at }}
          </v-card-subtitle>

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
    </div>

    <!-- <v-divider inset></v-divider>
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
    </v-card> -->
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
  created() {
    this.branchService.get().then((result) => {
      console.log(result);
      this.branches = result.data;
    });
  },
  data() {
    return {
      branches: null,
    };
  },
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

.admin-branches-container {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}
.add-branch-floating-action-button {
  position: fixed;
  right: 10px;
  bottom: 10px;
}
</style>