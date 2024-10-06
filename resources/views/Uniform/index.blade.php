@extends('layouts.app')

@section('body')
<h1 class="text-center mt-3">طلبات الزي</h1>
<x-operation.success />
{{-- <div class="text-center mt-5">
    <a href="{{ route('Tablet.create') }}" class="btn btn-primary">إضافة</a>
</div> --}}
<div class="container my-3 table-responsive">
    <table class="table  mt-7">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم بالكامل</th>
                <th>البريد الإلكتروني</th>
                <th>رقم الهاتف</th>
                <th>رقم ولي الأمر</th>
                <th>الصف الدراسي</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uniformServices as $service)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $service->data['FullName'] }}</td>
                <td>{{ $service->data['Email'] }}</td>
                <td>{{ $service->data['phone'] }}</td>
                <td>{{ $service->data['phone2'] }}</td>
                <td>{{ $service->data['selectgrd'] }}</td>
                <td>
                        <div class="d-flex">
                            <form action="{{ route('Uniform.destroy', ['id' => $service->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟');">حذف</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            @if($uniformServices->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">لا توجد رسائل لعرضها.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection




