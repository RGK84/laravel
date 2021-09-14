<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Новостной блог</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Главная</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}">Рубрики</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('news') }}">Статьи</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('order') }}">Заказ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contacts') }}">Обратная связь</a></li>
                {{-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> --}}
            </ul>
        </div>
    </div>
</nav>