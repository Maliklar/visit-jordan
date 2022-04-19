<template>
  <v-card :loading="loading" class="mx-auto my-12 w-75">
    <v-progress-linear
      v-if="loading"
      class="position-absolute"
      style="z-index: 1"
      color="deep-purple"
      height="10"
      indeterminate
    ></v-progress-linear>
    <v-row no-gutters>
      <v-col cols="12" sm="6">
        <v-img height="250" :src="view_img" cover outlined> </v-img>
      </v-col>
      <v-col cols="12" sm="6">
        <v-img height="250" :src="room_img" cover> </v-img>
      </v-col>
    </v-row>

    <v-card-header>
      <v-card-header-text>
        <v-card-title>{{ category.name }}</v-card-title>
        <v-card-title>{{ category.description }}</v-card-title>
      </v-card-header-text>
    </v-card-header>

    <v-card-text>
      <v-row align="center" class="mx-0">
        <v-rating
          :model-value="4.5"
          color="amber"
          dense
          half-increments
          readonly
          size="14"
        ></v-rating>
        <div class="text-grey ms-4">4.5 (413)</div>
      </v-row>

      <div class="my-4 text-subtitle-1">$ • {{ category.price }}</div>
    </v-card-text>

    <v-divider class="mx-4 mb-1"></v-divider>

    <v-card-title>Features</v-card-title>

    <div class="px-4">
      <v-chip-group v-model="selection">
        <v-chip>Edit</v-chip>

        <v-chip @click="photos(category.id)">Photos</v-chip>

        <v-chip>8:00PM</v-chip>

        <v-chip>9:00PM</v-chip>
      </v-chip-group>
    </div>

    <v-card-actions>
      <v-btn color="deep-purple-lighten-2" text @click="reserve">
        Reserve
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: {
    category: Object,
  },
  data: () => ({
    loading: false,
    selection: 1,
    room_img: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
    view_img: "https://cdn.vuetifyjs.com/images/cards/cooking.png",
  }),

  async created() {
    for (let i = 0; i < this.category.room.length; i++) {
      this.room_img = "http://localhost:8000/" + this.category.room[0].image;
      break;
    }
    for (let i = 0; i < this.category.view.length; i++) {
      this.view_img = "http://localhost:8000/" + this.category.view[0].image;
      break;
    }
  },

  methods: {
    reserve() {
      this.loading = true;

      setTimeout(() => (this.loading = false), 2000);
    },
    photos(id) {
      this.$router.push({
        path: "/admin/hotel/dashboard/room_categories/photos/" + id,
      });
    },
  },
};
</script>