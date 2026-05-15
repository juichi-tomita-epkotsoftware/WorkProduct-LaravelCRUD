@extends('admin.base')
{{-- //親レイアウトadmin.baseを指定 --}}

@section('title', '職業')
{{--
section：親レイアウトに定義された「穴yield」に子ビューがコンテンツを差し込む仕組み
'title','職業'  → 親の<tittle>と<h1>を埋める
'subtitle','新規' → 親の<h2>を埋める
'css' → 親のhead内を埋める
'content' → 親の<main>中
'script'  → 親の</body>直前埋める

--}}
@section('subtitle', '新規')
@section('css')

@endsection
{{-- //endsection:sectionとセットで使うもので「ここからここまでがこのセクションのコンテンツ」という範囲を囲む役割 --}}

@section('content')
<form action="{{ route('admin.jobs.store') }}" method="POST">
  @csrf
  {{-- //フォーム送信時にCSRFトークンを自動生成するディレクティブ --}}
  @include('admin.jobs.form-controls', ['readOnly' => false])
  {{-- include：別のBladeファイルを読み込むディレクティブ(コピペ) --}}
  <div class="form-group row">
    <div class="col-3">
      <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">一覧へ</a>
    </div>
    <div class="col-9 text-right">
      <button type="submit" class="btn btn-primary">登録</button>
    </div>
  </div>
</form>
@endsection

@section('script')

@endsection
