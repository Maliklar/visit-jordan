// require('./bootstrap')

import { createApp } from 'vue'
import App from './App.vue'
import router from "./router";
import store from "./store";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap";

import { createVuetify } from 'vuetify'
// import "./assets/css/main.css";
const bannerService = require('./javascript/api/bannerService');
const hotelService = require('./javascript/api/hotelService');
const userService = require('./javascript/api/userService');
console.log('env:  ', process.env.MIX_PUSHER_APP_API);
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
})

const GLOBAL = {
    data() {
        return {
            bannerService: bannerService,
            hotelService: hotelService,
            userService: userService,
        };
    },
};

const app = createApp(App);
app.use(router);
app.use(store);
app.use(vuetify)
app.mixin(GLOBAL);


app.mount('#app');