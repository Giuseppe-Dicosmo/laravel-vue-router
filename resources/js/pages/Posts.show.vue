<template>
    <div>
        {{ $route.params.slug }}
    </div>
</template>

<script>
import Axios from "axios";

export default {
    beforeMount() {
        // Axios.get('')
    },
};
</script>

<style lang="scss"></style>
