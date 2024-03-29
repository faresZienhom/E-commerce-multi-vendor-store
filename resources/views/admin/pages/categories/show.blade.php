@extends('admin.layout.app')

@section('title','Categories Page')


@section('content')

<table class="table">
    <thead>
        <tr>
            <th>image</th>
            <th>Name</th>
            <th>Store</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @php
            $products = $category->products()->with('store')->latest()->paginate(5);
        @endphp
        @forelse($products as $product)
        <tr>
            <td><img src="{{$product->image }}" alt="" height="50"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->store->name }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No products defined.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}

@endsection
