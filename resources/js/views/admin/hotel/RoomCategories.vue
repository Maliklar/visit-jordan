<template>
  <div class="room-categories-view">
    <h1>Room Categories</h1>
    <hr />

    <RoomCategoryCard
      v-for="category in categoriesArray"
      :key="category"
      :category="category"
    />
  </div>
</template>

<script>
import RoomCategoryCard from "../../../components/hotel_admin/RoomCategoryCard.vue";
export default {
  data() {
    return {
      categoriesArray: [],
    };
  },
  components: { RoomCategoryCard },
  async created() {
    this.roomCategoryAdminService.getAll().then((result) => {
      this.categoriesArray = result.data;
    });
  },
};
</script>

<style>
.room-categories-view {
  padding: 10px;
}
</style>