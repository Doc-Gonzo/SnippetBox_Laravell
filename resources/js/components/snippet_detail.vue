<template>
    <div>
        <form action="/updateSnippet" method="post">
            <input type="hidden" name="snippet_id" :value="snippet_id">
            <input type="hidden" name="snippet_user_id" :value="Snippet.user_id">
           <input type="text" class="form-control snippet_name" name="snippet_name" :value="Snippet.name">  <br><br>
            <textarea class="form-control snippet_desc" name="snippet_desc">{{Snippet.desc}}</textarea><br><br>
            <textarea class="form-control detail_content" name="snippet_content">{{Snippet.snippet_content}}</textarea><br><br>
            <button type="submit" class="btn-dark">Update Snippet</button>
        </form>
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

    .detail_content {
        width: 800px;
        height: 400px !important;
        background-color: #1b1e21;
        color: yellow;
        font-family: cursive;
        letter-spacing: 1.4px;
        font-size: smaller;
    }
</style>
