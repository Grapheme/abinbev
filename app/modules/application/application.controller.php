<?php

class ApplicationController extends BaseController {

    public static $name = 'application';
    public static $group = 'application';

    /****************************************************************************/

    ## Routing rules of module
    public static function returnRoutes($prefix = null) {

        Route::group(array(), function() {

            Route::any('/brands/{brand_slug}', array('as' => 'app.brand', 'uses' => __CLASS__.'@getBrandPage'));
            #Route::any('/ajax/some-action', array('as' => 'ajax.some-action', 'uses' => __CLASS__.'@postSomeAction'));
        });
    }


    /****************************************************************************/


	public function __construct(){
        #
	}


    public function getBrandPage($brand_slug) {

        $brand = Dic::valueBySlugs('brands', $brand_slug, ['fields', 'textfields']);
        if (!is_object($brand))
            App::abort(404);

        $brand = DicLib::loadImages($brand, 'header_image');

        $header_image = $brand->header_image;

        return View::make(Helper::layout('brand'), compact('brand', 'header_image'));
    }

}