import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

import ApiPosts from './components/ApiPosts.vue';

const router = new Router({
    mode: 'history',
    routes: [
        {path: '/posts', name: 'posts', component: ApiPosts}
    ]
})

export default router;