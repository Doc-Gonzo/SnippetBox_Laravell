<template>
    <div class="main_nav_wrapper">
        <ul class="main_nav ">
            <li v-for="element in menu_elements" v-bind:key="element.text"><a  v-bind:key="element.text + 'Link'" v-on:click="$store.dispatch('change_LanguageIsHidden')" :title="element.text">{{element.text}}</a> </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "main_auto_singlepage",
        data: function () {
            return {
                menu_elements:[
                    {
                        text: 'Snippet anlegen',
                        link: '$store.dispatch("change_LanguageIsHidden")',
                    },
                    {
                        text: 'Sprache anlegen',
                        link: '$store.dispatch("change_LanguageIsHidden")',
                    },
                    {
                        text: 'Sammlunganlegen',
                        link: "v-on:click='$store.dispatch('change_LanguageIsHidden')'",
                    },
                    {
                        text: 'Context anlegen',
                        link: "v-on:click='$store.dispatch('change_LanguageIsHidden')'",
                    },
                    {
                        text: 'API getAllSnippets',
                        link: "v-on:click='$store.dispatch('change_LanguageIsHidden')'",
                    },
                    {
                        text: 'Vuetest',
                        link: "v-on:click='$store.dispatch('change_LanguageIsHidden')'",
                    }
                ]
            }
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
