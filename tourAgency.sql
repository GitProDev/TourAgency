INSERT INTO users (name, email, email_verified_at, password, remember_token)
VALUES ('username', 'test@mail.com', now(), '$2y$10$DDX8JRUnnODkmfLPkaWHX.RvkF1ROcwk8WoZQIo5ijGDsa6b8cype', true); /*password*/

INSERT INTO attractions (location, image)
VALUES('Moscow', ''),
('Chisinau', ''),
('Odessa', ''),
('Chicago', ''),
('Berlin', '');

INSERT INTO tours (cost, date, description, attraction_id)
VALUES(450, Now(), 'В стоимость тура входит:
-Прямой авиаперелет Кишинев-Невшехир-Кишинев
-Проживание 2 ночи в отеле 5*
-Питание завтрак и ужин
-Групповой трансфер
-Вход в музеи и экскурсии
-Полет на воздушном шаре
Стоимость на 1 взрослого в двухместном номере.', 1),
(310, Now(), 'В стоимость тура входит:
-Прямой авиаперелет Кишинев-Невшехир-Кишинев
-Проживание 2 ночи в отеле 5*
-Питание завтрак и ужин
-Групповой трансфер
-Вход в музеи и экскурсии
-Полет на воздушном шаре
Стоимость на 1 взрослого в двухместном номере.', 2),
(530, Now(), 'В стоимость тура входит:
-Прямой авиаперелет Кишинев-Невшехир-Кишинев
-Проживание 2 ночи в отеле 5*
-Питание завтрак и ужин
-Групповой трансфер
-Вход в музеи и экскурсии
-Полет на воздушном шаре
Стоимость на 1 взрослого в двухместном номере.', 3),
(400, Now(), 'В стоимость тура входит:
-Прямой авиаперелет Кишинев-Невшехир-Кишинев
-Проживание 2 ночи в отеле 5*
-Питание завтрак и ужин
-Групповой трансфер
-Вход в музеи и экскурсии
-Полет на воздушном шаре
Стоимость на 1 взрослого в двухместном номере.', 4),
(250, Now(), 'В стоимость тура входит:
-Прямой авиаперелет Кишинев-Невшехир-Кишинев
-Проживание 2 ночи в отеле 5*
-Питание завтрак и ужин
-Групповой трансфер
-Вход в музеи и экскурсии
-Полет на воздушном шаре
Стоимость на 1 взрослого в двухместном номере.', 5);