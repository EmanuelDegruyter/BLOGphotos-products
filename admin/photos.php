<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}
$photos = Photo::find_all();
?>
<?php include("includes/sidebar.php") ?>
<?php include("includes/content-top.php") ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Photos
                <abbr title="Add Photo"><a class="btn btn-primary" href="upload.php"><i
                            class="fas fa-images"></i></a></abbr>
            </h2>
            <hr>
            <table class="table table-header">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Id</th>
                        <th>Title</th>
                        <th>File Name</th>
                        <th>Size</th>
                        <th>Delete</th>
                        <th>Delete²</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($photos as $photo): ?>
                    <tr>
                        <td><img src="<?php echo $photo->picture_path(); ?>" width="75" alt="picture"></td>
                        <td class="d-flex align-self-stretch"><?php echo $photo->id; ?></td>
                        <td><?php echo $photo->title; ?></td>
                        <td><?php echo $photo->filename; ?></td>
                        <td><?php echo $photo->size; ?></td>
                        <td><a class="btn btn-danger rounded-0" href="delete_photo.php?id=<?php echo $photo->id; ?>"><i class="far fa-trash-alt"></i></a></td>
                        <!-- Delete button with alert -->
                        <td><a class="btn btn-danger rounded-0" onClick="deletephoto(<?php echo $photo->id; ?>)"><i class="far fa-trash-alt"></i></a></td>
                        <!-- JavaScript function for delete -->
                        <script language="javascript">
                            function deletephoto(id){
                                if(confirm("Do you want to delete this photo?")){
                                    window.location.href="delete_photo.php?id=<?php echo $photo->id; ?>";
                                    return true
                                }
                            }
                        </script>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>