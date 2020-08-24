import Vue from "vue";
import VueRouter from "vue-router";
import Top from "./pages/Top.vue";
import ReviewList from "./pages/Reviews/List.vue"
import ReviewDetail from "./pages/Reviews/Detail.vue"
import CompanyList from "./pages/Companies/List.vue"
import User from "./pages/User.vue"
import Login from "./pages/Auth/Login.vue"
import Register from "./pages/Auth/Register.vue"

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Top
    },
    {
        path: "/login",
        component: Login
    },
    {
        path: "/register",
        component: Register
    },
    {
        path: "/home",
        component: User
    },
    {
        path: "/reviews",
        component: ReviewList
    },
    {
        path: "/reviews/:id",
        component: ReviewDetail
    },
    // {
    //     path: "/companies",
    //     component: CompanyList
    // }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
