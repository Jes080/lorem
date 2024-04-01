<x-app-layout>
    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        @if(session('success'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

        <h1 class="mt-3 ms-3">{{$title}}</h1>
        <p class="ms-3">This is the function page.</p>

    <!--Task Portal-->
    <!-- Add Product Button -->
<button class="btn btn-success ms-3" style="width: 20%" data-bs-toggle="modal" data-bs-target="#add-product-modal">Add Product</button>



<!-- Add Product Modal -->
<div class="modal fade" id="add-product-modal" tabindex="-1" aria-labelledby="add-product-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="add-product-modal-label">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Include Add Product Form -->
                @include('form.addproductform')
            </div>
        </div>
    </div>
</div>

<div class="p-3 mx-auto mt-3 mb-5 border-2 rounded shadow card border-dark-subtle bg-body-tertiary" style="width: 80%;">

    <!-- Filter Input Field -->
<div class="mb-3 ms-4" style="width: 50%;">
    <label for="filter" class="form-label">Filter:</label>
    <input type="text" class="form-control" id="filter" placeholder="Enter filter criteria...">
</div>

    <!-- Task Table -->
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div style="overflow-x: auto;">
                    <table id="product-table" class="table text-center custom-table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Remarks</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach($products as $product)
                                <tr class="table-light">
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->remarks }}</td>
                                    <td>{{ $product->date }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <!-- Button trigger for update task modal -->
                                            <button class="btn btn-primary btn-sm update-product me-2" data-bs-toggle="modal" data-bs-target="#update-product-modal" data-product-id="{{ $product->id }}">Edit</button>
                                            <!-- Form for delete task -->
                                            <form action="{{ route('product.destroy', ['id' => $product->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm me-2">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2">
        {{ $products->links() }}
    </div>
</div>


<!-- Update Product Modal -->
<!-- This need to be below everything -->
<div class="modal fade" id="update-product-modal" tabindex="-1" aria-labelledby="update-product-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="update-product-modal-label">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" id="update-product-form">
                <!-- Include Add Product Form -->
                @include('form.updateproductform')
            </div>
        </div>
    </div>
</div>

    </div>
    <script>
const filterInput = document.getElementById('filter');

filterInput.addEventListener('input', function(){

    const filterValue = this.value.trim().toLowerCase();

    const rows = document.querySelectorAll('#product-table tbody tr');

    rows.forEach(row => {
        const name = row.cells[0].textContent.toLowerCase();
        const quantity = row.cells[1].textContent.toLowerCase();
        const category = row.cells[2].textContent.toLowerCase();
        const remarks = row.cells[3].textContent.toLowerCase();
        const date = row.cells[4].textContent.toLowerCase();

        if(name.includes(filterValue) ||
        quantity.includes(filterValue) ||
        category.includes(filterValue) ||
        remarks.includes(filterValue) ||
        date.includes(filterValue)){
            row.style.display = '';
        }else{
            row.style.display = 'none';
        }
    });
});



// Automatically close the success message after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        var successAlert = document.getElementById('successAlert');
        if (successAlert !== null) {
            successAlert.classList.add('fade');
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 1000); // Fade duration is 1 second
        }
    }, 5000); // 5 seconds
});
</script>

</x-app-layout>
