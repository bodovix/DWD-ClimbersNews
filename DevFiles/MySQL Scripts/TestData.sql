insert into user (userStatus,userRole,email,forename,surname, imageUrl,createdOn) 
		values ('active','author','BillWrights@ClimbersNews.com','Bill','Wrights','TODO: SORT IMAGES','2016-10-01');
DO SLEEP(0.1);
insert  into articleCategory  (category,createdOn) value('News','2016-10-01');
DO SLEEP(0.1);
insert into articleCategory  (category,createdOn) value('First Assent','2016-10-02');
DO SLEEP(0.1);
insert into articleCategory  (category,createdOn) value('Destinations','2016-10-03');
DO SLEEP(0.1);
insert into articleCategory  (category,createdOn) value('Education','2016-10-04');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News!!!','1','New site for all your Climbing News','Its the new climbing news website, aiming to bring climbign news to the uk','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2016-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,primaryMediaCaption,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,conclusionText,conclusionMediaUrl,conclusionMediaType,conclusionMediaCaption,statusCode,author,createdOn) 
		values(
/*headline*/        		'Obsession Fatale E8 6c by somebody'
/*category*/        		,'1'
/*description*/        		,'It was a verry bold climb'
/*primaryText*/       		,'The route had been on Annas to-do list for a year or so since she first heard of it. A fortuitous finger injury a couple of weeks ago brought the climb back into her thoughts. I could only really climb slabs, so it seemed like the perfect time to check it out, she explained. I still wasnt sure whether or not Id be able to climb it, but thankfully the holds on the hard section are monos and pebbles, so I could get away without using the bad finger at all.
On Annas first session, she climbed it cleanly while self-belaying after working out the moves. She commented: This made me think that I could probably go for the solo quite soon, but I had one more session on a top rope to get into the flow of the moves without having to pull rope up every few feet.
Describing the line, Anna told UKC: The bottom section is almost misleadingly easy up until some good footholds at three-quarter height. From there to the top is the crux section, which is really balancy and insecure. Its also pretty committing as if you step off the footholds you cant really go back and you definitely want to avoid coming off the last few moves!'
/*coverImage*/				,'uploads/articles/images/317081.jpg'
/*primaryMediaUrl*/			,'uploads/articles/images/317081.jpg'
/*primaryMediaType*/		,'image'
/*primaryMediaCaption*/		,'Anna on the teetery top moves of Obsession Fatale E8 6c.'
/*secondaryText*/			,'On the day, Anna had two attempts at the solo. On her first attempt, she reached the rest footholds and couldnt make herself commit to the crux section due to the injury potential. After getting rescued, I took about 40 minutes to clear my head and tried again, she explained. It was still pretty scary, but I knew as long as I kept my head together it was unlikely Id fall off, and I really didnt want to walk away having not tried.
Anna summed up:Im really happy to have got the route done, as it feels like a step forward from routes Ive done before, and its definitely got me psyched for the grit season!'
/*secondaryMediaUrl*/		,'uploads/articles/images/317080.jpg'
/*secondaryMediaType*/		,'image'
/*secondaryMediaCaption*/	,'Anna Taylor climbing Obsession Fatale E8 6c.'
/*conclusionText*/ 			,null
/*conclusionMediaUrl*/ 		,null
/*conclusionMediaType*/ 	,null
/*conclusionMediaCaption*/ 	,null
/*statusCode*/				,'active'
/*author*/					,'1'
/*createdOn*/				,'2017-09-01');



insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News3','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News4','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News5','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
 insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News6','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News6','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing New7','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News8','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News9','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News10','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News11','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News12','1','New site for all your Climbing News','Lorem ipet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2017-09-01');
    
    
    

DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values('New Stacks discovered on Northern Islands','2','Chossy Stack climbed in Shetland!','Lorem ipsus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/killika.jpg','uploads/articles/images/killika.jpg','image','active','1','2018-10-01');

DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values('New Guidebook for Outer Hebridies','3','New Guidebook Published Today','Lorem ipsum dolor. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/killika.jpg','uploads/articles/images/SMCbook.jpg','image','active','1','2018-10-01');

DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values('Visit Gogarth!','3','Impressive North Wales Sea Clifs','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/Gogarth.jpg','uploads/articles/videos/SampleVideo.mp4','video','active','1','2018-11-01');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values('Visit Tremadog','3','North Wales Finest Roadside Crag',' Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/Tremadog.jpg','uploads/articles/images/Tremadog.jpg','image','active','1','2018-11-01');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,primaryMediaCaption,statusCode,author,createdOn) 
		values('How To Tie Bowline','4','The Better way to tie in.','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. nascetur ridiculus mus. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer','uploads/articles/images/Bowline.jpg','uploads/articles/images/Bowline.jpg','image','The Best knot','active','1','2018-12-01');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values('Visit Kalymnos!','3','too much bolt clipping','Lorem ipsum dolor sit amet, consectetuer adipiscing e','uploads/articles/images/Gogarth.jpg','uploads/articles/images/Gogarth.jpg','image','active','1','2018-08-01');
DO SLEEP(0.1);
#=================

#=

