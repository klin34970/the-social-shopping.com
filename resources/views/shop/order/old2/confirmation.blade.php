<h3>
	<i class="icmn-checkmark cui-wizard--steps--icon"></i>
	<span class="cui-wizard--steps--title">@lang('frontend/global.confirmation.confirmation')</span>
</h3>
<section>
	<div class="invoice-block">
		<div class="row">
		
			<div class="col-md-6 col-sm-6 hidden-xs-down">
				<h4>
					@if($product->shop->logo)
						<img class="margin-right-10" src="/storage{{ $product->shop->logo . $product->shop->id . '/' . File::basename(File::glob(storage_path('app/public') . $product->shop->logo . $product->shop->id . '/50x50.*')[0])}}" height="50" alt="{{ $product->shop->company }}">
					@else
						{{ $product->shop->company }}
					@endif
				</h4>
				<address>
				
					{{ $product->shop->legal_form }} {{ $product->shop->social_reason }}
					<br>
					{{ $product->shop->address_1 }}
					<br>
					{!! $product->shop->address_2 ? $product->shop->address_2 . '<br>': ''!!}
					{!! $product->shop->address_3 ? $product->shop->address_3 . '<br>': ''!!}
					{{ $product->shop->city }}, {{ $product->shop->postcode }}, {{ $product->shop->country }}
					<br>
					<abbr>E-mail:</abbr> {{ $product->shop->email }}	
					<br>
					<abbr>Phone:</abbr> {{$product->shop->phone_1 }}
					<br>
					{!! $product->shop->phone_2 ? '<abbr>Phone:</abbr> ' . $product->shop->phone_2 . '<br>': '' !!}
					<abbr>Registration:</abbr> {{ $product->shop->registration }}
					<br>
					{!! $product->shop->vat ? '<abbr>VAT:</abbr> ' . $product->shop->vat . '<br>': '' !!}
					<br>
					<br>
				</address>
			</div>
			
			<div class="col-md-6 col-sm-6 hidden-xs-down text-right">
				<address>
					<span id="s_company"></span>
					<br>
					<span id="s_lastname"></span>
					<br>
					<span id="s_firstname"></span>
					<br>
					<span id="s_email"></span>
					<br>
					<span id="s_address_1"></span>
					<br>
					<span id="s_address_2"></span>
					<br>
					<span id="s_address_3"></span>
					<br>
					<span id="s_postcode"></span>, <span id="s_city"></span>, <span id="s_country"></span>
					<br>
					<span id="s_phone_1"></span>
					<br>
					<span id="s_phone_2"></span>
				</address>
				<br>
				<br>
			</div>
		</div>
		
		<div class="table-responsive">
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
						<span id="quantity"></span>
					</td>
					<td class="text-left">
						{{ ($product->shop->getSymbolCurrency()) }} {{ number_format($product->price, 2) }}
					</td>
					<td class="text-left">
						{{ ($product->shop->getSymbolCurrency()) }} <span class="total">{{ number_format($product->price, 2) }}</span>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="text-right clearfix">
			<div class="pull-right">
				<p>
					@lang('frontend/global.confirmation.sub_total'): <strong>{{ ($product->shop->getSymbolCurrency()) }}<span id="subtotal"></span></strong>
				</p>
				<p>
					@lang('frontend/global.confirmation.taxe'): <strong>{{ ($product->shop->getSymbolCurrency()) }}<span id="vat"></span></strong>
				</p>
				<p class="page-invoice-amount">
					<strong>@lang('frontend/global.confirmation.grand_total'): {{ ($product->shop->getSymbolCurrency()) }}<span id="totalamount"></span></strong>
				</p>
				<br>
			</div>
		</div>
		
		<h4>@lang('frontend/global.confirmation.billing_details') </h4>
		<div id="card-errors" role="alert"></div>
		<div id="card-element"></div>
	</div>
</section>