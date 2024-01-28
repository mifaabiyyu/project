<div class="modal fade" id="detail_stone_usage" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="detail_stone_usage_header">
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
                <form id="detail_stone_usage_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="detail_stone_usage_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#detail_stone_usage_header" data-kt-scroll-wrappers="#detail_stone_usage_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Work Order</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-transparent mb-3 mb-lg-0" disabled data-dropdown-parent="#detail_stone_usage" name="production_planning" data-control="select2" data-placeholder="-- Select Work Order --" id="detail_production_planning" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($production_planning as $planning)
                                        <option value="{{ $planning->id }}">{{ $planning->code }}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Date</label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="-- Select Date --" name="date" id="detail_dateInput" readonly data-dropdown-parent="#detail_stone_usage">
                                <!--begin::Input-->
                                <!--end::Input-->
                            </div>
                        </div>
                        <hr>
                        <h4>List Material</h4>
               
                        <table class="table text-center m-1"  >
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     <th class="min-w-50">No</th>
                                     <th class="min-w-100px">Material</th>
                                     <th class="min-w-100px">QTY</th>
                                     <th class="min-w-100px">Unit</th>
                                 </tr>
                             </thead>
                            <!--begin::Table body-->
                            <input type="hidden" name="deleted" value="{{ json_encode($deleted) }}">
                            <tbody class="border-1" >
                                @foreach ($materialEdit as $key => $item)
                                 <tr>
                                    <td>
                                        <h5 class="pt-5">{{ $loop->iteration }}.</h5>
                                    </td>
                                    <td >
                                        <select class="form-control form-control-transparent mb-3 mb-lg-0 " wire:model="stone_id.{{ $key }}" name="material[{{ $key }}]" data-placeholder="-- Select Material --" id="detail_material[{{ $key }}]" aria-label="Select example">
                                            <option value="" disabled selected>-- Select Stone --</option>
                                            @foreach ($stones as $stone)
                                                <option value="{{ $stone->id }}" >{{ $stone->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" class="form-control  mb-3 mb-lg-0" placeholder="Product" /> --}}
                                     </td>
                                     <td>
                                        <div class="input-group">
                                            <input type="text" name="qty[{{$key}}]" value="{{ $item['qty'] }}" id="detail_qty_{{$key}}" disabled class="form-control form-control-transparent mb-3 mb-lg-0 text-center" placeholder="QTY"/>
                                            <span class="input-group-text">KG</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text" name="unit[{{$key}}]" value="{{ $item['unit'] }}" id="detail_unit_{{$key}}" disabled class="form-control form-control-transparent mb-3 mb-lg-0 text-center" placeholder="Unit"/>
                                        </div>
                                        {{-- <input type="text" class="form-control  mb-3 mb-lg-0" placeholder="Product" /> --}}
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
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-edit-stone-usage-modal-action="cancel">Discard</button>
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
