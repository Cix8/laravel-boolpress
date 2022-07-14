<template>
  <div>
    <ul class="d-flex flex-wrap justify-content-center pt-5">
      <li v-for="(post, index) in posts" :key="index">
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
            <router-link
              :to="{ name: 'single-post', params: { slug: post.slug } }"
              >Leggi il post</router-link
            >
          </div>
        </div>
      </li>
    </ul>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item" :class="{ disabled: currentPage === 1 }">
          <a @click="getPosts(currentPage - 1)" class="page-link">Previous</a>
        </li>
        <li
          v-for="page in lastPage"
          :key="page"
          class="page-item"
          :class="{ active: currentPage === page }"
        >
          <a @click="getPosts(page)" class="page-link">{{ page }}</a>
        </li>
        <li class="page-item" :class="{ disabled: currentPage === lastPage }">
          <a @click="getPosts(currentPage + 1)" class="page-link">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  name: "ApiPost",
  data() {
    return {
      posts: [],
      currentPage: 1,
      lastPage: 1,
    };
  },
  created() {
    this.getPosts(1);
  },
  methods: {
    getPosts(selectedPage) {
      axios
        .get("api/posts", {
          params: {
            page: selectedPage,
          },
        })
        .then((resp) => {
          console.log(resp);
          this.posts = resp.data.results.data;
          this.currentPage = resp.data.results.current_page;
          this.lastPage = resp.data.results.last_page;
        });
    },
  },
};
</script>

<style></style>