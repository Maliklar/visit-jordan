<template>
  <div>
    <h1>Branch Reservations</h1>
    <hr />
    <v-card>
      <v-tabs v-model="tab" background-color="primary" dark>
        <v-tab> Calendar </v-tab>
        <v-tab> Table </v-tab>
      </v-tabs>
      <v-autocomplete
        v-model="filter"
        :items="filterData"
        item-text="name"
        item-value="id"
        @change="filterSelected"
        dense
        filled
        label="Filter"
      ></v-autocomplete>
      <v-tabs-items v-model="tab">
        <v-tab-item>
          <v-card flat>
            <ReservationsTable :reservations="reservations" />
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card flat>
            <ReservationsTable :reservations="reservations" />
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>
  </div>
</template>

<script>
import ReservationsTable from "../../../components/hotel_admin/ReservationsTable.vue";
export default {
  components: {
    ReservationsTable,
  },
  data() {
    return {
      reservations: null,
      tab: null,
      filter: null,
      filterData: null,
    };
  },
  async created() {
    this.$reservationAdminService
      .getByBranchId(this.$route.params.id)
      .then((result) => {
        this.reservations = result.data;
        console.log("dd", this.reservations);
      });

    this.$roomCategoryAdminService
      .getByBranchId(this.$route.params.id)
      .then((result) => {
        this.filterData = result.data;
      });
  },

  methods: {
    filterSelected() {
      console.log(this.filter);
    },
  },
};
</script>

<style>
</style>