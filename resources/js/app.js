import "./bootstrap";
import Vue from 'vue';
import App from './App.vue'
import router from "./router";

const createApp = async () => {
    new Vue({
        el: "#app",
        router,
        components: { App },
        template: "<App />"
    });
}

createApp()
