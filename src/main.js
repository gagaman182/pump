import Vue from 'vue';
import App from './App.vue';
import router from './router';
// css framework
import FishUI from 'fish-ui';
// fresh date
import axios from 'axios';
import VueAxios from 'vue-axios';

//progress scroll bar
import VueScrollProgressBar from '@guillaumebriday/vue-scroll-progress-bar';

//import material-icon scss
import 'font-awesome/css/font-awesome.min.css';

//font awesome
import { library } from '@fortawesome/fontawesome-svg-core';
import { faUserSecret } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
library.add(faUserSecret);

Vue.component('font-awesome-icon', FontAwesomeIcon);
//Number input
import VueNumberInput from '@chenfengyuan/vue-number-input';

//defined as global component
Vue.component(
    'VueFontawesome',
    require('vue-fontawesome-icon/VueFontawesome.vue').default
);

// new model
import VueModalTor from 'vue-modaltor';
Vue.use(VueModalTor);

var VueResource = require('vue-resource');
Vue.use(VueResource);

//good table
import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css';
Vue.use(VueGoodTablePlugin);

Vue.config.productionTip = false;
Vue.use(FishUI);
Vue.use(VueAxios, axios);
Vue.use(VueScrollProgressBar);
//Number input
Vue.component(VueNumberInput.name, VueNumberInput);

new Vue({
    router,
    render: (h) => h(App),
}).$mount('#app');