<h1>Product List</h1>

<p>
    <a href="/products/create" class="btn btn-success">Create Product</a>
</p>

<form>
    <div class="input-group mb-3">
        <input type="search" class="form-control" placeholder="Search for Products" name="search" value="<?=$search ?>">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Create Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $i => $product) { ?>
        <tr>
            <th scope="row"><?=$i+1 ?></th>
            <td>
                <?php if ($product['image']): ?>
                <img class="thumb-image" src="../<?= $product['image']?>" alt="image">
                <?php endif; ?>
                </td>
            <td><?=$product['title'] ?></td>
            <td><?=$product['price'] ?></td>
            <td><?=$product['create_date'] ?></td>
            <td>
                <a href="/products/update?id=<?=$product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form action="/products/delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?=$product['id']?>">
                    <button type="submit" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>