<template>
  <div>
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div v-for="(banner, index) in banners" :key="banner">
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
        </div>
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
      <div class="carousel-search-bar">
        <input
          type="search"
          placeholder="Search , Hotels, Cars to rent, or a Local Guide"
        />
        <button>
          Find
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-search"
            viewBox="0 0 16 16"
          >
            <path
              d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
            />
          </svg>
        </button>
      </div>
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
  background-color: rgb(255, 0, 0);
}

.home-carousel-content {
  position: absolute;
  align-content: center;
  background-color: black;
  overflow: hidden;
}

.carousel-text {
  position: absolute;
  color: white;
  top: 30%;
  left: 15%;
  text-shadow: 1px 1px 2px black;
}

.home-carousel-content > video {
  width: 100vw;
  height: 100vh;
  align-items: center;
  display: flex;
  align-content: center;
  justify-content: center;
  object-fit: cover;
  overflow: hidden;

  z-index: 0;
}

.carousel-search-bar {
  width: 100%;
  padding: 10px;
  position: absolute;
  bottom: 25%;
  display: flex;
  justify-content: center;
  animation-name: search-bar;
  animation-duration: 1s;
}

@keyframes search-bar {
  0% {
    transform: translateY(500%) scale(0);
    opacity: 0;
  }
  100% {
    transform: translateY(0%) scale(1);
    opacity: 1;
  }
}

.carousel-search-bar > input {
  width: 70%;
  border: none;
  outline: none;
  border-radius: 10px 0px 0px 10px;
  padding: 10px;
  box-shadow: 5px 5px 10px black;
}

.carousel-search-bar > button {
  border: none;
  widows: 20%;
  border-radius: 10px;
  padding: 10px;
  color: white;
  border-radius: 0px 10px 10px 0px;
  background-color: rgba(0, 0, 0, 0.363);
  backdrop-filter: blur(10px);
  box-shadow: 5px 5px 10px black;
}
</style>