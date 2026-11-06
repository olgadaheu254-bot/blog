<html>
<head>
<title>{$titre|escape}</title>
{literal}
<style>
body { font-family: sans-serif; font-size: 12px; }
h1 { font-size: 20px; }
.commentaire { margin-bottom: 10px; }
#formulaire_comment { display: none; }
</style>
<script>
function afficherFormulaire() {
    document.getElementById('formulaire_comment').style.display = 'block';
    document.getElementById('lien_comment').style.display = 'none';
}
</script>
{/literal}
</head>
<body>
<a href="index_blog.php">Mon blog</a>

<h1>{$billet.titre|escape}</h1>
<p>{$billet.date}</p>
<p>{$billet.contenu|escape|nl2br}</p>
<p>Catégorie : <a href="index_blog.php?categorie={$billet.categorie|escape:'url'}">{$billet.categorie|escape}</a></p>

<h3>Commentaires</h3>
{section name=i loop=$commentaires}
<div class="commentaire">
    <b>{$commentaires[i].nom|escape}</b> - {$commentaires[i].date}<br />
    {$commentaires[i].comment|escape|nl2br}
</div>
{sectionelse}
<p>Aucun commentaire pour le moment.</p>
{/section}

<a href="#" id="lien_comment" onclick="afficherFormulaire(); return false;">Ajouter un commentaire</a>

<div id="formulaire_comment">
<form method="post" action="commenter_blog.php">
<input type="hidden" name="ID" value="{$billet.ID}" />
<table>
<tr><td>Nom :</td><td><input type="text" name="nom" /></td></tr>
<tr><td>Commentaire :</td><td><textarea name="comment" rows="5" cols="40"></textarea></td></tr>
<tr><td></td><td><input type="submit" value="Envoyer" /></td></tr>
</table>
</form>
</div>
</body>
</html>
