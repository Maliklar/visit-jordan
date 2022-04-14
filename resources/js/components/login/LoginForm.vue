<template>
  <form @submit.prevent="submit" class="sign-up-form text-dark">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input
        type="email"
        class="form-control"
        v-model="email"
        id="exampleInputEmail1"
        aria-describedby="emailHelp"
      />
      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input
        type="password"
        v-model="password"
        class="form-control"
        id="exampleInputPassword1"
      />
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      email: null,
      passwrod: null,
    };
  },
  methods: {
    submit() {
      let data = {
        email: this.email,
        password: this.password,
      };
      this.userService.login(data).then((result) => {
        console.log(result);
        if (result.status == 200) {
          if (result.data.authenticated == "hotel") {
            this.$router.push({
              path: "/admin/hotel/dashboard",
            });
          }
        }
      });
    },
  },
};
</script>

<style>
.sign-up-form {
  padding: 10px;
  border-radius: 10px;
  width: 70%;
  background-color: white;
}
</style>