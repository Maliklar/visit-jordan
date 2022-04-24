<template>
  <div>
    <h1>Room Details</h1>
    <hr />
    <br />
    <v-tabs v-model="tab" align-with-title>
      <v-tabs-slider color="yellow"></v-tabs-slider>

      <v-tab v-for="item in items" :key="item">
        {{ item }}
      </v-tab>
    </v-tabs>
    <v-tabs-items v-model="tab">
      <v-tab-item v-for="item in items" :key="item">
        <v-card flat>
          <ReservationCalendar />
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </div>
</template>

<script>
import ReservationCalendar from "../../../components/hotel_admin/ReservationCalendar.vue";
export default {
  components: { ReservationCalendar },
  data() {
    return {
      tab: null,
      items: ["web", "shopping", "videos", "images", "news"],
      text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
    };
  },
};
</script>

<style>
</style>