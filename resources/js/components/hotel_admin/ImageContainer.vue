<template>
  <v-dialog
    v-model="dialog"
    fullscreen
    :scrim="false"
    transition="dialog-bottom-transition"
  >
    <template v-slot:activator="{ props }">
      <v-img
        v-bind="props"
        :src="src"
        :lazy-src="src"
        aspect-ratio="1"
        cover
        class="bg-grey-lighten-2"
      >
        <template v-slot:placeholder>
          <v-row class="fill-height ma-0" align="center" justify="center">
            <v-progress-circular
              indeterminate
              color="grey-lighten-5"
            ></v-progress-circular>
          </v-row>
        </template>
      </v-img>
    </template>
    <v-card>
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="dialog = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>Image Preview</v-toolbar-title>
        <v-spacer></v-spacer>

        <v-btn color="error" @click="deleteImage(id)" plain> Delete </v-btn>
      </v-toolbar>
      <img :src="src" alt="" />
    </v-card>
  </v-dialog>
</template>


<script>
export default {
  props: {
    src: String,
    id: Number,
  },
  data() {
    return {
      dialog: false,
      notifications: false,
      sound: true,
      widgets: false,
    };
  },

  methods: {
    deleteImage(id) {
      this.hotelBranchAdminService.deleteImage(id).then((result) => {
        console.log(result);
      });
    },
  },
};
</script>

<style scoped>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
  transition: all 0.2s ease-in-out;
}
</style>