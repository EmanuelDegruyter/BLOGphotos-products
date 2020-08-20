<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}
?>
<?php include("includes/sidebar.php") ?>
<?php include("includes/content-top.php") ?>

<?php
$message = "";
if (isset($_POST['upload'])) {
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file']);

    if ($photo->save()) {
        $message = "Photo uploaded successfully";
        redirect('photos.php');
    } else {
        $message = join('<br>', $photo->errors);
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">
                Upload Photo
            </h1>
            <hr>
            <h5 style="color: red"><?php echo $message; ?></h5>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                <label for="title">file</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <input type="submit" name="upload" value="Upload Photo" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>