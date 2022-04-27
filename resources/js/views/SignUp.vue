<template>
  <div class="signup-page">
    <div>
      <SignUpForm />
    </div>
  </div>
</template>

<script>
import SignUpForm from "../components/signup/SignUpForm.vue";
export default {
  components: { SignUpForm },
  methods: {
    car() {
      this.$router.push({
        path: "/signup/car",
      });
    },
    hotel() {
      this.$router.push({
        path: "/signup/hotel",
      });
    },
    user() {
      this.$router.push({
        path: "/",
      });
    },
    guide() {
      this.$router.push({
        path: "/",
      });
    },
  },
};
</script>

<style>
.signup-page {
  display: flex;
  flex-direction: column;
  padding: 10px;
  justify-content: center;
  /* align-items: center; */
  text-align: center;
  width: 100%;
}

.sign-up-options-container {
  display: flex;
  gap: 10px;
}

.sign-up-option-card {
  cursor: pointer;
  animation: cards-slide 1s;
}

@keyframes cards-slide {
  0% {
    transform: translateX(-300%);
    opacity: 0.3;
  }
  100% {
    transform: translateX(0%);
    opacity: 1;
  }
}
.sign-up-option-card:hover {
  transition: all 1s;
  box-shadow: 10px 10px 10px black;
}

.sign-up-option-card > img {
  transition: all 1s;
  max-height: 100%;
}
.sign-up-option-card:hover > img {
  transition: all 1s;
  max-height: 0;
  /* transition: max-height 0.25s ease-in; */
}
</style>