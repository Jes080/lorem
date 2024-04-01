 <!-- Task Form -->
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input id="quantity" name="quantity" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input id="category" name="category" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <textarea id="remarks" name="remarks" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="due">Due Date:</label>
                        <input id="date" type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="m-3 btn btn-success">Create Product</button>
                    </div>
                </form>


