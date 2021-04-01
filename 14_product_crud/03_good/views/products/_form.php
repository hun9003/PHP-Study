<?php if (!empty($errors)): ?>
<div class="alert alert-danger">
  <?php foreach ($errors as $error): ?>
  <div><?= $error ?></div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php if ($product['image']): ?>
            <img class="update-image" src="../<?=$product['image']?>" alt="image">
        <?php endif; ?>
        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label>Product Title</label>
            <input type="text" class="form-control" name="title" value="<?=$product['title'] ?>">
        </div>
        <div class="mb-3">
            <label>Product Description</label>
            <textarea class="form-control" name="description"><?=$product['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Product Price</label>
            <input type="number" step=".01" class="form-control" name="price" value="<?=$product['price'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>