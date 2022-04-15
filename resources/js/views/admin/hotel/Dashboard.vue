<template>
  <div class="hotel-admin-dashboard">
    <div class="container-fluid">
      <div class="row">
        <div class="col-2 no-float admin-left-column">
          <HotelNavigation />
        </div>
        <div class="col-10"><router-view></router-view></div>
      </div>
    </div>
  </div>
</template>

<script>
import HotelNavigation from "../../../components/hotel_admin/HotelNavigation.vue";
export default {
  components: {
    HotelNavigation,
  },
  //   created() {
  //     this.hotelService.getHotel().then((result) => {
  //       console.log(result);
  //     });
  //   },
};
</script>

<style>
.admin-left-column {
  min-height: 100%;
}

.hotel-admin-dashboard {
  min-height: 100%;
}

.hotel-admin-dashboard > div > div {
  min-height: 90vh;
}

.hotel-admin-dashboard > div {
  min-height: 100%;
}
</style>