<template>
  <v-data-table
    :headers="headers"
    :items="tableData"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>
</template>

<script>
export default {
  async created() {
    this.$adminRoomReservations.get(18).then((result) => {
      console.log(result.data);
      this.tableData = result.data;
    });
  },
  data() {
    return {
      headers: [
        {
          text: "User",
          align: "start",
          sortable: false,
          value: "user_id",
        },
        { text: "Payment", value: "payment" },
        { text: "Fat (g)", value: "check_in" },
        { text: "Carbs (g)", value: "check_out" },
        { text: "Protein (g)", value: "days" },
        { text: "Iron (%)", value: "iron" },
      ],
      tableData: [],
    };
  },
};
</script>

<style>
</style>