<template>
    <div>
        <p>
            <h4><router-link :to="{name: 'Movies'}">Show Movie List</router-link></h4>
        </p>
        <form-message></form-message>
        <div class="row">
            <div class="col-md-5">
                <h4 class="text-center font-weight-bold">Review Form</h4>
                
                <form action="" @submit="addReview(review)">
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
                        <button class="btn btn-block btn-primary" @click.prevent="addReview(review)">Submit Review
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <movie-reviews v-bind:movieId="review.movie_id"></movie-reviews>
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
                    movie_id: this.movieId,
                    title: '',
                    review: ''
                }
            }
        },
        props: {
            movieId: Number,
        },
        methods: {
            addReview(review) {
                this.$store.dispatch('addReview', review)
            }
        }
    }
</script>

<style scoped>

</style>