-- Authors
insert into authors (ID, Name, Avatar, Bio) values (1, 'Sebastian', 'pan_sebastian.png', 'Trol Intermedia');
insert into authors (ID, Name, Avatar, Bio) values (2, 'Marcin', 'pan_marcin.png', 'Trol Intermedia');
insert into authors (ID, Name, Avatar, Bio) values (3, 'Maciej', 'pan_maciej.png', 'SzkolaNaLesnej');
insert into authors (ID, Name, Avatar, Bio) values (4, 'Jakub', 'pan_jakub.png', 'SzkolaNaLesnej');
insert into authors (ID, Name, Avatar, Bio) values (5, 'Krystyna', 'pani_krystyna.png', 'SzkolaNaLesnej');

-- Posts
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (1, '2021-01-31', 'Uprawa Roslin', 'super fajny tekst typu takiego no', 'super fajny', 'uprawa_roslin.jpg', 725);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (2, '2021-10-17', 'Niewolnictwo', 'no generalnie to takie cos', 'no generalnie', 'niewolnictwo.jpg', 556);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (3, '2021-09-17', 'Lightshot', 'polecam program lightshot pan sikora tak mowil', 'polecam program', 'lightshot.jpg', 913);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (4, '2021-07-27', 'Protesty Ucznowskie na Placu Tiananmen', 'nigdy nie było takiej sytuacji', 'nigdy nie było', 'cn.png', 756);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (5, '2021-10-20', 'Kochamy Komunistyczna Partie Chin', '看眼無興且會樂構資原單關立的那乎系的各道流發候濟次', 'chinski tekst CCP', 'Xi_Jinping_2019.jpg', 797);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (6, '2021-04-13', 'Jacek Kowal', 'wysadzil nam repozytorium nie fajna sprawa z jego strony', 'wysadzil nam repozytorium', 'amongus.jpg', 299);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (7, '2021-05-31', 'Trol Intermedia', 'Trol Intermedia recenzja: super firma polecam cieplutko', 'Trol intermedia recenzja', 'TrolIntermedia.jpg', 83);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (8, '2021-10-29', 'Etap 0. Staż', 'no generalnie fajne', 'generalnie', 'staz.jpg', 579);
insert into posts (id, date, title, content, content_shortened, background, viewcount) values (9, '2021-09-04', 'Serwer Ubuntu', 'wpierw należy wpisać apt update apt upgrade', 'wpierw nalezy', 'ubuntu.jpg', 643);
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