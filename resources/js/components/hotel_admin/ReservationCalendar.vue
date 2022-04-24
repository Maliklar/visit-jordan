<template>
  <v-row class="fill-height">
    <v-col>
      <v-sheet height="64">
        <v-toolbar flat>
          <v-btn outlined class="mr-4" color="grey darken-2" @click="setToday">
            Today
          </v-btn>
          <v-btn fab text small color="grey darken-2" @click="prev">
            <v-icon small> mdi-chevron-left </v-icon>
          </v-btn>
          <v-btn fab text small color="grey darken-2" @click="next">
            <v-icon small> mdi-chevron-right </v-icon>
          </v-btn>
          <v-toolbar-title v-if="$refs.calendar">
            {{ $refs.calendar.title }}
          </v-toolbar-title>
          <v-spacer></v-spacer>
          <v-menu bottom right>
            <template v-slot:activator="{ on, attrs }">
              <v-btn outlined color="grey darken-2" v-bind="attrs" v-on="on">
                <span>{{ typeToLabel[type] }}</span>
                <v-icon right> mdi-menu-down </v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item @click="type = 'day'">
                <v-list-item-title>Day</v-list-item-title>
              </v-list-item>
              <v-list-item @click="type = 'week'">
                <v-list-item-title>Week</v-list-item-title>
              </v-list-item>
              <v-list-item @click="type = 'month'">
                <v-list-item-title>Month</v-list-item-title>
              </v-list-item>
              <v-list-item @click="type = '4day'">
                <v-list-item-title>4 days</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-toolbar>
      </v-sheet>
      <v-sheet height="600">
        <v-calendar
          ref="calendar"
          v-model="focus"
          color="primary"
          :events="events"
          :event-color="getEventColor"
          :type="type"
          @click:event="showEvent"
          @click:more="viewDay"
          @click:date="viewDay"
          @change="updateRange"
        ></v-calendar>
        <v-menu
          v-model="selectedOpen"
          :close-on-content-click="false"
          :activator="selectedElement"
          offset-x
        >
          <v-card color="grey lighten-4" min-width="350px" flat>
            <v-toolbar :color="selectedEvent.color" dark>
              <v-btn icon>
                <v-icon>mdi-pencil</v-icon>
              </v-btn>
              <v-toolbar-title v-html="selectedEvent.name"></v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn icon>
                <v-icon>mdi-heart</v-icon>
              </v-btn>
              <v-btn icon>
                <v-icon>mdi-dots-vertical</v-icon>
              </v-btn>
            </v-toolbar>
            <v-card-text>
              <span v-html="selectedEvent.details"></span>
            </v-card-text>
            <v-card-actions>
              <v-btn text color="secondary" @click="selectedOpen = false">
                Cancel
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-menu>
      </v-sheet>
    </v-col>
  </v-row>
</template>


<script>
export default {
  async created() {
    this.date = new Date();
    this.today =
      this.date.getFullYear() +
      "-" +
      (this.date.getMonth() + 1) +
      "-" +
      this.date.getDate();
    this.$adminRoomReservations.get(18).then((result) => {
      console.log(result.data);
      for (let i = 0; i < result.data.length; i++) {
        this.events.push({
          name: "Reserved",
          start: this.formatDate(result.data[i].check_in),
          end: this.formatDate(result.data[i].check_out),
          color: "green",
          timed: false,
        });
      }
      this.f = this.formatDate(result.data[0].check_in);
      this.e = this.formatDate(result.data[0].check_out);
      console.log(this.f);
    });
  },
  data: () => ({
    f: null,
    e: null,
    focus: "",
    type: "month",
    typeToLabel: {
      month: "Month",
      week: "Week",
      day: "Day",
      "4day": "4 Days",
    },
    selectedEvent: {},
    selectedElement: null,
    selectedOpen: false,
    events: [],
    colors: ["blue"],
    names: ["Meeting"],
  }),
  mounted() {
    this.$refs.calendar.checkChange();
  },
  methods: {
    viewDay({ date }) {
      this.focus = date;
      this.type = "day";
    },
    getEventColor(event) {
      return event.color;
    },
    setToday() {
      this.focus = "";
    },
    prev() {
      this.$refs.calendar.prev();
    },
    next() {
      this.$refs.calendar.next();
    },
    showEvent({ nativeEvent, event }) {
      const open = () => {
        this.selectedEvent = event;
        this.selectedElement = nativeEvent.target;
        requestAnimationFrame(() =>
          requestAnimationFrame(() => (this.selectedOpen = true))
        );
      };

      if (this.selectedOpen) {
        this.selectedOpen = false;
        requestAnimationFrame(() => requestAnimationFrame(() => open()));
      } else {
        open();
      }

      nativeEvent.stopPropagation();
    },
    formatDate(date) {
      var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2) month = "0" + month;
      if (day.length < 2) day = "0" + day;
      console.log([year, month, day].join("-"));
      return [year, month, day].join("-");
    },
    updateRange({ start, end }) {
      const min = new Date(`${start.date}T00:00:00`);
      const max = new Date(`${end.date}T23:59:59`);
    },
  },
};

// export default {
//   async created() {
//     this.date = new Date();
//     this.today =
//       this.date.getFullYear() +
//       "-" +
//       (this.date.getMonth() + 1) +
//       "-" +
//       this.date.getDate();
//     this.$adminRoomReservations.get(18).then((result) => {
//       console.log(result.data);
//       this.f = this.formatDate(result.data[0].check_in);
//       this.e = this.formatDate(result.data[0].check_out);
//       console.log(this.f);
//     });
//   },
//   data: () => ({
//     date: new Date(),
//     f: null,
//     e: null,

//     today: null,
//     tracked: [{ check_in: this.f, check_out: this.e }],
//     colors: ["green"],
//     category: ["Reserved"],
//   }),
//   methods: {
//     formatDate(date) {
//       var d = new Date(date),
//         month = "" + (d.getMonth() + 1),
//         day = "" + d.getDate(),
//         year = d.getFullYear();

//       if (month.length < 2) month = "0" + month;
//       if (day.length < 2) day = "0" + day;

//       return [year, month, day].join("-");
//     },
//   },
// };
</script>
