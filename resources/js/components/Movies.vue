<template>
    <div>
        <div>
            <h4 class="text-center font-weight-bold">Movies</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="movie in movies">
                    <td>{{movie.name}}</td>
                    <td>{{movie.description}}</td>
                    <router-link :to="{name: 'MovieReviewCreate', params: {movieId: movie.id}}">Reviews</router-link>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "movies",
        computed: {
            movies () {
                return this.$store.state.movies; 
            },
        },
        mounted () {
            this.$store.dispatch('getMovies')
        },
    }
</script>

<style scoped>

</style>