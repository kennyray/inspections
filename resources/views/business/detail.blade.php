@extends('layout')

@section('content')
        <h2>{{$business->business_name}}</h2>
		<addr>
		{{$business->location_address}}<br>
		{{$business->location_city}} FL, 
		{{$business->location_zipcode}}
		</addr>



		<table class="table table-striped">
		<thead>
		<tr>
			<td>Date</td>
			<td>Inspection Number</td>
			<td>Inspection Type</td>
			<td>Disposition</td>
			<td>Visit Number</td>
			<td>Total Violations</td>
			<td>High Priority</td>
			<td>Intermediate</td>
			<td>Basic</td>
		</tr>
		</thead>
        <tbody>
        @foreach($business->inspections as $inspection)

		@row($inspection->inspection_disposition)
     
		
			<td><a href="/inspection/{{$inspection->id}}">{{$inspection->inspection_date}}</a></td>
			<td>{{$inspection->inspection_number}}</td>
			<td>{{$inspection->inspection_type}}</td>
			<td>{{$inspection->inspection_disposition}}</td>
			<td>{{$inspection->visit_number}}</td>
			<td>{{$inspection->total_number_of_violations}}</td>
			<td>{{$inspection->number_of_high_priority_violations}}</td>
			<td>{{$inspection->number_of_intermediate_violations}}</td>
			<td>{{$inspection->number_of_basic_violations}}</td>
		</tr>

        @endforeach
        </tbody>
        </table>
@stop