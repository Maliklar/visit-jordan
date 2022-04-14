<template>
  <div class="home-page">
    <HomeCarousel />
  </div>
</template>

<script>
import HomeCarousel from "../components/HomeCarousel.vue";
export default {
  components: { HomeCarousel },
};
</script>

<style>
.home-page {
  position: absolute;
  top: 0;
  width: 100%;
}
</style>