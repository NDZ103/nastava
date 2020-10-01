@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit subject {{ $subject->name }}</div>

                <div class="card-body">
                   <form action="{{ route('admin.subjects.update', $subject) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="subject_name">Subject name</label>
                            <input type="text" class="form-control" name="subject_name" id="subject_name" value="{{ $subject->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $subject->description }}">
                        </div>
                        <div class="form-group">
                            <label for="ects">ECTS</label>
                            <input type="number" class="form-control" name="ects" id="ects" value="{{ $subject->ects }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" class="form-control" name="semester" id="semester" value="{{ $subject->semester }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
