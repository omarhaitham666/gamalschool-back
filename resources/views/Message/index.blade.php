@extends('layouts.app')
@section('body')
<h1 class="text-center mt-3">طلبات الرسائل</h1>
<x-operation.success />
{{-- <div class="text-center mt-5">
    <a href="{{ route('Tablet.create') }}" class="btn btn-primary">إضافة</a>
</div> --}}
<div class="container my-3 table-responsive">
    <table class="table mt-7">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم الأول</th>
                <th>الاسم الأخير</th>
                <th>البريد الإلكتروني</th>
                <th>الاستفسار</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messageServices as $service)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $service->first_name }}</td>
                <td>{{ $service->last_name }}</td>
                <td>{{ $service->email }}</td>
                <td>{{ Str::limit($service->message, 50) }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('Message.show', ['id' => $service->id]) }}" class="btn btn-primary">إظهار</a>
                        <form action="{{ route('Message.destroy', ['id' => $service->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟');">حذف</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

            @if($messageServices->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">لا توجد رسائل لعرضها.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection

