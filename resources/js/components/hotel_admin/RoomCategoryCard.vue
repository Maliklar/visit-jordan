<template>
  <v-card class="admin-branch-category-card">
    <v-container>
      <v-row>
        <v-col cols="6" md="6">
          <v-img height="200" :src="room_img">
            <v-card-title>
              {{ category.name }}
            </v-card-title>
            <v-card-title> Room </v-card-title>
          </v-img>
        </v-col>
        <v-col cols="6" md="6">
          <v-img height="200" :src="view_img">
            <v-card-title> Views </v-card-title>
          </v-img>
        </v-col>
      </v-row>
      <v-row justify="space-around">
        <v-list-item class="room-category-card-details" two-line>
          <v-list-item-icon>
            <v-icon>mdi-bed-king</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Double Beds</v-list-item-title>
            <v-list-item-subtitle>{{
              category.double_beds
            }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-list-item class="room-category-card-details" two-line>
          <v-list-item-icon>
            <v-icon>mdi-bed-double</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Single Beds</v-list-item-title>
            <v-list-item-subtitle>{{
              category.single_beds
            }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-list-item class="room-category-card-details" two-line>
          <v-list-item-icon>
            <v-icon>mdi-cash</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Price</v-list-item-title>
            <v-list-item-subtitle>{{ category.price }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-list-item class="room-category-card-details" two-line>
          <v-list-item-icon>
            <v-icon>mdi-home-floor-a</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Rooms</v-list-item-title>
            <v-list-item-subtitle>{{ category.rooms }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-list-item class="room-category-card-details" two-line>
          <v-list-item-icon>
            <v-icon>mdi-shower</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Bathrooms</v-list-item-title>
            <v-list-item-subtitle>{{
              category.bathrooms
            }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-list-item class="room-category-card-details" two-line>
          <v-list-item-icon>
            <v-icon>mdi-card-text-outline</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Description</v-list-item-title>
            <v-list-item-subtitle>{{
              category.description
            }}</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-row>

      <v-row>
        <v-container>
          <v-tabs>
            <v-tab @click="openPublicProfile">
              <v-icon dark left> mdi-earth </v-icon> Public Profile</v-tab
            >
            <v-tab @click="openDetails">
              <v-icon dark left> mdi-card-account-details </v-icon>
              Details</v-tab
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
          <CategoryActivationAlert
            :active="category.active"
            :id="category.id"
          />
        </v-container>
      </v-row>
    </v-container>
  </v-card>
</template>
<script>
import CategoryActivationAlert from "./CategoryActivationAlert.vue";

export default {
  components: {
    CategoryActivationAlert,
  },
  props: {
    category: Object,
  },
  data: () => ({
    loading: false,
    selection: 1,
    room_img: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
    view_img: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
  }),

  async created() {
    for (let i = 0; i < this.category.room.length; i++) {
      this.room_img = "http://localhost:8000/" + this.category.room[0].image;
      break;
    }
    for (let i = 0; i < this.category.view.length; i++) {
      this.view_img = "http://localhost:8000/" + this.category.view[0].image;
      break;
    }
  },

  methods: {
    reserve() {
      this.loading = true;

      setTimeout(() => (this.loading = false), 2000);
    },
    openPhotos() {
      this.$router.push({
        path:
          "/admin/hotel/dashboard/room_categories/photos/" + this.category.id,
      });
    },
    openEdit() {
      this.$router.push({
        path: "/admin/hotel/dashboard/room_categories/edit/" + this.category.id,
      });
    },

    openDetails() {},

    openPublicProfile() {},
  },
};
</script>

<style scoped>
.admin-branch-category-card {
  margin: 15px;
}

.room-category-card-details {
  max-width: 200px;
  min-width: 150px;
}
</style>