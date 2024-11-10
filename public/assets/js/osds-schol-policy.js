$(document).ready(function() 
{
	$("#btnadd").click(function() //Add open Modal
	{
		$('#AddModal').modal('show');  
		$('#btnsubmit_spolicy').show();
		$('#btnupdate_spolicy').hide();
	});

	$("#add_scholarship").change(function () //fetch scholarship program per selected scholarship
	{
		$('#add_scholarship_program').empty();
		$("#add_scholarship_program").prepend('<option value="" disabled="disabled" selected>No Scholarship added</option>');

		var scholarship_id    = $("#add_scholarship").val();
		  var data =  { id : scholarship_id };

		$.ajax({
			url: "/fetch-scholarship-program",
			method: 'POST',
			data: data,
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			dataType: "JSON",
			success:function(data)
			{
				$('#add_scholarship_program').empty();
				if(data.success == true)
				{
					data.result.forEach(function(value, index, arr)
					{
						$('#add_scholarship_program').append( new Option(value["scholarship_program"],value["sp_id"]) );
					});
				}
			}
		});
	});

	$("#filter_ay").change(function ()
	{
		var rex = new RegExp($('#filter_ay').val());
		if(rex =="/All/")
		{
			clearFilter();
		}
		else
		{
			$('.content').hide();
			$('.content').filter(function() 
			{
				return rex.test($(this).text());
			}).show();
		}
	});

	$("#filter_scholarship").change(function ()
	{
		var rex = new RegExp($('#filter_scholarship').val());
		if(rex =="/All/")
		{
			clearFilter();
		}
		else
		{
			$('.content').hide();
			$('.content').filter(function() 
			{
			return rex.test($(this).text());
			}).show();
		}
	});

	function clearFilter()
	{
		$("#filter_scholarship").val("All");
		$('.content').show();
	}

	$("#filter_ay").change(function ()
	{

	});

	$("#btnsubmit_spolicy").click(function()
	{
		var sp_id      			= $("#add_scholarship_program").val();
		var ay 					= $("#add_ay").val();
		var no_defernment  		= $("#add_defernment").val();
		var min_grade  			= $("#add_grade_new").val();
		var ongoing_min_grade  	= $("#add_grade_ongoing").val();
		var amount_per_year  	= $("#add_apy").val();
		var hei_type  			= $("#add_heitype").val();
		var fund  				= $("#add_fund").val();
		var slots  				= $("#add_slots").val();

		  var data =  { 
						sp_id  	 			: sp_id,
						ay 					: ay,
						no_defernment 		: no_defernment,
						min_grade			: min_grade,
						ongoing_min_grade	: ongoing_min_grade,
						amount_per_year		: amount_per_year,
						hei_type			: hei_type,
						fund				: fund,
						slots				: slots,
					};
				
		$.ajax({
			url: "/save-schol-policy",
			method: 'POST',
			data: data,
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			dataType: "JSON",
			success:function(data)
			{
				if(data.success == true)
				{
					Swal.fire({
								icon: 'success',
								title: "Save!",
								text: "Scholarship Program was successfully saved.",
								showCancelButton: false,
								allowOutsideClick: false,
								confirmButtonColor: "#08BDE1",
								confirmButtonText: "Okay",
							}).then((result) => {
							if (result.isConfirmed) 
							{
							window.location.href = "{{route('osds-schol-policy')}}";
						}
					})
				}
			}
		});
	}); 

	$("#btnupdate_spolicy").click(function() //UPDATE scholarship program policy per selected scholarship
	{
		var spolicy_id = 			$('#spolicy_id').val();
		var ay = 					$('#add_ay').val();
		var sp_id = 				$('#add_scholarship_program').val();
		var scholarship_id = 		$('#add_scholarship').val();
		var hei_type = 				$('#add_heitype').val();
		var min_grade = 			$('#add_grade_new').val();
		var ongoing_min_grade = 	$('#add_grade_ongoing').val();
		var fund = 					$('#add_fund').val();
		var amount_per_year = 		$('#add_apy').val();
		var no_defernment =			$('#add_defernment').val();
		var slots =					$('#add_slots').val();

		var data =  { 
						spolicy_id 				: spolicy_id,
						ay  	 				: ay,
						sp_id 					: sp_id,
						scholarship_id 			: scholarship_id,
						hei_type				: hei_type,
						min_grade				: min_grade,
						ongoing_min_grade		: ongoing_min_grade,
						fund					: fund,
						amount_per_year			: amount_per_year,
						no_defernment			: no_defernment,
						slots					: slots,
					};

	
		$.ajax({
			url: "/update-schol-policy",
			method: 'POST',
			data: data,
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			dataType: "JSON",
			success:function(data)
			{
				if(data.success == true)
				{
					Swal.fire({
								icon: 'success',
								title: "Updated!",
								text: "Scholarship Policy was successfully updated.",
								showCancelButton: false,
								allowOutsideClick: false,
								confirmButtonColor: "#08BDE1",
								confirmButtonText: "Okay",
							}).then((result) => {
							if (result.isConfirmed) 
							{
							window.location.href = "{{route('osds-schol-policy')}}";
						}
					})
				}
			}
		});
	});

	$(".policy-delete-form").click(function() //DELETE scholarship program policy per selected scholarship
	{
		var spolicy_id = 			$(this).closest('tr').find('td:eq(0)').html(); 
		var data =  { id : spolicy_id, };

		Swal.fire({
			icon: 'warning',
			title: "DELETE?",
			text: "Are you sure you want to delete the selected scholarship program policy?",
			showCancelButton: true,
			confirmButtonColor: "#E92A02",
			confirmButtonText: "Yes, Delete it!",
			}).then((result) => {
			if (result.isConfirmed) 
			{
				$.ajax({
					url: "/delete-schol-policy",
					method: 'POST',
					data: data,
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					dataType: "JSON",
					success:function(data)
					{
						if(data.success == true)
						{
							Swal.fire({
								icon: 'success',
								title: "Deleted!",
								text: "Scholarship Program was successfully deleted.",
								showCancelButton: false,
								allowOutsideClick: false,
								confirmButtonColor: "#08BDE1",
								confirmButtonText: "Okay",
							}).then((result) => {
								if (result.isConfirmed) 
								{
									window.location.href = "{{route('osds-schol-policy')}}";
								}
							})
						}
					}
				})
			}
		});
	}); 

	$(".policy-edit-form").click(function()
	{
		$('#AddModal').modal('show');  
		$('#btnsubmit_spolicy').hide();
		$('#btnupdate_spolicy').show();

		var spolicy_id = 			$(this).closest('tr').find('td:eq(0)').html(); 
		var ay = 					$(this).closest('tr').find('td:eq(1)').html(); 
		var sp_id = 				$(this).closest('tr').find('td:eq(2)').html(); 
		var scholarship_id = 		$(this).closest('tr').find('td:eq(3)').html(); 
		var scholarship_code = 		$(this).closest('tr').find('td:eq(4)').html(); 
		var code = 					$(this).closest('tr').find('td:eq(5)').html(); 
		var scholarship_program = 	$(this).closest('tr').find('td:eq(6)').html(); 
		var hei_type = 				$(this).closest('tr').find('td:eq(7)').html(); 
		var min_grade = 			$(this).closest('tr').find('td:eq(8)').html(); 
		var ongoing_min_grade = 	$(this).closest('tr').find('td:eq(9)').html(); 
		var fund = 					$(this).closest('tr').find('td:eq(10)').html(); 
		var amount_per_year = 		$(this).closest('tr').find('td:eq(11)').html(); 
		//var status =				$(this).closest('tr').find('td:eq(12)').html(); 
		var no_defernment =			$(this).closest('tr').find('td:eq(12)').html(); 
		var slots =					$(this).closest('tr').find('td:eq(13)').html(); 

		$('#spolicy_id').val(spolicy_id);
		$("#add_scholarship").val(scholarship_id).trigger('change');
		$('#add_scholarship').trigger('change');
		$('#add_scholarship_program').val(sp_id);
		$('#add_ay').val(ay);
		$('#add_defernment').val(no_defernment);
		$('#add_grade_new').val(min_grade);
		$('#add_grade_ongoing').val(ongoing_min_grade);
		$('#add_apy').val(amount_per_year);
		$('#add_heitype').val(hei_type);
		$('#add_fund').val(fund);
		$('#add_slots').val(slots);

	}); 

});