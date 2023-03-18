<?php

use Database;

require_once "C:\wamp64\www\proiectphp\backend\Database.php";

const DB_HOST = 'localhost';
const DB_NAME = 'magazinproiect';
const DB_USER = 'root';
const DB_PASS = '';

$db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
return $db->getConnection();