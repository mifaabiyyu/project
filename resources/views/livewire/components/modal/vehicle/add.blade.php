<div class="modal fade" id="add_vehicle" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="Machine_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Vehicle</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-vehicles-modal-action="close">
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
                <form id="add_vehicle_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Merk Kendaraan</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Merk Kendaraan" />
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Nopol Kendaraan</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="nopol_kendaraan" id="nopol_kendaraan" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nopol Kendaraan" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Tipe Kendaraan</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-solid mb-3 mb-lg-0" data-dropdown-parent="#add_vehicle" name="type_vehicle" data-control="select2" data-placeholder="-- Select Tipe Kendaraan --" id="type_vehicle" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($type_vehicles as $vehicle)
                                        <option value="{{ $vehicle }}">{{ $vehicle }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Nomor Mesin</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="nomor_mesin" id="nomor_mesin" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nomor Mesin" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Nomor Rangka</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="nomor_rangka" id="nomor_rangka" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Nomor Rangka" />
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Tahun Pembuatan</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tahun Pembuatan" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-5" > 
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">STNK</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" name="stnk" id="stnk" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="STNK" />
                                <!--end::Input-->
                            </div>
                           <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Masa berlaku STNK</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="stnk_lifetime" id="stnk_lifetime" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tahun Pembuatan" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="mb-5 fv-row w-100 flex-md-root" wire:ignore>
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Status</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid mb-3 mb-lg-0" data-dropdown-parent="#add_vehicle" name="status" data-control="select2" data-placeholder="-- Select Status --" id="status" aria-label="Select example">
                                <option value=""></option>
                                <option value="1">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-vehicles-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-vehicles-modal-action="submit">
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
