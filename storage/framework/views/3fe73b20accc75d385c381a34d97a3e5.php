<?php $__env->startSection('content'); ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">المنتجات /</span> إدارة المنتجات</h4>
        <!-- DataTable with Buttons -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table  id="productDatatable"  class="datatables-basic table table-bordered">
                    <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>المنتج</th>
                        <th>الصنف</th>
                        <th>التاريخ</th>
                        <th>الصورة</th>
                        <th>الإجراءات</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-fluid d-flex flex-column flex-md-row flex-wrap justify-content-between py-2">
            <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://pixinvent.com" target="_blank" class="footer-link fw-semibold">PIXINVENT</a>
            </div>
            <div>
                <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                >License</a
                >
                <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                >More Themes</a
                >

                <a
                    href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/documentation-bs5/"
                    target="_blank"
                    class="footer-link me-4"
                >Documentation</a
                >

                <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                >Support</a
                >
            </div>
        </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelProjects\smart-trader\resources\views/pages/view.blade.php ENDPATH**/ ?>
