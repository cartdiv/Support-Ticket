@extends('landlord.admin-master')
@section('landlord-main')

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
				<div class="row">
					<div class="col-xl-9 col-lg-8">
						<div class="card  card-bx m-b30">
							<div class="card-header">
								<h6 class="title">Change password</h6>
							</div>
							<form class="profile-form" method="POST" action="{{route('tenant.update.change.password')}}">
                                @csrf
								<div class="card-body">
									<div class="row">
                                        <div class="col-sm-6 m-b30">
											<label class="form-label">Old Password</label>
											<input type="password" class="form-control" name="oldpassword" >
										</div>
										<div class="col-sm-6 m-b30">
											<label class="form-label">Password</label>
											<input type="password" class="form-control" name="newpassword" >
										</div>
										<div class="col-sm-6 m-b30">
											<label class="form-label">Confirm password</label>
											<input type="password" class="form-control" name="confirm_password">
										</div>
										
										
									</div>
								</div>
								<div class="card-footer">
									<button class="btn btn-primary" type="submit">UPDATE</button>
									
								</div>
							</form>
						</div>
					</div>
				</div>	
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


@endsection