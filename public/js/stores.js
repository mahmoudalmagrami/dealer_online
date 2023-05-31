$(document).ready(function () {
    getStoreProducts();
    editProduct();
});
async function showOffcanvasToAddProduct() {
    await getProductsToStore('#product', '#add-product-parent');
    showOffcanvas('#offcanvasAddStoreProduct');
}

function showOffcanvasToEditProduct(id) {
    // Make an AJAX request to get the product data by ID
    fetch(`/api/products/${id}`)
        .then(response => response.json())
        .then(async product => {
            product = product.data;
            // Get the offcanvas element by selector
            const offcanvas = document.querySelector('#offcanvasEditProduct');
            // Populate form fields with the product data
            offcanvas.querySelector('#productId').value = product.id;
            offcanvas.querySelector('#productName').value = product.name;
            // Populate the category select element with options
            await getCategories('#productCategory', '#edit-product-category-parent', product.product_category.id);
            // var $categorySelect = $('#productCategory');
            // $categorySelect.val(product.product_category.id).trigger('change');

            // Show the offcanvas
            showOffcanvas('#offcanvasEditProduct');
        })
        .catch(error => console.error(error));
}
async function getProductsToStore(select2ID, parentID, selectedItem) {
    // get the select element
    var $productSelect = $(select2ID);
    // make the API request using $.ajax()
    $.fn.select2.defaults.set("dropdownParent", $(parentID));
    const response = await fetch('/api/products');
    const data = await response.json();
    data.data.forEach(category => {
        const option = new Option(category.name, category.id);
        $productSelect.append(option);
    });
    if (selectedItem !== null) {
        $productSelect.val(selectedItem).trigger('change');
    }
    $productSelect.select2();
}
function getStoreProducts() {
    if ($.fn.DataTable.isDataTable('#storeDatatable')) {
        $('#storeDatatable').DataTable().ajax.reload();
    } else {
        $("#storeDatatable").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            searching: true,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            responsive: false,
            dom:
                '<"row"<"col-sm-12"<"col-sm-12"B>>>' + '<"row"<"col-sm-12 col-md-6"l>' + '<"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                {
                    text: '<i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">إضافة منتج</span>',
                    className: 'dt-button create-new btn btn-primary m-2',
                    action: function (e, dt, node, config) {
                        showOffcanvasToAddProduct();
                    }

                },
                {
                    extend: 'collection',
                    className: 'class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2"',
                    text: 'تصدير',
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'Copy',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'PDF',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'excel',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'Excel',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'CSV',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'print',
                            className: 'dt-button buttons-print dropdown-item',
                            text: 'Print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                    ]
                }
            ],
            ajax: '/api/stores',
            columns: [
                {data: 'id'},
                {data: 'product.product_category.name',searchable: false,orderable: false,},
                {data: 'product.name',searchable: false,orderable: false},
                {data: 'unit'},
                {data: 'unit_price'},
                {data: 'purchasing_price'},
                {data: 'production_date'},
                {data: 'expiry_date'},
                {data: 'quantity'},
                {data: 'remaining_quantity'},
                {
                    "render": function (data, type, row) {
                        return `<button onClick="showOffcanvasToEditProduct(${row.id})" class="btn btn-primary btn-sm">تعديل</button>` +
                            `<span>&nbsp;</span>` +
                            `<button onClick="stopProduct('${row.is_active?'تفعيل':'ايقاف'}','${row.id}')" class="btn btn-secondary btn-sm">${row.is_active?'ايقاف':'تفعيل'}</button>`;
                    },
                    "name": "action",
                    "autoWidth": true,
                    "searchable": false,
                    "orderable": false
                },
            ]
        });
    }
}
function addProductToStore() {
    $('#offcanvasAddStoreProduct').validate({
        rules: {
            product_id: {
                required: true,
            },
            unit: {
                required: true,
            },
            unit_price: {
                required: true,
            },
            production_date: {
                required: true,
            },
            expiry_date: {
                required: true,
            },
            quantity: {
                required: true,
            },
            remaining_quantity: {
                required: true,
            },
        },
        messages: {
            name: {
                required: 'Please enter a product name.',
            },
            product_category_id: {
                required: 'Please enter a product category.',
            },
            product_image: {
                required: 'Please select a product image.',
            }
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            var fileInput = $('#product_image')[0];
            var file = fileInput.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
                var base64Image = reader.result;
                var cleanedBase64Image = base64Image.split(',')[1]; // remove metadata from base64
                formData.append('image', cleanedBase64Image);
                // make the API request using $.ajax()
                $.ajax({
                    url: '/api/products',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // handle the successful response
                        getProducts();
                        showSuccessToast('Success', 'The operation completed successfully.');
                    },
                    error: function (xhr, status, error) {
                        // handle the error response
                        showErrorToast('Error',error);
                        console.log(xhr.responseText);
                    }
                });
            };
        }
    });
}

