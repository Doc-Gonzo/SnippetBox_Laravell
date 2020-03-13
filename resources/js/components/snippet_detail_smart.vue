<template>
    <div class="snippet_detail_wrapper">
        <div :class="snippet_detail_id">
            <p>{{snippet_detail_id}} {{snippet_detail_object}}</p>
            <b-button  v-on:click="setSnippet(15)">Abschicken</b-button>
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
                return this.$store.getters.getIsHidden;
            },
            snippet_detail_object(){
                return this.$store.getters.snippet_detail;
            }
        },
        methods: {
            setSnippet(id){
                /* API-Link mit ID herrichten */
                var $link;
                $link = '/snippet/' + id;
                /* API ansprechen */
                fetch($link, {method:'get'
                })
                    .then((response) => {
                        return response.json()
                    })
                    .then ((jsonData) => {
                        this.Snippet = jsonData;
                        this.$store.dispatch("set_snippet_detail", this.Snippet);
                        this.$store.dispatch("set_snippet_detail_action", this.Snippet.id);

                    })
            }
        }
    }
</script>

<style scoped>

</style>
