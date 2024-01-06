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

    <h2>Edit Teacher</h2>

    <form action="{{ route('update.teacher', ['id' => $teacher->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $teacher->user->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $teacher->user->email) }}" required>

        <label for="password">New Password (Leave blank to keep the current password):</label>
        <input type="password" id="password" name="password">

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male" {{ old('gender', $teacher->gender) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $teacher->gender) == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender', $teacher->gender) == 'other' ? 'selected' : '' }}>Other</option>
        </select>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone', $teacher->phone) }}" required>

        <label for="dateofbirth">Date of Birth:</label>
        <input type="date" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth', $teacher->dateofbirth) }}" required>

        <label for="current_address">Current Address:</label>
        <textarea id="current_address" name="current_address" rows="4" required>{{ old('current_address', $teacher->current_address) }}</textarea>

        <label for="permanent_address">Permanent Address:</label>
        <textarea id="permanent_address" name="permanent_address" rows="4" required>{{ old('permanent_address', $teacher->permanent_address) }}</textarea>

        <label for="image">Image:</label>
        <input type="file" id="image" name="profile_picture" accept="image/*">

        <button type="submit">Update Teacher</button>
    </form>
@endsection

@push('scripts')
<script>
    $(function() {
        $( "#datepicker-tc" ).datepicker({ dateFormat: 'yy-mm-dd' });
    })
</script>
@endpush
