<template>
    <div class="snippet_detail_wrapper">
        <div :class="snippet_detail_id">
            <h4 v-on:click="$store.commit('toggle_detailIsHidden')">{{snippet_detail_object.titel}}</h4>
            <form action="/updateSnippet" method="post"  v-if="!detailIsHidden" >
                <input type="hidden" name="snippet_id" :value="snippet_detail_object.id">
                <textarea class="form-control snippet_desc" name="snippet_desc">{{snippet_detail_object.desc}}</textarea><br><br>
                <textarea class="form-control detail_content" name="snippet_content">{{snippet_detail_object.content}}</textarea><br><br>
                <button type="submit" class="btn-dark">Update Snippet</button>
            </form>
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
    }
    .detail_content {
        width: 800px;
        height: 400px !important;
        background-color: #1b1e21;
        color: yellow;
        letter-spacing: 1.4px;
        font-size: smaller;
    }
</style>
