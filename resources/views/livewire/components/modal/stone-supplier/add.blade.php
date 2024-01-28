<div class="modal fade" id="add_stone_supplier" wire:ignore.self tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered" style="max-width :900px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="add_stone_supplier_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add Stone Supplier</h2>
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
                <form id="add_stone_supplier_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="add_stone_supplier_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_stone_supplier_header" data-kt-scroll-wrappers="#add_stone_supplier_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Input Name" />
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Address</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <textarea class="form-control form-control-solid mb-3 mb-lg-0" name="address" data-kt-autosize="true" id="address" cols="" rows="">-</textarea>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-12 fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">File Perizinan</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="file" name="file_perizinan" id="file_perizinan" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Input File" />
                                <!--end::Input-->
                            </div>
                        </div>
                        <hr>
                        <h4>List Material</h4>
                        <div class="text-end">
                            <button class="btn btn-success text-right" wire:click.prevent="addProduct">Add Material</button>
                        </div>
                        <table class="table text-center m-1"  >
                            <!--begin::Table head-->
                            <thead wire:ignore>
                                 <tr class="fw-bolder text-muted text-center">
                                     <th class="min-w-50">No</th>
                                     <th class="min-w-100px">Material</th>
                                     <th class="min-w-50px"></th>
                                 </tr>
                             </thead>
                            <!--begin::Table body-->
                            <tbody class="border-1" >
                                @foreach ($material as $key => $item)
                                 <tr>
                                    <td>
                                        <h5 class="pt-5">{{ $loop->iteration }}.</h5>
                                    </td>
                                     <td wire:ignore>
                                        <select class="form-control form-control-solid mb-3 mb-lg-0 materialData" data-dropdown-parent="#add_stone_supplier" name="material[{{ $key }}]" data-control="select2" data-placeholder="-- Select Material --" id="product[{{ $key }}]" aria-label="Select example">
                                            <option disabled>-- Select Stone --</option>
                                            @foreach ($stones as $stone)
                                                <option value="{{ $stone->id }}">{{ $stone->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="text" class="form-control  mb-3 mb-lg-0" placeholder="Product" /> --}}
                                     </td>
                                     <td>
                                         <a href="javascript:void(0)" wire:click.prevent="deleteRow({{$key}})" class="btn btn-icon btn-bg-light btn-danger btn-active-color-secondary btn-sm">
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
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-stone-supplier-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-stone-supplier-modal-action="submit">
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
