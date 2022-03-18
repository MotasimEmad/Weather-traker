@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new city</div>

                <div class="card-body">
                    <form action="{{ route('cities.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="formGroupExampleInput">Lat</label>
                            <input type="text" class="form-control" name="lat" id="formGroupExampleInput">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Lon</label>
                            <input type="text" class="form-control" name="lon" id="formGroupExampleInput2">
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Add</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
