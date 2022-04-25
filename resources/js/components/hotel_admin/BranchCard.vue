<template>
  <v-card class="admin-branch-card">
    <v-row>
      <v-col cols="6" md="6">
        <v-img class="admin-hotel-card-images" :src="building_url">
          <v-card-title>
            <v-icon>mdi-office-building-outline</v-icon>
            {{ branch.name }}
          </v-card-title>
          <v-card-title>
            <v-icon>mdi-map-marker</v-icon>
            {{ branch.city.name }}
          </v-card-title>
          <v-card-title> Building </v-card-title>
        </v-img>
      </v-col>
      <v-col cols="3" md="3">
        <v-img
          style="height: 100%"
          class="admin-hotel-card-images"
          :src="interior_url"
        >
          <v-card-title> Interior </v-card-title>
        </v-img>
      </v-col>
      <v-col cols="3" md="3" sm="0">
        <v-img
          style="height: 100%"
          class="h-100 admin-hotel-card-images"
          :src="view_url"
        >
          <v-card-title> Views </v-card-title>
        </v-img>
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="8">
        <v-row>
          <v-col cols="6">
            <v-list-item two-line>
              <v-list-item-icon>
                <v-icon>mdi-email</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Email Address</v-list-item-title>
                <v-list-item-subtitle>{{ branch.email }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-list-item two-line>
              <v-list-item-icon>
                <v-icon>mdi-phone</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Phone Number</v-list-item-title>
                <v-list-item-subtitle>{{ branch.phone }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
            <v-list-item two-line>
              <v-list-item-icon>
                <v-icon>mdi-bed</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Number Of Rooms</v-list-item-title>
                <v-list-item-subtitle>{{ branch.phone }}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </v-col>
          <v-col cols="6">
            <v-list-item v-if="branch.swimming_pool">
              <v-list-item-icon>
                <v-icon>mdi-pool</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title
                  >Swimming Pool
                  <v-icon color="green"
                    >mdi-check-circle</v-icon
                  ></v-list-item-title
                >
              </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="branch.resturant">
              <v-list-item-icon>
                <v-icon>mdi-food</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title
                  >Resturant
                  <v-icon color="green">mdi-check-circle</v-icon>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="branch.gym">
              <v-list-item-icon>
                <v-icon>mdi-weight-lifter</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title
                  >Hotel Gym
                  <v-icon color="green"
                    >mdi-check-circle</v-icon
                  ></v-list-item-title
                >
              </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="branch.laundry">
              <v-list-item-icon>
                <v-icon>mdi-tumble-dryer</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title
                  >Laundry Service
                  <v-icon color="green"
                    >mdi-check-circle</v-icon
                  ></v-list-item-title
                >
              </v-list-item-content>
            </v-list-item>
          </v-col>
        </v-row>
      </v-col>
      <v-col cols="4">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13535.959527558934!2d35.88251364999999!3d31.988289749999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca0317eda425b%3A0x5bfe932d997924f!2zSmFicmkgUmVzdGF1cmFudCAoQ2VudHJhbCBCcmFuY2gpINmF2LfYudmFINis2KjYsdmKINin2YTZhdix2YPYstmK!5e0!3m2!1sen!2sjo!4v1650447821413!5m2!1sen!2sjo"
          style="border: 0; height: 100%; width: 100%"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </v-col>
    </v-row>
    <hr />
    <v-row>
      <v-container>
        <v-tabs>
          <v-tab @click="openPublicProfile">
            <v-icon dark left> mdi-earth </v-icon> Public Profile</v-tab
          >
          <v-tab @click="openDetails">
            <v-icon dark left> mdi-card-account-details </v-icon> Details</v-tab
          >
          <v-tab @click="openPhotos">
            <v-icon dark left> mdi-image-multiple </v-icon> Photos</v-tab
          >
          <v-tab @click="openEdit">
            <v-icon dark left> mdi-pencil </v-icon> Edit</v-tab
          >

          <v-tab @click="openEdit">
            <v-icon dark left> mdi-book-edit </v-icon> Reservations</v-tab
          >

          <v-tab @click="openEdit">
            <v-icon dark left> mdi-cash </v-icon> Revenue</v-tab
          >
          <v-spacer></v-spacer>
        </v-tabs>
      </v-container>
    </v-row>
    <v-row>
      <v-container>
        <BranchActivationAlert :active="branch.active" :id="branch.id" />
      </v-container>
    </v-row>
  </v-card>
</template>

<script>
import BranchActivationAlert from "./BranchActivationAlert.vue";
export default {
  name: "BranchCard",
  components: {
    BranchActivationAlert,
  },
  async created() {
    console.log('brancho",', this.branch);
    if (this.branch.interior.length > 0) {
      this.interior_url =
        "http://localhost:8000/" + this.branch.interior[0].image;
    }
    if (this.branch.building.length > 0) {
      this.building_url =
        "http://localhost:8000/" + this.branch.building[0].image;
    }
    if (this.branch.views.length > 0) {
      this.view_url = "http://localhost:8000/" + this.branch.views[0].image;
    }
  },
  props: {
    branch: Object,
  },

  data() {
    return {
      interior_url: "https://picsum.photos/510/300?random",
      building_url: "https://picsum.photos/510/300?random",
      view_url: "https://picsum.photos/510/300?random",
    };
  },
  methods: {
    openPublicProfile() {},
    openDetails() {
      this.$router.push({
        path: "/admin/hotel/dashboard/branches/details/" + this.branch.id,
      });
    },
    openPhotos() {
      this.$router.push({
        path: "/admin/hotel/dashboard/branches/photos/" + this.branch.id,
      });
    },
    openEdit() {
      this.$router.push({
        path: "/admin/hotel/dashboard/branches/edit/" + this.branch.id,
      });
    },
  },
};
</script>

<style>
.map {
  width: 100%;
}

.admin-branch-card {
  padding: 10px;
  margin: 10px;
}
.admin-hotel-card-images {
  cursor: pointer;
}
</style>