import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';
import Edit from '../views/Edit.vue';
import DayForm from '../views/DayForm.vue';
import Quality from '../views/Quality.vue';

Vue.use(VueRouter);

const routes = [{
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/form',
        name: 'Form',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "about" */ '../views/Form.vue'),
    },

    { path: '/edit/:id', component: Edit },
    {
        path: '/dayform',
        name: 'DayForm',
        component: DayForm,
    },
    {
        path: '/quality',
        name: 'Quality',
        component: Quality,
    },
];

const router = new VueRouter({
    routes,
});

export default router;