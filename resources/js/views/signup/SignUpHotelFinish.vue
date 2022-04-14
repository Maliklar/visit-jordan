<template>
  <div class="hotel-sign-up">
    <h1>Hotel Details</h1>
    <hr />
  </div>
  <div class="hotel-sign-up-form-container">
    <HotelDetailsForm />
  </div>
</template>

<script>
import HotelDetailsForm from "../../components/signup/HotelDetailsForm.vue";
export default {
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