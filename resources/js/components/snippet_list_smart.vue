<template>
    <div>
        <div>
            <h4 v-on:click="isHidden = !isHidden ">Snippetlist smart</h4>
            <transition name="fade">
                <b-list-group v-if="!isHidden">
                    <b-list-group-item  v-for="snippet in Snippets" v-bind:key="snippet.name" v-bind:class="{'snippet.Langname':true}" class="pt-0 pb-0 d-flex justify-content-between align-items-center">
                        <a class="d-block pt-0 pb-0 text-left" :href="'/snippet_detail/' + snippet.ID" :title="snippet.Desc"> {{snippet.Name}}</a>
                        <b-badge variant="primary" :class="snippet.Langname">{{snippet.Langname}}</b-badge>
                    </b-list-group-item>
                </b-list-group>
            </transition>

            <span>Checked names: {{ checkedLangs }}</span>
            <b-button v-on:click="checkAllBoxes">All</b-button>
                <b-button v-on:click="uncheckAllBoxes">None</b-button>
            <b-list-group>
                <b-list-group-item v-for="language in Languages" v-bind:key="language.name" class="filterButton">
                    <label :for="language.name">{{language.name}}</label>
                    <input type="checkbox" :checked="true" :id="language.name" :value="language.name"  v-model="checkedLangs">
                </b-list-group-item>
            </b-list-group>
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
                        this.checkAllBoxes()
                    })

        },
        data: function () {
            return {
                isHidden: false,
                Snippets: [],
                Languages: [],
                checkedLangs: []
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
        background-color:whitesmoke;
        margin-bottom:0px;
        padding-bottom:10px;
        padding-top:10px;
        border-radius: 8px 8px 0 0;
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
        border-radius:0 0 8px 8px;
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
        font-size: 15px;
    }
    .badge-primary {
        width: 60px;
        border-radius:0;
        line-height:1.1;
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
</style>
