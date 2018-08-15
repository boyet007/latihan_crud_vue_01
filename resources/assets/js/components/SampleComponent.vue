<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class=" bg-warning text-white card-header"><h2>Sample Panel Heading</h2></div>

                    <div class="card-body">
                        Hello, {{ name }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Sample Component mounted.')
        },
        data() {
            return {
                name: 'Philip Loa'
            }
        }

    }
</script>

<style scoped>
h2 {
    color:green;
}
</style>

