@extends('layouts.app')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #495057;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: #f8f9fa;
            color: #495057;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

@section('content')

        <!-- Log on to codeastro.com for more projects -->
        <h2>Create Subject</h2>
        <form action="{{ route('store.subject') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="name">Subject Name:</label>
            <input type="text" id="name" name="name" value="{{ old('subject_name') }}" required>

            <label for="subject_code">Subject Code:</label>
            <input type="text" id="subject_code" name="subject_code" value="{{ old('subject_code') }}" required>

            <label for="description">Subject Description:</label>
            <textarea id="description" name="description" rows="4" required>{{ old('subject_description') }}</textarea>

            <label for="teacher_id">Assign Teacher:</label>
            <select id="teacher_id" name="teacher_id" required>
                <option value="">--Select Teacher--</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                @endforeach
            </select>

            <button type="submit">Create Subject</button>
        </form>
@endsection

@push('scripts')
<script>
    $(function() {
        $( "#datepicker-tc" ).datepicker({ dateFormat: 'yy-mm-dd' });
    })
</script>
@endpush
