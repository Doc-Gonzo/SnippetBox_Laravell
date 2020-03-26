<template >
    <div>
        <div>
            <b-form v-if="!SammlungIsHidden">
                <h4>add collection</h4>
                <label></label>
                <b-input type="text"  v-model="sammlungName"  name="name" placeholder="Name"></b-input>
                <label></label>
                <div class="text-center">
                    <b-button class="" v-on:click="createSammlung">Abschicken</b-button>
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
                sammlungName: '',

            }
        },
        methods: {
            createSammlung() {
                if(this.sammlungName !== '') {
                    this.$store.dispatch('createSammlung', this.sammlungName);
                }
                else {
                    alert('Name darf nicht leer sein!');
                }
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
