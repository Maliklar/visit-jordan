<template>
  <div class="hotel-navigation">
    <AdminCard />
    <hr />
    <div class="dropend navbar-list-item dropdown-menu-lg-end">
      <div
        type="button"
        class="list-group-item navbar-list-item dropdown-toggle"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        Overview
      </div>
      <ul class="dropdown-menu">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
          <li class="list-group-item">A fourth item</li>
          <li class="list-group-item">And a fifth one</li>
        </ul>
      </ul>
    </div>
  </div>
</template>

<script>
import AdminCard from "./AdminCard.vue";
export default {
  components: {
    AdminCard,
  },
};
</script>

<style>
.hotel-navigation {
  height: 100%;
  padding: 5px;
  background-color: black;
}

.navbar-list-item {
  width: 100%;
}
</style>