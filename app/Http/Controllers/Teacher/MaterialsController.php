<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Material;
use App\Teacher;
use App\Subject;
use Auth;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $materials = Material::all();
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();

        $material = Material::where('teacher_id', $teacher->id)->first();
        
        if ($material) {
            $subject = Subject::find($material->subject_id);
            
            return view('teacher.materials.index')->with([
                'files' => Material::all(),
                'subject'=> $subject,
                'teacher' => $teacher,
                ]);
        }
        return view('teacher.materials.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = Teacher::where('user_id', Auth::user()->id)->first();
        if ($teacher) {
            return view('teacher.materials.create')->with('teacher', Teacher::find($teacher->id));
        } else {
            return redirect()->back();
        }
        exit;

        $teacher = Teacher::find($teacher_id);
        return view('teacher.materials.create')->with('teacher', $teacher);
        exit;

        return view('teacher.materials.create')->with([
            'subjects' => Subject::all(),
            'teacher' => $teacher,
        ]);
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
            'subject_id' => 'required',
            'file' => 'required',
        ],
        [
            'subject_id.required' => 'Subject input field is required',
          
        ]);

        $user_id = Auth::user()->id;
        $teacher_id = Teacher::where('user_id', $user_id)->first()->id;

        $material = new Material();
        if ($request->file('file')) {
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);

            $material->file = $filename;
        }
        $material->name       = $request->name;
        $material->subject_id = $request->subject_id;
        $material->teacher_id = $teacher_id;
        
        if ($material->save()) {
            return redirect()->route('teacher.materials.index')->with('success', 'You have successfully added material');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        return view('teacher.materials.show')->with('material', Material::find($material->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('teacher.materials.index')->with('success', 'You have successfully deleted a material');
        
    }

    public function downloadFile ($file)
    {
        return response()->download('storage/'.$file);
    }
}
