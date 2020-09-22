import Vue from "vue";
import VueRouter from "vue-router";
import Top from "./pages/Top.vue";
import ReviewList from "./pages/Reviews/List.vue";
import ReviewDetail from "./pages/Reviews/Detail.vue";
import ReviewEdit from "./pages/Reviews/Edit.vue";
import InfomationOfCorporateAPI from "./pages/InfomationOfCorporateAPI.vue";
import PrivacyPolicy from "./pages/PrivacyPolicy.vue";
import CompanyList from "./pages/Companies/List.vue";
import CompanyDetail from "./pages/Companies/Detail.vue";
import MyPage from "./pages/MyPage.vue";
import Contact from "./pages/Contact.vue";
import Login from "./pages/Auth/Login.vue";
import Register from "./pages/Auth/Register.vue";
import NotFound from "./pages/NotFound.vue";
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
            if (store.getters["auth/checkAuth"]) {
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
        component: MyPage,
        beforeEnter(to, from, next) {
            if (!store.getters["auth/checkAuth"]) {
                next("/login");
            } else if (store.getters["auth/userId"] != to.params.id) {
                next(from);
            } else {
                next();
            }
        }
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
        path: "/company-api-info",
        component: InfomationOfCorporateAPI
    },
    {
        path: "/privacy-policy",
        component: PrivacyPolicy
    },
    {
        path: "/contact",
        component: Contact
    },
        // {
        //     path: "/reviews/*",
        //     component: NotFound
        // },
        // {
        //     path: "/reviews/*/edit",
        //     component: NotFound
        // },
        // {
        //     path: "/companies/*/review/create",
        //     component: NotFound
        // },
    {
        path: "/*",
        component: NotFound
    }
];

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;
