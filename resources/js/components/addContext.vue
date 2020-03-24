<template >
    <div>
        <div>
            <b-form v-if="!ContextIsHidden">
                <h4>add context</h4>
                <label></label>
                <b-input type="text"  v-model="context.name"  name="name" placeholder="Name"></b-input>
                <label></label>
                <div class="text-center">
                    <b-button class="" v-on:click="createContext">Abschicken</b-button>
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
                langName: '',
                context: {
                    name: '',
                }
            }
        },
        computed: {
            ContextIsHidden() {
                return this.$store.getters.getContextIsHidden;
            },
            user_id(){
                return this.$store.getters.get_user_id;
            },
        },
        methods: {
                createContext() {
                    if(this.context.name !== '') {
                        this.$store.dispatch('createContext', this.context.name);
                        this.context.name = '';
                        alert('Kontext erfolgreich angelegt!');
                    }
                    else {
                        alert('Kontext darf nicht leer sein!');
                    }

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
