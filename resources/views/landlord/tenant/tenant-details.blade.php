@extends('landlord.admin-master')
@section('landlord-main')

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
				<div class="row">
					<div class="col-xl-3 col-lg-4">
						<div class="clearfix">
							<div class="card card-bx author-profile m-b30">
								<div class="card-body">
									<div class="p-5">
										<div class="author-profile">
											<div class="author-media">
												<img src="{{ (!empty($user->photo))? url('upload/tenant_photo/'.$user->photo): url('upload/no_image.jpg') }}" alt="">
												<div class="upload-link" title="" data-bs-toggle="tooltip" data-placement="right" data-original-title="update">
													<input type="file" class="update-flie">
													<i class="fa fa-camera"></i>
												</div>
											</div>
											<div class="author-info">
												<h6 class="title">{{ $user->name }}</h6>
												<span>{{$user->role}}</span>
											</div>
										</div>
									</div>
									
								</div>
								<div class="card-footer">
									<div class="input-group mb-3">
										<div class="form-control rounded text-center">Link</div>
									</div>
									<div class="input-group">
										<a href="https://www.dexignlab.com/" class="form-control text-primary rounded text-start ">https://www.dexignlab.com/</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8">
						<div class="card  card-bx m-b30">
							<div class="card-header">
								<h6 class="title">Account setup</h6>
							</div>
							<form class="profile-form" method="POST" action="{{route('update.tenant.status')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6 m-b30">
											<label class="form-label">Name</label>
											<input type="text" class="form-control" name="name" value="{{$user->name}}">
										</div>
										<div class="col-sm-6 m-b30">
											<label class="form-label">Email</label>
											<input type="text" class="form-control" name="email" value="{{$user->email}}">
										</div>
										
										<div class="col-sm-6 m-b30">
											<label class="form-label">Phone</label>
											<input type="text" class="form-control" name="phone" value="{{$user->phone}}">
										</div>
										
										<div class="col-sm-6 m-b30">
											<label class="form-label ">Status</label>
											<select class="selectpicker nice-select default-select form-control wide mh-auto" name="status">
                                                
                                                @if ($user->status == 'active')
                                                    <option value="active" selected>Active</option>
                                                    @else
                                                    <option value="inactive" selected>Inactive</option>
                                                @endif

                                                @if ($user->status == 'active')
                                                <option value="active" hidden>Active</option>
                                                @else
                                                <option value="active" show>Active</option>
                                                @endif

                                                @if ($user->status == 'inactive')
                                                <option value="inactive" hidden>Inactive</option>
                                                @else
                                                <option value="inactive" show>Inactive</option>
                                                @endif
												
											</select>
										</div>
                                        <div class="col-sm-12 m-b30">
											<label class="form-label ">Description</label>
                                            <textarea class="form-control" rows="8" name="description" id="comment">{{$user->description}}</textarea>
                                        </div>
									</div>
								</div>
								<div class="card-footer">
									<button class="btn btn-primary" type="submit">UPDATE</button>
									<a href="page-register.html" class="text-primary btn-link">Forgot your password?</a>
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