{{-- @extends('layouts.app')
@section('body')
<h1 class="text-center mt-3">تحديث البيانات</h1>

<div class="container my-5">
    <form action=" {{route('Achievement.update',['id'=>$achievement->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

    <label for="name" class="form-label">الاسم</label>
<input type="text" id="teamName" class="form-control" value="{{old('name')??$achievement->name}}"  name="name" >
@error('name')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @enderror

    <label for="Title" class="form-label">العنوان</label>
<input type="text" id="teamTile" class="form-control" value="{{old('title') ?? $achievement->title}}" name="title">
@error('title')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{$message}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @enderror


<div class="mb-3">
    <label for="formFileSm" class="form-label">الصورة</label>
    <input class="form-control form-control-sm" id="teamPic" type="file" name="pic" value="{{old('pic')??$achievement->pic}}">

  </div>


  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3"> تحديث</button>
  </div>
</form>
</div>
@endsection
 --}}

 @extends('layouts.app')

 @section('body')
 <h1 class="text-center mt-3">تحديث البيانات</h1>
 
 <div class="container my-5">
     <form action="{{ route('Achievement.update', ['id' => $achievement->id]) }}" method="post" enctype="multipart/form-data">
         @csrf
         @method('PUT')
 
         <!-- حقل الاسم -->
         <div class="mb-3">
             <label for="name" class="form-label">الاسم</label>
             <input type="text" id="achievementName" class="form-control" value="{{ old('name', $achievement->name) }}" name="name" required>
             @error('name')
                 <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                     {{ $message }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             @enderror
         </div>
 
         <!-- حقل العنوان -->
         <div class="mb-3">
             <label for="title" class="form-label">العنوان</label>
             <input type="text" id="achievementTitle" class="form-control" value="{{ old('title', $achievement->title) }}" name="title" required>
             @error('title')
                 <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                     {{ $message }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             @enderror
         </div>
 
         <!-- حقل الصورة -->
         <div class="mb-3">
             <label for="formFileSm" class="form-label">الصورة</label>
             <input class="form-control form-control-sm" id="achievementPic" type="file" name="pic" accept=".png, .jpg, .jpeg">
             @if($achievement->pic)
                 <div class="mt-2">
                     <img src="{{ asset('storage/' . $achievement->pic) }}" alt="{{ $achievement->name }}" class="img-thumbnail" style="width: 100px; height: auto;">
                 </div>
             @endif
             @error('pic')
                 <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                     {{ $message }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             @enderror
         </div>
 
         <!-- زر الإرسال -->
         <div class="col-auto">
             <button type="submit" class="btn btn-primary mb-3">تحديث</button>
         </div>
     </form>
 </div>
 @endsection
 