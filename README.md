# Как использовать ? 🛠️
1. Перед началом работы выполните следующую команду
```shell
composer install
```
2. Запуск из IDE
Для запуска приложения из вашей среды разработки (IDE) используйте следующую команду:
```shell
php -S localhost:8000 -t public
```
или воспользуйтесь командой
```shell
composer start:dev
```

# Запуск через Docker 🐳
Для запуска приложения через Docker выполните следующие шаги:

1. Перейдите в папку docker.
2. Запустите Docker Compose с помощью следующей команды:
```shell
docker-compose up -d --build
```

# Где что или что где :) ? 🧐
- Дамп располагается в папке public/dump.sql (создал view для просмотра результата запроса о котором написано в задании)
- Верстка находится в папках view/Auth/Login.php | view/Layout.php | public/assets
- Файловый менеджер в папках app/controllers/FileManager | view/FileManager