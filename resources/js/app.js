/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueProgressBar from 'vue-progressbar';
import router from './router.js';
import wysiwyg from "vue-wysiwyg";


/**
 * Screens
 */
import Signin from './components/screens/Signin.vue';
import Candidate from './components/screens/signup/Candidate.vue';
import Employer from './components/screens/signup/Employer.vue';

/**
 * Partials
 */
import NavHeader from './components/partials/NavHeader.vue';
import MainNav from './components/partials/MainNav.vue';
import Footer from './components/partials/Footer.vue';
import Sidebar from './components/partials/Sidebar.vue';
import App from './components/screens/dashboard/App.vue';

Vue.use(wysiwyg, {});

Vue.use(VueRouter);
Vue.use(VueProgressBar, {
  color: '#0acf97',
  failedColor: '#fa5c7c',
  thickness: '4px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false
});

export const bus = new Vue();

new Vue({
  router,
  components: {
    App,
    Signin,
    MainNav,
    NavHeader,
    Sidebar,
    Footer,
    'signup-candidate': Candidate,
    'signup-employer': Employer
  }
}).$mount('#app');