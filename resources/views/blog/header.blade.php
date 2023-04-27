<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="/">ブログ</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	  <div class="navbar-nav">
		<a class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('blogs') }}">ブログ一覧</a>
		<a class="nav-item nav-link {{ request()->is('blog/create') ? 'active' : '' }}" href="{{ route('create') }}">ブログ投稿</a>
		<a class="nav-item nav-link {{ request()->is('#') ? 'active' : '' }}" href="#">マイページ</a>
	  </div>
	</div>
</nav>
