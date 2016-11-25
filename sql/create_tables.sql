PRAGMA foreign_keys=OFF;

CREATE TABLE "Users" 
(
	user_id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username	TEXT NOT NULL UNIQUE,
	password	TEXT NOT NULL,
	name	TEXT NOT NULL,
	email	TEXT NOT NULL UNIQUE,
	location	TEXT,
	nationality	TEXT NOT NULL
);

CREATE TABLE "Restaurants"
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
	rating INTEGER NOT NULL,
	price_range INTEGER NOT NULL,
	FOREIGN KEY(user_id) REFERENCES Users(user_id),
	FOREIGN KEY(restaurant_id) REFERENCES Restaurants(restaurant_id)
);