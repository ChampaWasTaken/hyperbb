<?php
/* Smarty version 3.1.29, created on 2016-03-04 14:40:57
  from "/var/www/html/themes/Paper/login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56d990693228d6_61850021',
  'file_dependency' => 
  array (
    '14c9b7fcb688fd88f66c05e3cc3898381dbc436c' => 
    array (
      0 => '/var/www/html/themes/Paper/login.tpl',
      1 => 1456437109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56d990693228d6_61850021 ($_smarty_tpl) {
?>
<div class="wrapper">
	<div class="container">
		<div class="pageDescriptionWithHeading">
			<h1><?php echo $_smarty_tpl->tpl_vars['language']->value['page_title'];?>
</h1>
			<h2><?php echo $_smarty_tpl->tpl_vars['language']->value['page_description'];?>
</h2>
		</div>
		
		<form class="loginForm col s12" action="index.php?page=login&id=auth" method="POST">
			<?php if ($_smarty_tpl->tpl_vars['failedLogin']->value) {?>
				<h4 class="errorOnLogin"><?php echo $_smarty_tpl->tpl_vars['language']->value['login_error'];?>
</h4>
			<?php }?>
			<div class="row cancelBottomMargin">
				<div class="input-field col s12">
					<i class="fa fa-user prefix"></i>
					<input id="login_username" name="login_username" type="text" class="validate">
					<label for="login_username"><?php echo $_smarty_tpl->tpl_vars['language']->value['login_username'];?>
</label>
				</div>
			</div>
			<div class="row cancelBottomMargin">
				<div class="input-field col s12">
					<i class="fa fa-key prefix"></i>
					<input id="login_password" name="login_password" type="password" class="validate">
					<label for="login_password"><?php echo $_smarty_tpl->tpl_vars['language']->value['login_password'];?>
</label>
				</div>
			</div>
			
			<input type="checkbox" class="filled-in" id="login_remember" name="login_remember" checked="checked" />
			<label for="login_remember"><?php echo $_smarty_tpl->tpl_vars['language']->value['login_remember'];?>
</label>
			<br/>
			<br/>
			<button class="btn waves-effect waves-light" type="submit" name="login_submit"><?php echo $_smarty_tpl->tpl_vars['language']->value['login_button'];?>

				<i class="fa fa-sign-in"></i>
			</button>
		</form>
	</div>
</div><?php }
}
