@extends('layouts')

@section('content')
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Suppliers List</h2>
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">+ Add Supplier</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $key => $supplier)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->contact ?? '-' }}</td>
                        <td>{{ $supplier->address ?? '-' }}</td>
                        <td>
                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No suppliers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $suppliers->links() }}
        </div>
    </div>
@endsection