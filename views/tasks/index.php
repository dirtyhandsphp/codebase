<table cellspacing="4" cellpadding="4" width="600px;">
	<tr><td colspan="2" class="tal vat"><H2>Tasks List</h2></td></tr>
	<tr>
		<th class="tal vat w200p">User Name</th>
		<th class="tal vat w200p">Task Description</th>
		<th class="tal vat w200p">Due Date</th>
	</tr>
	<?php if(isset($tasks) && !empty($tasks)) { ?>
		<?php foreach($tasks as $task) { ?>
			<tr>
				<td class="tal vat w200p"><?php echo $task['name']; ?></td>
				<td class="tal vat w200p"><?php echo $task['description']; ?></td>
				<td class="tal vat w200p"><?php echo $task['due_date']; ?></td>
			</tr>
		<?php } ?>
	<?php }else{ ?>
		<tr>
			<td colspan="2" class="pt10p tac red">No Details Available</td>
		</tr>
	<?php } ?>
	<tr>
		<td colspan="2" class="tal vat"><a href="add.php" style="text-decoration:none;"><input type="button" value="Add New Task" class="button"/></a></td>
	</tr>
	
</table>