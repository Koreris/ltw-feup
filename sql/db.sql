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
	nationality	TEXT NOT NULL,
	userType TEXT NOT NULL
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

INSERT INTO user VALUES (1, 'johndoe', '08506d2487e78caf8d27ef22cfe5e3d436160d5f','John Joe Doe','john@doe.com','Coimbra','American','reviewer');
INSERT INTO user VALUES (2, 'kujoJo', '08506d2487e78caf8d27ef22cfe5e3d436160d5f','Kujo Jotaro','yareyare@daze.jp','Sendai','Japanese','reviewer');
INSERT INTO user VALUES (3, 'sailor_beans', '08506d2487e78caf8d27ef22cfe5e3d436160d5f','Porki Beans','bunny@moon.pt','Porto','Portuguese','reviewer');
INSERT INTO user VALUES (4, 'jonathanp', '08506d2487e78caf8d27ef22cfe5e3d436160d5f','Jonathan Uggip','jonathan@gc.uk','London','British','reviewer');
INSERT INTO user VALUES (5, 'lisalisa', '08506d2487e78caf8d27ef22cfe5e3d436160d5f','Lisa de la Lisa','lll@karz.it','Venice','Italian','reviewer');
INSERT INTO user VALUES (6, 'admin', '08506d2487e78caf8d27ef22cfe5e3d436160d5f','Admin','Admin@karz.it','Venice','Italian','owner');

INSERT INTO restaurant VALUES(1, 'Casa do Ploy', 'Porto', 'Um restaurante familiar e económico.', 'Tradicional', '2');
INSERT INTO restaurant VALUES(2, 'St. Gentlemans', 'Sendai', 'As nossas sandes são feitas diariamente com os ingredientes mais frescos!', 'Padaria e Snack', '3');
INSERT INTO restaurant VALUES(3, 'Trattoria Trussardi', 'Lisboa', 'Comida para o corpo e alma', 'Italiano', '4');
INSERT INTO restaurant VALUES(4, 'Rengatei', 'Porto', 'O lugar ideal para juntar os amigos', 'Café', '1');
INSERT INTO restaurant VALUES(5, 'Dio and Danny', 'London', 'Servimos os melhores pratos, acabados de fazer.', 'Pub', '2');

INSERT INTO review VALUES(1, 1, 1, 'Gostei muito, recomendo.', '2016-04-02', 4, 2);
INSERT INTO review VALUES(2, 2, 2, 'Delicious katsu sandwiches! Lovely!', '2015-04-07', 5, 3);
INSERT INTO review VALUES(3, 3, 3, 'Um pouco caro, mas vale mesmo a pena!', '2013-09-03', 5, 5);
INSERT INTO review VALUES(4, 4, 4, 'Muito bem decorado e agradável, o café é de qualidade mas os empregados são antipáticos.', '2011-05-30', 3, 3);
INSERT INTO review VALUES(5, 5, 5, 'Fish and Chips muito bom, as entradas à Danny são irresistíveis', '2014-08-17', 4, 4);

INSERT INTO comment VALUES(2, 1, 1, '2016-04-12 12:20', "Posso perguntar o que comeu lá? Eu comi um frango assado e achei fraco...");
INSERT INTO comment VALUES(3, 2, 2, '2015-05-12 17:05', "Concordo! Mas esgotam num instante, é necessário chegar com antecedência.");
INSERT INTO comment VALUES(5, 3, 3, '2014-04-22 15:42', "Mesmo caro!");
INSERT INTO comment VALUES(4, 4, 4, '2012-06-21 13:51', "A sério? Os empregados aquando da minha visita foram muito prestáveis...");
INSERT INTO comment VALUES(1, 5, 5, '2015-02-03 19:09', "Se a senhora soubesse a proveniência dos ingredientes talvez não dissesse isso.");

INSERT INTO restaurantReviews VALUES(1, 1);
INSERT INTO restaurantReviews VALUES(2, 2);
INSERT INTO restaurantReviews VALUES(3, 3);
INSERT INTO restaurantReviews VALUES(4, 4);
INSERT INTO restaurantReviews VALUES(5, 5);

INSERT INTO userReviews VALUES(1, 1);
INSERT INTO userReviews VALUES(2, 2);
INSERT INTO userReviews VALUES(3, 3);
INSERT INTO userReviews VALUES(4, 4);
INSERT INTO userReviews VALUES(5, 5);
