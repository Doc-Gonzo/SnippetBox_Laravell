<template>
    <div>
        <div>

            <h5 v-on:click="langListHidden = !langListHidden ">Langlist</h5>
            <transition name="list" tag="span">
                <b-list-group v-if="!langListHidden" class="lang_list_wrapper">
                    <b-button class="smallButton" v-if="!langListHidden" v-on:click="checkAllBoxes">All</b-button>
                    <b-button class="smallButton" v-if="!langListHidden"  v-on:click="uncheckAllBoxes">None</b-button>
                    <b-list-group-item v-for="language in Languages" v-bind:key="language.name" class="filterButton">
                        <label :for="language.name">{{language.name}}</label>
                        <input type="checkbox" :checked="true" :id="language.name" :value="language.name"  v-model="checkedLangs">
                    </b-list-group-item>

                </b-list-group>
            </transition>


            <h4 v-on:click="$store.commit('toggle_isHidden')">Snippetlist</h4>
            <transition name="list" tag="span">
                <b-list-group v-if="!isHidden" class="snippet_list_wrapper">
                    <b-list-group-item  v-for="snippet in Snippets" v-bind:key="snippet.name" v-if="checkedLangs.includes(snippet.Langname)" v-bind:class="{'snippet.Langname':true}" class="pt-0 pb-0 d-flex justify-content-between align-items-center">

                       <a v-bind:key="snippet.Langname" class="d-block pt-0 pb-0 text-left" href="#" v-on:click="$store.dispatch('set_snippet_action',snippet.ID)" :title="snippet.Desc"> {{snippet.Name}}</a>
                        <b-badge v-bind:key="'Key' + snippet.LAngnamr" variant="primary" :class="snippet.Langname">{{snippet.Langname}}</b-badge>

                    </b-list-group-item>

                </b-list-group>
            </transition>
        </div>

    </div>
</template>

<script>
    export default {
        name:'snippet_list_smart',
        mounted: function() {
            fetch('/getAllSnippetsClean', {method:'get' })
                .then((response) => {
                    return response.json()
                })
                .then ((jsonData) => {
                    this.Snippets = jsonData
                    this.Snippets.sort((a, b) => (a.Langname > b.Langname) ? 1 : -1)

                }),
                fetch('/getLanguages', {method:'get'
                })
                    .then((response) => {
                        return response.json()
                    })
                    .then ((jsonData) => {
                        this.Languages = jsonData
                        this.Languages.sort((a, b) => (a.name > b.name) ? 1 : -1)
                        this.checkAllBoxes()
                    })

        },
        data: function () {
            return {
                langListHidden: true,
                Snippets: [],
                Languages: [],
                checkedLangs: []
            }
        },
        computed: {
            isHidden() {
                return this.$store.getters.getIsHidden;
            }
        },
        methods: {
            checkAllBoxes: function() {
                this.Languages.forEach((value) => {
                    if (!this.checkedLangs.includes(value.name)) {
                        this.checkedLangs.push(value.name);
                    }
                });
            },
            uncheckAllBoxes: function() {
               this.checkedLangs = [];
            }
        }
    }
</script>

<style scoped>
    .b-list-group-item {
        position:relative;
    }
    a:hover {
        text-decoration: none !important;
    }
    h4 {
        cursor: pointer;
        /* background-color:whitesmoke;*/
        margin-bottom:0px;
        padding-bottom:10px;
        padding-top:10px;
        /* border-radius: 8px 8px 0 0; */
    }
    h5 {
        cursor:pointer;
    }
    .lang_list_wrapper {
        width: 300px;
    }
    .snippetlist {
        position: absolute;
        right: 25px;
        top: 70px;
        width: 300px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity 1s, height .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
        height: 0;
    }


    .fadeSlow-enter-active, .fadeSlow-leave-active {
        transition: opacity .8s;
        transition: height 0.3s;
    }
    .fadeSlow-enter, .fadeSlow-leave-to /* .fadeSlow-leave-active below version 2.1.8 */ {
        opacity: 0;
        height: 0;
    }
    .list-group {
        padding-bottom:20px !important;
        padding-top:20px !important;
        background-color:#1b1e21;
        /* border-radius:0 0 8px 8px; */
    }
    .b-list-group-item a {
        cursor: pointer;
    }
    .list-group-item {
        color:yellow !important;
        background-color:#1b1e21;
    }
    .list-group-item a {
        color:yellow !important;
        border-bottom: 1px solid #fff !important;
        display:block !important;
        width:100%;
        font-size: 14px;
    }
    .badge-primary {
        width: 60px;
        border-radius:0;
        padding: 5px 0;
        line-height:1.1;
    }
    .filterButton {
        padding-bottom: 0;
        padding-top: 0;
        text-align:right;
        display:inline;
        font-size:12px;
    }
    .filterButton label {
        margin-bottom:0px;
    }
    .smallButton {
        padding: 0;
    }
    .snippet_list_wrapper {
           max-height: 311px;
           overflow-y: scroll;
           margin-bottom:20px;
           font-size:12px;
       }
    .lang_list_wrapper {
        max-height: 175px;
        overflow-y: scroll;
    }
    span.Vue {
        background-color:#3aae7f;
    }
    span.PHP {
        background-color: #4a4c7c;
    }
    span.Laravel {
        background-color:#ff2d20;
    }
    span.Ducky {
        background-color:orange;
    }
    span.CSS {
        background-color: #4a8ddb;
    }
    span.JS {
        background-color: #f0d81c;
    }
    span.SAP {
        background-color: #003f86;
    }

    .slide-enter-active {
        -moz-transition-duration: 0.5s;
        -webkit-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
        transition-duration: 0.5s;
        -moz-transition-timing-function: ease-in;
        -webkit-transition-timing-function: ease-in;
        -o-transition-timing-function: ease-in;
        transition-timing-function: ease-in;
    }

    .slide-leave-active {
        -moz-transition-duration: 0.5s;
        -webkit-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
        transition-duration: 0.5s;
        -moz-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
        -webkit-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
        -o-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
        transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    }

    .slide-enter-to, .slide-leave {
        max-height: 100px;
        overflow: hidden;
    }

    .slide-enter, .slide-leave-to {
        overflow: hidden;
        max-height: 0;
    }


    .list-enter-active {
        animation: add-item 1s;
    }

    .list-leave-active {
        position: absolute;
        animation: add-item 1s reverse;
    }

    .list-move {
        transition: transform 1s;
    }
    @keyframes add-item {
        0% {
            opacity: 0;
            transform: translateX(150px);
        }
        50% {
            opacity: 0.5;
            transform: translateX(-10px) skewX(20deg);
        }
        100% {
            opacity: 1;
            transform: translateX(0px);
        }
    }

</style>
