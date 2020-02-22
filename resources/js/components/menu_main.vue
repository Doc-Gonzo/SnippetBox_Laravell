<template>
    <div class="main_nav_wrapper">
        <ul class="main_nav ">
            <li class=""><a href="/addSnippet">Snippet anlegen</a></li>
            <li class=""><a href="/addLanguage">Sprache anlegen</a></li>
            <li class=""><a href="/addSammlung">Sammlung anlegen</a></li>
            <li class=""><a href="/addContext">Context anlegen</a></li>
            <li class=""><a href="/getAllSnippets">API Get all Snippets</a></li>
        </ul>
    </div>

</template>

<script>
    export default {
        name: "menu"
    }
</script>

<style scoped>
    .main_nav_wrapper {
        position: absolute;
        width: 100%;
        height: 40px;
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
        padding: 10px 5px;
        font-weight: bold;
        text-decoration:none;
        display: block;
    }
    .main_nav_wrapper ul li a:hover {
        color: #2fa360;
    }
    .main_nav_wrapper ul li {
        list-style: none;
        display: inline-block;
    }
</style>
