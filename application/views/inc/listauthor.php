<div class="main-content">
            <h2>Author List</h2>
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
      <th>Author Number</th>
      <th>Author Name</th>
      <th style="width: 3.5em;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i = 0;
        foreach($authorData as $adata){
            $i++;

            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $adata->authorName; ?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>author/editauthor/<?php echo $adata->authorId;?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure you wish to delete this author?')" href="<?php echo base_url(); ?>author/deleteauthor/<?php echo $adata->authorId;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php
        }
    ?>
  </tbody>
</table>