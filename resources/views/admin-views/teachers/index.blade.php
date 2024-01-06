@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Teachers</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject Code</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->user->name }}</td>
                        <td>{{ $teacher->user->email }}</td>
                        <td>
                            @foreach ($teacher->subjects as $subject)
                                {{ $subject->code }}
                                @if (!$loop->last)
                                    <br>
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $teacher->phone }}</td>
                        <td>
                            <a href="{{ route('edit.teacher', ['id' => $teacher->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('destroy.teacher', ['id' => $teacher->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No teachers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $teachers->links() }}

    </div>

@endsection
