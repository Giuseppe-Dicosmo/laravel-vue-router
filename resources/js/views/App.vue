<template>
    <div class="app bg-slate-200">
        <header>
            <nav class="py-6 flex gap-4 items-center">
                <ul class="contents">
                    <li>
                        <router-link to="/posts">Posts</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'contact' }">Contact</router-link>
                    </li>
                </ul>
            </nav>
        </header>

        <router-view></router-view>
    </div>
</template>

<script>
import PostsGrid from "../pages/Posts.index.vue";

export default {
    components: {
        PostsGrid,
    },
};
</script>

<style lang="scss" scoped>
.app {
    min-height: 100vh;
}
</style>
