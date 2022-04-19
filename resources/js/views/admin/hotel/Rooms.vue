<template>
  <div class="rooms-view">
    <h1>Rooms</h1>
    <hr />
    <v-form>
      <v-container>
        filters
        <v-row>
          <v-col cols="12" md="6">
            <v-autocomplete
              v-model="branch_id"
              :items="branches"
              @select="branchSelected"
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
              @select="categorySelected"
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
    <RoomCard v-for="room in rooms" :key="room" :room="room" />
  </div>
</template>

<script>
import RoomCard from "../../../components/hotel_admin/RoomCard.vue";
export default {
  components: {
    RoomCard,
  },
  async created() {
    this.hotelBranchAdminService.getAll().then((result) => {
      for (let i = 0; i < result.data.length; i++) {
        this.branches.push(result.data[i].id);
      }
    });
    this.hotelRoomAdminService.getAll().then((result) => {
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
  }),

  methods: {
    submit() {
      this.isLoading = true;
      let data = {
        branch_id: this.branch_id,
        category_id: this.category_id,
        count: this.count,
      };

      console.log(data);

      this.hotelRoomAdminService.add(data).then((result) => {
        // console.log(result.data);
        this.ht = result.data;
        console.log(result);
        this.isLoading = false;
      });
    },
    validate() {
      console.log("validate");
      this.$refs.form.validate();
    },

    branchSelected() {
      console.log(this.branch_id);
      this.roomCategoryAdminService
        .getSingleBranch(this.branch_id)
        .then((result) => {
          this.categories = [];
          for (let i = 0; i < result.data.length; i++) {
            this.categories.push(result.data[i].id);
          }
        });
    },

    categorySelected() {
      this.hotelRoomAdminService
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
</style>