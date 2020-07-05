// if(isset($_POST['insert'])) {
// 	$glCode = $_POST['key'];
// 	$value = $_POST['value'];
	
// 	echo '<script>alert("AJAX request successful!");</script>';
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">

  <title>Add Journal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<style>
		.show { display: none; }
		.err-msg {  }
		.editable { border: dotted 2px red; }
	</style>
<body>
	
<div class="container p-5">
	<div class="col-md-12 border p-5">
		<a href="index.php?exit" class="btn btn-danger" name="exit" id="exit"><-Exit</a><br><br>
		<form action="#" method="POST">
			<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
			<input type="text" name="name" placeholder="Journal name" required>
			<input type="text" name="reference" placeholder="Reference" required>
			<br><br>
			<table class="table table-striped table-sm">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Date</th>
<!-- 				  <th scope="col">Name</th>
				  <th scope="col">Reference</th> -->
				  <th scope="col">Acount Name</th>
				  <th scope="col">Debit</th>
				  <th scope="col">Credit</th>
				  <th></th>
				</tr>
			  </thead>
			  <tbody id="data">
				  
			  </tbody>
			</table>
			<input type="submit" class="btn btn-primary" value="Submit" name="submit" id="submit">
			<input type="button" class="btn btn-info" name="insertBtn" id="insertBtn" value="Insert" data-target="#insert_form" data-toggle="modal">
		</form>
			
		<div class="modal fade" id="insert_form" tabindex="-1" role="dialog" aria-labelledby="insert_form" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="insert_form">Add data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
			<!--MODAL FORM-->
				<form action="#">
					<div class="form-group mb-2">
						<label for="date">Date</label>
						<input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" />
					</div>
					<div class="form-group mb-2">
						<label for="account_name">Account Name</label>&nbsp;<span id="acct_err_msg" class="text-danger"></span>
						<select id="account_name" class="form-control" name="account_name" placeholder="Account Name" required>
							<option></option>
							<option value="1" data-key="debit">Cash-in Bank</option>
							<option value="2" data-key="debit">Cash on Hand</option>
							<option value="3" data-key="debit">AR Loan</option>
							<option value="4" data-key="credit">AP Savings</option>
							<option value="5" data-key="credit">Interest</option>
							<option value="6" data-key="credit">Service fee</option>
							<option value="7" data-key="credit">Penalty others</option>
							<option value="8" data-key="credit">Equity Captial</option>
							<option value="9" data-key="credit">Recover income</option>
							<option value="10" data-key="credit">Over Payment</option>
							<option value="11" data-key="debit">Expenses</option>
						</select>
					</div>
					<div class="form-group mb-3">
						<label for="account_name">Amount</label>&nbsp;&nbsp;<span id="amount_err_msg" class="text-danger"></span>
						<input type="number" class="form-control" name="amount" id="amount" required>
					</div>
					
					<input type="submit" class="btn btn-success btn-sm" name="insert" id="insert" value="Save">
				</form> 
			  </div>
			</div>
		  </div>
		</div>
			
<!-- 		<div class="show-form form-group col-md-12 text-center border p-3 modal fade" tabindex="-1" role="dialog" id="insert_form">
			<form action="#">
				<label for="account_name">Account Name</label>
				<select id="account_name" name="account_name" placeholder="Account Name" required>
					<option></option>
					<option value="1" data-key="debit">Cash-in Bank</option>
					<option value="2" data-key="debit">Cash on Hand</option>
					<option value="3" data-key="debit">AR Loan</option>
					<option value="4" data-key="credit">AP Savings</option>
					<option value="5" data-key="credit">Interest</option>
					<option value="6" data-key="credit">Service fee</option>
					<option value="7" data-key="credit">Penalty others</option>
					<option value="8" data-key="credit">Equity Captial</option>
					<option value="9" data-key="credit">Recover income</option>
					<option value="10" data-key="credit">Over Payment</option>
					<option value="11" data-key="debit">Expenses</option>
				</select>
				<label for="account_name">Amount</label>
				<input type="number" name="amount" id="amount" placeholder="Enter Amount" required>
				<input type="submit" class="btn btn-success btn-sm" name="insert" id="insert" value="Save">
			</form>
		</div>	 -->
	</div>
	
	
</div>

<script>

