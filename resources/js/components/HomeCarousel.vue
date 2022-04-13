<template>
  <div>
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <template v-for="(banner, index) in banners" :key="banner">
          <div
            v-if="index == 0"
            class="carousel-item active home-carousel-content"
          >
            <div class="carousel-text">
              <h1>{{ banner.title }}</h1>
              <h3>{{ banner.subtitle }}</h3>
            </div>
            <video
              :src="'http://localhost:8000/' + banner.video"
              autoplay
              muted
            ></video>
          </div>
          <div v-else class="carousel-item home-carousel-content">
            <video
              :src="'http://localhost:8000/' + banner.video"
              autoplay="true"
            ></video>
          </div>
        </template>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#homeCarousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#homeCarousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  async created() {
    this.bannerService.get().then((result) => {
      console.log(result);
      this.banners = result.data;
    });
  },
  data() {
    return {
      banners: null,
    };
  },
};
</script>

<style>
#homeCarousel {
  height: 100vh;
  width: 100%;
  top: 0;
}

.home-carousel-content {
  position: absolute;
  align-content: center;
}

.carousel-text {
  position: absolute;
  color: white;
  margin-top: 30%;
  margin-left: 15%;
  text-shadow: 10px 10px 10px black;
}

.home-carousel-content > video {
  height: 100%;
  width: 177.77777778vh; /* 100 * 16 / 9 */
  min-width: 100%;
  min-height: 56.25vw; /* 100 * 9 / 16 */
}
</style>