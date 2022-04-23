<template>
  <div v-if="isLoading" class="text-center">
    <v-progress-circular :size="100" :width="7" color="purple" indeterminate>
      Loading...</v-progress-circular
    >
  </div>
  <div v-else class="branch-details-view">
    <h1>
      <GoBackButton />
      Branch Details
    </h1>
    <br />
    <h3>General Information</h3>
    <hr />
    <br />
    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Branch ID</v-list-item-title>
        <v-list-item-subtitle>{{ branch.id }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Branch Name</v-list-item-title>
        <v-list-item-subtitle>{{ branch.name }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Branch Location Description</v-list-item-title>
        <v-list-item-subtitle>{{
          branch.location_description
        }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Map Location</v-list-item-title>
        <v-list-item-subtitle>{{ branch.map_location }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>City</v-list-item-title>
        <v-list-item-subtitle>{{ branch.city.name }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>
    <br />
    <h3>Contact Information</h3>
    <hr />

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Phone Number</v-list-item-title>
        <v-list-item-subtitle>{{ branch.phone }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Email</v-list-item-title>
        <v-list-item-subtitle>{{ branch.email }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>
    <br />
    <h3>Feature Information</h3>
    <hr />

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Swimming Pool</v-list-item-title>
        <v-list-item-subtitle>{{
          interruptTrueFalse(branch.swimming_pool)
        }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Resturant</v-list-item-title>
        <v-list-item-subtitle>{{
          interruptTrueFalse(branch.resturant)
        }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Gym</v-list-item-title>
        <v-list-item-subtitle>{{
          interruptTrueFalse(branch.gym)
        }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>

    <v-list-item>
      <v-list-item-action></v-list-item-action>
      <v-list-item-content>
        <v-list-item-title>Laundry Services</v-list-item-title>
        <v-list-item-subtitle>{{
          interruptTrueFalse(branch.laundry)
        }}</v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
    <v-divider inset></v-divider>
    <br />
    <h1>Photos</h1>
    <br />
    <h3>Interior</h3>
    <hr />
    <br />
    <v-container fluid>
      <v-row align="center" justify="space-around">
        <v-img
          v-for="image in branch.interior"
          :key="image.id"
          lazy-src="https://picsum.photos/id/11/10/6"
          height="250"
          width="300"
          :src="'http://localhost:8000/' + image.image"
        ></v-img>
      </v-row>
    </v-container>
    <h3>Building</h3>
    <hr />
    <br />
    <v-container fluid>
      <v-row align="center" justify="space-around">
        <v-img
          v-for="image in branch.building"
          :key="image.id"
          lazy-src="https://picsum.photos/id/11/10/6"
          height="250"
          width="300"
          :src="'http://localhost:8000/' + image.image"
        ></v-img>
      </v-row>
    </v-container>
    <h3>Views</h3>
    <hr />
    <br />
    <v-container fluid>
      <v-row align="center" justify="space-around">
        <v-img
          v-for="image in branch.views"
          :key="image.id"
          lazy-src="https://picsum.photos/id/11/10/6"
          height="250"
          width="300"
          :src="'http://localhost:8000/' + image.image"
        ></v-img>
      </v-row>
    </v-container>

    <br />
    <h1>Rooms</h1>
    <v-data-table
      :headers="roomsHeaders"
      :items="roomsData"
      :items-per-page="5"
      class="elevation-1"
    ></v-data-table>
    <br />
    <h1>Rooms Types</h1>
    <v-data-table
      :headers="categoryHeaders"
      :items="roomCategoryData"
      :items-per-page="5"
      class="elevation-1"
    ></v-data-table>
    <br />

    <h1>Add Features about payments and revenu</h1>
    <hr />
    <v-btn color="success" @click="activate">Activate</v-btn>
    <br />

    <SubmitionResultsAlert
      v-if="resultMessage"
      :status="resultStatus"
      :message="resultMessage"
    />
  </div>
</template>

<script>
import GoBackButton from "../../../components/GoBackButton.vue";
import SubmitionResultsAlert from "../../../components/SubmitionResultsAlert.vue";
export default {
  components: {
    GoBackButton,
    SubmitionResultsAlert,
  },
  async created() {
    await this.$hotelBranchAdminService
      .get(this.$route.params.id)
      .then((result) => {
        this.branch = result.data;
        console.log("branch data:  ", this.branch);
      });

    await this.$hotelRoomAdminService
      .getBranchRoomsTable(this.$route.params.id)
      .then((result) => {
        console.log(result.data);
        this.roomsData = result.data;
      });

    await this.$roomCategoryAdminService
      .getSingleBranch(this.$route.params.id)
      .then((result) => {
        console.log(result.data);
        this.roomCategoryData = result.data;
      });
    this.isLoading = false;
  },
  data() {
    return {
      isLoading: true,
      branch: null,
      roomsData: null,
      roomCategoryData: null,
      resultStatus: null,
      resultMessage: null,
      categoryHeaders: [
        { text: "Category", value: "name" },
        { text: "Price", value: "price" },
        { text: "Description", value: "description" },
        { text: "Capacity", value: "capacity" },
        { text: "Single Beds", value: "single_beds" },
        { text: "Double Beds", value: "double_beds" },
        { text: "# Rooms", value: "rooms" },
        { text: "# BathRooms", value: "bathrooms" },
        { text: "State", value: "active" },
      ],

      roomsHeaders: [
        {
          text: "Room Type",
          align: "start",
          sortable: false,
          value: "category_id",
        },
        { text: "Booked", value: "booked" },
        { text: "Free", value: "free" },
        { text: "Inactive", value: "Inactive" },
        { text: "Active", value: "active" },
        { text: "Total", value: "total" },
      ],
    };
  },
  methods: {
    interruptTrueFalse(bool) {
      if (bool) {
        return "Yes";
      }
      return "No";
    },
    activate() {
      this.$hotelBranchAdminService
        .activate({ branch_id: this.$route.params.id })
        .then((result) => {
          this.resultStatus = result.status;
          if (result.status == 200) {
            this.resultMessage = "Branch Activated Successfully";
          } else {
            this.resultMessage = "Branch Cannot be activated add the rols";
          }
        });
    },
  },
};
</script>

<style>
.branch-details-view {
  padding: 10px;
}
</style>