<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}
//$photos = Photo::find_all();
?>
<?php include("includes/sidebar.php") ?>
<?php include("includes/content-top.php") ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Edit Photo</h2>
            <form action="edit_Photo.php" method="post">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alternate_text">Alternate Text</label>
                            <input type="text" name="alternate_text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4><a class="" data-toggle="collapse" href="#collapseExample" role=""
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Save</a></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="fas fa-calendar"> Uploaded on: Month Day, Year @ Time HH:MM</span>
                                    </p>
                                    <p class="text">
                                        <label for="type">Photo Id: </label>
                                        <input readonly type="text" name="type" class="form-control">
                                    </p>
                                    <p class="text">
                                        <label for="type">Filename: </label>
                                        <input readonly type="text" name="type" class="form-control">
                                    </p>
                                    <p class="text">
                                        <label for="type">File Type: </label>
                                        <input readonly type="text" name="type" class="form-control">
                                    </p>
                                    <p class="text">
                                        <label for="size">File Size: </label>
                                        <input readonly type="text" name="size" class="form-control">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="info-box-footer">
                            <div class="info-box-delete float-right">
                                <a href="delete_Photo.php?id=<?php echo $photo->id; ?>"
                                    class="btn btn-danger btn-lg">Delete</a>
                            </div>
                            <div class="info-box-update float-left">
                                <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>