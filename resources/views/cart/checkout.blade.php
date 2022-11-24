<x-layout-header>
    <h1>Checkout</h1>

    <div class="cart-container">
        <h1>Your Total is £{{ $total }}</h1>

        <form action="/create-checkout-session" method="POST">
            <button type="submit">Checkout</button>
          </form>
    </div>
</x-layout-header>