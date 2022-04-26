<template>
  <div>
    <v-data-table
      :headers="headers"
      :items="reservations"
      :items-per-page="5"
      class="elevation-1"
    ></v-data-table>
  </div>
</template>

<script>
export default {
  created() {
    console.log("from table", this.reservations);
  },
  props: {
    reservations: Object,
  },
  data() {
    return {
      headers: [
        {
          text: "Category",
          align: "start",
          sortable: false,
          value: "category_id",
        },
        { text: "Room ID", value: "room_id" },
        { text: "Check In", value: "check_in" },
        { text: "Check Out", value: "check_out" },
        { text: "User ID", value: "user_id" },
        { text: "Days", value: "days" },
        { text: "Payment Details", value: "payment_id" },
        { text: "Timestamp", value: "created_at" },
      ],
    };
  },
};
</script>

<style>
</style>