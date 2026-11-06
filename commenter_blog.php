<?php
require_once 'config_blog.php';

// Ce script n'affiche rien : il enregistre puis redirige.
if (!isset($_POST['ID'], $_POST['nom'], $_POST['comment']) || !ctype_digit($_POST['ID'])) {
    die('Données invalides.');
}
$id      = (int) $_POST['ID'];
$nom     = trim(strip_tags($_POST['nom']));
$comment = trim(strip_tags($_POST['comment']));

if ($nom === '' || $comment === '') {
    die('Le nom et le commentaire sont obligatoires.');
}

// Vérifier que le billet existe
$stmt = $db->prepare('SELECT ID FROM billets_blog WHERE ID = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
if ($stmt->get_result()->num_rows === 0) {
    die('Ce billet n\'existe pas.');
}

// Ajouter le commentaire
$stmt = $db->prepare('INSERT INTO commentaires_blog (nom, comment, ID) VALUES (?, ?, ?)');
$stmt->bind_param('ssi', $nom, $comment, $id);
$stmt->execute();

header('Location: afficher_blog.php?ID=' . $id);
exit;
