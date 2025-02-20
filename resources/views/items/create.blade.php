<!DOCTYPE html>
<html>
    <head>
        <title>Add item</title>
    </head>
    <body>
        <h1>Add item</h1>
        <!-- form untuk menambahkan data item -->
        <form action="{{ route('items.store') }}" method="POST">
            @csrf
            <!-- input nama item -->
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <br>
            <!-- input deskripsi  -->
            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
            <br>
            <!-- tombol simpan perubahan -->
            <button type="submit">Add Item</button>
        </form>
        <!-- tombol kembali ke daftar item -->
        <a href="{{ route('items.index') }}">Back to List</a>
    </body>
</html>