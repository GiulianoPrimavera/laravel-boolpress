//importo Vue
import Vue from "vue";
//importo vue router
import VueRouter from "vue-router";

//dico a Vue di usare VueRouter
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        }
    ]
});

export default router;