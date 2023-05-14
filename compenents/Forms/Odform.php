<div class="container">
	<div class="col-lg-12">
		<div class="row p-2">
			<span class="text-uppercase h2 font-weight-bold text-primary">STAFF FACULTY</span>
		</div>
		<div class="border-top border-warning">&nbsp;</div>
		<form method="post"> 
			<div class="row">
		        <div class="col-lg-3 form-group">
					<label class="text-info">Staff Name</label>
					<input type="text" class="form-control" name="staff_name" id="staff_name">
				</div>	
			
			    <div class="col-lg-3 form-group">
					<label class="text-info">Staff ID</label>
					<input type="text" class="form-control" name="staff_id" id="staff_id">
				</div>
			</div>	
		    <div class="row">
		        <div class="col-lg-3 form-group"> 
					<label class="text-info">Department</label>
					<select class="form-control" name="department" id="department">
                    <option value="">--Select--</option>
                    <option value="num1">Computer Science</option>
                    <option value="num2">Physics</option>
                    <option value="num2">Maths</option>
                    <option value="num2">Chemistry</option>
                    </select>
				</div>
			</div>	
			<div class="row">
			<div class="col-lg-3 form-group">    
                    <label class="text-info">From Date</label>
					<input type="date" name="from_date" id="from_date" class="form-control">
			</div>
			<div class="col-lg-3 form-group">    
                    <label class="text-info">To Date</label>
					<input type="date" name="to_date" id="to_date" class="form-control">
			</div>
		    </div>
			<div class="row">
		    <div class="col-lg-3 form-group"> 
					<label class="text-info">No of Days</label>
					<input type="text" class="form-control" name="days" id="days" >
			</div>
			</div>
			<div class="row">
			<div class="col-lg-3 form-group">
		            <label class="text-info">Reason</label>
					<input type="text" class="form-control" name="reason" id="reason">
			</div>
			</div>	
			<div class="row">
				<div class="col-lg-3 form-group">
             <div class="file btn btn-lg btn-primary"> Upload 
             	<input type="file" name="file" id="file">
             </div>	
            </div>
                </div>

            <!-- <?php
            foreach ($row_dept as $row) {
              echo '<option value="'.$row['staff_name'].'">'.$row['staff_id'].'</option>';
            }
            ?> -->
           </select>
				</div> 
			<div class="row">	
				<div class="col-lg-3 form-group">
					<label>&nbsp;</label>
					<button type="button" class="form-control btn btn-secondary" onclick="fn_gen_staff()">Submit</button>
				</div>
				<div class="col-lg-3 form-group">
					<label>&nbsp;</label>	
					<button type="button" class="form-control btn btn-secondary" onclick="fn_reset_staff()">Clear</button>
				</div>
			</div>
		</form>
		<hr>
<div class="row" id="staff_list">
	</div>
</div>
<!-- 
<script type="text/javascript">
	fn_list_staff();
	function fn_get_data(){
		var data = {chk:"add_staff",staff_name:$("#staff_name").val().trim(),staff_id:$("#staff_id").val().trim(),department:$("#department").val().trim(),from_date:$("#from_date").val().trim(),to_date:$("#to_date").val().trim(),days:$("#days").val().trim(),reason:$("#reason").val().trim(),file:$("#file").val().trim()}
		return data;
	}
	function fn_gen_staff(){
		 //alert();
		let data = fn_get_data();
		console.log(data);
		if(data.staff_name == ''){
			swal('Please enter staff_name.');
		}else if(data.staff_id == ''){
			swal('Please enter staff_id.');
		}else if(data.department == ''){
			swal('Please enter department.');
		}else if(data.from_date == ''){
			swal('Please enter from_date.');
		}else if(data.to_date == ''){
			swal('Please enter to_date.');
		}else if(data.days == ''){
			swal('Please enter days.');
		}else if(data.reason == ''){
			swal('Please enter reason.');
		}else if(data.file == ''){
			swal('Please enter file.');
		}
		else{
			$.ajax({
			    url : "pages/data-store.php",
			    method : "post",
			    data : data
		 	})
		 	.done(function(data){
		        //alert(data);
		        var obj = JSON.parse(data);
		        if(obj.status == 'Ok'){
		        	swal('Saved!','Your data has been Saved','success');
			        fn_reset_staff();
			        fn_list_staff();
		        }
		        if(obj.status == 'Nok'){
			       swal('Error!','Error-'+obj.err_msg,'warning');
		        }
		    });
		}
	}

	function fn_reset_staff(){
		$("#staff_name").val('');
		$("#staff_id").val('');
		$("#department").val('');
		$("#from_date").val('');
		$("#to_date").val('');
		$("#days").val('');
		$("#reason").val('');
		$("#file").val('');
	}

	function fn_edit_staff(code) {
		$.ajax({
		    url : "pages/data-source.php",
		    method : "get",
		    data : {chk :"get_staff_details",id:code},
		    dataType:"json"
	 	})
	 	.done(function(data){
	 		console.log(data);
	 		$("#staff_name").val(data[0].staff_name);
	 		$("#staff_id").val(data[0].staff_id);
	        $("#department").val(data[0].department);
			$("#from_date").val(data[0].from_date);
			$("#to_date").val(data[0].to_date);
			$("#days").val(data[0].days);
			$("#reason").val(data[0].reason);
			$("#file").val(data[0].file);
	    });
	}

	function fn_list_staff() {
		$.ajax({
		    url : "pages/table-view.php",
		    method : "get",
		    data : {chk :"list_staff"},
	 	})
	 	.done(function(data){
	 		$("#staff_list").html(data);
	 	});
	}
</script> -->
	