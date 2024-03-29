//importo Vue
import Vue from "vue";
//importo vue router
import VueRouter from "vue-router";

import Home from "./pages/Home.vue";
import About from "./pages/About.vue"
import Contact from "./pages/Contact.vue"
import PostShow from "./pages/PostShow.vue"
import CategoryShow from "./pages/CategoryShow.vue"

//dico a Vue di usare VueRouter
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact
        },
        {
            path: "/about",
            name: "about",
            component: About
        },
        {
            path: "/posts/:id",
            name: "post",
            component: PostShow
        },
        {
            path: "/category/:category",
            name: "categories",
            component: CategoryShow
        },
    ]
});

export default router;