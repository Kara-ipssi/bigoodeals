<div class="bg-white">
	<nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<ol role="list" class="flex items-center space-x-4">
		  <li>
			<div class="flex items-center">
			  <a href="{{route('shop.products')}}" class="mr-4 text-sm font-medium text-gray-900">
				Liste des produits
			  </a>
			  <svg viewBox="0 0 6 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-auto text-gray-300">
				<path d="M4.878 4.34H3.551L.27 16.532h1.327l3.281-12.19z" fill="currentColor" />
			  </svg>
			</div>
		  </li>
  
		  <li class="text-sm">
			<a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">
			  {{$product->name}}
			</a>
		  </li>
		</ol>
	</nav>
	<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
		<div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
			<!-- Image gallery -->
			<div class="flex flex-col-reverse">
                <!-- Image selector -->
                <div class="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
                    <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">

						@foreach ($product->images as $image)
							<button wire:click="setSelected('{{$image->image_url}}')" id="tabs-1-tab-1" class="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50" aria-controls="tabs-1-panel-1" role="tab" type="button">
								<span class="sr-only">
									Angled view
								</span>
								<span class="absolute inset-0 rounded-md overflow-hidden">
									<img src="{{$image->image_url}}" alt="" class="w-full h-full object-center object-cover">
								</span>
								<!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
								<span class="ring-transparent absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none" aria-hidden="true"></span>
							</button>
						@endforeach

                    <!-- More images... -->
                    </div>
                </div>
                <div class="w-full aspect-w-1 aspect-h-1">
                    <!-- Tab panel, show/hide based on tab state. -->
                    <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                    	<img src="{{isset($productSelectedImage) ? $productSelectedImage : $product->images[0]->image_url}}" alt="Angled front view with bag zipped and handles upright." class="w-full h-full object-center object-cover sm:rounded-lg">
                    </div>

                    <!-- More images... -->
                </div>
			</div>

			<!-- Product info -->
			<div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
			<h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{$product->name}}</h1>

			<div class="mt-3">
				<h2 class="sr-only">Product information</h2>
				<p class="text-3xl text-gray-900">{{$product->price}}€</p>
			</div>

			<div class="mt-6">
				<h3 class="sr-only">Description</h3>

				<div class="text-base text-gray-700 space-y-6">
					@if (!empty($product->description))
						<p>{{$product->description}}</p>
					@else
						<p>Vous voyez ce message, car nous cherchons encore une description à couper le souffle pour ce produit incroyable !!!</p>
					@endif
				</div>
			</div>

			<div class="mt-6">
				<div class="flex items-center justify-between">
				  <h2 class="text-sm font-medium text-gray-900">{{__('Sizes')}}</h2>
				</div>
  
				<fieldset 
					
					class="mt-2">
					<legend class="sr-only">
						{{__('Choose a size')}}
					</legend>
					<div class="grid grid-cols-3 gap-3 sm:grid-cols-6">
						<!--
						In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
						Active: "ring-2 ring-offset-2 ring-indigo-500"
						Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
						-->

						@foreach ($product->stocks as $stock)
							@if ($stock->quantity > 0)
								<label class="border rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium uppercase sm:flex-1 cursor-pointer focus:outline-none focus:bg-blue-600">
									<input type="radio" name="size-choice" wire:model="size" value="{{$stock->size->id}}" class="mr-2" aria-labelledby="size-choice-3-label">
									<p id="size-choice-3-label">
										{{$stock->size->code}}
									</p>
								</label>
							@else
								<label class="border rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium uppercase sm:flex-1 opacity-25 cursor-not-allowed focus:outline-none">
									<input type="radio" name="size-choice" value="{{$stock->size->id}}" class="sr-only" aria-labelledby="size-choice-3-label">
									<p id="size-choice-3-label">
										{{$stock->size->code}}
									</p>
								</label>
							@endif
						@endforeach
						
					</div>
						@error('size') <span class="error text-red-500">{{ $message }}</span> @enderror

					@auth
						<button wire:click="addToCart()" class="mt-8 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
								{{__('Add to cart')}}
						</button> 
						
					@else
						<a href="{{route('login')}}" class="mt-8 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{__('Add to cart')}}</a>
					@endauth
					
				</fieldset>
			</div>
			

			<section aria-labelledby="details-heading" class="mt-12">
				<h2 id="details-heading" class="sr-only">Additional details</h2>

				<div class="border-t divide-y divide-gray-200">
					<div x-data="{isFeature:false, isCategories:true}">
						<h3>
							<!-- Expand/collapse question button -->
							<button @click="isFeature = !isFeature" type="button" class="group relative w-full py-6 flex justify-between items-center text-left" aria-controls="disclosure-1" aria-expanded="false">
								<!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
								<span class="text-gray-900 text-sm font-medium">
									Caractéristiques
								</span>
								<span class="ml-6 flex items-center">
									<svg
										:class="{'hidden':isFeature, 'block':!isFeature,}"  
										class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
									</svg>
									<svg 
										:class="{'block':isFeature, 'hidden':!isFeature,}"
										class="hidden h-6 w-6 text-indigo-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
									</svg>
								</span>
							</button>
						</h3>
						<div x-show="isFeature" class="pb-6 prose prose-sm" id="disclosure-1">
							<ul role="list">
								<li>Certains éléments ne reflètent pas la réalité, c'est à vos risques et périls.<br/> <b>Vous êtes prévenue</b>.</li>

								<li>Plusieurs configurations de sangle</li>

								<li>Intérieur spacieux avec zip supérieur</li>

								<li>Poignée et languettes en cuir</li>

								<li>Diviseurs intérieurs</li>

								<li>Boucles de sangle en acier inoxydable</li>

								<li>Construction à double couture</li>

								<li>Résistant à l'eau</li>
							</ul>
						</div>
						<h3>
							<!-- Expand/collapse question button -->
							<button @click="isCategories = !isCategories" type="button" class="group relative w-full py-6 flex justify-between items-center text-left" aria-controls="disclosure-1" aria-expanded="false">
								<!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
								<span class="text-gray-900 text-sm font-medium">
									Catégories
								</span>
								<span class="ml-6 flex items-center">
									<svg
										:class="{'hidden':isCategories, 'block':!isCategories,}" 
										class="block h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
									</svg>

									<svg
										:class="{'block':isCategories, 'hidden':!isCategories,}"  
										class="hidden h-6 w-6 text-indigo-400 group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
									</svg>
								</span>
							</button>
						</h3>
						<div x-show="isCategories" class="pb-6 prose prose-sm" id="disclosure-1">
							<ul role="list">
								@foreach($product->categories as $cat)
									<span class="inline-flex items-center px-2.5 py-0.5 my-1 rounded-md text-sm font-medium bg-blue-100 text-blue-800">
										{{$cat->name}}
									</span>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</section>
			</div>
		</div>
	</div>
</div>
