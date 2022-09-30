import Vue from "vue"
import VueRouter from "vue-router";
import Home from "./pages/Home";
import Restaurant from "./pages/Restaurant"
import Restaurantslist from "./pages/Restaurantslist"
import Payment from "./pages/Payment"


Vue.use(VueRouter)



const routes = [
    { path: "/", component: Home, name: "Home" },


    { path: "/restaurants", component: Restaurantslist, name: "restaurants.index" },
    { path: "/restaurant/:id", component: Restaurant, name: "restaurant.show" },
    { path: "/checkout", component: Payment, name: "checkout" }

]

export default new VueRouter({
    routes,
    mode: "history"
})