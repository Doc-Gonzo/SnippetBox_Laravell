<template >
    <div id="addSnippet_bg" v-if="!addSnippetIsHidden">
        <div>
            <h4>Add snippet Test</h4>
            <div class="write_toggle"  v-on:click="$store.dispatch('change_addSnippetIsHidden')"></div>
            <transition name="addSnippetTransition">
            <b-form-group v-if="!addSnippetIsHidden">
                <label></label>
                <b-input type="text" class="addSnippetinput_name" v-model="snippet.name" name="name" placeholder="Name"></b-input>

              <textarea  name="desc" v-model="snippet.desc" placeholder="Beschreibung" class="snippet_desc input-group mb-3"></textarea>
                <textarea  name="snippet_content" v-model="snippet.content" placeholder="Content" class="snippet_content input-group mb-3"></textarea>

                <div class="container">
                    <div class="row">
                        <div class="addSnippet_lang_wrapper col-md-3">
                            <label for="codingLanguage_id">Sprache:</label>
                            <b-select v-model="snippet.language_id">
                                <b-select-option id="codingLanguage_id" v-for="language in languages"  :value="language.id" v-bind:key="language.id">{{language.name}}</b-select-option>
                            </b-select>
                        </div>
                        <!-- Sammlung -->
                        <div class="addSnippet_sammlung_wrapper col-md-2">
                        <label for="sammlung_id">Sammlung:</label>
                        <b-select  v-model="snippet.sammlung_id"  >
                            <b-select-option id="sammlung_id" v-for="sammlung in sammlungen" :value="sammlung.id" v-bind:key="sammlung.id">{{sammlung.name}}</b-select-option>
                        </b-select>
                        </div>
                        <!-- Public -->
                        <div class="addSnippet_public_wrapper col-md-2">
                        <label for="public">Public?</label>
                        <select id="public" v-model="snippet.public" name="public">
                            <option value="0">Nein</option>
                            <option value="1">Ja</option>
                        </select>
                        </div>
                        <div class="text-center col-md-2">
                            <b-button class="okbutton" v-on:click="createSnippet">Abschicken</b-button>
                        </div>
                    </div>
                </div>
            </b-form-group>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
        name: "addSnippet",
        mounted: function () {
            fetch('/getAllLanguagesJson/', {method: 'get'})
                .then((response) => {
                    return response.json()
                })
                .then((jsonData) => {
                    this.languages = jsonData
                }),
                fetch('/getAllSammlungenJson/', {method: 'get'})
                    .then((response) => {
                        return response.json()
                    })
                    .then((jsonData) => {
                        this.sammlungen = jsonData
                    })
        },
        data: function () {
            return {
                languages:[],
                sammlungen:[],
                snippet: {
                    name: '',
                    desc:'',
                    content:'',
                    language_id:'',
                    sammlung_id:1,
                    public:0,
                }
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
            addSnippetIsHidden() {
                return this.$store.getters.getAddSnippetIsHidden;
            },
        },
        methods: {
            createSnippet() {
                if(this.snippet.name !== '') {
                    let snippet_object = {
                        name: this.snippet.name,
                        desc: this.snippet.desc,
                        content: this.snippet.content,
                        language_id: this.snippet.language_id,
                        sammlung_id: this.snippet.sammlung_id,
                        public: this.snippet.public,
                    }
                    // Liste neu Laden
                    this.$store.dispatch('createSnippet', snippet_object);
                    // Aufräumen
                    this.snippet.name = '';
                    this.snippet.desc = '';
                    this.snippet.content = '';
                    this.snippet.language_id = 1;
                    this.snippet.sammlung_id = 1;
                    this.snippet.public = 0;
                    // Wait 1 Second before reload
                    setTimeout(()=>{
                        this.$store.dispatch('reload_snippets');
                    },1000);

                }
                else {
                    alert('Name darf nicht leer sein!');
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
        margin-bottom:0px;
    }
    label {
        color:darkmagenta;
    }
   .okbutton {
       background-color: darkmagenta;
   }
    #addSnippet_bg h4 {
        color: darkmagenta;
    }
    .addSnippet_public_wrapper {
        padding-top:40px;
    }
    .write_toggle {
        width: 40px;
        height: 40px;
        background-image: url("/img/write.png");
        background-size:100%;
        cursor:pointer;
        position:absolute;
        right: 30px;
        bottom: 40px;
        opacity: .6;
    }
    .addSnippetinput_name {
        margin-bottom: 40px;
        margig-top:-12px !important;
    }

    /* Transitions */
    .addSnippetTransition-enter-active {
        animation: addSnippetTransition .5s;
    }
    .addSnippetTransition-leave-active {
        animation: addSnippetTransition .5s reverse;
    }
    @keyframes addSnippetTransition {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1);
        }
    }
</style>
