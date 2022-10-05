import Vue from "vue";

export const store = Vue.observable({
    cartTotal: undefined,
    restaurant: window.localStorage.restaurant
})

export function updateCart(total, restaurant){
    store.cartTotal = total
    store.restaurant = restaurant
}