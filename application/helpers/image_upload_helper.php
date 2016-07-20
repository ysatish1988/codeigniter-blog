<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('image_upload')) {
   function image_upload($path,$filename, $tempLoc) {
	   
       $images_name = '';
	   $ext = pathinfo($filename, PATHINFO_EXTENSION);
	   $images_name = md5(time()).'.'.$ext;
	   move_uploaded_file($tempLoc, $path.'/'.$images_name);
	   return $images_name;
   }
}
