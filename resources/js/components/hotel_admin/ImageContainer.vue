<template>
  <v-dialog
    v-model="dialog"
    fullscreen
    :scrim="false"
    transition="dialog-bottom-transition"
  >
    <template v-slot:activator="{ on, attrs }">
      <div>
        <SubmitionResultsAlert
          v-if="resultMessage"
          :message="resultMessage"
          :status="resultStatus"
        />

        <v-img
          :src="src"
          v-bind="attrs"
          v-on="on"
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
      </div>
    </template>
    <v-card>
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="dialog = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>Image Preview</v-toolbar-title>
        <v-spacer></v-spacer>

        <v-btn color="error" @click="deleteImage(id)" depressed>
          <v-icon left> mdi-delete </v-icon>
          Delete
        </v-btn>
      </v-toolbar>
      <img
        :src="src"
        style="max-width: 100%"
        contain
        :lazy-src="src"
        aspect-ratio="1"
        cover
        alt=""
      />
    </v-card>
  </v-dialog>
</template>


<script>
import SubmitionResultsAlert from "../SubmitionResultsAlert.vue";
export default {
  props: {
    src: String,
    id: Number,
  },
  components: {
    SubmitionResultsAlert,
  },
  data() {
    return {
      dialog: false,
      notifications: false,
      sound: true,
      widgets: false,
      resultMessage: null,
      resultStatus: null,
    };
  },

  methods: {
    deleteImage(id) {
      this.$hotelBranchAdminService.deleteImage(id).then((result) => {
        this.dialog = false;
        this.resultMessage = result.data;
        this.resultStatus = result.status;
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