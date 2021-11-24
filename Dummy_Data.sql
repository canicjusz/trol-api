-- Authors
insert into Authors (ID, Name, Avatar, Bio) values (1, 'Reynard', 'https://robohash.org/occaecatietvoluptatibus.png?size=50x50&set=set1', 'Fachhochschule des Mittelstandes (FHM)');
insert into Authors (ID, Name, Avatar, Bio) values (2, 'Clemmy', 'https://robohash.org/numquamullamaut.png?size=50x50&set=set1', 'Goa University');
insert into Authors (ID, Name, Avatar, Bio) values (3, 'Angie', 'https://robohash.org/velitetculpa.png?size=50x50&set=set1', 'Universidade de Caxias do Sul');
insert into Authors (ID, Name, Avatar, Bio) values (4, 'Dominick', 'https://robohash.org/delenitinisidoloremque.png?size=50x50&set=set1', 'Mills College');
insert into Authors (ID, Name, Avatar, Bio) values (5, 'Emelina', 'https://robohash.org/voluptatumdolorfugiat.png?size=50x50&set=set1', 'Nugaal University');

-- Posts
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (1, '2/24/2021', '', 'User-centric didactic open system', 5, 398);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (2, '1/6/2021', 'random conent', 'Upgradable even-keeled interface', 3, 808);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (3, '12/4/2020', 'random conent', 'Multi-channelled mobile info-mediaries', 2, 508);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (4, '5/7/2021', 'random conent', 'Exclusive high-level forecast', 5, 723);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (5, '11/18/2021', 'random conent', 'User-centric methodical knowledge user', 2, 399);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (6, '6/22/2021', 'random conent', 'Switchable impactful database', 4, 667);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (7, '4/19/2021', 'random conent', 'Sharable upward-trending structure', 4, 498);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (8, '10/6/2021', 'random conent', 'Right-sized human-resource ability', 5, 513);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (9, '5/15/2021', 'random conent', 'Customizable secondary intranet', 5, 855);
insert into posts (ID, Date, Content, Content_shortened, CategoryID, Viewcount) values (10, '6/4/2021', 'random conent', 'Object-based encompassing knowledge user', 5, 272);
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

-- categories
insert into categories (ID, Name) values (1, 'CEFEPIME HYDROCHLORIDE');
insert into categories (ID, Name) values (2, 'amlodipine besylate and benazepril hydrochloride');
insert into categories (ID, Name) values (3, 'Levothyroxine Sodium');
insert into categories (ID, Name) values (4, 'CHLOROXYLENOL');
insert into categories (ID, Name) values (5, 'metoprolol tartrate');

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
