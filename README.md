home-framework
==============
приложение позволяет искать по базе фильмов с помощью различных запросов в адресной строке.

Use

```yaml
composer install
```


```yaml
docker-compose up
```
### Запросы
##### вывести 100 самых популярных фильмов для указанных жанров
##### (Drama, Thriller и Comedy)
```yaml
localhost/get-films-by-genre/?genres=Drama,Comedy,Thriller 
```
##### вывести 100 самых популярных фильмов для указанного списка:
##### (Engineer, Programmer и Marketing)
```yaml
localhost/get-films-by-profession/?proflist=Engineer,Programmer,Marketing
```
##### вывести 100 самых не популярных фильмов, которые были просмотрены пользователями в указанном возрастном диапазоне (от 18 до 35 лет) (выводит название фильма и возраст человека)
```yaml
localhost/get-films-by-profession/?proflist=Engineer,Programmer,Marketing
```
##### вывести 100 фильмов, снятые в указанный период (c 1993 по 1997 год) с максимальной оценкой пользоватлей
```yaml
local/get-films-by-period/?period=1994-1997
```
