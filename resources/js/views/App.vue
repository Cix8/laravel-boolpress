<template>
  <div class="client_side">
    <h1>Client Page</h1>
    <WorkInProgress />
  </div>
</template>

<script>
import WorkInProgress from '../components/WorkInProgress.vue';

export default {
    name: 'App',
    components: {
      WorkInProgress
    }
}
</script>

<style>
</style>