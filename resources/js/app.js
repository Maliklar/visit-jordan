// require('./bootstrap')

import { createApp } from 'vue'
import App from './App.vue'
import router from "./router";
import store from "./store";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap";
import { aliases, mdi } from 'vuetify/lib/iconsets/mdi'
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader

import { createVuetify } from 'vuetify'
const bannerService = require('./javascript/api/bannerService');
const hotelService = require('./javascript/api/hotelService');
const userService = require('./javascript/api/userService');
const branchService = require('./javascript/api/branchService');
const carAdminService = require('./javascript/api/carAdminService');
const hotelAdminService = require('./javascript/api/hotelAdminService');
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'





const vuetify = createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: 'dark',
        themes: {

        }
    },
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        }
    },

})

const GLOBAL = {
    data() {
        return {
            bannerService: bannerService,
            hotelService: hotelService,
            userService: userService,
            hotelAdminService: hotelAdminService,
            branchService: branchService,
            carAdminService: carAdminService,
        };
    },
};

const app = createApp(App);
app.use(router);
app.use(store);
app.use(vuetify)
app.mixin(GLOBAL);


app.mount('#app');