<template>
  <div class="branches-view">
    <h1>Branches</h1>
    <hr />

    <div class="admin-branches-container">
      <div v-if="branches == null">
        <img width="100" src="../../../assets/images/no_results_found.png" />
      </div>
      <div v-else v-for="branch in branches" :key="branch.id">
        <BranchCard :branch="branch" />

        <br />
      </div>
    </div>
    <v-btn
      color="success"
      @click="addBranch"
      fab
      dark
      size="x-large"
      fixed
      bottom
      right
    >
      <v-icon>mdi-plus</v-icon>
    </v-btn>
  </div>
</template>

<script>
import BranchCard from "../../../components/hotel_admin/BranchCard.vue";
export default {
  components: {
    BranchCard,
  },
  created() {
    this.$hotelBranchAdminService.getAll().then((result) => {
      console.log(result.data);
      if (result.status == 200) {
        if (result.data.length == 0) {
          this.branches = null;
        } else {
          this.branches = result.data;
        }
      }
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

    openBranchPhotos(id) {
      this.$router.push({
        path: "/admin/hotel/dashboard/branches/photos/" + id,
      });
    },

    openRoomCategories(id) {
      this.$router.push({
        path: "/admin/hotel/dashboard/branches/room_categories/" + id,
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
  /* flex-wrap: wrap; */
  flex-direction: column;

  gap: 10px;
}
.add-branch-floating-action-button {
  position: fixed;
  right: 10px;
  bottom: 10px;
}
</style>