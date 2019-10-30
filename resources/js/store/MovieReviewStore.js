import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  	  movies: [],
      reviews: [],
      message: '',
      errors: '',
  },
  mutations: {
    storeMovies (state, movies) {
      state.movies = movies;
    },
    storeReviews (state, reviews) {
      state.reviews = reviews;
    },
    storeReview (state, review) {
      state.reviews.unshift(review)
    },
    clearMessage (state) {
      state.errors = [];
    },
    clearErrors (state) {
      state.errors = [];
    },
    addError (state, error) {
      
      	state.message = error.message;
      
      
      	state.errors = error.errors;
      
    },
    
  },
  actions: {
    addReview (context, review) {
      context.commit('clearMessage');
      context.commit('clearErrors');

      axios.post('/api/movies/reviews/store', review)
                .then(res => {
                    context.commit('storeReview', res.data)
                }).catch(err => {
                	context.commit('addError', err)
                });
    },
    getMovies(context) {
      axios.get('/api/movies')
                .then(res => {
                  context.commit('storeMovies', res.data)
                });
    },
    getReviews(context, movie) {
      context.commit('clearMessage');
      context.commit('clearErrors');

      console.log(movie);

      axios.get('/api/movies/2/reviews')
                .then(res => {
                  context.commit('storeReviews', res.data)
                }).catch(err => {
                  context.commit('addError', err)
                });
    }
  }
})
