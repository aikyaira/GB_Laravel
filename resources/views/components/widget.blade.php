<aside class="col-lg-4">
    <div class="widget categories">
        <header>
            <h3 class="h6">Форма заказа</h3>
        </header>
        <form method="post" class="col-sm-12" action="{{ route('order.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Телефон" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="text" name="text" placeholder="Что вы хотели бы получить?">{{ old('text') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Сохранить
            </button>
            @if(session('success'))

            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success') }}
                </div>
            </div>
            @endif
        </form>
    </div>
</aside>