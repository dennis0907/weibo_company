<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','Weibo App') -> laravel入門 </title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <nav class="navbar navar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Weibo App</a>
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="/help">幫助</a></li>
              <li class="nav-item" ><a class="nav-link" href="#">登入</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
