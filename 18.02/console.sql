# 1) ТОП 3 платежа

# SELECT amount
# FROM payments
# ORDER BY amount DESC
# LIMIT 3;

# 2) Сумма платежей по годам

# SELECT sum(amount) AS total_amount, year(paymentDate) AS year
# FROM payments
# GROUP BY year;

# 3) Платежи по месяцам и годам

# SELECT c.contactLastName AS last_name, c.contactFirstName AS first_name, sum(p.amount) AS total_amount, year(p.paymentDate) AS year, month(p.paymentDate) AS month
# FROM payments p
# JOIN customers c
# ON p.customerNumber = c.customerNumber
# GROUP BY year, month;

# 4)  Количество сотрудников и количество заказчиков для каждого офиса

# SELECT o.city, count(DISTINCT e.employeeNumber) AS employee_count, count(c.customerNumber) AS customer_count
# FROM offices o
# JOIN employees e
# ON o.officeCode = e.officeCode
# LEFT JOIN customers c
# ON  c.salesRepEmployeeNumber = e.employeeNumber
# GROUP BY city;

# 5) Средний доход на клиента/сотрудника

# SELECT e.employeeNumber, c.customerNumber, AVG(IFNULL(p.amount, 0))
# FROM payments p
# RIGHT JOIN customers c
# ON p.customerNumber = c.customerNumber
# RIGHT JOIN employees e
# ON c.salesRepEmployeeNumber = e.employeeNumber
# GROUP BY employeeNumber;


# 6) Сотрудники без клиентов

# SELECT e.employeeNumber, c.customerNumber
# FROM employees e
# LEFT JOIN customers c
# ON e.employeeNumber = c.salesRepEmployeeNumber
# WHERE customerNumber IS NULL;

# 7) ТОП 10 продаваемых товаров

# SELECT p.productName, COUNT(od.orderNumber) AS orders_count
# FROM products p
# JOIN orderdetails od
# ON p.productCode = od.productCode
# GROUP BY productName
# ORDER BY orders_count DESC
# LIMIT 10;

# 8) Сотрудники, привязанные более чем к 5 клинетам

# SELECT e.employeeNumber, COUNT(c.customerNumber) AS customer_count
# FROM employees e
# JOIN customers c
# ON e.employeeNumber = c.salesRepEmployeeNumber
# GROUP BY employeeNumber
# HAVING customer_count > 5;

# 9) Заказы с наибольшим количеством товаров

# SELECT od.orderNumber AS `order`, COUNT(od.productCode) AS product_count
# FROM orderdetails od
# GROUP BY `order`
# ORDER BY product_count DESC;

# 10) Офисы с менее чем 15 заказов за год

# SELECT of.city AS office, COUNT(o.orderNumber) AS order_count, YEAR(o.orderDate) AS `year`
# FROM offices of
# JOIN employees e
# ON of.officeCode = e.officeCode
# JOIN customers c
# ON e.employeeNumber = c.salesRepEmployeeNumber
# JOIN orders o
# ON c.customerNumber = o.customerNumber
# WHERE YEAR(o.orderDate) = 2004
# GROUP BY office
# HAVING order_count < 15;

# 11) Офисы с менее чем 15 заказов за год

# SELECT of.officeCode AS office,
#        COUNT(o.orderNumber) AS orders
# FROM offices of
# JOIN employees e
# ON of.officeCode = e.officeCode
# JOIN customers c
# ON e.employeeNumber = c.salesRepEmployeeNumber
# JOIN orders o
# ON c.customerNumber = o.customerNumber
# WHERE YEAR(o.orderDate) = 2005
# GROUP BY office
# HAVING orders < 15;

# 12) Выбор офисов, кроме конкретных

# SELECT *
# FROM offices o
# WHERE o.officeCode NOT IN (2, 4);

# 13) День месяца, месяц, год, сумма платежей

# SELECT DAY(p.paymentDate) AS `day`,
#        MONTH(p.paymentDate) AS `month`,
#        YEAR(p.paymentDate) AS `year`,
#        SUM(p.amount) AS total_amount
# FROM payments p
# GROUP BY p.paymentDate
# ORDER BY `year`, `month`, `day` ASC;

# 14) Месяц, год, максимальная сумма платежей

# SELECT MONTH(p.paymentDate) AS `month`,
#        YEAR(p.paymentDate) AS `year`,
#        MAX(p.amount) AS max_amount
# FROM payments p
# GROUP BY `month`, `year`
# ORDER BY `year`, `month`;

# 15)  Клиенты, которые не сделали заказ

# SELECT c.customerName AS clients_without_orders
# FROM customers c
# LEFT JOIN orders o
# ON c.customerNumber = o.customerNumber
# WHERE o.orderNumber IS NULL ;

# 16) Период заказов клиентов

# SELECT o1.customerNumber, o1.orderDate AS date1,
#        o2.orderDate AS date2,
#        PERIOD_DIFF(DATE_FORMAT(o1.orderDate, '%Y%m'), DATE_FORMAT(o2.orderDate, '%Y%m')) AS diff
# FROM orders o1, orders o2
# WHERE o1.customerNumber = o2.customerNumber AND o1.orderDate > o2.orderDate;

# 17) Заказы без оплат

# SELECT c.customerNumber,
#        o.orderNumber,
#        p.customerNumber
# FROM customers c
# JOIN orders o
# ON c.customerNumber = o.customerNumber
# LEFT JOIN payments p
# ON c.customerNumber = p.customerNumber
# WHERE p.customerNumber IS NULL;

# 18) Продуктовые линейки клиента

# SELECT c.customerNumber,
#        c.customerName,
#        GROUP_CONCAT(DISTINCT pl.productLine)
# FROM customers c
# JOIN orders o
# ON c.customerNumber = o.customerNumber
# JOIN orderdetails od
# ON o.orderNumber = od.orderNumber
# JOIN products p
# ON od.productCode = p.productCode
# JOIN productlines pl
# ON p.productLine = pl.productLine
# GROUP BY c.customerNumber;

# 19) Таблица по выборке

# CREATE TABLE client_product_lines AS (
# SELECT c.customerNumber,
#        c.customerName,
#        GROUP_CONCAT(DISTINCT pl.productLine)
# FROM customers c
# JOIN orders o
# ON c.customerNumber = o.customerNumber
# JOIN orderdetails od
# ON o.orderNumber = od.orderNumber
# JOIN products p
# ON od.productCode = p.productCode
# JOIN productlines pl
# ON p.productLine = pl.productLine
# GROUP BY c.customerNumber
# );

# 21)  Работа с представлениями

# CREATE VIEW client_prodlines_view AS
# SELECT c.customerNumber,
#        c.customerName,
#        GROUP_CONCAT(DISTINCT pl.productLine)
# FROM customers c
# JOIN orders o
# ON c.customerNumber = o.customerNumber
# JOIN orderdetails od
# ON o.orderNumber = od.orderNumber
# JOIN products p
# ON od.productCode = p.productCode
# JOIN productlines pl
# ON p.productLine = pl.productLine
# GROUP BY c.customerNumber;