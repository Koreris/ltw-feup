BEGIN TRANSACTION;
CREATE TABLE user
(
	user_id	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username	TEXT NOT NULL UNIQUE,
	password	TEXT NOT NULL,
	name	TEXT NOT NULL,
	email	TEXT NOT NULL UNIQUE,
	location	TEXT,
	nationality	TEXT NOT NULL
);
INSERT INTO `user` VALUES (1,'johndoe','08506d2487e78caf8d27ef22cfe5e3d436160d5f','John Joe Doe','john@doe.com','Coimbra','American');
INSERT INTO `user` VALUES (2,'kujoJo','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Kujo Jotaro','yareyare@daze.jp','Sendai','Japanese');
INSERT INTO `user` VALUES (3,'sailor_beans','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Porki Beans','bunny@moon.pt','Porto','Portuguese');
INSERT INTO `user` VALUES (4,'jonathanp','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Jonathan Uggip','jonathan@gc.uk','London','British');
INSERT INTO `user` VALUES (5,'lisalisa','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Lisa de la Lisa','lll@karz.it','Venice','Italian');
INSERT INTO `user` VALUES (6,'faby','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Fabiola Silva','ffabiolasilva@gmail.com','Porto','Portugal');
INSERT INTO `user` VALUES (7,'laika','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Laika','laika@hotmail.com','Porto','Portugal');
INSERT INTO `user` VALUES (8,'paulo','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Paulo','f@gmail.com','Porto','Portugal');
INSERT INTO `user` VALUES (9,'caro','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Carolina','caro@gmail.com','Porto','Portugal');
INSERT INTO `user` VALUES (10,'lara','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Lara','lara@gmail.com','Porto','Portugal');
INSERT INTO `user` VALUES (11,'petra','08506d2487e78caf8d27ef22cfe5e3d436160d5f','Petra','petra@gmail.com','Porto','Portugal');
COMMIT;
