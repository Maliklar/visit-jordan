<template>
  <div class="reservations-view">
    <h1>Reservations</h1>
    <hr />
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">ID</th>
            <th class="text-left">Branch ID</th>
            <th class="text-left">Room ID</th>
            <th class="text-left">Payment ID</th>
            <th class="text-left">Check In</th>
            <th class="text-left">Check Out</th>
            <th class="text-left">user</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in data" :key="item.id">
            <td>{{ item.id }}</td>
            <td>{{ item.branch_id }}</td>
            <td>{{ item.room_id }}</td>
            <td>{{ item.payment_id }}</td>
            <td>{{ item.check_in }}</td>
            <td>{{ item.check_out }}</td>
            <td>{{ item.user_id }}</td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </div>
</template>

<script>
export default {
  async created() {
    this.$adminRoomReservations.getAll().then((result) => {
      console.log(result.data);
      this.data = result.data;
    });
  },
  data() {
    return {
      data: null,
    };
  },
};
</script>

<style>
.reservations-view {
  padding: 10px;
}
</style>