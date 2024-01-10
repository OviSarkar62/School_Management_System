@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Subject</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Teacher</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->subject_code }}</td>
                        <td>{{ $subject->teacher->user->name }}</td> <!-- Accessing teacher's name -->
                        <td>{{ $subject->description }}</td>
                        <td>
                            <a href="{{ route('edit.subject', ['id' => $subject->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('destroy.subject', ['id' => $subject->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No subject found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $subjects->links() }}

    </div>

@endsection
