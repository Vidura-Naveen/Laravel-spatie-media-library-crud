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
    <h1 class="my-4">Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            @error('name')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            @error('description')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            @error('price')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
            <input type="number" step="0.01" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            @error('image')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
            @enderror
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>

</body>
</html>