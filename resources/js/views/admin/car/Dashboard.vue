<template>
  <v-card>
    <v-layout>
      <v-navigation-drawer
        v-model="drawer"
        :rail="rail"
        permanent
        @click="rail = false"
      >
        <v-list-item
          prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
          title="John Leider"
        >
          <template v-slot:append>
            <v-btn
              variant="text"
              icon="mdi-chevron-left"
              @click.stop="rail = !rail"
            ></v-btn>
          </template>
        </v-list-item>

        <v-divider></v-divider>

        <v-list density="compact" nav>
          <v-list-item
            prepend-icon="mdi-account"
            title="Compnay Profile"
            value="company_profile"
            @click="companyProfile"
          ></v-list-item>

          <v-list-item
            prepend-icon="mdi-home-city"
            title="Hotel Profile"
            value="hotel_profile"
            @click="hotelProfile"
          ></v-list-item>

          <v-list-item
            prepend-icon="mdi-office-building-outline"
            title="Branches"
            value="branches"
            @click="branches"
          ></v-list-item>

          <v-list-item
            prepend-icon="mdi-account-group-outline"
            title="Reservations"
            value="reservations"
          ></v-list-item>
        </v-list>
      </v-navigation-drawer>
      <v-main class="dashbaord-background" style="min-height: 100vh">
        <router-view />
      </v-main>
    </v-layout>
  </v-card>
</template>
<script>
export default {
  data() {
    return {
      drawer: true,
      items: [
        { title: "Compnay Profile", icon: "mdi-account" },
        { title: "Hotel Profile", icon: "mdi-home-city" },
        { title: "Users", icon: "mdi-account-group-outline" },
      ],
      rail: true,
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
        path: "/admin/car/dashboard/branches",
      });
    },

    companyProfile() {
      this.$router.push({
        path: "/admin/car/dashboard/company_profile",
      });
    },
  },
};
</script>

<style scoped>
</style>