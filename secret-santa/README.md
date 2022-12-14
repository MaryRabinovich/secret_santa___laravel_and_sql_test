Laravel

# Задача

Реализовать логику работы игры "тайный санта"

На laravel необходмио заполнить тестовыми данными базу данных (через db:seed)

В базе данных должна быть таблица с участниками. Каждый участник является "тайным сантой" для другого участника (подопечного).

У каждого участника есть строго один тайный санта и один подопечный, для которого участник является тайным сантой.

У каждого участника есть уникальное имя.

Реализовать один get метод, который по переданному в get параметре id участника вернёт json информацию о подопечном (поля записи из таблицы) и о самом участнике.

"Тайный Санта", он же Secret Santa, - анонимный способ дарить подарки. Идея проста: в большой компании каждому достаётся один "подопечный", которому нужно придумать подарок. Сам даритель при этом остаётся тем самым "тайным Сантой".

### Общие указания

Код задачи должен быть выложен на git

Схема базы данных должна заполняться через миграции.

Данные базы данных должны наполняться случайным образом (генерировать фамилии и имена и связку санта-подопечный) через db:seed

# Решение

Я добавила отдельную таблицу santa_relations вместо того, чтобы менять что-то в исходной таблице users. В рабочей ситуации я бы сначала уточнила этот вопрос с нанимателем. В тестовой ситуации просто рискну предположить, что таблица users в проекте базовая и уже старая, а дополнение с игрой "секретный санта" - новое, а то и временное. Такие вещи лучше делать отдельными деталями, которые дальше легко удалить, и при добавлении которых мы не рискуем ничем в старых данных.

Поскольку игру мы делаем через выносную таблицу, связи между сантами и их подопечными (клиентами) получились как many-to-many. Однако их уникальность гарантирована уникальностью значений в столбцах santa_id и client_id в таблице santa_relations.

API /api/santa/{id} возвращает json с двумя ключами: santa и client. По ключу santa мы получаем всю информацию о юзере с указанным в ссылке id. По ключу client мы получаем информацию о его подопечном.

В проект также добавлен тест SantaApiTest. Тестирование проводится in-memory в БД SQLite.

Запуск тестов в консоли из папки проекта: php artisan test

Для проверки вручную:

- запустите сервер и базу данных 

- в файле .env настройте параметры базы данных DB_...

- проведите миграции и сидирование: 
php artisan migrate --seed

- перейдите в браузере по адресу /api/santa/{id}, где id принимает любое значение от 1 до 10 (сидеры создают 10 юзеров)