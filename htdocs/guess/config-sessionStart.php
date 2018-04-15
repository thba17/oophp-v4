<?php
/**
 * Initiate and start session
 */
$sessionName = substr(preg_replace('/[^a-z\d]/i', '', __DIR__), -30);
session_name($sessionName);
session_start();
