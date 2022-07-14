<template>
  <div class="container">
    <h2 class="py-3">Tags</h2>
    <template v-if="tags">
      <ul class="nav flex-column pb-3">
        <li v-for="tag in tags" :key="tag.id" class="nav-item">
          <router-link
            :to="{ name: 'single-tag', params: { slug: tag.slug } }"
            class="nav-link"
            >{{ tag.name }}</router-link
          >
        </li>
      </ul>
    </template>
    <template v-else>
      <h2>Loading</h2>
    </template>
  </div>
</template>

<script>
export default {
  name: "ApiTags",
  data() {
    return {
      tags: null,
    };
  },
  created() {
    this.getAllTags();
  },
  methods: {
    getAllTags() {
      axios.get("/api/tags").then((res) => {
        this.tags = res.data.results;
      });
    },
  },
};
</script>

<style>
</style>