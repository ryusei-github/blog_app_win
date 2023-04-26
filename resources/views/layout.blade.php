<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #c9d3f381;
            color: #000;
        }

        .sidebar {
            font-size: 0.75em;
        }

        .sidebar-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .sidebar-about,
        .sidebar-categories li,
        .sidebar-posts li {
            margin-bottom: 2px;
        }

        .sidebar-categories a,
        .sidebar-posts a {
            color: #000;
        }

        .sidebar-categories a:hover,
        .sidebar-posts a:hover {
            color: #696969;
            text-decoration: none;
        }

        .footer {
          background-color: #c9d3f381;
            color: #000;
        }
    </style>
</head>
<body>
  <header>
    @include('blog.header')
  </header>
    <br>
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-15">
          @yield('content')
        </div>
      </div>
    </main>
  <footer class="footer mt-auto py-3 bg-dark">
    <div class="container">
      @include('blog.footer')
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
