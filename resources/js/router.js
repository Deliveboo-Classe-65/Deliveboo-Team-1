import Vue from "vue"
import VueRouter from "vue-router";
import Home from "./pages/Home";
import Restaurant from "./pages/Restaurant"


Vue.use(VueRouter)



const routes = [
    { path: "/restaurants", component: Home, name: "home.index" },
    { path: "/users/:id", component: Restaurant, name: "restaurant.show" },
    
    
    
    // { path: "/restaurants", component: Restaurant, name: "restaurants.index" },



  




]

export default new VueRouter({
    routes,
    mode: "history"
})