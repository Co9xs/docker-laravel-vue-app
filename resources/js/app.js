import "./bootstrap";
import Vue from 'vue';
import App from './App.vue'
import router from "./router";
import store from "./store";
import Toasted from 'vue-toasted';

Vue.use(Toasted);
const createApp = async () => {
    await store.dispatch("auth/currentUser");
    new Vue({
        el: "#app",
        router,
        store,
        components: {
            App
        },
        template: "<App />"
    });
}
createApp()
