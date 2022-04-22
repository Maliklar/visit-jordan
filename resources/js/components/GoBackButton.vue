<template>
  <v-btn @click="goBack" class="ma-2" fab dark small>
    <v-icon dark> mdi-chevron-left </v-icon>
  </v-btn>
</template>

<script>
export default {
  methods: {
    goBack() {
      this.$router.go(-1);
    },
  },
};
</script>

<style>
</style>