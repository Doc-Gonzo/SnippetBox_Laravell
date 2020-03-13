<template>
    <div class="snippet_detail_wrapper">
        <div :class="snippet_detail_id">
            <p>{{snippet_detail_id}} {{Snippet.name}}</p>
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
                    this.store.dispatch(set_snippet_detail);
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
                this.snippet_id = this.$store.getters.snippet_detail_id;
               this.snippet_object = this.getSnippet(this.snippet_id);
               return this.snippet_object;
            }
        },
        methods: {
            getSnippet(id){
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
                        this.snippet = jsonData
                        return this.snippet
                    })
            }
        }
    }
</script>

<style scoped>

</style>
