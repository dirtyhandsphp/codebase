<table cellspacing="4" cellpadding ="4" border ="0" width="100%">
	<tr>
		<td colspan="2" class="tal vat page_title">
			<div id="page_title"><h2>Add New User</h2></div>
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
			<form name="add_user" method="post" action="add.php">
				<div class="row">
					<div class="field_label">User Name <font class="red">*</font> : </div>
					<div class="field_box"><input type="text" class="w300p" name="name" value="<?php echo (isset($user_detail['name']) ? $user_detail['name']: ''); ?>" /></div>
				</div>
				<div>&nbsp;</div>
				<div class="row">
					<div class="field_label">Email Address <font class="red">*</font> : </div>
					<div class="field_box"><input type="text" class="w300p" name="email" value="<?php echo (isset($user_detail['email']) ? $user_detail['email']: ''); ?>" /></div>
				</div>
				<div>&nbsp;</div>
				<div class="row">
					<div class="field_label">&nbsp;</div>
					<div class="field_box"><input type="submit" class="button" value="Save" /></div>
				</div>
			</form>
			
		</td>
		
	</tr>
</table>


<script language="javascript">
	
	$(document).ready(function(){
		
		$('#trade_name').val($('#customer_id').val());
		load_trucks($('#customer_id').val(),$('#quarter_id').val());
		
		$('#customer_id').change(function(){
			customer_id = $(this).val();
			$('#trade_name').val(0);
			$('#trade_name').val(customer_id);
			load_trucks(customer_id,$('#quarter_id').val());
		});
		
		$('#trade_name').change(function(){
			trade_key = $(this).val();
			$('#customer_id').val(trade_key);
			load_trucks(trade_key,$('#quarter_id').val());
		});
		
		$('#quarter_id').change(function(){
			customer_id = $('#customer_id').val();
			quarter_id  = $(this).val();
			load_trucks(customer_id,quarter_id);
		});
		
		function load_trucks(customer_id,quarter_id){
			$.ajax({
				type : "POST",
				url  : '/transport/mileage_details/get_trucks/',
				data : {'customer_id' : customer_id, quarter_id : quarter_id},
				success : function(data){
					if(data){
						$("#truck_id").html(data);
					}
				}
			});
		}
	});
</script>


<?php 
    //$this->Excel->excelWriter(); 
?>