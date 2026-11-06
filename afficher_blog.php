<?php
require_once 'config_blog.php';

// Vérifier l'identifiant
if (!isset($_GET['ID']) || !ctype_digit($_GET['ID'])) {
    die('Identifiant invalide.');
}
$id = (int) $_GET['ID'];

// Chercher le billet
$stmt = $db->prepare(
    'SELECT ID, titre, contenu, date_billet, categorie FROM billets_blog WHERE ID = ?'
);
$stmt->bind_param('i', $id);
$stmt->execute();
$billet = $stmt->get_result()->fetch_assoc();

if (!$billet) {
    die('Ce billet n\'existe pas.');
}
$billet['date'] = date('d/m/Y H:i', strtotime($billet['date_billet']));

// Chercher les commentaires
$stmt = $db->prepare(
    'SELECT nom, comment, date_comment FROM commentaires_blog
     WHERE ID = ? ORDER BY date_comment ASC'
);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

$commentaires = array();
while ($row = $result->fetch_assoc()) {
    $commentaires[] = array(
        'nom'     => $row['nom'],
        'comment' => $row['comment'],
        'date'    => date('d/m/Y H:i', strtotime($row['date_comment']))
    );
}

$smarty->assign('titre', $billet['titre']);
$smarty->assign('billet', $billet);
$smarty->assign('commentaires', $commentaires);
$smarty->display('afficher_blog.tpl');
