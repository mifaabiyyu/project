<div class="modal fade" id="edit_lab_stone_supplier" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :1500px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="edit_lab_stone_supplier_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="headerLab" wire:ignore></h2>
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
                <form id="edit_lab_stone_supplier_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="edit_lab_stone_supplier_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#edit_lab_stone_supplier_header" data-kt-scroll-wrappers="#edit_lab_stone_supplier_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <h4>List Material</h4>
                        <table class="table text-center m-1"  >
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     <th class="min-w-150px">Material</th>
                                     <th class="min-w-50px" >CACO3</th>
                                     <th class="min-w-50px" >MGCO3</th>
                                     <th class="min-w-50px" >CIE 85</th>
                                     <th class="min-w-50px" >ISO 2470</th>
                                     <th class="min-w-50px" >Moisture</th>
                                     <th class="min-w-150px" >Notes</th>
                                 </tr>
                             </thead>
                             <input type="hidden" name="deleted" value="{{ json_encode($deleted) }}">
                            <!--begin::Table body-->
                            <tbody class="border-1" >
                                @foreach ($materialEdit as $index => $item)
                                 <tr>
                                        {{-- <input type="hidden" name="status[{{ $index }}]" value="{{ $item['status'] }}"> --}}
                                        <input type="hidden" name="id[{{ $index }}]" value="{{ $item['id'] }}">
                                        <td >
                                            <select class="form-control form-control-solid mb-3 mb-lg-0 " disabled wire:model="stone_id.{{ $index }}" name="material[{{ $index }}]" data-placeholder="-- Select Material --" id="edit_material[{{ $index }}]" aria-label="Select example">
                                                <option value="" disabled selected>-- Select Stone --</option>
                                                @foreach ($stones as $stone)
                                                    <option value="{{ $stone->id }}">{{ $stone->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" class="form-control  mb-3 mb-lg-0" placeholder="Product" /> --}}
                                        </td>
                                        <td>
                                            <input type="text" name="caco3[{{$index}}]" id="caco3_{{$index}}" value="{{ $item['caco3'] }}"  class="form-control mb-3 mb-lg-0 text-center" placeholder="CACO3"/>
                                        </td>
                                        <td>
                                            <input type="text" name="mgco3[{{$index}}]" id="mgco3_{{$index}}" value="{{ $item['mgco3'] }}"  class="form-control mb-3 mb-lg-0 text-center" placeholder="MGCO3"/>
                                        </td>
                                        <td>
                                            <input type="text" name="cie_85[{{$index}}]" id="cie_85_{{$index}}" value="{{ $item['cie_85'] }}"  class="form-control mb-3 mb-lg-0 text-center" placeholder="CIE 85"/>
                                        </td>
                                        <td>
                                            <input type="text" name="iso_2470[{{$index}}]" id="iso_2470_{{$index}}" value="{{ $item['iso_2470'] }}"  class="form-control mb-3 mb-lg-0 text-center" placeholder="ISO 2470"/>
                                        </td>
                                        <td>
                                            <input type="text" name="moisture[{{$index}}]" id="moisture_{{$index}}" value="{{ $item['moisture'] }}" class="form-control mb-3 mb-lg-0 text-center" placeholder="Moisture"/>
                                        </td>
                                        <td>
                                            <textarea name="description[{{$index}}]" id="description_{{$index}}" class="form-control mb-3 mb-lg-0 text-center" placeholder="Notes">{{ $item['description'] }}</textarea>
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
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-edit-stone-supplier-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-edit-stone-supplier-modal-action="submit">
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
