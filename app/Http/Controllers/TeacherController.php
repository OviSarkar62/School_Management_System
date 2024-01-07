<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function create()
    {
        return view('admin-views.teachers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users',
            'password'          => 'required|string|min:8',
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $role = 'teacher';

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role'      => $role
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name) . '-' . $user->id . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }

        $user->update([
            'profile_picture' => $profile
        ]);

        $teacher = Teacher::create([
            'user_id'           => $user->id,
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);


        return redirect()->route('index.teacher');
    }

    public function index()
    {
        $teachers = Teacher::with('user')->latest()->paginate(10);

        return view('admin-views.teachers.index', compact('teachers'));
    }

    public function edit(Teacher $teacher, $id)
    {

        // $teacher = Teacher::with('user')->findOrFail($teacher->id);
        $teacher = Teacher::with('user')->where('id', $id)->firstOrFail();
        return view('admin-views.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
{
    $teacher = Teacher::findOrFail($id);

    $user = $teacher->user;


    // Update user information
    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
    ]);

    // Update password if provided
    if ($request->filled('password')) {
        $user->update([
            'password' => bcrypt($request->password),
        ]);
    }

    // Update teacher information
    $teacher->update([
        'gender'            => $request->gender,
        'phone'             => $request->phone,
        'dateofbirth'       => $request->dateofbirth,
        'current_address'   => $request->current_address,
        'permanent_address' => $request->permanent_address,
    ]);

    // Update profile picture if a new one is provided
    if ($request->hasFile('profile_picture')) {
        $profile = Str::slug($user->name) . '-' . $user->id . '.' . $request->profile_picture->getClientOriginalExtension();
        $request->profile_picture->move(public_path('images/profile'), $profile);

        $user->update([
            'profile_picture' => $profile
        ]);
    }

    return redirect()->route('index.teacher')->with('success', 'Teacher updated successfully');
}

public function destroy($id)
{
    $teacher = Teacher::findOrFail($id);

    $teacher->user->delete();

    $teacher->delete();

    return redirect()->route('index.teacher')->with('success', 'Teacher deleted successfully');
}
}
