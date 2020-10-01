<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.subjects.index')->with('subjects', Subject::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.subjects.create');
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
            'name' => 'required|min:2',
            'semester' => 'required',
            'description' => 'required|min:5',
            'ects' => 'required'
        ]);

        Subject::firstOrCreate($request->except('_token'));

        return redirect()->route('admin.subjects.index')->with('success', 'You have successfully a subject');
        
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
 
        return view('admin.subjects.edit')->with('subject', Subject::find($subject->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        
        $subject->name        = $request->subject_name;
        $subject->description = $request->description;
        $subject->semester    = $request->semester;
        $subject->ects        = $request->ects;

        if($subject->save()) {
            return redirect()->route('admin.subjects.index')->with('success', 'You have successfully updated a subject');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        
        $subject->delete();

        return redirect()->route('admin.subjects.index');
    }
}
