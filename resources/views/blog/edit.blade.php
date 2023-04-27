@extends('layout')
@section('title', 'ブログ編集')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2>ブログ編集フォーム</h2>
		<form method="POST" action="{{ route('update') }}" onsubmit="return checkSubmit()">
			@csrf
			<input type="hidden" name="id" value="{{ $blog->id }}">
			<div class="form-group">
				<label for="title">タイトル</label>
				<input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
				@if ($errors->has('title'))
					<span class="text-danger">{{ $errors->first('title') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="content">本文</label>
				<textarea class="form-control" id="content" name="content" rows="5" required>{{ $blog->content }}</textarea>
				@if ($errors->has('content'))
					<span class="text-danger">{{ $errors->first('content') }}</span>
				@endif
			</div><br>
			<a href="{{ route('blogs') }}" class="btn btn-secondary">キャンセル</a>
			<button type="submit" class="btn btn-primary">更新する</button>
		</form>
	</div>
</div>
<script>
function checkSubmit(){
	if(window.confirm('更新してよろしいですか？')){
		return true;
	} else {
		return false;
	}
}
</script>
@endsection