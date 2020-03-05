import Vue from "vue";
import App from "./App.vue";
import router from "./router";
// css framework
import FishUI from 'fish-ui';
// fresh date
import axios from 'axios'
import VueAxios from 'vue-axios'

//progress scroll bar
import VueScrollProgressBar from '@guillaumebriday/vue-scroll-progress-bar'

Vue.config.productionTip = false;
Vue.use(FishUI);
Vue.use(VueAxios, axios)
Vue.use(VueScrollProgressBar)
new Vue({
    router,
    render: h => h(App)
}).$mount("#app");