describe customers;

insert into customers values
(NULL, 'Julie Smith', '25 Oak Street', 'Airport West');

insert into customers (Name, City) Values
('Melissa Jone', 'Nar Goon North');

INSERT INTO Customers VALUES
  (NULL, 'Julie Smith', '25 Oak Street', 'Airport West'),
  (NULL, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill'),
  (NULL, 'Michelle Arthur', '357 North Road', 'Yarraville');

INSERT INTO Books VALUES
  ('0-672-31697-8', 'Michael Morgan', 
   'Java 2 for Professional Developers', 34.99),
  ('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99),
  ('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99),
  ('0-672-31769-9', 'Thomas Schenk', 
   'Caldera OpenLinux System Administration Unleashed', 49.99);
   
INSERT INTO Orders VALUES
  (NULL, 3, 69.98, '2007-04-02'),
  (NULL, 1, 49.99, '2007-04-15'),
  (NULL, 2, 74.98, '2007-04-19'),
  (NULL, 3, 24.99, '2007-05-01');
  
INSERT INTO Order_Items VALUES
  (1, '0-672-31697-8', 2),
  (2, '0-672-31769-9', 1),
  (3, '0-672-31769-9', 1),
  (3, '0-672-31509-2', 1),
  (4, '0-672-31745-1', 3);

INSERT INTO Book_Reviews VALUES
  ('0-672-31697-8', 'The Morgan book is clearly written and goes well beyond
                     most of the basic Java books out there.');
Select Name, City From customers;

Select * From orders;

Select * From orders where CustomerID = 3;

Select * From customers where name like ("Julie%");

Select * From customers where city in ("Box Hill");

Select * From orders Where CustomerID = 3 OR CustomerID = 1;

Describe order_items;

Select customers.Name, Orders.OrderID, Orders.Amount, Orders.Date
From customers, orders
Where customers.Name = 'Michelle Arthur' and customers.CustomerID = orders.CustomerID;

Select customers.Name, books.Title, Orders.Amount, Orders.Date
From customers, orders, order_items, books
Where customers.CustomerID = orders.CustomerID
AND orders.OrderID = order_items.OrderID
AND order_items.ISBN = books.ISBN
AND books.Title LIKE '%Linux%';

Select customers.Name
FROM customers, orders, order_items, books
Where customers.CustomerID = orders.CustomerID
AND orders.OrderID = order_items.OrderID
AND order_items.ISBN = books.ISBN
AND books.Title LIKE '%Java%';

SELECT customers.CustomerID, customers.Name, orders.OrderID
From customers LEFT JOIN orders
ON customers.CustomerID = orders.CustomerID;

INSERT INTO customers VALUES
(NULL, 'George Napolitano', '177 Melbourne Road', 'Coburg');

Select * From customers;

SELECT customers.CustomerID, customers.Name
From customers LEFT JOIN orders
USING (CustomerID)
Where orders.OrderID IS NULL;

-- Alias
SELECT C.name
FROM customers AS C, orders as O, order_items AS OI, books AS B
WHERE C.CustomerID = O.CustomerID
AND O.OrderID = OI.OrderID
AND OI.ISBN = B.ISBN
AND B.Title LIKE '%Java%';

SELECT C1.Name, C2.Name, C1.City
FROM customers AS C1, customers AS C2
Where C1.City = C2.City
AND C1.Name != C2.Name;

Select * From customers;

-- Ordenar
Select * From customers order by Name;

Select * From customers order by Name DESC;

-- Agrupar
SELECT AVG(Amount) FROM orders;

SELECT CustomerID, AVG(Amount)
FROM orders
GROUP BY CustomerID;

SELECT CustomerID, AVG(Amount)
FROM orders
GROUP BY CustomerID
HAVING AVG(Amount) > 48;

-- Filas de devolver
SELECT Name FROM customers LIMIT 2;
SELECT Name FROM customers LIMIT 2,3;

-- Subconsultas
SELECT CustomerID, Amount
FROM orders
WHERE Amount = (SELECT MAX(Amount) FROM orders);

SELECT CustomerID, Amount
FROM orders
ORDER BY Amount DESC
LIMIT 1; -- Otra manera de hacer la consulta sin usar una subconsulta

-- Subconsultas relacionadas
SELECT ISBN, Title
FROM books
WHERE NOT EXISTS
(SELECT * FROM order_items WHERE order_items.ISBN = books.ISBN);

-- Usar una subconsulta como tabla temporal
SELECT * FROM
(SELECT CustomerID, Name FROM customers WHERE City = 'Box Hill')
AS box_hill_customers;

-- Actualizar registros de la base de datos
UPDATE books
SET Price = Price * 1.1;

UPDATE customers
SET Address = '250 Olsens Road'
WHERE CustomerID = 4;

-- Alterar Tablas
ALTER TABLE customers
MODIFY Name CHAR(70) NOT NULL;

ALTER TABLE orders
ADD Tax FLOAT(6,2) AFTER Amount;

ALTER TABLE orders
DROP Tax;

describe orders;

-- Eliminar registros de la base de datos
DELETE FROM customers
Where CustomerID = 5;

Select * From customers;

