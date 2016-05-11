#  
# Table structure for table 'tx_njtutorials_domain_model_category'
#
CREATE TABLE tx_njtutorials_domain_model_category (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	fe_cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
  	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL, 
	
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	
	description text NOT NULL,
	is_subcat tinyint(4) unsigned DEFAULT '0' NOT NULL,
	main_category int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	title_alt varchar(255) DEFAULT '' NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	UNIQUE title (title),
	KEY parent (pid)
);





#  
# Table structure for table 'tx_njtutorials_domain_model_tag'
#
CREATE TABLE tx_njtutorials_domain_model_tag (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	fe_cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
  	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL, 
	
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	
	title varchar(255) DEFAULT '' NOT NULL,
	
	PRIMARY KEY (uid),
	UNIQUE title (title),
	KEY parent (pid)
);


#  
# Table structure for table 'tx_njtutorials_domain_model_tutorial'
#
CREATE TABLE tx_njtutorials_domain_model_tutorial (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	fe_cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
  	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL, 
	
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	
	category int(11) DEFAULT '0' NOT NULL,
	comments_enable tinyint(4) unsigned DEFAULT '0' NOT NULL,
	comments int(11) DEFAULT '0' NOT NULL,
	conclusion text NOT NULL,
	content varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	related_tutorials varchar(255) DEFAULT '' NOT NULL,
	motivation text NOT NULL,
	teaser_image int(11) unsigned DEFAULT '0' NOT NULL,
	tags varchar(255) DEFAULT '' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	UNIQUE title (title),
	KEY parent (pid)
);


#
# Table structure for table 'tx_njtutorials_domain_model_tutorialitem'
#
CREATE TABLE tx_njtutorials_domain_model_tutorialitem (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	tutorial_uid int(11) DEFAULT '0' NOT NULL,
	headline varchar(255) DEFAULT '' NOT NULL,
	headline_hidden tinyint(1) DEFAULT '0' NOT NULL,
	headline_style varchar(255) DEFAULT '' NOT NULL,
	
	code text NOT NULL,
	code_lang varchar(25) DEFAULT '' NOT NULL,
	code_starting_line int(11) DEFAULT '1' NOT NULL,
	code_highlight_color varchar(255) DEFAULT '' NOT NULL,
	code_highlight_lines varchar(255) DEFAULT '' NOT NULL,
	
	content text NOT NULL,
	content_type varchar(25) DEFAULT '' NOT NULL,
	
	html text NOT NULL,
	
	img varchar(255) DEFAULT '' NOT NULL,
	img_copyright varchar(255) DEFAULT '' NOT NULL,
	img_adjustment varchar(25) DEFAULT '' NOT NULL,
	img_width int(11) NOT NULL DEFAULT '0',
	img_height int(11) NOT NULL DEFAULT '0',
	img_use_thumb tinyint(1) NOT NULL DEFAULT '0',
	
	message text NOT NULL,
	message_type varchar(25) DEFAULT '' NOT NULL,
	
	yt_video_id varchar(255) DEFAULT '' NOT NULL,
	yt_video_width int(11) DEFAULT '0' NOT NULL,
	yt_ratio tinyint(1) DEFAULT '0' NOT NULL,
	yt_show_proposals tinyint(1) DEFAULT '0' NOT NULL,
	yt_allow_fullscreen tinyint(1) DEFAULT '0' NOT NULL,
	yt_additional varchar(255) DEFAULT '' NOT NULL, 
	
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);