<template>
  <div>
    <div class="user-card-nav">
      <img
        class="user-card-nav-avatar"
        src="../../assets/images/allcat.png"
        alt=""
      />
      <div class="user-card-nav-details">
        <div>Admin</div>
        <div>Email@example.com</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
.user-card-nav {
  height: 100px;
  display: flex;
  align-items: center;
  gap: 5px;
}
.user-card-nav-avatar {
  border-radius: 100%;
  height: 60px;
  width: 60px;
}

.user-card-nav-details {
  display: flex;
  flex-direction: column;
  text-overflow: ellipsis;
  overflow: hidden;
}

.user-card-nav-details > div {
  text-overflow: ellipsis;
  overflow: hidden;
}
</style>