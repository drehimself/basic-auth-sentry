@extends('layout')

@section('content')

	{{ Auth::check() ? "Welcome, " . Auth::user()->username: "Why don't you sign up?" }}

	<br><br>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, veniam earum aspernatur hic ullam culpa beatae ipsum placeat consequatur possimus. Eaque!

@stop