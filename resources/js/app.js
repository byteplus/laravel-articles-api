/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'

import Articles from './components/Articles.vue';
import NavBar from './components/NavBar.vue';

Vue.component('articles', Articles);
Vue.component('navbar', NavBar);

const app = new Vue({
    el: '#app'
});
