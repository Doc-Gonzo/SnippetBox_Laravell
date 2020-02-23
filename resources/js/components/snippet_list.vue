<template>
    <div>
        <div>
            <ul>
                <li v-for="snippet in Snippets"><a :href="'snippet_detail/' + snippet.id" :title="snippet.name"> {{snippet.name}}</a></li>
            </ul>
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

</style>
