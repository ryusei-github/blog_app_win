@extends('layout')
@section('title', 'ブログ一覧')
@section('content')
<div class="row justify-content-center">
  @if (session('success_msg'))
  <div class="alert alert-success">
      {{ session('success_msg') }}
  </div>
@endif
@if (session('err_msg'))
  <div class="alert alert-danger">
      {{ session('err_msg') }}
  </div>
@endif
  <div class="col-md-15">
    <h2>ブログ記事一覧</h2>
    @if (session('err_msg'))
      <p class="text-danger">
        {{ session('err_msg') }}
      </p>
    @endif
    <table class="table table-striped">
      <tr>
        <th>投稿日付</th>
        <th>更新日時</th>
        <th>タイトル</th>
        <th></th>
        <th></th>
      </tr>
      @foreach ($blogs as $blog)
      <tr>
        <td>{{ $blog->created_at}}</td>
        <td>{{ $blog->updated_at}}</td>
        <td><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></td>
        <td><button type="button" class="btn btn-primary" onclick="location.href='blog/edit/{{ $blog->id }}'">編集</button></td>
        <td><form method="POST" action="{{ route('delete', $blog->id) }}" onsubmit="return checkDelete()">
          @csrf<button type="submit" class="btn btn-danger" onclick="">削除</button></td>
      </tr>
      @endforeach
    </table>
    <a href="{{ route('create')}}" class="btn btn-primary">新規でブログを登録</a>
    <div class="d-flex justify-content-center">
      {{ $blogs->links() }}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    @include('blog.sidebar')
  </div>
</div>
<script>
  function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
      return true;
    } else {
      return false;
    }
  }
  </script>
@endsection
