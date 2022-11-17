<p>
    <a href="/products/index.php" class="btn btn-secondary">Go back to Products</a>
</p>
    <h1>Create new product</h1>
<!--Error Message -->
<?php if(!empty($errors)): ?>
<div class = "alert alert-danger">
    <?php foreach($errors as $error): ?>
        <div><?php echo $error ?></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<!-- Form -->
    <form action="" method="post" enctype="multipart/form-data">
    <?php if($product['image']): ?>
        <img src="/<?php echo $product['image'] ?>" class="update-image">
        <?php endif ?>
    <div class="form-group">
        <label>Product Image</label><br>
        <input type="file" name = "image" >
    </div>
    <div class="form-group">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $product['title']; ?>">
    </div>
    <div class="form-group">
        <label>Product Description</label>
        <textarea class="form-control" name="description"><?php echo $product['description'];  ?></textarea>  
    </div>
    <div class="form-group">
        <label>Product Price</label>
        <input type="number" name="price" value="<?php echo $price ?>" step=".01" class="form-control">
    </div>
        
    <button type="submit" class="btn btn-primary">Submit</button>
</form>