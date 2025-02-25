@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clothing Items</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('clothing-items.create') }}" class="btn btn-primary">Create New Clothing Item</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clothingItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ route('clothing-items.show', $item->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('clothing-items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('clothing-items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection