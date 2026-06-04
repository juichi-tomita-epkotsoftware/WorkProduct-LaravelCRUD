@extends('admin.base')
@section('title', 'Share.app Remind')

{{-- @section('content')
<h1>Remind List</h1>
<a href="{{ route('admin.reminds.create') }}">新規登録</a>

@foreach($reminds as $remind)
<div>
    <p>{{ $remind->remind_date }}</p>
    <p>{{ $remind->title }}</p>
    <p>{{ $remind->comment }}</p>
    @if($remind->image_path)
        <img src="{{ asset('storage/' . $remind->image_path) }}" width="200">
    @endif
</div>
@endforeach
@endsection --}}

@section('content')
<h1>Remind List</h1>
<a href="{{ route('admin.reminds.create') }}"
   style="display:inline-block; background:#2e7d32; color:white; text-decoration:none; border-radius:999px; padding:10px 24px; font-size:15px; font-weight:600; letter-spacing:0.5px; margin-bottom:20px;">
    ＋ New Remind
</a>

<table class="table table-bordered table-hover" style="font-size: 18px">
    <tr>
        <th>Image</th><th>Date</th><th>Title</th><th>Category</th><th>Comment</th>
    </tr>
    @foreach($reminds as $remind)
    <tr>
        <td>
            @if($remind->image_path)
                <img src="{{ asset('storage/' . $remind->image_path) }}" width="80">
            @endif
        </td>
        <td>{{ $remind->remind_date }}</td>
        <td>{{ $remind->title }}</td>
        <td>{{ $remind->category }}</td>
        <td>{{ $remind->comment }}</td>
        {{-- <td>
            <a href="{{ route('admin.residents.show', $resident) }}">詳細</a>
            <a href="{{ route('admin.residents.edit', $resident) }}">編集</a>
            <form action="{{ route('admin.residents.destroy', $resident) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: none; border:none;padding:0;color:#0d6efd;cursor: pointer;font-size:inherit;" >削除</button>
            </form>
        </td> --}}
    </tr>
    @endforeach
</table>
@endsection