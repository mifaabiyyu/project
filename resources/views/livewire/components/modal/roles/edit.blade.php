<div class="modal fade" id="edit_roles" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="edit_roles_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="headerForm"></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="edit_roles_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @method('PUT')
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="edit_roles_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#edit_roles_header" data-kt-scroll-wrappers="#edit_roles_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" id="edit_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                         	<!--begin::Permissions-->
						<div class="fv-row">
							<!--begin::Label-->
							<label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
							<!--end::Label-->
							<!--begin::Table wrapper-->
							<div class="table-responsive">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5">
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
										<!--begin::Table row-->
										<tr>
											<td class="text-gray-800">Administrator Access
											<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
											<td>
												<!--begin::Checkbox-->
												<label class="form-check form-check-custom form-check-solid me-9">
													<input class="form-check-input" type="checkbox" value="" id="checkPermissionAll" />
													<span class="form-check-label" for="kt_roles_select_all">Select all</span>
												</label>
												<!--end::Checkbox-->
											</td>
										</tr>
										<!--end::Table row-->
										@php $i = 1;      $a = 0; @endphp
										@foreach ($permission_groups  as $group)
										<!--begin::Table row-->
										<tr>
											<!--begin::Label-->
											<td class="text-gray-800 min-w-125px">{{ $group->name }}</td>
											<!--end::Label-->
											<!--begin::Options-->
											@php
												$permissions = App\Models\User::getpermissionsByGroupName($group->name);
												$j = 1;
                                           
											@endphp

											<td>
												<!--begin::Wrapper-->
												<div class="d-flex">
													@foreach ($permissions as $permission)
														<!--begin::Checkbox-->
														<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
					<input class="form-check-input" type="checkbox" value="{{ $permission->name }}" id="edit_permission{{ $a }}" name="permissions[]" />
															@php
																$name = explode(".",$permission->name);
															@endphp
															<span class="form-check-label">{{ $name[1] }}</span>
														</label>
														<!--end::Checkbox-->
													@php  $j++; $a++; @endphp
													@endforeach
			
												</div>
												<!--end::Wrapper-->
											</td>
											<!--end::Options-->
										</tr>
										@php  $i++; @endphp
										<!--end::Table row-->
										@endforeach
									</tbody>
									<!--end::Table body-->
								</table>
								<!--end::Table-->
							</div>
							<!--end::Table wrapper-->
						</div>
						<!--end::Permissions-->
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
    <script>
             $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });

    </script>
</div>
