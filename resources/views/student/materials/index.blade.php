@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Subjects
                <a href="{{-- route('teacher.subjects.create') --}}"></a>
                </div>

                <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subject name</th>
                        <th scope="col">Material</th>
                        <th scope="col">View</th>
                        <th scope="col">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($student->subjects as $subject)
                        @foreach($subject->materials as $material)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$subject->name}}</td>
                            <td>{{$material->name}}</td>
                            <td><a href="{{ route('student.materials.show', $material->id) }}"><button type="button" class="btn btn-outline-primary">View</button></a></td>
                            <td><a href="{{ route('student.materials.download', $material->file) }}"><button type="button" class="btn btn-primary">Download</button></a></td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection