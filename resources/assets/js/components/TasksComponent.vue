<template>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class=" bg-info text-white card-header">
                        <h4>All Todo Tasks <span>
                            <button class="btn btn-success float-right">+</button>
                            </span></h4>
                                
                            </div>

                    <div class="card-body">
                        <ul class="list-group">  
                            <li v-for="t in tasks.data" class="list-group-item">{{ t.id }} ~ {{ t.name }} 
                                <span class="float-right"><button class="btn btn-primary">Add</button> | <button class="btn btn-info">Delete</button> | <button class="btn btn-warning">Preview</button> </span></li>
                        </ul>
                       <pagination :data="tasks" @pagination-change-page="getResults"></pagination>
                    </div>

                <div class="card-footer text-right"><small>&copy; 2018, Perfect Web Solutions</small></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
Vue.component('pagination', require('laravel-vue-pagination'));
    export default {
        data() {
            return {
                tasks: {}
            }
        }, 
        methods: {
            getResults(page = 1) {
			axios.get('http://192.168.1.61/todo?page=' + page)
				.then(response =>this.tasks = response.data)
                .catch(error => console.log(error));
		    }
        },
    created(){
        axios.get('http://192.168.1.61/todo')
        .then((response) => {this.tasks = response.data; console.log(this.tasks); })
        .catch((error) => console.log(error));
        console.log('Tasks Component loaded..');
    } 
}
</script>

<style scoped>

</style>

