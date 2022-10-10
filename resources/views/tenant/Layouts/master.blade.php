<!DOCTYPE html>
<html lang="{{ LANGUAGE_PREF }}" dir="{{ DIRECTION }}">
	<head>
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="description" content="#" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@yield('extra-metas')
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		@include('tenant.Layouts.head')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	{{-- {{ dd($themeObj) }} --}}
	<body class="loading" data-layout='{ "mode": "light","width": "fluid","topbar": {"color": "dark"},"menuPosition": "fixed", "sidebar": {"size": "light","showuser" : "false"}}'>
		<!-- Begin page -->
		<input type="hidden" name="countriesCode" value="{{ Helper::getCountryCode() ? Helper::getCountryCode()->countryCode : 'sa' }}">
        <div id="wrapper">
			@include('tenant.Layouts.header')
			@include('tenant.Layouts.sidebar')
			
			<div class="content-page">
                <div class="content">
					@yield('content')
				</div>
				@include('tenant.Layouts.footer')
			</div>

			@include('tenant.Layouts.rightSideBar')
			
			@yield('modals')

			@include('tenant.Layouts.scripts')
	        @include('tenant.Partials.notf_messages')
		</div>
	</body>
	<!--end::Body-->
</html>