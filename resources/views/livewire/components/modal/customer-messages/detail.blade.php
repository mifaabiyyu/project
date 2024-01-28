<div class="modal fade" id="detail_customer_message" tabindex="-1" aria-hidden="true" wire:ignore.self>
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
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-5">Detail</h4>
                        <!--begin::Form-->
                        <form id="detail_customer_message_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                            <!--begin::Scroll-->
                            @csrf
                            @method('PUT')
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" >
                                <!--begin::Input group-->
                                <div class="row">
                                    <!--begin::Input group-->
                                    <div class="col-md-6 fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class=" fw-bold fs-6 mb-2">Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" readonly name="name" id="edit_name" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Name"/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-3 fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class=" fw-bold fs-6 mb-2">Company</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" readonly name="Company" id="edit_company" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Company"/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row">
                                    <!--begin::Input group-->
                                    <div class="col-md-6 fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class=" fw-bold fs-6 mb-2">Email</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" readonly name="email" id="edit_email" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Header Detail 1"/>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-md-6 fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class=" fw-bold fs-6 mb-2">Phone</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" readonly name="phone" id="edit_phone" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Header Detail 2"/>
                                        <!--end::Input-->
                                    </div>
                                </div>
                
                                <div class="fv-row mb-7" wire:ignore>
                                    <!--begin::Label-->
                                    <label class=" fw-bold fs-6 mb-2">Description</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea readonly name="description" id="edit_description" class="form-control form-control-transparent mb-3 mb-lg-0" placeholder="Enter description"></textarea>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                        
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-5">Email</h4>
                        <form id="send_email" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                            @csrf
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Send To</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" value="" name="email" id="email" placeholder="Email"/>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">CC</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cc" id="cc" placeholder="Email"/>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">From</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" name="from" id="from" value="{{ env('MAIL_USERNAME', 'sales@dwiselogirimas.com') }}" placeholder=""/>
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fw-bold fs-6 mb-2">Message</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group">
                                    <textarea class="form-control" name="message" id="message" cols="5" rows="3" placeholder="Message"></textarea>
                                </div>
                                <!--end::Input-->
                            </div>   
                        <div class="row">
                            <div class="col">
                                <strong id="count"></strong>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            {{-- <button type="reset" class="btn btn-light me-3" data-kt-detail-customer-message-modal-action="cancel">Discard</button> --}}
                            <button type="submit" class="btn btn-primary" data-kt-detail-customer-message-modal-action="submitEmail">
                                <span class="indicator-label">Send Email</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
    <script>
         var cc = document.querySelector("#cc");
        new Tagify(cc);
    </script>
</div>
