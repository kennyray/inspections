@extends('layout')

@section('content')
		<h2>{{$inspection->business->business_name}}</h2>
       {{$inspection->id}}
		
		<ul>
       @foreach($details as $item)
		<li>{{$item->violationCode}} {{$item->text}}</li>


       @endforeach
       </ul>
@stop