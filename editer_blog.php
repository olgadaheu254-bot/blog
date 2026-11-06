<?php
require_once 'config_blog.php';

// Mode 2 : le formulaire a été envoyé
if (isset($_POST['titre'], $_POST['contenu'], $_POST['categorie'])) {
    $titre     = trim(strip_tags($_POST['titre']));
    $contenu   = trim($_POST['contenu']);
    $categorie = trim(strip_tags($_POST['categorie']));

    if ($titre === '' || $contenu === '') {
        die('Le titre et le contenu sont obligatoires.');
    }

    // L'annonce = extrait du contenu, sans balises
    $annonce = mb_substr(strip_tags($contenu), 0, 200);

    $stmt = $db->prepare(
        'INSERT INTO billets_blog (titre, contenu, annonce, date_billet, categorie)
         VALUES (?, ?, ?, NOW(), ?)'
    );
    $stmt->bind_param('ssss', $titre, $contenu, $annonce, $categorie);
    $stmt->execute();
    $id = $db->insert_id;

    // Redirection vers le billet créé
    header('Location: afficher_blog.php?ID=' . $id);
    exit;
}

// Mode 1 : on affiche le formulaire
$smarty->assign('titre', 'Nouveau billet');
$smarty->display('edition_blog.tpl');
