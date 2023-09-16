<h3>
	<i class="icmn-cart5 cui-wizard--steps--icon"></i>
	<span class="cui-wizard--steps--title">@lang('frontend/global.product.cart')</span>
</h3>
<section>
	<div class="invoice-block">
		<table class="products table table-hover text-right">
			<thead class="thead-default">
				<tr>
					<th class="text-left hidden-xs-down"></th>
					<th class="text-left hidden-xs-down">@lang('frontend/global.product.table.description')</th>
					<th class="text-left">@lang('frontend/global.product.table.quantity')</th>
					<th class="text-left">@lang('frontend/global.product.table.unit_cost')</th>
					<th class="text-left">@lang('frontend/global.product.table.total')</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="text-left hidden-xs-down">
						<img src="/storage{{ $product->thumbnail . $product->id . '/' . File::basename(File::glob(storage_path('app/public') . $product->thumbnail . $product->id . '/50x50.*')[0])}}">
						
					</td>
					<td class="text-left hidden-xs-down">
						{{ $product->title }}
					</td>
					<td class="text-left">
						<div>
							<input id="input-quantity" name="quantity" type="number" class="form-control width-50" value="1" min="1" {!! ($product->virtual_stock > 0) ? "max=".($product->virtual_stock - $product->orders->count())."" : '' !!} step="1" >
						<div>
						
						@if($product->virtual_stock > 0)
							<div class="help-block with-errors"><small>{{($product->virtual_stock - $product->orders->count())}} @lang('frontend/global.product.table.stock')</small></div>
						@endif
					</td>
					<td class="text-left">
						{{ ($product->shop->getSymbolCurrency()) }} <span id="price">{{ number_format($product->price, 2) }}</span>
					</td>
					<td class="text-left">
						{{ ($product->shop->getSymbolCurrency()) }} <span class="total">{{ number_format($product->price, 2) }}</span>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>

