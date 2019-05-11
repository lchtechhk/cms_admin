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
    public function upload_image($request,$image_id,$target_path){
       
        $myVar = new AdminSiteSettingController();	
        $extensions = $myVar->imageType();	
        if($request->hasFile($image_id) and in_array($request->$image_id->extension(), $extensions)){
            $image = $request->$image_id;
            $fileName = time().'.'.$image->getClientOriginalName();
            $image->move($target_path, $fileName);
            return $target_path.$fileName; 
        }
        return null;
    }
}

?>