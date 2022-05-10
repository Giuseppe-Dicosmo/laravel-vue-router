import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// i nostri componenti
import Posts from "../pages/Posts.index.vue";
import Post from "../pages/Posts.show.vue";
import Contact from "../pages/Contact.vue";
import NotFound from "../pages/404.vue";


const routes = [
    {
        path: "/posts",
        name: "posts.index",
        component: Posts,
    },
    {
        // una rotta dinamica
        path: "/posts/:slug",
        name: "posts.show",
        component: Post,
    },
    {
        path: "/contact",
        name: "contact",
        component: Contact,
    },
    {
        path: "/*",
        name: "not-found",
        component: NotFound,
    },
];

const router = new VueRouter({
    mode: "history",
    routes: routes,
});

export default router;
