<template  >
  <div class="background-temp">
    <NavBar />
    <router-view />
  </div>
</template>
<script>
import NavBar from "./components/NavBar.vue";
export default {
  components: { NavBar },
};
</script>


<style >
#app {
  transition: all 0.5s;
  background-image: url(./assets/images/svg/dark_background.svg);
  background-attachment: fixed;
  background-size: cover;
  min-height: 100vh;

  background-repeat: no-repeat;
}
</style>