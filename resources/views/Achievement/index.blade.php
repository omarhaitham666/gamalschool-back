@extends('layouts.app')

@section('body')
<h1 class="text-center mt-3">الإنجازات</h1>
<x-operation.success />
<div class="text-center mt-5">
    <a href="{{ route('Achievement.create') }}" class="btn btn-primary">إضافة</a>
</div>
<div class="container my-3 table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">الاسم</th>
                <th scope="col">العنوان</th>
                <th scope="col">الصورة</th>
                <th scope="col">الأحداث</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Achievements as $achievement )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $achievement->name }}</td>
                    <td>{{ $achievement->title }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $achievement->pic) }}" alt="{{ $achievement->name }}" style="width: 100px; height: auto;">
                    </td>
                    
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('Achievement.show', ['id' => $achievement->id]) }}" class="btn btn-primary me-2">إظهار</a>
                            <a href="{{ route('Achievement.edit', ['id' => $achievement->id]) }}" class="btn btn-warning me-2">تحديث</a>
                            <form action="{{ route('Achievement.destroy', ['id' => $achievement->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟');">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            @if($Achievements->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">لا توجد إنجازات لعرضها.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection



