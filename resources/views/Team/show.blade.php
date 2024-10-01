@extends('layouts.app')
@section('body')

<h1> معلومات {{$Team->name}}</h1>
<p>المسمى الوظيفي {{$Team->title}}</p>
@if($Team->pic)
<img src="{{ asset('storage/' . $Team->pic) }}" alt="{{ $Team->name }}" class="w-10 h-10 rounded-full">
@else
<p></p>
@endif


<a href="{{url()->previous()}}">الرجوع</a>
@endsection