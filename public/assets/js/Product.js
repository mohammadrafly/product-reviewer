function saveProduct() {
    const id = $('#id').val();
    var formData = new FormData($('#productForm')[0]);

    ajaxRequest(`dashboard/product/${id ? 'update/' : ''}` + (id ? id : ''), 'POST', formData,
        function(response) {
            console.log(response);
            $('#productForm')[0].reset();
            alert('Product saved successfully!');
        },
        function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Failed to save product. Please try again later.');
        }
    );
}

function updateProduct(id) {
    ajaxRequest('dashboard/product/update/' + id, 'GET', '',
        function(response) {
            console.log(response);
            toggleCollapse('form');
            $('#id').val(response.message.id);
            $('#product_name').val(response.message.product_name);
            $('#product_desc').val(response.message.product_desc);
            $('#published').val(response.message.published);
            $('#file_name_display').text(response.message.product_picture);
        },
        function(xhr, status, error) {
            console.error(xhr);
            alert('Failed to save product. Please try again later.');
        }
    );
}

function deleteProduct(id) {
    if (confirm("Are you sure you want to delete this product?")) {
        ajaxRequest('dashboard/product/delete/' + id, 'GET', null,
            function(response) {
                console.log(response);
                alert('Product deleted successfully!');
            },
            function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Failed to delete product. Please try again later!');
            }
        );
    }
}

