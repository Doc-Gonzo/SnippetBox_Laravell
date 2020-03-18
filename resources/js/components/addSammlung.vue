<template >
    <div>
        <div>
            <b-form v-if="!SammlungIsHidden">
                <h4>add collection</h4>
                <label></label>
                <b-input type="text"  v-model="sammlungName" v-bind:value="sammlungName" name="name" placeholder="Name"></b-input>
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
        name: "addSammlung",
        data: function () {
            return {
                Contextsss: [],
                contextID: 1,
                langName: ''
            }
        },
        computed: {
            SammlungIsHidden() {
                return this.$store.getters.getSammlungIsHidden;
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
