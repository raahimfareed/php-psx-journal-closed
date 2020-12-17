CREATE TABLE IF NOT EXISTS users (
    `id` integer primary key auto_increment not null,
    `full_name` varchar(256) not null,
    `email` varchar(254) not null,
    `ukn` varchar(255),
    `uis` varchar(255),
    `cdc_relation_number` varchar(255),
    `cdc_account_number` varchar(255),
    `clearing_member_id` varchar(255),
    `client_code` varchar(255),
    `password` varchar(255) not null
);
