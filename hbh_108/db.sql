-- we don't know how to generate schema test (class Schema) :(
create table audits
(
	audit_id int auto_increment
		primary key,
	event_name varchar(50) null,
	event_id int null,
	event_date date null,
	event_tickets_sold int null,
	user_id int null,
	booking_id int null
)
;

create table events
(
	event_id int auto_increment
		primary key,
	event_name varchar(20) not null,
	event_tags varchar(50) null,
	event_image binary(255) null,
	event_date date not null,
	event_start_time time not null,
	event_end_time time not null,
	event_total_tickets int not null,
	event_ticket_price double not null,
	event_description varchar(500) null,
	event_file longblob null,

	constraint event_event_id_uindex
		unique (event_id)

)
;

create table files
(
	id int auto_increment
		primary key,
	name varchar(75) not null,
	path varchar(225) not null,
	created datetime not null
)
;

create table tags
(
	tag_id int(255) auto_increment
		primary key,
	tag_name varchar(500) not null,
	tag_description varchar(500) null
)
;

create table events_tags
(
	tag_id int(255) not null,
	event_id int(255) not null,
	primary key (tag_id, event_id),
	constraint event_tags_tags_tag_id_fk
		foreign key (tag_id) references tags (tag_id),
	constraint event_tags_events_event_id_fk
		foreign key (event_id) references events (event_id)
)
;

create index event_tags_events_event_id_fk
	on events_tags (event_id)
;

create table tickets
(
	ticket_id int auto_increment
		primary key,
	ticket_type varchar(50) not null,
	ticket_price double not null,
	ticket_description varchar(500) null
)
;

create table events_tickets
(
	event_id int null,
	ticket_id int not null
		primary key,
	constraint events_tickets_events_event_id_fk
		foreign key (event_id) references events (event_id),
	constraint events_tickets_tickets_ticket_id_fk
		foreign key (ticket_id) references tickets (ticket_id)
)
;

create index events_tickets_events_event_id_fk
	on events_tickets (event_id)
;

create table users
(
	user_id int auto_increment comment 'unique id to identify users in db'
		primary key,
	username varchar(500) not null comment 'user name for users to login
',
	password varchar(500) not null comment 'users password to login

',
	user_first_name varchar(50) null comment 'users first name
',
	user_last_name varchar(50) null comment 'users first name
',
	user_street varchar(50) null comment 'which street users live
',
	user_suburb varchar(20) null comment 'which suburb users live',
	user_postcode varchar(10) null comment 'post code of the suburb
',
	user_phone int null comment 'users phone number.',
	user_tags varchar(200) null comment 'user interest tags ',
	user_image binary(255) null,
	user_type varchar(5) null,
	user_description varchar(500) null,
	user_abn varchar(20) null,
	email varchar(50) not null,
	user_business_name varchar(50) null,
	constraint user_user_id_uindex
		unique (user_id)
)
comment 'user table which contains the both event organizers'' and event attendees'' common details'
;

create table bookings
(
	booking_id int auto_increment
		primary key,
	user_id int null,
	event_id int null,
	booking_date date not null,
	booking_cost double not null,
	payment_id int null,
	number_of_tickets int null,
	constraint book_booking_id_uindex
		unique (booking_id),
	constraint books_users_user_id_fk
		foreign key (user_id) references users (user_id),
	constraint books_events_event_id_fk
		foreign key (event_id) references events (event_id)
)
;

create index books_events_event_id_fk
	on bookings (event_id)
;

create index books_payments_payment_id_fk
	on bookings (payment_id)
;

create index books_users_user_id_fk
	on bookings (user_id)
;

create table epayments
(
	payment_id int auto_increment
		primary key,
	edate date null,
	user_type varchar(50) null,
	amount double null,
	booking_id int(255) null,
	constraint epayments_bookings_booking_id_fk
		foreign key (booking_id) references bookings (booking_id)
)
;

create index epayments_bookings_booking_id_fk
	on epayments (booking_id)
;

create table venues
(
	venue_id int auto_increment
		primary key,
	venue_street varchar(50) not null,
	venue_suburb varchar(20) not null,
	venue_postcode varchar(20) not null,
	venue_image binary(255) null,
	venue_room_count int null,
	constraint venue_venue_id_uindex
		unique (venue_id)
)
;

create table rooms
(
	room_id int auto_increment
		primary key,
	room_capacity int not null,
	room_type varchar(20) not null,
	room_image binary(255) null,
	room_name varchar(20) null comment 'number_of _rooms',
	venue_id int not null,
	room_requirements varchar(500) null,
	constraint rooms_venues_venue_id_fk
		foreign key (venue_id) references venues (venue_id)
)
;

create table events_rooms
(
	event_id int not null,
	room_id int not null,
	primary key (event_id, room_id),
	constraint events_rooms_events_event_id_fk
		foreign key (event_id) references events (event_id),
	constraint events_rooms_rooms_room_id_fk
		foreign key (room_id) references rooms (room_id)
)
;

create index events_rooms_rooms_room_id_fk
	on events_rooms (room_id)
;

create index rooms_venues_venue_id_fk
	on rooms (venue_id)
;

create table rooms_users
(
	leasing_id int(255) auto_increment
		primary key,
	room_id int not null,
	user_id int not null,
	tv tinyint(1) null,
	theatre tinyint(1) null,
	class_room tinyint(1) null,
	board_room tinyint(1) null,
	yoga tinyint(1) null,
	standing tinyint(1) null,
	projector tinyint(1) null,
	white_board tinyint(1) null,
	video_camera tinyint(1) null,
	micro_phone tinyint(1) null,
	music_player tinyint(1) null,
	constraint room_users_rooms_room_id_fk
		foreign key (room_id) references rooms (room_id),
	constraint room_users_users_user_id_fk
		foreign key (user_id) references users (user_id)
)
;

create index room_users_rooms_room_id_fk
	on rooms_users (room_id)
;

create index room_users_users_user_id_fk
	on rooms_users (user_id)
;

create table rpayments
(
	payment_id int auto_increment
		primary key,
	user_type varchar(5) not null,
	payment_amount double null,
	payment_date date not null,
	leasing_id int(255) null,
	constraint payment_payment_uindex
		unique (payment_id),
	constraint payments_rooms_users_leasing_id_fk
		foreign key (leasing_id) references rooms_users (leasing_id)
)
;

create index payments_rooms_users_leasing_id_fk
	on rpayments (leasing_id)
;

create table sessions
(
	session_id int auto_increment
		primary key,
	leasing_id int(255) null,
	session_name varchar(50) null,
	session_date date null,
	start_time time not null,
	session_description varchar(500) null,
	end_time time not null,
	constraint sessions_room_users_leasing_id_fk
		foreign key (leasing_id) references rooms_users (leasing_id)
)
;

create index sessions_events_event_id_fk
	on sessions (leasing_id)
;

