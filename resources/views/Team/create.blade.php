{{-- @extends('layouts.app')
@section('body')
<div class="container my-5">
    <form action="{{route('Team.store')}}" method="post">
        @csrf

    <label for="name" class="form-label">الاسم</label>
<input type="text" id="teamName" class="form-control" value="{{old('name')}}"  name="name" >
@error('name')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @enderror

    <label for="Title" class="form-label">العنوان</label>
<input type="text" id="teamTile" class="form-control" value="{{old('title')}}" name="title">
@error('title')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @enderror


<div class="mb-3">
    <label for="formFileSm" class="form-label">الصورة</label>
    <input class="form-control form-control-sm" id="teamPic" type="file" accept=".png , .jpg , .jpeg"  name="pic" >

  </div>


  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3"> نشر</button>
  </div>
</form>
</div>


@endsection --}}



{{-- @extends('layouts.app')
@section('body')
<div class="container my-5">
    <form action="{{route('Team.store')}}" method="post" enctype="multipart/form-data">
        @csrf

    <label for="name" class="form-label">الاسم</label>
    <input type="text" id="teamName" class="form-control" value="{{old('name')}}"  name="name" >
    @error('name')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @enderror

    <label for="Title" class="form-label">العنوان</label>
    <input type="text" id="teamTile" class="form-control" value="{{old('title')}}" name="title">
    @error('title')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @enderror


    <div class="mb-3">
        <label for="formFileSm" class="form-label">الصورة</label>
        <input class="form-control form-control-sm" id="teamPic" type="file" accept=".png, .jpg, .jpeg"  name="pic" >
      </div>


      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3"> نشر</button>
      </div>
    </form>
</div>

@endsection --}}



<!-- resources/views/Team/create.blade.php -->

{{-- @extends('layouts.app')

@section('body')
<div class="container my-5">
    <form action="{{ route('Team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- حقل الاسم -->
        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" id="teamName" class="form-control" value="{{ old('name') }}" name="name" required>
            @error('name')
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>

        <!-- حقل المسمى الوظيفي -->
        <div class="mb-3">
            <label for="title" class="form-label">المسمى الوظيفي</label>
            <input type="text" id="teamTitle" class="form-control" value="{{ old('title') }}" name="title" required>
            @error('title')
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>

        <!-- حقل الصورة -->
        <div class="mb-3">
            <label for="pic" class="form-label">الصورة</label>
            <input class="form-control" id="teamPic" type="file" accept=".png, .jpg, .jpeg" name="pic">
            @error('pic')
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>

        <!-- زر الإرسال -->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">نشر</button>
        </div>
    </form>
</div>
@endsection --}}


<!-- resources/views/Team/create.blade.php -->

@extends('layouts.app')

@section('body')
<div class="container my-5">
    <form action="{{ route('Team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- حقل الاسم -->
        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" id="teamName" class="form-control" value="{{ old('name') }}" name="name" required>
            @error('name')
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>

        <!-- حقل المسمى الوظيفي -->
        <div class="mb-3">
            <label for="title" class="form-label">المسمى الوظيفي</label>
            <input type="text" id="teamTitle" class="form-control" value="{{ old('title') }}" name="title" required>
            @error('title')
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>

        <!-- حقل الصورة -->
        <div class="mb-3">
            <label for="pic" class="form-label">الصورة</label>
            <input class="form-control" id="teamPic" type="file" accept=".png, .jpg, .jpeg" name="pic">
            @error('pic')
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>

        <!-- زر الإرسال -->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">نشر</button>
        </div>
    </form>
</div>
@endsection


