<div class="main-content">
            <h2>Student List</h2>
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
      <th>Name</th>
      <th>Department</th>
      <th>Role</th>
      <th>Reg</th>
      <th>Phone</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i = 0;
        foreach($studentdata as $sdata){
            $i++;

            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $sdata->name; ?></td>
                    <td><?php echo $sdata->department; ?></td>
                    <td><?php echo $sdata->roll; ?></td>
                    <td><?php echo $sdata->reg; ?></td>
                    <td><?php echo $sdata->phone; ?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>student/editstudent/<?php echo $sdata->studentId;?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure you wish to delete this student?')" href="<?php echo base_url(); ?>student/deletestudent/<?php echo $sdata->studentId;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php
        }
    ?>
  </tbody>
</table>