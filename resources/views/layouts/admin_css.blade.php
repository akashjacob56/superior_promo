<?php 
function hex2rgba($color,$opacity){
	list($r, $g, $b) = array(
		$color[0].$color[1],
		$color[2].$color[3],
		$color[4].$color[5]
	);
	$r = hexdec($r); 
	$g = hexdec($g); 
	$b = hexdec($b);
	return 'rgba('.$r.','.$g.','.$b.','.$opacity.')';
}

function hex2rgb($color){
	list($r, $g, $b) = array(
		$color[0].$color[1],
		$color[2].$color[3],
		$color[4].$color[5]
	);
	$r = hexdec($r); 
	$g = hexdec($g); 
	$b = hexdec($b);
	return 'rgb('.$r.','.$g.','.$b.')';
}

$appearance_color="4ac9ff";
$website_text_color="000000";

$background_color="#".$appearance_color;
$text_color="#".$website_text_color;

$rgba_color=hex2rgba($appearance_color,"0.25");

$button_background_color=hex2rgba($appearance_color,"0.8");

?>

<style type="text/css">


::-webkit-scrollbar-track {
	background-color: #eee !important;
}
::-webkit-scrollbar-thumb {
	background-color: {{$button_background_color}};
	border:1px solid #eee;
	border-radius: 10px;
}

::-webkit-scrollbar {
	width: 8px;
}


.thumbelina li:hover, .thumbelina li:active, .thumbelina li:focus {
	padding:1px;
	border: 2px solid {{$background_color}};
}

.btn-outline-primary{
	border-color: {{$background_color}} !important;
}

.btn-outline-primary:hover{
	background-color:{{$background_color}} !important;
	color:#fff !important;
}

.btn-outline-primary{
	color: {{$background_color}} !important;
}

.selectedVariant{
	background-color: {{$button_background_color}} !important;
	color: #fff !important;
}


.gc-icon{
	background-color:{{$background_color}} !important;
}
.glass-case ul li.gc-active, .glass-case ul li.gc-active:hover{
	border-color:{{$background_color}} !important;
}

body[themebg-pattern="theme1"],.pcoded .pcoded-header[header-theme="theme1"]{
	background-color:{{$background_color}} !important;
}
nav.pcoded-navbar{
	 -webkit-box-shadow: 3px 3px 5px 6px #ccc !important;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
  -moz-box-shadow:    3px 3px 5px 6px #ccc !important;  /* Firefox 3.5 - 3.6 */
  box-shadow:         3px 3px 5px 6px #ccc !important;  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
  color: #ddd !important;

}

.form-control:focus,.bootstrap-tagsinput:focus, .note-editor.note-frame .note-editing-area .note-editable:focus, .select-box-container--default .select-box-search--dropdown .select-box-search__field:focus{
	box-shadow: 0 0 0 0.2rem {{$rgba_color}} !important;
	border:1px solid {{$background_color}} !important;
}
.select-box-container--default .select-box-results__option--highlighted[aria-selected]{
	background:{{$background_color}};
}
.loader-bg .loader-bar{
	background:{{$background_color}} !important;
}
.pcoded[theme-layout="vertical"][vertical-layout="box"] .selector-toggle>a, .pcoded .selector-toggle>a{
	background-color: #fff;
	color: {{$background_color}};
}

table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before{
	background-color: {{$background_color}};
}

