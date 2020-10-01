@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Subjects
                
                </div>

                <!--<div class="card-body">
                    @foreach($teacher->subjects as $subject)
                        {{ $subject->name }}
                        
                        <form action="{{ route('teacher.subjects.destroy', $subject) }}" method="POST" class="float-right">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <hr>
                    @endforeach
                </div> -->
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">ECTS</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($teacher->subjects as $subject)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->description }}</td>
                            <td>{{ $subject->ects }}</td>
                            <td>{{ $subject->semester }}</td>
                            <td>
                            <form action="{{ route('teacher.subjects.destroy', $subject) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection