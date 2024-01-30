@section('title', 'Customers Detail - Sales')

@section('style')
   
@endsection

@section('script')
    
@endsection

@section('scriptCrud')
    <script src="{{ asset('js/datatable/sales/customers/customer-detail-table.js') }}" ></script>
    <script src="{{ asset('js/crud/sales/customers/customer-list/chart.js') }}" ></script>
    <script src="{{ asset('js/crud/sales/customers/customer-address/add.js') }}" ></script>
    <script src="{{ asset('js/crud/sales/customers/customer-address/edit.js') }}" ></script>
    <script src="{{ asset('js/crud/sales/customers/customer-address/delete.js') }}" ></script>
@endsection
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <script>
        var customerId = "{{ $customer->id }}" ;
    </script>
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Customer Details</h1>
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
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Customers</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Customer Details</li>
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
            <!--begin::Layout--> 
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <a class="btn btn-secondary mb-2 fw-bolder me-3" href="{{ route('customer.index') }}" style="">Back</a>
                    <a class="btn btn-warning mb-2 fw-bolder" href="{{ route('customer.edit', $customer->code) }}" style="">Edit</a>
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="javascript:void(0)" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $customer->name }}</a>
                                <a href="javascript:void(0)" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $customer->code }}</a>
                                <!--end::Name-->
                                <!--begin::Email-->
                                <a href="javascript:void(0)" class="fs-5 fw-bold text-muted text-hover-primary mb-6">{{ $customer->email }}</a>
                                <!--end::Email-->
                            </div>
                            <div class="text-center mb-5">
                                <a href="{{ asset('images/customer/data_file/'.$customer->npwp_image ) }}" target="_blank" class="btn btn-success btn-hover-scale me-5">NPWP</a>
                                <a href="{{ asset('images/customer/data_file/'.$customer->nik_image ) }}" target="_blank" class="btn btn-primary btn-hover-scale me-5">NIK</a>
                            </div>
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder">Details</div>
                                <!--begin::Badge-->
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator separator-dashed my-3"></div>
                            <!--begin::Details content-->
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Code Customer</div>
                                <div class="text-gray-600">{{ $customer->code }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">NPWP</div>
                                <div class="text-gray-600">
                                @if ($customer->npwp != null)
                                    {{ $customer->npwp }}
                                @else
                                    -
                                @endif
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">NIK</div>
                                <div class="text-gray-600">
                                @if ($customer->nik != null)
                                    {{ $customer->nik }}
                                @else
                                    -
                                @endif
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">City</div>
                                <div class="text-gray-600">{{ $customer->get_city?->name }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Address</div>
                                <div class="text-gray-600">{{ $customer->address }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Phone</div>
                                <div class="text-gray-600">
                                @if ($customer->phone != null)
                                    {{ $customer->phone }}
                                @else
                                    -
                                @endif
                                </div>
                                <!--begin::Details item-->
                             
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#customer_">Transaction</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#customer_address">Customer Address</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#customer_details">Customer Detail</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="customer_" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <h2 class="mt-5" style="margin-left: 20px">Transaction History</h2>
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" data-kt-customer-orders-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Order" />
                                        </div>
                                    </div>
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-customer-orders-table-toolbar="base">
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
                                          
                                            <!--end::Add product-->
                                        </div>
                                        <!--end::Toolbar-->
                                        <!--begin::Group actions-->
                                        <!--end::Group actions-->
                               
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed gy-5" id="customer_detail_table">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                            <!--begin::Table row-->
                                            <tr class="text-center text-muted text-uppercase gs-0">
                                                <th class="min-w-100px">order No.</th>
                                                <th>Status</th>
                                                <th class="min-w-100px">Date</th>
                                                <th class="min-w-100px">Total Price</th>
                                                <th class="min-w-50px"></th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600 text-center">
                                   
                                        </tbody>
                                        <tfoot>
                                            <tr class="fw-bolder fs-6">
                                                <th colspan="2" class="text-nowrap align-end">Total:</th>
                                                <th colspan="3" class="text-danger fs-3"></th>
                                            </tr>
                                        </tfoot>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
              
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="customer_details" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Customer Details</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <!--begin::Table body-->
                                            <tbody class="fs-6 fw-bold text-gray-600 text-left">
                                                <tr>
                                                    <td>Fax</td>
                                                    <td>
                                                        @if ($customer->fax == null)
                                                            -
                                                        @else
                                                            {{ $customer->fax }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Warehouse Address</td>
                                                    <td>
                                                        @if ($customer->warehouse_address == null)
                                                            -
                                                        @else
                                                            {{ $customer->warehouse_address }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">PIC</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pb-5">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5" id="pic_detail">
                                            <!--begin::Table body-->
                                            <tbody class="fs-6 fw-bold text-gray-600 text-left">
                                                <tr>
                                                    <td>Name</td>
                                                    <td>
                                                        @if ($customer->pic == null)
                                                            -
                                                        @else
                                                            {{ $customer->pic }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>
                                                        @if ($customer->pic_phone == null)
                                                            -
                                                        @else
                                                            {{ $customer->pic_phone }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Position</td>
                                                    <td>
                                                        @if ($customer->pic_position == null)
                                                            -
                                                        @else
                                                            {{ $customer->pic_position }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
            <div class="card card-flush py-4 mb-5" wire:ignore.self>
                <!--begin::Card header-->
                <div class="card-header" wire:ignore>
                    <div class="card-title">
                        <h2>Statistic Customer Order</h2>
                    </div>
                    <div class="input-group w-250px me-3">
                        <select class="form-select mb-2" name="yearFilter" data-control="select2" data-hide-search="true" data-placeholder="-- Select Year --" id="yearFilter">
                            <option></option>
                            <option value="all">All</option>
                            <option selected value="{{ date("Y") }}" >{{ date("Y") }}</option>
                            <option value="{{ date("Y",strtotime("-1 year")); }}" >{{ date("Y",strtotime("-1 year")); }} - {{ date('Y') }}</option>
                            <option value="{{ date("Y",strtotime("-2 year")); }}" >{{ date("Y",strtotime("-2 year")); }} - {{ date('Y') }}</option>
                        </select>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <div id="line_chart" style="height: 300px;"></div>
                </div>
                           <!--end::Tab content-->
                <!--end::Card header-->
            </div>
            <div class="card card-flush py-4" wire:ignore.self>
                <!--begin::Card header-->
                <div class="card-header" wire:ignore>
                    <div class="card-title">
                        <h2>Statistic Order Product</h2>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-orders-table-toolbar="base">
                            <div class="input-group w-250px me-3">
                                <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" name="dateFilterPrd" id="dateFilterPrd" />
                                <button class="btn btn-icon btn-light" id="clearDatePrd">
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
                          
                            <!--end::Add product-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <!--end::Group actions-->
               
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <canvas id="piechart" class="mh-400px"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <table class="table align-middle table-row-dashed gy-5" id="product_statistic_table">
                                <!--begin::Table head-->
                                <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                    <!--begin::Table row-->
                                    <tr class="text-center text-muted text-uppercase gs-0">
                                        <th class="min-w-100px">Product</th>
                                        <th class="min-w-100px">QTY</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fs-6 fw-bold text-gray-600 text-center">
                           
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                </div>
                           <!--end::Tab content-->
                <!--end::Card header-->
            </div>
            <!--begin::Modals-->
           
            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    @livewire('components.modal.customer-receive-address.add', compact('customers', 'cities'))
    @livewire('components.modal.customer-receive-address.edit', compact('customers', 'cities'))
</div>