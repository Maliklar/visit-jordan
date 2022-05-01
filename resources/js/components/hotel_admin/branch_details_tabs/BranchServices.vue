<template>
  <div>
    <v-tabs v-model="tab" align-with-title>
      <v-tabs-slider color="yellow"></v-tabs-slider>

      <v-tab v-for="item in tabs" :key="item.id">
        {{ item.name }}
      </v-tab>
    </v-tabs>
    <v-tabs-items v-model="tab">
      <v-tab-item v-for="item in tabs" :key="item.id">
        <v-card flat>
          <v-card-text>
            <v-card-title>Add Service Or Feature</v-card-title>
            <v-card-subtitle>Select From the List</v-card-subtitle>
            <v-autocomplete></v-autocomplete>

            <v-card-subtitle>Or create custom</v-card-subtitle>
            <v-autocomplete></v-autocomplete>
            <v-autocomplete></v-autocomplete>
          </v-card-text>
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </div>
</template>

<script>
export default {
  async created() {
    this.$hotelBranchServicesCategoryService.get().then((result) => {
      this.tabs = result.data;
    });
  },
  data() {
    return {
      tabs: null,
      tab: null,
    };
  },
};
</script>

<style>
</style>