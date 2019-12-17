<template>
    <div>
        <p>
            <h4><router-link :to="{name: 'Movies'}">Show Movie List</router-link></h4>
        </p>
        <form-message></form-message>
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center font-weight-bold">{{movieReviewed.name}}</h4>
            </div>
            <div class="col-md-5">
                <h4 class="text-center font-weight-bold">Review Form</h4>
                
                <form action="" v-on:submit.prevent="addReview(review)">
                    <div class="form-group">
                        <input type="text" placeholder="Review Title" v-model="review.title" class="form-control">
                        <form-input-error inputName="title"></form-input-error>
                    </div>
                    <div class="form-group">
                        <textarea v-model="review.review" placeholder="Review Text" class="form-control">
                        </textarea>
                        <form-input-error inputName="review"></form-input-error>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Submit Review</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7" v-if="this.review.movie_id">
                <movie-reviews v-bind:movieId="this.review.movie_id"></movie-reviews>
            </div>
        </div>       
    </div>
</template>

<script>
    export default {
        name: "movie-review-create",
        data() {
            return {
                review: {
                    movie_id: '',
                    title: '',
                    review: ''
                }, movieReviewed: Object
            }
        },
        props: {
            movie: Object,
        },
        methods: {
            addReview(review) {
                this.$store.dispatch('addReview', review)
            }
        },
        mounted () {
            // handle page refresh
            if(this.movie) {
                this.movieReviewed = this.movie
                this.review.movie_id = this.movieReviewed.id;
                this.$store.dispatch('getMovie', {'movie_id': this.movieReviewed.id});
            } else {
                this.movieReviewed = this.$store.state.movie
                this.review.movie_id = this.movieReviewed.id;
            }
        },
    }
</script>

<style scoped>

</style>