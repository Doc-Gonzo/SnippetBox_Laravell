<template>
    <div>
        <b-form>
            <label></label>
            <b-input type="text"  v-model="langName" v-bind:value="langName" name="name" placeholder="Name"></b-input>
            <label></label>
                <b-select name="context_id"   v-model="contextID">
                    <b-select-option-group label="Context">
                        <b-select-option>Context wählen</b-select-option>
                        <b-select-option v-for="context1 in Contextsss" :value="context1.id" v-bind:key="context1.id">{{context1.name}}</b-select-option>
                    </b-select-option-group>
                </b-select>
            <b-button  v-on:click="$store.commit('set_snippet_detail_id', 15)">Abschicken</b-button>
        </b-form>
    </div>
</template>

<script>


    import snippet_list_smart from "./snippet_list_smart";
    export default {
        name: "addLanguage",
        mounted: function () {
            fetch('/getAllContextsJson/', {method: 'get'})
                .then((response) => {
                    return response.json()
                })
                .then((jsonData) => {
                    this.Contextsss = jsonData
                    this.Contextsss.sort((a, b) => (a.name > b.name) ? 1 : -1)
                })
        },
        data: function () {
            return {
                Contextsss: [],
                contextID: '',
                langName: ''
            }
        },
        computed: {
            isHidden() {
                return this.$store.getters.getIsHidden;
            },
            snippet_detail_id() {
                return this.$store.getters.snippet_detail_id;
            }
        },
    }
</script>

<style scoped>
    button{
        margin-top: 20px;
    }
</style>
