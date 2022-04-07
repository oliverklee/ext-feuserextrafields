#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
	full_salutation varchar(255) DEFAULT '' NOT NULL,
	gender int(11) unsigned DEFAULT '0' NOT NULL,
	date_of_birth int(11) DEFAULT '0' NOT NULL,
	zone varchar(45) DEFAULT '' NOT NULL,
	static_info_country char(3) DEFAULT '' NOT NULL,
	privacy tinyint(4) unsigned DEFAULT '0' NOT NULL,
	status int(11) unsigned DEFAULT '0' NOT NULL,
	comments text
);
