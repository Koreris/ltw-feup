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
	review_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	restaurant_id	INTEGER NOT NULL,
	user_id INTEGER NOT NULL,
	review_text	TEXT,
	review_date INTEGER,
	rating INTEGER NOT NULL,
	price_range INTEGER NOT NULL,
	FOREIGN KEY(user_id) REFERENCES User(user_id),
	FOREIGN KEY(restaurant_id) REFERENCES Restaurant(restaurant_id)
);

CREATE TABLE "Comment"
(
	user_id INTEGER NOT NULL,
	comment_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
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

INSERT INTO "User" VALUES(1,'johndoe','08506d2487e78caf8d27ef22cfe5e3d436160d5f','John Joe Doe','john@doe.com','Coimbra','American');
INSERT INTO "User" VALUES(2,'kujoJo','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Kujo Jotaro','yareyare@daze.jp','Sendai','Japanese');
INSERT INTO "User" VALUES(3,'sailor_beans','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Porki Beans','bunny@moon.pt','Porto','Portuguese');
INSERT INTO "User" VALUES(4,'jonathanp','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Jonathan Uggip','jonathan@gc.uk','London','British');
INSERT INTO "User" VALUES(5,'lisalisa','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Lisa de la Lisa','lll@karz.it','Venice','Italian');

INSERT INTO "Restaurant" VALUES(1, 'Casa do Ploy', 'Porto', 'Um restaurante familiar e económico.', 'Tradicional','2');
INSERT INTO "Restaurant" VALUES(2, 'St. Gentlemans', 'Sendai', 'As nossas sandes são feitas diariamente com os ingredientes mais frescos!', 'Padaria e Snack','3');
INSERT INTO "Restaurant" VALUES(3, 'Trattoria Trussardi', 'Lisboa', 'Comida para o corpo e alma', 'Italiano','4');
INSERT INTO "Restaurant" VALUES(4, 'Rengatei', 'Porto', 'O lugar ideal para juntar os amigos', 'Café','1');
INSERT INTO "Restaurant" VALUES(5, 'Dio and Danny', 'London', 'Servimos os melhores pratos, acabados de fazer.', 'Pub', '3');

INSERT INTO "Review" VALUES(1, 1, 1, 'Gostei muito, recomendo.', 20160402, 4, 2);
INSERT INTO "Review" VALUES(2, 2, 2, 'Delicious katsu sandwiches! Lovely!', 20150407, 5, 3);
INSERT INTO "Review" VALUES(3, 3, 3, 'Um pouco caro, mas vale mesmo a pena!', 20130903, 5, 5);
INSERT INTO "Review" VALUES(4, 4, 4, 'Muito bem decorado e agradável, o café é de qualidade mas os empregados são antipáticos.', 20110530, 3, 3);
INSERT INTO "Review" VALUES(5, 5, 5, 'Fish and Chips muito bom, as entradas à Danny são irresistíveis', 20140817, 4, 4);

INSERT INTO "Comment" VALUES(2, 1, 1, 20160412, "Posso perguntar o que comeu lá? Eu comi um frango assado e achei fraco...");
INSERT INTO "Comment" VALUES(3, 2, 2, 20150512, "Concordo! Mas esgotam num instante, é necessário chegar com antecedência.");
INSERT INTO "Comment" VALUES(5, 3, 3, 20140422, "Mesmo caro!");
INSERT INTO "Comment" VALUES(4, 4, 4, 20120621, "A sério? Os empregados aquando da minha visita foram muito prestáveis...");
INSERT INTO "Comment" VALUES(1, 5, 5, 20150203, "Se a senhora soubesse a proveniência dos ingredientes talvez não dissesse isso.");

INSERT INTO "RestaurantReviews" VALUES(1,1);
INSERT INTO "RestaurantReviews" VALUES(2,2);
INSERT INTO "RestaurantReviews" VALUES(3,3);
INSERT INTO "RestaurantReviews" VALUES(4,4);
INSERT INTO "RestaurantReviews" VALUES(5,5);

INSERT INTO "UserReviews" VALUES(1,1);
INSERT INTO "UserReviews" VALUES(2,2);
INSERT INTO "UserReviews" VALUES(3,3);
INSERT INTO "UserReviews" VALUES(4,4);
INSERT INTO "UserReviews" VALUES(5,5);