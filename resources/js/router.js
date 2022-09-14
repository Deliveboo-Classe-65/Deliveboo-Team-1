
import VueRouter from "vue-router";
import Home from "./pages/home";

const routes = [
    {path: "/", component:Home, name: "Home"},
]

export default new VueRouter({
    routes,
    mode: "history"
})