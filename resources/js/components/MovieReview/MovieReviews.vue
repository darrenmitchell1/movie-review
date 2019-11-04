<template>
    <div>
        <h4 class="text-center font-weight-bold">Reviews</h4>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Review</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="review in reviews">
                <td>{{review.title}}</td>
                <td>{{review.review}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
    export default {
        name: "movie-reviews",
        props: {
            movieId: Number,
        },
        computed: {
            reviews () {
                return this.$store.state.reviews;
            },
        },
        mounted () {
            this.$store.dispatch('getReviews', {'movie_id': this.movieId});
        },
    }
</script>

<style scoped>

</style>