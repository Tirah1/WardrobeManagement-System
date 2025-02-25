@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $clothingItem->name }}</h1>
    <p><strong>Category:</strong> {{ $clothingItem->category }}</p>
    <p><strong>Description:</strong> {{ $clothingItem->description }}</p>

    <a href="{{ route('clothing-items.edit', $clothingItem->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('clothing-items.destroy', $clothingItem->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('clothing-items.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection