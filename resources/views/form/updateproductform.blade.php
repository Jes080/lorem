<form id="update-product-form" action="{{ route('product.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Add form fields with IDs -->
    <input type="hidden" id="update-product-id" name="product_id" value="{{ $product->id }}">
    <div class="form-group">
        <label for="update-name">Name:</label>
        <input required id="update-name" class="form-control" name="name" value="{{ $product->name }}">
    </div>
    <div class="form-group">
        <label for="update-quantity">Quantity:</label>
        <input required id="update-quantity" type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
    </div>
    <div class="form-group">
        <label for="update-category">Category:</label>
        <input required id="update-category" class="form-control" name="category" value="{{ $product->category }}">
    </div>
    <div class="form-group">
        <label for="update-remarks">Remarks:</label>
        <input id="update-remarks" class="form-control" name="remarks" value="{{ $product->remarks }}">
    </div>
    <div class="form-group">
        <label for="update-date">Date:</label>
        <input required id="update-date" type="date" class="form-control" name="date" value="{{ $product->date }}">
    </div>
    <div class="mt-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Update Product</button>
    </div>
</form>
