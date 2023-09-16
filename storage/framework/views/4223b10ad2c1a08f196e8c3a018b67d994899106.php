<?php $__env->startSection('title', trans('backend/global.shop.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.shop.title')); ?>


<?php $__env->startSection('content'); ?>  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                <div class="dropdown pull-right">
                    <a href="<?php echo e(URL::route('backend.shop.create')); ?>" class="btn btn-primary">
						<?php echo e(trans('backend/global.shop.add_shop')); ?>

                    </a>
                </div>
                <?php echo e(trans('backend/global.shop.list')); ?>

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
					<table id="shops" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th>#</th>
							<th><?php echo e(trans('backend/global.shop.company')); ?></th>
							<th><?php echo e(trans('backend/global.shop.email')); ?></th>
							<th><?php echo e(trans('backend/global.shop.registration')); ?></th>
							<th><?php echo e(trans('backend/global.shop.actions')); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($shops)): ?>
							<?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($shop->id); ?></td>
									<td><?php echo e($shop->company); ?></td>
									<td><?php echo e($shop->email); ?></td>
									<td><?php echo e($shop->registration); ?></td>
									<td>
										<a href="<?php echo e(URL::route('backend.shop.edit', ['shop' => $shop->id])); ?>" type="button" class="btn btn-success margin-inline"><?php echo e(trans('backend/global.app_edit')); ?></a>
										<?php if(auth()->user()->can('shop_delete') || auth()->user()->can('shop_manage')): ?>
											<?php echo e(Form::open(['style' => 'display:inline;', 'method' => 'DELETE', 'route' => ['backend.shop.destroy', $shop->id]])); ?>

											<?php echo e(Form::submit(trans('backend/global.app_delete'), array('data-products' => $shop->products->count(), 'class' => 'btn btn-danger margin-inline swal-btn-remove'))); ?>

											<?php echo e(Form::close()); ?>

											
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
						</tbody>
					</table>
					<div class="text-center"><?php echo e($shops->appends([])->links()); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<script>
$('#shops').DataTable({
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
		text: $(e.target).data('products') + " <?php echo e(trans('backend/global.shop.related')); ?>. <?php echo e(trans('backend/global.app_notable')); ?>",
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