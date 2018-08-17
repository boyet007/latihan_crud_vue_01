<template>
<div>
   
    <div class="modal" id="viewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Show single task : {{ viewRec.id }}
                    </h5>
                    <button class="close"  type="button" data-dismiss="modal">&times;</button>
                    
                </div>
            
            <div class="modal-body">
                    <h6><b>View Task</b></h6>
                    <p id="name">{{ viewRec.name }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
</div>
</template>

<script>

export default {
        props: ['viewRec'],
       
    }

</script>

<style lang="scss" scoped>

</style>
