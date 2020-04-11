import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';
import Edit from '../views/Edit.vue';

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
];

const router = new VueRouter({
    routes,
});

export default router;