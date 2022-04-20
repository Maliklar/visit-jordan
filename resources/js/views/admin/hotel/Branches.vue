<template>
  <div class="branches-view">
    <h1>Branches</h1>
    <hr />

    <div class="admin-branches-container">
      <div v-if="branches == null">
        <img width="100" src="../../../assets/images/no_results_found.png" />
      </div>
      <div v-else v-for="branch in branches" :key="branch">
        <v-hover v-slot="{ isHovering, props }" open-delay="200">
          <v-card
            class="mx-auto w-100"
            :elevation="isHovering ? 16 : 2"
            :class="{ 'on-hover': isHovering }"
            v-bind="props"
          >
            <v-row>
              <v-col cols="7">
                <v-img
                  v-if="branch.building.length > 0"
                  class="align-end text-white"
                  height="200"
                  :src="'http://localhost:8000/' + branch.building[0].image"
                  cover
                >
                  <v-card-title>
                    <v-icon icon="mdi-office-building-outline"></v-icon>
                    {{ branch.name }}</v-card-title
                  >
                  <v-card-title>
                    <v-icon icon="mdi-map-marker"></v-icon>
                    {{ branch.city.name }}</v-card-title
                  >
                </v-img>
                <!-- mdi-office-building-outline -->
                <v-img
                  v-else
                  class="align-end text-white"
                  height="200"
                  src="https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg"
                  cover
                >
                  <v-card-title>
                    <v-icon icon="mdi-office-building-outline"></v-icon>
                    {{ branch.name }}
                  </v-card-title>
                  <v-card-title>
                    <v-icon icon="mdi-map-marker"></v-icon>
                    {{ branch.city.name }}</v-card-title
                  >
                </v-img>

                <v-card-subtitle class="pt-4">
                  {{ branch.updated_at }}
                </v-card-subtitle>

                <v-card-text>
                  <div>{{ branch.location_description }}</div>

                  <div>Swimming Pool * food court * laundry service</div>
                </v-card-text>

                <v-card-actions>
                  <v-btn color="orange"> Details </v-btn>
                  <v-btn color="orange"> Edit </v-btn>
                  <v-btn color="orange" @click="openRoomCategories(branch.id)">
                    Categories
                  </v-btn>
                  <v-btn color="orange"> Rooms </v-btn>
                  <v-btn color="orange" @click="openBranchPhotos(branch.id)">
                    Photos
                  </v-btn>
                </v-card-actions>
                <hr />
                <v-alert type="error"
                  >Inactive: No Photos or rooms were added</v-alert
                >
              </v-col>
              <v-col cols="5">
                <div v-html="branch.map_location"></div>
                <!-- <v-img
                  class="align-end text-white h-100"
                  src="https://s1.cdn.autoevolution.com/images-webp/news/how-google-s-new-killer-google-maps-feature-knows-you-re-braking-hard-162191-7.jpg.webp"
                  cover
                ></v-img> -->
              </v-col>
            </v-row>
          </v-card>
        </v-hover>
        <br />
      </div>
    </div>
    <v-btn
      @click="addBranch"
      class="add-branch-floating-action-button"
      color="success"
      icon="mdi-plus"
      size="x-large"
    ></v-btn>
  </div>
</template>

<script>
export default {
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