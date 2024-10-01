@extends('layouts.app')
@section('body')

<h1> معلومات {{$achievement->name}}</h1>
<p>المسمى الوظيفي {{$achievement->title}}</p>
@if($achievement->pic)
<img src="{{ asset('storage/' . $achievement->pic) }}" alt="{{ $achievement->name }}" class="w-10 h-10 rounded-full">
@else
<p></p>
@endif


<a href="{{url()->previous()}}">الرجوع</a>
@endsection