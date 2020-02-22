<template>
    <div>

    </div>
</template>

<script>
    export default {
        props: ['allSnippets','chosenLangs','allLangs'],
        methods: {
            getAllSnippets(){
                axios.get('/getAllSnippets').then(response => {alert(response.data);
                });
            }
        }
    }

</script>

<style scoped>

</style>
