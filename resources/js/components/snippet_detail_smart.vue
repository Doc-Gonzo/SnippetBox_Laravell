<template>
    <div class="snippet_detail_wrapper">
        <div :class="snippet_detail_id">

            <div class="write_toggle"  v-on:click="$store.dispatch('change_addSnippetIsHidden')"></div>
            <h4>{{snippet_detail_object.titel}}</h4>

            <b-form-group action="/updateSnippet" method="post"  v-if="!detailIsHidden" >
                <input type="hidden" name="snippet_id" :value="snippet_detail_object.id">
               <textarea class="form-control snippet_desc" name="snippet_desc">{{snippet_detail_object.desc}}</textarea><br><br>
               <textarea class="form-control detail_content" name="snippet_content">{{snippet_detail_object.content}}</textarea><br><br>
                <b-button class="okbutton" v-on:click="">Update Snippet</b-button>
            </b-form-group>

        </div>
    </div>
</template>

<script>
    export default {
        name: "snippet_detail_smart",
        mounted: function() {
            /* API-Link mit ID herrichten */
            var $link;
            $link = '/snippet/' + this.snippet_detail_id;
            /* API ansprechen */
            fetch($link, {method:'get'
            })
                .then((response) => {
                    return response.json()
                })
                .then ((jsonData) => {
                    this.Snippet = jsonData;
                    this.$store.dispatch("set_snippet_detail", this.Snippet)
                })
        },
        /* Snippet Objekt ausgeben */
        data: function () {
            return {
                Snippet: ''
            }
        },
        computed: {
            snippet_detail_id() {
                return this.$store.getters.snippet_detail_id;
            },
            detailIsHidden() {
                return this.$store.getters.getDetailIsHidden;
            },
            snippet_detail_object(){
                return this.$store.getters.snippet_detail;
            }
        },
        methods: {
        }
    }
</script>

<style scoped>
    h4 {
        margin-bottom:25px;
        cursor:pointer;
        color:cornflowerblue;
    }
    .okbutton {
        background-color: cornflowerblue;
    }
    .detail_content {
        width: 100%;
        height: 400px !important;
        background-color: #1b1e21;
        color: yellow;
        letter-spacing: 1.4px;
        font-size: smaller;
    }
    .write_toggle {
        width: 40px;
        height: 40px;
        background-image: url("/img/write.png");
        background-size:100%;
        cursor:pointer;
        position:absolute;
        right: 30px;
        bottom: 40px;
    }

    .update_button {
        margin-bottom:93px !important;
    }
    .fade-enter-active, .fade-leave-active {
        transition: opacity 1s, height .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
        height: 0;
    }
</style>
