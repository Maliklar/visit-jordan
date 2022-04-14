<template>
  <form @submit.prevent="submit" class="sign-up-form text-dark">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Hotel name</label>
      <input
        type="text"
        class="form-control"
        id="exampleInputEmail1"
        aria-describedby="emailHelp"
      />
      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>
    <hr />
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Something</label>
      <input
        type="text"
        class="form-control"
        id="exampleInputEmail1"
        aria-describedby="emailHelp"
      />
      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>
    <hr />
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Logo</label>
      <input
        type="text"
        class="form-control"
        id="exampleInputEmail1"
        aria-describedby="emailHelp"
      />
      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>
    <hr />
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Hotel name</label>
      <input
        type="text"
        class="form-control"
        id="exampleInputEmail1"
        aria-describedby="emailHelp"
      />
      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>
    <hr />
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Hotel name</label>
      <input
        type="text"
        class="form-control"
        id="exampleInputEmail1"
        aria-describedby="emailHelp"
      />
      <div id="emailHelp" class="form-text">
        We'll never share your email with anyone else.
      </div>
    </div>
    <hr />

    <button type="submit" class="btn btn-primary">Sign up</button>
  </form>
</template>

<script>
export default {
  methods: {
    submit() {
      this.$router.push({
        path: "/signup/hotel/finish",
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