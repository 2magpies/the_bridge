<?php
//this is a temporary file to run where the day field has been changed to test the query; when we have more historic facts, we will use the install.php file and delete this one from project
require 'includes/constant/constants.php';

//Create the user events table
$user_events = "CREATE TABLE IF NOT EXISTS " . kdarko_dmintz_user_events . " (
		id int(11) unsigned NOT NULL AUTO_INCREMENT,
		nickname varchar(220),
		day DATE,
		place varchar(220),
		event varchar(2000),
		time_added timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
		PRIMARY KEY(id)
	) 
	ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	
//show it to the page
echo $user_events . "<br>";

//execute it
$result = mysql_query($user_events) or die("Failed to install: " . mysql_error());

if ($result){
	echo "Table installed successfully!<br>";
}



//Create the archive table
$archive = "CREATE TABLE IF NOT EXISTS " . kdarko_dmintz_archive . " (
		id int(11) unsigned NOT NULL AUTO_INCREMENT,
		day DATE,
		place varchar(220),
		headline varchar(220),
		event varchar(2000),
		category varchar(220),
		was_there int(255),
		remembered int(255),
		do_not_remember int(255),
		FULLTEXT (event),
		time_added timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
		PRIMARY KEY(id)
	) 
	ENGINE=MYISAM DEFAULT CHARSET=utf8;";
	
//show it to the page
echo $archive . "<br>";

//execute it
$result = mysql_query($archive) or die("Failed to install: " . mysql_error());

if ($result){
	echo "Table installed successfully!<br>";
}


//Create the events table
$q = "CREATE TABLE IF NOT EXISTS " . kdarko_dmintz_events . " (
		id int(11) unsigned NOT NULL AUTO_INCREMENT,
		day DATE,
		place varchar(220),
		headline varchar(220),
		event varchar(2000),
		category varchar(220),
		post_state varchar(220),
		was_there int(255),
		remembered int(255),
		do_not_remember int(255),
		time_added timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
		PRIMARY KEY(id)
	) 
	ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	
//show it to the page
echo $q . "<br>";

//execute it
$result = mysql_query($q) or die("Failed to install: " . mysql_error());

if ($result){
	echo "Table installed successfully!<br>";
}


//Populate the events table

$q_populate = "INSERT INTO " . kdarko_dmintz_events . " (day, place, headline, event, category, post_state, was_there, remembered, do_not_remember, time_added) VALUES
	('1931-04-23', 'Cleveland, Ohio', 'Ferrel Pitches No Hitter', 'On this day in 1931, Cleveland Indian Wes Ferrell pitched a no-hitter against the St. Louis Browns at League Park in Cleveland, Ohio, striking out eight, and hit a home run with a double and four runs batted in. ', 'Sports', 'on_deck',1,1,1,NOW()),
	('1944-04-23', 'New York City, New York', 'First Night of Jazz at the Met', 'On this day in 1944, the Metropolitan Opera House in NYC hosts a jazz concert for the first time. The performers were Louis Armstrong, Benny Goodman, Lionel Hampton, Artie Shaw, Roy Eldridge, and Jack Teagarden.', 'Music', 'in_the_box',1,1,1,NOW()),
	('1941-04-24', 'Chicago, Illinois', 'Organ Played at Wrigley Field', 'On this day in 1941, a tradition begins, 1st organ at a baseball stadium played at the Chicago Cubs.', 'Sports', 'on_deck',1,1,1,NOW()),	
	('1955-04-24', 'Birmingham, Alabama', 'Channel WBIQ TV First Broadcast', 'On this day in 1955, WBIQ TV channel 10 in Birmingham, Alabama (PBS) begins broadcasting.', 'Media', 'in_the_box',1,1,1,NOW()),	
