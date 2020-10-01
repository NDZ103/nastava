@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                   
                        <p>{{ $subject->name }}
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">ECTS</th>
                                <th scope="col">Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->description }}</td>
                                    <td>{{ $subject->ects }}</td>
                                    <td>{{ $subject->semester }}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection