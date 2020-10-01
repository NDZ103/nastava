@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Subjects
                </div>

                <div class="card-body">
                    <form action="{{ route('student.subjects.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="subject">Example select</label>
                        
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