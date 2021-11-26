-- Authors
insert into authors (ID, Name, Avatar, Bio) values (1, 'Reynard', 'https://robohash.org/occaecatietvoluptatibus.png?size=50x50&set=set1', 'Fachhochschule des Mittelstandes (FHM)');
insert into authors (ID, Name, Avatar, Bio) values (2, 'Clemmy', 'https://robohash.org/numquamullamaut.png?size=50x50&set=set1', 'Goa University');
insert into authors (ID, Name, Avatar, Bio) values (3, 'Angie', 'https://robohash.org/velitetculpa.png?size=50x50&set=set1', 'Universidade de Caxias do Sul');
insert into authors (ID, Name, Avatar, Bio) values (4, 'Dominick', 'https://robohash.org/delenitinisidoloremque.png?size=50x50&set=set1', 'Mills College');
insert into authors (ID, Name, Avatar, Bio) values (5, 'Emelina', 'https://robohash.org/voluptatumdolorfugiat.png?size=50x50&set=set1', 'Nugaal University');

-- Posts
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (1, '2021-01-31', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/172x100.png/5fa2dd/ffffff', 725);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (2, '2021-10-17', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/205x100.png/dddddd/000000', 556);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (3, '2021-09-17', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/157x100.png/cc0000/ffffff', 913);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (4, '2021-07-27', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/249x100.png/ff4444/ffffff', 756);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (5, '2021-10-20', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/129x100.png/5fa2dd/ffffff', 797);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (6, '2021-04-13', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/121x100.png/dddddd/000000', 299);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (7, '2021-05-31', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/232x100.png/cc0000/ffffff', 83);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (8, '2021-10-29', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/230x100.png/cc0000/ffffff', 579);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (9, '2021-09-04', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/207x100.png/ff4444/ffffff', 643);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (10, '2021-04-12', 'jakis tytul fajny co', 'jakis content fajny co', 'jakis content skrocony co', 'http://dummyimage.com/143x100.png/5fa2dd/ffffff', 35);


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
