<template>
  <v-app>
    <v-app-bar app> This is webbar element :Malik </v-app-bar>

    <!-- Sizes your content based upon application components -->
    <v-main>
      <!-- Provides the application the proper gutter -->
      <v-container fluid>
        <!-- If using vue-router -->
        <router-view></router-view>
      </v-container>
    </v-main>

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
</style>