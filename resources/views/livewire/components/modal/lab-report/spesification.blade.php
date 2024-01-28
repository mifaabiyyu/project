<div class="modal fade" id="spesification_lab_report" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1400px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="spesification_lab_report_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Spesification Lab Report</h2>
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
                <form id="spesification_lab_report_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="spesification_lab_report_scroll" wire:ignore.self data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#spesification_lab_report_header" data-kt-scroll-wrappers="#spesification_lab_report_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <h4>Spesification</h4>
                        <div class="row">
                            <!--begin::Input group-->
                            <table class="table text-center m-1 table-hover table-rounded table-striped  gy-5 gs-5"  >
                                <!--begin::Table head-->
                                <thead wire:ignore>
                                     <tr class="fw-bolder text-muted text-center">
                                         <th class="min-w-100px">Jenis Barang</th>
                                         <th class="min-w-100px">Product</th>
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
                                @if (count($referencesSpec) == 0)
                                    <tr class="text-center"><th colspan="10">No Data</th></tr>
                                <tbody class="" >
                                    @else
                                        @foreach ($referencesSpec as $reference)
                                            <tr>
                                                <td><p>{{ $reference['product_type'] }}</p></td>
                                                <td><p>{{ $reference['product'] }}</p></td>
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
                        <!--end::Input group-->
                        <hr>
                        <h4>Hasil Uji</h4>
                        <table class="table text-center m-1 table-row-bordered table-row-gray-500"  style="border: 1px" >
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     <th class="min-w-100px">Mesin</th>
                                     <th class="min-w-100px" >Test Time</th>
                                     <th class="min-w-100px">Mesh</th>
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
                            @if (count($resultLabSpec) == 0)
                                <tr class="text-center"><th colspan="10">No Data</th></tr>
                            <tbody class="" wire:ignore.self>
                                @else
                                    @foreach ($resultLabSpec as $keys => $groupByMachine)
                                    <div wire:key="{{ $keys }}">
                                        @php
                                           $key = 0; 
                                        @endphp
                                            @foreach ($groupByMachine as $index => $lab)
                                                <div>
                                                    <tr  class=" border-bottom border-gray-500" >
                                                        <input readonly type="hidden" name="detail_id[{{ $index }}]" id="detail_id[{{ $index }}]" value="{{ $lab['detail_id'] }}">
                                                        <input readonly type="hidden" name="product_id[{{ $index }}]" id="product_id[{{ $index }}]" value="{{ $lab['product_id'] }}">
                                                        <input readonly type="hidden" name="production_planning_detail[{{ $index }}]" id="production_planning_detail[{{ $index }}]" value="{{ $lab['production_planning_detail'] }}">
                                                        @if ($key == 0)
                                                            <td rowspan="{{ count($groupByMachine) }}" style="align-content: center"><input readonly type="text" class="form-control form-control-transparent text-center" readonly name="machine[{{ $index }}]" id="machine" value="{{ $lab['machine'] }}"></td>
                                                        @endif
                                                        <td><input readonly type="text" class="form-control text-center form-control-transparent listTime" data-dropdown-parent="#edit_lab_report" name="time[{{ $index }}]" value="{{ $lab['time'] }}" id="time"></td>
                                                        <td><input readonly type="text" class="form-control form-control-transparent text-center" readonly name="mesh[{{ $index }}]" id="mesh" value="{{ $lab['mesh'] }}"></td>
                                                        <td><input readonly type="text" class="form-control text-center form-control-transparent" placeholder="SSA" name="ssa[{{ $index }}]" value="{{ $lab['ssa'] }}" id="ssa"></td>
                                                        <td><input readonly type="text" class="form-control text-center form-control-transparent" placeholder="D-50" name="d_50[{{ $index }}]" value="{{ $lab['d_50'] }}" id="d_50"></td>
                                                        <td><input readonly type="text" class="form-control text-center form-control-transparent" placeholder="D-98" name="d_98[{{ $index }}]" value="{{ $lab['d_98'] }}" id="d_98"></td>
                                                        <td><input readonly type="text" class="form-control text-center form-control-transparent" placeholder="CIE 86" name="cie_86[{{ $index }}]" value="{{ $lab['cie_86'] }}" id="cie_86"></td>
                                                        <td><input readonly type="text" class="form-control text-center form-control-transparent" placeholder="ISO 2470" name="iso_2470[{{ $index }}]" value="{{ $lab['iso_2470'] }}" id="iso_2470"></td>
                                                        <td><input readonly type="text" class="form-control text-center form-control-transparent" placeholder="Residue" name="residue[{{ $index }}]" value="{{ $lab['residue'] }}" id="residue"></td>
                                                        <td><input readonly type="text" class="form-control text-center form-control-transparent" placeholder="Moisture" name="moisture[{{ $index }}]" value="{{ $lab['moisture'] }}" id="moisture"></td>
                                                    </tr>
                                                </div>
                                                @php
                                                    $key++;
                                                @endphp
                                            @endforeach
                                    </div>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot class="border-top border-gray-500">
                                <tr class="fw-bolder text-muted text-center">
                                    <th class="min-w-100px">Mesin</th>
                                    <th class="min-w-100px" >Test Time</th>
                                    <th class="min-w-100px">Mesh</th>
                                    <th class="min-w-100px" >SSA</th>
                                    <th class="min-w-100px" >D-50</th>
                                    <th class="min-w-100px" >D-98</th>
                                    <th class="min-w-100px" >CIE 86</th>
                                    <th class="min-w-100px" >ISO 2470</th>
                                    <th class="min-w-100px" >Residue</th>
                                    <th class="min-w-100px" >Moisture</th>
                                </tr>
                            </tfoot>
                            <!--end::Table body-->
                        </table>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                 
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" >Discard</button>
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
