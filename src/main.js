import Vue from "vue";
import App from "./App.vue";
import router from "./router";

import FishUI from 'fish-ui';


Vue.config.productionTip = false;
Vue.use(FishUI);
new Vue({
    router,
    render: h => h(App)
}).$mount("#app");