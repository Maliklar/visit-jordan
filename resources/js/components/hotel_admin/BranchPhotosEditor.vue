<template>
  <div v-if="isLoading" class="text-center">
    <v-progress-circular :size="100" :width="7" color="purple" indeterminate>
      Loading...</v-progress-circular
    >
  </div>
  <div v-else>
    <SubmitionResultsAlert
      v-if="resultMessage"
      :message="resultMessage"
      :status="resultStatus"
    />

    <v-form ref="form" @submit.prevent="submit">
      <v-row>
        <v-col cols="6">
          <ImageContainer :src="image_1_url" :id="image_1_id" />

          <v-file-input
            @change="handleImage1"
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            label="Image 1"
          ></v-file-input>
        </v-col>
        <v-col cols="6">
          <ImageContainer :src="image_2_url" :id="image_2_id" />
          <v-file-input
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            @change="handleImage2"
            label="Image 2"
          ></v-file-input>
        </v-col>
        <v-col cols="6">
          <ImageContainer :src="image_3_url" :id="image_3_id" />

          <v-file-input
            accept="imag
            e/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            @change="handleImage3"
            label="Image 3"
          ></v-file-input>
        </v-col>
        <v-col cols="6">
          <ImageContainer :src="image_4_url" :id="image_4_id" />

          <v-file-input
            @change="handleImage4"
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            label="Image 4"
          ></v-file-input>
        </v-col>
      </v-row>
      <v-btn
        color="success"
        class="submittion-button"
        type="submit"
        size="large"
      >
        Update Photos
      </v-btn>
    </v-form>
  </div>
</template>

<script>
import SubmitionResultsAlert from "../SubmitionResultsAlert.vue";
import ImageContainer from "./ImageContainer.vue";
export default {
  components: {
    ImageContainer,
    SubmitionResultsAlert,
  },
  props: {
    type: String,
  },
  created() {
    if (this.type == "interior") {
      this.$hotelBranchImagesAdminService
        .getInterior(this.$route.params.id)
        .then((result) => {
          for (let i = 0; i < result.data.length; i++) {
            if (result.data[i].number == 1) {
              this.image_1_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_1_id = result.data[i].id;
            }
            if (result.data[i].number == 2) {
              this.image_2_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_2_id = result.data[i].id;
            }
            if (result.data[i].number == 3) {
              this.image_3_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_3_id = result.data[i].id;
            }
            if (result.data[i].number == 4) {
              this.image_4_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_4_id = result.data[i].id;
            }
          }
        });
    }
    if (this.type == "building") {
      this.$hotelBranchImagesAdminService
        .getBuilding(this.$route.params.id)
        .then((result) => {
          for (let i = 0; i < result.data.length; i++) {
            if (result.data[i].number == 1) {
              this.image_1_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_1_id = result.data[i].id;
              console.log(this.image_1_url);
            }
            if (result.data[i].number == 2) {
              this.image_2_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_2_id = result.data[i].id;
            }
            if (result.data[i].number == 3) {
              this.image_3_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_3_id = result.data[i].id;
            }
            if (result.data[i].number == 4) {
              this.image_4_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_4_id = result.data[i].id;
            }
          }
        });
    }
    if (this.type == "views") {
      this.$hotelBranchImagesAdminService
        .getView(this.$route.params.id)
        .then((result) => {
          for (let i = 0; i < result.data.length; i++) {
            if (result.data[i].number == 1) {
              this.image_1_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_1_id = result.data[i].id;
            }
            if (result.data[i].number == 2) {
              this.image_2_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_2_id = result.data[i].id;
            }
            if (result.data[i].number == 3) {
              this.image_3_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_3_id = result.data[i].id;
            }
            if (result.data[i].number == 4) {
              this.image_4_url =
                "http://localhost:8000/" + result.data[i].image;
              this.image_4_id = result.data[i].id;
            }
          }
        });
    }
  },
  data() {
    return {
      image_1: null,
      image_2: null,
      image_3: null,
      image_4: null,

      image_1_id: null,
      image_2_id: null,
      image_3_id: null,
      image_4_id: null,

      image_1_url: `https://picsum.photos/500/300?image=${1 * 5 + 10}`,
      image_2_url: `https://picsum.photos/500/300?image=${1 * 5 + 10}`,
      image_3_url: `https://picsum.photos/500/300?image=${1 * 5 + 10}`,
      image_4_url: `https://picsum.photos/500/300?image=${1 * 5 + 10}`,
      valid: null,

      isLoading: false,
      resultMessage: null,
      resultStatus: null,
    };
  },
  methods: {
    handleImage1(e) {
      this.image_1 = e;
      this.image_1_url = URL.createObjectURL(this.image_1);
    },
    handleImage2(e) {
      this.image_2 = e;
      this.image_2_url = URL.createObjectURL(this.image_2);
    },
    handleImage3(e) {
      this.image_3 = e;
      this.image_3_url = URL.createObjectURL(this.image_3);
    },
    handleImage4(e) {
      this.image_4 = e;
      this.image_4_url = URL.createObjectURL(this.image_4);
    },

    submit() {
      this.isLoading = true;
      let data = new FormData();
      data.append("image_1", this.image_1);
      data.append("image_2", this.image_2);
      data.append("image_3", this.image_3);
      data.append("image_4", this.image_4);
      data.append("branch_id", this.$route.params.id);

      if (this.type == "interior") {
        this.$hotelBranchImagesAdminService.addInterior(data).then((result) => {
          this.isLoading = false;
          this.resultStatus = result.status;
          this.resultMessage = result.data;
        });
      }
      if (this.type == "building") {
        this.$hotelBranchImagesAdminService.addBuilding(data).then((result) => {
          this.resultStatus = result.status;
          this.resultMessage = result.data;
          this.isLoading = false;
        });
      }
      if (this.type == "views") {
        this.$hotelBranchImagesAdminService.addView(data).then((result) => {
          this.isLoading = false;
          this.resultStatus = result.status;
          this.resultMessage = result.data;
        });
      }
    },
  },
};
</script>

<style>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
  transition: transform 0.2s ease-in-out;
}

.submittion-button {
  position: fixed;
  z-index: 10;
  right: 0;
  bottom: 0;
  margin: 10px;
}
</style>