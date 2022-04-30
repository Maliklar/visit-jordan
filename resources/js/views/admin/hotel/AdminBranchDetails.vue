<template>
  <v-card color="basil">
    <v-card-title class="text-center justify-center py-6">
      <h1 class="font-weight-bold text-h2 basil--text">TITLE</h1>
    </v-card-title>

    <v-tabs v-model="tab" background-color="transparent" color="basil" grow>
      <v-tab> Details </v-tab>
      <v-tab> Gallery </v-tab>
      <v-tab> Facilities & Services </v-tab>
      <v-tab> Facilities & Services </v-tab>
      <v-tab> Facilities & Services </v-tab>
      <v-tab> Facilities & Services </v-tab>
      <v-tab> Reservatuibs </v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item>
        <v-card color="basil" flat>
          <BranchDetails />
        </v-card>
      </v-tab-item>
      <v-tab-item>
        <v-card color="basil" flat>
          <BranchPhotos />
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
</template>
<script>
import BranchDetails from "../../../components/hotel_admin/branch_details_tabs/BranchDetails.vue";
import BranchPhotos from "./BranchPhotos.vue";
export default {
  components: { BranchDetails, BranchPhotos },
  data() {
    return {
      tab: null,
      items: ["Appetizers", "Entrees", "Deserts", "Cocktails"],
      text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
    };
  },
};
</script>