function editProduct() {
    $('#editProductForm').validate({
        rules: {
            name: {
                required: false,
                minlength: 3
            },
            product_category_id: {
                required: false,
                number: true,
            },
            product_image: {
                required: false,
            }
        },
        messages: {
            name: {
                minlength: 'Product name must be at least 3 characters long.'
            },
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            var data = {};
            for (var pair of formData.entries()) {
                if (pair[1] !== '') {
                    data[pair[0]] = pair[1];
                }
            }
            var fileInput = $('#productImage')[0];
            var file = fileInput.files[0];
            console.log('file: '+file);

            if (file) {
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var base64Image = reader.result;
                    var cleanedBase64Image = base64Image.split(',')[1];
                    data['image'] = cleanedBase64Image;
                    console.log(cleanedBase64Image);
                    $.ajax({
                        url: `/api/products/` + formData.get('id'),
                        method: 'PUT',
                        contentType: 'application/json',
                        data: JSON.stringify(data),
                        success: function (updatedData) {
                            getProducts();
                            showSuccessToast('Success', 'The operation completed successfully.');
                        },
                        error: function (error) {
                            console.error('error: ' + error);
                            showErrorToast('Error',error);
                        }
                    });
                }
            } else {
                $.ajax({
                    url: `/api/products/` + formData.get('id'),
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                    success: function (updatedData) {
                        getProducts();
                        showSuccessToast('Success', 'The operation completed successfully.');
                    },
                    error: function (error) {
                        console.error('error: ' + error);
                        showErrorToast('Error',error);
                    }
                });
            }

        }
    });
}
function stopProduct(title, id) {
     showModal('#stop-product-modal', title, id);

    // Detach the event listener before attaching it again
    $(document).off('click', '#stop-product-modal #product-stop').on('click', '#stop-product-modal #product-stop', function() {
        // Make the API request to stop the product
        var id = $("#stop-product-modal").data('product-id');
        console.log('id: ' + id)
        $.ajax({
            url: 'api/products/' + id,
            type: 'DELETE',
            success: function(data) {
                $('#stop-product-modal').modal('hide');
                getProducts();
                showSuccessToast('Success', 'The operation completed successfully.');


            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#stop-product-modal').modal('hide');
                getProducts();
                showErrorToast('Error', error);
            }
        });
    });
}
function showSuccessToast(title, body) {
    // Update the toast elements with the provided title and body text
    $('#success-toast .success-toast-title').text(title);
    $('#success-toast .success-toast-body').text(body);

    new bootstrap.Toast(document.getElementById('success-toast')).show();
}
function showErrorToast(title, body) {
    // Update the toast elements with the provided title and body text
    $('#error-toast .error-toast-title').text(title);
    $('#error-toast .error-toast-body').text(body);

    new bootstrap.Toast(document.getElementById('error-toast')).show();
}
