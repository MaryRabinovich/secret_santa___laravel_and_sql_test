INSERT INTO users (name) VALUES
('User_1'),
('User_2');

INSERT INTO user_carts (user_id) VALUES
(1),
(1),
(2);

INSERT INTO orders (user_id, created_at) VALUES
(1, now()),
(1, now() + INTERVAL 1 hour),
(2, now() + INTERVAL 2 hour);

INSERT INTO order_items (order_id, name) VALUES
(1, 'chair'),
(1, 'table'),
(2, 'bread'),
(2, 'butter'),
(3, 'book');

-- что должно быть в таблице user_carts не понятно,
-- может ли быть у юзера только одна такая - тоже.
-- поэтому добавляем первому юзеру две, второму одну

-- в таблицу заказов добавляем два заказа первому юзеру
-- и один заказ второму

-- в таблице элементов заказа
-- добавляем два элемента для первого заказа первого юзера,
-- добавляем два элемента для второго заказа первого юзера,
-- и один элемент для единственного заказа второго юзера