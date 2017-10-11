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
         LEFT JOIN employees ON offices.officeCode = employees.officeCode
       GROUP BY offices.officeCode
       ORDER BY e_id DESC
     ) AS tmp
WHERE e_id > 4;
-- select offices.*, count(employees.employeeNumber) as e_id from offices,  employees where offices.officeCode=employees.officeCode and e_id>4 group by offices.officeCode order by e_id desc;

SELECT *
FROM
  (
    SELECT
      orders.*,
      count(orderdetails.productCode) product_count
    FROM orders
      LEFT JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
    GROUP BY orders.orderNumber
  ) AS tmp
WHERE product_count > 10;

SELECT
  employees.*,
  count(customers.customerNumber)
FROM employees
  LEFT JOIN customers ON employees.employeeNumber = customers.salesRepEmployeeNumber
GROUP BY employees.employeeNumber;

SELECT
  offices.*,
  count(orders.orderNumber)
FROM offices
  LEFT JOIN employees ON offices.officeCode = employees.officeCode
  LEFT JOIN customers ON employees.employeeNumber = customers.salesRepEmployeeNumber
  LEFT JOIN orders ON customers.customerNumber = orders.orderNumber
GROUP BY offices.officeCode;

# SELECT
#   offices.*,
#   count(orders.orderNumber)
# FROM offices, employees, customers, orders
# WHERE
#   offices.officeCode = employees.officeCode
#   AND employees.employeeNumber = customers.salesRepEmployeeNumber
#   AND customers.customerNumber = orders.orderNumber
# GROUP BY offices.officeCode;
