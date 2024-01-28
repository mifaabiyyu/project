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
	<head><base href="../../">
		<title>Production {{ $data->code }}</title>
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
		<link rel="shortcut icon" href="{{ asset('logo.png') }}"  />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"   type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet"   type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
    <style>
        tr:nth-child(even) {
            background-color: #e4dddd;
        }
    </style>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="auth-bg">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Signup Welcome Message -->
			<div class="d-flex flex-column flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
					<!--begin::Logo-->
					<a href="{{ url('/') }}" class=" pt-lg-10">
						<img alt="Logo" src="{{ asset('logo.png') }}" class="h-150px mb-5" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="pt-lg-10 mb-5">
						<!--begin::Logo-->
						<h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Production Planning & Realization</h1>
						<!--end::Logo-->
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Work Order Number : </h3>
                                <h3>{{ $data->code }}</h3>
                            </div>
                            <div class="col-md-4">
                                <h3>Work Order Planning Date    :   </h3>
                                <h3>{{ date("d-m-Y", strtotime($data->planning_date)) }}</h3>
                            </div>
                            <div class="col-md-4">
                                <h3>Work Order Realization Date    :   </h3>
                                <h3>{{ $getRealization != null ? date("d-m-Y", strtotime($getRealization->real_date)) : '' }}  </h3>
                            </div>
                        </div>
						<!--begin::Message-->
                        {{-- <table class="table align-middle table-rounded table-striped border fs-6 gy-5" id="planning_table">
                            <!--begin::Table head--> 
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">Machine</th>
                                    <th class="min-w-125px">Product</th>
                                    <th class="min-w-125px">Qty</th>
                                    <th class="min-w-125px">Weight</th>
                                    <th class="min-w-100px">Specification</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-800 fw-bold text-center">
                                @foreach ($detail as $item)
                                    <tr>
                                        <td class=" fw-bold"> {{ $item->get_machine->name }}</td> 
                                        <td class=" fw-bold">  {{ $item->get_product->name }} - {{ $item->get_product->product_type }}</td> 
                                        <td class=" fw-bold">  {{ $item->qty }} Sack</td> 
                                        <td class=" fw-bold">  {{ $item->weight }} KG</td> 
                                        <td class=" fw-bold">   {{ $item->customer_order_id != null ? $item->get_customer_order->description : '-' }}</td> 
                                    </tr>
                                @endforeach
                            </tbody> 
                            <!--end::Table body-->
                        </table> --}}
						<!--end::Action-->
					</div>
                    <hr>
					<div class="pt-lg-10 mb-10">
						<!--begin::Logo-->
                        <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Raw Material</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Total Usage Raw Material : </h4>
                                <h4>{{ $rawMaterial != null ? number_format($rawMaterial->total_qty,0,',','.') : '-' }} KG</h4>
                            </div>
                            <div class="col-md-6">
                                <h4>Code    :   </h4>
                                <h4>{{ $rawMaterial != null ? $rawMaterial->code : '-' }}</h4>
                            </div>
                        </div>
						<h1 class="fw-bolder  text-gray-800 mb-7">Stone Usage Detail</h1>
						<!--end::Logo-->
						<!--begin::Message-->
                        @if ($rawMaterial)
                        <table class="table align-middle table-rounded table-striped border fs-6 gy-5" id="planning_table">
                            <!--begin::Table head--> 
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                    <th >Stone</th>
                                    <th >Qty</th>
                                    <th >Unit</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-800 fw-bold text-center">
                                    @foreach ($rawMaterial->get_detail as $item)
                                        <tr>
                                            <td class=" fw-bold">  {{ $item->get_stone->name }}</td> 
                                            <td class=" fw-bold">  {{ $item->qty }} KG</td> 
                                            <td class=" fw-bold"> {{ $item->unit }}</td> 
                                        </tr>
                                    @endforeach
                                </tbody> 
                                <!--end::Table body-->
                            </table>
                            @else
                                <p>No Data</p>
                            @endif
						<!--end::Action-->
                        <hr>
					</div>
					<div class="pt-lg-10 mb-10">
						<!--begin::Logo-->
                        <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Production Planning</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Total Sack : </h4>
                                <h4>{{ number_format($data->total_qty,0,',','.') }} Sack</h4>
                            </div>
                            <div class="col-md-6">
                                <h4>Total Weight    :   </h4>
                                <h4>{{ number_format($data->total_weight,0,',','.') }} KG</h4>
                            </div>
                        </div>
						<h1 class="fw-bolder  text-gray-800 mb-7">Specification</h1>
						<!--end::Logo-->
						<!--begin::Message-->
                        <table class="table align-middle table-rounded table-striped border fs-6 gy-5" id="planning_table">
                            <!--begin::Table head--> 
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                    <th >Machine</th>
                                    <th >Product</th>
                                    <th >Qty</th>
                                    <th >Weight</th>
                                    <th >RPM</th>
                                    <th >SSA</th>
                                    <th >D-50</th>
                                    <th >D-98</th>
                                    <th >CIE 86</th>
                                    <th >ISO 2470</th>
                                    <th >Residue</th>
                                    <th >Moisture</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-800 fw-bold text-center">
                                @foreach ($detail as $item)
                                    <tr>
                                        <td class=" fw-bold"> {{ $item->get_machine->name }}</td> 
                                        <td class=" fw-bold">  {{ $item->get_product->name }} - {{ $item->get_product->product_type }}</td> 
                                        <td class=" fw-bold">  {{ $item->qty }} Sack</td> 
                                        <td class=" fw-bold">  {{ $item->weight }} KG</td> 
                                        <td class="fw-bold">
                                            {{ $item->rpm }}
                                        </td>
                                        <td class="fw-bold">
                                            {{ $item->ssa }}
                                        </td>
                                        <td class="fw-bold">
                                            {{ $item->d_50 }}
                                        </td>
                                        <td class="fw-bold">
                                            {{ $item->d_98 }}
                                        </td>
                                        <td class="fw-bold">
                                            {{ $item->cie_86 }}
                                        </td>
                                        <td class="fw-bold">
                                            {{ $item->iso_2470 }}
                                        </td>
                                        <td class="fw-bold">
                                            {{ $item->residue }}
                                        </td>
                                        <td class="fw-bold">
                                            {{ $item->moisture }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                            <!--end::Table body-->
                        </table>
						<!--end::Action-->
                        <hr>
					</div>
					<div class="pt-lg-10 mb-10">
						<!--begin::Logo-->
                        <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Production Realization</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Total Sack : </h4>
                                <h4>{{ $getRealization != null ? number_format($getRealization->total_qty,0,',','.') : '-' }} Sack</h4>
                            </div>
                            <div class="col-md-6">
                                <h4>Total Weight    :   </h4>
                                <h4>{{ $getRealization != null ? number_format($getRealization->total_weight,0,',','.') : '-' }} KG</h4>
                            </div>
                        </div>
						<h1 class="fw-bolder  text-gray-800 mb-7">Specification</h1>
						<!--end::Logo-->
						<!--begin::Message-->
                        @if ($getRealizationDetail == null)
                            <div class="text-center">
                                No Data
                            </div>
                        @else
                            <table class="table align-middle table-rounded table-striped border fs-6 gy-5" id="planning_table">
                                <!--begin::Table head--> 
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                        <th >Machine</th>
                                        <th >Product</th>
                                        <th >Qty</th>
                                        <th >Weight</th>
                                        <th >RPM</th>
                                        <th >SSA</th>
                                        <th >D-50</th>
                                        <th >D-98</th>
                                        <th >CIE 86</th>
                                        <th >ISO 2470</th>
                                        <th >Residue</th>
                                        <th >Moisture</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-800 fw-bold text-center">
                                    
                                    @foreach ($getRealizationDetail as $item)
                                        <tr>
                                            <td class=" fw-bold"> {{ $item->get_machine->name }}</td> 
                                            <td class=" fw-bold">  {{ $item->get_product->name }} - {{ $item->get_product->product_type }}</td> 
                                            <td class=" fw-bold">  {{ $item->qty }} Sack</td> 
                                            <td class=" fw-bold">  {{ $item->weight }} KG</td> 
                                            <td class="fw-bold">
                                                {{ $item->rpm }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->ssa }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->d_50 }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->d_98 }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->cie_86 }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->iso_2470 }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->residue }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->moisture }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> 
                                <!--end::Table body-->
                            </table>
                        @endif
                        <hr>
						<!--end::Action-->
					</div>
					<div class="pt-lg-10 mb-10">
						<!--begin::Logo-->
                        <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Lab Report</h1>
                        <div class="row">
                        </div>
						<h1 class="fw-bolder  text-gray-800 mb-7">Specification</h1>
						<!--end::Logo-->
						<!--begin::Message-->
                        @if ($getLabReport == null)
                            <div class="text-center">
                                No Data
                            </div>
                        @else
                            <table class="table align-middle table-rounded table-striped border fs-6 gy-5" id="planning_table">
                                <!--begin::Table head--> 
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-center fw-bolder fs-7 text-uppercase gs-0">
                                        <th >Machine</th>
                                        <th >Product</th>
                                        <th >RPM</th>
                                        <th >SSA</th>
                                        <th >D-50</th>
                                        <th >D-98</th>
                                        <th >CIE 86</th>
                                        <th >ISO 2470</th>
                                        <th >Residue</th>
                                        <th >Moisture</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-800 fw-bold text-center">
                                    
                                    @foreach ($getLabReport->get_detail as $item)
                                        <tr>
                                            <td class=" fw-bold"> {{ $item->get_machine->name }}</td> 
                                            <td class=" fw-bold">  {{ $item->get_product->name }} - {{ $item->get_product->product_type }}</td> 
                                            <td class="fw-bold">
                                                {{ $item->rpm }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->ssa }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->d_50 }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->d_98 }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->cie_86 }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->iso_2470 }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->residue }}
                                            </td>
                                            <td class="fw-bold">
                                                {{ $item->moisture }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> 
                                <!--end::Table body-->
                            </table>
                        @endif
						<!--end::Action-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Illustration-->
					{{-- <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/sketchy-1/17.png"></div> --}}
					<!--end::Illustration-->
				</div>
				<!--end::Content-->
				<!--begin::Footer-->
				<div class="d-flex flex-center flex-column-auto p-10">
					<!--begin::Links-->
					<!--end::Links-->
				</div>
				<!--end::Footer-->
			</div>
			<!--end::Authentication - Signup Welcome Message-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/js/scripts.bundle.js') }}" ></script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}" ></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>