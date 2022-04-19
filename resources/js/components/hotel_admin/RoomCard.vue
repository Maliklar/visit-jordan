<template>
  <div class="d-flex justify-center align-center">
    <v-card class="w-75">
      <template v-slot:title>
        <v-checkbox v-model="checkbox" :label="room.category.name"></v-checkbox>
      </template>

      <template v-slot:subtitle> {{ room.category.description }} </template>

      <template v-slot:text> This is content </template>
    </v-card>
  </div>
</template>

<script>
export default {
  props: {
    room: Object,
  },
  data() {
    return {
      checkbox: true,
    };
  },
};
</script>