CREATE TABLE tx_gymmanager_domain_model_gym (
		uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
		pid int(11) DEFAULT '0' NOT NULL,

		name varchar(255) NOT NULL DEFAULT '',
		street varchar(255) NOT NULL DEFAULT '',
		city varchar(255) NOT NULL DEFAULT '',
		zipcode varchar(10) NOT NULL DEFAULT '',
		description varchar(255) NOT NULL DEFAULT '',
		email varchar(30) NOT NULL DEFAULT '',
		image int(11) unsigned NOT NULL default '0',
		owner_pic int(11) unsigned NOT NULL default '0',
		staff_pic int(11) unsigned NOT NULL default '0',
		courses text NOT NULL,
		events text NOT NULL,
		available_categories text NOT NULL,
		trainers int(11) unsigned NOT NULL DEFAULT '0',
		users text NOT NULL,
		PRIMARY KEY (uid),
		KEY parent (pid)
);

CREATE TABLE tx_gymmanager_domain_model_course (
    coursestart_As_String varchar(255) NOT NULL DEFAULT '',
    courseend_As_String varchar(255) NOT NULL DEFAULT '',
		coursestart int(10) unsigned DEFAULT 0,
		courseend int(10) unsigned DEFAULT 0,
    duration float(10) unsigned DEFAULT '0',
    name varchar(255) NOT NULL DEFAULT '',
    street varchar(255) NOT NULL DEFAULT '',
    city varchar(255) NOT NULL DEFAULT '',
    zipcode varchar(10) NOT NULL DEFAULT '',
    description varchar(255) NOT NULL DEFAULT '',
    price float(5) unsigned DEFAULT 0,
    max_group_size int(4) unsigned DEFAULT 0,
    min_group_size int(4) unsigned DEFAULT 0,
    users text NOT NULL,
		image int(11) unsigned NOT NULL DEFAULT '0',
		location tinyint,
		categories int(11) unsigned NOT NULL DEFAULT '0',
		trainers int(11) unsigned NOT NULL DEFAULT '0',
		difficulty varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_gymmanager_domain_model_category (
  	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_gymmanager_domain_model_trainer (
  	firstname varchar(255) NOT NULL DEFAULT '',
  	lastname varchar(255) NOT NULL DEFAULT '',
  	age int(10) unsigned default '0',
		image int(11) unsigned NOT NULL DEFAULT '0',
);

CREATE TABLE tx_gymmanager_domain_model_event (
    name varchar(255) NOT NULL DEFAULT '',
    street varchar(255) NOT NULL DEFAULT '',
    city varchar(255) NOT NULL DEFAULT '',
    zipcode varchar(255) NOT NULL DEFAULT '',
    users text NOT NULL
);

CREATE TABLE tx_gymmanager_domain_model_location (
  	name varchar(255) NOT NULL DEFAULT '',
  	zipcode varchar(255) NOT NULL DEFAULT '',
  	city varchar(255) NOT NULL DEFAULT '',
  	street varchar(255) NOT NULL DEFAULT '',
  	description varchar(255) NOT NULL DEFAULT '',
		image int(11) unsigned NOT NULL DEFAULT '0',
);

CREATE TABLE fe_users (
    rank varchar(255) NOT NULL DEFAULT ''
);
