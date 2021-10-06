@if(count($event['products']) > 0)
		<section id='registrationProducts'>
			<h2>Add These Products</h2>
			@foreach($event['products'] as $product)
				@php $i = $product['Product']; @endphp

				<div class='eventProduct row' data="{{ $product }}" data-product-id="{{ $product['id'] }}">

					<div class="col-lg-8">


					@if(Storage::exists('public/products/'. $product->id .'/'.$product->product_image))
						<div class='productImage'>
							<a class="viewImageModal" href="{{ Storage::url('public/products/'. $product->id .'/'.$product->product_image) }}">
								<img src="{{ Storage::url('public/products/'. $product->id .'/'.$product->product_image) }}" alt="">
							</a>
						</div>
						<div class="productInfo withProductImage">
					@else
						<div class="productInfo">
					@endif

					<h3>{{ $product['product_name'] }}</h3>

					<p class="productPricing">
						@if ($product['product_price'])
							<span class="specialPrice">${{ number_format($product->product_price, 2) }}</span>
						@endif
					</p>

					@if ($product['product_description'])
						<p class='productDescription'>{{ $product['product_description'] }}</p>
					@endif
					</div>
					</div>

					<div class='productDetails col-lg-4'>

						@if(count($product['product_attributes']) > 0)
						<div class='productAttributes'>
							@foreach($product['product_attributes'] as $attribute)
								<div class="form-group row">
								    <select name="field" data-attribute-id="{{ $attribute->id }}" class="form-control col-sm-12 product_attributes" data="{{ $attribute }}">
								    	<option></option>
								        @foreach($attribute['product_options'] as $option)
								            <option data="{{ $option }}">{{ $option->product_option_name }}</option>
								        @endforeach
								    </select>
								</div>

							@endforeach
						</div>
						@endif

						<button class="btn btn-success addProduct"><i class="fas fa-plus"></i> Add</button>

					</div><!-- productDetails -->



				</div><!-- eventProduct -->
			@endforeach

		</section><!--eventProducts-->

		@endif