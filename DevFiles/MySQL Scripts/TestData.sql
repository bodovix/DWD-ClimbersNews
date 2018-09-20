insert into user (userStatus,userRole,email,forename,surname, imageUrl) 
		values ('active','author','BillWrights@ClimbersNews.com','Bill','Wrights','TODO: SORT IMAGES');
DO SLEEP(0.1);
insert  into articleCategory  (category) value('News');
DO SLEEP(0.1);
insert into articleCategory  (category) value('First Assent');
DO SLEEP(0.1);
insert into articleCategory  (category) value('Destinations');
DO SLEEP(0.1);
insert into articleCategory  (category) value('Education');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,primaryMediaUrl,statusCode,author) 
		values('Welcome To Climbing News!!!','1','New site for all your Climbing News','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cum sociis natoquesem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','active','1');

DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,primaryMediaUrl,statusCode,author) 
		values('New Stacks discovered on Northern Islands','2','Chossy Stack climbed in Shetland!','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa. vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/killika.jpg','active','1');

DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,primaryMediaUrl,statusCode,author) 
		values('New Guidebook for Outer Hebridies','3','New Guidebook Published Today','Lorem ipsum dolor. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/SMCbook.jpg','active','1');

DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,primaryMediaUrl,statusCode,author) 
		values('Visit Gogarth!','3','Impressive North Wales Sea Clifs','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mass quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/Gogarth.jpg','active','1');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,primaryMediaUrl,statusCode,author) 
		values('Visit Tremadog','3','North Wales Finest Roadside Crag',' Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/Tremadog.jpg','active','1');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,primaryMediaUrl,statusCode,author) 
		values('How To Tie Bowline','4','The Better way to tie in.','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. nascetur ridiculus mus. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/Bowline.jpg','active','1');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,primaryMediaUrl,statusCode,author) 
		values('Visit Kalymnos!','3','too much bolt clipping','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mass quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/Gogarth.jpg','active','1');
DO SLEEP(0.1);
#=================


