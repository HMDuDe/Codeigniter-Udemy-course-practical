<h2>Update Student Information</h2>
<hr/>

<?php 
    $msg = $this->session->flashdata('msg');

    if(isset($msg)){
        echo $msg;
    }
?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url(); ?>student/updateStudent" method="post">
        <input type="text" name="studentId" value="<?php echo $studentById->studentId; ?>" hidden>

        <div class="form-group">
            <label>Student Name</label>
            <input type="text" name="name" value="<?php echo $studentById->name; ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Department</label>
            <input type="text" name="department" value="<?php echo $studentById->department; ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Roll No.</label>
            <input type="text" name="roll" value="<?php echo $studentById->roll; ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Reg. No.</label>
            <input type="text" name="reg" value="<?php echo $studentById->reg; ?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo $studentById->phone; ?>" class="form-control span12">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update"> 
        </div>
    </form>
</div>