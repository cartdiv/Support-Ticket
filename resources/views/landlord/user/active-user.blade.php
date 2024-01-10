@extends('landlord.admin-master')
@section('landlord-main')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All User 
                                            @if (count($activeuser) <= 4)
                                                <span class="badge light badge-danger"> 
                                                     ({{count($activeuser)}})
                                                </span>
                                                    @else
                                                    <span class="badge light badge-success"> 
                                                        ({{count($activeuser)}})
                                                   </span>
                                            @endif
                                            
                                            
                                          </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example4" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>Roll No</th>
                                                        <th>Image</th>
                                                        <th>Tenant Name</th>
                                                        <th>Tenant Email</th>
                                                        <th>Phone Number </th>
                                                        <th>Status </th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $activeuser as $key=>$item )
                                                        
                                                    
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td class="sorting_1">
                                                            <img class="rounded-circle" width="35" src="{{ (!empty($item->photo))?url('upload/tenant_photo/'.$item->photo):url('upload/no_image.jpg') }}" alt="">
                                                        </td>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->email}}</td>
                                                       
                                                        <td>{{$item->phone}}</td>
                                                        <td>
                                                            @if ($item->status === 'active')
                                                                <span class="badge light badge-success">Active</span>
                                                                @else
                                                                <span class="badge light badge-danger">Inactive</span>
                                                            @endif
                                                            
                                                        </td>
                                                       
                                                        <td>
                                                            <div class="d-flex">
                                                                <a href="{{route('edit.users.detail',$item->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                                <a href="{{route('delete.users.detail',$item->id)}}" class="btn btn-danger shadow btn-xs sharp" id="delete"><i class="fa fa-trash"></i></a>
                                                            </div>												
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                       
                </div>
                <!--**********************************
                    Content body end
                ***********************************-->
        
        @endsection                           