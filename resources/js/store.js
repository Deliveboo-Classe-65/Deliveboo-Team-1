import Vue from "vue";

export const store = Vue.observable({
    cartTotal: undefined
})

export function updateCart(total){
    store.cartTotal = total
}