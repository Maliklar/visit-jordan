<template>
  <v-card>
    <v-container>
      <v-row>
        <v-col cols="12" md="8">
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

          <v-container>
            <v-row>
              <v-col cols="6">
                <v-list-item two-line>
                  <v-list-item-icon>
                    <v-icon>mdi-email</v-icon>
                  </v-list-item-icon>
                  <v-list-item-content>
                    <v-list-item-title>Email Address</v-list-item-title>
                    <v-list-item-subtitle>{{
                      branch.email
                    }}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item two-line>
                  <v-list-item-icon>
                    <v-icon>mdi-phone</v-icon>
                  </v-list-item-icon>
                  <v-list-item-content>
                    <v-list-item-title>Phone Number</v-list-item-title>
                    <v-list-item-subtitle>{{
                      branch.phone
                    }}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item two-line>
                  <v-list-item-icon>
                    <v-icon>mdi-bed</v-icon>
                  </v-list-item-icon>
                  <v-list-item-content>
                    <v-list-item-title>Number Of Rooms</v-list-item-title>
                    <v-list-item-subtitle>{{
                      branch.phone
                    }}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-list-item two-line>
                  <v-list-item-icon>
                    <v-icon>mdi-map-marker</v-icon>
                  </v-list-item-icon>
                  <v-list-item-content>
                    <v-list-item-title>Location Description</v-list-item-title>
                    <v-list-item-subtitle>{{
                      branch.description
                    }}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-col>
              <v-col cols="6">
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
            </v-row>
          </v-container>
        </v-col>
        <v-col cols="6" md="4">
          <v-row>
            <v-container>
              <v-img src="https://picsum.photos/510/300?random">
                <v-card-title> Building</v-card-title>
              </v-img>
            </v-container>
          </v-row>
          <v-row>
            <v-container>
              <v-img src="https://picsum.photos/510/300?random">
                <v-card-title> Views</v-card-title>
              </v-img>
            </v-container>
          </v-row>

          <v-row>
            <v-container>
              <iframe
                class="w-100"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13535.959527558934!2d35.88251364999999!3d31.988289749999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca0317eda425b%3A0x5bfe932d997924f!2zSmFicmkgUmVzdGF1cmFudCAoQ2VudHJhbCBCcmFuY2gpINmF2LfYudmFINis2KjYsdmKINin2YTZhdix2YPYstmK!5e0!3m2!1sen!2sjo!4v1650447821413!5m2!1sen!2sjo"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </v-container>
          </v-row>
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

      <!-- <v-row>
        <v-col cols="12" md="8">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis
          ullam fuga accusantium ipsam placeat autem repellat iure ea illo
          labore molestiae, iusto vel aliquam, magnam, vero optio doloremque
          laboriosam esse repudiandae blanditiis mollitia debitis! Vero vitae
          incidunt ex at, fugiat id distinctio repudiandae odio dicta voluptatum
          unde quibusdam tempore debitis nemo, dignissimos quo voluptas eius,
          enim odit cumque nisi velit qui facere. Nihil voluptate quasi, id non
          ad fugit, saepe eligendi, totam odit necessitatibus doloremque! Totam,
          nam magnam sequi distinctio officiis non commodi iure numquam libero
          quisquam perspiciatis iste quos optio fugiat itaque minus eligendi
          nihil earum eius maiores, aspernatur enim est accusantium? Eveniet,
          rem officia sapiente maxime rerum cum quibusdam animi eaque pariatur
          laborum quis quae libero. Asperiores incidunt harum quisquam ipsum
          maxime voluptates delectus consectetur autem dolore doloribus placeat
          facilis ducimus praesentium, debitis iusto vel consequatur atque
          ratione quasi laborum magnam sequi mollitia aut. Repudiandae deserunt
          itaque explicabo veritatis tempore fugit doloremque eligendi,
          aspernatur eius? Ipsam ad esse voluptas corrupti libero? Beatae sint
          aliquid voluptates maxime vel fugiat accusantium non dolorem
          aspernatur tenetur repellendus ea corrupti, totam accusamus!
        </v-col>
        <v-col cols="6" md="4">
          <v-card class="pa-2" outlined tile
            ><v-img src="https://picsum.photos/510/300?random">
              <v-card-title>
                <v-icon icon="mdi-office-building-outline"></v-icon>
                {{ branch.name }}</v-card-title
              >
              <v-card-title>
                <v-icon icon="mdi-map-marker"></v-icon>
                {{ branch.city.name }}</v-card-title
              ></v-img
            ></v-card
          >
        </v-col>
      </v-row>

      <v-row>
        <v-col cols="12" md="8">
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
        </v-col>
        <v-col cols="6" md="4">
          <v-card class="pa-2" outlined tile>
            <iframe
              class="map"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13535.959527558934!2d35.88251364999999!3d31.988289749999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca0317eda425b%3A0x5bfe932d997924f!2zSmFicmkgUmVzdGF1cmFudCAoQ2VudHJhbCBCcmFuY2gpINmF2LfYudmFINis2KjYsdmKINin2YTZhdix2YPYstmK!5e0!3m2!1sen!2sjo!4v1650447821413!5m2!1sen!2sjo"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe
          ></v-card>
        </v-col>
      </v-row> -->
    </v-container>
  </v-card>
</template>

<script>
export default {
  props: {
    branch: Object,
  },
};
</script>

<style>
.map {
  width: 100%;
}
</style>