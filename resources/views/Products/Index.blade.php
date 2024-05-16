<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Import</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <!-- Display success message if it was set-->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1 class="my-4">Product Listing</h1>
    <table class="table">
        <thead>
        <tr>
            <th colspan="3"></th>
            <th class="text-end">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
            </th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <!-- Fetch a thumbnail image based on the product's associated media -->
                <td><img src="{{ $product->getFirstMediaUrl('product-images', 'thumb') }}" alt="Product Image" width="140px"></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>

</body>
</html>