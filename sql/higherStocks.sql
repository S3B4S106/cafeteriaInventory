SELECT category as Categoria, product_name as Producto, stock as Stock 
FROM products
WHERE stock = (SELECT MAX(stock) as Stock FROM products);