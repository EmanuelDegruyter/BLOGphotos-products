<?php include("includes/header.php");
if (!$session->is_signed_in()) {
    redirect('login.php');
}
?>
<?php include("includes/sidebar.php") ?>
<?php include("includes/content-top.php") ?>

<?php
$message = "";
if (isset($_POST['uploadproduct'])) {
    $product = new Product();
    $product->productname = $_POST['productname'];
    $product->description = $_POST['description'];
    $product->set_product_file($_FILES['file']);

    if ($product->save_product()) {
        $message = "Photo uploaded successfully";
        redirect('products.php');
    } else {
        $message = join('<br>', $product->errors);
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">
                Upload Product
            </h1>
            <hr>
            <h5 style="color: red"><?php echo $message; ?></h5>
            <form action="upload_product.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">productname</label>
                    <input type="text" name="productname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                <label for="title">file</label>
                    <input type="file" name="file" class="form-control">
                </div>
                <input type="submit" name="uploadproduct" value="Upload Product" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>