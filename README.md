Простое REST API для управления задачами (To-Do List)

Стек технологий:
-PHP 8
-Laravel 12
-MySQL 8
-Docker
-Nginx

Проект организован по feature-based подходу: 

app/Task
    -TaskController.php (Http слой)
    -TaskEntity.php (инкапсуляция данных)
    -TaskRepository.php (работа с базой данных)
    -TaskRequest.php (валидация входных данных)

Запуск проекта: 
git clone https://github.com/IlyaStashevsky/test-api-laravel
cd test-api-laravel
docker compose up -d --build
cp .env.example .env
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate


Реализованные эндпоинты: 
-GET http://localhost/api/v1/tasks - получить список задач

-GET http://localhost/api/v1/tasks/{id} - получить одну задачу

-POST http://localhost/api/v1/tasks - создать задачу 
Body (json): 
{
  "title": "Task 1",
  "description": "Description",
  "status": "pending"
}

-PUT http://localhost/api/v1/tasks/{id} - обновление задачи (полная замена данных)
Body (json):
{
  "title": "Updated task",
  "description": "Updated description",
  "status": "done"
}

-DELETE http://localhost/api/v1/tasks/{id} - удалить задачу 

Валидация входных данных:
-title — обязателен, строка, не пустой
-description — опционально, строка
-status — одно из значений: pending, in_progress, done

Env:
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:0NtYQM0eYdHaTwuR5HmkF98NPFxWUGNG8zndvXT3t7o=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=todo
DB_USERNAME=todo
DB_PASSWORD=todo

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
