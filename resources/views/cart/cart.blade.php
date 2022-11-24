<x-layout-header>
    <div class="cart-container">
        @if ($cart != null)
            <p>Total Items: <span class="bold">{{$cart->totalQty}}</span></p>
            <p>Total Price: <span class="bold">{{$cart->totalPrice}}</span></p>

            <a class="button-large checkout-button" href="/checkout">Checkout</a>

            @forelse ($cart->items as $item)
                <div class="cart-items">
                    <div class="cart-col">
                        <a href="/menu/{{$item['menuItem']['id']}}/show"><img src="{{url("resources/Images/menu/food-images/" . $item['menuItem']['image_path'])}}" alt=""></a>
                    </div>
                    <div class="cart-col">
                        <a href="/menu/{{$item['menuItem']['id']}}/show"><h3>{{$item['menuItem']['dishTitle']}}</h3></a>
                        <p>Quantity: <span class="bold">{{$item['qty']}}</span></p>
                        <p>Price: <span class="bold">£{{$item['price']}}</span></p>
                    </div>
                </div>
            @endforeach

            <a class="button-large checkout-button" href="/checkout">Checkout</a>
        @else
            <p>No Cart Items</p>
        @endif

    </div>
</x-layout-header>