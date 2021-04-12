require("./bootstrap");

import { App, plugin } from "@inertiajs/inertia-vue";
import Vue from "vue";

Vue.use(plugin);

import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
Vue.use(VueToast);
let instance = Vue.$toast.open("You did it!");
instance.dismiss();
Vue.$toast.clear();

const el = document.getElementById("app");

new Vue({
    render: h =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name => require(`./admins/${name}`).default
                /*resolveComponent: (name) => require(`./Client/${name}`).default, */
            }
        })
}).$mount(el);
