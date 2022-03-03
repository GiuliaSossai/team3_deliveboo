import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './components/pages/Homepage/Home';
import Restaurants from './components/pages/restaurants/Restaurants';
import Error404 from './components/pages/Error404';

const router = new VueRouter({
  mode: 'history',

  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/ristoranti',
      name: 'restaurants',
      component: Restaurants,
    },
    {
      path: '*',
      name: 'error404', 
      component: Error404,
    },
  ]
});

  export default router;