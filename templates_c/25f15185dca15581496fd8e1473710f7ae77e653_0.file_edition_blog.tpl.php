<?php
/* Smarty version 5.8.5, created on 2026-11-06 14:09:04
  from 'file:edition_blog.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.5',
  'unifunc' => 'content_6aedd170ad21f2_81803121',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25f15185dca15581496fd8e1473710f7ae77e653' => 
    array (
      0 => 'edition_blog.tpl',
      1 => 1793964331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6aedd170ad21f2_81803121 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\blog\\templates';
?><html>
<head>
<title><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('titre'), ENT_QUOTES, 'UTF-8', true);?>
</title>

<style>
h1 { font-family: sans-serif; font-size: 20px; }
table.champs_saisie { font-family: sans-serif; font-size: 12px; }
table.champs_saisie td { vertical-align: top; }
</style>

</head>
<body>
<h1>Nouveau billet</h1>
<form method="post" action="editer_blog.php">
<table class="champs_saisie">
<tr><td>Titre :</td><td><input name="titre" type="text" /></td></tr>
<tr><td>Contenu :</td>
<td><textarea name="contenu" rows="15" cols="40"></textarea></td></tr>
<tr><td>Catégorie :</td><td><input name="categorie" type="text" maxlength="12" /></td></tr>
<tr><td></td><td><input name="submit" type="submit" value="Poster" /></td></tr>
</table>
</form>
</body>
</html>
<?php }
}
