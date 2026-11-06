<?php
/* Smarty version 5.8.5, created on 2026-11-06 14:08:55
  from 'file:index_blog.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.5',
  'unifunc' => 'content_6aedd167c51f47_99909304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daa8d000b0784e28a77bb0e07ef4e95690e65fef' => 
    array (
      0 => 'index_blog.tpl',
      1 => 1793964331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6aedd167c51f47_99909304 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\blog\\templates';
?><html>
<head>
<title><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('titre'), ENT_QUOTES, 'UTF-8', true);?>
</title>

<style>
body { font-family: sans-serif; }
table.billets { font-size: 12px; }
table.billets td { padding-bottom: 7px; }
.entete { font-size: 14px; font-weight: bold; }
</style>

</head>
<body>
<a href="index_blog.php">Mon blog</a>

<table class="billets">
<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('billets')) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new \Smarty\Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
<tr><td>
    <a class="entete" href="afficher_blog.php?ID=<?php echo $_smarty_tpl->getValue('billets')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['ID'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('billets')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['titre'], ENT_QUOTES, 'UTF-8', true);?>
</a><br />
    <?php echo $_smarty_tpl->getValue('billets')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['date'];?>
<br />
    <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('billets')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['annonce'], ENT_QUOTES, 'UTF-8', true);?>
<br />
    Catégorie : <a href="index_blog.php?categorie=<?php echo rawurlencode((string)$_smarty_tpl->getValue('billets')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['categorie']);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('billets')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['categorie'], ENT_QUOTES, 'UTF-8', true);?>
</a>
</td></tr>
<?php }} else {
 ?>
<tr><td>Aucun billet pour le moment.</td></tr>
<?php
}
?>
</table>

<p><a href="editer_blog.php">Écrire un nouveau billet</a></p>
</body>
</html>
<?php }
}
