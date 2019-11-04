<template>
    <div>
        <div v-if="message" class="alert alert-dismissible fade show" v-bind:class="{'alert-success': isSuccess, 'alert-danger': hasError}"  role="alert">
            {{ message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>       
    </div>
</template>

<script>
    export default {
        name: "form-message",
        computed: {
            message () {
                return this.$store.state.message;
            },
            isSuccess () {
                if(this.$store.state.errors) {
                    return false;
                } else {
                    return true;
                }
            },
            hasError () {
                if(this.$store.state.errors) {
                    return true;
                } else {
                    return false;
                }
            },
        }
    }
</script>

<style scoped>

</style>