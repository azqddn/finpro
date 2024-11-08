{{-- Blue button --}}
<div class="row mb-4">
    <div class="col-md-6 offset-md-4">
        <button type="submit" style="width: 85px;height:35px; background-color:rgb(28, 28, 255); border:1px solid rgb(28, 28, 255); border-radius:5px; color:white">
            {{ __('Update') }}
        </button>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-8 offset-md-4 justify-content-end d-flex">
        <button type="submit"
            style="width: 150px;height:35px; background-color:rgb(28, 28, 255); border:1px solid rgb(28, 28, 255); border-radius:5px; color:white">
            {{ __('Change Password') }}
        </button>
    </div>
</div>

{{-- Edit Product --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ url('owner/update/' . $product->id . '/product') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Hidden field for product ID -->
                    <input type="hidden" id="productId" name="productId">

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName"
                            value="{{ $product->productName }}" required>
                    </div>

                    <!-- Product Cost -->
                    <div class="mb-3">
                        <label for="productCost" class="form-label">Cost (RM)</label>
                        <input type="number" class="form-control" id="productCost" name="productCost"
                            value="{{ $product->productCost }}" required>
                    </div>

                    <!-- Product Price -->
                    <div class="mb-3">
                        <label for="productSell" class="form-label">Price (RM)</label>
                        <input type="number" class="form-control" id="productSell" name="productSell"
                            value="{{ $product->productSell }}" required>
                    </div>



                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="categoryId" class="form-label">Category</label>
                        <select name="categoryId" id="categoryId" class="form-control">
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $product->category->id ? 'selected' : '' }}>
                                    {{ $category->categoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Product Quantity -->
                    <div class="mb-3">
                        <label for="productQuantity" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productQuantity" name="productQuantity"
                            value="{{ $product->productQuantity }}" required>
                    </div>



                    {{-- Reason --}}
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for Changes</label>
                        <input type="text" class="form-control" id="reason" name="reason" required>
                    </div>

                    {{-- Proof --}}
                    <div class="mb-3">
                        <label for="editProof" class="form-label">Proof</label>
                        <input type="file" required accept=".png, .jpg, .jpeg, .pdf" class="form-control"
                            id="editProof" name="editProof" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function populateModal(product) {

        // Function to format date as YYYY-MM-DD
        function formatDate(dateString) {
            const date = new Date(dateString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Populate modal fields with the clicked product's data
        document.getElementById('productId').value = product.id;
        document.getElementById('productName').value = product.productName;
        document.getElementById('productCost').value = product.productCost;
        document.getElementById('productSell').value = product.productSell;
        document.getElementById('categoryId').value = product.categoryId;
        document.getElementById('productQuantity').value = product.productQuantity;
        document.getElementById('stockAlert').value = product.stockAlert;

        // Format and populate the Expiry Date and Expiry Date Alert
        document.getElementById('productExpired').value = formatDate(product.productExpired);
        document.getElementById('expiredAlert').value = formatDate(product.expiredAlert);



        // Set the product name in the modal for display
        document.getElementById('productModalName').textContent = product.productName;

        // Set the product ID in the hidden input field
        document.getElementById('productId').value = product.id;

        // Set the form action dynamically with the product ID
        const formAction = `/owner/remove/${product.id}/product`;
        document.getElementById('removeForm').action = formAction;

    }
</script>