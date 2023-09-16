var elixir = require('laravel-elixir'),
	gulp    = require('gulp'),
    htmlmin = require('gulp-htmlmin');
require('laravel-elixir-js-uglify');

/* compress view */
elixir.extend('compress', function() {
    new elixir.Task('compress', function() {
        return gulp.src('./storage/framework/views/*')
            .pipe(htmlmin({
                collapseWhitespace:    true,
                removeAttributeQuotes: true,
                removeComments:        true,
                minifyJS:              true,
            }))
            .pipe(gulp.dest('./storage/framework/views/'));
    })
    .watch('./storage/framework/views/*');
});
  
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) 
{
	mix.compress();
	elixir.config.assetsPath = '';
	elixir.config.css.folder = '';
	elixir.config.js.folder = '';
    mix.styles(
		[
			'resources/assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css',
			'resources/assets/backend/vendors/jscrollpane/style/jquery.jscrollpane.css',
			'resources/assets/backend/vendors/ladda/dist/ladda-themeless.min.css',
			'resources/assets/backend/vendors/select2/dist/css/select2.min.css',
			'resources/assets/backend/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
			'resources/assets/backend/vendors/fullcalendar/dist/fullcalendar.min.css',
			'resources/assets/backend/vendors/cleanhtmlaudioplayer/src/player.css',
			'resources/assets/backend/vendors/cleanhtmlvideoplayer/src/player.css',
			'resources/assets/backend/vendors/bootstrap-sweetalert/dist/sweetalert.css',
			'resources/assets/backend/vendors/summernote/dist/summernote.css',
			'resources/assets/backend/vendors/owl.carousel/dist/assets/owl.carousel.min.css',
			'resources/assets/backend/vendors/ionrangeslider/css/ion.rangeSlider.css',
			'resources/assets/backend/vendors/datatables/media/css/dataTables.bootstrap4.min.css',
			'resources/assets/backend/vendors/c3/c3.min.css',
			'resources/assets/backend/vendors/chartist/dist/chartist.min.css',
			'resources/assets/backend/vendors/nprogress/nprogress.css',
			'resources/assets/backend/vendors/jquery-steps/demo/css/jquery.steps.css',
			'resources/assets/backend/vendors/bootstrap-select/dist/css/bootstrap-select.min.css',
			'resources/assets/backend/vendors/dropify/dist/css/dropify.min.css',
			'resources/assets/backend/vendors/intl-tel-input/css/intlTelInput.css',
			'resources/assets/backend/vendors/country-select-js/css/countrySelect.css',
			//'resources/assets/backend/vendors/dropzone/dist/dropzone.css',
			'resources/assets/backend/vendors/mini-upload/css/style.css',
			'resources/assets/backend/common/css/source/helpers/fonts.css',
			'resources/assets/backend/common/css/source/helpers/typography.css',
			'resources/assets/backend/common/css/source/helpers/base.default.css',
			'resources/assets/backend/common/css/source/helpers/base.responsive.css',
			'resources/assets/backend/common/css/source/helpers/rtl.version.css',
			'resources/assets/backend/common/css/source/themes/theme-dark.css',
			'resources/assets/backend/common/css/source/themes/theme-blue.css',
			'resources/assets/backend/common/css/source/themes/theme-green.css',
			'resources/assets/backend/common/css/source/themes/theme-orange.css',
			'resources/assets/backend/common/css/source/themes/theme-red.css',
			'resources/assets/backend/common/css/source/themes/theme-inverse.css',
			'resources/assets/backend/common/css/source/forms/basic-form-elements.css',
			'resources/assets/backend/common/css/source/forms/buttons.css',
			'resources/assets/backend/common/css/source/forms/dropdowns.css',
			'resources/assets/backend/common/css/source/forms/checkboxes-radio.css',
			'resources/assets/backend/common/css/source/forms/form-validation.css',
			'resources/assets/backend/common/css/source/forms/selectboxes.css',
			'resources/assets/backend/common/css/source/forms/autocomplete.css',
			'resources/assets/backend/common/css/source/components/utilities.css',
			'resources/assets/backend/common/css/source/components/tables.css',
			'resources/assets/backend/common/css/source/components/steps.css',
			'resources/assets/backend/common/css/source/components/tooltips-popovers.css',
			'resources/assets/backend/common/css/source/components/modal.css',
			'resources/assets/backend/common/css/source/components/progress-bars.css',
			'resources/assets/backend/common/css/source/components/badges-labels.css',
			'resources/assets/backend/common/css/source/components/pagination.css',
			'resources/assets/backend/common/css/source/components/collapse.css',
			'resources/assets/backend/common/css/source/components/tabs.css',
			'resources/assets/backend/common/css/source/components/notifications-alerts.css',
			'resources/assets/backend/common/css/source/components/carousel.css',
			'resources/assets/backend/common/css/source/components/widgets.css',
			'resources/assets/backend/common/css/source/components/breadcrumbs.css',
			'resources/assets/backend/common/css/source/vendors/jscrollpane.css',
			'resources/assets/backend/common/css/source/vendors/select2.css',
			'resources/assets/backend/common/css/source/vendors/eonasdan-bootstrap-datetimepicker.css',
			'resources/assets/backend/common/css/source/vendors/fullcalendar.css',
			'resources/assets/backend/common/css/source/vendors/summernote.css',
			'resources/assets/backend/common/css/source/vendors/ionrangeslider.css',
			'resources/assets/backend/common/css/source/vendors/nestable.css',
			'resources/assets/backend/common/css/source/vendors/datatables-fixedcolumns.css',
			'resources/assets/backend/common/css/source/vendors/datatables-responsive.css',
			'resources/assets/backend/common/css/source/vendors/editable-table.css',
			'resources/assets/backend/common/css/source/vendors/chartist.css',
			'resources/assets/backend/common/css/source/vendors/chartist-tooltip-plugin.css',
			'resources/assets/backend/common/css/source/vendors/nprogress.css',
			'resources/assets/backend/common/css/source/vendors/juqery-steps.css',
			'resources/assets/backend/common/css/source/vendors/bootstrap-select.css',
			'resources/assets/backend/common/css/source/vendors/dropify.css',
			'resources/assets/backend/common/css/source/pages/pricing-table.css',
			'resources/assets/backend/common/css/source/pages/ecommerce.css',
			'resources/assets/backend/common/css/source/apps/profile.css',
			'resources/assets/backend/common/css/source/apps/messaging.css',
			'resources/assets/backend/common/css/source/apps/mail.css',
			'resources/assets/backend/common/css/source/apps/calendar.css',
			'resources/assets/backend/common/css/source/apps/gallery.css',
			'resources/assets/backend/common/css/tss.css',
			
		]
	, 'public/css/backend.css');
	
    mix.scripts(
		[
			'resources/assets/backend/vendors/jquery/jquery.min.js',
			'resources/assets/backend/vendors/jquery/jquery-ui.min.js',
			'resources/assets/backend/vendors/mini-upload/js/jquery.ui.widget.js',
			'resources/assets/backend/vendors/tether/dist/js/tether.min.js',
			'resources/assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js',
			'resources/assets/backend/vendors/jquery-mousewheel/jquery.mousewheel.min.js',
			'resources/assets/backend/vendors/jscrollpane/script/jquery.jscrollpane.min.js',
			'resources/assets/backend/vendors/spin.js/spin.js',
			'resources/assets/backend/vendors/ladda/dist/ladda.min.js',
			'resources/assets/backend/vendors/select2/dist/js/select2.full.min.js',
			//'resources/assets/backend/vendors/html5-form-validation/dist/jquery.validation.min.js',
			'resources/assets/backend/vendors/jquery-typeahead/dist/jquery.typeahead.min.js',
			'resources/assets/backend/vendors/jquery-mask-plugin/dist/jquery.mask.min.js',
			'resources/assets/backend/vendors/autosize/dist/autosize.min.js',
			'resources/assets/backend/vendors/bootstrap-show-password/bootstrap-show-password.min.js',
			'resources/assets/backend/vendors/moment/min/moment.min.js',
			'resources/assets/backend/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
			'resources/assets/backend/vendors/fullcalendar/dist/fullcalendar.min.js',
			'resources/assets/backend/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js',
			'resources/assets/backend/vendors/bootstrap-sweetalert/dist/sweetalert.min.js',
			'resources/assets/backend/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js',
			'resources/assets/backend/vendors/summernote/dist/summernote.min.js',
			'resources/assets/backend/vendors/owl.carousel/dist/owl.carousel.min.js',
			'resources/assets/backend/vendors/ionrangeslider/js/ion.rangeSlider.min.js',
			'resources/assets/backend/vendors/nestable/jquery.nestable.js',
			'resources/assets/backend/vendors/datatables/media/js/jquery.dataTables.min.js',
			'resources/assets/backend/vendors/datatables/media/js/dataTables.bootstrap4.min.js',
			'resources/assets/backend/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js',
			'resources/assets/backend/vendors/datatables-responsive/js/dataTables.responsive.js',
			'resources/assets/backend/vendors/editable-table/mindmup-editabletable.js',
			'resources/assets/backend/vendors/d3/d3.min.js',
			'resources/assets/backend/vendors/c3/c3.min.js',
			
			//'resources/assets/backend/vendors/jquery/jquery.touch.js',
			
			'resources/assets/backend/vendors/mini-upload/js/jquery.knob.js',
			'resources/assets/backend/vendors/mini-upload/js/jquery.iframe-transport.js',
			'resources/assets/backend/vendors/mini-upload/js/jquery.fileupload.js',
			
			'resources/assets/backend/common/js/users_shops_products_gallery.js',
			'resources/assets/backend/common/js/users_shops_products_variants.js',
			'resources/assets/backend/common/js/users_shops_products_features.js',
			'resources/assets/backend/common/js/users_shops_products_attributes.js',
			'resources/assets/backend/common/js/users_shops_products_attributes_values.js',
			
			'resources/assets/backend/vendors/chartist/dist/chartist.min.js',
			'resources/assets/backend/vendors/peity/jquery.peity.min.js',
			'resources/assets/backend/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js',
			'resources/assets/backend/vendors/gsap/src/minified/TweenMax.min.js',
			'resources/assets/backend/vendors/hackertyper/hackertyper.js',
			//'resources/assets/backend/vendors/jquery-countTo/jquery.countTo.js',
			'resources/assets/backend/vendors/nprogress/nprogress.js',
			'resources/assets/backend/vendors/jquery-steps/build/jquery.steps.min.js',
			'resources/assets/backend/vendors/bootstrap-select/dist/js/bootstrap-select.min.js',
			'resources/assets/backend/vendors/chart.js/src/Chart.bundle.min.js',
			'resources/assets/backend/vendors/dropify/dist/js/dropify.min.js',
			'resources/assets/backend/vendors//intl-tel-input/js/intlTelInput.js',
			'resources/assets/backend/vendors//intl-tel-input/js/utils.js',
			'resources/assets/backend/vendors/country-select-js/js/countrySelect.js',
			'resources/assets/backend/vendors/bootstrap-validator/dist/validator.min.js',
			//'resources/assets/backend/vendors/dropzone/dist/dropzone.js',
			
			'resources/assets/backend/common/js/common.js',
			//'resources/assets/backend/common/js/demo.temp.js',
			
			
		]
	, 'public/js/backend.js');
	
	
	
	mix.styles(
		[
			'resources/assets/frontend/vendors/bootstrap/dist/css/bootstrap.min.css',
			'resources/assets/frontend/common/css/source/helpers/fonts.css',
			'resources/assets/frontend/common/css/source/helpers/base.css',
			'resources/assets/frontend/common/css/source/blocks/header.css',
			'resources/assets/frontend/common/css/source/blocks/showcase.css',
			'resources/assets/frontend/common/css/source/blocks/promo.css',
			'resources/assets/frontend/common/css/source/blocks/gallery.css',
			'resources/assets/frontend/common/css/source/blocks/features.css',
			'resources/assets/frontend/common/css/source/blocks/action.css',
			'resources/assets/frontend/common/css/source/blocks/feedback.css',
			'resources/assets/frontend/common/css/source/blocks/footer.css',
			'resources/assets/frontend/common/css/source/blocks/about.css',
			'resources/assets/frontend/common/css/source/blocks/header-fixed.css',
			'resources/assets/frontend/common/css/source/blocks/preview.css',
			'resources/assets/frontend/common/css/source/vendors/typedjs.css',
			'resources/assets/backend/common/css/source/components/utilities.css',
			'resources/assets/backend/common/css/source/components/tables.css',
			'resources/assets/backend/common/css/source/components/steps.css',
			'resources/assets/backend/common/css/source/components/tooltips-popovers.css',
			'resources/assets/backend/common/css/source/components/modal.css',
			'resources/assets/backend/common/css/source/components/progress-bars.css',
			'resources/assets/backend/common/css/source/components/badges-labels.css',
			'resources/assets/backend/common/css/source/components/pagination.css',
			'resources/assets/backend/common/css/source/components/collapse.css',
			'resources/assets/backend/common/css/source/components/tabs.css',
			'resources/assets/backend/common/css/source/components/notifications-alerts.css',
			'resources/assets/backend/common/css/source/components/carousel.css',
			'resources/assets/backend/common/css/source/components/widgets.css',
			'resources/assets/backend/common/css/source/components/breadcrumbs.css',
			'resources/assets/backend/common/css/source/pages/ecommerce.css',
			'resources/assets/frontend/vendors/lightGallery/dist/css/lightgallery.min.css',
			'resources/assets/backend/vendors/intl-tel-input/css/intlTelInput.css',
			'resources/assets/backend/vendors/country-select-js/css/countrySelect.css',
			'resources/assets/backend/common/css/tss.css',
			
		]
	, 'public/css/frontend.css');
	
	mix.scripts(
		[
			'resources/assets/frontend/vendors/jquery/dist/jquery.min.js',
			'resources/assets/backend/vendors/jquery/jquery.cookie.js',
			'resources/assets/frontend/vendors/tether/dist/js/tether.min.js',
			'resources/assets/frontend/vendors/bootstrap/dist/js/bootstrap.min.js',
			'resources/assets/frontend/vendors/typed.js/dist/typed.min.js',
			'resources/assets/frontend/vendors/three/build/three.min.js',
			'resources/assets/frontend/vendors/jquery.scrollTo/jquery.scrollTo.min.js',
			'resources/assets/frontend/vendors/lightGallery/dist/js/lightgallery-all.min.js',
			'resources/assets/backend/vendors//intl-tel-input/js/intlTelInput.js',
			'resources/assets/backend/vendors//intl-tel-input/js/utils.js',
			'resources/assets/backend/vendors/country-select-js/js/countrySelect.js',
			'resources/assets/frontend/common/js/product_variant.js',
			'resources/assets/frontend/common/js/common.js',
		]
	, 'public/js/frontend.js');
});

elixir(function(mix) 
{
    mix.version(['public/css/backend.css', 'public/js/backend.js']);
	mix.version(['public/css/frontend.css', 'public/js/frontend.js']);
	
	//mix.uglify('public/js/**/*.js', 'public/js', 'public/js');
});
