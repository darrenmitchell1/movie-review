<template>
    <div>
        <div class="col-md-5">
            <p>
                <router-link :to="{name: 'Movies'}">Movie List</router-link>
            </p>
            <form action="" @submit="addReview(review)">
                <h4 class="text-center font-weight-bold">Review creation form</h4>
                <div class="form-group">
                    <input type="text" placeholder="Title" v-model="review.title" class="form-control">

                </div>
                <div class="form-group">
                    <textarea v-model="review.review" placeholder="Review" class="form-control">

                    </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" @click.prevent="addReview(review)">Submit
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-7">
            <movie-reviews movieId=this.movieId></movie-reviews>
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
            movieId: 0,
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