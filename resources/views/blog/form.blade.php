@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2>ブログ投稿フォーム</h2>
		<form method="POST" action="{{ route('store') }}" onsubmit="return checkSubmit()">
			@csrf
			<div class="form-group">
				<label for="title">タイトル</label>
				<input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
				@if ($errors->has('title'))
					<span class="text-danger">{{ $errors->first('title') }}</span>
				@endif
			</div>
			<div class="form-group">
				<label for="content">本文</label>
				<textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
				@if ($errors->has('content'))
					<span class="text-danger">{{ $errors->first('content') }}</span>
				@endif
			</div><br>
			<a href="{{ route('edit') }}" class="btn btn-secondary">キャンセル</a>
			<button type="submit" class="btn btn-primary">投稿する</button>
		</form>
	</div>
</div>
@endsection