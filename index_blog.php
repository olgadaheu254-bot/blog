<?php
require_once 'config_blog.php';

$categorie = '';
$billets = array();

if (isset($_GET['categorie']) && $_GET['categorie'] !== '') {
    $categorie = trim(strip_tags($_GET['categorie']));
    $stmt = $db->prepare(
        'SELECT ID, titre, annonce, date_billet, categorie
         FROM billets_blog WHERE categorie = ? ORDER BY date_billet DESC'
    );
    $stmt->bind_param('s', $categorie);
} else {
    $stmt = $db->prepare(
        'SELECT ID, titre, annonce, date_billet, categorie
         FROM billets_blog ORDER BY date_billet DESC'
    );
}

$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $row['date'] = date('d/m/Y H:i', strtotime($row['date_billet']));
    $billets[] = $row;
}

$smarty->assign('titre', 'Mon blog');
$smarty->assign('billets', $billets);
$smarty->assign('categorie', $categorie);
$smarty->display('index_blog.tpl');
