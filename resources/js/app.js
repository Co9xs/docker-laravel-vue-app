import "./bootstrap";
import Vue from 'vue';
import App from './App.vue'
import router from "./router";
import store from "./store";

const createApp = async () => {
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
