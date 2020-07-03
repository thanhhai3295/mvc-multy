<?php 
	$linkAction	= URL::createLink('admin', 'index', 'login');
?>
<form action="<?php echo $linkAction ?>" method="post" id="form-login">
		<label>User Name</label> 
		<input name="form[username]" id="mod-login-username" type="text" class="inputbox" size="15" />
		
		<!-- PASSWORD -->
		<label id="mod-login-password-lbl" for="mod-login-password">Password</label>
		<input name="form[password]" id="mod-login-password" type="password" class="inputbox" size="15" />
		<input type="submit" name="submit" value="login">
		<!-- TOKEN -->
		<input name="form[token]" type="hidden" value="<?php echo time();?>" />
		
</form>
			
