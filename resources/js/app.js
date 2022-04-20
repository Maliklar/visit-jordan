// require('./bootstrap')
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import App from './App.vue'
import router from "./router";
import store from "./store";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap";

const bannerService = require('./javascript/api/bannerService');
const hotelService = require('./javascript/api/hotelService');
const userService = require('./javascript/api/userService');
const hotelBranchAdminService = require('./javascript/api/hotelBranchAdminService');
const carAdminService = require('./javascript/api/carAdminService');
const hotelAdminService = require('./javascript/api/hotelAdminService');
const carBranchAdminService = require('./javascript/api/carBranchAdminService');
const roomCategoryAdminService = require('./javascript/api/roomCategoryAdminService');
const hotelRoomAdminService = require('./javascript/api/hotelRoomAdminService');
const cityService = require('./javascript/api/cityService');


import Vue from 'vue'







import vuetify from './plugins/vuetify'
const GLOBAL = {
    data: () => {
        return {
            bannerService: bannerService,
            hotelService: hotelService,
            userService: userService,
            hotelAdminService: hotelAdminService,
            hotelBranchAdminService: hotelBranchAdminService,
            carAdminService: carAdminService,
            carBranchAdminService: carBranchAdminService,
            cityService: cityService,
            roomCategoryAdminService: roomCategoryAdminService,
            hotelRoomAdminService: hotelRoomAdminService,
        };
    },
};
Vue.config.productionTip = false

new Vue({
    vuetify,
    router,
    store,
    mixins: [GLOBAL],
    render: h => h(App)
}).$mount('#app')