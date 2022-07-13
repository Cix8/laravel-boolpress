<template>
  <div class="client_side">
    <h1>Client Page</h1>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
    name: 'App',
}
</script>

<style lang="scss">
@import "../../sass/app";
</style>