USE books;
SELECT * FROM books;

USE mysql;
SHOW Tables;
Describe orders;
Describe db;
SELECT * FROM user;
SELECT * FROM db;

Show Tables;
Show COLUMNS FROM Orders FROM books;

Show Columns From books.orders;

SHOW GRANTS FOR 'jenner';

Explain books;

Explain Select * From books;

Explain
Select customers.name
FROM customers, orders, order_items, books
WHERE customers.CustomerID = orders.CustomerID
AND orders.OrderID = order_items.OrderID
AND books.Title LIKE '%Java%';