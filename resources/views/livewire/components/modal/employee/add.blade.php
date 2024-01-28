<div class="modal fade" id="add_employee" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="min-width: 1200px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="Machine_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Employee</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-employee-modal-action="close">
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
                <form id="add_employee_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 text-center">
                            <!--begin::Label-->
                            <label class="d-block fw-bold fs-6 mb-5">Foto KTP / Foto Karyawan</label>
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
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Nama</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nama" />
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">NIK</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="nik" id="nik" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="NIK" />
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Company</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                 <select class="form-control form-control-solid mb-3 mb-lg-0" data-dropdown-parent="#add_employee" name="company" data-control="select2" data-placeholder="-- Select Company --" id="company" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Division</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                 <select class="form-control form-control-solid mb-3 mb-lg-0" data-dropdown-parent="#add_employee" name="division" data-control="select2" data-placeholder="-- Select Division --" id="division" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Position</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="position" id="position" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Position" />
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Start Work</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="start_work" id="start_work" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Start Work" />
                                <!--end::Input-->
                            </div>
                          
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="email" id="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email" />
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Phone</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="phone" id="phone" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Phone" />
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">TTL</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="date_birth" id="date_birth1" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="TTL" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <div class="form-group">
                                    <label class="required fw-bold fs-6 mb-5">Gender</label>
                                <!--begin::Label-->
                                    <div class="radio-inline row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-3 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="gender" value="Pria" id="gender"  />
                                            <label class="form-check-label" for="gender">
                                                Pria
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="gender" value="Wanita" id="gender"  />
                                            <label class="form-check-label" for="gender">
                                                Wanita
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Alamat</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="address" id="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Alamat" />
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <div class="form-group">
                                    <label class="required fw-bold fs-6 mb-5">Status</label>
                                <!--begin::Label-->
                                    <div class="radio-inline row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-3 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="status" value="1" id="status"  />
                                            <label class="form-check-label" for="status">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-4 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="status" value="0" id="status"  />
                                            <label class="form-check-label" for="status">
                                                Non Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <div class="form-group">
                                    <label class="required fw-bold fs-6 mb-5">BPJS Ketenagakerjaan</label>
                                <!--begin::Label-->
                                    <div class="radio-inline row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-2 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="bpjs_tk" value="1" id="bpjs_tk"  />
                                            <label class="form-check-label" for="bpjs_tk">
                                                Iya
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="bpjs_tk" value="Wanita" id="bpjs_tk"  />
                                            <label class="form-check-label" for="bpjs_tk">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <div class="form-group">
                                    <label class="required fw-bold fs-6 mb-5">BPJS Kesehatan</label>
                                <!--begin::Label-->
                                    <div class="radio-inline row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-2 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="bpjs_ks" value="1" id="bpjs_ks"  />
                                            <label class="form-check-label" for="bpjs_ks">
                                                Iya
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" name="bpjs_ks" value="Wanita" id="bpjs_ks"  />
                                            <label class="form-check-label" for="bpjs_ks">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-employee-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-employee-modal-action="submit">
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
