<template>
  <div class="home-page">
    <HomeCarousel />
    <div>
      <h1>Hotels</h1>
      <hr />
      <div>
        <h3>Somoking Allowed</h3>
        <div class="cards-container">
          <HotelCard />
          <HotelCard />
          <HotelCard />
          <HotelCard />
        </div>
        <h3>Swiming Pool avaialble</h3>
        <div class="cards-container">
          <HotelCard />
          <HotelCard />
          <HotelCard />
          <HotelCard />
        </div>
        <h3>Pets Allowed</h3>
        <div class="cards-container">
          <HotelCard />
          <HotelCard />
          <HotelCard />
          <HotelCard />
        </div>
        <h3>Ratings</h3>
        <div class="cards-container">
          <HotelCard />
          <HotelCard />
          <HotelCard />
          <HotelCard />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HomeCarousel from "../components/HomeCarousel.vue";
import HotelCard from "../components/HotelCard.vue";
export default {
  components: { HomeCarousel, HotelCard },
};
</script>

<style>
.cards-container {
  display: flex;
  overflow-x: scroll;
  gap: 10px;
}
</style>