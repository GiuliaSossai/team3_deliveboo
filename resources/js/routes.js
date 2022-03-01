import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './components/pages/Homepage/Home';

const router = new VueRouter({
  mode: 'history',

  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
  ]
});

  export default router;