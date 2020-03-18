<template >
    <div>
        <div>
            <b-form v-if="!ContextIsHidden">
                <h4>add context</h4>
                <label></label>
                <b-input type="text"  v-model="contextName" v-bind:value="contextName" name="name" placeholder="Name"></b-input>
                <label></label>
                <div class="text-center">
                    <b-button class="" v-on:click="$store.dispatch('set_snippet_action', 3)">Abschicken</b-button>
                </div>
            </b-form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "addContext",
        data: function () {
            return {
                Contextsss: [],
                contextID: 1,
                langName: ''
            }
        },
        computed: {
            ContextIsHidden() {
                return this.$store.getters.getContextIsHidden;
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
