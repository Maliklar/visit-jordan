<template>
  <div class="hotel-sign-up">
    <h1>Sign up as a hotel</h1>
    <hr />
    <div class="hotel-sign-up-form-container">
      <sign-up-form :type="'car'" />
    </div>
  </div>
</template>

<script>
import SignUpForm from "../../../../components/signup/SignUpForm.vue";
export default {
  components: {
    SignUpForm,
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