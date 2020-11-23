<H2>Update Author</h2>
<hr/>

<?php 
    $msg = $this->session->flashdata('msg');

    if(isset($msg)){
        echo $msg;
    }
?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url(); ?>author/editAuthorForm" method="POST">
        <input type="text" value="<?php echo $authorDataById->authorId; ?>" name="authorId" hidden>

        <div class="form-group">
            <label>Author Name</label>
            <input type="text" value="<?php echo $authorDataById->authorName; ?>" name="authorName" class="form-control span12">
        </div>
    
        <div class="form-group">
        <input type="submit"class="btn btn-primary" value="Submit"> 
        </div>
            
    </form>
</div>	