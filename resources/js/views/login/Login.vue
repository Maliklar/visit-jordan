<template>
  <div class="hotel-sign-up">
    <h1>Sign up as a hotel</h1>
    <hr />
  </div>
  <div class="hotel-sign-up-form-container">
    <LoginForm />
  </div>
</template>

<script>
import LoginForm from "../../components/login/LoginForm.vue";
export default {
  components: {
    LoginForm,
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