SELECT product_name, SUM ( product_cantity ) AS total 
FROM sells INNER JOIN products ON sells.product_id = products.product_id
GROUP BY product_name 
ORDER BY total DESC 
LIMIT 1;