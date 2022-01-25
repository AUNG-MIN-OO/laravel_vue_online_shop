import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
// import plugin
import VueToastr from "vue-toastr";
import { Link } from '@inertiajs/inertia-vue'
import VueSweetalert2 from 'vue-sweetalert2';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

// use plugin
Vue.use(VueToastr);


createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin)

        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})

Vue.component('inertia-link', Link)


