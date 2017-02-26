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