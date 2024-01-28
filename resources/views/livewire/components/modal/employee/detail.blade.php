<div class="modal fade" id="detail_employee" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="min-width: 1200px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="Machine_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Edit Employee</h2>
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
                <form id="detail_employee_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 text-center">
                            <!--begin::Label-->
                            <label class="d-block fw-bold fs-6 mb-5">Foto KTP / Foto Karyawan</label>
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <img id="preview-image-before-upload-detail"  src="{{ asset('img.png') }}"
                            alt="No Image" style="max-height: 200px;">
                            <br>
                            <br>
                            {{-- <input type="file" id="detail_photo" name="photo" accept=".png, .jpg, .jpeg, .svg" /> --}}
                            <!--begin::Hint-->
                            <div class="form-text"><a href="javascript:void(0)" id="redirect-image" target="_blank" class="btn btn-primary">Download Image</a></div>
                            <!--end::Hint-->
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Nama</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="detail_name" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Nama" />
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">NIK</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="nik" id="detail_nik" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="NIK" />
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Company</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                 <select class="form-control form-control-transparent mb-3 mb-lg-0" data-dropdown-parent="#detail_employee" name="company" data-control="select2" data-placeholder="-- Select Company --" id="detail_company" aria-label="Select example">
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
                                <label class=" fw-bold fs-6 mb-2">Division</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                 <select class="form-control form-control-transparent mb-3 mb-lg-0" data-dropdown-parent="#detail_employee" name="division" data-control="select2" data-placeholder="-- Select Division --" id="detail_division" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Position</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="position" id="detail_position" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Position" />
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Start Work</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="start_work" id="detail_start_work" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Start Work" />
                                <!--end::Input-->
                            </div>
                          
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="email" id="detail_email" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Email" />
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Phone</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="phone" id="detail_phone" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Phone" />
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Tanggal Lahir</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="date_birth" id="detail_date_birth" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Tanggal Lahir" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <div class="form-group">
                                    <label class=" fw-bold fs-6 mb-5">Gender</label>
                                <!--begin::Label-->
                                    <div class="radio-inline row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-3 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" disabled name="gender_detail" value="Pria" id="detail_gender"  />
                                            <label class="form-check-label" for="gender">
                                                Pria
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" disabled name="gender_detail" value="Wanita" id="detail_gender"  />
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
                                <textarea name="address" id="detail_address" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Alamat" ></textarea>
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <div class="form-group">
                                    <label class=" fw-bold fs-6 mb-5">Status</label>
                                <!--begin::Label-->
                                    <div class="radio-inline row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-3 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" disabled name="status_detail" value="1" id="detail_status"  />
                                            <label class="form-check-label" for="status">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-4 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" disabled name="status_detail" value="0" id="detail_status"  />
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
                                    <label class=" fw-bold fs-6 mb-5">BPJS Ketenagakerjaan</label>
                                <!--begin::Label-->
                                    <div class="radio-inline row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-2 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" disabled name="bpjs_tk_detail" value="1" id="detail_bpjs_tk"  />
                                            <label class="form-check-label" for="bpjs_tk">
                                                Iya
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" disabled name="bpjs_tk_detail" value="0" id="detail_bpjs_tk"  />
                                            <label class="form-check-label" for="bpjs_tk">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <div class="form-group">
                                    <label class=" fw-bold fs-6 mb-5">BPJS Kesehatan</label>
                                <!--begin::Label-->
                                    <div class="radio-inline row">
                                        <div class="col-1"></div>
                                        <div class="form-check form-check-custom col-2 radio form-check-success form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" disabled name="bpjs_ks_detail" value="1" id="detail_bpjs_ks"  />
                                            <label class="form-check-label" for="bpjs_ks">
                                                Iya
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom col-3 radio form-check-danger form-check-solid form-check-md">
                                            <input class="form-check-input" type="radio" disabled name="bpjs_ks_detail" value="0" id="detail_bpjs_ks"  />
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
    <script type="text/javascript">
      
        $(document).ready(function (e) {
         
           
           $('#detail_photo').change(function(){
                    
            let reader = new FileReader();
         
            reader.onload = (e) => { 
         
              $('#preview-image-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });
           
        });
         
        </script>
    
</div>
