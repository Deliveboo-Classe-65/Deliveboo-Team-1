import Vue from "vue"
import VueRouter from "vue-router";
import Home from "./pages/Home";
import Restaurant from "./pages/Restaurant"





const routes = [
    { path: "/", component: Home, name: "Home" },
    
    
    { path: "/restaurants", component: Restaurant, name: "restaurants.index" },



  




]

export default new VueRouter({
    routes,
    mode: "history"
})