<template>
    <div>
        <div
            class="container grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4"
        >
            <!-- creiamo un'altro componente e inseriamo il props con :post="el"-->
            <PostCard v-for="el in posts" :key="el.id" :post="el" />
        </div>
        <div class="container w-full py-3">
            <ul class="pagination flex justify-center items-center gap-5">
                <!-- con ":class=[] creiamo l'operatore ternario per l'active" -->
                <li
                    @click="fetchPosts(numeri)"
                    :class="[
                        currentPage === numeri
                            ? 'bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500'
                            : 'dot bg-gradient-to-r from-cyan-500 to-blue-500',
                    ]"
                    class="cursor-pointer rounded-full text-white text-xs px-2 py-1"
                    v-for="numeri in lastPage"
                    :key="numeri"
                >
                    {{ numeri }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import PostCard from "../components/PostCard.vue";

export default {
    components: {
        PostCard,
    },
    data() {
        return {
            posts: [],
            lastPage: 0,
            currentPage: 1,
        };
    },
    methods: {
        // fetchPosts() e una funzione
        // creiamo  @click="fetchPosts(numeri)" cosi cambiera la nostra pagina
        fetchPosts(page = 1) {
            // inseriamo la nostra rotta
            axios
                .get("/api/posts", {
                    params: {
                        page,
                    },
                })
                .then((res) => {
                    // Destrutturazione
                    const { posts } = res.data;
                    const { data, last_page, current_page } = posts;

                    // Puoi chiamiamo nel data l'array (posts: []) posts
                    this.posts = data;
                    this.lastPage = last_page;
                    this.currentPage = current_page;
                })
                .catch((err) => {
                    console.warn(err);
                });
        },
    },
    mounted() {
        this.fetchPosts();
    },
};
</script>

<style lang="scss"></style>
