<template>
  <v-card>
    <v-container>
      <v-row>
        <v-col cols="6" md="6">
          <v-img src="https://picsum.photos/510/300?random">
            <v-card-title>
              <v-icon>mdi-office-building-outline</v-icon>
              {{ branch.name }}
            </v-card-title>
            <v-card-title>
              <v-icon>mdi-map-marker</v-icon>
              {{ branch.city.name }}
            </v-card-title>
          </v-img>
        </v-col>
        <v-col cols="3" md="3">
          <v-img class="h-100" src="https://picsum.photos/510/300?random">
            <v-card-title>
              <v-icon>mdi-office-building-outline</v-icon>
              {{ branch.name }}
            </v-card-title>
            <v-card-title>
              <v-icon>mdi-map-marker</v-icon>
              {{ branch.city.name }}
            </v-card-title>
          </v-img>
        </v-col>
        <v-col cols="3" md="3" sm="0">
          <v-img class="h-100" src="https://picsum.photos/510/300?random">
            <v-card-title>
              <v-icon>mdi-office-building-outline</v-icon>
              {{ branch.name }}
            </v-card-title>
            <v-card-title>
              <v-icon>mdi-map-marker</v-icon>
              {{ branch.city.name }}
            </v-card-title>
          </v-img>
        </v-col>
      </v-row>

      <v-row>
        <v-col cols="5">
          <v-list-item two-line>
            <v-list-item-icon>
              <v-icon>mdi-email</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Email Address</v-list-item-title>
              <v-list-item-subtitle>{{ branch.email }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item two-line>
            <v-list-item-icon>
              <v-icon>mdi-phone</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Phone Number</v-list-item-title>
              <v-list-item-subtitle>{{ branch.phone }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <v-list-item two-line>
            <v-list-item-icon>
              <v-icon>mdi-bed</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Number Of Rooms</v-list-item-title>
              <v-list-item-subtitle>{{ branch.phone }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
          <!-- <v-list-item two-line>
            <v-list-item-icon>
              <v-icon>mdi-map-marker</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Location Description</v-list-item-title>
              <v-list-item-subtitle>{{
                branch.description
              }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item> -->
        </v-col>
        <v-col cols="3">
          <v-list-item v-if="branch.swimming_pool">
            <v-list-item-icon>
              <v-icon>mdi-pool</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title
                >Swimming Pool
                <v-icon color="green"
                  >mdi-check-circle</v-icon
                ></v-list-item-title
              >
            </v-list-item-content>
          </v-list-item>
          <v-list-item v-if="branch.resturant">
            <v-list-item-icon>
              <v-icon>mdi-food</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title
                >Resturant
                <v-icon color="green">mdi-check-circle</v-icon>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-list-item v-if="branch.gym">
            <v-list-item-icon>
              <v-icon>mdi-weight-lifter</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title
                >Hotel Gym
                <v-icon color="green"
                  >mdi-check-circle</v-icon
                ></v-list-item-title
              >
            </v-list-item-content>
          </v-list-item>
          <v-list-item v-if="branch.laundry">
            <v-list-item-icon>
              <v-icon>mdi-tumble-dryer</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title
                >Laundry Service
                <v-icon color="green"
                  >mdi-check-circle</v-icon
                ></v-list-item-title
              >
            </v-list-item-content>
          </v-list-item>
        </v-col>
        <v-col cols="4">
          <iframe
            class="w-100 h-100"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13535.959527558934!2d35.88251364999999!3d31.988289749999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca0317eda425b%3A0x5bfe932d997924f!2zSmFicmkgUmVzdGF1cmFudCAoQ2VudHJhbCBCcmFuY2gpINmF2LfYudmFINis2KjYsdmKINin2YTZhdix2YPYstmK!5e0!3m2!1sen!2sjo!4v1650447821413!5m2!1sen!2sjo"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </v-col>
      </v-row>
      <v-row>
        <v-container>
          <v-alert prominent type="error">
            <v-row align="center">
              <v-col class="grow">
                Nunc nonummy metus. Nunc interdum lacus sit amet orci. Nullam
                dictum felis eu pede mollis pretium. Cras id dui.
              </v-col>
              <v-col class="shrink">
                <v-btn>Take action</v-btn>
              </v-col>
            </v-row>
          </v-alert>
        </v-container>
      </v-row>
    </v-container>
  </v-card>
</template>

<script>
export default {
  props: {
    branch: Object,
  },
};

// <v-container>
//   <iframe
//     class="w-100"
//     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13535.959527558934!2d35.88251364999999!3d31.988289749999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca0317eda425b%3A0x5bfe932d997924f!2zSmFicmkgUmVzdGF1cmFudCAoQ2VudHJhbCBCcmFuY2gpINmF2LfYudmFINis2KjYsdmKINin2YTZhdix2YPYstmK!5e0!3m2!1sen!2sjo!4v1650447821413!5m2!1sen!2sjo"
//     style="border: 0"
//     allowfullscreen=""
//     loading="lazy"
//     referrerpolicy="no-referrer-when-downgrade"
//   ></iframe>
// </v-container>;
</script>

<style>
.map {
  width: 100%;
}
</style>