import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

import ApiPosts from './pages/ApiPosts.vue';
import AppHome from './pages/AppHome.vue';
import AppInfo from './pages/AppInfo.vue';
import NotFound from './pages/NotFound.vue';
import SinglePost from './pages/SinglePost.vue';
import SingleTag from './pages/SingleTag.vue';

const router = new Router({
    mode: 'history',
    routes: [
        { path: '/', name: 'home', component: AppHome },
        { path: '/posts', name: 'posts', component: ApiPosts },
        { path: '/info', name: 'info', component: AppInfo },
        { path: '/posts/:slug', name: 'single-post', component: SinglePost },
        { path: '/tags/:slug', name: 'single-tag', component: SingleTag },
        { path: '/*', name: 'not-found', component: NotFound }
    ]
})

export default router;