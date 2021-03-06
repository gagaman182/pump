import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';
import Edit from '../views/Edit.vue';
import DayForm from '../views/DayForm.vue';
import Quality from '../views/Quality.vue';
import Login from '../views/Login.vue';
import DayForm_Edit from '../views/DayForm_Edit.vue';
import Quality_Edit from '../views/Quality_Edit.vue';

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
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },

    { path: '/dayform_edit/:id', component: DayForm_Edit },
    { path: '/quality_edit/:id', component: Quality_Edit },
];

const router = new VueRouter({
    routes,
});

export default router;