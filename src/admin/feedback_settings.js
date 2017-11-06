import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

import 'element-ui/lib/theme-chalk/tabs.css';
import 'element-ui/lib/theme-chalk/tab-pane.css';

import { Tabs, TabPane } from 'element-ui';
Vue.use(Tabs)
Vue.use(TabPane)


import {routes} from './routes'
import Application from './App.vue'

const router = new VueRouter({
    routes,
    linkActiveClass: 'active'
});

window.ninjaTableBus = new Vue();

Application.router = router;
window.ninjaFeedback = new Vue(Application).$mount('#ninja_feedback_app');