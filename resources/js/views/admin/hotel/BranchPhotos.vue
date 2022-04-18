<template>
  <div class="branch-photos-view">
    <h1>Branch Photos</h1>
    <hr />
    <v-tabs v-model="tab" background-color="primary">
      <v-tab value="interior">Interior</v-tab>
      <v-tab value="building">Building</v-tab>
      <v-tab value="views">Views</v-tab>
    </v-tabs>

    <v-card-text>
      <v-window v-model="tab">
        <v-window-item value="interior"> <InteriorPhotos /> </v-window-item>

        <v-window-item value="building"> Two </v-window-item>

        <v-window-item value="views"> Three </v-window-item>
      </v-window>
    </v-card-text>
  </div>
</template>

<script>
import InteriorPhotos from "../../../components/hotel_admin/InteriorPhotos.vue";
export default {
  components: {
    InteriorPhotos,
  },
  data() {
    return {
      tab: null,
    };
  },
};
</script>

<style>
.branch-photos-view {
  padding: 10px;
}
</style>