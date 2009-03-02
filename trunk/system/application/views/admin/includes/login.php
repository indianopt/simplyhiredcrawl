<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>CPanel</title>
    	<link rel="stylesheet" type="text/css" href="<?=base_url() . 'css/admin/style.css'?>"/>
    	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url() . 'js/jsval/style.css'?>" />
    	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url() . 'css/admin/fonts.css'?>" />
    	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url() . 'css/admin/colors.css'?>" />
        </head>
    <body>
        <table align="center" border="0" cellpadding="0" cellspacing="0">
        	<tr>
        		<td height="150px">&nbsp;</td>
        	</tr>
        	<tr>
        		<td class="tabForm" align="center">
        			<form action="<?=site_url('admin/login')?>" method="post">
        				<table cellpadding="0" cellspacing="0" border="0" width="100%">
        					<tr>
        						<td>
        							<table align="center" border="0" cellpadding="0" cellspacing="2" width="100%">
        								<tr>
        									<td nowrap="nowrap" class="dataLabel" colspan="2" style="font-size: 12px; padding-bottom: 5px; font-weight: normal;" width="100%">Please enter your username and password.</td>
        								</tr>
        								<tr>
        									<td class="dataLabel" colspan="2"><span id="post_error" class="error">&nbsp;<?=$this->validation->error_string?></span></td>
        								</tr>
        								<tr>
        									<td class="dataLabel" width="30%">User Name</td>
        									<td width="70%"><input name="username" value="<?=$this->validation->username ?>" size="30" /></td>
        								</tr>
        								<tr>
        									<td class="dataLabel" width="30%">Password</td>
        									<td width="70%"><input name="password" type="password" size="30" /></td>
        								</tr>
        								<tr>
        									<td>&nbsp;</td>
        									<td><input class="button" value="  Login  " type="submit" /></td>
        								</tr>
        							</table>
        						</td>
        					</tr>
        				</table>
        			</form>
        		</td>
        	</tr>
        </table>
    </body>
</html>