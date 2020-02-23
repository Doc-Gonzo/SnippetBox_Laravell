<template>
    <div>
        <div>
            <ul>
            <li v-for="snippet in allSnippets"><p v-bind:text="snippet"></p> </li>
            </ul>
        </div>
    </div>
</template>

<script>

    export default {

    name:'snippet_list',
        props: ['allSnippets:' ,'chosenLangs','allLangs'],
        data: function () {
            return {
                Snippets: [
                    {
                        id: '',
                        name: '',
                        desc: '',
                        snippet_content: '',
                        public: '',
                        user_id: '',
                        coding_language: '',
                        sammlung_id: '',
                    }
                ]
            }
        },
        methods: {
            getAllSnippets(){
                allSnippets = axios.default('/getAllSnippets');
                return allSnippets;
                },
            addSnippetsToArray(snippets){
                for (Snippets in snippets) {
                    Snippets.push(Snippets)
                }
            }
        }
        }
</script>

<style scoped>

</style>
