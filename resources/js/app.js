import './bootstrap';
import bootstrap from 'bootstrap' 
import ConfirmationService from 'primevue/confirmationservice';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import PrimeVue from 'primevue/config';
import Maska from 'maska';
import Swal from "sweetalert2";
import Tooltip from 'primevue/tooltip';

window.swal = Swal;

const toast = Swal.mixin({
    toast: true,
    position: 'top-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
});
window.toast = toast;


createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .use(Maska)
      .use(PrimeVue)
      .directive('tooltip', Tooltip)
      .use(ConfirmationService)
      .mount(el)
  },
})