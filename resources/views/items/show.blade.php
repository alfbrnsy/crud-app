<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
</head>
<body>
    <h1>Items</h1>
    <!-- memvalidasi apakah perubahan atau penambahan sudah berhasil -->
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <!-- tombol untuk menambahkan item baru -->
    <a href="{{ route('items.create') }}">Add Item</a>
    <ul>
        <!-- loop untuk menampilkan semua item -->
        @foreach ($items as $item)
            <li>
                <!-- menampilkan item -->
                {{ $item->name }} -
                <!-- link untuk mengedit item -->
                <a href="{{ route('items.index', $item) }}">Edit</a>
                <!-- form untuk menghapus item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE') / 
                    <!-- menggunakan metode delete untuk menghapus item -->
                    <button type="submit">Delete</button>
                </form>
            </li>
            @endforeach
    </ul>
</body>
</html>