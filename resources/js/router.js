import Vue from "vue";
import VueRouter from "vue-router";
import Top from "./pages/Top.vue";
import ReviewList from "./pages/Reviews/List.vue";
import ReviewDetail from "./pages/Reviews/Detail.vue";
import ReviewEdit from "./pages/Reviews/Edit.vue";
import ReviewCreate from "./pages/Reviews/Create.vue";
import CompanyList from "./pages/Companies/List.vue";
import CompanyDetail from "./pages/Companies/Detail.vue";
import MyPage from "./pages/MyPage.vue";
import Login from "./pages/Auth/Login.vue";
import Register from "./pages/Auth/Register.vue";
import Test from "./pages/Test.vue";
import store from "./store";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Top
    },
    {
        path: "/login",
        component: Login,
        beforeEnter(to, from, next) {
            console.log("test");
            if (store.getters["auth/check"]) {
                next("/");
            } else {
                next();
            }
        }
    },
    {
        path: "/register",
        component: Register
    },
    {
        path: "/mypage/:id",
        component: MyPage
    },
    {
        path: "/reviews",
        component: ReviewList
    },
    {
        path: "/reviews/:id",
        component: ReviewDetail
    },
    {
        path: "/reviews/:id/edit",
        component: ReviewEdit
    },
    {
        path: "/companies/:corporateNum/review/create",
        component: CompanyDetail
    },
    {
        path: "/companies",
        component: CompanyList
    },
    {
        path: "/test",
        component: Test
    }
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
