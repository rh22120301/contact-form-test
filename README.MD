環境構築
Dockerビルド
・git@github.com:rh22120301/contact-form-test.git
・docker-compose up -d --build

Laravel環境構築
・docker-compose up exec php bash
・compmoser install
・cp .env.example .env
・php artisan key:generate
・php artisan migrate
・php artisan db:seed

開発環境
・お問い合わせ画面：http://localhost/
・ユーザー登録：http://localhost/admin/
・phpMyAdmin：http://localhost:8080/

使用技術
・PHP 8.2.29
・mysql  Ver 8.0.44
・Laravel Framework 8.83.8
・nginx/1.24.0 



