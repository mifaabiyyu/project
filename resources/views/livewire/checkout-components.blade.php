<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title></title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
       
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Order details page-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 mt-20" style="margin-bottom:20px">
                        
                        <!--begin::Order summary-->
                        <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                            <!--begin::Order details-->
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Order Details</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black" />
                                                                <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Date Added</div>
                                                    </td>
                                                    <td class="fw-bolder text-end">{{ $data->date }}</td>
                                                </tr>
                                                <!--end::Date-->
                                                <!--begin::Payment method-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="black" />
                                                                <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="black" />
                                                                <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Expiry Date</div>
                                                    </td>
                                                    <td class="fw-bolder text-end">{{ $data->valid_until }}</td>
                                                </tr>
                                                <!--end::Payment method-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Order details-->
                            <!--begin::Customer details-->
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Customer Details</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                                <!--begin::Customer name-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="black" />
                                                                <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Customer</div>
                                                    </td>
                                                    <td class="fw-bolder text-end">
                                                        <div class="d-flex align-items-center justify-content-end">
                                                            <!--begin:: Avatar -->
                                                            <div class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                                                <a >
                                                                    <div class="symbol-label">
                                                                        <img src="assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Name-->
                                                            <p  class="text-gray-600 text-hover-primary">{{  $data->get_customer?->name}}</p>
                                                            <!--end::Name-->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!--end::Customer name-->
                                                <!--begin::Customer email-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
                                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Email</div>
                                                    </td>
                                                    <td class="fw-bolder text-end">
                                                        <p  class="text-gray-600 text-hover-primary">{{  $data->get_customer?->email}}</p>
                                                    </td>
                                                </tr>
                                                <!--end::Payment method-->
                                                <!--begin::Date-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z" fill="black" />
                                                                <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Phone</div>
                                                    </td>
                                                    <p  class="text-gray-600 text-hover-primary">{{  $data->get_customer?->phone}}</p>
                                                </tr>
                                                <!--end::Date-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Customer details-->
                            <!--begin::Documents-->
                            <div class="card card-flush py-4 flex-row-fluid">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Documents</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                                <!--begin::Invoice-->
                                                <tr>
                                                    <td class="text-muted">
                                                        <div class="d-flex align-items-center">
                                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                                        <span class="svg-icon svg-icon-2 me-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="black" />
                                                                <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="black" />
                                                                <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Quote
                                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="View the invoice generated by this order."></i></div>
                                                    </td>
                                                    <td class="fw-bolder text-end">
                                                        <p  class="text-gray-600 text-hover-primary">{{ $data->code }}</p>
                                                    </td>
                                                </tr>
                                                <!--end::Invoice-->
                                                <!--begin::Shipping-->
                                              
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Documents-->
                        </div>
                        <!--end::Order summary-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" role="tab-panel">
                                <!--begin::Orders-->
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    {{-- <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
                                        <!--begin::Payment address-->
                                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                            <!--begin::Background-->
                                            <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                                <img src="assets/media/icons/duotune/ecommerce/ecm001.svg" class="w-175px" />
                                            </div>
                                            <!--end::Background-->
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Payment Address</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                            <br />Melbourne 3000,
                                            <br />Victoria,
                                            <br />Australia.</div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Payment address-->
                                        <!--begin::Shipping address-->
                                        <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                            <!--begin::Background-->
                                            <div class="position-absolute top-0 end-0 opacity-10 pe-none text-end">
                                                <img src="assets/media/icons/duotune/ecommerce/ecm006.svg" class="w-175px" />
                                            </div>
                                            <!--end::Background-->
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Shipping Address</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">Unit 1/23 Hastings Road,
                                            <br />Melbourne 3000,
                                            <br />Victoria,
                                            <br />Australia.</div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Shipping address-->
                                    </div> --}}
                                    <!--begin::Product List-->
                                    <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{ $data->code }}</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th class="min-w-175px">Product</th>
                                                            <th class="min-w-70px text-end">Qty</th>
                                                            <th class="min-w-100px text-end">Unit Price</th>
                                                            <th class="min-w-100px text-end">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody class="fw-bold text-gray-600">
                                                        <!--begin::Products-->
                                                        @foreach ($data->get_detail as $item)
                                                            <tr>
                                                                <!--begin::Product-->
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <!--begin::Thumbnail-->
                                                                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                                            <span class="symbol-label" style="background-image:url(logo.png);"></span>
                                                                        </a>
                                                                        <!--end::Thumbnail-->
                                                                        <!--begin::Title-->
                                                                        <div class="ms-5">
                                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="fw-bolder text-gray-600 text-hover-primary">{{ $item->product_name }}</a>
                                                                        </div>
                                                                        <!--end::Title-->
                                                                    </div>
                                                                </td>
                                                                <!--end::Product-->
                                                                <!--begin::SKU-->
                                                                <td class="text-end">{{ $item->qty }}</td>
                                                                <!--end::SKU-->
                                                                <!--begin::Quantity-->
                                                                <!--end::Quantity-->
                                                                <!--begin::Price-->
                                                                <td class="text-end">{{ "Rp " . number_format($item->unit_price,0,'','.') }}</td>
                                                                <!--end::Price-->
                                                                <!--begin::Total-->
                                                                <td class="text-end">{{ "Rp " . number_format($item->total_price,0,'','.') }}</td>
                                                                <!--end::Total-->
                                                            </tr>
                                                        @endforeach
                                                        <!--begin::Grand total-->
                                                        <tr>
                                                            <td colspan="3" class="fs-3 text-dark text-end">Grand Total</td>
                                                            <td class="text-dark fs-3 fw-boldest text-end">{{ "Rp " . number_format($data->total,0,'','.') }}</td>
                                                        </tr>
                                                        <!--end::Grand total-->
                                                    </tbody>
                                                    <!--end::Table head-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-10">
                                            <!--begin::Button-->
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="submit" id="kt_ecommerce_add_quote_submit" {{-- $validation==true?'':"disabled" --}} class="btn btn-success" data-kt-add-quotation="submit" >
                                                <span class="indicator-label" >Checkout</span>
                                                <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Product List-->
                                </div>
                                <!--end::Orders-->
                            </div>
                       
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Order details page-->
                </div>
                <!--end::Container-->
            </div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header" id="Ekspedisi_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bolder">Checkout</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        {{-- <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-ekspedisi-modal-action="close">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div> --}}
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <style>
                        .iframe-invoice {
    height: inherit;
    width: inherit;
    border: 0;
    overflow-y: scroll;
}
                    </style>
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <iframe
                            id="iframe-invoice"
                            class="iframe-invoice"
                            title="Invoice"
                        ></iframe>
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        
		<!--end::Modal - Invite Friend-->
		<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
        <script>
            var params = {{$params}};
        </script>
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
        <script src="js/crud/checkout.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>