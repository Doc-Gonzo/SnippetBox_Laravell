<template >
    <div>
        <div>
        <b-form v-if="!LanguageIsHidden">
            <h4>add language</h4>
            <label></label>
            <b-input type="text"  v-model="langName" v-bind:value="langName" name="name" placeholder="Name"></b-input>
            <label></label>
                <b-select name="context_id"   v-model="contextID">
                    <b-select-option-group label="Context">
                        <b-select-option>Context wählen</b-select-option>
                        <b-select-option v-for="context1 in Contextsss" :value="context1.id" v-bind:key="context1.id">{{context1.name}}</b-select-option>
                    </b-select-option-group>
                </b-select>
            <div class="text-center">
                <b-button class="" v-on:click="$store.dispatch('set_snippet_action', 3)">Abschicken</b-button>
            </div>
        </b-form>
        </div>
    </div>
</template>

<script>
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
                contextID: 1,
                langName: ''
            }
        },
        computed: {
            isHidden() {
                return this.$store.getters.getIsHidden;
            },
            snippet_detail_id() {
                return this.$store.getters.snippet_detail_id;
            },
            LanguageIsHidden() {
                return this.$store.getters.getLanguageIsHidden;
            },
        },
    }
</script>

<style scoped>
    button{
        margin-top: 20px;
    }
    h4 {
        text-align: center;
    }
</style>
