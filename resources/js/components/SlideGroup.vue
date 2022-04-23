<template>
  <v-sheet class="mx-auto" elevation="8">
    <v-slide-group
      v-model="model"
      class="pa-4"
      active-class="success"
      show-arrows
    >
      <v-slide-item v-for="n in 15" :key="n" v-slot="{ toggle }">
        <v-card class="ma-4" height="200" width="200" @click="toggle">
          <v-img
            src="https://picsum.photos/350/165?random"
            cover
            min-height="150"
            class="grey darken-4"
          ></v-img>
          <v-card-title>Amman </v-card-title>
        </v-card>
      </v-slide-item>
    </v-slide-group>
  </v-sheet>
</template>

<script>
export default {
  data: () => ({
    model: null,
  }),
};
</script>