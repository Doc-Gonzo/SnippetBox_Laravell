/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from "bootstrap-vue";
import Vuex from 'vuex';

Vue.use(BootstrapVue);
Vue.use(Vuex);
/* import storeData from "./store/index"; */

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('snippet_list_smart', require('./components/snippet_list_smart.vue').default);
Vue.component('main_auto', require('./components/main_auto.vue').default);
Vue.component('snippet_detail', require('./components/snippet_detail').default);
Vue.component('addLanguage', require('./components/addLanguage').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
    state: {
        isHidden: false,
        snippet_detail_id:12,
    },
    mutations:{
        toggle_isHidden(state){
            state.isHidden = !state.isHidden;
        },
        set_snippet_detail_id(state,id){
            state.snippet_detail_id = id;        }
    },
    actions: {
        change_isHidden(){
            store.commit('toggle_isHidden')
        },
        set_snippet_detail_action(id) {
            store.commit('set_snippet_detail_id', id)
        }
    },
    getters: {
        getIsHidden: state => {
            return state.isHidden;
        },
        snippet_detail_id: state => {
            return state.snippet_detail_id;
        }
    }
})
const app = new Vue({
    el: '#app',
    store,
});


function loadDoc() {

}

