-- Authors
insert into authors (ID, Name, Avatar, Bio) values (1, 'Reynard', 'https://robohash.org/occaecatietvoluptatibus.png?size=50x50&set=set1', 'Fachhochschule des Mittelstandes (FHM)');
insert into authors (ID, Name, Avatar, Bio) values (2, 'Clemmy', 'https://robohash.org/numquamullamaut.png?size=50x50&set=set1', 'Goa University');
insert into authors (ID, Name, Avatar, Bio) values (3, 'Angie', 'https://robohash.org/velitetculpa.png?size=50x50&set=set1', 'Universidade de Caxias do Sul');
insert into authors (ID, Name, Avatar, Bio) values (4, 'Dominick', 'https://robohash.org/delenitinisidoloremque.png?size=50x50&set=set1', 'Mills College');
insert into authors (ID, Name, Avatar, Bio) values (5, 'Emelina', 'https://robohash.org/voluptatumdolorfugiat.png?size=50x50&set=set1', 'Nugaal University');

-- Posts
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (1, '2021-01-31', 'uprawa roślin', 'super fajny tekst typu takiego no', 'super fajny', 'uprawa roślin.jpg', 725);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (2, '2021-10-17', 'niewolnictwo', 'no generalnie to takie cos', 'no generalnie', 'niewolnictwo.jpg', 556);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (3, '2021-09-17', 'lightshot', 'polecam program lightshot pan sikora tak mowil', 'polecam program', 'lightshot.jpg', 913);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (4, '2021-07-27', 'protesty ucznowskie na placu tiananmen', 'nigdy nie było takiej sytuacji', 'nigdy nie było', 'can.png', 756);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (5, '2021-10-20', 'kochamy komunistyczną partię chin', '看眼無興且會樂構資原單關立的那乎系的各道流發候濟次', 'chiński tekst CCP', 'Xi_Jinping_2019.jpg', 797);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (6, '2021-04-13', 'jacek kowal', 'wysadził nam repozytorium nie fajna sprawa z jego strony', 'wysadził nam repozytorium', 'amongus.jpg', 299);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (7, '2021-05-31', 'Trol Intermedia', 'Trol Intermedia recenzja: super firma polecam cieplutko', 'Trol intermedia recenzja', 'trolnetermedia.jpg', 83);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (8, '2021-10-29', 'Etap 0. Staż', 'no generalnie fajne', 'generalnie', 'staż.jpg', 579);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (9, '2021-09-04', 'Serwer Ubuntu', 'wpierw należy wpisać apt update apt upgrade', 'wpierw należy', 'ubuntu.jpg', 643);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (10, '2021-04-12', 'Pasja Informatyki', 'Wchodzimy na strone dobrakadra.pl', 'Wchodzimy na strone', 'pasjainformatyki.jpg', 35);


-- categories
insert into categories (ID, Name) values (1, 'CEFEPIME HYDROCHLORIDE');
insert into categories (ID, Name) values (2, 'amlodipine besylate and benazepril hydrochloride');
insert into categories (ID, Name) values (3, 'Levothyroxine Sodium');
insert into categories (ID, Name) values (4, 'CHLOROXYLENOL');
insert into categories (ID, Name) values (5, 'metoprolol tartrate');

-- AuthorsToPosts
insert into _authorstoposts (Authors, Posts) values (2, 1);
insert into _authorstoposts (Authors, Posts) values (5, 2);
insert into _authorstoposts (Authors, Posts) values (3, 3);
insert into _authorstoposts (Authors, Posts) values (5, 4);
insert into _authorstoposts (Authors, Posts) values (2, 5);
insert into _authorstoposts (Authors, Posts) values (1, 6);
insert into _authorstoposts (Authors, Posts) values (1, 7);
insert into _authorstoposts (Authors, Posts) values (5, 8);
insert into _authorstoposts (Authors, Posts) values (4, 9);
insert into _authorstoposts (Authors, Posts) values (2, 10);

-- CategoriesToPosts
insert into _categoriestoposts (Categories, Posts) values (5, 1);
insert into _categoriestoposts (Categories, Posts) values (2, 2);
insert into _categoriestoposts (Categories, Posts) values (5, 3);
insert into _categoriestoposts (Categories, Posts) values (4, 4);
insert into _categoriestoposts (Categories, Posts) values (4, 5);
insert into _categoriestoposts (Categories, Posts) values (1, 6);
insert into _categoriestoposts (Categories, Posts) values (2, 7);
insert into _categoriestoposts (Categories, Posts) values (3, 8);
insert into _categoriestoposts (Categories, Posts) values (2, 9);
insert into _categoriestoposts (Categories, Posts) values (3, 10);
 --Credentials
insert into Credentials (Email, Password) values ('trolintermeda@trol.pl', 'tajnehaslo');
insert into Credentials (Email, Password) values ('pasjainformatki@trol.pl', 'tajnieszehaslo');
insert into Credentials (Email, Password) values ('twojamama@trol.pl', 'najtajnieszehaslo');