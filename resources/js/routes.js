import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './components/pages/homepage/Home';
import Restaurants from './components/pages/restaurants/Restaurants';
import Show from './components/pages/show-restaurant/Show';
import Checkout from './components/pages/Checkout';
import Error404 from './components/pages/Error404';
import Prova from './components/partials/Prova';

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
      path: '/ristoranti/:slug',
      name: 'restaurants-show',
      component: Show,
    },
    {
      path: '/checkout',
      name: 'checkout',
      component: Checkout,
    },
    {
      path: '/prova',
      name: 'prova',
      component: Prova,
    },
    {
      path: '*',
      name: 'error404', 
      component: Error404,
    },
  ]
});

  export default router;