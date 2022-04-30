<template>
  <div v-if="isLoading" class="text-center">
    <v-progress-circular :size="100" :width="7" color="purple" indeterminate>
      Loading...</v-progress-circular
    >
  </div>
  <div v-else class="branch-details-view">
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
    <h3>Building Images</h3>
    <hr />
    <BranchImagesRow :images="branch.building" />
    <br />
    <br />
    <h3>Interior Images</h3>
    <hr />
    <BranchImagesRow :images="branch.interior" />
    <br />
    <br />
    <h3>Views Images</h3>
    <hr />
    <BranchImagesRow :images="branch.views" />
    <br />

    <h3>Rooms</h3>
    <hr />
    <v-data-table
      :headers="categoryHeaders"
      :items="roomCategoryData"
      :items-per-page="5"
      class="elevation-1"
    ></v-data-table>

    <br />
    <h3>Revenue</h3>
    <hr />
    <PaymentsTable :paymentsData="paymentsData" />
    <br />
    <h3>State</h3>
    <hr />
    <v-container
      ><BranchActivationAlert :id="branch.id" :active="branch.active" />
      <br />
    </v-container>
  </div>
</template>

<script>
import GoBackButton from "../../../components/GoBackButton.vue";
import BranchActivationAlert from "../../../components/hotel_admin/BranchActivationAlert.vue";
import BranchImagesRow from "../../../components/hotel_admin/BranchImagesRow.vue";
import PaymentsTable from "../../../components/hotel_admin/PaymentsTable.vue";

import SubmitionResultsAlert from "../../../components/SubmitionResultsAlert.vue";
export default {
  components: {
    GoBackButton,
    BranchActivationAlert,
    SubmitionResultsAlert,
    BranchImagesRow,
    PaymentsTable,
  },
  async created() {
    await this.$hotelBranchAdminService
      .getById(this.$route.params.id)
      .then((result) => {
        this.branch = result.data;
        console.log("branch data:  ", this.branch);
      });

    await this.$roomCategoryAdminService
      .getByBranchId(this.$route.params.id)
      .then((result) => {
        console.log(result.data);
        this.roomCategoryData = result.data;
      });

    await this.$hotelPaymentAdminService
      .getByBranchId(this.$route.params.id)
      .then((result) => {
        console.log("read", result.data);
        this.paymentsData = result.data;
      });
    this.isLoading = false;
    this.$emit("isLoading", this.isLoading);
  },
  data() {
    return {
      paymentsData: null,
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