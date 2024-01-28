<div class="modal fade" id="detail_permintaan_sample" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1200px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="detail_permintaan_sample_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" wire:ignore id="headerFormDetail"></h2>
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
                <form id="detail_permintaan_sample_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="detail_permintaan_sample_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#detail_permintaan_sample_header" data-kt-scroll-wrappers="#detail_permintaan_sample_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-4 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" readonly disabled name="date" id="detail_date" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-- Select Date --" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-4 fv-row mb-7" wire:ignore>
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Customer</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" readonly wire:change.prevent="changeCustomers($event.target.value)" class="form-control form-control-transparent" id="detail_customer" name="customer" list="customer" placeholder="Customer" />
                                <datalist id="customer">
                                    @foreach ($customers as $customer)
                                        <option>{{ $customer->name }}</option>
                                    @endforeach
                                </datalist>
                                {{-- <select class="form-control form-control-transparent mb-3 mb-lg-0 customers" data-dropdown-parent="#detail_permintaan_sample" name="customer" data-control="select2" data-placeholder="-- Select Company --" id="company" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select> --}}
                                <!--end::Input-->
                            </div>
                            <div class="col-md-4 fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Address</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control form-control-transparent mb-3 mb-lg-0" name="address" data-kt-autosize="true" id="detail_address" cols="" rows="">{{ $address }}</textarea>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Ekspedisi</label>
                                <!--end::Label-->
                                <div class="input-group">
                                    <div class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input ekspedisi" disabled type="radio" value="Ambil Sendiri" name="ekspedisi" id="detail_ekspedisi"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Ambil Sendiri
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid me-5">
                                        <input class="form-check-input ekspedisi" disabled type="radio" value="0" name="ekspedisi" id="detail_ekspedisi"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            Ekspedisi
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input type="text" readonly style="visibility: hidden" disabled name="ekspedisi_name" id="detail_ekspedisi_name" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Nama Ekspedisi" />
                                    </div>
                                </div>
                                <!--begin::Input-->
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Nomor Resi</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" readonly name="nomor_resi" id="detail_nomor_resi" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Nomor Resi" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <hr>
                        <h4>Product</h4>
                        <div class="text-end">
                            {{-- <button class="btn btn-success text-right" wire:click.prevent="addProduct">Add Item</button> --}}
                        </div>
                        <table class="table text-center m-1"  >
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     <th class="min-w-50">No</th>
                                     <th class="min-w-100px">Jenis Barang</th>
                                     <th class="min-w-100px">Product</th>
                                     <th class="min-w-100px">Qty</th>
                                     <th class="min-w-50px"></th>
                                 </tr>
                             </thead>
                            <!--begin::Table body-->
                            <input type="hidden" name="deleted" value="{{ json_encode($deleted) }}">
                            <tbody class="border-1" >
                                @foreach ($products as $key => $item)
                                 <tr>
                                    <td>
                                        <h5 class="pt-5">{{ $loop->iteration }}.</h5>
                                    </td>
                                    <td> 
                                        <input type="hidden" name="id[{{$key}}]" value="{{ $item['id'] }}">
                                        <input type="hidden" name="detail_status[{{$key}}]" value="{{ $item['status'] }}">
                                        <input type="text" readonly class="form-control form-control-transparent" name="list_barang[{{$key}}]" value="{{ $item['type_of_goods'] }}" list="detail_list_barang" placeholder="List Barang" />
                                        <datalist id="detail_list_barang">
                                            <option>Batu Ketak</option>
                                            <option>Batu Kapur</option>
                                        </datalist>
                                    </td>
                                     <td wire:ignore>
                                        <select class="form-control form-control-transparent mb-3 mb-lg-0 produkdata" disabled data-dropdown-parent="#detail_permintaan_sample" name="product[{{ $key }}]" data-control="select2" data-placeholder="-- Select Product --" id="detail_product[{{ $key }}]" aria-label="Select example">
                                            <option value=""></option>
                                            @foreach ($dataProduct as $prd)
                                                <option value="{{ $prd->id }}" {{ $item['jenis_product'] == $prd->id ? 'selected' : '' }}>{{ $prd->name }} - Mesh {{ $prd->mesh }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" readonly class="form-control  mb-3 mb-lg-0" placeholder="Product" /> --}}
                                     </td>
                                     <td wire:ignore>
                                        <div class="input-group">
                                            <input type="text" readonly name="qty[{{$key}}]" id="detail_qty[{{$key}}]"class="form-control  form-control-transparent" value="{{ $item['qty'] }}" placeholder="Qty" />
                                            <span class="input-group-text" id="basic-addon1{{ $key }}">KG</span>
                                        </div>
                                    </td>
                                 </tr>    
                             @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
             
                        <!--end::Input group-->
                       
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-customer-card-modal-action="cancel">Discard</button>
                        {{-- <button type="submit" class="btn btn-primary" data-kt-permintaan-sample-detail-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button> --}}
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
