<template>
    <div class="main_nav_wrapper">
        <ul class="main_nav ">
            <li v-bind:key="'Sprache anlegen'"><a  v-bind:key="'Sprache anlegen'" v-on:click="$store.dispatch('change_LanguageIsHidden')" :title="'Sprache anlegen'">Sprache anlegen</a> </li>
            <li  v-bind:key="'Sammlung anlegen'"><a  v-bind:key="'Sammlung anlegen'" v-on:click="$store.dispatch('change_SammlungIsHidden')" :title="'Sammlung anlegen'">Sammlung anlegen</a> </li>
            <li  v-bind:key="'Context anlegen'"><a  v-bind:key="'Context anlegen'" v-on:click="$store.dispatch('change_ContextIsHidden')" :title="'Context anlegen'">Context anlegen</a> </li>
            <li  v-bind:key="'Testvue'"><a  v-bind:key="'test'" href="/testvue" :title="'Test'">VUE Test</a> </li>
            <li  v-bind:key="'addDSnippet'"><a  v-bind:key="'addSnippet'" href="/addSnippet" :title="'Add Snippet'">Snippet anlegen</a> </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "main_auto_singlepage",
        data: function () {
            return {}
        },
        computed: {
            isHidden() {
                return this.$store.getters.getIsHidden;
            },
            snippet_detail_id() {
                return this.$store.getters.snippet_detail_id;
            },
            LanguageIsHidden() {
                return this.$store.getters.getLanguageIsHidden;
            },
            SammlungIsHidden() {
                return this.$store.getters.getSammlungIsHidden;
            },
            ContextIsHidden() {
                return this.$store.getters.getContextIsHidden;
            },
        },
    }
</script>

<style scoped>
    .main_nav_wrapper {
        position: absolute;
        width: 100%;
        height: 46px;
        background-color: #1b1e21;
        left:0;
        top:0;
    }
    .main_nav_wrapper ul {
        margin-top: 0px;
        padding-left: 0;
    }
    .main_nav_wrapper ul li a {
        color: #fff;
        padding: 9px 5px 8px 5px;
        font-weight: bold;
        text-decoration:none;
        display: block;
        transition: 0.4s;
        cursor:pointer;
    }
    .main_nav_wrapper ul li a:hover {
        color: #2fa360;
    }
    .main_nav_wrapper ul li {
        list-style: none;
        display: inline-block;
        position: relative;
        border-bottom:3px solid transparent;
        transition: 0.4s;
    }
    .main_nav_wrapper ul li:hover {
        border-bottom:3px solid #2fa360;
        transition: 0.4s;
    }
</style>
