<x-layout-header>
    <h1>Cart</h1>

    <div class="cart-container">
        @if ($cart != null)
            @forelse ($cart->items as $item)
                <div class="cart-items">
                    <h3>{{$item['menuItem']['dishTitle']}}</h3>
                    <p>Quantity: {{$item['qty']}}</p>
                    <p>Price: {{$item['price']}}</p>
                </div>
            @endforeach

            <p>Total Items:{{$cart->totalQty}}</p>
            <p>Total Price: {{$cart->totalPrice}}</p>
        @else
            <p>No Cart Items</p>
        @endif

    </div>
</x-layout-header>