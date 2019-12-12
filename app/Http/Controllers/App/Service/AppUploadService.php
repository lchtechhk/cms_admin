<?php
namespace App\Http\Controllers\App\Service;
use Log;
use DB;
use Lang;
use Exception;

class AppUploadService{
    function __construct(){

    }
    public function upload_image($request,$image_id,$target_path){
       
        $myVar = $extensions = array('gif','jpg','jpeg','png');
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