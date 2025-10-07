@extends('layouts')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Supplier</h2>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">← Back to List</a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Supplier Form --}}
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Supplier Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $supplier->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" id="contact" value="{{ old('contact', $supplier->contact) }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="address" rows="3">{{ old('address', $supplier->address) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Supplier</button>
    </form>
</div>
@endsection
