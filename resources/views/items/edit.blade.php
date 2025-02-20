<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <!-- form mengedit data -->
<form action="{{ route('items.update', $item) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- input nama data item -->
    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $item->name }}" required>
    <br>
    <!-- input deskripsi -->
    <label for="description">Description:</label>
    <textarea name="description" required>{{$item->description}}</textarea>
    <br>
    <!-- tombol update -->
    <button type="submit">Update Item</button>
</form>
    <a href="{{ route('items.index') }}">Back to list</a>    
</body>
</html>