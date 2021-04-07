require("./bootstrap");

import { App, plugin } from "@inertiajs/inertia-vue";
import Vue from "vue";
import Vuelidate from "vuelidate";

Vue.use(plugin, Vuelidate);

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
