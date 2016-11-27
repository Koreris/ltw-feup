PRAGMA foreign_keys=OFF;

CREATE TABLE "User" 
(
	user_id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username	TEXT NOT NULL UNIQUE,
	password	TEXT NOT NULL,
	name	TEXT NOT NULL,
	email	TEXT NOT NULL UNIQUE,
	location	TEXT,
	nationality	TEXT NOT NULL
);

CREATE TABLE "Restaurant"
(
	restaurant_id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name	TEXT NOT NULL,
	location	TEXT,
	description	TEXT,
	cuisine_type	TEXT,
	price_range INTEGER NOT NULL
);

CREATE TABLE "Review"
(
	review_id INTEGER PRIMARY KEY NOT NULL AUTOINCREMENT,
	restaurant_id	INTEGER NOT NULL,
	user_id INTEGER NOT NULL
	review_text	TEXT,
	review_date INTEGER,
	rating INTEGER NOT NULL,
	price_range INTEGER NOT NULL,
	FOREIGN KEY(user_id) REFERENCES User(user_id),
	FOREIGN KEY(restaurant_id) REFERENCES Restaurant(restaurant_id)
);

CREATE TABLE "Comment"
(
	user_id INTEGER NOT NULL
	comment_id INTEGER PRIMARY KEY NOT NULL AUTOINCREMENT,
	review_id	INTEGER NOT NULL,
	comment_date INTEGER,
	comment_text TEXT NOT NULL,
	FOREIGN KEY(user_id) REFERENCES User(user_id),
	FOREIGN KEY(review_id) REFERENCES Review(review_id)
);

CREATE TABLE "RestaurantReviews"
(
	restaurant_id INTEGER NOT NULL,
	review_id INTEGER NOT NULL,
	PRIMARY KEY(restaurant_id, review_id),
	FOREIGN KEY(restaurant_id) REFERENCES Restaurant(restaurant_id),
	FOREIGN KEY(review_id) REFERENCES Review(review_id)
);

CREATE TABLE "UserReviews"
(
	user_id INTEGER NOT NULL,
	review_id INTEGER NOT NULL,
	PRIMARY KEY(user_id, review_id),
	FOREIGN KEY(user_id) REFERENCES User(user_id),
	FOREIGN KEY(review_id) REFERENCES Review(review_id)
);