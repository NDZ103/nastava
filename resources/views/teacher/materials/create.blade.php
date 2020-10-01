@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add materials
                </div>
                 

                <div class="card-body">
                 @if (count($teacher->subjects) == 0)
                    <p class="alert alert-danger">You must first add a subject <a href="{{ route('teacher.subjects.create') }}">Add subject</a> </p>
                 @else
                    <form action="{{ route('teacher.materials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}<br/></p>
                            @endforeach
                            <div class="form-group">
                                <label for="name">Enter name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            
                            <div class="form-group">
                                <label for="subject_id">Choose subject</label>
                                <select class="form-control" id="subject_id" name="subject_id">
                                    @foreach($teacher->subjects as $subject)
                                        <option value="{{ $subject->id}}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="file">Choose file</label>
                                <input type="file" class="form-control-file" id="file" name="file">
                            </div>
                        <input type="submit" class="btn btn-info btn-block" value="Add material">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection