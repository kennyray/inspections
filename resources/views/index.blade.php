@extends('layout')

@section('content')



<form>
	Enter city, county, or zipcode <input type="text" value="">
	<button class="btn btn-primary">Go</button>
	<a class="button" href="" title=""><span class="glyphicon glyphicon-map-marker"></span></a>
	<span id="spinner" class="hidden">
	<img src="/images/gps.gif" alt="">Finding location...
	</span>
</form>



<div id="results">
	<span class="longitude"></span><br>
	<span class="lattitude"></span><br>
	<span class="location"></span>
</div>

	

@stop