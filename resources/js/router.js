import Vue from "vue";
import VueRouter from "vue-router";
import Top from "./pages/Top.vue";
import ReviewList from "./pages/Reviews/List.vue"
import ReviewDetail from "./pages/Reviews/Detail.vue"
Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Top
    },
    {
        path: "/reviews",
        component: ReviewList
    },
    {
        path: "/reviews/:id",
        component: ReviewDetail
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
