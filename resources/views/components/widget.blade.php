<aside class="col-lg-4">
    <div class="widget categories">
        <header>
            <h3 class="h6">Форма заказа</h3>
        </header>
        <form method="post" class="col-sm-12" action="{{ route('admin.orders.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Имя"
                    value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                    value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Телефон"
                    value="{{ old('phone') }}">
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <textarea class="form-control" id="text" name="text"
                    placeholder="Что вы хотели бы получить?">{{ old('text') }}</textarea>
            </div>
            @error('text')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Сохранить
            </button>
            @include('inc.message')
        </form>
    </div>
</aside>
