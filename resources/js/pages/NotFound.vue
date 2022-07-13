<template>
  <div class="container">
    <h1 class="py-3">Page Not Found!!!</h1>
    <router-link class="btn btn-outline-primary" :to="{ name: 'home' }"
      >Ritorna alla home</router-link
    >
  </div>
</template>

<script>
export default {
  name: "NotFound",
};
</script>

<style>
</style>