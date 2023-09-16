<?php $__env->startSection('title', trans('backend/global.supplier.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.supplier.title')); ?>


<?php $__env->startSection('content'); ?>  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                <div class="dropdown pull-right">
                    <a href="<?php echo e(URL::route('backend.supplier.create')); ?>" class="btn btn-primary">
						<?php echo e(trans('backend/global.supplier.add_supplier')); ?>

                    </a>
                </div>
                <?php echo e(trans('backend/global.supplier.list')); ?>

            </h2>
        </div>
        <div class="panel-body">
			<div class="row">
                <div class="col-lg-12">
					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php echo app('translator')->getFromJson('backend/global.fields-errors'); ?>
							<br><br>
							<ul>
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><?php echo e($error); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					<?php endif; ?>
					<table id="suppliers" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th>#</th>
							<th><?php echo e(trans('backend/global.supplier.company')); ?></th>
							<th><?php echo e(trans('backend/global.supplier.email')); ?></th>
							<th><?php echo e(trans('backend/global.supplier.registration')); ?></th>
							<th><?php echo e(trans('backend/global.supplier.actions')); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($suppliers)): ?>
							<?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($supplier->id); ?></td>
									<td><?php echo e($supplier->company); ?></td>
									<td><?php echo e($supplier->email); ?></td>
									<td><?php echo e($supplier->registration); ?></td>
									<td>
										<a href="<?php echo e(URL::route('backend.supplier.edit', ['supplier' => $supplier->id])); ?>" type="button" class="btn btn-success margin-inline"><?php echo e(trans('backend/global.app_edit')); ?></a>
										<?php if(auth()->user()->can('shop_delete') || auth()->user()->can('shop_manage')): ?>
											<?php echo e(Form::open(['style' => 'display:inline;', 'method' => 'DELETE', 'route' => ['backend.supplier.destroy', $supplier->id]])); ?>

											<?php echo e(Form::submit(trans('backend/global.app_delete'), array('data-products' => $supplier->products->count(), 'class' => 'btn btn-danger margin-inline swal-btn-remove'))); ?>

											<?php echo e(Form::close()); ?>

											
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
						</tbody>
					</table>
					<div class="text-center"><?php echo e($suppliers->appends([])->links()); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<script>
$('#suppliers').DataTable({
	"responsive" : true,
	"paging":   false,
	"ordering": false,
	"info":     false,
	"filter":	false,
});
$('.swal-btn-remove').click(function(e){
	e.preventDefault();
	console.log($(e.target).data('products'));
	swal({
		title: "<?php echo e(trans('backend/global.app_are_you_sure')); ?>",
		text: $(e.target).data('products') + " <?php echo e(trans('backend/global.supplier.related')); ?>. <?php echo e(trans('backend/global.app_notable')); ?>",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "<?php echo e(trans('backend/global.app_yes_remove')); ?>",
		cancelButtonText: "<?php echo e(trans('backend/global.app_cancel')); ?>",
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