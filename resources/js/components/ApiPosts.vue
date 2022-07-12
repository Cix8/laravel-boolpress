<template>
  <ul class="d-flex flex-wrap justify-content-center">
    <li v-for="(post, index) in posts" :key="index">
      <div class="card m-2 p-2" style="width: 18rem">
        <div class="card-body">
          <h5 class="card-title text-primary">{{ post.title }}</h5>
          <p
            class="card-text text-secondary"
            style="max-height: 120px; overflow-y: scroll;"
          >
            {{ post.text }}
          </p>
        </div>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  name: "ApiPost",
  data() {
    return {
        posts: []
    }
  },
  created() {
    this.getPosts();
  },
  methods: {
    getPosts() {
        axios.get("api/posts").then((resp) => {
            this.posts = resp.data.results;
        })
    }
  }
};
</script>

<style></style>