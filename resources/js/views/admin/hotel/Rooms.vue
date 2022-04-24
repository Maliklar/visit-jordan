<template>
  <div class="rooms-view">
    <h1>Rooms</h1>
    <hr />
    <v-form>
      <v-container>
        Filter
        <v-row>
          <v-col cols="12" md="6">
            <v-autocomplete
              v-model="branch_id"
              :items="branches"
              @change="branchSelected"
              item-text="name"
              item-value="id"
              dense
              filled
              label="Branch"
            ></v-autocomplete>
          </v-col>

          <v-col cols="12" md="6">
            <v-autocomplete
              v-model="category_id"
              :items="categories"
              @change="categorySelected"
              item-text="name"
              item-value="id"
              dense
              filled
              label="Category"
            ></v-autocomplete>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
    <hr />
    <v-data-table
      dense
      :headers="tableHeaders"
      :items="rooms"
      item-key="name"
      class="elevation-1"
    ></v-data-table>
    <v-btn
      @click="addRoom"
      class="add-room-floating-action-button"
      color="success"
      icon="mdi-plus"
      size="x-large"
    ></v-btn>
    <v-btn
      color="success"
      @click="addRoom"
      fab
      dark
      size="x-large"
      fixed
      bottom
      right
    >
      <v-icon>mdi-plus</v-icon>
    </v-btn>
  </div>
</template>

<script>
import RoomCard from "../../../components/hotel_admin/RoomCard.vue";
export default {
  components: {
    RoomCard,
  },
  async created() {
    this.$hotelBranchAdminService.getAll().then((result) => {
      this.branches = result.data;
    });
    this.$hotelRoomAdminService.getAll().then((result) => {
      this.rooms = result.data;
    });
  },
  data: () => ({
    valid: true,
    ht: null,
    isLoading: false,
    rooms: [],
    branch_id: "",
    branches: [],
    category_id: "",
    categories: [],
    count: 0,

    tableHeaders: [
      { text: "Room ID", value: "id" },
      { text: "Branch", value: "branch" },
      { text: "Status", value: "active" },
      { text: "available", value: "available" },
    ],
  }),

  methods: {
    addRoom() {
      this.$router.push({
        path: "/admin/hotel/dashboard/rooms/add",
      });
    },

    branchSelected() {
      console.log(this.branch_id);
      this.$roomCategoryAdminService
        .getSingleBranch(this.branch_id)
        .then((result) => {
          this.categories = [];
          this.categories = result.data;
        });
    },

    categorySelected() {
      this.$hotelRoomAdminService
        .getByCategoryId(this.category_id)
        .then((result) => {
          this.rooms = result.data;
        });
    },
  },
};
</script>


<style>
.rooms-view {
  padding: 10px;
}

.add-room-floating-action-button {
  position: fixed;
  right: 10px;
  bottom: 10px;
}

.rooms-scroll {
  display: flex;
  flex-direction: column;
  gap: 10px;
}
</style>