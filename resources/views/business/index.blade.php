@extends('layout')

@section('content')
        <h1>Restaurant Inspections</h1>
		<table class="table table-striped">
		<thead>
			<th>License #</th>
			<th>Name</th>
			<th>City</th>
			<th>Zipcode</th>
		</thead>
		<tbody>
        @foreach($businesses as $business)
		<tr>
		<td>{{$business->license_number}}</td>
		<td><a href="/business/{{$business->id}}">{{$business->business_name}}</a></td>
		<td>{{$business->location_city}}</td>
		<td>{{substr($business->location_zipcode,0,5)}}</td>
		</tr>
        @endforeach
        </tbody>
        </table>
        {!! $businesses->links() !!}
@stop