<template>
  <div class="home-page">
    <div>
      <HomeCarousel />
    </div>
    <div style="padding: 10px">
      <v-list-item two-line>
        <v-list-item-content>
          <v-list-item-title> <h2>Explore Jordan</h2></v-list-item-title>
          <v-list-item-subtitle
            >Most popular destinations by turests</v-list-item-subtitle
          >
        </v-list-item-content>
      </v-list-item>
      <SlideGroup />
      <v-list-item two-line>
        <v-list-item-content>
          <v-list-item-title> <h2>Explore Jordan</h2></v-list-item-title>
          <v-list-item-subtitle
            >Most popular destinations by turests</v-list-item-subtitle
          >
        </v-list-item-content>
      </v-list-item>
      <SlideGroup />
      <hr />
    </div>
  </div>
</template>

<script>
import HomeCarousel from "../components/HomeCarousel.vue";
import SlideGroup from "../components/SlideGroup.vue";
// import JordanMap from "../components/JordanMap.vue";
export default {
  components: {
    HomeCarousel,
    SlideGroup,
    // JordanMap,
  },
};
</script>

<style>
.cards-container {
  display: flex;
  overflow-x: scroll;
  gap: 10px;
}
</style>