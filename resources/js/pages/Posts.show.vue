<template>
    <div v-if="loading">
        <img src="https://picsum.photos/1980/500" class="w-full" alt="" />

        <section>
            <div class="container py-10">
                <h1 class="text-3xl mb-2">{{ post.title }}</h1>
                <p class="text-md" v-if="post.category">
                    {{ post.category.name }}
                </p>
                <ul class="flex gap-2 items-center">
                    <li
                        class="tag text-black bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full text-xs px-3 py-1"
                        v-for="tag in post.tags"
                        :key="tag.id"
                    >
                        {{ tag.name }}
                    </li>
                </ul>

                <!-- con "v-html" ci stampa HTML -->
                <div class="py-12" v-html="post.content"></div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            post: null,
            loading: false,
        };
    },
    methods: {
        fetchPost() {
            axios
                .get(`/api/posts/${this.$route.params.slug}`)
                .then((res) => {
                    const { post } = res.data;

                    this.post = post;
                    // questa funzione serve per il caricamento completo della pagina
                    this.loading = true;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push('/404')
                });
        },
    },
    beforeMount() {
        this.fetchPost();
    },
};
</script>

<style lang="scss"></style>
