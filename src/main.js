import Vue from "vue";
import App from "./App.vue";
import router from "./router";
// css framework
import FishUI from 'fish-ui';
// fresh date
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.config.productionTip = false;
Vue.use(FishUI);
Vue.use(VueAxios, axios)
new Vue({
    router,
    render: h => h(App)
}).$mount("#app");