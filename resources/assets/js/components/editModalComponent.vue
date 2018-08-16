<template>
<div>
   
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Record!</h5>
                    <button class="close" @click="clearModal" type="button" data-dismiss="modal">&times;</button>
                    
                </div>
            
            <div class="modal-body">
                    <p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
                    <label for="name">Add new Task</label>
                    <textarea name="name" id="name" cols="30" v-model="rec.name" rows="5" class="form-control"></textarea>
                    <ul v-if="errors.name" class="list-unstyled">
                        <li v-for="err in errors.name" class="alert alert-danger">{{ err }}</li>
                    </ul>
            </div>
            <div class="modal-footer">
                <button type="button" @click="clearModal" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" @click="updateRecord" class="btn btn-primary">Update changes</button>
            </div>
        </div>
    </div>
    </div>
</div>
</template>

<script>

export default {
        props: ['rec'],
        data() {
            return {
                success: '',
                errors: []
                
            }
        },
        methods: {
            updateRecord() {
                axios.post('http://127.0.0.1:8000/todo/' + this.rec.id, {
                    'name' : this.rec.name,
                    '_method' : 'PUT'
                })
                .then(data => {
                    this.$emit('recordUpdated', data);
                    this.success = 'Task updated successfully!!!';
                })
                .catch(error => this.errors = error.response.data.errors)
            },
            clearModal() {
                 this.errors = [];
                 this.success='';
            }
        }
    }

</script>

<style lang="scss" scoped>

</style>
