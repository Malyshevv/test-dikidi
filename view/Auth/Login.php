<div class="container mt20">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <div class="container login-container">
        <h2>Авторизация</h2>
        <p class="text-secondary">Пожалуйста авторизуйтесь</p>
        <form>
            <div class="form-group">
                <label for="username">Логин:</label>
                <input type="text" class="form-control" id="username" placeholder="введите логин" required>
            </div>
            <div class="form-group position-relative">
                <label for="password">Пароль:</label>
                <input type="password" class="form-control" id="password" placeholder="введите пароль" required>
                <button type="submit" class="btn btn-success login-button"><img src="assets/img/enter.svg" width="20"></button>
            </div>
            <div class="checkbox remember-me">
                <label><input type="checkbox">Чужой ПК</label>
            </div>
            <a class="" href="/password-recovery">Забыли пароль?</a>
        </form>
    </div>
</div>