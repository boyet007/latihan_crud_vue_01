<template>
<div>
   
    <div class="modal" id="viewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Record!</h5>
                    <button class="close"  type="button" data-dismiss="modal">&times;</button>
                    
                </div>
            
            <div class="modal-body">
                    <label for="name">View Task</label>
                    <p name="name" id="name" cols="30" v-model="rec.name" rows="5" class="form-control"></p>
            </div>
            <div class="modal-footer">
                <button type="button" @click="clearModal" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
</div>
</template>

<script>

export default {
        props: ['rec'],
       
    }

</script>

<style lang="scss" scoped>

</style>
