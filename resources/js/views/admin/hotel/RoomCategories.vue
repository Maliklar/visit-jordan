<template>
  <div class="room-categories-view">
    <h1>Room Categories</h1>
    <hr />

    <RoomCategoryCard
      v-for="category in categoriesArray"
      :key="category.id"
      :category="category"
    />
    <v-btn
      @click="addCategory"
      class="add-category-floating-action-button"
      color="success"
      size="x-large"
      >Add Category</v-btn
    >
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
    this.$roomCategoryAdminService.get().then((result) => {
      this.categoriesArray = result.data;
    });
  },
  methods: {
    addCategory() {
      this.$router.push({
        path: "/admin/hotel/dashboard/room_categories/add",
      });
    },
  },
};
</script>

<style>
.room-categories-view {
  padding: 10px;
}

.add-category-floating-action-button {
  position: fixed;
  z-index: 10;
  right: 10px;
  bottom: 10px;
}
</style>