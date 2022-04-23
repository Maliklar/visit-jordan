<template>
  <v-app>
    <v-app-bar class="app-bar" app>
      <v-app-bar-nav-icon>
        <v-avatar :tile="true">
          <img :src="'images/app.jpg'" />
        </v-avatar>
      </v-app-bar-nav-icon>
      <v-toolbar-title>Visit Jordan</v-toolbar-title>
      <v-toolbar-items>
        <v-btn text>
          <v-icon dark left> mdi-bed </v-icon>
          Stays
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn text>
          <v-icon dark left> mdi-account </v-icon>
          Local Guide
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn text>
          <v-icon dark left> mdi-car </v-icon>
          Car Rentals
        </v-btn>
      </v-toolbar-items>
      <v-spacer></v-spacer>
      <v-toolbar-items>
        <v-btn text> Login </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn text> Sign up </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-icon dark> mdi-translate </v-icon>
      </v-toolbar-items>
    </v-app-bar>

    <!-- Sizes your content based upon application components -->
    <!-- <v-main> -->
    <!-- Provides the application the proper gutter -->
    <!-- <v-container fluid> -->
    <!-- If using vue-router -->
    <router-view></router-view>
    <!-- </v-container> -->
    <!-- </v-main> -->

    <v-footer app> This is My Footer: Malik </v-footer>
  </v-app>
</template>


<script>
// import NavBar from "./components/NavBar.vue";
export default {
  // components: { NavBar },
};
</script>


<style >
/* #app {
  transition: all 0.5s;
  background-image: url(./assets/images/svg/dark_background.svg);
  background-attachment: fixed;
  background-size: cover;
  min-height: 100vh;

  background-repeat: no-repeat;
} */

.app-bar {
  background-color: red;
  color: blue;
}
</style>