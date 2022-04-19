<template>
  <template>
    <v-container fluid>
      <p>{{ selected }}</p>
      <v-checkbox v-model="selected" label="John" value="John"></v-checkbox>
    </v-container>
  </template>
  <v-card class="mx-auto w-75" prepend-icon="mdi-bed">
    <template v-slot:title> {{ room.category.name }} </template>

    <v-card-text prepend-icon="mdi-bed">
      {{ room.category.description }}
    </v-card-text>
    <div class="d-flex flex-row">
      <v-list>
        <v-list-subheader>REPORTS</v-list-subheader>
        <v-list-item active-color="primary" variant="contained">
          <v-list-item-avatar start>
            <v-icon :icon="'mdi-bed'"></v-icon>
          </v-list-item-avatar>
          <v-list-item-title v-text="'item.text'"></v-list-item-title>
        </v-list-item>
      </v-list>
    </div>
  </v-card>
</template>

<script>
export default {
  props: {
    room: Object,
  },
  data() {
    return {
      selected: ["John"],
    };
  },
};
</script>