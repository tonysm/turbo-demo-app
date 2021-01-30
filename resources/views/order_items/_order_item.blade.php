<div id="@domid($orderItem)" class="bg-white py-2 px-4 flex justify-between items-center">
    <div class="flex space-x-4 items-center">
        <img src="http://placekitten.com/250/200" alt="Example Product"
             class="inline-block w-16 h-16 mx-auto rounded border-4 border-white shadow"/>

        <div class="flex-1">
            <div class="font-bold text-lg">
                {{ $orderItem->name_for_display }}
            </div>

            <div class="flex items-center justify-between space-x-2">
                <div>
                    {{ $orderItem->unit_price_for_display }} unt.
                </div>
                <div>
                    qnt.: {{ $orderItem->quantity }}
                </div>
            </div>
        </div>
    </div>
</div>
