@extends('layouts')

@section('content')
<div class="container mt-4">
    <h2>Add Category</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">← Back</a>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Category</button>
    </form>
</div>
@endsection
