-- Authors
insert into authors (ID, Name, Avatar, Bio) values (1, 'Reynard', 'https://robohash.org/occaecatietvoluptatibus.png?size=50x50&set=set1', 'Fachhochschule des Mittelstandes (FHM)');
insert into authors (ID, Name, Avatar, Bio) values (2, 'Clemmy', 'https://robohash.org/numquamullamaut.png?size=50x50&set=set1', 'Goa University');
insert into authors (ID, Name, Avatar, Bio) values (3, 'Angie', 'https://robohash.org/velitetculpa.png?size=50x50&set=set1', 'Universidade de Caxias do Sul');
insert into authors (ID, Name, Avatar, Bio) values (4, 'Dominick', 'https://robohash.org/delenitinisidoloremque.png?size=50x50&set=set1', 'Mills College');
insert into authors (ID, Name, Avatar, Bio) values (5, 'Emelina', 'https://robohash.org/voluptatumdolorfugiat.png?size=50x50&set=set1', 'Nugaal University');

-- Posts
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (1, '2021-2-24', 'random content', 'User-centric didactic open system', 398);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (2, '2021-1-6', 'random conent', 'Upgradable even-keeled interface', 808);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (3, '2020-12-4', 'random conent', 'Multi-channelled mobile info-mediaries', 508);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (4, '2021-5-7', 'random conent', 'Exclusive high-level forecast',723);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (5, '2021-11-18', 'random conent', 'User-centric methodical knowledge user', 399);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (6, '2021-6-22', 'random conent', 'Switchable impactful database', 667);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (7, '2021-4-19', 'random conent', 'Sharable upward-trending structure', 498);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (8, '2021-10-6', 'random conent', 'Right-sized human-resource ability', 513);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (9, '2021-5-15', 'random conent', 'Customizable secondary intranet', 855);
insert into posts (ID, Date, Content, Content_shortened, Viewcount) values (10, '2021-6-4', 'random conent', 'Object-based encompassing knowledge user', 272);

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
