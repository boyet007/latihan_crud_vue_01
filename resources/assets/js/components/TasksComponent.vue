<template>
<div>
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class=" bg-info text-white card-header">
                        <h4>All Todo Tasks 
                            <span>
                                <button class="btn btn-success float-right" data-toggle="modal" href="#addModal">
                                    +
                                </button>
                            </span>
                        </h4>            
                     </div>
                    <div class="card-body">
                        <input type="search" v-model="search" class="form-control" @keyup="searchRecord">
                        <ul class="list-group">  
                            <li v-for="t in tasks.data" class="list-group-item">{{ t.id }} ~ {{ t.name }} 
                                <span class="float-right">
                                    <a href="#editModal" @click="getRecord(t.id)" data-toggle="modal" class="btn btn-primary">Edit</a> |    
                                    <button @click="delRecord(t.id)" class="btn btn-info">Delete</button> | 
                                    <a class="btn btn-warning" @click="getRecord(t.id)" href="#viewModal" data-toggle="modal" data>Preview</a> </span></li>
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
        <edittask :rec="editRec" @recordUpdated="refreshRecord" ></edittask>
        <viewtask :viewRec="editRec"></viewtask>
    </div>
</div>
</template>

<script>
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addtask', require('./addModalComponent.vue'));
Vue.component('edittask', require('./editModalComponent.vue'));
Vue.component('viewtask', require('./viewModalComponent.vue'));
                                     


    export default {
        data() {
            return {
                tasks: {},
                records: {},
                editRec: {},
                errors: [],
                search: ''
            }
        }, 
        methods: {
            getResults(page = 1) {
			    axios.get('/todo?page=' + page)
                    .then((response) =>this.tasks = response.data)
                    .catch((error) => console.log(error));
            },
            refreshRecord(record) {
                console.log(record);
                this.tasks = record.data
            }, 
            getRecord(id) {
                axios.get('/todo/' + id)
                .then( response => this.editRec = response.data )
                .catch( error => this.errors = error.response.data.errors )
            },
            delRecord(id) {
                const reply = confirm('Are You sure, you want to delete this record ?');
                if (reply) {
                    axios.delete('/todo/' + id)
                    .then (response => this.refreshRecord(response))
                    .catch( error => this.errors = error.response.data.errors)
                } else {
                    return
                }
            },
            searchRecord() {
                if(this.search.length >= 3) {
                    axios.get('/todo/search/' + this.search)
                    //.then(response => console.log(response))
                    .then(response => this.tasks = response.data)
                    .catch(err => console.log(err))
                } else {
                    this.getResults()
                }
            } 
        },
    created(){
        axios.get('/todo')
        .then((response) => {this.tasks = response.data; })
        .catch((error) => console.log(error));
    } 
}
</script>

<style scoped>

</style>

