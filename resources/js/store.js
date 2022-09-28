import Vue from "vue";

export const store = Vue.observable({
    cartTotal: 1
})

export function updateCart(total){
    store.cartTotal = total
}