$(document).ready(function (){
	// var insertForm = document.getElementById('insert_form');
	// var insertBtn = document.getElementById('insertBtn');
	var d = new Date();
	
	
	function newDate(y, m, day){
		var nday = '';
		var nm = '';
		
		day = d.getDate();
		m = d.getMonth()+1;
		y = d.getFullYear();
		
		if(day<10){
			nday  = '0'+day;
		} else {
			nday = day;
		}
		if(day<10){
			nm  = '0'+m;
		} else {
			nm = m;
		}
		
		return y+"-"+nm+"-"+nday;
	}
	console.log(newDate());
	console.log(d);
	
	var acct = document.getElementById('account_name');
	var iid = 0;
	
	
	//Insert(save) button
	$('#insert').click(function (e) {
		
		if($('#account_name').val() == '') {
			$('#acct_err_msg').text('*You must select account name.');
			return false;
		}
		else if ($('#amount').val() == '' ) {
			$('#amount_err_msg').text('*Amount is required.');
			return false;
		}
		else {
			$('#acct_err_msg').text('');
			$('#amount_err_msg').text('');
		}
		
		e.preventDefault();
		var name = acct.options[acct.selectedIndex].text;
		var glCode = acct.options[acct.selectedIndex].getAttribute('data-key');
		var value = acct.selectedIndex;
		
		// console.log(name);
		// console.log(glCode);
		// console.log(value);
		
		var name = acct.options[acct.selectedIndex].text;
		var glCode = acct.options[acct.selectedIndex].getAttribute('data-key');
		var value = acct.selectedIndex;
		var amount = document.getElementById('amount').value;
		var debit = 0, credit = 0;
		++iid;
		
		if(glCode == 'debit'){
			debit = amount;
			credit = 0;
		} else {
			debit = 0;
			credit = amount;
		}
		var res_data = 
		'<tr id="row'+iid+'">'+
			'<td class="dDate">'+$('#date').val()+'</td>'+
			'<td class="dName">'+name+'</td>'+
			'<td class="dDebit">'+debit+'</td>'+
			'<td class="dCredit">'+credit+'</td>'+
			'<td class="action"><input type="button" class="update btn btn-sm btn-primary" name="update" value="edit">&nbsp;<input type="button" id="remove" class="remove btn btn-sm btn-danger" name="remove" value="x">&nbsp;</td>'+
		'</tr>';
		
		
		$.ajax({
		  method: "POST",
		  url: "<?php $_SERVER['PHP_SELF']; ?>",
		  data: res_data,
		  cache: false,
		  // dataType: 'json',
		  success: function(data){
				$('#data').append(res_data);
				console.log(res_data);
				$('.cancel').hide();
				$('#account_name').val('');
				$('#amount').val('');
			}
		});
		
	});//click insert
	
	//Remove button
	$(document).on('click', '.remove', function(e){
		var row_id = $(this).parents('tr').attr("id");
		console.log(row_id);
		if(e.target){
			if(confirm("Are you sure you want to remove this row data?"))
			{
				// var a = $(this).parents('tr').remove();
				$('#'+row_id+'').remove();
				console.log(row_id+' has been deleted.');
			}
			else
			{
				return false;
			}
		}//target
	});
	
	$(document).on('click', '.update', function(e) {
		var row_id = $(this).parents('tr').attr("id");
		if(e.target) {
			if( $('#'+row_id+'').hasClass('bg-warning') ) {
				return false;
			}
			else {
				console.log('EDIT '+row_id);
				$('#'+row_id+'').addClass('bg-warning');
				$('#'+row_id+'').children().attr('contentEditable', 'true');

				//disable editing in td#action
				$(this).parents('td').removeAttr('contentEditable');
				$(this).parents('td.action').append('<input type="button" id="save'+iid+'" class="save-changes btn btn-sm btn-info" name="save-changes" value="Save changes" />');
			}
			
		}//if target
		else {
			return false;
		}//else target
	
		// e.preventDefault();
		
	});
	
	$(document).on('click', '.save-changes', function(e){
		var id = $(this).parents('tr').attr('id');
		// e.preventDefault();
		if(e.target) {
			console.log('save-changes '+id);
			$('#'+id+'').removeClass('bg-warning');
			$('#'+id+'').children().removeAttr('contentEditable');
			$(this).remove();
		}
		else {
			return false;
		}
	});
	
});//document.ready
</script>
</body>
</html>
<?php

// $datetime = date('Y-m-d H:i:s'); 
// $date = date('Y-m-d');

// $id = $_POST['id'];
// $name = $_POST['name'];
// $reference = $_POST['reference'];
// $account_name = $_POST['account_name'];
// $debit = $_POST['debit'];
// $credit = $_POST['credit'];

// // if(isset($_POST['insert'])){
// // 	echo $account_name;	
// // 	echo $credit;
// // 	echo $debit;
// // }

// if(isset($_POST['insert'])){
// 	sc_exec_sql("INSERT INTO journal_entries (id,date,created_at,transaction_type,name,reference,account_id,credit,debit) VALUES('', '$date', '$datetime', 'manual_entry', NULL, NULL, '$account_name', '$credit', '$debit') ");
// 	sc_redir(form_add_journal);
// }

// if(isset($_POST['save'])){
// 	sc_exec_sql("UPDATE journal_entries SET date='$date', updated_at='$datetime', name='$name', reference='$reference' WHERE name IS NULL AND reference IS NULL");
// 	sc_redir(form_add_journal);
// }

// if(isset($_GET['delete'])){
// 	$journal_id = $_GET['delete'];
// 	sc_exec_sql("DELETE FROM journal_entries WHERE id='$journal_id' ");
// 	sc_redir(form_add_journal);
// }

// if(isset($_GET['exit'])){
// 	// sc_exit(sel);
// 	sc_redir(add_journal_entries, "", "_parent");
// }


