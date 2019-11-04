import Vue from 'vue'
import VueRouter from 'vue-router'

// Route Components
import Movies from './components/MovieReview/Movies.vue'
import MovieReviewCreate from './components/MovieReview/MovieReviewCreate.vue'

Vue.use(VueRouter);

// Route Definitions
const routes = [
  { path: '/', name: 'Root', redirect: '/movies/index' },
  { path: '/movies/index', name: 'Movies', component: Movies},
  { path: '/movies/review/create', name: 'MovieReviewCreate', component: MovieReviewCreate, props: true},
]

// Router Instance
export default new VueRouter({
  mode: 'history',
  // hash: false,
  routes // short for `routes: routes`
})
