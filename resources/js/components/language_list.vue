<template>
    <div>
        <div>
            <h4 v-on:click="isHidden = !isHidden ">Languages</h4>
            <transition name="fade">
                <b-list-group v-if="!isHidden">
                    <b-list-group-item v-for="language in Languages" v-bind:key="language.id" class="pt-0 pb-0 d-flex justify-content-between align-items-center">
                        <label>{{language.name}}</label>
                        <input type="checkbox" :name="language.name">
                    </b-list-group-item>
                    <button type="submit">Filter Snippetlist</button>
                </b-list-group>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
    name:'language_list',
    mounted: function() {
            fetch('/getLanguages', {method:'get'
            })
            .then((response) => {
                return response.json()
            })
            .then ((jsonData) => {
                this.Languages = jsonData
            })
        },
        data: function () {
            return {
                isHidden: true,
                Languages: []
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
        background-color: whitesmoke;
        margin-bottom: 0px;
        padding-bottom: 4px;
        padding-top: 4px;
        border-radius: 8px 8px 0 0;
        font-size: 21px;
    }
    label {
        margin-bottom: 0;
        font-size: 14px;
    }
    .snippetlist {
        position: absolute;
        right: 25px;
        top: 70px;
        width: 300px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .8s;
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
    }
    input[type="checkbox"] {
        cursor:pointer;
    }
</style>
