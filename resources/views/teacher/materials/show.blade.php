@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show materials
                </div>

                <div class="card-body">
                    <p>{{ $material->name }}</p>
                    <p>
                    
                    <iframe src="{{ url('storage/'.$material->file) }}" style="width: 100%; height:400px;"></iframe>
                    
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection