<section aria-labelledby="trending-heading">
    <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:pt-32 lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <h2 id="favorites-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">{{__('Trending Products')}}</h2>
            <a href="{{route('shop.products')}}" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">{{__('Shop the collection')}}<span aria-hidden="true"> &rarr;</span></a>
        </div>
        <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
            @if(count($productsList) > 0)
                @foreach($productsList as $product)
                    <div class="group relative hover:border-black rounded-lg">
                        <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
                            <img src="{{$product->images[0]->image_url}}" alt="Hand stitched, orange leather long wallet." class="w-full h-full object-center object-cover">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700 text-center">
                            <a href="{{route('shop.product.show', $product->id)}}">
                            <span class="absolute inset-0"></span>
                                {{$product->name}}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 text-center">
                            @foreach($product->categories as $cat)
                                <span class="inline-flex items-center mt-1 p-3 py-0.5 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                    {{$cat->name}}        
                                </span>
                            @endforeach
                        </p>
                    </div>
                @endforeach
            @else
                <p class="text-lg">
                    Vous pourrez bientôt apercevoir les produits qui marchent le plus ICI. Restez à l'affu et ouvrez grand les yeux. 
                </p>
            @endif
        </div>

        <div class="mt-8 text-sm md:hidden">
            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Shop the collection<span aria-hidden="true"> &rarr;</span></a>
        </div>
    </div>
</section>