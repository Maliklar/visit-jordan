<template>
  <v-app>
    <v-navigation-drawer
      v-model="drawer"
      :mini-variant.sync="mini"
      permanent
      app
    >
      <v-list-item class="px-2">
        <v-list-item-avatar>
          <v-img src="https://randomuser.me/api/portraits/men/85.jpg"></v-img>
        </v-list-item-avatar>

        <v-list-item-title>Malik Elbadri</v-list-item-title>

        <v-btn icon @click.stop="mini = !mini">
          <v-icon>mdi-chevron-left</v-icon>
        </v-btn>
      </v-list-item>

      <v-divider></v-divider>

      <v-list dense>
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Account</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="hotelProfile" link>
          <v-list-item-icon>
            <v-icon>mdi-home-city</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Hotel Profile</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="branches" link>
          <v-list-item-icon>
            <v-icon>mdi-home-group</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Branches</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="room_categories" link>
          <v-list-item-icon>
            <v-icon>mdi-chart-tree</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Rooms Category</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="rooms" link>
          <v-list-item-icon>
            <v-icon>mdi-chart-tree</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Rooms</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item @click="room_categories" link>
          <v-list-item-icon>
            <v-icon>mdi-bed</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>Rooms Category</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-main>
      <!-- Provides the application the proper gutter -->
      <v-container fluid>
        <!-- If using vue-router -->
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      drawer: true,
      items: [
        { title: "Home", icon: "mdi-home-city" },
        { title: "My Account", icon: "mdi-account" },
        { title: "Users", icon: "mdi-account-group-outline" },
      ],
      mini: true,
    };
  },

  methods: {
    hotelProfile() {
      this.$router.push({
        path: "/admin/hotel/dashboard/hotel_profile",
      });
    },
    branches() {
      this.$router.push({
        path: "/admin/hotel/dashboard/branches",
      });
    },
    room_categories() {
      this.$router.push({
        path: "/admin/hotel/dashboard/room_categories",
      });
    },
    rooms() {
      this.$router.push({
        path: "/admin/hotel/dashboard/rooms",
      });
    },
  },
};
</script>

<style scoped>
</style>