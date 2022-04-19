<template>
  <div class="branch-photos-view">
    <h1>Room Category Photos</h1>
    <hr />
    <v-tabs v-model="tab" background-color="primary">
      <v-tab value="view">View</v-tab>
      <v-tab value="room">Room</v-tab>
    </v-tabs>

    <v-card-text>
      <v-window v-model="tab">
        <v-window-item value="view">
          <RoomCategoryPhotoEditor :type="'view'" />
        </v-window-item>

        <v-window-item value="room">
          <RoomCategoryPhotoEditor :type="'room'" />
        </v-window-item>
      </v-window>
    </v-card-text>
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