<div class="modal fade" id="add_lab_report" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1400px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="add_lab_report_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Lab Report</h2>
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
                <form id="add_lab_report_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="add_lab_report_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_lab_report_header" data-kt-scroll-wrappers="#add_lab_report_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-4 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="date" name="date" data-dropdown-parent="#add_lab_report" id="selectDate1" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="-- Select Date --" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-4 fv-row mb-7" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Time</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text"  class="form-control form-control-solid " readonly data-dropdown-parent="#add_lab_report" name="time" placeholder="-- Select Time --" id="selectTime_10">
                                {{-- <select class="form-control form-control-solid mb-3 mb-lg-0 customers" data-dropdown-parent="#add_lab_report" name="customer" data-control="select2" data-placeholder="-- Select Company --" id="company" aria-label="Select example">
                                    <option value=""></option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select> --}}
                                <!--end::Input-->
                            </div>
                            <div class="col-md-4 fv-row mb-7" wire:ignore>
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Reference</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-solid mb-3 mb-lg-0 reference" data-allow-clear="true" data-dropdown-parent="#add_lab_report" name="reference" data-control="select2" data-placeholder="-- Select Reference --" id="company" aria-label="Select Reference">
                                    <option value=""></option>
                                    @foreach ($productions as $production)
                                        <option value="{{ $production->id }}">{{ $production->code }}</option>
                                    @endforeach
                                </select>                                <!--end::Input-->
                            </div>
                        </div>
                        <hr>
                        <h4>Spesification</h4>
                        <div class="row">
                            <!--begin::Input group-->
                            <table class="table text-center m-1 table-hover table-rounded table-striped  gy-5 gs-5"  >
                                <!--begin::Table head-->
                                <thead wire:ignore>
                                     <tr class="fw-bolder text-muted text-center">
                                         <th class="min-w-100px">Jenis Barang</th>
                                         <th class="min-w-100px">Product</th>
                                         <th class="min-w-100px">Qty</th>
                                         <th class="min-w-100px" >SSA</th>
                                         <th class="min-w-100px" >D-50</th>
                                         <th class="min-w-100px" >D-98</th>
                                         <th class="min-w-100px" >CIE 86</th>
                                         <th class="min-w-100px" >ISO 2470</th>
                                         <th class="min-w-100px" >Residue</th>
                                         <th class="min-w-100px" >Moisture</th>
                                     </tr>
                                 </thead>
                                <!--begin::Table body-->
                                @if (count($references) == 0)
                                    <tr class="text-center"><th colspan="10">No Data</th></tr>
                                <tbody class="" >
                                    @else
                                        @foreach ($references as $reference)
                                            <tr>
                                                <td><p>{{ $reference['product_type'] }}</p></td>
                                                <td><p>{{ $reference['product'] }}</p></td>
                                                <td><p>{{ $reference['qty'] }} Sack</p></td>
                                                <td><p>{{ $reference['ssa'] }}</p></td>
                                                <td><p>{{ $reference['d_50'] }}</p></td>
                                                <td><p>{{ $reference['d_98'] }}</p></td>
                                                <td><p>{{ $reference['cie_86'] }}</p></td>
                                                <td><p>{{ $reference['iso_2470'] }}</p></td>
                                                <td><p>{{ $reference['residue'] }}</p></td>
                                                <td><p>{{ $reference['moisture'] }}</p></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                        <hr>
                        <h4>Hasil Uji</h4>
                        <table class="table text-center m-1"  >
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     <th class="min-w-50">Mesin</th>
                                     <th class="min-w-100px">Mesh</th>
                                     <th class="min-w-100px" >SSA</th>
                                     <th class="min-w-100px" >D-50</th>
                                     <th class="min-w-100px" >D-98</th>
                                     <th class="min-w-100px" >CIE 86</th>
                                     <th class="min-w-100px" >ISO 2470</th>
                                     <th class="min-w-100px" >Residue</th>
                                     <th class="min-w-100px" >Moisture</th>
                                     <th class="min-w-50px"></th>
                                 </tr>
                             </thead>
                            <!--begin::Table body-->
                            @if (count($resultLab) == 0)
                                <tr class="text-center"><th colspan="10">No Data</th></tr>
                            <tbody class="" >
                                @else
                                    @foreach ($resultLab as $index => $lab)
                                        <tr>
                                            <input type="hidden" name="product_id[{{ $index }}]" id="product_id[{{ $index }}]" value="{{ $lab['product_id'] }}">
                                            <input type="hidden" name="production_planning_detail[{{ $index }}]" id="production_planning_detail[{{ $index }}]" value="{{ $lab['production_planning_detail'] }}">
                                            <td><input type="text" class="form-control form-control-transparent text-center" readonly name="machine[{{ $index }}]" id="machine" value="{{ $lab['machine'] }}"></td>
                                            <td><input type="text" class="form-control form-control-transparent text-center" readonly name="mesh[{{ $index }}]" id="mesh" value="{{ $lab['mesh'] }}"></td>
                                            <td><input type="text" class="form-control text-center" name="ssa[{{ $index }}]" value="{{ $lab['ssa'] }}" id="ssa"></td>
                                            <td><input type="text" class="form-control text-center" name="d_50[{{ $index }}]" value="{{ $lab['d_50'] }}" id="d_50"></td>
                                            <td><input type="text" class="form-control text-center" name="d_98[{{ $index }}]" value="{{ $lab['d_98'] }}" id="d_98"></td>
                                            <td><input type="text" class="form-control text-center" name="cie_86[{{ $index }}]" value="{{ $lab['cie_86'] }}" id="cie_86"></td>
                                            <td><input type="text" class="form-control text-center" name="iso_2470[{{ $index }}]" value="{{ $lab['iso_2470'] }}" id="iso_2470"></td>
                                            <td><input type="text" class="form-control text-center" name="residue[{{ $index }}]" value="{{ $lab['residue'] }}" id="residue"></td>
                                            <td><input type="text" class="form-control text-center" name="moisture[{{ $index }}]" value="{{ $lab['moisture'] }}" id="moisture"></td>
                                            <td>
                                                <a href="javascript:void(0)" wire:click.prevent="deleteRow({{$index}})" class="btn btn-icon btn-bg-light btn-danger btn-active-color-secondary btn-sm">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" >Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-lab-report-modal-action="submit">
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
