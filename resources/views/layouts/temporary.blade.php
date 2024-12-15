<li><a class="dropdown-item" href="#" data-bs-toggle="modal"
    data-bs-target="#removeModal"
    onclick="populateModal({{ json_encode($product) }})">Remove</a>
</li>

<script>
    function populateModal(product) {
        //Remove product data
        document.getElementById('productModalName').textContent = product.productName;
        document.getElementById('productId').value = product.id;
        const formAction = `/owner/remove/${product.id}/product`;
        document.getElementById('removeForm').action = formAction;
    }
</script>

{{-- Remove Product --}}
<div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%)">

        {{-- Content --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight:bold" id="productModalLabel">Remove Product</h5>
            </div>
            <h5 class="mx-3">
                The "<span id="productModalName"></span>" product will be removed from the product list.
            </h5>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                {{-- Form to remove the product --}}
                <form method="POST" action="" id="removeForm">
                    @csrf
                    <input type="hidden" id="productId" name="productId">
                    {{-- change the value of product status and pass to the controller --}}
                    <input type="hidden" id="productStatus" name="productStatus" value="0">
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
