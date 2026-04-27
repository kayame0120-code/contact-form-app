# contact-form-app

## 環境構築

### Dockerビルド

- git clone https://github.com/kayame0120-code/contact-form-app.git
- cd contact-form-app
- docker-compose up -d --build

### Laravel環境構築

- docker-compose exec php bash
- composer install
- cp .env.example .env 
- .envの以下の項目を変更する
  - DB_HOST=mysql
  - DB_DATABASE=laravel_db
  - DB_USERNAME=laravel_user
  - DB_PASSWORD=laravel_pass
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

### 権限設定（必要な場合）
- sudo chown -R $USER:$USER src
- chown -R www-data:www-data storage bootstrap/cache
- chmod -R 775 storage bootstrap/cache

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

```mermaid
erDiagram
    users {
        bigint id PK
        string name
        string email
        string password
        timestamps timestamps
    }
    categories {
        bigint id PK
        string content
        timestamps timestamps
    }
    contacts {
        bigint id PK
        bigint category_id FK
        string first_name
        string last_name
        int gender
        string email
        string tel
        string address
        string building
        text detail
        timestamps timestamps
    }
    categories ||--o{ contacts : "has many"
```

## URL

- 開発環境：http://localhost:8084/