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
        <a href="{{ route('items.create') }}">Add Item</a>
        <ul>
            @forech ($items as $item)
            <li>
                <!-- menambahkan nama item -->
                {{ $item->name}} -
                <!-- link untuk mengedit item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <!-- form untuk menghapus item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline; ">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                </form>
            </li>
            @endforeach
        </ul>
    </body>
</html>