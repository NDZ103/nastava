@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create subject </div>

                <div class="card-body">
                   <form action="{{ route('admin.subjects.store') }}" method="POST">
                        @csrf
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}<br/></p>
                        @endforeach

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Subject name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="semester">Semester</label>
                            <select id="semester" name="semester" class="form-control">
                                <option value="ljetni">Ljetni</option>
                                <option value="zimski">Zimski</option>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="ects">ECTS</label>
                            <input type="number" class="form-control" min="1" max="10" name="ects" id="ects">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                    
                        <input type="submit" class="btn btn-info btn-block" value="Add subject">
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection