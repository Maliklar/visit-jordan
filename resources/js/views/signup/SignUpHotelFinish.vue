<template>
  <div class="hotel-sign-up">
    <h1>Hotel Details</h1>
    <hr />
    <div class="hotel-sign-up-form-container">
      <HotelDetailsForm />
    </div>
  </div>
</template>

<script>
import HotelDetailsForm from "../../components/signup/HotelDetailsForm.vue";
export default {
  async created() {
    this.hotelService.auth().then((result) => {
      console.log(result);
    });
  },
  components: {
    HotelDetailsForm,
  },
};
</script>

<style>
.hotel-sign-up {
  padding: 10px;
  text-align: center;
}

.hotel-sign-up-form-container {
  display: flex;
  padding: 10px;

  flex-direction: column;
  align-items: center;
  justify-content: center;
}
</style>