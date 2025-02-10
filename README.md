<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Заметки по Laravel

Создает модель, миграцию и фабрику.
`php artisan make:model Tag -mf`

Установить дебаггер Laravel
`composer require barryvdh/laravel-debugbar --dev`

Установка
`php artisan vendor:publish`

Сбросить таблицы с данными
`php artisan migrate:fresh`

Сбросить таблицы с данными и заполнить сид данными
`php artisan migrate:fresh --seed`

Заполнить сиды
`php artisan db:seed`

Запустить строку для команд на php
`php artisan tinker` 

Заполнить таблицы 100 случайными данными
`App\Models\Job::factory(100)->create();`

## 16 Forms and CSRF Explained (with Examples)

Добавляем директиву Cross-Site Request Forgery (CSRF) в самом начале формы чтобы отличить пользователя от злоумышленника.
```php
  <form method="POST" action="/jobs">
  @csrf
```
