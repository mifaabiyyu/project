@section('title', 'Add Customers - Sales')

@section('scriptCrud')
    <script src="{{ asset('js/crud/sales/customers/customer-list/add.js') }}" ></script>
@endsection

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Add Customer</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Sales</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Add Customer</li>
                    <!--end::Item-->
                   
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
     
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post" wire:ignore>
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Form-->
            <form id="add_customer" method="POST" action="javascript:void(0)" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row">
                @csrf
           
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>General</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <!--begin::Label-->
                                                <label class="required form-label">Name Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Name Customer" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <!--begin::Label-->
                                                <label class="required form-label">Email Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email Customer" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <!--end::Description-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <!--begin::Label-->
                                                <label class="required form-label">Company</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="company" id="company" class="form-control mb-2" placeholder="Company" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <!--end::Description-->
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Phone Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number" name="phone" id="phone" class="form-control mb-2" placeholder="Phone Customer" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Businness Area</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="business_area" id="business_area" class="form-control mb-2" placeholder="Businness Area" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <!--begin::Description-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Status</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true" data-placeholder="-- Select status --" id="status">
                                                    <option></option>
                                                    <option value="1" selected="selected">Active</option>
                                                    <option value="0">Non Active</option>
                                                </select>                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <!--begin::Description-->
                                            </div>
                                           
                                        </div>
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                         
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">City Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select class="form-select" name="city" id="city" data-control="select2" data-placeholder="-- Select city --">
                                                    <option></option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Address Customer</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea type="text" name="address" id="address" class="form-control mb-2" placeholder="Address Customer" value="" ></textarea>
                                                <!--end::Input-->
                                            </div>
                                           
                                        </div>
                                        <!--begin::Input group-->
                                        <!--end::Input group-->
                                      
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2></h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                         
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Database</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                                <input type="text" name="database" id="database" class="form-control mb-2" placeholder="Database" value="" />
                                            <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Link</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="link" id="link" class="form-control mb-2" placeholder="link" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Hosting</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="hosting" id="hosting" class="form-control mb-2" placeholder="Hosting" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">Storage</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="storage" id="storage" class="form-control mb-2" placeholder="Storage" value="" />
                                                <!--end::Input-->
                                            </div>
                                           
                                        </div>
                                        <!--begin::Input group-->
                                     
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                {{-- <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>PIC</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-wrap gap-5 mb-5">
                                         
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">PIC Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                                <input type="text" name="pic" id="pic" class="form-control mb-2" placeholder="PIC" value="" />
                                            <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">PIC Position</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="pic_position" id="pic_position" class="form-control mb-2" placeholder="PIC Position" value="" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="mb-5 fv-row text-left w-100 flex-md-root" wire:ignore>
                                                <label class=" form-label">PIC Phone</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="pic_phone" id="pic_phone" class="form-control mb-2" placeholder="PIC Phone" value="" />
                                                <!--end::Input-->
                                            </div>
                                           
                                        </div>
                                        <!--begin::Input group-->
                                     
                                    </div>
                                    <!--end::Card header-->
                                </div> --}}
                            </div>
                        </div>
                        <!--end::Tab pane-->
                  
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('customer.index') }}" id="kt_ecommerce_add_customer_cancel" class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_customer_submit" class="btn btn-primary" data-kt-customers-action="submit" >
                            <span class="indicator-label" >Save Changes</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
  
    <!--end::Post-->
</div>
<script>
   
// $("#nik_image").on("change", function (e) {
//     var file = e.target.files[0]
//     if(file.type == "application/pdf"){
//         document.getElementById(
//             "img-add-cust2"
//         ).style.display = "none";
//         document.getElementById(
//             "nik-file"
//         ).style.display = "block";
//         $("#nik-file").attr("src", URL.createObjectURL(event.target.files[0]));
//     } else{
//         document.getElementById("nik-file").style.display = "none"
//         document.getElementById("img-add-cust2").style.display = "block"
//     }
// })
// $("#npwp_image").on("change", function (e) {
//     var file = e.target.files[0]
//     if(file.type == "application/pdf"){
//         document.getElementById(
//             "img-add-cust"
//         ).style.display = "none";
//         document.getElementById(
//             "npwp-file"
//         ).style.display = "block";
//         $("#npwp-file").attr("src", URL.createObjectURL(event.target.files[0]));
//     }else{
//         document.getElementById("npwp-file").style.display = "none"
//         document.getElementById("img-add-cust").style.display = "block"
//     }
// });
 
</script>