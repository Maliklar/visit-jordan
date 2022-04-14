<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Visit Jordan</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <div class="nav-link active" href="#">•</div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Hotels</a>
            </li>
            <li class="nav-item">
              <div class="nav-link active" href="#">•</div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Rent A Car</a>
            </li>
            <li class="nav-item">
              <div class="nav-link active" href="#">•</div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Local Guides</a>
            </li>
          </ul>
          <div class="d-flex">
            <button class="btn btn-primary">
              <router-link to="/login">Login</router-link>
            </button>
            <button class="btn btn-primary">
              <router-link to="/signup"> Sign Up</router-link>
            </button>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {};
</script>

<style>
nav {
  backdrop-filter: blur(10px);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  z-index: 3;
}
</style>