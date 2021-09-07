<nav class="navbar navbar-expand-lg">
    <div class="search-area">
        <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <form action="#">
                        <div class="form-group">
                            <input type="search" name="search" id="search" placeholder="What are you looking for?">
                            <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Navbar Brand -->
        <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="index.html" class="navbar-brand">Bootstrap Blog</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse"
                aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span></span><span></span><span></span></button>
        </div>
        <!-- Navbar Menu -->
        <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('news') }}" class="nav-link ">Главная</a>
                </li>
                </li>
                <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link ">Категории</a>
                </li>
                <li class="nav-item"><a href="{{ route('contacts') }}" class="nav-link ">Контакты</a>
                </li>
                @auth
                    <div class="dropdown">
                        <li class="nav-item">
                            @if (Auth::user()->avatar)
                                <img class="dropdown-toggle" src="{{ Auth::user()->avatar }}" alt=""
                                    style="width:50px;border-radius:25px" />
                            @else <button class="btn btn-primary btn-sm dropdown-toggle" type="button">
                                    ЛК
                                </button>
                            @endif
                        </li>

                        <ul class="dropdown-menu" id="dropdownMenu">
                            <li class="nav-item"><a href="{{ route('account') }}" class="nav-link ">Личный
                                    кабинет</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="nav-link ">
                                    Выйти
                                </a>
                        </ul>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    </li>
                @else
                    <div class="btn-group">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button">
                            Войти
                        </button>
                        <ul class="dropdown-menu" id="dropdownMenu">
                            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link ">Войти через
                                    email</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('vk.init') }}" class="nav-link ">Войти через
                                    VK</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('register') }}"
                                    class="nav-link ">Зарегистрироваться</a>
                            </li>
                        </ul>
                    </div>

                @endauth
            </ul>
        </div>
    </div>
</nav>
