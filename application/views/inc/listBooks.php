<div class="main-content">
            <h2>Book List</h2>
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
      <th>Book No</th>
      <th>Book Name</th>
      <th>Department</th>
      <th>Author</th>
      <th>Amount in Stock</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i = 0;
        foreach($bookData as $bdata){
            $i++;

            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $bdata->bookName; ?></td>

                    <td>
                    
                      <?php 
                        $departmentId = $bdata->department;
                        $departmentData = $this->department_model->getDepartmentById($departmentId);
                        
                        echo $departmentData->departmentName;

                      ?>
                    
                    </td>

                    <td>
                        <?php 
                            $authorId = $bdata->authorName;
                            $authorData = $this->author_model->getAuthorDataById($authorId);

                            echo $authorData->authorName;
                        ?>
                    </td>

                    <td><?php echo $bdata->amount; ?></td>

                    <td>
                        <a href="<?php echo base_url(); ?>book/editBook/<?php echo $bdata->bookId;?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure you wish to delete this student?')" href="<?php echo base_url(); ?>book/deleteBook/<?php echo $bdata->bookId;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php
        }
    ?>
  </tbody>
</table>