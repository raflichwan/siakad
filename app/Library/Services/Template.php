<?php

namespace App\Library\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Template
{
    /*
    https://www.freeformatter.com/html-formatter.html#ad-output
        FUNCTION TEMPLATE UNTUK MENYIMPAN LOKASI CSS DAN JS
    https://id.pinterest.com/awsmcolor/color-name-codes/
    */

    static function get($jenis = '')
    {
        $data['pilihCss'] = [];
        $data['pilihJs'] = [];
        /*
            CSS YANG SELALU DIGUNAKAN ADMIN LTE
        */

        $css['bootstrap'] = "assets/vendor/bootstrap/css/bootstrap.min.css";
        $css['bootstrapicon'] = "assets/vendor/bootstrap-icons/bootstrap-icons.css";
        $css['boxicon'] = "assets/vendor/boxicons/css/boxicons.min.css";
        $css['googleFont'] = "https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i";
        $css['glightbox'] = "assets/vendor/glightbox/css/glightbox.min.css";
        $css['remixicon'] = "assets/vendor/remixicon/remixicon.css";
        $css['swiperbundle'] = "assets/vendor/swiper/swiper-bundle.min.css";
        $css['style'] = "assets/css/style.css";
        
        /*
            SELECT CSS 
        */
        foreach ($css as $key => $value) {
            array_push($data['pilihCss'], $key);
        }
       
        
        /*
            JAVASCRIPT YANG SELALU DIGUNAKAN ADMIN LTE
        */
        $js['jquery'] = "plugins/jquery/jquery.min.js";

        $js['bootstrap'] = "assets/vendor/bootstrap/js/bootstrap.bundle.min.js";
        $js['gligtbox'] = "assets/vendor/glightbox/js/glightbox.min.js";
        $js['isotope'] = "assets/vendor/isotope-layout/isotope.pkgd.min.js";
        $js['swiperbundle'] = "assets/vendor/swiper/swiper-bundle.min.js";
        $js['validate'] = "assets/vendor/php-email-form/validate.js";
        $js['main'] = "assets/js/main.js";
        // SELECT JS 
        foreach ($js as $key => $value) {
            array_push($data['pilihJs'], $key);
        }

        $data['js'] = $js;
        $data['css'] = $css;
       
        return $data;
    }

    static function getadmin($jenis = '')
    {
        $data['pilihCss'] = [];
        $data['pilihJs'] = [];
        /*
            CSS YANG SELALU DIGUNAKAN ADMIN LTE
        */

        $css['tempusdominusbootstrap'] = "plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css";
        $css['icheckbootstrap'] = "plugins/icheck-bootstrap/icheck-bootstrap.min.css";
        $css['ionicon'] = "https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css";
        $css['googleFont'] = "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback";
        $css['fontawesome'] = "plugins/fontawesome-free/css/all.min.css";
        $css['jqvmap'] = "plugins/jqvmap/jqvmap.min.css";
        $css['adminlte'] = "dist/css/adminlte.min.css";
        $css['OverlayScrollbars'] = "plugins/overlayScrollbars/css/OverlayScrollbars.min.css";
        $css['daterangepicker'] = "plugins/daterangepicker/daterangepicker.css";
        $css['summernote'] = "plugins/summernote/summernote-bs4.min.css";
        
        /*
            SELECT CSS 
        */
        foreach ($css as $key => $value) {
            array_push($data['pilihCss'], $key);
        }

        $css['dataTables1'] = "plugins/datatables-bs4/css/dataTables.bootstrap4.min.css";
        $css['dataTables2'] = "plugins/datatables-responsive/css/responsive.bootstrap4.min.css";
        
        /*
            JAVASCRIPT YANG SELALU DIGUNAKAN ADMIN LTE
        */
        $js['jquery'] = "plugins/jquery/jquery.min.js";
        $js['jqueryui'] = "plugins/jquery-ui/jquery-ui.min.js";
        $js['bootstrap'] = "plugins/bootstrap/js/bootstrap.bundle.min.js";
        $js['chart'] = "plugins/chart.js/Chart.min.js";
        $js['spartkline'] = "plugins/sparklines/sparkline.js";
        $js['jqvmap'] = "plugins/jqvmap/jquery.vmap.min.js";
        $js['jqvmapmaps'] = "plugins/jqvmap/maps/jquery.vmap.usa.js";
        $js['knob'] = "plugins/jquery-knob/jquery.knob.min.js";
        $js['moment'] = "plugins/moment/moment.min.js";
        $js['daterangepicker'] = "plugins/daterangepicker/daterangepicker.js";
        $js['tempusdominusbootstrap'] = "plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js";
        $js['summernote'] = "plugins/summernote/summernote-bs4.min.js";
        $js['overlayscrollbars'] = "plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js";
        $js['adminlte'] = "dist/js/adminlte.js";
        $js['demo'] = "dist/js/demo.js";
        $js['dashboard'] = "dist/js/pages/dashboard.js";
        // SELECT JS 
        foreach ($js as $key => $value) {
            array_push($data['pilihJs'], $key);
        }

        $js['dataTables1'] = "plugins/datatables/jquery.dataTables.min.js";
        $js['dataTables2'] = "plugins/datatables-bs4/js/dataTables.bootstrap4.min.js";
        $js['dataTables3'] = "plugins/datatables-responsive/js/dataTables.responsive.min.js";
        $js['dataTables4'] = "plugins/datatables-responsive/js/responsive.bootstrap4.min.js";

        $data['js'] = $js;
        $data['css'] = $css;
       
        return $data;
    }
    
}
