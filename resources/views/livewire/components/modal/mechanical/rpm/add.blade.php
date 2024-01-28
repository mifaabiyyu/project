<div class="modal fade" id="add_rpm" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="Machine_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Add RPM</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-rpm-modal-action="close">
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
                <form id="add_rpm_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                    <!--begin::Scroll-->
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_company_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#packingType_header" data-kt-scroll-wrappers="#kt_modal_add_company_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Date</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" name="date" id="date" data-dropdown-parent="#add_rpm" class="form-control mb-3 mb-lg-0" placeholder="-- Select Date --" />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Time</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="time" id="time" class="form-select" data-control="select2" data-dropdown-parent="#add_rpm"  data-placeholder="-- Select Time --"> 
                                <option></option>
                                <option value="08:00">08:00</option>
                                <option value="13:00">13:00</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Reference</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" data-dropdown-parent="#add_rpm" data-control="select2" name="production_planning_id" data-placeholder="-- Select Production Planning --" id="production_planning_id">
                                <option></option>
                                @foreach ($planning as $item)
                                    <option value="{{ $item->id }}">{{ $item->code }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head--> 
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">Machine</th>
                                    <th class="min-w-125px">Rpm</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold text-center">
                                @foreach ($machines as $key => $machine)
                                    <tr class="text-center">
                                        <td class="text-dark fw-bolder fs-6 pe-0">
                                            <select class="form-select" data-dropdown-parent="#add_rpm" data-control="select2" name="machine[{{ $key }}]" id="machine[{{ $key }}]">
                                                <option></option>
                                                @foreach ($machines as $keys => $mcn)
                                                    <option value="{{ $mcn->id }}" {{ $key == $keys ? 'selected' : '' }}>{{ $mcn->code }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-dark fw-bolder fs-6 pe-0">
                                            <input type="text" name="rpm[{{ $key }}]" id="rpm[{{ $key }}]" class="form-control mb-3 mb-lg-0" placeholder="Input Rpm" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-rpm-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-rpm-modal-action="submit">
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
        // $('#date').flatpickr();
    </script>
</div>
