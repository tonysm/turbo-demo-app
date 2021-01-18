<div class="bg-white py-2 px-4 flex justify-between items-center">
    <div class="flex space-x-4 items-center">
        <img src="http://placekitten.com/250/200" alt="Example Product"
             class="inline-block w-16 h-16 mx-auto rounded border-4 border-white shadow"/>

        <div>
            <div class="font-bold text-lg">
                {{ $cartItem->name }}
            </div>

            <div class="flex items-center space-x-2">
                <div>
                    {{ $cartItem->price_for_display }}
                </div>
                <div>
                    <form action="">
                        Quantity: <input type="number" value="{{ $cartItem->quantity }}" class="form-input w-16 border-transparent" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <button class="text-red-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </button>
    </div>
</div>
