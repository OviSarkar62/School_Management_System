<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function create()
    {
        $teachers = Teacher::latest()->get();
        return view('admin-views.subjects.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name'          => 'required|string|max:255|unique:subjects',
        //     'subject_code'  => 'required|numeric',
        //     'teacher_id'    => 'required|numeric',
        //     'description'   => 'required|string|max:255'
        // ]);

        $subject = Subject::create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'subject_code'  => $request->subject_code,
            'teacher_id'    => $request->teacher_id,
            'description'   => $request->description
        ]);


        return redirect()->route('index.subject');
    }
    public function index()
    {
        $subjects = Subject::with('teacher')->latest()->paginate(10);

        return view('admin-views.subjects.index', compact('subjects'));

    }
    public function edit(Subject $subject, $id)
    {

        $teachers = Teacher::latest()->get();

        $subject = Subject::with('teacher')->where('id', $id)->first();

        return view('admin-views.subjects.edit', compact('subject','teachers'));
    }
    public function update(Request $request, Subject $subject, $id)
    {
        // $request->validate([
        //     'name'          => 'required|string|max:255|unique:subjects,name,'.$subject->id,
        //     'subject_code'  => 'required|numeric',
        //     'teacher_id'    => 'required|numeric',
        //     'description'   => 'required|string|max:255'
        // ]);

        $subject->update([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'subject_code'  => $request->subject_code,
            'teacher_id'    => $request->teacher_id,
            'description'   => $request->description
        ]);


        return redirect()->route('index.subject');
    }
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return back();
    }
}
