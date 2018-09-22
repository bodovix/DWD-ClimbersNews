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
insert into articleCategory  (category,createdOn) value('Events','2016-10-04');
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values('Welcome To Climbing News!!!','1','New site for all your Climbing News','Its the new climbing news website, aiming to bring climbign news to the uk','uploads/articles/images/welcome.jpg','uploads/articles/images/welcome.jpg','none','Secondary meda sound text, isnt it amazin','uploads/articles/audio/SoundTest.wav','audio','Its a sound Test','active','1','2016-09-01');

insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,primaryMediaCaption,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,conclusionText,conclusionMediaUrl,conclusionMediaType,conclusionMediaCaption,statusCode,author,createdOn) 
		values(
/*headline*/        		'IFSC World Combined Championships Innsbruck: Report'
/*category*/        		,'5'
/*description*/        		,'Dumb: Comp climbing'
/*primaryText*/       		,'Notably, in both the mens and womens competitions, the competitors who amassed enough points for the Combined final were all top-performing specialists in Lead and Boulder. 5 of the 12 athletes across both sexes were Japanese, with 3 men and 2 women qualifying. Issues of fatigue and skin condition affected the athletes performances, which the routesetters appeared to have accounted for in the Lead and Boulder finals.
The Combined final ranking is calculated by multiplying an athletes ranking points in each discipline in the Combined final, e.g. a 1st, 4th, and 6th place would score 24 points (1 x 4 x 6). Points are then ranked, with the lowest number of points winning (due to higher rankings achieved across the three disciplines).'
/*coverImage*/				,'uploads/articles/images/316992.jpg'
/*primaryMediaUrl*/			,'uploads/articles/images/316992.jpg'
/*primaryMediaType*/		,'image'
/*primaryMediaCaption*/		,'Kai Harada in the Combined Lead final.'
/*secondaryText*/			,'In the womens Combined Speed final, Miho Nonaka (JPN) pipped Jessica Pilz (AUT) in the first race, but Pilzs quick time sent her to the semi-final alongside 1/4 final winners Petra Klingler (SUI) and Sol Sa (KOR), who eliminated Janja Garnbret (SLO) from contention. Nonaka slipped early in the next race and Pilz capitalised to advance by 0.5 seconds, and Sa beat Klingler. Klingler placed 3rd after a false start from Nonaka in the small final, and Sa took an early lead with 1st place ahead of Pilz in Speed and the fastest time of the round (9.273 seconds).'
/*secondaryMediaUrl*/		,'uploads/articles/images/3169941.jpg'
/*secondaryMediaType*/		,'image'
/*secondaryMediaCaption*/	,'Pilz and Sa race for the win in the Combined Speed final.'
/*conclusionText*/ 			,null
/*conclusionMediaUrl*/ 		,null
/*conclusionMediaType*/ 	,null
/*conclusionMediaCaption*/ 	,null
/*statusCode*/				,'active'
/*author*/					,'1'
/*createdOn*/				,'2017-09-01'
);
DO SLEEP (0.1);
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,primaryMediaCaption,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,conclusionText,conclusionMediaUrl,conclusionMediaType,conclusionMediaCaption,statusCode,author,createdOn) 
		values(
/*headline*/        		'DESTINATION GUIDE: Hodge Close Quarry'
/*category*/        		,'3'
/*description*/        		,'falling into water'
/*primaryText*/       		,'Subject to your choice of spectacles,  Hodge Close Quarry in the Lakes is either a pokey, chossy hole in the ground or a quirky treasure trove filled with esoteric gems. This venue surely joins a list of crags, which we might struggle to sell to any visiting internationals other than Caroline Ciavaldini. Yet the hallmark of British climbing is is that books shouldn''t be judged by covers and the richest climbing experiences can sometimes be found in the most unlikely settings. It was on that premise that I set off to Hodge Close earlier in the year, armed only with an open mind and an appetite for something different.'
/*coverImage*/				,'uploads/articles/images/314984.jpg'
/*primaryMediaUrl*/			,'uploads/articles/images/314984.jpg'
/*primaryMediaType*/		,'image'
/*primaryMediaCaption*/		,'Clone Wars, 7b.'
/*secondaryText*/			,'© Alastair Lee / Posing Productions
I picked my way down the scree slope and descended into a forgotten world. Dashed at the base, the twisted rusty evidence of a 1970s insurance job was slowly surrendering to the ivy. A conspicuously chipped bolt ladder lay next to an unprotected chop-route, showcasing the whacky, ''anything goes'' ethics that were coined for the slate quarries during the ''80s boom. It made sense precisely because it made no sense at all. The whole place was a symbol of conflict between man and nature. A contradiction of beauty and ugliness. In the modern arena, this was the antithesis of a stereotypically ''good crag'', and for that reason I fell in love with it instantly.
I had always dreamt of doing a new route on slate, but like most climbers, I''d figured that the best lines had all been found. But here I was in sleepy old Hodge Close doing double takes as I stared at the back wall above the pool. Was I imagining things or was this not a blatantly obvious target for Deep Water Soloing? The height was perfect, maybe 40 feet to a broad terrace. There were some clear lines, corners, grooves, a flake-crack and an impressive ''showcase'', overhanging wall. The only snag would be getting in there, though it was nothing a dinghy wouldn''t solve. The water might be on the chilly side but a ''shorty'' wetsuit would take care of that. My climbing partner, Anna Taylor confirmed that - other than a few bits of traversing here and there - she''d never heard of anyone DWSing on this wall. It was a devious notion and I couldn''t lay it to rest, so I returned and abseiled in yielding an array of brushes and garden tools.'
/*secondaryMediaUrl*/		,'uploads/articles/audio/317080.jpg'
/*secondaryMediaType*/		,'image'
/*secondaryMediaCaption*/	,'Anna Taylor climbing Obsession Fatale E8 6c.'
/*conclusionText*/ 			,'The Combined title was decided in the Lead final. Pilz topped with one minute to spare, putting the pressure on Garnbret and Sa. Garnbret stayed composed and completed a quicker top to become Combined World Champion in addition to Boulder World Champion, which she won just two days before. Sa reached the middle section to place 2nd in the Combined, and Pilz finished 3rd at home in Innsbruck.'
/*conclusionMediaUrl*/ 		,'uploads/articles/images/316994'
/*conclusionMediaType*/ 	,'image'
/*conclusionMediaCaption*/ 	,'Janja Garnbret: Women''s Combined World Champion 2018.'
/*statusCode*/				,'active'
/*author*/					,'1'
/*createdOn*/				,'2017-09-01'
);
DO SLEEP(0.1);

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
/*primaryMediaCaption*/		,'Committing to the moves'
/*secondaryText*/			,'On the day, Anna had two attempts at the solo. On her first attempt, she reached the rest footholds and couldnt make herself commit to the crux section due to the injury potential. After getting rescued, I took about 40 minutes to clear my head and tried again, she explained. It was still pretty scary, but I knew as long as I kept my head together it was unlikely Id fall off, and I really didnt want to walk away having not tried.
Anna summed up:Im really happy to have got the route done, as it feels like a step forward from routes Ive done before, and its definitely got me psyched for the grit season!'
/*secondaryMediaUrl*/		,'uploads/articles/audio/SoundTest.wav'
/*secondaryMediaType*/		,'audio'
/*secondaryMediaCaption*/	,'Plane sound overhead'
/*conclusionText*/ 			,null
/*conclusionMediaUrl*/ 		,null
/*conclusionMediaType*/ 	,null
/*conclusionMediaCaption*/ 	,null
/*statusCode*/				,'active'
/*author*/					,'1'
/*createdOn*/				,'2017-09-01'
);


DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values(
        'New Stacks discovered on Northern Islands'
        ,'2'
        ,'Chossy Stack climbed in Shetland!'
        ,'Tidal and wind affected. Park near the lighthouse and walk along the cliff-tops. Scramble down to the platform opposite the base of the stack.
A Tyrolean traverse is required to access the stack. If one is not in place then a swimmer (preferably a volunteer) is needed in the party. Bring enough rope to leave a Tyrolean in place and carry out the descent abseil (60m ropes advisable). (UPDATE 28/8/18 - Tryolean now very frayed and will need renewed. Would reccomend checking tide times as it may now be required to wade/swim across).
At spring low tides and with a small swell it is possible to step/wade across to the base of the stack on the right hand side (facing out).  You can scramble around (anti-clockwise) to the top of pitch 2 of the "Ordinary Route".'
,'uploads/articles/images/killika.jpg'
,'uploads/articles/images/killika.jpg'
,'image'
,'active'
,'1'
,'2018-10-01'
);

DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values(
        'New Guidebook for Outer Hebridies'
        ,'3'
        ,'New Guidebook Published Today'
        ,'Along with its neighbouring islands, this is one of the best rock climbing destinations in Britain, as well as one of the most remote. Big, steep cliffs of beautiful gneiss in a stunning location, with some convenient smaller crags as well. World class.'
        ,'uploads/articles/images/killika.jpg','uploads/articles/images/SMCbook.jpg'
        ,'image'
        ,'active'
        ,'1'
        ,'2018-10-01'
);

DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values(
        'Visit Gogarth!'
        ,'3'
        ,'Impressive North Wales Sea Clifs'
        ,'Access to especially the Main Cliff and Easter Island is affected by the tides. Climbers visiting these areas are advised to check the local tide tables, which may be purchased in Holyhead.

Approach for South Stack, Upper Tier and Main Cliff areas: Turn left off the A5 at the Valley traffic lights, three miles from Holyhead, and follow the B4545 to Trearddur Bay. Turn left again at GR255793 where a twisting coastal road leads past several small coves to another left turn after three miles; a narrow road runs up to the South Stack Cafe. The South Stack cliffs lie just below the cafe and car parks. For Upper Tier and the Main Cliff an path leads north east from the upper car park past a prominent telecoms relay station towards the south-facing crags on Holyhead Mountain. The path now splits, where the right path continues over the mountain to North Stack, whilst the left path drops down to a well-worn site at the top of the descent gully, overlooking Gogarth Bay. From the foot of the gully a path contours round the hillside below the Upper Tier. Just around the corner beyond the prominent pinnacle (Shag Rock) a branch of the path drops steeply down to Main Cliff.

For North Stack Wall and Wen Zawn, on entering Holyhead, follow Victoria Road (A5) to the harbour. Turn left along the Prince of Wales Road along the harbour front, and continue along a minor road forkig left where the main road bears right. Follow this deteriorating ''road'' until you reach the parking areas near the Holyhead Quarries (GR225834). Follow the path climbing steeply up the hillside, taking the left fork when it divides after half a mile. Continue uphill until the path divides again. The right path runs down by some telegraph poles to the North Stack fog-warning station, and the left leads up to a col just above Wen Zawn.'
        ,'uploads/articles/images/Gogarth.jpg'
        ,'uploads/articles/videos/SampleVideo.mp4'
        ,'video','active'
        ,'1'
        ,'2018-11-01'
);
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values('Visit Tremadog'
        ,'3'
        ,'North Wales Finest Roadside Crag'
        ,'One of the best crags in Wales, with multi-pitch routes up to 250ft. Many classic including Christmas Curry (S), One Step In The Clouds (VS 4c), The Plum (E1 5b), the unbeatable Vector (E2 5c), Void (E3 6a), Zukator (E4 6a) and of course Strawberries (E7 6b) and Dream Topping (E7 6c). Often busy with people exiled by the weather in the Pass.'
        ,'uploads/articles/images/Tremadog.jpg'
        ,'uploads/articles/images/Tremadog.jpg'
        ,'image'
        ,'active'
        ,'1'
        ,'2018-11-01'
);
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,primaryMediaCaption,secondaryText,secondaryMediaUrl,secondaryMediaType,secondaryMediaCaption,statusCode,author,createdOn) 
		values(
/*headline*/        		'How To Tie Bowline'
/*category*/        		,'4'
/*description*/       		,'The Better way to tie in.'
/*primaryText*/        		,'How to tie the Bowline Knot. One of the most useful knots you can know. The Bowline forms a secure loop that will not jam and is easy to tie and untie. The Bowline is most commonly used for forming a fixed loop, large or small at the end of a line. Tried and tested over centuries, this knot is reliable, strong and stable. Even after severe tension is applied it is easy to untie. However, because it does untie so easily it should not be trusted in a life or death situation such as mountain climbing. It is said to retain 60% of the strength of the line in which it is tied.'
/*coverImage*/        		,'uploads/articles/images/Bowline.jpg'
/*primaryMediaUrl*/        	,'uploads/articles/images/Bowline.jpg'
/*primaryMediaType*/        ,'image'
/*primaryMediaCaption*/     ,'The Best knot'
/*secondaryText*/        	,'How to tie the Bowline Knot. One of the most useful knots you can know. The Bowline forms a secure loop that will not jam and is easy to tie and untie. The Bowline is most commonly used for forming a fixed loop, large or small at the end of a line. Tried and tested over centuries, this knot is reliable, strong and stable. Even after severe tension is applied it is easy to untie. However, because it does untie so easily it should not be trusted in a life or death situation such as mountain climbing. It is said to retain 60% of the strength of the line in which it is tied.'
/*secondaryMediaUrl*/		,'uploads/articles/images/bowline2.jpg'
/*secondaryMediaType*/		,'image'
/*secondaryMediaCaption*/	,'Do Yun'
/*status*/					,'active'
/*author*/       			,'1'
/*createdOn*/        		,'2018-12-01'
);
DO SLEEP(0.1);
#=================
insert into article (headline,category,description,primaryText,coverImage,primaryMediaUrl,primaryMediaType,statusCode,author,createdOn) 
		values(
        'Visit Kalymnos!'
        ,'3'
        ,'too much bolt clipping'
        ,'Lorem ipsum dolor sit amet, consectetuer adipiscing e'
        ,'uploads/articles/images/Gogarth.jpg'
        ,'uploads/articles/images/Gogarth.jpg'
        ,'image'
        ,'active'
        ,'1'
        ,'2018-08-01'
);
DO SLEEP(0.1);
#=================

#=

