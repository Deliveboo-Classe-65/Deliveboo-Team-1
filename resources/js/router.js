import Vue from "vue"
import VueRouter from "vue-router";
import Home from "./pages/Home";
import Restaurant from "./pages/Restaurant"
import Restaurants from "./pages/Restaurants"





const routes = [
    { path: "/", component: Home, name: "Home" },
    
    
    { path: "/restaurants", component: Restaurants, name: "restaurants.index" },
    {path: "/users/:user_id", component: Restaurant, name: "restaurant.show"}


    // { path: "/restaurants", component: Home, name: "restaurants.index" },


  




]

export default new VueRouter({
    routes,
    mode: "history"
})