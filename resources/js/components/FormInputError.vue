<template>
    <div>
        <div v-if="errors[inputName]" class="alert alert-danger">
            <div v-for="err in errors[inputName].values()"> {{ err }} </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "form-input-error",
        props: {
            inputName: String,
        },
        computed: {
            errors () {
                return this.$store.state.errors;
            }
        }
    }
</script>

<style scoped>
