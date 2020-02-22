<template>
    <div class="main_nav_wrapper">
        <ul class="main_nav ">
            <li class=""><a href="{{ add_snippet_link }}">{{add_snippet_text}}</a></li>
            <li class=""><a href="/addLanguage">Sprache anlegen</a></li>
            <li class=""><a href="/addSammlung">Sammlung anlegen</a></li>
            <li class=""><a href="/addContext">Context anlegen</a></li>
            <li class=""><a href="/getAllSnippets">API Get all Snippets</a></li>

        </ul>
    </div>

</template>

<script>
    export default {
        name: "menu_main",
        data() {
            return {
                add_snippet_text: 'Snippet anlegen',
                add_snippet_link: '/addSnippet',
            };
        }
    }




</script>

<style scoped>
    .main_nav_wrapper {
        position: absolute;
        width: 100%;
        height: 46px;
        background-color: #1b1e21;
        left:0;
        top:0;
    }
    .main_nav_wrapper ul {
        margin-top: 0px;
        padding-left: 0;
    }
    .main_nav_wrapper ul li a {
        color: #fff;
        padding: 9px 5px 8px 5px;
        font-weight: bold;
        text-decoration:none;
        display: block;
        transition: 0.4s;
    }
    .main_nav_wrapper ul li a:hover {
        color: #2fa360;
    }
    .main_nav_wrapper ul li {
        list-style: none;
        display: inline-block;
        position: relative;
        border-bottom:3px solid transparent;
        transition: 0.4s;
    }
    .main_nav_wrapper ul li:hover {
        border-bottom:3px solid #2fa360;
        transition: 0.4s;
    }
</style>
