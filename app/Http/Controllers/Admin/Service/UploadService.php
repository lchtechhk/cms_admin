<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;
use App\Http\Controllers\Admin\AdminSiteSettingController;

class UploadService{
    function __construct(){

    }
    public function upload_image($request,$target_path){
        $request['customers_picture'] = '';
        $myVar = new AdminSiteSettingController();	
        $extensions = $myVar->imageType();	
        if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
            $image = $request->newImage;
            $fileName = time().'.'.$image->getClientOriginalName();
            $image->move($target_path, $fileName);
            $request['customers_picture'] = $target_path.$fileName; 
        }
        return $request['customers_picture'];
    }
}

?>