@extends('layouts.app')

@section('body')
<h1 class="text-center mt-3">فريق العمل</h1>
<x-operation.success />
<div class="text-center mt-5">
    <a href="{{route('Team.create')}}" class="btn btn-primary ">اضافة</a>
</div>
<div class="container my-3 table-responsive  ">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">الاسم</th>
        <th scope="col">العنوان</th>
        <th scope="col">الصورة</th>
        <th scope="col">الاحداث</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($Teams as $team )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$team->name}}</td>
                <td>{{$team->title}}</td>
                {{-- <td>{{$Team->pic}} <img src="{{asset('storage/uploads/team')}}" alt=""></td> --}}
                <td>
                  <img src="{{ asset('storage/' . $team->pic) }}" alt="{{ $team->name }}" style="width: 100px; height: auto;">
              </td>
              
                <div class="d-flex">
                <td><a href="{{route('Team.show',['id'=>$team->id])}}" class="btn btn-primary">اظهار</a></td>
                <td><a href="{{route('Team.edit',['id'=>$team->id])}}" class="btn btn-warning">تحديث</a></td>
                <td><form action="{{route('Team.destroy',['id'=>$team->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">delete</button>
                </form></td>
            </div>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection