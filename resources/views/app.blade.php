<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">    
    <!--begin::Head-->
	@include('sections.head')
	<!--end::Head-->
	<!--begin::Body-->
    <body id="kt_body" 
        class="header-fixed header-mobile-fixed page-loading"
        style="height: 100%;">
        
        @inertia
        <!--begin::scripts -->
        @include('sections.scripts')
        <!--end::scripts -->     
    </body>
</html>
