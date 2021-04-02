<nav class="navbar navbar-expand-lg navbar-light bg-custom">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand custom-brand title-brand" href="{{ route('homeblog') }}">{{ $settings->site_name }}</a>

<div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link title-web" href="{{ route('homeblog') }}">Home</a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
            <a href="{{ route('category.single', ['id' => $category->id]) }}" class="dropdown-item">{{ $category->name }}</a>
            @endforeach
        </div>
    </li>
    <li class="nav-item">
      <span class="nav-link" onclick="setDarkMode(false)"><img src="{{ asset('icon/sun.png') }}" class="sun-mode" alt="Light Mode"></span>
    </li>
    <li class="nav-item">
      <span class="nav-link" onclick="setDarkMode(true)"><img src="{{ asset('icon/half-moon.png') }}" class="moon-mode" alt="Dark Mode"></span>
    </li>
</ul>
<form class="form-inline my-2 my-lg-0" method="GET" action="/results">
  <input class="form-control mr-sm-2 search-form" type="search" name="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-custom my-2 my-sm-0" type="submit">Search</button>
</form>
</div>
</nav>