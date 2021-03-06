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
Vue.component('snippet_list_smart', require('./components/snippet_list_smart.vue').default);
Vue.component('main_auto', require('./components/main_auto.vue').default);
Vue.component('main_auto_singlepage', require('./components/main_auto_singlepage.vue').default);
Vue.component('snippet_detail', require('./components/snippet_detail').default);
Vue.component('snippet_detail_smart', require('./components/snippet_detail_smart').default);
Vue.component('addLanguage', require('./components/addLanguage').default);
Vue.component('addSammlung', require('./components/addSammlung').default);
Vue.component('addSnippet', require('./components/addSnippet').default);
Vue.component('addContext', require('./components/addContext').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
    state: {
        user_id:1,
        isHidden: false,
        detailIsHidden:false,
        LanguageIsHidden:true,
        SammlungIsHidden:true,
        ContextIsHidden:true,
        addSnippetIsHidden:false,
        snippet_detail_id:12,
        snippet_detail:
            {
                titel:'',
                desc:'',
                content:'',
                langName:'',
            }
        ,
        languages: [],
        snippets: [],
    },
    mutations:{
        toggle_isHidden(state){
            state.isHidden = !state.isHidden;
        },
        toggle_LanguageIsHidden(state){
            state.LanguageIsHidden = !state.LanguageIsHidden;
        },
        toggle_SammlungIsHidden(state){
            state.SammlungIsHidden = !state.SammlungIsHidden;
        },
        toggle_ContextIsHidden(state){
            state.ContextIsHidden = !state.ContextIsHidden;
        },
        toggle_detailIsHidden(state){
            state.detailIsHidden = !state.detailIsHidden;
        },
        toggle_addSnippetIsHidden(state){
            state.addSnippetIsHidden = !state.addSnippetIsHidden;
        },
        set_snippet_detail_id(state,id){
            state.snippet_detail_id = id;
        },
        set_snippet_detail(state, snippet){
            state.snippet_detail.titel = snippet.name;
            state.snippet_detail.desc = snippet.desc;
            state.snippet_detail.content = snippet.snippet_content;
            state.snippet_detail.langName = snippet.coding_language_id;
        },

        setSnippetMutation(state, id){
            /* API-Link mit ID herrichten */
            var $link;
            $link = '/snippet/' + id;
            /* API ansprechen */
            fetch($link, {method:'get'})
                .then((response) => {
                    return response.json()
                })
                .then ((jsonData) => {
                    this.snippet = jsonData;
                    state.snippet_detail.titel = this.snippet.name;
                    state.snippet_detail.desc = this.snippet.desc;
                    state.snippet_detail.content = this.snippet.snippet_content;
                    state.snippet_detail_id = this.snippet.id;
                })
        },
        reloadSnippetsMutation(state){
            fetch('/getAllSnippetsClean', {method:'get' })
                .then((response) => {
                    return response.json()
                })
                .then ((jsonData) => {
                    state.snippets = jsonData;
                    state.snippets.sort((a, b) => (a.Langname > b.Langname) ? 1 : -1);

                })
        }
    },
    actions: {
        change_isHidden(){
            store.commit('toggle_isHidden')
        },
        change_detailIsHidden(){
            store.commit('toggle_detailIsHidden')
        },
        change_addSnippetIsHidden(){
            store.commit('toggle_addSnippetIsHidden')
        },
        change_LanguageIsHidden(){
            store.commit('toggle_LanguageIsHidden')
        },
        change_SammlungIsHidden(){
            store.commit('toggle_SammlungIsHidden')
        },
        change_ContextIsHidden(){
            store.commit('toggle_ContextIsHidden')
        },
        reload_snippets(){
            store.commit('reloadSnippetsMutation')
        },
        set_snippet_detail_action(state,id) {
            store.commit('set_snippet_detail_id', id)
        },
        set_snippet_detail(state,snippet){
            store.commit('set_snippet_detail', snippet)
        },
        set_snippet_action(state, id){
            store.commit('setSnippetMutation', id)
        },
        createSammlung({commit}, sammlung_name) {
            axios.post('/addSammlungSingle', {
                name: sammlung_name,

            })
                .then(function (response) {
                    currentObj.output = response.data;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            },
        createContext({commit}, context_name) {
            axios.post('/addContextSingle', {
                name: context_name,

            })
                .then(function (response) {
                    currentObj.output = response.data;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
        },
        createLanguage({commit}, language_object) {
            axios.post('/addLanguageSingle',{
                    name: language_object.name,
                    context_id: language_object.context_id,
            })
                .then(function (response) {
                    currentObj.output = response.data;
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
        },
        createSnippet({commit}, snippet_object) {
            axios.post('/addSnippetSingle',{
                name: snippet_object.name,
                desc: snippet_object.desc,
                snippet_content: snippet_object.content,
                language_id: snippet_object.language_id,
                sammlung_id: snippet_object.sammlung_id,
                public: snippet_object.public,
            })

        },
    },
    getters: {
        getIsHidden: state => {
            return state.isHidden;
        },
        get_user_id: state => {
            return state.user_id;
        },
        getDetailIsHidden: state => {
            return state.detailIsHidden;
        },
        getLanguageIsHidden: state => {
            return state.LanguageIsHidden;
        },
        getAddSnippetIsHidden: state => {
            return state.addSnippetIsHidden;
        },
        getSammlungIsHidden: state => {
            return state.SammlungIsHidden;
        },
        getContextIsHidden: state => {
            return state.ContextIsHidden;
        },
        snippet_detail_id: state => {
            return state.snippet_detail_id;
        },
        snippet_detail: state => {
            return state.snippet_detail;
        },
        snippets: state => {
            return state.snippets;
        },
    }
})
const app = new Vue({
    el: '#app',
    store,
});


function loadDoc() {

}

