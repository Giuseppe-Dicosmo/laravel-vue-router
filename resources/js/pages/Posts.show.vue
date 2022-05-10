<template>
    <div>
        <h1 v-if="post">{{ post.title }}</h1>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            post: null,
        };
    },
    beforeMount() {
        axios
            .get(`/api/posts/${this.$route.params.slug}`)
            .then((res) => {
                const { post } = res.data;
                this.post = post;
            })
            .catch((err) => {
                console.warn(err);
            });
    },
};
</script>

<style lang="scss"></style>
