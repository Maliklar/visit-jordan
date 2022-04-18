<template>
  <div class="branches-view">
    <h1>Branches</h1>
    <hr />

    <div class="admin-branches-container">
      <div v-if="branches == null">
        <img width="100" src="../../../assets/images/no_results_found.png" />
      </div>
      <div v-else v-for="branch in branches" :key="branch">
        <v-card class="mx-auto w-100">
          <v-row>
            <v-col cols="7">
              <v-img
                v-if="branch.building.length > 0"
                class="align-end text-white"
                height="200"
                :src="'http://localhost:8000/' + branch.building[0].image"
                cover
              >
                <v-card-title>{{ branch.name }}</v-card-title>
              </v-img>
              <v-img
                v-else
                class="align-end text-white"
                height="200"
                src="https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg"
                cover
              >
                <v-card-title>{{ branch.name }}</v-card-title>
              </v-img>

              <v-card-subtitle class="pt-4"> Date: Number 10 </v-card-subtitle>

              <v-card-text>
                <div>Whitehaven Beach</div>

                <div>Swimming Pool * food court * laundry service</div>
              </v-card-text>

              <v-card-actions>
                <v-btn color="orange"> Details </v-btn>

                <v-btn color="orange"> Edit </v-btn>
                <v-btn color="error"> Inactive </v-btn>
              </v-card-actions>
            </v-col>
            <v-col cols="5">
              <v-img
                class="align-end text-white h-100"
                src="https://s1.cdn.autoevolution.com/images-webp/news/how-google-s-new-killer-google-maps-feature-knows-you-re-braking-hard-162191-7.jpg.webp"
                cover
              ></v-img>
            </v-col>
          </v-row>
        </v-card>
      </div>
    </div>
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
    this.hotelBranchAdminService.getAll().then((result) => {
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

    openBranchDetails(id) {
      this.$router.push({
        path: "/admin/hotel/dashboard/branches/details/" + id,
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