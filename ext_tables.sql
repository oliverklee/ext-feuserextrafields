#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
	gender int(11) unsigned DEFAULT '0' NOT NULL,
	date_of_birth int(11) DEFAULT '0' NOT NULL,
	zone varchar(45) DEFAULT '' NOT NULL,
	status int(11) unsigned DEFAULT '0' NOT NULL,
	comments text
);
