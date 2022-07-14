<template>
  <div class="card m-2 p-2" style="width: 18rem; min-height: 280px">
    <div class="card-body">
      <h5 class="card-title text-primary">{{ post.title }}</h5>
      <p
        class="card-text text-secondary"
        style="max-height: 120px; overflow-y: scroll"
      >
        {{ post.text }}
      </p>
    </div>
    <div class="card-body">
      <router-link :to="{ name: 'single-post', params: { slug: post.slug } }"
        >Leggi il post</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "ApiSinglePost",
  props: {
    post: Object,
  },
};
</script>

<style>
</style>