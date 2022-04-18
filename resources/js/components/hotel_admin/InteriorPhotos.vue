<template>
  <div>
    <v-form ref="form" @submit.prevent="submit">
      <v-row>
        <v-col cols="6">
          <v-img
            :src="image_1_url"
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
          <v-file-input
            @change="handleImage1"
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            label="Image 1"
          ></v-file-input>
        </v-col>
        <v-col cols="6">
          <v-img
            :src="image_2_url"
            :lazy-src="`https://picsum.photos/10/6?image=${1 * 5 + 10}`"
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
          <v-file-input
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            @change="handleImage2"
            label="Image 2"
          ></v-file-input>
        </v-col>
        <v-col cols="6">
          <v-img
            :src="image_3_url"
            :lazy-src="`https://picsum.photos/10/6?image=${1 * 5 + 10}`"
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
          <v-img
            :src="image_4_url"
            :lazy-src="`https://picsum.photos/10/6?image=${1 * 5 + 10}`"
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
          <v-file-input
            @change="handleImage4"
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            label="Image 4"
          ></v-file-input>
          sds
        </v-col>
      </v-row>
      <v-btn color="success" type="submit" size="large"> Submit </v-btn>
    </v-form>
  </div>
</template>

<script>
export default {
  created() {
    console.log(this.$route.params.id);
    this.hotelBranchAdminService
      .getInteriorImages(this.$route.params.id)
      .then((result) => {
        for (let i = 0; i < result.data.length; i++) {
          if (result.data[i].number == 1) {
            this.image_1_url = "http://localhost:8000/" + result.data[i].image;
          }
          if (result.data[i].number == 2) {
            this.image_2_url = "http://localhost:8000/" + result.data[i].image;
          }
          if (result.data[i].number == 3) {
            this.image_3_url = "http://localhost:8000/" + result.data[i].image;
          }
          if (result.data[i].number == 4) {
            this.image_4_url = "http://localhost:8000/" + result.data[i].image;
          }
        }
      });
  },
  data() {
    return {
      image_1: null,
      image_2: null,
      image_3: null,
      image_4: null,
      image_1_url: `https://picsum.photos/500/300?image=${1 * 5 + 10}`,
      image_2_url: `https://picsum.photos/500/300?image=${1 * 5 + 10}`,
      image_3_url: `https://picsum.photos/500/300?image=${1 * 5 + 10}`,
      image_4_url: `https://picsum.photos/500/300?image=${1 * 5 + 10}`,
      valid: null,
    };
  },
  methods: {
    handleImage1(e) {
      console.log(e);
      this.image_1 = e.target.files[0];
      this.image_1_url = URL.createObjectURL(this.image_1);
    },
    handleImage2(e) {
      this.image_2 = e.target.files[0];
      this.image_2_url = URL.createObjectURL(this.image_2);
    },
    handleImage3(e) {
      this.image_3 = e.target.files[0];
      this.image_3_url = URL.createObjectURL(this.image_3);
    },
    handleImage4(e) {
      this.image_4 = e.target.files[0];
      this.image_4_url = URL.createObjectURL(this.image_4);
    },

    submit() {
      let data = new FormData();
      data.append("image_1", this.image_1);
      data.append("image_2", this.image_2);
      data.append("image_3", this.image_3);
      data.append("image_4", this.image_4);
      data.append("branch_id", this.$route.params.id);

      this.hotelBranchAdminService.addInteriorImages(data).then((result) => {
        console.log(result.data);
      });
    },
  },
};
</script>

<style>
</style>