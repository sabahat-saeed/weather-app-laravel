@extends('app')

@section('title', 'Home')

@section('content')
<h1>Weather Data</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Temperature</th>
            <th>Pressure</th>
            <th>Humidity</th>
            <th>Min Temperature</th>
            <th>Max Temperature</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach($weatherData as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->lat }}</td>
                <td>{{ $data->lon }}</td>
                <td>{{ $data->temp }}</td>
                <td>{{ $data->pressure }}</td>
                <td>{{ $data->humidity }}</td>
                <td>{{ $data->temp_min }}</td>
                <td>{{ $data->temp_max }}</td>
                <td>{{ $data->time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
