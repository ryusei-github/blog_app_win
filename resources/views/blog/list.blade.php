@extends('layout')
@section('title', 'ブログ一覧')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-15">
    <h2>ブログ記事一覧</h2>
    @if (session('err_msg'))
      <p class="text-danger">
        {{ session('err_msg') }}
      </p>
    @endif
    <table class="table table-striped">
      <tr>
        <th>記事番号</th>
        <th>日付</th>
        <th>タイトル</th>
        <th>内容</th>
      </tr>
      @foreach ($blogs as $blog)
      <tr>
        <td>{{ $blog->id }}</td>
        <td>{{ $blog->created_at}}</td>
        <td><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></td>
        <td>{{ $blog->content }}</td>
      </tr>
      @endforeach
    </table>
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
@endsection
