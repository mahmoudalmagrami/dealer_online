<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddProduct" aria-labelledby="offcanvasAddProductLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddProductLabel" class="offcanvas-title">إضافة منتج جديد</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="addNewProductForm" onsubmit="return false">
            <div class="mb-3">
                <label class="form-label" for="add-product-name">اسم المنتج</label>
                <input
                    type="text"
                    class="form-control"
                    id="add-product-name"
                    name="productName"
                />
            </div>
            <div class="mb-3">
                <label class="form-label" for="category">الأصناف</label>
                <select id="category" class="select2 form-select">
                    <option value="">اختر</option>
                    <option value="Australia">Australia</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Japan">Japan</option>
                    <option value="Korea">Korea, Republic of</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Russia">Russian Federation</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>
<?php /**PATH D:\laravelProjects\smart-trader\resources\views/components/add.blade.php ENDPATH**/ ?>
