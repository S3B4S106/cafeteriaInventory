CREATE TABLE products (
  product_id SERIAL PRIMARY KEY,
  product_name varchar(30) NOT NULL,
  reference varchar(10) NOT NULL,
  price int NOT NULL,
  weigth int NOT NULL,
  category varchar(20) NOT NULL,
  stock int NOT NULL,
  creation_date date NOT NULL DEFAULT current_timestamp
);

INSERT INTO products (product_name,reference, price, weigth, category, stock, creation_date) VALUES
( 'Churro', 'CH', 2500, 250, 'Comidas', 25, '2023-09-11'),
( 'Capuchino', 'CPH', 500, 50, 'Bebidas', 12, '2023-09-11'),
( 'Pastel de pollo', 'PP', 1500, 500, 'Comidas', 14, '2023-09-11');


CREATE TABLE sells (
  sell_id SERIAL PRIMARY KEY,
  product_id int NOT NULL,
  product_cantity int NOT NULL
);

ALTER TABLE sells
 ADD CONSTRAINT FK_sell_product_id
  foreign key (product_id)
  references products(product_id);
  
INSERT INTO sells ( product_id, product_cantity) VALUES
( 1, 14),
( 2, 7),
( 3, 20),
( 1, 7);

