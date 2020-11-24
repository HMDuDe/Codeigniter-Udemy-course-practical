<h2>Add Book</h2>
<hr/>
    
<?php 
    $msg = $this->session->flashdata('msg');

    if(isset($msg)){
        echo $msg;
    }
?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url(); ?>book/addBookForm" method="post">
        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="bookName" class="form-control span12">
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <select id="department" class="form-control" name="department">
                <option>Select Department</option>

                <?php 
                    foreach($departmentData as $ddata){
                        ?>
                            <option value="<?php echo $ddata->departmentId; ?>"><?php echo $ddata->departmentName; ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="authorName">Author</label>
            <select id="authorName" class="form-control" name="authorName">
                <option>Select Author</option>

                <?php 
                    foreach($authorData as $adata){
                        ?>
                            <option value="<?php echo $adata->authorId; ?>"><?php echo $adata->authorName; ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Amount in Lib</label>
            <input type="number" name="amount" class="form-control span12">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit"> 
        </div>
    </form>
</div>