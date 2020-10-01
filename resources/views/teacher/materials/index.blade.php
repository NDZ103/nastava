@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{-- $subject->name --}}</h3>
                </div>

                <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">View</th>
                            <th scope="col">Download</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($subject))
                    @foreach($subject->materials as $material)
                        @if($material->teacher_id == $teacher->id)
                            <tr>
                                <th scope="row">{{ $material->id }}</th>
                                <td>{{ $material->name }}</td>
                                <td><a href="{{ route('teacher.materials.show', $material->id) }}" class="btn btn-outline-primary">View</a></td>
                                <td><a href="{{ route('teacher.materials.download', $material->file) }}" class="btn btn-outline-info">Download</a></td>
                                <td>
                                <form action="{{ route('teacher.materials.destroy', $material) }}" method="POST"  class="float-left">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                    @endif
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection