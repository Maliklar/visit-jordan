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
        <v-window-item value="interior">
          <BranchPhotosEditor :type="'interior'" />
        </v-window-item>

        <v-window-item value="building">
          <BranchPhotosEditor :type="'building'" />
        </v-window-item>

        <v-window-item value="views">
          <BranchPhotosEditor :type="'views'" />
        </v-window-item>
      </v-window>
    </v-card-text>
  </div>
</template>

<script>
import BranchPhotosEditor from "../../../components/hotel_admin/BranchPhotosEditor.vue";
export default {
  components: {
    BranchPhotosEditor,
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