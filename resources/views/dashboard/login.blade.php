@extends('layouts.app')
@section('body')
<div class="container mt-5 m-auto text-center">
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">البريد الالكتروني</label>
            <input type="emial" id="emailPanel" class="form-control" value="{{ old('email') }}" name="useremail" required>
            @error('useremail')
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">كلمة المرور</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="userpassword">
        </div>
        @error('userpassword')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
        <button type="submit" class="btn btn-primary text-center">دخول</button>
      </form>
</div>
@endsection