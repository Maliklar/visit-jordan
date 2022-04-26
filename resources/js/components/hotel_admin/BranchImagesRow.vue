<template>
  <v-container v-if="images.length > 0">
    <v-row no-gutters>
      <v-col v-for="image in images" :key="image.id" cols="12" sm="4">
        <v-card class="pa-2" outlined tile>
          <v-img
            max-height="300"
            min-height="300"
            :src="`http://localhost:8000/${image.image}`"
            alt=""
            cover
          ></v-img>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
  <v-container v-else> Image Not Set </v-container>
</template>
<script>
export default {
  props: {
    images: Array,
  },
};
</script>

<style>
</style>