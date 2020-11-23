<h2>Update Department Information</h2>
<hr/>

<?php 
    $msg = $this->session->flashdata('msg');

    if(isset($msg)){
        echo $msg;
    }
?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url(); ?>department/updateDepartment" method="post">
        <input type="text" name="departmentId" value="<?php echo $departmentDataById->departmentId; ?>" hidden>

        <div class="form-group">
            <label>Department</label>
            <input type="text" name="departmentName" value="<?php echo $departmentDataById->departmentName; ?>" class="form-control span12">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update"> 
        </div>
    </form>
</div>