@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Subjects
                <a href="{{ route('admin.subjects.create') }}"><button type="button" class="btn btn-primary float-right">Add subject</button></a>
                </div>

                <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Subject name </th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <th scope="row">{{ $subject->id }}</th>
                            <td>{{ $subject->name }}</td>
                            <td>
                                <a href="{{ route('admin.subjects.edit', $subject->id) }}"><button type="button" class="btn btn-warning" >Edit</button></a>
                            </td>
                            <td>
                            <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST"  class="float-left">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
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
</div>
@endsection