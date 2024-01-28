<div class="modal fade" id="add_stone_purchase" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1200px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="add_stone_purchase_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Stone Purchase</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
             
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#add_stone_supplier">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Add New Supplier</button>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="add_stone_purchase_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="add_stone_purchase_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_stone_purchase_header" data-kt-scroll-wrappers="#add_stone_purchase_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <div class="col-md-4" wire:ignore>
                                <label class=" fw-bold fs-6 mb-2">Date</label>
                                <input type="text" class="form-control" data-dropdown-parent="#add_stone_purchase" readonly name="date" id="date" placeholder="-- Select Date --" />
                            </div>
                            <!--begin::Input group-->
                            <div class="col-md-4 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Supplier</label>
                                <!--end::Label-->
                                <select class="form-control mb-3 mb-lg-0 supplier" wire:ignore data-dropdown-parent="#add_stone_purchase" data-allow-clear="true" name="supplier"  id="supplier" aria-label="Select example">
                                    {{-- <option value=""></option> --}}
                                </select>
                                <!--begin::Input-->
                                <!--end::Input-->
                            </div>
                            <div class="col-md-4 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Batu</label>
                                <!--end::Label-->
                                <select class="form-control mb-3 mb-lg-0 stone" data-dropdown-parent="#add_stone_purchase" name="stone" data-control="select2" data-placeholder="-- Select Batu --" id="stone" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($stones as $stone)
                                        <option value="{{ $stone->get_stone->id }}">{{ $stone->get_stone->name }}</option>
                                    @endforeach
                                </select>
                                <!--begin::Input-->
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="fv-row row mb-5" wire:ignore>
                            <div class="col-md-4">
                                <label class="required fw-bold fs-6 mb-2">Supir</label>
                                <input type="text" class="form-control" name="driver" id="driver" placeholder="Driver" />
                            </div>
                            <div class="col-md-4">
                                <label class="required fw-bold fs-6 mb-2">Nopol Kendaraan</label>
                                <input type="text" class="form-control" name="nopol_kendaraan" id="nopol_kendaraan" placeholder="Nopol Kendaraan" />
                            </div>
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Delivery Number</label>
                                <input type="text" class="form-control" name="delivery_order_number" id="delivery_order_number" placeholder="Delivery Number" />
                            </div>
                        </div>
                        <div class="fv-row row mb-5" wire:ignore>
                            <div class="col-md-4">
                                <label class="required fw-bold fs-6 mb-2">Netto</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="netto" id="netto" placeholder="Netto" />
                                    <span class="input-group-text">KG</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="required fw-bold fs-6 mb-2">Potongan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="potongan" id="potongan" value="0" placeholder="Potongan" />
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="required fw-bold fs-6 mb-2">Berat yang dibayar</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="weight_fix" id="weight_fix" placeholder="Berat yang dibayar" />
                                    <span class="input-group-text">KG</span>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row row mb-5" wire:ignore>
                            <div class="col-md-6">
                                <label class="required fw-bold fs-6 mb-2">Quality</label>
                                <select class="form-control mb-3 mb-lg-0" data-dropdown-parent="#add_stone_purchase" name="quality" data-control="select2" data-placeholder="-- Select Quality --" id="quality" aria-label="Select example">
                                    <option value=""></option>
                                    <option value="1">Kualitas 1</option>
                                    <option value="2">Kualitas 2</option>
                                    <option value="3">Kualitas 3</option>
                                    <option value="4">Kualitas 4</option>
                                    <option value="5">Kualitas 5</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="required fw-bold fs-6 mb-2">Lokasi Penyimpanan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="location" id="location" list="list_lokasi" placeholder="Lokasi Penyimpanan" />
                                    <datalist id="list_lokasi">
                                        <option>Unit 1</option>
                                        <option>Unit 2</option>
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5 fv-row w-100  flex-md-root" wire:ignore>
                            <!--begin::Label-->
                            <label class="form-label">Description</label>
                            <!--end::Label-->
                            <textarea name="description" id="description" class="form-control" data-kt-autosize="true"></textarea>
                            <!--end::Input-->
                            <!--begin::Description-->
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-stone-purchase-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-stone-purchase-modal-action="submit">
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
