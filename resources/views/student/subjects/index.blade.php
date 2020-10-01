@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Subjects
                
                </div>

                <div class="card-body">
                    @foreach($student->subjects as $subject)
                        {{ $subject->name }}
                        <form action="{{ route('student.subjects.destroy', $subject) }}" method="POST" class="float-right">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('student.subjects.show', $subject) }}" class="btn btn-primary float-right">Show</a>
                        
                        <hr>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection