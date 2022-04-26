<template>
  <div v-if="reservations">
    <h1>Reservations</h1>
    <hr />
    <ReservationsTable :reservations="reservations" />
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
    };
  },
  async created() {
    this.$reservationAdminService
      .getByCategoryId(this.$route.params.id)
      .then((result) => {
        this.reservations = result.data;
      });
  },
};
</script>

<style>
</style>