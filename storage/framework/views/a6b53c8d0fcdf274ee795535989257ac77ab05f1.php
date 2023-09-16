<?php $__env->startSection('title', trans('backend/global.customer.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.customer.title')); ?>


<?php $__env->startSection('content'); ?>  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                <?php echo e(trans('backend/global.customer.list')); ?>

            </h2>
        </div>
        <div class="panel-body">
			<div class="row">
                <div class="col-lg-12">
					<table id="orders" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th><?php echo e(trans('backend/global.customer.name')); ?></th>
							<th><?php echo e(trans('backend/global.customer.location')); ?></th>
							<th><?php echo e(trans('backend/global.customer.orders')); ?></th>
							<th><?php echo e(trans('backend/global.customer.last_order')); ?></th>
							<th><?php echo e(trans('backend/global.customer.total_spent')); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($orders)): ?>
							<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($order->customer->lastname); ?></td>
									<td><?php echo e($order->customer->addresses->first()->country); ?></td>
									<td><?php echo e($order->total_order); ?></td>
									<td><?php echo e($order->created_at); ?></td>
									<td><?php echo e($order->getSymbolCurrency()); ?> <?php echo e(number_format($order->total_spent, 2)); ?></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
						</tbody>
					</table>
					<div class="text-center"><?php echo e($orders->appends([])->links()); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<script>
$('#orders').DataTable({
	"responsive" : true,
	"paging":   false,
	"ordering": false,
	"info":     false,
	"filter":	false,
});

$('.swal-btn-remove').click(function(e){
	e.preventDefault();
	swal({
		title: "<?php echo e(trans('backend/global.app_are_you_sure')); ?>",
		text: "<?php echo e(trans('backend/global.app_notable')); ?>",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "Yes, remove it",
		cancelButtonText: "Cancel",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm) {
		if (isConfirm) {
			setTimeout(function(){
				$(e.target).parent().submit()
			}, 1000);
			swal({
				title: "<?php echo e(trans('backend/global.app_delete')); ?>",
				text: "<?php echo e(trans('backend/global.app_deleted')); ?>",
				type: "<?php echo e(trans('backend/global.app_success')); ?>",
				confirmButtonClass: "btn-success"
			});
		} else {
			swal({
				title: "<?php echo e(trans('backend/global.app_cancelled')); ?>",
				text: "<?php echo e(trans('backend/global.app_safe')); ?>",
				type: "error",
				confirmButtonClass: "btn-danger"
			});
		}
	});
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>