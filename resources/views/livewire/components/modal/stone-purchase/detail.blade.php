<div class="modal fade" id="detail_stone_purchase" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1200px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="detail_stone_purchase_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="modalHeaderDetail" wire:ignore></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-customer-card-modal-action="close" data-bs-dismiss="modal">
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
                <form id="detail_stone_purchase_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="detail_stone_purchase_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#detail_stone_purchase_header" data-kt-scroll-wrappers="#detail_stone_purchase_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row row mb-5">
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Date</label>
                                <input type="text" class="form-control form-control-transparent" readonly name="date" id="detail_date" placeholder="-- Select Date --" />
                            </div>
                            <!--begin::Input group-->
                            <div class="col-md-4 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Supplier</label>
                                <!--end::Label-->
                                <select class="form-control form-control-transparent mb-3 mb-lg-0" data-dropdown-parent="#detail_stone_purchase" name="supplier" data-control="select2" data-placeholder="-- Select Supplier --" id="detail_supplier" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                <!--begin::Input-->
                                <!--end::Input-->
                            </div>
                            <div class="col-md-4 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Batu</label>
                                <!--end::Label-->
                                <select class="form-control form-control-transparent mb-3 mb-lg-0" data-dropdown-parent="#detail_stone_purchase" name="stone" data-control="select2" data-placeholder="-- Select Batu --" id="detail_stone" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($stones as $stone)
                                        <option value="{{ $stone->id }}">{{ $stone->name }}</option>
                                    @endforeach
                                </select>
                                <!--begin::Input-->
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="fv-row row mb-5">
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Supir</label>
                                <input type="text" class="form-control form-control-transparent" name="driver" id="detail_driver" placeholder="Driver" />
                            </div>
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Nopol Kendaraan</label>
                                <input type="text" class="form-control form-control-transparent" name="nopol_kendaraan" id="detail_nopol_kendaraan" placeholder="Nopol Kendaraan" />
                            </div>
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Delivery Number</label>
                                <input type="text" class="form-control form-control-transparent" name="delivery_order_number" id="detail_delivery_order_number" placeholder="Delivery Number" />
                            </div>
                        </div>
                        <div class="fv-row row mb-5">
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Netto</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-transparent" name="netto" id="detail_netto" placeholder="Netto" />
                                    <span class="input-group-text">KG</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Potongan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-transparent" name="potongan" id="detail_potongan" value="0" placeholder="Potongan" />
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class=" fw-bold fs-6 mb-2">Berat yang dibayar</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-transparent" name="weight_fix" id="detail_weight_fix" placeholder="Berat yang dibayar" />
                                    <span class="input-group-text">KG</span>
                                </div>
                            </div>
                        </div>
                        <div class="fv-row row mb-5">
                            <div class="col-md-6">
                                <label class=" fw-bold fs-6 mb-2">Quality</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-transparent" name="quality" id="detail_quality" placeholder="Quality" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class=" fw-bold fs-6 mb-2">Lokasi Penyimpanan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-transparent" name="location" id="detail_location" list="list_lokasi" placeholder="Lokasi Penyimpanan" />
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
                            <textarea name="description" id="detail_description" class="form-control form-control-transparent" data-kt-autosize="true"></textarea>
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
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-edit-stone-purchase-modal-action="cancel">Discard</button>
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
