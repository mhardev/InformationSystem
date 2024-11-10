$(document).ready(function() {
    $("#btnsubmit").click(function()
    {
        var unit_id      		= $("#add_unit_id").val();
        var scholarship 		= $("#add_Scholarship").val();
        var scholarship_code  	= $("#add_code").val();
        var eligible  			= $("#add_eligible").val();

          var data =  { 
                        unit_id  	 		: unit_id,
                        scholarship 		: scholarship,
                        scholarship_code 	: scholarship_code,
                        eligible			: eligible,
                    };
                
        $.ajax({
            url: "/save-scholarship",
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
                            window.location.href = "{{route('osds-schol-program')}}";
                        }
                    })
                }
            }
        });
    }); 

    $("#btnupdate").click(function()
    {
        var id      			= $("#schol_edit_id").val();
        var unit_id      		= $("#edit_unit_id").val();
        var scholarship 		= $("#edit_Scholarship").val();
        var scholarship_code  	= $("#edit_code").val();
        var eligible  			= $("#edit_eligible").val();

          var data =  { 
                        id 					: id,
                        unit_id  	 		: unit_id,
                        scholarship 		: scholarship,
                        scholarship_code 	: scholarship_code,
                        eligible			: eligible,
                    };

        $.ajax({
            url: "/edit-scholarship",
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
                                text: "Scholarship Program was successfully updated.",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#08BDE1",
                                confirmButtonText: "Okay",
                            }).then((result) => {
                            if (result.isConfirmed) 
                            {
                            window.location.href = "{{route('osds-schol-program')}}";
                        }
                    })
                }
            }
        });
    }); 

    $(".edit-form").click(function()
    {
        var btnid      = this.id;
        var id = btnid.replace('btnedit.','');
        var data = { id : id};

        $.ajax({
        url: "/scholarship-details",
        method: 'POST',
        data: data,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: "JSON",
        success:function(data)
        {
            data.result.forEach(function(value, index, arr)
            {
                $('#schol_edit_id').val(id);
                $('#edit_unit_id').val(value["unit_id"]);
                $('#edit_Scholarship').val(value["scholarship"]);
                $('#edit_code').val(value["scholarship_code"]);
                $('#edit_eligible').val(value["eligible"]);
            });
        }
        });
    }); 

    $(".delete-form").click(function()
    {
        var btnid      = this.id;
        var id = btnid.replace('btndelete.','');
        var data = { id : id};
        Swal.fire({
                        icon: 'warning',
                        title: "DELETE?",
                        text: "Are you sure you want to permamnently delete the submitted enrollment list?",
                        showCancelButton: true,
                        confirmButtonColor: "#E92A02",
                        confirmButtonText: "Yes, Delete it!",
                }).then((result) => {
                    if (result.isConfirmed) 
                    {
                        $.ajax({
                                url: "/delete-scholarship",
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
                                                window.location.href = "{{route('osds-schol-program')}}";
                                            }
                                        })
                                    }
                                }
                        });
                    }
                });
    }); 
});