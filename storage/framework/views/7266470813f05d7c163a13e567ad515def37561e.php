<?php $__env->startSection('title', trans('backend/global.product.title')); ?>
<?php $__env->startSection('page-title', trans('backend/global.product.title')); ?>


<?php $__env->startSection('content'); ?>  
	<div class="panel panel-default">
		<div class="panel-heading">
            <h2>
                <?php echo e(trans('backend/global.product.list')); ?>

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
					<table id="products" class="vertical-middle table table-hover nowrap" width="100%">
						<thead class="thead-inverse">
						<tr>
							<th>#</th>
							<th><?php echo e(trans('backend/global.product.thumbnail')); ?></th>
							<th><?php echo e(trans('backend/global.product.title2')); ?></th>
							<th><?php echo e(trans('backend/global.product.category')); ?></th>
							<th><?php echo e(trans('backend/global.product.sku')); ?></th>
							<th><?php echo e(trans('backend/global.product.price')); ?></th>
							<th><?php echo e(trans('backend/global.product.virtual_stock')); ?></th>
							<th><?php echo e(trans('backend/global.product.status')); ?></th>
							<th><?php echo e(trans('backend/global.product.link')); ?></th>
							<th><?php echo e(trans('backend/global.product.actions')); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php if(count($products)): ?>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($product->id); ?></td>
									<td>
									<?php if($product->images->count()): ?>
										<a href="<?php echo e(URL::route('backend.product.edit', ['product' => $product->id])); ?>" class="cui-ecommerce--dashboard--list--img"><img src="/storage/users/<?php echo e($product->user_id); ?>/products/<?php echo e($product->id); ?>/gallery/<?php echo e(File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $product->images->first()->filename . '_50x50.*')[0])); ?>"></a>
									<?php endif; ?>
									</td>
									<td><?php echo e($product->title); ?></td>
									<td><?php echo e($product->category); ?></td>
									<td><?php echo e($product->sku); ?></td>
									<td><?php echo e(($product->shop->getSymbolCurrency())); ?> <?php echo $product->price_discount ? number_format($product->price_discount, 2).'<small style="display: block;text-decoration: line-through;">'.number_format($product->price, 2).'</small>' : number_format($product->price, 2); ?></td>
									<td><?php echo e($product->virtual_stock); ?></td>
									<td><?php echo $product->active ? '<span class="label label-success">'.trans('backend/global.app_enabled').'</span>' : '<span class="label label-danger">'.trans('backend/global.app_disabled').'</span>'; ?></td>
									<td><a target="_blank" href="<?php echo e(URL::route('product.index', ['unique_id' => $product->unique_id])); ?>"><?php echo e($product->unique_id); ?></a></td>
									<td>
										<a href="<?php echo e(URL::route('backend.product.edit', ['product' => $product->id])); ?>" type="button" class="btn btn-success margin-inline"><?php echo e(trans('backend/global.app_edit')); ?></a>
										<?php if(auth()->user()->can('shop_product_delete') || auth()->user()->can('shop_product_manage')): ?>
											<?php echo e(Form::open(['style' => 'display:inline;', 'method' => 'DELETE', 'route' => ['backend.product.destroy', $product->id]])); ?>

											<?php echo e(Form::submit(trans('backend/global.app_delete'), array('class' => 'btn btn-danger margin-inline swal-btn-remove'))); ?>

											<?php echo e(Form::close()); ?>

											
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
						</tbody>
					</table>
					<div class="text-center"><?php echo e($products->appends([])->links()); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
$('#products').DataTable({
	"responsive" : true,
	"paging":   false,
	"ordering": false,
	"info":     false,
	"filter":	false,
	"autoWidth": false
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