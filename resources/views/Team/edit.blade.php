@extends('layouts.app')
@section('body')
<h1 class="text-center mt-3">تحديث البيانات</h1>

<div class="container my-5">
    <form action=" {{route('Team.update',['id'=>$Team->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

    <label for="name" class="form-label">الاسم</label>
<input type="text" id="teamName" class="form-control" value="{{old('name')??$Team->name}}"  name="name" >
@error('name')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @enderror

    <label for="Title" class="form-label">العنوان</label>
<input type="text" id="teamTile" class="form-control" value="{{old('title') ?? $Team->title}}" name="title">
@error('title')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @enderror


<div class="mb-3">
    <label for="formFileSm" class="form-label">الصورة</label>
    <input class="form-control form-control-sm" id="teamPic" type="file" name="pic" value="{{old('pic')??$Team->pic}}">

  </div>


  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3"> تحديث</button>
  </div>
</form>
</div>
@endsection

{{-- 
<form action="{{ route('Team.update', ['id' => $Team->id]) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')

  <label for="name" class="form-label">الاسم</label>
  <input type="text" id="teamName" class="form-control" value="{{ old('name') ?? $Team->name }}" name="name">
  @error('name')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @enderror

  <label for="Title" class="form-label">العنوان</label>
  <input type="text" id="teamTile" class="form-control" value="{{ old('title') ?? $Team->title }}" name="title">
  @error('title')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @enderror

  <div class="mb-3">
      <label for="formFileSm" class="form-label">الصورة</label>
      <input class="form-control form-control-sm" id="teamPic" type="file" name="pic">
  </div>

  <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3"> تحديث</button>
  </div>
</form> --}}
