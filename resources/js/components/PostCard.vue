<template>
    <div class="card post rounded-lg border border-white bg-slate-300 p-3">
        <img
            src="https://picsum.photos/450/250"
            class="w-full object-cover"
            alt=""
        />
        <div class="card__body p-2">
            <h4 class="post__title text-xl">{{ post.title }}</h4>
            <p class="text-sky-800" v-if="post.category">
                {{ post.category.name }}
            </p>
            <ul class="tags flex gap-3 items-center">
                <li
                    class="tag text-black bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full text-xs px-3 py-1"
                    v-for="tag in post.tags"
                    :key="tag.id"
                >
                    {{ tag.name }}
                </li>
            </ul>

            <router-link
                class="bg-gradient-to-r from-indigo-500 rounded-md px-3 py-1 text-sm"
                tag="button"
                :to="{ name: 'posts.show', params: { slug: post.slug } }"
                >LEGGI</router-link
            >
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: {
            type: Object,
            required: false,
        },
    },
};
</script>

<style lang="scss" scoped></style>
