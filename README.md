# movies
Описание проекта
1.Проект в папке movies
2.База Данных
В config в файле  db.php  заменить данные для поключения к БД на свои
	$server="localhost";
	$name = "имя пользователя";
	$pass = "пароль";
	
Базу данных и таблицу при их отсутсвии функция  db() созаст автоматически


3.Структура страниц:
index.php - главная:
поиск по названию фильмов и имени актера
кнопка добавления фильмов
список всех фильмов, с возможностб удаления, та просмотра детальной информации

add_movie.php - добавление фильмов
форма для отправки данных
форма для загрузки файла, с которого будут импортированы данные в бд
()
movie_info.php - просмотр детальной информации

