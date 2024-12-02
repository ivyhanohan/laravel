@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Document Requests</h1>
    <a href="{{ route('document_requests.create') }}" class="btn btn-primary mb-3">Create Request</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Document Type</th>
                <th>Request Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->student_name }}</td>
                <td>{{ $request->document_type }}</td>
                <td>{{ $request->request_date }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <a href="{{ route('document_requests.edit', $request->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('document_requests.destroy', $request->id) }}" method="POST" style="display:inline;">
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
