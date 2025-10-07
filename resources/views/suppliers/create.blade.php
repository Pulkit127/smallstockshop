@extends('layouts')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Add New Supplier</h2>
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

    {{-- Supplier Form --}}
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Supplier Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter supplier name" required>
        </div>

        <div class="mb-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" id="contact" placeholder="Phone or email">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="address" rows="3" placeholder="Enter supplier address"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save Supplier</button>
    </form>
</div>
@endsection
