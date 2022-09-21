import Vue from "vue"
import VueRouter from "vue-router";
import Home from "./pages/Home";
import Restaurant from "./pages/Restaurant"
import Restaurantslist from "./pages/Restaurantslist"


Vue.use(VueRouter)



const routes = [
    { path: "/", component: Home, name: "Home" },


    { path: "/restaurants", component: Restaurantslist, name: "restaurants.index" },
    { path: "/restaurant/:id", component: Restaurant, name: "restaurant.show" }


    // { path: "/restaurants", component: Home, name: "restaurants.index" },







]

export default new VueRouter({
    routes,
    mode: "history"
})