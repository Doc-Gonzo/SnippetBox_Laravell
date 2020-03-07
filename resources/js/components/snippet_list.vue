<template>
    <div>
        <div>
            <h4 v-on:click="isHidden = !isHidden ">Snippets</h4>
            <transition name="fade">
                <b-list-group v-if="!isHidden">
                    <b-list-group-item v-for="snippet in Snippets" v-bind:key="snippet.id" class="pt-0 pb-0 d-flex justify-content-between align-items-center">
                        <a class="d-block pt-0 pb-0 text-left" :href="'/snippet_detail/' + snippet.id" :title="snippet.desc"> {{snippet.name}}</a>
                        <b-badge variant="primary">{{snippet.coding_language_id}}</b-badge>
                    </b-list-group-item>
                </b-list-group>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
    name:'snippet_list',
    mounted: function() {
            fetch('/getAllSnippets', {method:'get'
            })
            .then((response) => {
                return response.json()
            })
            .then ((jsonData) => {
                this.Snippets = jsonData
            })
        },
        data: function () {

            return {
                isHidden: false,
                Snippets: []
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
        background-color:whitesmoke;
        margin-bottom:0px;
        padding-bottom:10px;
        padding-top:10px;
    }
    .snippetlist {
        position: absolute;
        right: 25px;
        top: 70px;
        width: 300px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
    .list-group {
        padding-bottom:20px !important;
        padding-top:20px !important;
        background-color:#1b1e21;
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
    }
</style>
