@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Subjects
                
                </div>

                <div class="card-body">
                    @foreach($subject->materials as $material)
                        <p>Materiali: {{ $material->name }} </p>
                    @endforeach
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection