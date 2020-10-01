<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;
use App\SubjectTeacher;
use App\Teacher;
use Auth;
use App\User;
use DB;


class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Teacher::where('user_id',  Auth::user()->id)->first()) {
            $teacher_id = Teacher::where('user_id', Auth::user()->id)->first()->id;
        } else {
            return redirect()->back();
        }

        return view('teacher.subjects.index')->with([
            'subjects'=> Subject::all(),
            'teacher'=> Teacher::find($teacher_id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.subjects.create')->with('subjects', Subject::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required'
        ]);

        $teacher_id = Teacher::where('user_id', Auth::user()->id)->first()->id;
        
        $teacher = Teacher::find($teacher_id);


        DB::table('subject_teacher')->updateOrInsert([
                'subject_id' => $request->subject,
                'teacher_id' => $teacher->id,
            ]);

        return redirect()->route('teacher.subjects.index')->with('success', 'You have successfully added a subject');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        return view('teacher.subjects.show')->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subject_teacher')->where('subject_id', $id)->delete();
        return redirect()->route('teacher.subjects.index')->with('success', 'You have successfully deleted a subject');
        
    }
}
