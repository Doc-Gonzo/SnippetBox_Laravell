<template>
    <div>
        {{Snippet.name}} <br><br>
        {{Snippet.desc}}<br><br>
        {{Snippet.snippet_content}}<br><br>
        {{Snippet.coding_language_id}}<br><br>
    </div>
</template>

<script>

    export default {
        name: "snippet_detail",
        props: ['snippet_id'],
        mounted: function() {
            /* API-Link mit ID herrichten */
            var $link;
            $link = '/snippet/' + this.snippet_id;
            /* API ansprechen */
            fetch($link, {method:'get'
            })
                .then((response) => {
                    return response.json()
                })
                .then ((jsonData) => {
                    this.Snippet = jsonData
                })
        },
        /* Snippet Objekt ausgeben */
        data: function () {
            return {
                Snippet: ''
            }
        }
    }
</script>

<style scoped>

</style>
