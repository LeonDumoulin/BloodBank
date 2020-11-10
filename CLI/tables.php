<?php
return $tables = [
    'users' => '
        user VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        phone VARCHAR(14) NOT NULL,
        role int(1) NOT NULL,
    ',
    'profile'=>"
        user_id int(11) NOT NULL,
        bloodtype ENUM('O+','O-','A+','A-','B+','B-','AB+','AB-') NOT NULL,
        last_donation DATE NULL,
        next_donation DATE NULL,
        dob DATE NULL,
        name VARCHAR(255) NOT NULL,
        address VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        nid VARCHAR(255) NULL,
        bloodtest VARCHAR(255) NULL,
    ",
    'AskDonation'=>"
        address VARCHAR(255) NOT NULL,
        hospital VARCHAR(255) NOT NULL,
        bloodtype ENUM('O+','O-','A+','A-','B+','B-','AB+','AB-') NOT NULL,
        name VARCHAR(255) NOT NULL,
        state int(1) DEFAULT 0 ,
    ",
    'Ads'=>'
        title VARCHAR(255) NOT NULL,
        message VARCHAR(500) NOT NULL,
        resource VARCHAR(255) NOT NULL,
    ',
    'notification'=>'
        sendto VARCHAR(10) NOT NULL,
        message VARCHAR(500) NOT NULL,
        title VARCHAR(255) NOT NULL,
    '
];
