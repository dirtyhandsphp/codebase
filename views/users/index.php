<table cellspacing="4" cellpadding="4" width="600px;">
	<tr><td colspan="2" class="tal vat"><H2>Users List</h2></td></tr>
	<tr>
		<th class="tal vat w200p">User Name</th>
		<th class="tal vat w200p">Email Address</th>
	</tr>
	<?php if(isset($users) && !empty($users)) { ?>
		<?php foreach($users as $user) { ?>
			<tr>
				<td class="tal vat w200p"><?php echo $user['name']; ?></td>
				<td class="tal vat w200p"><?php echo $user['email']; ?></td>
			</tr>
		<?php } ?>
	<?php }else{ ?>
		<tr>
			<td colspan="2" class="pt10p tac red">No Details Available</td>
		</tr>
	<?php } ?>
	<tr>
		<td colspan="2" class="tal vat"><a href="add.php" style="text-decoration:none;"><input type="button" value="Add New User" class="button"/></a></td>
	</tr>
	
</table>