<template>
<div>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class=" bg-info text-white card-header">
                        <h4>All Todo Tasks <span>
                            <button class="btn btn-success float-right" data-toggle="modal" href="#addModal">+</button>
                            </span></h4>
                                
                            </div>

                    <div class="card-body">
                        <ul class="list-group">  
                            <li v-for="t in tasks.data" class="list-group-item">{{ t.id }} ~ {{ t.name }} 
                                <span class="float-right">
                                    <a href="#editModal" @click="getRecord(t.id)" data-toggle="modal" class="btn btn-primary">Edit</a> |    
                                    <button @click="delRecord(t.id)" class="btn btn-info">Delete</button> | 
                                    <a class="btn btn-warning" href="#viewModal" data-toggle="modal" data>Preview</a> </span></li>
                        </ul>
                       <pagination :data="tasks" @pagination-change-page="getResults"></pagination>
                    </div>

                <div class="card-footer text-right"><small>&copy; 2018, Perfect Web Solutions</small></div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal">
        <!-- recordadded dari addtask component -->
        <addtask @recordadded="refreshRecord"></addtask>
        <edittask :rec="editRec" ></edittask>
    </div>
</div>
</template>

<script>
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addtask', require('./addModalComponent.vue'));
Vue.component('edittask', require('./editModalComponent.vue'));
    export default {
        data() {
            return {
                tasks: {},
                records: {},
                editRec: {},
                errors: []
            }
        }, 
        methods: {
            getResults(page = 1) {
			axios.get('http://192.168.1.61/todo?page=' + page)
				.then((response) =>this.tasks = response.data)
                .catch((error) => console.log(error));
            },
            refreshRecord(record) {
                this.tasks = record.data
            }, 
            getRecord(id) {
                axios.get('http://192.168.1.61/todo/' + id)
                .then( response => this.editRec = response.data)
                .catch( error => this.errors = error.response.data.errors)
            }
            
        },
    created(){
        axios.get('http://192.168.1.61/todo')
        .then((response) => {this.tasks = response.data; })
        .catch((error) => console.log(error));
    } 
}
</script>

<style scoped>

</style>

