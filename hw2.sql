SELECT *
FROM employees
WHERE firstName IN ("Barry", "Larry", "Leslie")
ORDER BY firstName;

SELECT *
FROM products
ORDER BY buyPrice DESC
LIMIT 3;

SELECT *
FROM products
ORDER BY quantityInStock
LIMIT 3;

SELECT *
FROM (
       SELECT
         offices.*,
         count(employees.employeeNumber) AS e_id
       FROM offices
         INNER JOIN employees ON offices.officeCode = employees.officeCode
       GROUP BY offices.officeCode
       ORDER BY e_id DESC
     ) AS tmp
WHERE e_id > 4;

SELECT
  offices.*,
  count(employees.employeeNumber) AS e_id
FROM offices
  INNER JOIN employees ON offices.officeCode = employees.officeCode
GROUP BY offices.officeCode
HAVING e_id > 4
ORDER BY e_id DESC;
-- select offices.*, count(employees.employeeNumber) as e_id from offices,  employees where offices.officeCode=employees.officeCode and e_id>4 group by offices.officeCode order by e_id desc;

SELECT *
FROM
  (
    SELECT
      orders.*,
      count(orderdetails.productCode) product_count
    FROM orders
      INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
    GROUP BY orders.orderNumber
  ) AS tmp
WHERE product_count > 10;

SELECT
  orders.*,
  count(orderdetails.productCode) product_count
FROM orders
  INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
GROUP BY orders.orderNumber
HAVING product_count > 10;


SELECT
  employees.*,
  count(customers.customerNumber)
FROM employees
  INNER JOIN customers ON employees.employeeNumber = customers.salesRepEmployeeNumber
GROUP BY employees.employeeNumber;


SELECT *
FROM (
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
     ) tmp
WHERE orders_count > 5;

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