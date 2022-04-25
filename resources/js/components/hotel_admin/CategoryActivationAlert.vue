<template>
  <v-progress-circular
    v-if="isLoading"
    :size="70"
    :width="7"
    color="purple"
    indeterminate
  ></v-progress-circular>
  <v-alert v-else-if="activeState" prominent type="success">
    <v-row align="center">
      <v-col class="grow">
        <div v-if="resultMessage">{{ resultMessage }}</div>
        <div v-else>The branch is active</div>
      </v-col>
      <v-col class="shrink">
        <v-btn @click="deactivate" color="error">Deactivate</v-btn>
      </v-col>
    </v-row>
  </v-alert>

  <v-alert v-else prominent type="error">
    <v-row align="center">
      <v-col class="grow">
        <div v-if="resultMessage">
          {{ resultMessage.message }}
          <ul>
            <li v-for="err in resultMessage.errors" :key="err">
              {{ err }}
            </li>
          </ul>
        </div>
        <div v-else>
          The branch is not active and is not visible to public users
        </div>
      </v-col>
      <v-col class="shrink">
        <v-btn @click="activate" color="success">Activate</v-btn>
      </v-col>
    </v-row>
  </v-alert>
</template>

<script>
export default {
  name: "CategoryActivationAlert",
  async created() {
    this.activeState = this.active;
  },
  props: {
    active: Boolean,
    id: Number,
  },
  data() {
    return {
      activeState: null,
      resultMessage: null,
      isLoading: false,
    };
  },
  methods: {
    activate() {
      this.isLoading = true;
      this.$roomCategoryAdminService.activate(this.id).then((result) => {
        if (result.status == 200) {
          this.activeState = true;
        } else {
          this.activeState = false;
        }
        this.resultMessage = result.data;
        console.log(this.resultMessage);

        this.isLoading = false;
      });
    },
    deactivate() {},
  },
};
</script>

<style>
</style>