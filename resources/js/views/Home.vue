<template>
  <div class="home-page">
    <div>
      <HomeCarousel />
    </div>
    <div style="padding: 10px">
      <h1>Hotels</h1>
      <hr />
    </div>
  </div>
</template>

<script>
import HomeCarousel from "../components/HomeCarousel.vue";
export default {
  components: { HomeCarousel },
};
</script>

<style>
.cards-container {
  display: flex;
  overflow-x: scroll;
  gap: 10px;
}
</style>