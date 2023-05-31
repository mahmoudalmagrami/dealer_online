<?php $__env->startSection('content'); ?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">المخازن /</span> إدارة المخازن
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table id="storeDatatable" class="datatables-basic table table-bordered">
                        <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>الصنف</th>
                            <th>المنتج</th>
                            <th>الوحدة</th>
                            <th>سعر الوحدة</th>
                            <th>سعر الشراء</th>
                            <th>تاريخ الانتاج</th>
                            <th>تاريخ الانتهاء</th>
                            <th>الكمية</th>
                            <th>الكمية المتبقة</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- BEGIN: Modal-->
            <?php echo $__env->make('stores.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('stores.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('stores.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- END: Modal-->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        <?php $__env->startPush('scripts'); ?>
            <script src="<?php echo e(asset('js/stores.js')); ?>"></script>
        <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelProjects\smart-trader\resources\views/stores/view.blade.php ENDPATH**/ ?>