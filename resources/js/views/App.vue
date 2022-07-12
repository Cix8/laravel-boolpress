<template>
  <div class="client_side">
    <h1>Client Page</h1>
    <ApiPosts />
  </div>
</template>

<script>
import ApiPosts from '../components/ApiPosts.vue';

export default {
    name: 'App',
    components: {
      ApiPosts
    }
}
</script>

<style lang="scss">
@import "../../sass/app";
</style>