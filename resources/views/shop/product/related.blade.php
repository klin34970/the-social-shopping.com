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
					
					@foreach($product->shop->products()->where('id', '<>', $product->id)->orderBy(DB::raw('RAND()'))->limit(4)->get() as $product)
					
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						
							<div class="cui-ecommerce--catalog--item">
							
								@if($product->price_discount)
									<div class="cui-ecommerce--catalog--item--status">
										<span class="cui-ecommerce--catalog--item--status--title">-{{  ceil ((($product->price - $product->price_discount) * 100) / $product->price) }}%</span>
									</div>
								@endif
									
								<div class="cui-ecommerce--catalog--item--img">
									<a href="{{URL::route('product.index', ['unique_id' => $product->unique_id])}}">
										@if($product->images->count())
										<img src="/storage/users/{{ $product->user_id }}/products/{{ $product->id }}/gallery/{{ File::basename(File::glob(storage_path('app/public') . '/users/' . $product->user_id . '/products/' . $product->id . '/gallery/' . $product->images->first()->filename . '_200x200.*')[0]) }}" />
										@endif
									</a>
								</div>
								
								<div class="cui-ecommerce--catalog--item--title">
									<a href="{{URL::route('product.index', ['unique_id' => $product->unique_id])}}">{{ $product->title }}</a>
									
									@if($product->price_discount)
									<div class="cui-ecommerce--catalog--item--price">
										{{ ($product->shop->getSymbolCurrency()) }} {{ number_format($product->price_discount, 2) }}
										<div class="cui-ecommerce--catalog--item--price--old">
											{{ ($product->shop->getSymbolCurrency()) }} {{ number_format($product->price, 2) }}
										</div>
									</div>
									@else
										<div class="cui-ecommerce--catalog--item--price">
										{{ ($product->shop->getSymbolCurrency()) }} {{ number_format($product->price, 2) }}
									</div>
									@endif
									
								</div>
								
								<div class="cui-ecommerce--catalog--item--descr">
									<div class="cui-ecommerce--catalog--item--descr--sizes">
										{{ str_limit($product->short_description, 80, '...') }}
									</div>
								</div>
							</div>
							
						</div>
						@endforeach

					</div>
				</div>
			</div>
		</section>
    </div>
</div>