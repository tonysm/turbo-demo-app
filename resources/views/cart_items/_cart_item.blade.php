<div id="@domid($cartItem)" class="bg-white py-2 px-4 flex justify-between items-center">
    <div class="flex space-x-4 items-center">
        <img src="http://placekitten.com/250/200" alt="Example Product"
             class="inline-block w-16 h-16 mx-auto rounded border-4 border-white shadow"/>

        <div class="flex-1">
            <div class="font-bold text-lg">
                {{ $cartItem->name_for_display }}
            </div>

            <div class="flex items-center justify-between space-x-2">
                <div>
                    {{ $cartItem->unit_price_for_display }} und.
                </div>
                <div>
                    <form
                        action="{{ route('cart-items.update', $cartItem) }}"
                        method="post"
                        x-data
                    >
                        @csrf
                        @method('PUT')
                        qnt: <input id="@domid($cartItem, 'quantity_input')" min="1" @change.debounce.300ms="$refs.btn.click()" type="number" x-ref="qnt" name="quantity" value="{{ $cartItem->quantity }}" class="form-input w-16 border-transparent" />
                        <button class="hidden" x-ref="btn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <form action="{{ route('cart-items.destroy', $cartItem) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit" class="text-red-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </button>
        </form>
    </div>
</div>
