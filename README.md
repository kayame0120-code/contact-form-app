# contact-form-app

## 環境構築

### Dockerビルド

- git clone https://github.com/kayamo0120-code/contact-form-app.git
- docker-compose up -d --build

### Laravel環境構築

- docker-compose exec php bash
- composer install
- cp .env.example .env 、環境変数を適宜変更
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

## 開発環境

- お問い合わせ画面：http://localhost:8084/
- ユーザー登録：http://localhost:8084/register
- phpMyAdmin：http://localhost:8080/

## 使用技術（実行環境）

- PHP 8.x
- Laravel 8.x
- MySQL 8.x
- nginx 1.x

## ER図

<!-- ER図の画像をここに貼る -->

## URL

- 開発環境：http://localhost:8084/