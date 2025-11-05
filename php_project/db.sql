-- the database that we will use
USE Ahmet200575280;

 -- product table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- admin table

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO admins (name, email, password) VALUES
('TestAdmin', 'test@musclefuel.com', '$2y$10$KIXh6e7/CNhhTvGdVQPlOu2DQvE6y50g.9YksjFg6CwVf3QmMSk1a'); -- this is the default password: 1234

--  it will be only 3 product
INSERT INTO products (name, description, price, image) VALUES
('Creatine', 'Creatine powder 300g', 29.99, 'creatine.png'),
('Gainer', 'Protein gainer 1kg', 49.99, 'gainer.png'),
('Vanilla Whey', 'Vanilla flavored whey protein', 39.99, 'vanilla.png');