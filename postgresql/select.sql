-- Написать запрос для вывода одной таблицы, которая содержит эти данные:
-- user.id , user.name , 
-- orders.id , orders.created_at
-- order_items.id, order_items.name,

SELECT 
    users.id as user_id, 
    users.name as user_name,
    orders.id as order_id, 
    orders.created_at as order_created_at,
    order_items.id as order_item_id,
    order_items.name as order_item_id
FROM users
LEFT JOIN orders ON users.id = orders.user_id
LEFT JOIN order_items ON orders.id = order_items.order_id;