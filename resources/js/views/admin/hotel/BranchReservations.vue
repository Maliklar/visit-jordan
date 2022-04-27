<template>
  <div v-if="reservations">
    <h1>Branch Reservations</h1>
    <hr />
    <v-card>
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

      <v-card flat>
        <ReservationsTable :reservations="reservations" />
      </v-card>
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