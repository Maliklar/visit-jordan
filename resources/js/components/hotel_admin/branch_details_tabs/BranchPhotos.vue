<template>
  <div class="branch-photos-view">
    <hr />
    <v-tabs v-model="tab" background-color="primary">
      <v-tab value="interior">Interior</v-tab>
      <v-tab value="building">Building</v-tab>
      <v-tab value="views">Views</v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item class="admin-branch-photos-tab">
        <BranchPhotosEditor :type="'interior'" />
      </v-tab-item>
      <v-tab-item class="admin-branch-photos-tab">
        <BranchPhotosEditor :type="'building'" />
      </v-tab-item>
      <v-tab-item class="admin-branch-photos-tab">
        <BranchPhotosEditor :type="'views'" />
      </v-tab-item>
    </v-tabs-items>
  </div>
</template>

<script>
import BranchPhotosEditor from "../../../components/hotel_admin/BranchPhotosEditor.vue";
import GoBackButton from "../../../components/GoBackButton.vue";
export default {
  components: {
    BranchPhotosEditor,
    GoBackButton,
  },
  data() {
    return {
      tab: "interior",
    };
  },
};
</script>

<style>
.admin-branch-photos-tab {
  padding: 10px;
}
</style>