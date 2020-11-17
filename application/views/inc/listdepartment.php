<div class="main-content">
            <h2>Department List</h2>
      <hr/>
      
      <?php 
    $msg = $this->session->flashdata('msg');

    if(isset($msg)){
        echo $msg;
    }
?>
<table class="table">
  <thead>
    <tr>
      <th>Student No</th>
      <th>Department</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i = 0;
        foreach($departmentData as $ddata){
            $i++;

            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $ddata->departmentName; ?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>department/editdepartment/<?php echo $ddata->departmentId;?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure you wish to delete this student?')" href="<?php echo base_url(); ?>student/deletestudent/<?php echo $ddata->departmentId;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php
        }
    ?>
  </tbody>
</table>