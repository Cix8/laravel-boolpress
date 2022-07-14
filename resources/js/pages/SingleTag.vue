<template>
  <div class="container">
    <template v-if="tag">
      <div class="py-3">
        <strong class="h2">Tag: {{ tag.name }}</strong>
      </div>
      <div class="row">
        <ApiSinglePost v-for="post in tag.posts" :key="post.id" :post="post" />
      </div>
    </template>
    <template v-else>
      <h4>Loading</h4>
    </template>
  </div>
</template>

<script>
import ApiSinglePost from "../components/ApiSinglePost.vue";

export default {
  name: "SingleTag",
  components: {
    ApiSinglePost,
  },
  data() {
    return {
      tag: null,
    };
  },
  created() {
    this.getTag();
  },
  methods: {
    getTag() {
      const thisSlug = this.$route.params.slug;

      axios.get(`/api/tags/${thisSlug}`).then((res) => {
        this.tag = res.data.results;
      });
    },
  },
};
</script>

<style>
</style>