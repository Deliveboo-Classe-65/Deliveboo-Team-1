
import Vue from "vue";
import VueRouter from "vue-router";
import App from "./App.vue";
import routes from "./router.js";
import "bootstrap";

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faFacebook, faTwitter, faLinkedin } from '@fortawesome/free-brands-svg-icons'

/* add icons to the library */
library.add(faFacebook, faTwitter, faLinkedin)

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

Vue.use(VueRouter);

new Vue({
    el: "#app",
    render: h => h(App),
    router: routes
})