@extends('layout')
@section('title', 'ブログ詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>{{ $blog->title }}</h2><br>
	<span>作成日：{{ $blog->created_at }}</span><br><br>
	<span>更新日：{{ $blog->updated_at }}</span><br><br>
	<p>～本文～</p>
	<p>{{ $blog->content }}</p>
  </div>
</div>
@endsection