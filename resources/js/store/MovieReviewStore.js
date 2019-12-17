import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from "vuex-persistedstate"

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
      movies: [],
      movie: [],
      reviews: [],
      message: '',
      errors: '',
  },
  plugins: [createPersistedState()],
  mutations: {
    storeMovies (state, movies) {
      state.movies = movies;
    },
    storeMovie (state, movie) {
      state.movie = movie;
    },
    storeReviews (state, reviews) {
      state.reviews = reviews;
    },
    storeReview (state, review) {
      state.reviews.unshift(review)
    },
    clearErrors (state) {
      state.message = '';
      state.errors = '';
    },
    addError (state, error) {
      	state.message = error.message;
      	state.errors = error.errors;
    },
    
  },
  actions: {
    addReview (context, review) {
      context.commit('clearErrors');

      axios.post('/api/movies/reviews/store', review)
                .then(res => {
                    context.commit('storeReview', res.data)
                }).catch(err => {
                	context.commit('addError', err.response.data)
                });
    },
    getMovies(context) {
      axios.get('/api/movies')
                .then(res => {
                  context.commit('storeMovies', res.data)
                });
    },
    getMovie(context, movie) {
      context.commit('clearErrors');

      axios.get('/api/movies/show/' + movie.movie_id)
                .then(res => {
                  context.commit('storeMovie', res.data)
                }).catch(err => {
                  context.commit('addError', err.response.data)
                });
    },
    getReviews(context, movie) {
      context.commit('clearErrors');

      axios.get('/api/movies/' + movie.movie_id +  '/reviews')
                .then(res => {
                  context.commit('storeReviews', res.data)
                  console.log(res.data);
                }).catch(err => {
                  context.commit('addError', err.response.data)
                });
    }
  }
})
