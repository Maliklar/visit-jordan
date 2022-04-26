<template>
  <v-data-table
    :headers="paymentHeader"
    :items="paymentsData"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>
</template>

<script>
export default {
  props: {
    paymentsData: Array,
  },
  data() {
    return {
      paymentHeader: [
        { text: "Room ID", value: "room_id" },
        { text: "Branch", value: "branch.name" },
        { text: "Category", value: "category.id" },
        { text: "Category Price", value: "category.price" },
        { text: "amount", value: "amount" },
        { text: "Timestamp", value: "created_at" },
      ],
    };
  },
};
</script>

<style>
</style>