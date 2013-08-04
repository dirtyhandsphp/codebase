<table cellspacing="4" cellpadding ="4" border ="0" width="100%">
	<tr>
		<td colspan="2" class="tal vat page_title">
			<div id="page_title"><h2>Show Task Report</h2></div>
			<?php 
				if(isset($errors)){
					foreach($errors as $error){ ?>
						<div class="error"><?php echo $error; ?></div>
					<?php }
				}
				if(isset($messages)){
					foreach($messages as $message){ ?>
						<div class="message"><?php echo $message; ?></div>
					<?php }
				}
				
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="tal vat" style="width:50%">
			<form name="show_report" method="post" action="index.php">
				<div class="row">
					<div class="field_label">Select User <font class="red">*</font> : </div>
					<div class="field_box">
						<select name="user_id" class="w300p">
							<option value="0">Select User</option>
							<?php 
								if(isset($users) && !empty($users)){
									foreach($users as $user){
										if($user['id'] == $_POST['user_id']){
											$str = "selected = 'selected'";
										}else{
											$str = '';
										}
										echo "<option value='".$user['id']."' $str>".$user['name']."</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				<div>&nbsp;</div>
				<div class="row">
					<div class="field_label">&nbsp;</div>
					<div class="field_box"><input type="submit" class="button" value="Show Report" /></div>
				</div>
			</form>
		</td>
	</tr>
	<?php if(isset($_POST) && (isset($_POST['user_id']) && $_POST['user_id'] != 0)) { ?>
	<tr>
		<td class="tal vat" colspan="2">
			<table cellspacing="4" cellpadding="4" width="100%">
				<tr>
					<th class="tal vat w200p">User Name</th>
					<th class="tal vat w200p">Task Description</th>
					<th class="tal vat w200p">Due Date</th>
				</tr>
				<?php if(isset($user_task_details) && !empty($user_task_details)) { ?>
					<?php foreach($user_task_details as $user_task_detail){ ?>
						<tr>
							<td class="tal vat w200p"><?php echo $user_task_detail['name']; ?></td>
							<td class="tal vat w200p"><?php echo $user_task_detail['description']; ?></td>
							<?php $str = ''; ?>
							<?php if(countDays($user_task_detail['due_date']) <= 4) { ?>
								<?php $str = 'red fwb'; ?>
							<?php } ?>
							<td class="tal vat w200p <?php echo $str; ?>"><?php echo $user_task_detail['due_date']; ?></td>
						</tr>
					<?php } ?>
				<?php }else{ ?>
					<tr><td colspan="3" class="red tac">No Details Available</td></tr>
				<?php } ?>
			</table>
		</td>
	</tr>	
	
	<?php } ?>
</table>