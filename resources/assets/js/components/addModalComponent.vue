<template>
<div>
   
    <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Record!</h5>
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    
                </div>
            
            <div class="modal-body">
                    <p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
                    <label for="name">Add new Task</label>
                    <textarea name="name" id="name" cols="30" v-model="record" rows="10" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="button" @click="addRecord" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    </div>
</div>
</template>

<script>
export default {
        data() {
            return {
                record:'',
                success: ''
            }
        },
        methods: {
            addRecord(){
                axios.post('http://localhost:8000/todo', {
                    'name' : this.record
                })
                .then(data => {
                    //emit untuk trigger event di component yang lain...
                    this.$emit('recordadded', data);
                    this.success = "Tasks Added Successfully!!!";
                })
                .catch(error => console.log(error))
                this.record = '';
            }
        }
    }

</script>

<style lang="scss" scoped>

</style>
