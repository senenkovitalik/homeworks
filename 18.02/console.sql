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
