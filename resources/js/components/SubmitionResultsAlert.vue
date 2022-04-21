<template>
  <v-alert v-if="status < 300"  :value="alert" transition="scale-transition" prominent type="success">
    <v-row align="center">
      <v-col class="grow" v-text="message"> </v-col>
      <v-col class="shrink">
        <v-btn @click="alert = !alert">Close</v-btn>
      </v-col>
    </v-row>
  </v-alert>
  <v-alert  :value="alert" transition="scale-transition" v-else prominent type="error">
    <v-row align="center">
      <v-col class="grow" v-text="message"> </v-col>
      <v-col class="shrink">
        <v-btn @click="alert = !alert">Close</v-btn>
      </v-col>
    </v-row>
  </v-alert>
</template>

<script>
export default {
  props: {
    message: Object,
    status: Number,
  },
  data() {
    return {
      alert: true,
    };
  },
};
</script>
