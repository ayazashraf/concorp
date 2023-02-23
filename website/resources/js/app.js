/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
require('./bootstrap');

  window.Vue = require('vue');

  window.events = new Vue();
  
  window.flash = function(message) {
      window.events.$emit('flash',message);
  }
     
  
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//import BusinessComponent from './components/BusinessComponent.vue';
import Testimonials from './components/Testimonials.vue';

import LoginComponent from './components/LoginComponent.vue';

import BookingComponent from './components/BookingComponent.vue';

//Vue.component('business-component', require('./components/BusinessComponent.vue'));
Vue.component('testimonials', require('./components/Testimonials.vue').default);
Vue.component('loginmodal', require('./components/LoginComponent.vue').default);
Vue.component('bookingmodal', require('./components/BookingComponent.vue').default);
Vue.component('flash', require('./components/Flash.vue').default);

 // register modal component

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component("modal", {
  template: "#modal-template"
});

// this requires the compiler
new Vue({
    el: '#app',
    components: {Testimonials,LoginComponent,flash,BookingComponent},
    data: {
      isModalVisible : false,
      isBookingVisible : false
    },    
    methods: {
      showModal() {
        this.isModalVisible = true;
      },
      showBookingModal() {
        this.isBookingVisible = true;
      },
      closeBookingModal() {
        this.isBookingVisible = false;
      },
      closeModal() {
        this.isModalVisible = false;
      }
    }
  })
  