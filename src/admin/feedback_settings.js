import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);




import {routes} from './routes'
import Application from './App.vue'

const router = new VueRouter({
    routes,
    linkActiveClass: 'active'
});

window.ninjaTableBus = new Vue();

Application.router = router;
window.ninjaApp = new Vue(Application).$mount('#ninja_feedback_app');