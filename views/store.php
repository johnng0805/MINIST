<div class="category__wrapper">
    <h3>Add category</h3>
    <form action="/admin/category" method="POST" class="mb-3">
        <div class="mb-3">
            <label for="category__name">Name</label>
            <input type="text" id="category__name" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="category__description">Description</label>
            <textarea id="category__description" name="description" class="form-control"></textarea>
        </div>
        <button type="submit" name="submitBtn" class="btn btn-primary">Save</button>
    </form>
    <h3>Add vendor</h3>
    <form action="/admin/vendor" method="POST" class="mb-3">
        <div class="mb-3">
            <label for="vendor__name">Name</label>
            <input type="text" id="vendor__name" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="vendor__email">Email</label>
            <input type="email" id="vendor_email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="vendor__country">Country</label>
            <input type="text" id="vendor__country" name="country" class="form-control">
        </div>
        <button type="submit" name="submitBtn" class="btn btn-primary">Save</button>
    </form>
    <h3>Add product</h3>
    <form action="/admin/product" method="POST" class="mb-3">
        <div class="mb-3">
            <label for="product__name">Name</label>
            <input type="text" id="product__name" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="product__feature">Feature</label>
            <input type="text" id="product_email" name="feature" class="form-control">
        </div>
        <div class="mb-3">
            <label for="product__description">Description</label>
            <textarea name="description" id="product__description" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="product__price">Price</label>
            <input type="number" id="product__price" name="price" step="0.01" class="form-control">
        </div>
        <div class="mb-3">
            <label for="category__id">Category ID</label>
            <input type="number" name="category_id" id="category__id" class="form-control">
        </div>
        <div class="mb-3">
            <label for="vendor__id">Vendor ID</label>
            <input type="number" name="vendor_id" id="vendor__id" class="form-control">
        </div>
        <button type="submit" name="submitBtn" class="btn btn-primary">Save</button>
    </form>
    <h3>Add images to product</h3>
    <form action="/admin/product/image" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="product__id">Product's ID</label>
            <input type="number" name="product_id" id="product__id" class="form-control">
        </div>
        <div class="mb-3">
            <label for="product__image">Image</label>
            <input type="file" name="product_image" id="product__image" class="form-control">
        </div>
        <button type="submit" name="submitBtn" class="btn btn-primary">Upload</button>
    </form>
</div>