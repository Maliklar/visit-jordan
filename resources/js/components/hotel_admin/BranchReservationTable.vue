<template>
  <div>
    <v-data-table
      :headers="headers"
      :items="reservations"
      :items-per-page="5"
      class="elevation-1"
    >
      <template v-slot:item="{ item }">
        <tr>
          <td>{{ item.category.name }}</td>
          <td>{{ item.room_id }}</td>
          <td>{{ item.user.email }}</td>
          <td>{{ item.payment.id }}</td>
          <td>{{ item.check_in }}</td>
          <td>{{ item.check_out }}</td>
          <td>{{ item.days }}</td>
          <td>{{ item.created_at }}</td>
        </tr>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  created() {
    console.log("from table", this.reservations);
  },
  props: {
    reservations: Array,
  },
  methods: {
    selected(i) {
      console.log(i);
    },
    rowClicked(row) {
      this.toggleSelection(row.id);
      console.log(row);
    },
  },
  data() {
    return {
      expanded: [],
      singleExpand: false,
      headers: [
        {
          text: "Category",
          align: "start",
          sortable: false,
          value: "category",
        },
        { text: "User ID", value: "user_id" },

        { text: "Room ID", value: "room_id" },
        { text: "Payment Details", value: "payment" },

        { text: "Check In", value: "check_in" },
        { text: "Check Out", value: "check_out" },
        { text: "Days", value: "days" },
        { text: "Timestamp", value: "created_at" },
      ],
    };
  },
};
</script>

<style>
</style>