<div class="bg-white rounded border border-gray-100 shadow hover:shadow-lg py-4 px-6 space-y-4">
    <img src="http://placekitten.com/250/200" alt="{{ $product->name }}"
         class="mx-auto rounded border-4 border-white shadow"/>

    <div class="font-bold text-xl text-center">
        {{ $product->name }}
    </div>

    <div class="flex justify-between items-center">
        <div>
            {{ $product->price_for_display }}
        </div>

        <div>
            <form action="{{ route('cart-items.store', ['product_id' => $product->id]) }}" method="post">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm rounded bg-indigo-600 hover:bg-indigo-500 text-white">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
