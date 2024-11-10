@include('navbar')

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		
		<div class="pagetitle">
	    <h1>Dashboard</h1>
			<nav>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
				  <li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</nav>
	    </div><!-- End Page Title -->

		<section class="section">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="col-lg-12 mt-1">
				<div class="card rounded-0">
					<div class="card-header"><p class="mb-2 mt-2">CHED Merit Scholarship Program (CMSP) Online Application Form</p></div>
					<div class="card-body">
						<div class="mt-3 mb-3">
							<!-- Bordered Tabs Justified -->
							<ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
								<li class="nav-item flex-fill" role="presentation">
								  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-person-fill mx-2"></i>Personal Information</button>
								</li>
								<li class="nav-item flex-fill" role="presentation">
								  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-people-fill mx-2"></i>Family Background</button>
								</li>
								<li class="nav-item flex-fill" role="presentation">
								  <button class="nav-link w-100" id="educational-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-educational" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="bx bxs-graduation mx-2"></i>Educational Information</button>
								</li>
								<li class="nav-item flex-fill" role="presentation">
								  <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="bi bi-upload mx-2"></i>Attachments</button>
								</li>
							</ul>

							<form id="form_cmsp_application" class="form-validate-jquery" method="post" enctype="multipart/form" action="#" autocomplete="off">
							<div class="tab-content pt-2" id="borderedTabJustifiedContent">
								<div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
								  <div class="row mt-2">
								  	<div class="col-lg-3">
								  		<label for="lname">Last Name <span class="text-danger">*</span></label>
								  		<input id="lname" name="lname" type="text" class="form-control" placeholder="Last Name" required>
								  	</div>
								  	<div class="col-lg-1">
								  		<label for="extname">Ext</label>
								  		<select id="extname" name="extname" class="form-select" aria-label="Default select example">
					                      <option></option>
					                      <option value="Jr.">Jr.</option>
					                      <option value="Sr.">Sr.</option>
					                      <option value="III">III</option>
					                    </select>
								  	</div>
								  	<div class="col-lg-3">
								  		<label for="fname">First Name <span class="text-danger">*</span></label>
								  		<input id="fname" name="fname" type="text" class="form-control" placeholder="First Name" required>
								  	</div>
								  	<div class="col-lg-5">
									  	<div class="row">
									  		<div class="col-lg-6">
										  		<label for="mname">Middle Name</label>
										  		<input id="mname" name="mname" type="text" class="form-control" placeholder="Middle Name">
										  	</div>
										  	<div class="col-lg-6">
										  		<label for="mname">Maiden Name </label>
										  		<input id="mname" name="mname" type="text" class="form-control" placeholder="if applicable">
										  	</div>
									  	</div>
								  	</div>
								  </div>
								  <div class="row mt-2">
								  	<div class="col-lg-2">
								  		<label for="gender">Gender <span class="text-danger">*</span></label>
								  		<select id="gender" name="gender" class="form-select" aria-label="Default select example" required>
								  			<option></option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
					                    </select>
								  	</div>
								  	<div class="col-lg-2">
								  		<label for="civil_status">Civil Status <span class="text-danger">*</span></label>
								  		<select id="civil_status" name="civil_status" class="form-select" aria-label="Default select example" required>
								  			<option></option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
											<option value="Annuled">Annuled</option>
											<option value="Widowed">Widowed</option>
											<option value="Separated">Separated</option>
					                    </select>
								  	</div>
								  	<div class="col-lg-2">
								  		<label for="email_address">Email Address <span class="text-danger">*</span></label>
								  		<input id="email_address" name="email_address" type="email" class="form-control" placeholder="Email Address" required>
								  	</div>
								  	<div class="col-lg-2">
								  		<label for="mobile_number">Mobile Number <span class="text-danger">*</span></label>
								  		<input id="mobile_number" name="mobile_number" type="number" class="form-control" placeholder="09XX-XXX-XXXX" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required>
								  	</div>
								  	<div class="col-lg-2">
								  		<label for="bdate">Birth Date <span class="text-danger">*</span></label>
								  		<input id="bdate" name="bdate" type="date" class="form-control" required>
								  	</div>
								  </div>
								  <div class="row mt-2">
							  			<div class="col-lg-2">
							  				<label for="bplace_region">Birth Place <span class="text-danger">*</span></label>
							  				<select id="bplace_region" name="bplace_region" class="form-select" aria-label="Default select example" required>
							  					<option></option>
							  					<option data-code="0100000000" value="Region I (Ilocos Region)">Region I (Ilocos Region)</option>
							  					<option data-code="0200000000" value="Region II (Cagayan Valley)">Region II (Cagayan Valley)</option>
							  					<option data-code="0300000000" value="Region III (Central Luzon)">Region III (Central Luzon)</option>
							  					<option data-code="0400000000" value="Region IV-A (CALABARZON)">Region IV-A (CALABARZON)</option>
							  					<option data-code="1700000000" value="MIMAROPA Region">MIMAROPA Region</option>
							  					<option data-code="0500000000" value="Region V (Bicol Region)<">Region V (Bicol Region)</option>
							  					<option data-codee="0600000000" value="Region VI (Western Visayas)">Region VI (Western Visayas)</option>
							  					<option data-code="0700000000" value="Region VII (Central Visayas)">Region VII (Central Visayas)</option>
							  					<option data-codee="0800000000" value="Region VIII (Eastern Visayas)">Region VIII (Eastern Visayas)</option>
							  					<option data-code="0900000000" value="Region IX (Zamboanga Peninsula)">Region IX (Zamboanga Peninsula)</option>
							  					<option data-code="1000000000" value="Region X (Northern Mindanao)">Region X (Northern Mindanao)</option>
							  					<option data-code="1100000000" value="Region XI (Davao Region)">Region XI (Davao Region)</option>
							  					<option data-code="1200000000" value="Region XII (SOCCSKSARGEN)">Region XII (SOCCSKSARGEN)</option>
							  					<option data-code="1300000000" value="National Capital Region (NCR)">National Capital Region (NCR)</option>
							  					<option data-code="1400000000" value="Cordillera Administrative Region (CAR)">Cordillera Administrative Region (CAR)</option>
							  					<option data-code="1600000000" value="Region XIII (Caraga)">Region XIII (Caraga)</option>
							  					<option data-code="1900000000" value="Bangsamoro Autonomous Region In Muslim Mindanao (BARMM)">Bangsamoro Autonomous Region In Muslim Mindanao (BARMM)</option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="bplace_province" name="bplace_province" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="bplace_town_city" name="bplace_town_city" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="bplace_barangay" name="bplace_barangay" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<input id="bplace_street" name="bplace_street" type="text" class="form-control" placeholder="Street, Building, House No." required>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<input id="bplace_zipcode" name="bplace_zipcode" type="text" class="form-control" placeholder="Zip Code" required>
							  			</div>
							  		</div>
								  <div class="row mt-2">
							  			<div class="col-lg-2">
							  				<label for="permanent_region">Permanent Address <span class="text-danger">*</span></label>
							  				<select id="permanent_region" name="permanent_region" class="form-select" aria-label="Default select example" required>
							  					<option></option>
							  					<option data-code="0100000000" value="Region I (Ilocos Region)">Region I (Ilocos Region)</option>
							  					<option data-code="0200000000" value="Region II (Cagayan Valley)">Region II (Cagayan Valley)</option>
							  					<option data-code="0300000000" value="Region III (Central Luzon)">Region III (Central Luzon)</option>
							  					<option data-code="0400000000" value="Region IV-A (CALABARZON)">Region IV-A (CALABARZON)</option>
							  					<option data-code="1700000000" value="MIMAROPA Region">MIMAROPA Region</option>
							  					<option data-code="0500000000" value="Region V (Bicol Region)<">Region V (Bicol Region)</option>
							  					<option data-codee="0600000000" value="Region VI (Western Visayas)">Region VI (Western Visayas)</option>
							  					<option data-code="0700000000" value="Region VII (Central Visayas)">Region VII (Central Visayas)</option>
							  					<option data-codee="0800000000" value="Region VIII (Eastern Visayas)">Region VIII (Eastern Visayas)</option>
							  					<option data-code="0900000000" value="Region IX (Zamboanga Peninsula)">Region IX (Zamboanga Peninsula)</option>
							  					<option data-code="1000000000" value="Region X (Northern Mindanao)">Region X (Northern Mindanao)</option>
							  					<option data-code="1100000000" value="Region XI (Davao Region)">Region XI (Davao Region)</option>
							  					<option data-code="1200000000" value="Region XII (SOCCSKSARGEN)">Region XII (SOCCSKSARGEN)</option>
							  					<option data-code="1300000000" value="National Capital Region (NCR)">National Capital Region (NCR)</option>
							  					<option data-code="1400000000" value="Cordillera Administrative Region (CAR)">Cordillera Administrative Region (CAR)</option>
							  					<option data-code="1600000000" value="Region XIII (Caraga)">Region XIII (Caraga)</option>
							  					<option data-code="1900000000" value="Bangsamoro Autonomous Region In Muslim Mindanao (BARMM)">Bangsamoro Autonomous Region In Muslim Mindanao (BARMM)</option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="permanent_province" name="permanent_province" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="permanent_town_city" name="permanent_town_city" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="permanent_barangay" name="permanent_barangay" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<input id="permanent_street" name="permanent_street" type="text" class="form-control" placeholder="Street, Building, House No." required>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<input id="permanent_zipcode" name="permanent_zipcode" type="text" class="form-control" placeholder="Zip Code" required>
							  			</div>
							  		</div>
							  		<div class="row mt-2">
							  			<div class="col-lg-12">
							  				<div class="form-check">
						                      <input id="same_present" name="same_present" class="form-check-input" type="checkbox" id="gridCheck1">
						                      <label class="form-check-label" for="gridCheck1">
						                       Same as permanent address
						                      </label>
						                    </div>
							  			</div>
							  		</div>
							  		<div class="row mt-2">
							  			<div class="col-lg-2">
							  				<label for="present_region">Present Address <span class="text-danger">*</span></label>
							  				<select id="present_region" name="present_region" class="form-select" aria-label="Default select example" required>
							  					<option></option>
							  					<option data-code="0100000000" value="Region I (Ilocos Region)">Region I (Ilocos Region)</option>
							  					<option data-code="0200000000" value="Region II (Cagayan Valley)">Region II (Cagayan Valley)</option>
							  					<option data-code="0300000000" value="Region III (Central Luzon)">Region III (Central Luzon)</option>
							  					<option data-code="0400000000" value="Region IV-A (CALABARZON)">Region IV-A (CALABARZON)</option>
							  					<option data-code="1700000000" value="MIMAROPA Region">MIMAROPA Region</option>
							  					<option data-code="0500000000" value="Region V (Bicol Region)<">Region V (Bicol Region)</option>
							  					<option data-codee="0600000000" value="Region VI (Western Visayas)">Region VI (Western Visayas)</option>
							  					<option data-code="0700000000" value="Region VII (Central Visayas)">Region VII (Central Visayas)</option>
							  					<option data-codee="0800000000" value="Region VIII (Eastern Visayas)">Region VIII (Eastern Visayas)</option>
							  					<option data-code="0900000000" value="Region IX (Zamboanga Peninsula)">Region IX (Zamboanga Peninsula)</option>
							  					<option data-code="1000000000" value="Region X (Northern Mindanao)">Region X (Northern Mindanao)</option>
							  					<option data-code="1100000000" value="Region XI (Davao Region)">Region XI (Davao Region)</option>
							  					<option data-code="1200000000" value="Region XII (SOCCSKSARGEN)">Region XII (SOCCSKSARGEN)</option>
							  					<option data-code="1300000000" value="National Capital Region (NCR)">National Capital Region (NCR)</option>
							  					<option data-code="1400000000" value="Cordillera Administrative Region (CAR)">Cordillera Administrative Region (CAR)</option>
							  					<option data-code="1600000000" value="Region XIII (Caraga)">Region XIII (Caraga)</option>
							  					<option data-code="1900000000" value="Bangsamoro Autonomous Region In Muslim Mindanao (BARMM)">Bangsamoro Autonomous Region In Muslim Mindanao (BARMM)</option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="present_province" name="present_province" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="present_town_city" name="present_town_city" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<select id="present_barangay" name="present_barangay" class="form-select" aria-label="Default select example" required>
							  					<option></option>
						                    </select>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<input id="present_street" name="present_street" type="text" class="form-control" placeholder="Street, Building, House No." required>
							  			</div>
							  			<div class="col-lg-2">
							  				<label>&nbsp;</label>
							  				<input id="present_zipcode" name="present_zipcode" type="text" class="form-control" placeholder="Zip Code" required>
							  			</div>
							  		</div>
							  		<div class="row mt-2">
									  	<div class="col-lg-3">
									  		<label for="disability">Disability <span class="text-danger">*</span></label>
									  		<select id="disability" name="disability" class="form-select" aria-label="Default select example" required>
												<option></option>
												<option value="Visually Impaired">Visually Impaired</option>
								  				<option value="Partially Deaf">Partially Deaf</option>
								  				<option value="Cleft Palate">Cleft Palate</option>
								  				<option value="Physical Deformity">Physical Deformity</option>
								  				<option value="Other">Other</option>
						                    </select>
									  	</div>
									  	<div id="div_other_disability" class="col-lg-3">
								  		</div>
								  		<div id="div_proof_disability" class="col-lg-3">
								  		</div>
								  	</div>
								  	<div class="row mt-2">
									  	<div class="col-lg-3">
									  		<label for="ip_affiliation">IP Affiliation <span class="text-danger">*</span></label>
									  		<select id="ip_affiliation" name="ip_affiliation" class="form-select" aria-label="Default select example" required>
												<option></option>
												<option value="Aeta">Aeta</option>
								  				<option value="Ibanag">Ibanag</option>
								  				<option value="Itawes">Itawes</option>
								  				<option value="Yogad">Yogad</option>
								  				<option value="Malaweg">Malaweg</option>
								  				<option value="Kalangoya">Kalangoya</option>
								  				<option value="Gaddang">Gaddang</option>
								  				<option value="Ivatan">Ivatan</option>
								  				<option value="Other">Other</option>
						                    </select>
									  	</div>
									  	<div id="div_other_ip" class="col-lg-3">
								  		</div>
								  		<div id="div_proof_ip" class="col-lg-3">
								  		</div>
								  	</div>

								</div>
								<div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
								  Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
								</div>
								<div class="tab-pane fade" id="bordered-justified-educational" role="tabpanel" aria-labelledby="educational-tab">
								  Tab 3
								</div>
								<div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
								  Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
								</div>
							</div>
							<!-- End Bordered Tabs Justified -->
							</form>
						</div>
					</div>
					<div class="card-footer">
						<p class="mb-2 mt-2"><small>CHED Scholarships and Financial Grants Automated System (CSFGAS) 2024</small></p>
					</div>
				</div>
			</div>
		</div>
		</section>

@include('footer')

<script src="{{ URL::asset('public/system_resources/js/cmsp_application.js') }}"></script>