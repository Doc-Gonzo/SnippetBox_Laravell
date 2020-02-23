<template>
    <div>
        <div>
            <h4>Snippets</h4>
            <b-list-group>
                <b-list-group-item v-for="snippet in Snippets" v-bind:key="snippet.id" class="pt-0 pb-0 d-flex justify-content-between align-items-center">
                    <a class="d-block pt-0 pb-0 text-left" :href="'snippet_detail/' + snippet.id" :title="snippet.desc"> {{snippet.name}}</a>
                    <b-badge variant="primary">{{snippet.coding_language_id}}</b-badge>
                </b-list-group-item>
            </b-list-group>
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
</style>
