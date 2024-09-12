@extends('Web.Layouts.main')
@section('title', 'Cart')
@section('styles')

@endsection
@section('content')

@include('Web.Sections.navbar')

<section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="#">Shop</a></li>
                <li class="breadcrumb-item">Cart</li>
            </ol>
        </div>
    </div>
</section>

@if($cartItems->isEmpty())
<p>Your cart is empty.</p>
@else
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    @if ($item->images)
                        {{-- If images are stored as a JSON array --}}
                        @php
                            $images = json_decode($item->images, true);
                        @endphp
                        @if (is_array($images) && count($images) > 0)
                            <img src="{{ asset($images[0]) }}" alt="Product Image" width="100">
                        @endif
                    @endif
                </td>

                <td>${{ $item->price }}</td>
                <td>{{ $item->pivot->quantity }}</td>
                <td>${{ $item->price * $item->pivot->quantity }}</td>
                <td>
                    <form action="{{ route('remove_from_cart', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @php $total += $item->price * $item->pivot->quantity; @endphp
        @endforeach
    </tbody>
</table>

<div class="text-right">
    <h4>Total: ${{ $total }}</h4>
</div>

<div class="text-right">
    <a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
</div>
@endif



@include('Web.Sections.subscribe')
@include('Web.Sections.footer')


@endsection
