// require('./bootstrap')
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import App from './App.vue'
import router from "./router";
import store from "./store";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap";

Vue.prototype.$bannerService = require('./javascript/api/bannerService');
Vue.prototype.$hotelService = require('./javascript/api/hotelService');
Vue.prototype.$userService = require('./javascript/api/userService');
Vue.prototype.$hotelBranchAdminService = require('./javascript/api/hotelBranchAdminService');
Vue.prototype.$carAdminService = require('./javascript/api/carAdminService');
Vue.prototype.$hotelAdminService = require('./javascript/api/hotelAdminService');
Vue.prototype.$carBranchAdminService = require('./javascript/api/carBranchAdminService');
Vue.prototype.$roomCategoryAdminService = require('./javascript/api/roomCategoryAdminService');
Vue.prototype.$cityService = require('./javascript/api/cityService');


import Vue from 'vue'






import vuetify from './plugins/vuetify'

Vue.config.productionTip = false

new Vue({
    vuetify,
    router,
    store,
    render: h => h(App)
}).$mount('#app')