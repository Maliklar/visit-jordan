<template>
  <v-card class="sign-up-form">
    <v-form ref="form" v-model="valid" lazy-validation @submit.prevent="submit">
      <v-text-field
        v-model="email"
        :rules="emailRules"
        label="E-mail"
        required
      ></v-text-field>
      <v-text-field
        v-model="password"
        :rules="passwordRules"
        label="Password"
        required
      ></v-text-field>

      <v-btn :disabled="!valid" color="success" class="mr-4" type="submit">
        Login
      </v-btn>
    </v-form>

    <!-- <form @submit.prevent="submit">
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
    </form> -->
  </v-card>
</template>



<script>
// export default {
//   data() {
//     return {
//       email: null,
//       passwrod: null,
//     };
//   },
//   methods: {
//     submit() {
//       let data = {
//         email: this.email,
//         password: this.password,
//       };
//       this.userService.login(data).then((result) => {
//         console.log(result);
//         if (result.status == 200) {
//           if (result.data.authenticated == "hotel") {
//             this.$router.push({
//               path: "/admin/hotel/dashboard",
//             });
//           }
//         }
//       });
//     },
//   },
// };
//

export default {
  data: () => ({
    valid: true,

    email: "",
    emailRules: [
      (v) => !!v || "E-mail is required",
      (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
    ],

    password: "",
    passwordRules: [(v) => !!v || "E-mail is required"],
    select: null,
    items: ["Item 1", "Item 2", "Item 3", "Item 4"],
    checkbox: false,
  }),

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
          if (result.data.authenticated == "car") {
            this.$router.push({
              path: "/admin/car/dashboard",
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
}
</style>