('1957-04-25', 'New York City, New York', 'ABC-TV Broadcasts the First Prime-Time Network Rock Show: The Big Beat', 'On this day in 1957, The Big Beat, produced by ABC and hosted by Alan Freed, is the first prime-time network special devoted to rock music. The rock ’n roll dance show featured a mix of pop and R&B acts. It pre-dated the national broadcast of American Bandstand with Dick Clark.', 'Music', 'in_the_box',1,1,1,NOW()),
	('1970-04-25', 'Kent, Ohio', 'National Guard Kills 4 at Kent State in Ohio', 'On this day in 1970, members of the Ohio National Guard fired into a crowd of Kent State University demonstrators, killing four and wounding nine Kent State students. The impact of the shootings was dramatic. The event triggered a nationwide student strike that forced hundreds of colleges and universities to close. The shootings have come to symbolize the deep political and social divisions that so sharply divided the country during the Vietnam War era.', 'Culture', 'on_deck',1,1,1,NOW()),	
	('1955-04-26', 'New York City, New York', 'Damn Yankees Opens in NYC for 1022 Performances', 'On this day in 1955, Damn Yankees, a two-act musical comedy, opened at the 46th Street Theatre in New York City. The play was based on a book by George Abbott and Douglass Wallop, and Jery Ross and Richard Adler supplied the music and lyrics. Damn Yankees is a modern retelling of the Faust legend set during the 1950s in Washington, D.C., during a time when the New York Yankees dominated Major League Baseball.', 'Performing Arts', 'in_the_box',1,1,1,NOW()),
	('1961-04-26', 'Cape Canaveral, Florida', 'Alan Shepard becomes 1st American in space (aboard Freedom 7)', 'On this day in 1961, only 23 days after Yuri A. Gagarin of the Soviet Union became the first man in space, Mercury astronaut Alan B. Shepard, Jr. was launched at 9:34 am EST aboard his Freedom 7 capsule, powered by a Redstone booster, dubbed Mercury-Redstone 3. His trajectory carried him to an altitude of 116 statute miles (187 km) and to a splashdown point 302 statute miles (486 km) down the Atlantic Missile Range.', 'Culture', 'on_deck',3,54,0,NOW()),
	('1957-04-27', 'Los Angeles, California', 'Last broadcast of I Love Lucy on CBS-TV', 'On this day in 1957, the final episode of I Love Lucy, titled The Ricardos Dedicate a Statue, was broadcast. In this episode, Lucy organizes a Revolutionary Day Celebration, including a statue dedication. Ricky is going to give the dedication speech. Lucy accidentally breaks the statue and decides to step in with stone makeup to take its place for the ceremony.  I Love Lucy was the most watched show in the United States in four of its six seasons, and was the first to end its run at the top of the Nielsen ratings (an accomplishment later matched by The Andy Griffith Show and Seinfeld).', 'Media', 'in_the_box',1,1,1,NOW()),
	('1957-04-27', 'New York City, New York', 'JFK Wins Pulitzer for Profiles in Courage', 'On this day in 1957, the Pulitzer Prize for Biography was awarded to the United Sates Senator from Massachusetts John F. Kennedy for “Profiles in Courage.” The work was widely acclaimed and helped Kennedy earn national recognition.  While not without controversy as to the actual writing of the book (some have claimed that Kennedy speechwriter Ted Sorensen actually wrote the book) and the validity of  some of the characterizations (Blanche Ames, the daughter of Governor Adelbert Ames tried unsuccessfully to get a retraction on the negative description of her father), the work remains one of the definitive books written on both political courage and the U.S. Senate.', 'Arts', 'on_deck',1,1,1,NOW()),
	('1947-04-28', 'New York City, New York', 'Kraft Television Theatre Premiers on NBC', 'On this day in 1947, “Kraft Television Theatre,” the first weekly TV drama, débuted.   Like most early TV, “Kraft Television Theatre” was made on the advertiser-producer model, adapted from radio. Networks sold the airtime, but advertising agencies produced the content on behalf of their clients. Kraft products were never mentioned during a “Kraft Television Theatre” teleplay. Instead, they appeared in the recipe demonstrations that constituted the commercial breaks. According to Mike Mashon, the head of the moving-image section of the Library of Congress, the goal was to appeal to Kraft’s target audience: the “the solid middle class that aspires to something a little better.” During its eleven-year run on NBC, the show featured performances by Bea Arthur, Jack Lemmon, and William Shatner. It also received six Emmy nominations.', 'Culture', 'in_the_box',1,1,1,NOW()),
	('1970-04-28', 'USA', 'Beatles Long and Winding Road Released in America', 'On this day in 1970, The Long and Winding Road became the Beatles’ 20th and last number-one song in the United States. The ballad was written by Paul McCartney and released as the tenth track on the album “Let It Be.” It was the last single released by the group while all four remained alive. The Long and Winding Road was listed with For You Blue as a double-sided hit when the single hit number one on the “US Billboard Hot 100” in 1970.', 'Performing Arts', 'on_deck',1,1,1,NOW()),	
	('1952-04-29', 'New York City, New York', 'Mad Magazine Debuts', 'On this day in 1952, “Mad Magazine,” an American humor magazine debuted. Founded by editor Harvey Kurtzman and publisher William Gaines, “Mad” was launched as a comic book before it became a magazine. It was widely imitated and influential, impacting not only satirical media, but also the entire cultural landscape of the 20th century. With editor Al Feldstein, readership increased to more than 2 million during its 1970s circulation peak.', 'Culture', 'in_the_box',1,1,1,NOW()),
	('1967-04-29', 'Houston, Texas', 'Muhammad Ali Arrested for Refusing to Join U.S, Army', 'On this day in 1967, citing his Islamic faith, heavyweight champion Muhammad Ali 
was arrested and stripped of his titles and state licenses to fight. Three months later, a jury convicted him after only 21 minutes of deliberation. Ali was initially villified, but as public opinion turned against the Vietnam War, support for the former champion increased. Ali was allowed to fight again in 1970 and the conviction was overturned by the U.S. Supreme Court on June 28, 1971.', 'Culture', 'on_deck',1,1,1,NOW()),
	('1941-04-30', 'USA', 'USA First Country to Use Birth Control Pill Legally', 'On this day in 1960, the Food and Drug Administration (FDA) approved the first (world-wide) commercially produced birth-control pill--Enovid-10, made by the G.D. Searle Company. Development of the pill, as it became popularly known, was initially commissioned by birth-control pioneer Margaret Sanger and funded by heiress Katherine McCormick. Sanger, who opened the first birth-control clinic in the United States in 1916, hoped to encourage the development of a more practical and effective alternative to contraceptives that were in use at the time.', 'Culture', 'in_the_box',1,1,1,NOW()),
	('1974-04-30', 'Washington, D.C.', 'House Judiciary Committee Begins Formal Hearings on Nixon Impeachment', 'On this day in 1974, the House Judiciary Committee recommends that  37th American president, Richard M. Nixon, be impeached and removed from office. The impeachment proceedings resulted from a series of political scandals involving the Nixon administration that came to be collectively known as Watergate.', 'Politics', 'on_deck',1,1,1,NOW()),
	('1969-05-01', 'Cape Kennedy, Florida', 'Apollo 10 First to Transmit Color Pictures of Earth', 'On this day in 1969, Apollo 10 transmitted the first color pictures of earth from space. For the more than a billion viewers all over the world, the high points of an exciting flight were the live colorcasts from space. The 15-pound color TV camera, specially developed for this flight, performed beyond expectations. It recorded the initial docking maneuver after the Apollo and the Saturn third stage had entered the lunar flight path. It photographed earth from various points in space. It relayed some crew activity inside the cabin of the Command Module. It transmitted shots of the lunar surface from various angles and distances. It photographed the LM in lunar orbit and generally made a pictorial documentary of the flight.', 'Culture', 'on_deck',1,1,1,NOW()),	
	('1974-05-01', 'Los Angeles, California', 'Esllsberg and Russo Cleared from Charges for Disclosure of Pentagon Papers to Time', 'On this day in 1974, citing the government’s gross misconduct, United States District Court Judge William Matthew Byrne, JRr dismissed all charges against Daniel Ellsberg and Anthony J. Russo for their involvement in releasing the Pentagon Papers to The New York Times. Judge Byrne made it clear in his ruling that the two men would not be tried again on charges of stealing and copying the Pentagon papers. The conduct of the Government has placed the case in such a posture that it precludes the fair, dispassionate resolution of these issues by a jury, he said.', 'Politics', 'in_the_box',1,1,1,NOW()),
		('1950-05-02', 'NBC TV', 'Bob Hope First TV Appearance', 'On this day in 1950 (Easter Sunday), Bob Hope debued on NBC in a 90 minute variety extravaganza called The Star Spangled Review. Hope performed a sketch poking fun at the early television culture of NBC. The show featureed Douglas Fairbanks, Dinah Shore, and the Mexico City Boys Choir singing the Hallelujah Chorus. The show also included commercials from its sponsor, Frigidaire.', 'Performing Arts', 'in_the_box',1,1,1,NOW()),
	('1962-05-02', 'Washington, D.C.', 'Kennedy Throws First Ball at New DC Stadium', 'On this day in 1962, President John F. Kennedy threw out the ceremonial first pitch in Washington D.C.’s new stadium, called simply “D.C. Stadium.” In doing so, he continued a long-standing tradition that began in 1910 when President William H. Taft threw out Major League Baseball’s first opening-day pitch in the old Griffith Stadium in Washington D.C.', 'Sports', 'on_deck',1,1,1,NOW()),	
	('1952-05-03', 'London/Johannesburg', 'First Jet Airliner Passenger Service Begins', 'On this day in 1952, the first jet aireliner, a G-ALYP (Yoke Peter),  took off with fare-paying passengers and inaugurated scheduled service from London to Johannesburg.', 'Business', 'in_the_box',1,1,1,NOW()),
	('1970-05-03', 'Louisville, Kentucky', 'First Woman Jockey at Kentucky Derby', 'On this day in 1970, Diane Crump became the first woman to ride in the Kentucky Derby. She and her mount, Fathom, finished in 15th place. She was 22. Just a year earlier, Crump was the first woman jockey ever to ride at a pari-mutuel track at Hialeah. She racked up more than 230 victories in her career before retiring in 1985.', 'Sports', 'on_deck',1,1,1,NOW()),
	('1952-05-04', 'North Pole', 'First Airplane Landing at North Pole', 'On this day in 1952, a ski-modified U.S. Air Force C-47 piloted by Lieutenant Colonel Joseph O. Fletcher of Oklahoma and Lieutenant Colonel William P. Benedict of California became the first aircraft to land on the North Pole. A moment later, Fletcher climbed out of the plane and walked to the exact geographic North Pole, probably the first person in history to do so.', 'Culture', 'in_the_box',1,1,1,NOW()),
	('1971-05-04', 'U.S. Radio Stations', 'All Things Considered Premiers', 'On this day in 1971, the radio program All Things Considered premiered on about 90 radio stations with host Robert Conley. The first story was about the march on Washington, D.C. and the growing anti-Vietnam War protests taking place there.', 'Media', 'on_deck',1,1,1,NOW()),
	('1944-05-05', 'Pittsburgh, Pennsylvania', 'Bernstein Premiere', 'On this day in 1944, Jeremiah by Leonard Bernstein premiers at the Syria Mosque in Pittsburgh, Pennsylvania.', 'Performing Arts', 'on_deck',1,1,1,NOW()),
	('1968-05-05', 'Washington, D.C.', 'Paris Chosen as Site for Vietnam Peace Talks', 'On this day in 68, the United States and North Vietnam agree to begin formal negotiations in Paris after 34 days of discussions to select a site. Hanoi disclosed that ex-Foreign Minister Xuan Thuy would head the North Vietnamese delegation at the talks. Ambassador W. Averell Harriman was named as his U.S. counterpart. The start of negotiations brought a flurry of hope that the war might be settled quickly. Instead, the talks rapidly degenerated into a dreary ritual of weekly sessions, during which both sides repeated long-standing positions without seeming to come close to any agreement.', 'Military', 'in_the_box',1,1,1,NOW()),
	('1963-05-06', 'Birmngham, Alabama', 'Bombing of Birmingham Model Incites Riots', 'On this day in 1963, the A.G. Gaston Motel and the home of Reverend A. D. King, brother of Martin Luther King, were both bombed. Martin Luther King and other SCLC leaders frequented the Gaston Motel when in Birmingham, Alabama; businessman A. G. Gaston often provided them with complimentary office space. The bombings sparked riots by African Americans in a twenty-eight-block section of Birmingham; local police officers and state troopers responding to the crisis beat rioters and bystanders, injuring over fifty people. In response to the violence, President Kennedy called for nonviolence, readied troops for riot control, and federalized the Alabama National Guard.', 'Culture', 'on_deck',1,1,1,NOW()),
	('1931-05-06', 'New York City, New York', 'Empire State Opens', 'On this day in 1931, the Empire State Building opened in located in Midtown Manhattan, New York City, at the intersection of Fifth Avenue and West 34th Street.', 'Culture', 'in_the_box',1,1,1,NOW());";


//execute it
$result = mysql_query($q_populate) or die("Failed to populate: " . mysql_error());

if ($result){
	echo "Table populated successfully!";
}


//Populate the events table

$q_populate = "INSERT INTO " . kdarko_dmintz_archive . " (day, place, headline, event, category, was_there, remembered, do_not_remember, time_added) VALUES
	('1959-05-27', 'Los Angeles and New York', 'First Grammy Awards: Perry Como & Ella Fitzgerald Win', 'On this day in 1959, the first Grammy awards were held. They recognized musical accomplishments by performers for the year 1958. Many of music’s elite—including Frank Sinatra, Sammy Davis Jr., Dean Martin, Gene Autry, Johnny Mercer, Henry Mancini and André Previn—gathered for a black-tie dinner and awards presentation inside the Grand Ballroom of the Beverly Hilton. At the same time, other new Academy members were gathering at a function held simultaneously in New York City.', 'Culture', 2,6,10,NOW()),	
	('1964-05-28', 'Flushing, New York', 'Shea Stadium Opens', 'On this day in 1964, Shea Stadium opened with the Pittsburgh Pirates beating the Mets 4–3 before a crowd of 50,312. ', 'Sports', 350,700,110,NOW()),
	('1935-05-29', 'Pittsburgh, Pennsylvania', 'Babe Ruth Hits 714th Home Run', 'On this day in 1935, at Forbes Field, Babe Ruth hits his 714th home run, a record for career home runs that would stand for almost 40 years. This was one of Ruth’s last games, and the last home run of his career. Ruth went four for four on the day, hitting three home runs and driving in six runs.', 'Sports', 4,8,17,NOW()),
	('1935-05-30', 'Philadelphia, Pennsylvania', 'Last Game for Babe Ruth', 'On this day in 1935, Babe Ruth played the first inning for the Boston Braves, the last of his career. It was an 11-6 win for the Philadelphia Phillies, who played at home, in the Baker Bowl. ', 'Sports', 2,5,6,NOW()),
	('1965-05-31', 'Indianapolis, Indiana', 'British Invasion Finally Broke At Indy 500', 'On this day in 1965, the five-year-old British Invasion finally broke at the 49th International 500-Mile Sweepstakes held at the Indianapolis Motor Speedway. Jim Clark and Colin Chapman triumphed in dominating fashion with the first rear-engined Indy-winning car, a Lotus 38 powered by Ford. With only six of the 33 cars in the field having front engines, it was the first 500 in history to have a majority of cars as rear-engined machines. The event was televised nationally on a tape-delayed basis for the first time on ABC.', 'Sports', 1,5,9,NOW());";


//execute it
$result = mysql_query($q_populate) or die("Failed to populate: " . mysql_error());

if ($result){
	echo "Table populated successfully!";
}

?>








