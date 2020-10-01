<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;
use App\Student;
use Auth;
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
        $student_id = Student::where('user_id', Auth::user()->id)->first()->id;
        $student    = Student::find($student_id);
        
        return view('student.subjects.index')->with('student', $student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.subjects.create')->with('subjects', Subject::all());
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
            'subject_id' => 'required'
            ]);
        $student_id = Student::where('user_id', Auth::user()->id)->first()->id;
        $student    = Student::find($student_id);

        DB::table('subject_student')->updateOrInsert([
            'subject_id' => $request->subject,
            'student_id' => $student->id,
        ]);
        return redirect()->route('student.subjects.index')->with('success', 'You have successfully added a subject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('student.subjects.show')->with('subject', Subject::find($id));
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
        DB::table('subject_student')->where('subject_id', $id)->delete();
        return redirect()->route('student.subjects.index')->with('success', 'You have successfully deleted a subject');
        
    }


    public function search (Request $request)
    {
        $query = $request->get('query');
        $data =  Subject::where('name', 'like', '%'.$query.'%')->get();

        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach($data as $row) {
            $output .= '<li><a href="/student/subjects/'.$row->id.'" style="color:black">'.$row->name.'</a></li>';
        }
        $output .= '</ul>';
        echo $output;

    }
}
