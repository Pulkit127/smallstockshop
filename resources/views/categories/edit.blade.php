@extends('layouts')

@section('content')
<div class="container mt-4">
    <h2>Edit Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">← Back</a>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Category</button>
    </form>
</div>
@endsection
