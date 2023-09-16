<div class="row">
	<div class="col-lg-12">
		<section class="panel panel-with-borders">
			<div class="panel-heading">
				<h2>
					Our others products
				</h2>
			</div>
			<div class="panel-body">
				<div class="cui-ecommerce--catalog">
					<div class="row">
					
					<?php $__currentLoopData = $product->shop->products()->where('id', '<>', $product->id)->orderBy(DB::raw('RAND()'))->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						
							<div class="cui-ecommerce--catalog--item">
							
								<?php if($product->price_discount): ?>
									<div class="cui-ecommerce--catalog--item--status">
										<span class="cui-ecommerce--catalog--item--status--title">-<?php echo e(ceil ((($product->price - $product->price_discount) * 100) / $product->price)); ?>%</span>
									</div>
								<?php endif; ?>
									
								<div class="cui-ecommerce--catalog--item--img">
									<a href="<?php echo e(URL::route('product.index', ['unique_id' => $product->unique_id])); ?>">
										<?php if($product->images->count()): ?>
										<img src="/storage/users/<?php echo e($product->user_id); ?>/products/<?php echo e($product->id); ?>/gallery/<?php echo e(File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $product->images->first()->filename . '_200x200.*')[0])); ?>" />
										<?php endif; ?>
									</a>
								</div>
								
								<div class="cui-ecommerce--catalog--item--title">
									<a href="<?php echo e(URL::route('product.index', ['unique_id' => $product->unique_id])); ?>"><?php echo e($product->title); ?></a>
									
									<?php if($product->price_discount): ?>
									<div class="cui-ecommerce--catalog--item--price">
										<?php echo e(($product->shop->getSymbolCurrency())); ?> <?php echo e(number_format($product->price_discount, 2)); ?>

										<div class="cui-ecommerce--catalog--item--price--old">
											<?php echo e(($product->shop->getSymbolCurrency())); ?> <?php echo e(number_format($product->price, 2)); ?>

										</div>
									</div>
									<?php else: ?>
										<div class="cui-ecommerce--catalog--item--price">
										<?php echo e(($product->shop->getSymbolCurrency())); ?> <?php echo e(number_format($product->price, 2)); ?>

									</div>
									<?php endif; ?>
									
								</div>
								
								<div class="cui-ecommerce--catalog--item--descr">
									<div class="cui-ecommerce--catalog--item--descr--sizes">
										<?php echo e(str_limit($product->short_description, 80, '...')); ?>

									</div>
								</div>
							</div>
							
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</div>
				</div>
			</div>
		</section>
    </div>
</div>