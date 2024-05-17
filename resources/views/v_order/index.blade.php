@foreach ($orders as $order)
    <p>Order #{{ $order->id }} - Total: ${{ $order->totalPrice }}</p>
    @foreach ($order->orderItems as $item)
        <div>
            {{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: ${{ $item->price }}
        </div>
    @endforeach
@endforeach
