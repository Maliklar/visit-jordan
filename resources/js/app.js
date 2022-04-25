// require('./bootstrap')
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import App from './App.vue'
import router from "./router";
import store from "./store";
// import "bootstrap/dist/css/bootstrap.min.css";
// import "bootstrap/dist/js/bootstrap";

Vue.prototype.$bannerService = require('./javascript/api/bannerService');
Vue.prototype.$hotelService = require('./javascript/api/hotelService');
Vue.prototype.$carAdminService = require('./javascript/api/carAdminService');
Vue.prototype.$carBranchAdminService = require('./javascript/api/carBranchAdminService');
Vue.prototype.$cityService = require('./javascript/api/cityService');

// DONE
Vue.prototype.$hotelAdminService = require('./javascript/api/admin/hotel/hotelAdminService');
Vue.prototype.$hotelBranchAdminService = require('./javascript/api/admin/hotel/hotelBranchAdminService');
Vue.prototype.$hotelBranchImagesAdminService = require('./javascript/api/admin/hotel/hotelBranchImagesAdminService');
Vue.prototype.$roomCategoryAdminService = require('./javascript/api/admin/hotel/roomCategoryAdminService');
Vue.prototype.$roomCategoryImagesAdminService = require('./javascript/api/admin/hotel/roomCategoryImagesAdminService');
Vue.prototype.$roomAdminService = require('./javascript/api/admin/hotel/roomAdminService');
Vue.prototype.$reservationAdminService = require('./javascript/api/admin/hotel/reservationAdminService');


// Public 
Vue.prototype.$userService = require('./javascript/api/userService');


import Vue from 'vue'






import vuetify from './plugins/vuetify'

Vue.config.productionTip = false

new Vue({
    vuetify,
    router,
    store,
    render: h => h(App)
}).$mount('#app')