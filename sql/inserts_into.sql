INSERT INTO "User" VALUES(1,'johndoe','passw','John Joe Doe','john@doe.com','Coimbra','American');
INSERT INTO "User" VALUES(2,'kujoJo','starpurachina','Kujo Jotaro','yareyare@daze.jp','Sendai','Japanese');
INSERT INTO "User" VALUES(3,'sailor_beans','bunnies','Porki Beans','bunny@moon.pt','Porto','Portuguese');
INSERT INTO "User" VALUES(4,'jonathanp','dannies7','Jonathan Uggip','jonathan@gc.uk','London','British');
INSERT INTO "User" VALUES(5,'lisalisa','hammu4wammu','Lisa de la Lisa','lll@karz.it','Venice','Italian');

INSERT INTO "Restaurant" VALUES(1, 'Casa do Ploy', 'Porto', 'Um restaurante familiar e económico.', 'Tradicional','2');
INSERT INTO "Restaurant" VALUES(2, 'St. Gentlemans', 'Sendai', 'As nossas sandes são feitas diariamente com os ingredientes mais frescos!', 'Padaria e Snack','3');
INSERT INTO "Restaurant" VALUES(3, 'Trattoria Trussardi', 'Lisboa', 'Comida para o corpo e alma', 'Italiano','4');
INSERT INTO "Restaurant" VALUES(4, 'Rengatei', 'Porto', 'O lugar ideal para juntar os amigos', 'Café','1');
INSERT INTO "Restaurant" VALUES(5, 'Dio and Danny', 'London', 'Servimos os melhores pratos, acabados de fazer.', 'Pub','2' ,'3');

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