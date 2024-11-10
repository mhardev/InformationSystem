<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
  		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

        <title>CSFGAS</title>

		<!-- Favicons -->
		<!-- <link href="{{ URL::asset('public/assets/img/favicon.png') }}" rel="icon">
		<link href="{{ URL::asset('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> -->

		<!-- Google Fonts -->
		<link href="https://fonts.gstatic.com" rel="preconnect">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Google Icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        <!-- Vendor CSS Files -->
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
		<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
		<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
		<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
		<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
		<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- Template Main CSS File -->
		<link href="assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

		<style type="text/css">
			label.error {
				margin-top: 10px;
				color: red;
				font-size: 15px;
				font-weight: bold;
			}

			label.error:before {
				content: '* ';
				color: red;
			}

			input.error, select.error {
				border: 2px solid red;
			}

            .form-content {
                height: 40vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .row-form {
                background-color: #b1b3b4;
                border: 2px dashed #6c757d;
                border-radius: 7px;
                width: 80%;
                padding: 1rem;
                text-align: center;
                font-size: 1.125rem;
                max-width: none;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            .row-form:hover {
                background-color: #6c757d;
                color: #fff;
            }

            .form-icon {
                color: #fff;
                font-size: 4rem;
            }

            .drop-container {
                position: relative;
                display: flex;
                gap: 10px;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 10px;
                margin-top: 1rem;
                margin-bottom: 0.4rem;
                color: #fff;
                font-size: 20px;
                text-align: center;
                transition: color .2s ease-in-out;
                cursor: pointer;
                transition: background .2s ease-in-out, border .2s ease-in-out
            }

            .drop-container:hover {
                color: #fff;
            }

            #prc-import-file {
                width: auto;
                max-width: none;
                color: #444;
                padding: 2px;
                border-radius: 4px;
                border: 1px solid #444;
            }

            #prc-import-file::file-selector-button {
                margin-right: 20px;
                border: none;
                background: #007bff;
                padding: 10px 20px;
                border-radius: 4px;
                color: #fff;
                cursor: pointer;
                transition: background .2s ease-in-out;
            }

            #prc-import-file::file-selector-button:hover {
                background: blue;
            }
		</style>

    </head>
    <script type="text/javascript">
		var APP_URL = {!! json_encode(url('/')) !!}

    //Script for CHECKS E5
    $(document).ready(function()
    {
        function clear_icon() {
            $('#full_name_icon').html('');
            $('#ftpt_code_icon').html('');
            $('#gender_icon').html('');
            $('#hda_code_icon').html('');
            $('#ptd_code_icon').html('');
        }

        function update_url(page, sort_by, sort_type, query, member_type) {
            let url = `?page=${page}`;
            if (sort_by) {
                url += `&sortby=${sort_by}&sorttype=${sort_type}`;
            }
            if (query.length > 0) {
                url += `&search=${encodeURIComponent(query)}`;
            }
            if (member_type && member_type !== 'All') {
                url += `&level=${member_type}`;
            }
            history.pushState(null, '', url);
        }

        // Fetch data function
        function fetch_data(page, sort_type, sort_by, query, member_type) {
            $.ajax({
                url: "/form-e5",
                method: 'GET',
                data: {
                    page: page,
                    sortby: sort_by,
                    sorttype: sort_type,
                    search: query,
                    member_type: member_type
                },
                success: function(response) {
                    $('#table-checks-e5 tbody').html('');
                    let counter = (response.current_page - 1) * response.per_page + 1;
                    $.each(response.data, function(index, item) {
                        let imageUrl = item.image_url ? '/public/storage/photos/' + item.image_url : '/public/storage/photos/image.jpg';
                        $('#table-checks-e5 tbody').append(`
                            <tr style="font-size: 14px">
                                <td style="display:none;">${item.ID}</td>
                                <th scope="row">${counter++}</th>
                                <td>
                                    <div>
                                        <img src="${imageUrl}" width="32px" style="border-radius: 50%;">
                                        ${item.full_name}
                                    </div>
                                </td>
                                <td>${item.ftpt_code}</td>
                                <td>${item.gender == '1' ? '<label>Male</label>' : item.gender == '2' ? '<label>Female</label>' : ''}</td>
                                <td>${item.hda_code}</td>
                                <td>${item.ptd_code}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" id="btnEdit.${item.ID}" class="btn btn-primary btn-sm edit-form" data-bs-toggle="modal" data-bs-target="#AddModal">
                                            <i class="ri-edit-2-line" style="font-size: 14px"></i>
                                        </button>
                                        <button type="button" id="btnDelete.${item.ID}" class="btn btn-danger btn-sm delete-form">
                                            <i class="ri-delete-bin-5-line" style="font-size: 14px"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                    $('#e5-pagination').html(response.pagination_html);
                }
            });
        }

        // Capture pagination clicks
        $('#table-checks-e5 tbody').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var e5_page = $(this).attr('href').split('page=')[1];
            var e5_search = $('#e5-search').val();
            var member_type = $('#faculty-type').val();
            var sort_by = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            fetch_data(e5_page, sort_by, sort_type, e5_search, member_type);
            update_url(e5_page, sort_by, sort_type, e5_search, member_type);
        });

        // Capture search input
        $('#e5-search').on('keyup', function() {
            var e5_search = $(this).val().trim();
            var e5_page = 1;
            var member_type = $('#faculty-type').val();
            var sort_by = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            fetch_data(e5_page, sort_by, sort_type, e5_search, member_type);
            update_url(e5_page, sort_by, sort_type, e5_search, member_type);
        });

        // Capture member type change
        $('#faculty-type').on('change', function() {
            var member_type = $(this).val();
            var e5_search = $('#e5-search').val();
            var e5_page = 1;
            var sort_by = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            fetch_data(e5_page, sort_by, sort_type, e5_search, member_type);
            update_url(e5_page, sort_by, sort_type, e5_search, member_type);
        });

        // Capture sorting clicks
        $('#table-checks-e5').on('click', '.sorting', function() {
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = order_type === 'asc' ? 'desc' : 'asc';
            $(this).data('sorting_type', reverse_order);

            clear_icon();
            if (reverse_order === 'asc') {
                $('#' + column_name + '_icon').html('<span class="bi bi-caret-up-fill"></span>');
            } else {
                $('#' + column_name + '_icon').html('<span class="bi bi-caret-down-fill"></span>');
            }

            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);

            var e5_page = 1;  // Always start at the first page when sorting
            var e5_search = $('#e5-search').val();
            var member_type = $('#member-type').val();

            fetch_data(e5_page, reverse_order, column_name, e5_search, member_type);
            update_url(e5_page, column_name, reverse_order, e5_search, member_type);
        });

        //ADD open Modal
        $('#btnAdd').ready(function()
        {
            $('#AddModal').modal();
            $('#btnSubmit_checksE5').show();
            $('#btnUpdate_checksE5').hide();
            resetSubjectTaughtTable();
            addSubjectRow();
        });

        $("#AddModal").on("hidden.bs.modal", function()
        {
            $('#formAddFaculty')[0].reset();
            $('#btnSubmit_checksE5').show();
            $('#btnUpdate_checksE5').hide();
            $('#AddModalLabel').text('Add Faculty Member');
            resetSubjectTaughtTable();
        });

        $('#btnImport').ready(function ()
        {
            $('#ImportModal').modal();
        });

        $("#ImportModal").on("hidden.bs.modal", function()
        {
            $('#formImportFaculty')[0].reset();
        });

        $(".required-field").on("input change", function()
        {
            $(this).closest(".input-group.mb-1").next(".error-message").remove();
        });

        $(document).on("input change", ".subject, .unit", function() {
            $(this).next(".error-message").remove();
        });

        // Reset Subject taught table
        function resetSubjectTaughtTable() {
            $('#add_subject_taught').empty();
            $('#total_units').text('Total units: 0');
        }

        // Hide subject taught table based on member type
        toggleSubjectTaughtTable();

        $('#add_member_type').change(function() {
            toggleSubjectTaughtTable();
        });

        function toggleSubjectTaughtTable() {
            if ($('#add_member_type').val() === '2') {
                $('#subjectTaughtContainer').hide();
                resetSubjectTaughtTable(); // Clear table when hiding
            } else if ($('#add_member_type').val() === '1') {
                $('#subjectTaughtContainer').show();
            } else {
                $('#subjectTaughtContainer').show();
            }
        }

        //ADD faculty member
        $("#btnSubmit_checksE5").click(function(e)
        {
            e.preventDefault();
            $(".error-message").remove();

            let isValid = true;

            $(".required-field").each(function() {
                let elementType = $(this).prop("tagName").toLowerCase();
                let value = $(this).val();

                if (elementType === "select" && (value === "" || value === null)) {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                } else if ((elementType === "input") && $.trim(value) === "") {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                }
            });

            if ($('#add_member_type').val() === "1" || $('#add_member_type').val() === null) {
                let subjectRows = $('#add_subject_taught tr');
                if (subjectRows.length === 0) {
                    isValid = false;
                    $('#subjectTaughtContainer').after('<span class="error-message" style="color:red; font-size:12px;">At least one subject must be added</span>');
                } else {
                    subjectRows.each(function() {
                        let subjectInput = $(this).find('.subject').val();
                        let unitInput = $(this).find('.unit').val();
                        if ($.trim(subjectInput) === "" || $.trim(unitInput) === "") {
                            isValid = false;
                            $(this).closest('#subjectTaughtContainer').after('<span class="error-message" style="color:red; font-size:12px;">Both subject and unit are required.</span>');
                        }
                    });

                }
            }

            if (isValid) {
                var data = {
                    last_name: $("#add_last_name").val(),
                    first_name: $("#add_first_name").val(),
                    middle_initial: $("#add_middle_initial").val(),
                    member_type: $("#add_member_type").val(),
                    ftpt_ID: $("#add_fulltime_parttime").val(),
                    gender: $("#add_gender").val(),
                    hda_ID: $("#add_highest_degree_attained").val(),
                    programcode_ID_1: $("#add_primary_teaching_discipline").val(),
                    programcode_ID_2: $("#add_bachelors_degree").val(),
                    programcode_ID_3: $("#add_masters_degree").val(),
                    programcode_ID_4: $("#add_doctorate").val(),
                    pl_ID: $("#add_prof_license").val(),
                    tenure: $("#add_tenure").val(),
                    fr_ID: $("#add_faculty_rank").val(),
                    tl_ID: $("#add_teaching_load").val(),
                    subject_taught: $('#subject_taught').val(),
                    as_ID: $("#add_annual_salary").val()
                };

                $.ajax({
                    url: '/save-checks-e5',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Added!',
                                text: 'Faculty Member was successfully added.',
                                confirmButtonColor: "#08BDE1",
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{route('checks-e5')}}";
                                }
                            });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred while saving. Please try again.',
                            confirmButtonColor: "#e74c43",
                            confirmButtonText: 'Okay'
                        });
                    }
                });
            }
        });

        //EDIT faculty member
        $(document).on('click', '.edit-form', function(e)
        {
            $('#AddModal').modal();
            $('#btnSubmit_checksE5').hide();
            $('#btnUpdate_checksE5').show();
            $('#AddModalLabel').text('Edit Faculty Member');

            var btnid = this.id;
            var id = btnid.replace('btnEdit.', '');
            var data = { id: id };

            $.ajax({
                type: 'GET',
                url: "/checks-e5-details",
                data: data,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                dataType: "JSON",
                success: function(data) {
                    if (data.success) {
                        data.result.forEach((value) => {
                            $('#id').val(id);
                            $('#add_last_name').val(value["last_name"]);
                            $('#add_first_name').val(value["first_name"]);
                            $('#add_middle_initial').val(value["middle_initial"]);
                            $('#add_member_type').val(value["member_type"]);
                            $('#add_fulltime_parttime').val(value["ftpt_code"]);
                            $('#add_gender').val(value["gender"]);
                            $('#add_highest_degree_attained').val(value["hda_code"]);
                            $('#add_primary_teaching_discipline').val(value["ptd_code"]);
                            $('#add_bachelors_degree').val(value["bachelor_code"]);
                            $('#add_masters_degree').val(value["masters_code"]);
                            $('#add_doctorate').val(value["doctorate_code"]);
                            $('#add_prof_license').val(value["pl_code"]);
                            $('#add_tenure').val(value["tenure"]);
                            $('#add_faculty_rank').val(value["fr_code"]);
                            $('#add_annual_salary').val(value["as_code"]);

                            // Clear current subjects
                            $('#add_subject_taught').empty();
                            let subjectString = value['subject_taught'];
                            let subjects = subjectString.split(';');

                            let count = 1;
                            subjects.forEach(subjectItem => {
                                let parts = subjectItem.trim().match(/(.+)\s\((\d+)\)/);
                                if (parts) {
                                    let subjectName = parts[1];
                                    let unit = parts[2];
                                    let dynamicRowHTML = `
                                        <tr class="rowClass">
                                            <td class="row-index text-center">${count}</td>
                                            <td class="row-index text-center">
                                                <input class="form-control subject" type="text" value="${subjectName}" placeholder="Please don't use abbreviations" required>
                                            </td>
                                            <td class="row-index text-center">
                                                <input class="form-control unit" type="number" value="${unit}" min="0" placeholder="1" required>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-danger remove" type="button"><i class="ri-delete-bin-5-line" style="font-size: 14px"></i></button>
                                            </td>
                                        </tr>`;
                                    $('#add_subject_taught').append(dynamicRowHTML);
                                    count++;
                                }
                            });
                            updateTotalUnits();
                        });
                    }
                }
            });
        });

        //UPDATE faculty member
        $("#btnUpdate_checksE5").click(function(e)
        {
            e.preventDefault();
            $(".error-message").remove();

            let isValid = true;

            $(".required-field").each(function() {
                let elementType = $(this).prop("tagName").toLowerCase();
                let value = $(this).val();

                if (elementType === "select" && (value === "" || value === null)) {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                } else if ((elementType === "input") && $.trim(value) === "") {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                }
            });

            if ($('#add_member_type').val() === "1") {
                let subjectRows = $('#add_subject_taught tr');
                if (subjectRows.length === 0) {
                    isValid = false;
                    $('#subjectTaughtContainer').after('<span class="error-message" style="color:red; font-size:12px;">At least one subject</span>');
                } else {
                    subjectRows.each(function() {
                        let subjectInput = $(this).find('.subject').val();
                        let unitInput = $(this).find('.unit').val();
                        if ($.trim(subjectInput) === "" || $.trim(unitInput) === "") {
                            isValid = false;
                            $(this).closest('#subjectTaughtContainer').after('<span class="error-message" style="color:red; font-size:12px;">Both subject and unit are required.</span>');
                        }
                    });
                }
            }

            if (isValid) {
                var data = {
                    id: $("#id").val(),
                    last_name: $("#add_last_name").val(),
                    first_name: $("#add_first_name").val(),
                    middle_initial: $("#add_middle_initial").val(),
                    member_type: $("#add_member_type").val(),
                    ftpt_ID: $("#add_fulltime_parttime").val(),
                    gender: $("#add_gender").val(),
                    hda_ID: $("#add_highest_degree_attained").val(),
                    programcode_ID_1: $("#add_primary_teaching_discipline").val(),
                    programcode_ID_2: $("#add_bachelors_degree").val(),
                    programcode_ID_3: $("#add_masters_degree").val(),
                    programcode_ID_4: $("#add_doctorate").val(),
                    pl_ID: $("#add_prof_license").val(),
                    tenure: $("#add_tenure").val(),
                    fr_ID: $("#add_faculty_rank").val(),
                    tl_ID: $("#add_teaching_load").val(),
                    subject_taught: $('#subject_taught').val(),
                    as_ID: $("#add_annual_salary").val()
                };

                $.ajax({
                    type: 'POST',
                    url: '/update-checks-e5',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated!',
                                text: 'Faculty Member was successfully updated.',
                                confirmButtonColor: "#08BDE1",
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{route('checks-e5')}}";
                                }
                            });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred while updating. Please try again.',
                            confirmButtonColor: "#e74c43",
                            confirmButtonText: 'Okay'
                        });
                    }
                });
            }
        });

        //DELETE faculty member
        $(document).on('click', '.delete-form', function(e)
        {
            e.preventDefault();

            var btnid = this.id;
            var id = btnid.replace('btnDelete.', '');
            var data = { id: id };

            Swal.fire({
                title: 'DELETE?',
                text: "Are you sure you want to delete the selected faculty member in Form-E5?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete-checks-e5',
                        method: 'POST',
                        data: data,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        dataType: "JSON",
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: "Faculty Member was successfully Deleted.",
                                    confirmButtonColor: "#08BDE1",
                                    confirmButtonText: 'Okay'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: data.message || 'An error occurred while deleting. Please try again.',
                                    confirmButtonColor: "#e74c43",
                                    confirmButtonText: 'Okay'
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while deleting. Please check the console for more details.',
                                confirmButtonColor: "#e74c43",
                                confirmButtonText: 'Okay'
                            });
                        }
                    });
                }
            });
        });

        //Subject taught
        let count = 1;

        function addSubjectRow() {
            let dynamicRowHTML = `
            <tr class="rowClass">
                <td class="row-index text-center">${count}</td>
                <td class="row-index text-center">
                    <input class="form-control subject" type="text" placeholder="Please don't use abbreviations" required>
                </td>
                <td class="row-index text-center">
                    <input class="form-control unit" type="number" min="0" placeholder="1" required>
                </td>
                <td class="text-center">
                    <button class="btn btn-danger remove" type="button"><i class="ri-delete-bin-5-line" style="font-size: 14px"></i></button>
                </td>
            </tr>`;
            $('#add_subject_taught').append(dynamicRowHTML);
            count++;
        }

        $('#addSubject').click(function () {
            addSubjectRow();
        });

        $('#add_subject_taught').on('click', '.remove', function () {
            $(this).closest('tr.rowClass').remove();
            updateRowIndices();
            updateTotalUnits();
        });

        function updateRowIndices() {
            $('#add_subject_taught .rowClass').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
            count = $('#add_subject_taught .rowClass').length + 1;
        }

        $('#add_subject_taught').on('input', '.unit', function () {
            updateTotalUnits();
        });

        function updateTotalUnits() {
            let totalUnits = 0;
            let subjects = [];

            $('#add_subject_taught .rowClass').each(function() {
                const subject = $(this).find('.subject').val();
                const unit = parseInt($(this).find('.unit').val()) || 0;

                if (subject && unit) {
                    subjects.push(`${subject} (${unit})`);
                }

                totalUnits += unit;
            });

            $('#total_units').text(`Total units: ${totalUnits}`);
            $('#subject_taught').val(subjects.join('; '));
            $('#add_teaching_load').val(getTeachingLoadID(totalUnits));
        }

        function getTeachingLoadID(totalUnits) {
            if (totalUnits === 0) return 1;
            else if (totalUnits <= 6) return 2;
            else if (totalUnits <= 12) return 3;
            else if (totalUnits <= 18) return 4;
            else if (totalUnits <= 24) return 5;
            else return 6;
        }
    });

    //Script for CHECKS List of graduates
    $(document).ready(function()
    {
        function clear_icon() {
            $('#student_id_icon').html('');
            $('#Full_name_icon').html('');
            $('#Date_of_birth_icon').html('');
            $('#Sex_icon').html('');
            $('#Program_icon').html('');
            $('#Major_icon').html('');
        }

        function update_url(page, sort_by, sort_type, query, program_level) {
            let url = `?page=${page}`;
            if (sort_by) {
                url += `&sortby=${sort_by}&sorttype=${sort_type}`;
            }
            if (query.length > 0) {
                url += `&search=${encodeURIComponent(query)}`;
            }
            if (program_level && program_level !== 'All') {
                url += `&level=${program_level}`;
            }
            history.pushState(null, '', url);
        }

        function fetch_data(page, sort_type, sort_by, query, program_level) {
            $.ajax({
                url: "/form-prc",
                method: 'GET',
                data: {
                    page: page,
                    sortby: sort_by,
                    sorttype: sort_type,
                    search: query,
                    program_level: program_level
                },
                success: function(response) {
                    $('#table-checks-prc tbody').html('');
                    let counter = (response.current_page - 1) * response.per_page + 1;
                    $.each(response.data, function(index, item) {
                        $('#table-checks-prc tbody').append(`
                            <tr style="font-size: 14px">
                                <td style="display:none;">${item.ID}</td>
                                <th scope="row">${counter++}</th>
                                <td>${item.Student_ID}</td>
                                <td>${item.full_name}</td>
                                <td>${item.Date_of_birth}</td>
                                <td>${item.Sex}</td>
                                <td>${item.Program}</td>
                                <td>${item.Major ? item.Major : '<label>-</label>'}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" id="btnPRCEdit.${item.ID}" class="btn btn-primary btn-sm prc-edit-form" data-bs-toggle="modal" data-bs-target="#AddStudModal">
                                            <i class="ri-edit-2-line" style="font-size: 14px"></i>
                                        </button>
                                        <button type="button" id="btnPRCDelete.${item.ID}" class="btn btn-danger btn-sm prc-delete-form">
                                            <i class="ri-delete-bin-5-line" style="font-size: 14px"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                    $('#prc-pagination').html(response.pagination_html);
                }
            });
        }

        // Capture pagination clicks
        $('#table-checks-prc tbody').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var prc_page = $(this).attr('href').split('page=')[1];
            var prc_search = $('#prc-search').val();
            var program_level = $('#program-level').val();
            var sort_by = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();

            fetch_data(prc_page, sort_by, sort_type, prc_search, program_level);
            update_url(prc_page, sort_by, sort_type, prc_search, program_level);
        });

        // Capture search input
        $('#prc-search').on('keyup', function() {
            var prc_search = $(this).val().trim();
            var prc_page = 1;
            var program_level = $('#program-level').val();
            var sort_by = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();

            fetch_data(prc_page, sort_by, sort_type, prc_search, program_level);
            update_url(prc_page, sort_by, sort_type, prc_search, program_level);
        });

        // Capture program level change
        $('#program-level').on('change', function() {
            var program_level = $(this).val();
            var prc_search = $('#prc-search').val();
            var prc_page = 1;
            var sort_by = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();

            fetch_data(prc_page, sort_by, sort_type, prc_search, program_level);
            update_url(prc_page, sort_by, sort_type, prc_search, program_level);
        });

        // Capture sorting clicks
        $('#table-checks-prc').on('click', '.sorting', function() {
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = order_type === 'asc' ? 'desc' : 'asc';
            $(this).data('sorting_type', reverse_order);

            clear_icon();
            if (reverse_order === 'asc') {
                $('#' + column_name + '_icon').html('<span class="bi bi-caret-up-fill"></span>');
            } else {
                $('#' + column_name + '_icon').html('<span class="bi bi-caret-down-fill"></span>');
            }

            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);

            var prc_page = 1;  // Always start at the first page when sorting
            var prc_search = $('#prc-search').val();
            var program_level = $('#program-level').val();

            fetch_data(prc_page, reverse_order, column_name, prc_search, program_level);
            update_url(prc_page, column_name, reverse_order, prc_search, program_level);
        });

        $('#btnAddStud').ready(function()
        {
            $('#AddStudModal').modal();
            $('#btnSubmit_checksPRC').show();
            $('#btnUpdate_checksPRC').hide();
        });

        $("#AddStudModal").on("hidden.bs.modal", function()
        {
            $('#formAddStudent')[0].reset();
            $('#btnSubmit_checksPRC').show();
            $('#btnUpdate_checksPRC').hide();
            $('#AddStudModalLabel').text('Add Graduate Student');
        });

        $('#btnImportStud').on('click', function () {
            $('#ImportStudModal').modal('show');
        });

        $("#ImportStudModal").on("hidden.bs.modal", function () {
            $('#formImportGradStud')[0].reset();
        });

        // AJAX submission for the import form
        $('#formImportGradStud').on('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);

            $.ajax({
                url: '/import-checks-prc',
                type: 'POST',
                method: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#btnSubmit_import').prop('disabled', true); // Disable buttons to prevent multiple submissions
                },
                success: function (response) {
                    if (response.success) {
                        // Show success notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Import Successful',
                            text: 'Data has been successfully imported.',
                            confirmButtonColor: "#08BDE1",
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{route('checks-prc')}}";
                            }
                        });
                        $('#ImportStudModal').modal('hide');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Import Failed',
                            text: response.error,
                            confirmButtonColor: "#e74c43",
                            confirmButtonText: 'Okay'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'An error occurred',
                        text: xhr.responseJSON ? xhr.responseJSON.error : 'Unexpected error',
                        confirmButtonColor: "#e74c43",
                        confirmButtonText: 'Okay'
                    });
                },
                complete: function () {
                    $('#btnImport_checksPRC, #btnSubmit_import').prop('disabled', false); // Re-enable buttons
                }
            });
        });

        $(".required-field").on("input change", function()
        {
            $(this).closest(".input-group.mb-1").next(".error-message").remove();
        });

        $(document).on("input change", ".subject, .unit", function() {
            $(this).next(".error-message").remove();
        });

        //ADD graduated student
        $("#btnSubmit_checksPRC").click(function(e)
        {
            e.preventDefault();
            $('error-message').remove();

            let isValid = true;

            $(".required-field").each(function() {
                let elementType = $(this).prop("tagName").toLowerCase();
                let value = $(this).val();

                if (elementType === "select" && (value === "" || value === null)) {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                } else if ((elementType === "input") && $.trim(value) === "") {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                }
            });

            if (isValid) {
                var data = {
                    Student_ID: $('#add_student_id').val(),
                    Last_name: $('#add_last_name').val(),
                    First_name: $('#add_first_name').val(),
                    Middle_name: $('#add_middle_name').val(),
                    Sex: $('#add_sex').val(),
                    Date_of_birth: $('#add_date_of_birth').val(),
                    Date_graduated: $('#add_date_graduated').val(),
                    AY: $('#add_ay').val(),
                    Program_ID: $('#add_program').val(),
                };

                $.ajax({
                    url: '/save-checks-prc',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Added!',
                                text: 'Graduated Student was successfully added.',
                                confirmButtonColor: "#08BDE1",
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('checks-prc') }}"; // Redirect to view
                                }
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred while saving. Please try again.',
                            confirmButtonColor: "#e74c43",
                            confirmButtonText: 'Okay'
                        });
                    }
                });
            }
        });

        $(document).on('click', '.prc-edit-form', function (e)
        {
            $('#AddStudModal').modal();
            $('#btnSubmit_checksPRC').hide();
            $('#btnUpdate_checksPRC').show();
            $('#AddStudModalLabel').text('Edit Graduate Student');

            var btnid = this.id;
            var id = btnid.replace('btnPRCEdit.', '');

            $.ajax({
                url: '/checks-prc-details',
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        var data = response.result[0];

                        $('#add_student_id').val(data.Student_ID);
                        $('#add_last_name').val(data.Last_name);
                        $('#add_first_name').val(data.First_name);
                        $('#add_middle_name').val(data.Middle_name);
                        $('#add_sex').val(data.Sex);
                        $('#add_date_of_birth').val(data.Date_of_birth);
                        $('#add_date_graduated').val(data.Date_graduated);
                        $('#add_ay').val(data.AY);
                        $('#add_program').val(data.programs_ID);
                        $('#id').val(data.ID);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to fetch student data. Please try again.',
                            confirmButtonColor: "#e74c43",
                            confirmButtonText: 'Okay'
                        });
                    }
                }
            });
        });


        $("#btnUpdate_checksPRC").click(function(e)
        {
            e.preventDefault();
            $(".error-message").remove();

            let isValid = true;

            $(".required-field").each(function() {
                let elementType = $(this).prop("tagName").toLowerCase();
                let value = $(this).val();

                if (elementType === "select" && (value === "" || value === null)) {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                } else if ((elementType === "input") && $.trim(value) === "") {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                }
            });

            if (isValid) {
                var data = {
                    id: $('#id').val(),
                    Student_ID: $('#add_student_id').val(),
                    Last_name: $('#add_last_name').val(),
                    First_name: $('#add_first_name').val(),
                    Middle_name: $('#add_middle_name').val(),
                    Sex: $('#add_sex').val(),
                    Date_of_birth: $('#add_date_of_birth').val(),
                    Date_graduated: $('#add_date_graduated').val(),
                    AY: $('#add_ay').val(),
                    Program_ID: $('#add_program').val()
                };

                $.ajax({
                    url: '/update-checks-prc',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Update!',
                                text: 'Graduated Student was successfully updated.',
                                confirmButtonColor: "#08BDE1",
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('checks-prc') }}";
                                }
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'An error occurred while updating. Please try again.',
                            confirmButtonColor: "#e74c43",
                            confirmButtonText: 'Okay'
                        });
                    }
                });
            }
        });

        $(document).on('click', '.prc-delete-form', function(e)
        {
            e.preventDefault();

            var btnid = this.id;
            var id = btnid.replace('btnPRCDelete.', '');
            var data = { id: id };

            Swal.fire({
                title: 'DELETE?',
                text: "Are you sure you want to delete the selected graduate student in List of Graduates?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete-checks-prc',
                        method: 'POST',
                        data: data,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        dataType: "JSON",
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: "Graduate Student was successfully Deleted.",
                                    confirmButtonColor: "#08BDE1",
                                    confirmButtonText: 'Okay'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: data.message || 'An error occurred while deleting. Please try again.',
                                    confirmButtonColor: "#e74c43",
                                    confirmButtonText: 'Okay'
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while deleting. Please check the console for more details.',
                                confirmButtonColor: "#e74c43",
                                confirmButtonText: 'Okay'
                            });
                        }
                    });
                }
            });
        });
    });

    //Script for subjects taught
    $(document).ready(function()
    {
        $('#btnAddSubject').ready(function()
        {
            $('#AddSubjectModal').modal();
            $('#btnSubmit_subjects').show();
            $('#btnUpdate_subjects').hide();
        });

        $("#AddSubjectModal").on("hidden.bs.modal", function()
        {
            $('#formAddSubject')[0].reset();
            $('#btnSubmit_subjects').show();
            $('#btnUpdate_subjects').hide();
            $('#AddSubjectModalLabel').text('Add Subject Taught');
        });

        $(".required-field").on("input change", function()
        {
            $(this).closest(".input-group.mb-1").next(".error-message").remove();
        });

        $(document).on("input change", ".subject, .unit", function() {
            $(this).next(".error-message").remove();
        });

        $("#btnSubmit_subjects").click(function (e) {
            e.preventDefault();
            $('error-message').remove();

            let isValid = true;

            $(".required-field").each(function() {
                let elementType = $(this).prop("tagName").toLowerCase();
                let value = $(this).val();

                if (elementType === "select" && (value === "" || value === null)) {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                } else if ((elementType === "input") && $.trim(value) === "") {
                    isValid = false;
                    $(this).closest(".input-group.mb-1").after('<span class="error-message" style="color:red; font-size:12px;">This field is required</span>');
                }
            });

            if (isValid) {
                var data = {
                    CODE: $('#add_subject_code').val(),
                    No_fields: $('#add_no_field').val(),
                    Description: $('#add_subject_des').val(),
                };

                $.ajax({
                    url: '/save-checks-subjects',
                    method: 'POST',
                    data: data,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    dataType: 'JSON',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon:'success',
                                title: 'Added!',
                                text: 'Subject Taught was successfully added.',
                                confirmButtonColor: "#08BDE1",
                                confirmButtonText: 'Okay'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('checks-subjects') }}";
                                }
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon:'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again.',
                            confirmButtonColor: "#08BDE1",
                            confirmButtonText: 'Okay'
                        });
                    }
                });
            }
        });

        $(document).on('click', '.subject-delete-form', function(e)
        {
            e.preventDefault();

            var btnid = this.id;
            var id = btnid.replace('btnSubjectDelete.', '');
            var data = { id: id };

            Swal.fire({
                title: 'DELETE?',
                text: "Are you sure you want to delete the selected subject taught?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete-checks-subjects',
                        method: 'POST',
                        data: data,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        dataType: "JSON",
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: "Selected Subject Taught was successfully Deleted.",
                                    confirmButtonColor: "#08BDE1",
                                    confirmButtonText: 'Okay'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: data.message || 'An error occurred while deleting. Please try again.',
                                    confirmButtonColor: "#e74c43",
                                    confirmButtonText: 'Okay'
                                });
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while deleting. Please check the console for more details.',
                                confirmButtonColor: "#e74c43",
                                confirmButtonText: 'Okay'
                            });
                        }
                    });
                }
            });
        });

    });

    //Script for scholarship program
    $(document).ready(function()
    {

        $("#btnadd").click(function() //Add open Modal
        {
            $('#AddModal').modal('show');
            $('#btnsubmit_sprogram').show();
            $('#btnupdate_sprogram').hide();
        });

        $("#btnsubmit_sprogram").click(function () //fetch scholarship program per selected scholarship
        {
            var scholarship_id    	= $("#scholarship_id").val();
            var stype_id    		= $("#stype_id").val();
            var scholarship_code   	= $("#scholarship_code").val();
            var scholarship_program    = $("#scholarship_program").val();

            var data =  {
                            scholarship_id 		: scholarship_id,
                            stype_id 			: stype_id,
                            scholarship_code 				: scholarship_code,
                            scholarship_program 	: scholarship_program,
                        };

            $.ajax({
                url: "/save-schol-program",
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
                                window.location.href = "{{route('osds-schol-scholprogram')}}";
                            }
                        })
                    }
                }
            });
        });

        $(".sprogram-delete-form").click(function() //DELETE scholarship program policy per selected scholarship
        {
            var sp_id = 			$(this).closest('tr').find('td:eq(0)').html();
            var data =  { id : sp_id, };

            Swal.fire({
                icon: 'warning',
                title: "DELETE?",
                text: "Are you sure you want to delete the selected scholarship program?",
                showCancelButton: true,
                confirmButtonColor: "#E92A02",
                confirmButtonText: "Yes, Delete it!",
                }).then((result) => {
                if (result.isConfirmed)
                {
                    $.ajax({
                        url: "/delete-schol-program",
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
                                        window.location.href = "{{route('osds-schol-scholprogram')}}";
                                    }
                                })
                            }
                        }
                    })
                }
            });
        });

        $(".sprogram-edit-form").click(function()
        {
            $('#AddModal').modal('show');
            $('#btnsubmit_sprogram').hide();
            $('#btnupdate_sprogram').show();

            $('#sp_id').val($(this).closest('tr').find('td:eq(0)').html());
            $("#stype_id").val($(this).closest('tr').find('td:eq(1)').html());
            $('#scholarship_id').val($(this).closest('tr').find('td:eq(3)').html());
            $('#scholarship_code').val($(this).closest('tr').find('td:eq(6)').html());
            $('#scholarship_program').val($(this).closest('tr').find('td:eq(7)').html());

        });

        $("#btnupdate_sprogram").click(function() //UPDATE scholarship program policy per selected scholarship
        {
            var sp_id = 			$('#sp_id').val();
            var stype_id = 					$('#stype_id').val();
            var scholarship_id = 				$('#scholarship_id').val();
            var scholarship_code = 		$('#scholarship_code').val();
            var scholarship_program = 				$('#scholarship_program').val();

            var data =  {
                sp_id 					: sp_id,
                stype_id  	 			: stype_id,
                scholarship_id 			: scholarship_id,
                scholarship_code 		: scholarship_code,
                scholarship_program		: scholarship_program,
                        };

            $.ajax({
                url: "/update-schol-program",
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
                                window.location.href = "{{route('osds-schol-scholprogram')}}";
                            }
                        })
                    }
                }
            });
        });
    });

    //Script for scholarship policy
    $(document).ready(function()
    {
        $("#btndd").click(function() //Add open Modal
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

    //Script for scholarship
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
    });
	</script>
<body>

