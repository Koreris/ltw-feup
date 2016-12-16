PRAGMA foreign_keys=ON;

CREATE TABLE user
(
	user_id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username	TEXT NOT NULL UNIQUE,
	is_owner BOOLEAN,
	is_reviewer BOOLEAN,
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
	opening_time TIME,
	closing_time TIME,
	price_range INTEGER NOT NULL,
	owner_id INTEGER NOT NULL,
	url_path TEXT
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
	comment_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	user_id INTEGER NOT NULL,
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


-- PASS FOR EACH USER IS: passw

INSERT INTO user VALUES (NULL, 'johndoe', '0', '1', '$2y$12$3wAHhwUSDCMvndixhRA16ukhuarA5Ly93vWjQRyY2VqXq6j19lawi', 'John Joe Doe','john@doe.com','Coimbra','American');
INSERT INTO user VALUES (NULL, 'kujoJo', '0', '1', '$2y$12$3wAHhwUSDCMvndixhRA16ukhuarA5Ly93vWjQRyY2VqXq6j19lawi','Kujo Jotaro','yareyare@daze.jp','Sendai','Japanese');
INSERT INTO user VALUES (NULL, 'sailor_beans', '0', '1', '$2y$12$3wAHhwUSDCMvndixhRA16ukhuarA5Ly93vWjQRyY2VqXq6j19lawi','Porki Beans','bunny@moon.pt','Porto','Portuguese');
INSERT INTO user VALUES (NULL, 'jonathanp', '0', '1', '$2y$12$3wAHhwUSDCMvndixhRA16ukhuarA5Ly93vWjQRyY2VqXq6j19lawi','Jonathan Uggip','jonathan@gc.uk','London','British');
INSERT INTO user VALUES (NULL, 'lisalisa', '0', '1', '$2y$12$3wAHhwUSDCMvndixhRA16ukhuarA5Ly93vWjQRyY2VqXq6j19lawi','Lisa de la Lisa','lll@karz.it','Venice','Italian');
INSERT INTO user VALUES (NULL, 'admin', '1', '0', '$2y$12$3wAHhwUSDCMvndixhRA16ukhuarA5Ly93vWjQRyY2VqXq6j19lawi','Admin','Admin@karz.it','Venice','Italian');

INSERT INTO restaurant VALUES(NULL, 'Casa do Ploy', 'Porto', 'Um restaurante familiar e económico.', 'Tradicional', '09:20', '20:20', '2', '6','http://www.buscorestaurantes.com/files/images/Restaurante-Santo-Domingo-II-13020.jpg');
INSERT INTO restaurant VALUES(NULL, 'St. Gentlemans', 'Sendai', 'As nossas sandes são feitas diariamente com os ingredientes mais frescos!', 'Padaria e Snack', '09:20', '20:20', '3', '6','http://essemundoenosso.com.br/wp-content/uploads/2016/09/onde-comer-santo-domingo-jalao-4.jpg');
INSERT INTO restaurant VALUES(NULL, 'Trattoria Trussardi', 'Lisboa', 'Comida para o corpo e alma', 'Italiano', '09:20', '20:20', '4', '6','http://us.santo-domingo-live.com/upload/briciola-santo-domingo-02.jpg');
INSERT INTO restaurant VALUES(NULL, 'Rengatei', 'Porto', 'O lugar ideal para juntar os amigos', 'Café', '09:20', '20:20', '1', '6','https://s-media-cache-ak0.pinimg.com/originals/56/29/d5/5629d529bbaf9894b047b0bf031b03bd.jpg');
INSERT INTO restaurant VALUES(NULL, 'Dio and Danny', 'London', 'Servimos os melhores pratos, acabados de fazer.', 'Pub', '09:20', '20:20', '2', '6','https://bocao.com.do/uploads/img18-12-2014-1522146897.jpg');

INSERT INTO review VALUES(NULL, 1, 1, 'Gostei muito, recomendo.', '2016-04-02', 4, 2);
INSERT INTO review VALUES(NULL, 2, 2, 'Delicious katsu sandwiches! Lovely!', '2015-04-07', 5, 3);
INSERT INTO review VALUES(NULL, 3, 3, 'Um pouco caro, mas vale mesmo a pena!', '2013-09-03', 5, 5);
INSERT INTO review VALUES(NULL, 4, 4, 'Muito bem decorado e agradável, o café é de qualidade mas os empregados são antipáticos.', '2011-05-30', 3, 3);
INSERT INTO review VALUES(NULL, 5, 5, 'Fish and Chips muito bom, as entradas à Danny são irresistíveis', '2014-08-17', 4, 4);

INSERT INTO comment VALUES(NULL, 2, 1, '2016-04-12 12:20', "Posso perguntar o que comeu lá? Eu comi um frango assado e achei fraco...");
INSERT INTO comment VALUES(NULL, 3, 2, '2015-05-12 17:05', "Concordo! Mas esgotam num instante, é necessário chegar com antecedência.");
INSERT INTO comment VALUES(NULL, 5, 3, '2014-04-22 15:42', "Mesmo caro!");
INSERT INTO comment VALUES(NULL, 4, 4, '2012-06-21 13:51', "A sério? Os empregados aquando da minha visita foram muito prestáveis...");
INSERT INTO comment VALUES(NULL, 1, 5, '2015-02-03 19:09', "Se a senhora soubesse a proveniência dos ingredientes talvez não dissesse isso.");

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
