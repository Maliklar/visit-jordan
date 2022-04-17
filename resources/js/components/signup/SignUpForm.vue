<template>
  <form @submit.prevent="submit" class="sign-up-form text-dark">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" class="form-control" v-model="name" />
    </div>
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

    <button type="submit" class="btn btn-primary">Sign up</button>
  </form>
</template>

<script>
export default {
  props: {
    type: String,
  },
  data() {
    return {
      email: null,
      password: null,
      name: null,
    };
  },
  methods: {
    submit() {
      console.log("here", this.type);
      let data = {
        email: this.email,
        password: this.password,
        name: this.name,
      };
      if (this.type == "hotel") {
        this.hotelAdminService.register(data).then((result) => {
          if (result.status == 200) {
            console.log(result);
          } else {
            console.log(result);
          }
        });
      } else if (this.type == "car") {
        this.carAdminService.register(data).then((result) => {
          if (result.status == 200) {
            this.hotelService.login(data).then((result) => {
              if (result.status == 200) {
                this.$router.push({
                  path: "/signup/hotel/finish",
                });
              }
            });
          } else {
            console.log(result);
          }
          console.log(result);
        });
      }
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