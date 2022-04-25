<template>
  <div>
    <h1>Reservations</h1>
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
      .getByCategoryId(this.$route.params.id)
      .then((result) => {
        this.data = result;
      });
  },
};
</script>

<style>
</style>