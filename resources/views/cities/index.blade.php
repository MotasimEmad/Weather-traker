@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">City</div>
                <a class="mx-4" href="/cities/create">Add new city</a>

                <div class="card-body">
                    <table class="table mx-auto">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lat</th>
                            <th scope="col">Lon</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->lat }}</td>
                                    <td>{{ $city->lon }}</td>
                                    <td>
                                        <form action="{{ route('cities.destroy', $city->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button>
                                            Delete
                                            </button>
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
