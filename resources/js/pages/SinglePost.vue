<template>
  <div class="container">
    <template v-if="selectedPost">
      <div class="card my-5">
        <img
          v-if="selectedPost.cover"
          class="card-img-top"
          :src="'../storage/' + selectedPost.cover"
          :alt="selectedPost.title"
        />
        <div class="card-body">
          <h4 class="card-title">{{ selectedPost.title }}</h4>
          <p class="card-text">
            {{ selectedPost.text }}
          </p>
        </div>
        <div class="card-body">
          <h5>{{ getCategoryName }}</h5>
        </div>
        <div class="card-body" v-if="selectedPost.tags.length != 0">
          <strong>Tags: </strong>
          <router-link
            v-for="(tag, index) in selectedPost.tags"
            :key="index"
            :to="{ name: 'single-tag', params: { slug: tag.slug } }"
            >{{ tag.name }}</router-link
          >
        </div>
      </div>
    </template>
    <template v-else>
      <h2>Loading</h2>
    </template>
  </div>
</template>
</div>
</template>

<script>
export default {
  name: "SinglePost",
  data() {
    return {
      selectedPost: null,
    };
  },
  created() {
    this.getSinglePost();
  },
  computed: {
    getCategoryName() {
      return this.selectedPost.category
        ? this.selectedPost.category.name
        : "Nessuna categoria";
    },
  },
  methods: {
    getSinglePost() {
      const thisSlug = this.$route.params.slug;

      axios.get(`/api/posts/${thisSlug}`).then((res) => {
        if (res.data.success) {
          this.selectedPost = res.data.results;
        } else {
          this.$router.push({ name: "not-found" });
        }
      });
    },
  },
};
</script>

<style>
</style>