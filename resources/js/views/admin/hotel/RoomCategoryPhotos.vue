<template>
  <div class="branch-photos-view">
    <h1>Room Category Photos</h1>
    <hr />
    <v-tabs v-model="tab" background-color="primary">
      <v-tab value="view">View</v-tab>
      <v-tab value="room">Room</v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item class="admin-branch-photos-tab">
        <RoomCategoryPhotoEditor :type="'room'" />
      </v-tab-item>
      <v-tab-item class="admin-branch-photos-tab">
        <RoomCategoryPhotoEditor :type="'view'" />
      </v-tab-item>
    </v-tabs-items>
  </div>
</template>

<script>
import RoomCategoryPhotoEditor from "../../../components/hotel_admin/RoomCategoryPhotoEditor.vue";
export default {
  components: {
    RoomCategoryPhotoEditor,
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