<div class="modal fade" id="edit_offering_letter" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-xl" >
        <!--begin::Modal content-->
        <div class="modal-content" >
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_company_header" wire:ignore>
                <!--begin::Modal title-->
                <h2 class="fw-bolder" id="headerForm"></h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-edit-offering-letter-modal-action="close">
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
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7" >
                <!--begin::Form-->
                <form id="edit_offering_letter_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" >
                        <!--begin::Input group-->
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Company</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="company" id="edit_company" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Company"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-3 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">City</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="city" id="edit_city" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="City"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-3 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">PIC</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="pic" id="edit_pic" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="PIC"/>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Input group-->
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Header Detail 1</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="header_detail_1" id="edit_header_detail_1" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Header Detail 1"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Header Detail 2</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="header_detail_2" id="edit_header_detail_2" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Header Detail 2"/>
                                <!--end::Input-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Header Detail 3</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="header_detail_3" id="edit_header_detail_3" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Header Detail 3"/>
                                <!--end::Input-->
                            </div>
                            <div class="col-md-6 fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Header Detail 4</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="header_detail_4" id="edit_header_detail_4" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Header Detail 4"/>
                                <!--end::Input-->
                            </div>
                        </div>
                       <div class="row mb-7" >
                            <div class="col-md-9 fv-row mb-7" >
                                <label class="required fw-bold fs-5 mb-2">Details</label>
                            </div>
                           <div class="col-md-3 fv-row mb-7 text-end">
                               <button class="btn btn-success" wire:click.prevent="addDetail()">Add Product</button>
                           </div>
                           <div class="table-responsive"  >
                               <!--begin::Table-->
                               <table class="table text-center m-1"  >
                                   <!--begin::Table head-->
                                   <thead wire:ignore>
                                        <tr class="fw-bolder text-muted text-center bg-light">
                                            <th class="min-w-100px max-w-200px" id="edit_header_1"></th>
                                            <th class="min-w-100px" id="edit_header_2"></th>
                                            <th class="min-w-100px" id="edit_header_3"></th>
                                            <th class="min-w-100px" id="edit_header_4"></th>
                                            <th class="min-w-50px"></th>
                                        </tr>
                                    </thead>
                                   <!--begin::Table body-->
                                   <tbody class="border-1" >
                                    @foreach ($productDetail as $index => $item)
                                        <input type="hidden" name="offeringDetail[{{$index}}][id]" value="{{ $item['id'] }}">
                                        <tr>
                                            <td>
                                                <input type="text" value="{{ $item['description_1'] }}" name="offeringDetail[{{$index}}][description_1]" id="edit_description_1[{{$index}}]" class="form-control mb-3 mb-lg-0 text-center" placeholder="Detail 1"/>
                                            </td>
                                            <td>
                                                <input type="text" value="{{ $item['description_2'] }}" name="offeringDetail[{{$index}}][description_2]" id="edit_description_2[{{$index}}]" class="form-control mb-3 mb-lg-0 text-center" placeholder="Detail 2"/>
                                            </td>
                                            <td>
                                                <input type="text" value="{{ $item['description_3'] }}" name="offeringDetail[{{$index}}][description_3]" id="edit_description_3[{{$index}}]" class="form-control mb-3 mb-lg-0 text-center" placeholder="Detail 3"/>
                                            </td>
                                            <td>
                                                <input type="text" value="{{ $item['description_4'] }}" name="offeringDetail[{{$index}}][description_4]" id="edit_description_4[{{$index}}]" class="form-control mb-3 mb-lg-0 text-center" placeholder="Detail 4"/>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" wire:click.prevent="$emit('triggerDelete',{{ $index }} , {{$item['id']}})" class="btn btn-icon btn-bg-light btn-danger btn-active-color-secondary btn-sm">
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
                               <!--end::Table-->
                           </div>
                       </div>
                                  <!--begin::Input group-->
                        <div class="fv-row mb-7" wire:ignore>
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="description" id="edit_description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter description">
                            </textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-edit-offering-letter-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-edit-offering-letter-modal-action="submit">
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @this.on('triggerDelete', (index, id) => {

                Swal.fire({
                        text:
                            "Are you sure you want to delete Detail ?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary",
                        },
                    }).then((result) => {
                    if (result.value) {
                        @this.call('deleteRow', index, id)
                    }
                });
            });
        })
    </script>
</div>
