CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT,
    userid VARCHAR(50) NOT NULL,
    password VARCHAR(200) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NULL,
    phone_number VARCHAR(15) NULL,
    role VARCHAR(50) NOT NULL,
    created_by VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_by VARCHAR(50) NULL,
    updated_at DATETIME NULL,
	PRIMARY KEY (id),
    UNIQUE (userid)
);

CREATE TABLE IF NOT EXISTS brands (
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    `description` VARCHAR(100) NOT NULL,
    created_by VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_by VARCHAR(50) NULL,
    updated_at DATETIME NULL,
	PRIMARY KEY (id),
    UNIQUE (name)
);

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT,
    brand_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    `description` VARCHAR(100) NOT NULL,
    cc DECIMAL(8,2) NOT NULL,
    fuel_type VARCHAR(100) NULL,
    total_seat INT NULL,
    status VARCHAR(20) NOT NULL,
    price DECIMAL(18,3) NOT NULL,
    created_by VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_by VARCHAR(50) NULL,
    updated_at DATETIME NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (brand_id) REFERENCES brands(id)
);

CREATE TABLE IF NOT EXISTS item_photos (
    id INT AUTO_INCREMENT,
    item_id INT NOT NULL,
    name VARCHAR(500) NOT NULL,
    created_by VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
	PRIMARY KEY (id),
    UNIQUE (item_id, name),
	FOREIGN KEY (item_id) REFERENCES items(id)
);

CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT,
    userid VARCHAR(50) NOT NULL,
    item_id INT NOT NULL,
    date DATETIME NOT NULL,
    price DECIMAL(18,3) NOT NULL,
    payment_method VARCHAR(10) NOT NULL,
    status VARCHAR(20) NOT NULL,
    receipt_of_payment VARCHAR(50) NULL,
    created_by VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_by VARCHAR(50) NULL,
    updated_at DATETIME NULL,
	PRIMARY KEY (id),
    UNIQUE (userid, item_id),
	FOREIGN KEY (item_id) REFERENCES items(id)
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT,
    item_id INT NOT NULL,
    comment VARCHAR(1000) NOT NULL,
    rating_service INT NOT NULL,
    rating_quality INT NOT NULL,
    rating_website_experience INT NOT NULL,
    created_by VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_by VARCHAR(50) NULL,
    updated_at DATETIME NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (item_id) REFERENCES items(id)
);

CREATE TABLE IF NOT EXISTS carts (
    id INT AUTO_INCREMENT,
    userid VARCHAR(50) NOT NULL,
    item_id INT NOT NULL,
    created_by VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (userid) REFERENCES users(userid),
	FOREIGN KEY (item_id) REFERENCES items(id)
);