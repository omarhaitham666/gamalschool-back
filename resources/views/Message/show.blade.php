@extends('layouts.app')
@section('body')

<h1> معلومات {{ $messageServices->first_name }}</h1>
<p>البريد الالكتروني {{ $messageServices->email }}</p>
<p> الاستفسار {{ $messageServices->message }}</p>



<a href="{{url()->previous()}}">الرجوع</a>
@endsection