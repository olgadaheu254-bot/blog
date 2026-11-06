<?php
// Connexion MySQL (XAMPP : utilisateur root, pas de mot de passe)
$db = new mysqli('localhost', 'root', '', 'blog');
if ($db->connect_error) {
    die('Erreur de connexion MySQL : ' . $db->connect_error);
}
$db->set_charset('utf8mb4');

// Smarty
require_once 'libs/Smarty.class.php';
$smarty = class_exists('\Smarty\Smarty') ? new \Smarty\Smarty() : new Smarty();
$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
$smarty->setCacheDir('cache');
$smarty->setConfigDir('configs');