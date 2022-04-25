<template>
  <div>
    <h1>Branch Reservations</h1>
    <hr />
    data:
    <div>
      {{ data }}
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: null,
    };
  },
  async created() {
    this.$reservationAdminService
      .getByBranchId(this.$route.params.id)
      .then((result) => {
        this.data = result;
      });
  },
};
</script>

<style>
</style>