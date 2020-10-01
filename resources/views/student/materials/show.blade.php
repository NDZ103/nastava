@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Subjects
                <a href="{{-- route('teacher.subjects.create') --}}"></a>
                </div>

                <div class="card-body">
                <p>{{ $material->name }}</p>
                    <p>
                    
                    <iframe src="{{ url('storage/'.$material->file) }}" style="width: 600px; height:500px;"></iframe>
                    
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

