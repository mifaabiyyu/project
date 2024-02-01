@section('title', 'User Management')

@section('style')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    {{-- <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" ></script> --}}
@endsection

@section('scriptCrud')
    <script>
        var isCustomer = "{{ $isCustomer }}";
    </script>
    <script src="{{ asset('js/datatable/user-management/user-company/users-table.js') }}" ></script>
    <script src="{{ asset('js/crud/user-management/users-company/add.js') }}" ></script>
    <script src="{{ asset('js/crud/user-management/users-company/edit.js') }}" ></script>
@endsection

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Users List</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">User Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Users</li>
                    <!--end::Item-->
                   
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
     
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card" wire:ignore>
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Filter-->
                            <!--end::Filter-->
                      
                            <!--begin::Add user-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Add User</button>
                            <!--end::Add user-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                        </div>
                        <!--end::Group actions-->
               
                        <!--begin::Modal - Add task-->
                        <!--end::Modal - Add task-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="user_table">
                        <!--begin::Table head--> 
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Name</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Company</th>
                                <th class="min-w-125px">Status</th>
                                <th class="text-center min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold">
                        </tbody> 
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Add User</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
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
                    <form id="kt_modal_add_user_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                        <!--begin::Scroll-->
                        @csrf
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                <!--end::Label-->
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(./../img.png);"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" id="photo" name="photo" accept=".png, .jpg, .jpeg, .svg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com"/>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Password</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="password" id="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password"  />
                                <!--end::Input-->
                            </div>
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Role:</label>
                                <select class="form-select form-select-solid fw-bolder" data-dropdown-parent="#kt_modal_add_user" name="role" id="role" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" >
                                    <option></option>
                                    @foreach ($rolesCustomer as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Position</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="position" id="position" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Posisi" />
                                <!--end::Input-->
                            </div>
                          
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Phone</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="phone" id="phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Phone" />
                                <!--end::Input-->
                            </div>
                            @if (!Auth::user()->hasRole('Customer'))
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Company</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="company" id="company" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="company" />
                                <!--end::Input-->
                            </div>
                                <div class="fv-row mb-7 ">
                                    <div class="form-group">
                                        <label class="required fw-bold fs-6 mb-2">Status</label>
                                    <!--begin::Label-->
                                        <div class="radio-inline row">
                                            <div class="col-1"></div>
                                            <div class="form-check form-check-custom col-2 radio form-check-success form-check-solid form-check-md">
                                                <input class="form-check-input" type="radio" name="status" value="1" id="flexCheckboxSm"  />
                                                <label class="form-check-label" for="flexCheckboxSm">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                                <input class="form-check-input" type="radio" name="status" value="0" id="flexCheckboxSm"  />
                                                <label class="form-check-label" for="flexCheckboxSm">
                                                    Request
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            @endif
                            <!--end::Input group-->
                            <!--begin::Input group-->
                     
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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
    </div>
    
    <div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_edit_user_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder" id="headerForm"></h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-edit-users-modal-action="close">
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
                    <form id="kt_modal_edit_user_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                        <!--begin::Scroll-->
                        @csrf
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_edit_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_user_header" data-kt-scroll-wrappers="#kt_modal_edit_user_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                <!--end::Label-->
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(./../img.png);"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" id="photo" name="photo" accept=".png, .jpg, .jpeg, .svg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Full Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="edit_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email" id="edit_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com"/>
                                <!--end::Input-->
                            </div>
                            @if (!Auth::user()->hasRole('Customer'))
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Password</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="password" id="edit_password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password"  />
                                <!--end::Input-->
                            </div>
                            @endif
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Role:</label>
                                <select class="form-select form-select-solid fw-bolder" data-dropdown-parent="#kt_modal_edit_user" name="role" id="edit_role" data-control="select2" data-placeholder="Select option" data-allow-clear="true" >
                                    <option></option>
                                    @foreach ($rolesCustomer as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Position</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="position" id="edit_position" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Posisi" />
                                <!--end::Input-->
                            </div>
                          
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Phone</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="phone" id="edit_phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Posisi" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            @if (!Auth::user()->hasRole('Customer'))
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">Company</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="company" id="edit_company" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="company" />
                                    <!--end::Input-->
                                </div>
                                <div class="fv-row mb-7 ">
                                    <div class="form-group">
                                        <label class="required fw-bold fs-6 mb-2">Status</label>
                                    <!--begin::Label-->
                                        <div class="radio-inline row">
                                            <div class="col-1"></div>
                                            <div class="form-check form-check-custom col-2 radio form-check-success form-check-solid form-check-md">
                                                <input class="form-check-input" type="radio" name="status" value="1" id="flexCheckboxSm"  />
                                                <label class="form-check-label" for="flexCheckboxSm">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                                <input class="form-check-input" type="radio" name="status" value="0" id="flexCheckboxSm"  />
                                                <label class="form-check-label" for="flexCheckboxSm">
                                                    Request
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            @endif
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-edit-users-modal-action="cancel">Discard</button>
                            <button type="submit" class="btn btn-primary" data-kt-edit-users-modal-action="submit">
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
    </div>
    
</div>
