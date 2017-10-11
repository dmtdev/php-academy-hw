-- 1
SELECT *
FROM employees
WHERE firstName IN ("Barry", "Larry", "Leslie")
ORDER BY firstName;

-- 2
SELECT *
FROM products
ORDER BY buyPrice DESC
LIMIT 3;

-- 3
SELECT *
FROM products
ORDER BY quantityInStock
LIMIT 3;

-- 4
# SELECT *
# FROM (
#        SELECT
#          offices.*,
#          count(employees.employeeNumber) AS e_id
#        FROM offices
#          INNER JOIN employees ON offices.officeCode = employees.officeCode
#        GROUP BY offices.officeCode
#        ORDER BY e_id DESC
#      ) AS tmp
# WHERE e_id > 4;

-- 4.1
SELECT
  offices.*,
  count(employees.employeeNumber) AS employees_counter
FROM offices
  INNER JOIN employees ON offices.officeCode = employees.officeCode
GROUP BY offices.officeCode
HAVING employees_counter > 4;

-- 5
# SELECT *
# FROM
#   (
#     SELECT
#       orders.*,
#       count(orderdetails.productCode) product_count
#     FROM orders
#       INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
#     GROUP BY orders.orderNumber
#   ) AS tmp
# WHERE product_count > 10;

-- 5.1
SELECT
  orders.*,
  count(orderdetails.productCode) product_count
FROM orders
  INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
GROUP BY orders.orderNumber
HAVING product_count > 10;

-- 6
SELECT
  employees.*,
  count(customers.customerNumber)
FROM employees
  LEFT JOIN customers ON employees.employeeNumber = customers.salesRepEmployeeNumber
GROUP BY employees.employeeNumber;

-- 7
# SELECT *
# FROM (
#        SELECT
#          offices.*,
#          count(orders.orderNumber) orders_count
#        FROM offices, employees, customers, orders
#        WHERE
#          offices.officeCode = employees.officeCode
#          AND employees.employeeNumber = customers.salesRepEmployeeNumber
#          AND customers.customerNumber = orders.customerNumber
#          AND YEAR(orders.orderDate) = "2005"
#        GROUP BY offices.officeCode
#      ) tmp
# WHERE orders_count > 5;

-- 7.1
SELECT
  offices.*,
  count(orders.orderNumber) orders_count
FROM offices, employees, customers, orders
WHERE
  offices.officeCode = employees.officeCode
  AND employees.employeeNumber = customers.salesRepEmployeeNumber
  AND customers.customerNumber = orders.customerNumber
  AND YEAR(orders.orderDate) = "2005"
GROUP BY offices.officeCode
HAVING orders_count > 5;

-- 7.2
SELECT
  offices.*,
  count(orders.orderNumber) orders_count
FROM offices
  JOIN employees ON offices.officeCode = employees.officeCode
  JOIN customers ON employees.employeeNumber = customers.salesRepEmployeeNumber
  JOIN orders ON customers.customerNumber = orders.customerNumber
WHERE YEAR(orders.orderDate) = "2005"
GROUP BY offices.officeCode
HAVING orders_count > 5;

-- 8
SELECT
  productlines.*,
  count(DISTINCT orderdetails.orderNumber) orders_count
FROM productlines
  JOIN products ON productlines.productLine = products.productLine
  RIGHT JOIN orderdetails ON products.productCode = orderdetails.productCode
GROUP BY productlines.productLine