.btn-primary,.label-primary, .sweet-alert button.confirm, .wizard>.actions a,.wizard > .steps .current a{
	color: #ffffff;
	background-color: {{$button_background_color}};
	border-color: {{$button_background_color}} !important;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .wizard>.actions a:active,.wizard > .steps .current a:active, .wizard>.actions a:hover,.wizard > .steps .current a:hover{
	border-color: {{$background_color}} !important;
	background-color: {{$background_color}} !important;
}
.btn:focus,.btn:hover,.btn:active{
	box-shadow: none !important;
}

.btn-link{
	color:{{$background_color}}; 
}

.btn-link:hover{
	color:{{$background_color}}; 
}
.checkbox-fade.fade-in-primary .cr, .checkbox-fade.zoom-primary .cr, .checkbox-zoom.fade-in-primary .cr, .checkbox-zoom.zoom-primary .cr{
	border: 2px solid {{$background_color}};
}

.checkbox-fade.fade-in-primary .cr .cr-icon, .checkbox-fade.zoom-primary .cr .cr-icon, .checkbox-zoom.fade-in-primary .cr .cr-icon, .checkbox-zoom.zoom-primary .cr .cr-icon{
	color: {{$background_color}};
}

.pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.active>a, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.active:hover>a, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger>a, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger:hover>a, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li:hover>a, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li:hover:hover>a{
	background-color: #fff !important;
	color: {{$background_color}} !important;

}
.pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item li.active>a, .pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item li:hover>a{
	background-color: #fff !important;
	color: {{$background_color}} !important;	
}

.pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item li .pcoded-submenu li.active>a, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item li .pcoded-submenu li:hover>a{
	color: {{$background_color}};
}
.pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.active>a .pcoded-micon, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.active:hover>a .pcoded-micon, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger>a .pcoded-micon, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger:hover>a .pcoded-micon, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li:hover>a .pcoded-micon, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li:hover:hover>a .pcoded-micon{
	color: {{$background_color}} !important;
}

.pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.active>a .pcoded-micon, .pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.active:hover>a .pcoded-micon, .pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger>a .pcoded-micon, .pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger:hover>a .pcoded-micon, .pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li:hover>a .pcoded-micon, .pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li:hover:hover>a .pcoded-micon{
	color: {{$background_color}} !important;	
}

.pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.active>a:after, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.active:hover>a:after, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger>a:after, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li.pcoded-trigger:hover>a:after, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li:hover>a:after, .pcoded[theme-layout="vertical"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item>li:hover:hover>a:after{
	color: {{$background_color}} !important;
}
.pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item li.active>a:after, .pcoded[theme-layout="horizontal"] .pcoded-navbar[active-item-theme="theme1"] .pcoded-item li:hover>a:after{
	color: {{$background_color}} !important;	
}

.page-item.active .page-link{
	background-color: {{$background_color}} !important;
	border-color: {{$background_color}} !important;
}

.page-link:focus, .page-link:hover{
	color: {{$background_color}};
}
.prod-img .p-sale,.prod-img .p-new a{
	color:#ffffff;
	background-color: {{$button_background_color}} !important;
}
.prod-img .p-sale:hover,.prod-img .p-new a:hover{
	color:#ffffff;
	background-color: {{$background_color}};
}

.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span{
	background-color: {{$background_color}};
}

.language-dropdown .dropdown-primary .dropdown-menu a{
	color: #666;
	padding: 10px 20px !important;
	line-height: 15px !important; 
}

.language-dropdown .dropdown-primary .dropdown-menu{
	line-height:1; 
}


.language-dropdown .dropdown-primary .dropdown-menu a:active, .language-dropdown .dropdown-primary .dropdown-menu a:hover{
	color: #000000 !important;
	background-color: #ddd !important;	
}

.show>.btn-primary.dropdown-toggle, .sweet-alert .show>button.dropdown-toggle.confirm, .wizard>.actions .show>a.dropdown-toggle{
	background-color: {{$background_color}} !important;		
}


.dropdown-warning{
	background-color: {{$background_color}} !important;
}

.upper-buttons .dropdown-primary .dropdown-menu a:active, .upper-buttons .dropdown-primary .dropdown-menu a:hover{
	color: #000000 !important;
	background-color: #ddd !important;
}

.page-link{
	color: {{$background_color}};
}

.slider-handle{
	background-color: {{$background_color}} !important;
	background-image:none !important;	
}
.slider-handle:hover{
	background-color: {{$background_color}} !important;
}
.page-header h4{
	color: {{$text_color}} !important;
}
.loader {
	border-top: 6px solid {{$background_color}} !important;
	border-bottom: 6px solid {{$background_color}} !important;
}

.footer-distributed{
	/*filter: brightness(80%);*/
	background-color: {{$button_background_color}} !important;
}

.footer-distributed .footer-center i, .footer-distributed .footer-icons a{
	background-color:{{$button_background_color}} !important;
}




.page-header .page-block .breadcrumb .breadcrumb-item:last-child a{
	color: #fff !important;
}

.page-header .page-block .breadcrumb .breadcrumb-item+.breadcrumb-item:before{
	color: #fff !important;
}

.page-header .page-block .breadcrumb a{
	color: #fff !important;
}

body{
	background-image: linear-gradient(rgba(255,255,255,0) 150px, rgba(255,255,255,0.9) 0%) !important;
}



</style>