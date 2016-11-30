PRAGMA foreign_keys=ON;

CREATE TABLE user
(
	user_id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username	TEXT NOT NULL UNIQUE,
	password	TEXT NOT NULL,
	name	TEXT NOT NULL,
	email	TEXT NOT NULL UNIQUE,
	location	TEXT,
	--register_date	DATETIME DEFAULT CURRENT_TIMESTAMP,
	nationality	TEXT NOT NULL
);

CREATE TABLE restaurant
(
	restaurant_id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name	TEXT NOT NULL,
	location	TEXT,
	description	TEXT,
	cuisine_type	TEXT,
	price_range INTEGER NOT NULL
);

CREATE TABLE review
(
	review_id			INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	restaurant_id		INTEGER NOT NULL,
	user_id				INTEGER NOT NULL,
	review_text			TEXT,
	review_date			DATETIME DEFAULT CURRENT_TIMESTAMP,
	rating 				INTEGER NOT NULL,
	price_range			INTEGER NOT NULL,
	FOREIGN KEY(user_id) REFERENCES user(user_id),
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(restaurant_id)
);

CREATE TABLE comment
(
	user_id INTEGER NOT NULL,
	comment_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	review_id	INTEGER NOT NULL,
	comment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	comment_text TEXT NOT NULL,
	FOREIGN KEY(user_id) REFERENCES user(user_id),
	FOREIGN KEY(review_id) REFERENCES review(review_id)
);

CREATE TABLE restaurantReviews
(
	restaurant_id INTEGER NOT NULL,
	review_id INTEGER NOT NULL,
	PRIMARY KEY(restaurant_id, review_id),
	FOREIGN KEY(restaurant_id) REFERENCES restaurant(restaurant_id),
	FOREIGN KEY(review_id) REFERENCES review(review_id)
);

CREATE TABLE userReviews
(
	user_id INTEGER NOT NULL,
	review_id INTEGER NOT NULL,
	PRIMARY KEY(user_id, review_id),
	FOREIGN KEY(user_id) REFERENCES user(user_id),
	FOREIGN KEY(review_id) REFERENCES review(review_id)
);