import './bootstrap';

// 1. Importation de vue.js
import Vue from "vue"

// 2. Enregistrement du composant "MonComponent.vue"
Vue.component(
    "chatgpt-prompt",
    require("./Components/Prompt.vue").default
)

// 3. L'instance de l'application Vue
const app = new Vue({
    el : "#app"
});
