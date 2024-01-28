@section('title', 'Finish Goods - Warehouse')

@section('scriptCrud')
<script src="{{ asset('js/datatable/warehouse/finish-goods-table.js') }}" ></script>
<script src="{{ asset('js/crud/warehouse/finish-goods/add.js') }}" ></script>
<script src="{{ asset('js/crud/warehouse/finish-goods/action.js') }}" ></script>
{{-- <script src="{{ asset('js/datatable/production/inventory/inventory-table.js') }}" ></script> --}}
@endsection

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Warehouse</h1>
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
                    <li class="breadcrumb-item text-muted">Warehouse</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Finish Goods</li>
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
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="flex-lg-row-fluid">
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#approve">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <i class="fas fa-mail-bulk"></i>
                        </span>
                        <!--end::Svg Icon-->Approve</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#stock">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                        <span class="svg-icon svg-icon-2 me-2">
                            <i class="fas fa-mail-bulk"></i>
                        </span>
                        <!--end::Svg Icon-->Stock</a>
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="approve" role="tabpanel">
                        <div class="card" wire:ignore>
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" data-kt-realization-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Planning" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end" data-kt-realization-table-toolbar="base">
                                        <div class="input-group w-250px me-3">
                                            <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" name="dateFilter" id="dateFilter" />
                                            <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                                        <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </div>
                                     
                                        <!--begin::Filter-->
                                 
                                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="filterMdl">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Separator-->
                                            <!--begin::Content-->
                                            <div class="px-7 py-5" data-kt-realization-table-filter="form">
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-bold">Status:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Options-->
                                                    <select class="form-select form-select-solid fw-bolder" name="statusFilter" id="statusFilter"  data-control="select2" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role">
                                                        <option></option>
                                                        <option value="1">Planning</option>
                                                        <option value="13">Realization</option>
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-realization-table-filter="reset">Reset</button>
                                                    <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true" data-kt-realization-table-filter="filter">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Menu 1-->
                                        <!--end::Filter-->
                                  
                                        <!--begin::Add product-->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_finish_goods_modal">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Add Finish Goods</button>
                                        <!--end::Add product-->
                                    </div>
                                    <!--end::Toolbar-->
                                    <!--begin::Group actions-->
                                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-realization-table-toolbar="selected">
                                        <div class="fw-bolder me-5">
                                        <span class="me-2" data-kt-realization-table-select="selected_count"></span>Selected</div>
                                        <button type="button" class="btn btn-danger" data-kt-realization-table-select="delete_selected">Delete Selected</button>
                                    </div>
                                    <!--end::Group actions-->
                           
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-4" >
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="finish_goods_table">
                                    <!--begin::Table head--> 
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Date</th>
                                            <th class="min-w-125px">Code</th>
                                            <th class="min-w-125px">Total Qty</th>
                                            <th class="min-w-125px">Total Weight</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="text-center min-w-100px">Actions</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold text-center">
                                    </tbody> 
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                    <div class="tab-pane fade " id="stock" role="tabpanel">
                        <div class="card" wire:ignore>
                            <!--begin::Card header-->
                            <div class="card-header border-0 pt-6">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" data-kt-products-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search product" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end" data-kt-products-table-toolbar="base">
                                        <!--begin::Filter-->
                                       
                                        <!--end::Menu 1-->
                                        <!--end::Filter-->
                                  
                                        <!--end::Add product-->
                                    </div>
                                    <!--end::Toolbar-->
                                    <!--begin::Group actions-->
                                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-products-table-toolbar="selected">
                                        <div class="fw-bolder me-5">
                                        <span class="me-2" data-kt-products-table-select="selected_count"></span>Selected</div>
                                        <button type="button" class="btn btn-danger" data-kt-products-table-select="delete_selected">Delete Selected</button>
                                    </div>
                                    <!--end::Group actions-->
                           
                                    <!--begin::Modal - Add task-->
                                    <!--end::Modal - Add task-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-4">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="products_table">
                                    <!--begin::Table head--> 
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-center text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Product</th>
                                            <th class="min-w-125px">Code</th>
                                            <th class="min-w-125px">QTY</th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-bold text-center">
                                    </tbody> 
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Card-->
         
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <div class="modal fade" id="add_finish_goods_modal" wire:ignore.self tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered" style="max-width :1200px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="add_finish_goods_modal_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Add Finish Goods</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                 
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="add_finish_goods_modal_form" method="post" action="javascript:void(0)" class="form" enctype="multipart/form-data">
                        <!--begin::Scroll-->
                        @csrf
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="add_finish_goods_modal_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#add_finish_goods_modal_header" data-kt-scroll-wrappers="#add_finish_goods_modal_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->
                            <div class="fv-row row mb-5">
                                <div class="col-md-6" wire:ignore>
                                    <label class="required fw-bold fs-6 mb-2">Date</label>
                                    <input type="date" class="form-control" data-dropdown-parent="#add_finish_goods_modal" name="date" id="date" placeholder="-- Select Date --" />
                                </div>
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7" wire:ignore>
                                        <!--begin::Label-->
                                    <label class=" fw-bold fs-6 mb-2">Production Realization</label>
                                    <!--end::Label-->
                                    <select class="form-control mb-3 mb-lg-0 supplier" wire:ignore data-dropdown-parent="#add_finish_goods_modal" data-allow-clear="true" name="production_realization"  id="production_realization" aria-label="Select example">
                                        {{-- <option value=""></option> --}}
                                    </select>
                                    <!--begin::Input-->
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="fv-row row mb-5">
                                <div class="col-md-6" wire:ignore>
                                    <label class=" fw-bold fs-6 mb-2">Total Qty</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly  name="total_qty" id="total_qty" value="0" placeholder="0" />
                                        <span class="input-group-text" id="basic-addon1">Sack</span>
                                    </div>
                                </div>
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7" wire:ignore>
                                        <!--begin::Label-->
                                    <label class=" fw-bold fs-6 mb-2">Total Weight</label>
                                    <!--end::Label-->
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly name="total_weight" id="total_weight" value="0" placeholder="0" />
                                        <span class="input-group-text" id="basic-addon1">KG</span>
                                    </div>
                                    <!--end::Input-->
                                </div>
                            </div>
                            <div class="mb-5 fv-row w-100  flex-md-root" wire:ignore>
                                <!--begin::Label-->
                                <label class="form-label">Notes</label>
                                <!--end::Label-->
                                <textarea name="notes" id="notes" class="form-control" data-kt-autosize="true">-</textarea>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <!--end::Description-->
                            </div>
                            <hr>
                            <h4>List Item</h4>
                            <div class="text-end">
                                <button class="btn btn-success text-right" onclick="addDataPurchase()">Add Item</button>
                            </div>
                            <table class="table text-center m-1"  id="item-request">
                                <!--begin::Table head-->
                                <thead wire:ignore>
                                     <tr class="fw-bolder text-muted text-center">
                                         {{-- <th class="min-w-50">No</th> --}}
                                         <th class="min-w-150px">Item</th>
                                         <th class="min-w-100px">Qty</th>
                                         <th class="min-w-100px">Weight</th>
                                         <th class="min-w-100px">Machine </th>
                                         <th class="min-w-50px"></th>
                                     </tr>
                                 </thead>
                                <!--begin::Table body-->
                                <tbody class="border-1" id="bodyData">
                                   
                                </tbody>
                        
                            </table>
                        
                            
    
                          
                            <!--end::Input group-->
                            <!--begin::Input group-->
                     
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" data-kt-finish-goods-modal-action="cancel">Discard</button>
                            <button type="submit" class="btn btn-primary" data-kt-finish-goods-modal-action="submit">
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
    <script>

 
   
        var table = $("#item-request").DataTable({
            paging: false,
            ordering: false,
            scrollY: "400px",
            scrollCollapse: true,
        });



        // var totalAll = (index) => {
      
        //     let qty = $("input[name='qty["+ index +"]").val();
        //     let price = $("input[name='price["+ index +"]']").val();
        
        //     let count   = qty * price;

        //     $("input[name='total_price["+ index +"]").val(formatRupiah(count,'Rp. '));

        //     totalAll();
        // };

        var totalAll = () => {
            let totalQty   = 0;
            let totalWeight   = 0;
            table.rows().eq(0).each( function ( index ) {

                let data    = $("input[name='qty["+ index +"]").val();
                let weightData    = $("input[name='weight["+ index +"]").val();
                console.log(weightData);
                totalQty       = parseInt(totalQty) + parseInt(data);
                totalWeight       = parseInt(totalWeight) + parseInt(weightData);
            } );

            $('#total_qty').val(totalQty);
            $('#total_weight').val(totalWeight);
        }


        var addDataPurchase = () => {
            let index = table.rows().count();
            table.row.add([
                `<select class="form-control form-control-solid mb-3 mb-lg-0 productSelect"  data-dropdown-parent="#add_finish_goods_modal" data-placeholder="--- Select Item ---" name="item[${index}]" id="item[${index}]" aria-label="Select example">
                                    <option ></option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"  >{{ $product->name }}</option>
                                    @endforeach
                                </select> `,
                                `<input type="text" name="qty[${index}]" id="qty" value="0" onkeyup="totalAll(${index})" class="form-control form-control-solid mb-3 mb-lg-0 qtyData" placeholder="-- Input Qty --" />`,
                                `<input type="text" name="weight[${index}]" id="weight" value="0" onkeyup="totalAll(${index})" class="form-control form-control-solid mb-3 mb-lg-0 priceData" placeholder="-- Input Weight --" />`,
                                `<select class="form-control form-control-solid mb-3 mb-lg-0 productSelect"  data-dropdown-parent="#add_finish_goods_modal" data-placeholder="--- Select Machine ---" name="machine[${index}]" id="machine[${index}]" aria-label="Select example">
                                    <option ></option>
                                    @foreach ($machine as $mch)
                                        <option value="{{ $mch->id }}"  >{{ $mch->name }}</option>
                                    @endforeach
                                </select> `,
                                `<a href="javascript:void(0)" id="delete-row" class="btn btn-icon btn-bg-light btn-danger btn-active-color-secondary btn-sm">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>`
            ])
            .draw(false);
            totalAll();
            
            $(".productSelect").select2();
        }

        $('#item-request tbody').on( 'click', '#delete-row', function () {
            table.row( $(this).parents('tr') ).remove().draw();
            totalAll();
        });

        $('#production_realization').on('change', function(e){
            $.ajax({
                    type: "GET",
                    url: route("production-realization-data.show", e.target.value),

                    success: function (response) {
                        table.clear().draw();
                        response.data.get_detail.forEach((detail) => {
                           
                            let index = table.rows().count();
                            table.row.add([
                                `<select class="form-control form-control-solid mb-3 mb-lg-0 productSelect" data-control="select2" data-dropdown-parent="#add_finish_goods_modal" data-placeholder="--- Select Item ---" name="item[${index}]" id="item[${index}]" aria-label="Select example">
                                    <option ></option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" ${"{{ $product->id }}" ==  detail.product_id ? 'selected' : ''} >{{ $product->name }}</option>
                                    @endforeach
                                </select> `,
                                `<input type="text" name="qty[${index}]" id="qty" value="${detail.qty}" onkeyup="totalAll(${index})" class="form-control form-control-solid mb-3 mb-lg-0 qtyData" placeholder="-- Input Qty --" />`,
                                `<input type="text" name="weight[${index}]" id="weight" value="${detail.weight}" onkeyup="totalAll(${index})" class="form-control form-control-solid mb-3 mb-lg-0 priceData" placeholder="-- Input Weight --" />`,
                                `<select class="form-control form-control-solid mb-3 mb-lg-0 productSelect" data-control="select2" data-dropdown-parent="#add_finish_goods_modal" data-placeholder="--- Select Machine ---" name="machine[${index}]" id="machine[${index}]" aria-label="Select example">
                                    <option ></option>
                                    @foreach ($machine as $mch)
                                        <option value="{{ $mch->id }}" ${"{{ $mch->id }}" ==  detail.machine_id ? 'selected' : ''} >{{ $mch->name }}</option>
                                    @endforeach
                                </select> `,
                                `<a href="javascript:void(0)" id="delete-row" class="btn btn-icon btn-bg-light btn-danger btn-active-color-secondary btn-sm">
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
                               `
                            ])
                            .draw(false);
                         
                            $(".productSelect").select2();
                        });
                        totalAll();
                    },
                    error: function (error) {
                        Swal.fire({
                            text: error.responseJSON.message,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                    },
                });
        })

    </script>
</div>
