@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Subjects
                </div>

                <div class="card-body">
                    <form action="{{ route('teacher.subjects.store') }}" method="POST">
                        @csrf
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}<br/></p>
                        @endforeach
                        <div class="form-group">
                            <label for="subject">Choose subject</label>
                        
                                <select class="form-control" name="subject" id="subject">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <input type="submit" class="btn btn-info btn-block" value="Dodaj predmet">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection