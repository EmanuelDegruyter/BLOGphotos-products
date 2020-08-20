<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}
$products = Product::find_all();
?>
<?php include("includes/sidebar.php") ?>
<?php include("includes/content-top.php") ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>Products
                <abbr title="Add Photo"><a class="btn btn-primary" href="upload_product.php"><i
                            class="fas fa-images"></i></a></abbr>
            </h2>
            <hr>
            <table class="table table-header">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Id</th>
                        <th>Productname</th>
                        <th>Description</th>
                        <th>Delete</th>
                        <th>Delete²</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><img src="<?php echo $product->picture_path(); ?>" width="75" alt="picture"></td>
                        <td class="d-flex align-self-stretch"><?php echo $product->id; ?></td>
                        <td><?php echo $product->productname; ?></td>
                        <td><?php echo $product->description; ?></td>
                        <td><a class="btn btn-danger rounded-0" href="delete_photo.php?id=<?php echo $product->id; ?>"><i class="far fa-trash-alt"></i></a></td>
                        <!-- Delete button with alert -->
                        <td><a class="btn btn-danger rounded-0" onClick="deletephoto(<?php echo $product->id; ?>)"><i class="far fa-trash-alt"></i></a></td>
                        <!-- JavaScript function for delete -->
                        <script language="javascript">
                            function deletephoto(id){
                                if(confirm("Do you want to delete this photo?")){
                                    window.location.href="delete_photo.php?id=<?php echo $product->id; ?>";
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