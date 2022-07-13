<template>
  <div class="client_side">
    <NavBar />
    <AppJumbo />
    <router-view></router-view>
  </div>
</template>

<script>
import NavBar from "../components/NavBar.vue";
import AppJumbo from "../components/AppJumbo.vue";

export default {
  name: "App",
  components: {
    AppJumbo,
    NavBar,
  },
};
</script>

<style lang="scss">
@import "../../sass/app";
</style>