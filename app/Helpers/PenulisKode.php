<?php
// PenulisKode.com 2021

// use App\Models\Gallery;
// use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;


// RETURN COMPONENT


function detailResellerBonus($data){
    $btn = '<ul>';
        foreach($data->transaction->transaction_detail as $item){
            $btn .= '<li>';
            $btn .= $item->plan->name . " seharga " . format_rupiah($item->total_price) . ", 
                Kamu mendapatkan " . format_rupiah($item->total_price * $data->percentage_bonus / 100) . " (" . $data->percentage_bonus . "%) dari " . format_rupiah($item->total_price);
            $btn .= '</li>';
        }
    $btn .= '</ul>';
    
    return $btn;
}
function actionBtn($modelInfo, $indexLink, $detailLink, $editLink, $deleteLink){
    $btn = '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';

    $btn .= '<a href="'.$editLink.'" class="btn btn-sm btn-warning ms-2 text-white"><i class="ri-pencil-line"></i></a>';

    $btn .= '<a href="javascript:;" onclick="delete_data(\'Data '. $modelInfo .'\', \''.$deleteLink.'\', \''.$indexLink.'\')" class="btn btn-sm btn-danger ms-2"><i class="ri-delete-bin-line"></i></a>';

    return $btn;
}
function subActionBtn($modelInfo, $indexLink, $detailLink, $editLink, $deleteLink){
    $btn = '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';

    $btn .= '<a href="'.$editLink.'" class="btn btn-sm btn-warning ms-2 text-white"><i class="ri-pencil-line"></i></a>';

    return $btn;
}
function onlyShowEditBtn($modelInfo, $detailLink, $editLink){
    $btn = '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';

    $btn .= '<a href="'.$editLink.'" class="ms-2 btn btn-sm btn-warning text-white"><i class="ri-pencil-line"></i></a>';
    return $btn;
}
function transactionModuleActionBtn($modelInfo, $indexLink, $detailLink, $editLink, $deleteLink){
    $btn = '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';
    
    $btn .= '<a href="javascript:;" onclick="penuliskode_modal(\'Update Data '. $modelInfo .'\', \''.$editLink.'\')" class="btn btn-sm btn-warning ms-2 text-white"><i class="ri-pencil-line"></i></a>';

    // $btn .= '<a href="'.$editLink.'" class="btn btn-sm btn-warning ms-2 text-white"><i class="ri-pencil-line"></i></a>';

    $btn .= '<a href="javascript:;" onclick="delete_data(\'Data '. $modelInfo .'\', \''.$deleteLink.'\', \''.$indexLink.'\')" class="btn btn-sm btn-danger ms-2"><i class="ri-delete-bin-line"></i></a>';

    return $btn;
}
function menuActionBtn($modelInfo, $indexLink, $detailLink, $editLink, $deleteLink, $recipeLink){
    $btn = '<a href="'.$recipeLink.'" class="btn btn-sm btn-secondary text-white"><i class="ri-survey-line"></i></a>';

    $btn .= '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info ms-2 text-white"><i class="ri-search-line"></i></i></a>';

    $btn .= '<a href="'.$editLink.'" class="btn btn-sm btn-warning ms-2 text-white"><i class="ri-pencil-line"></i></a>';

    $btn .= '<a href="javascript:;" onclick="delete_data(\'Data '. $modelInfo .'\', \''.$deleteLink.'\', \''.$indexLink.'\')" class="btn btn-sm btn-danger ms-2"><i class="ri-delete-bin-line"></i></a>';

    return $btn;
}

function actionBtn2($modelInfo, $indexLink, $detailLink, $editLink, $deleteLink){
    $btn = '<a href="'.$detailLink.'?type=list" class="btn btn-sm btn-secondary text-white"><i class="ri-file-list-line"></i></a>';
    
    $btn .= '<a href="'.$detailLink.'?type=detail" class="btn btn-sm btn-info ms-2 text-white"><i class="ri-search-line"></i></i></a>';

    $btn .= '<a href="'.$editLink.'" class="btn btn-sm btn-warning ms-2 text-white"><i class="ri-pencil-line"></i></a>';

    $btn .= '<a href="javascript:;" onclick="delete_data(\'Data '. $modelInfo .'\', \''.$deleteLink.'\', \''.$indexLink.'\')" class="btn btn-sm btn-danger ms-2"><i class="ri-delete-bin-line"></i></a>';

    return $btn;
}

function actionBtnStaff2($modelInfo, $indexLink, $detailLink, $editLink, $deleteLink){
    $btn = '<a href="'.$detailLink.'" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';
    return $btn;
}

function actionBtnStaff($modelInfo, $indexLink, $detailLink, $editLink, $deleteLink){
    $btn = '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';
    return $btn;
}

function onlyShowBtn($modelInfo, $detailLink){
    $btn = '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';
    return $btn;
}

function showEditBtn2($modelInfo, $indexLink, $detailLink, $editLink, $deleteLink){
    $btn = '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';
    $btn .= '<a href="'.$editLink.'" class="btn btn-sm btn-warning ms-2 text-white"><i class="ri-pencil-line"></i></a>';
    return $btn;
}

function showEditBtn($modelInfo, $detailLink, $editLink){
    $btn = '<a href="javascript:;" onclick="penuliskode_modal(\'Detail Data '. $modelInfo .'\', \''.$detailLink.'\')" class="btn btn-sm btn-info text-white"><i class="ri-search-line"></i></i></a>';
    $btn .= '<a href="'.$editLink.'" class="btn btn-sm btn-warning ms-2 text-white"><i class="ri-pencil-line"></i></a>';
    return $btn;
}
function recordTodoActionBtn($route, $exist){
    $color = ($exist) ? "success" : "secondary";
    $btn = '<a href="' . $route . '" class="btn btn-sm btn-' . $color . ' text-white"><i class="ri-check-line"></i></i></a>';
    return $btn;
}

function recordCheckingActionBtn($route, $exist){
    $color = ($exist) ? "success" : "secondary";
    $btn = '<a href="' . $route . '" class="btn btn-sm btn-' . $color . ' text-white"><i class="ri-check-line"></i></i></a>';
    return $btn;
}

function displayBenefit($data){
    $txt = "<ul>";
    foreach($data as $item){
        $txt .= "<li>".$item."</li>"; 
    }
    return $txt."</ul>";
}

// Manage input image
function insertImg($upload_path){
    $image_name = '';
    $request = request();
    $path = public_path($upload_path);
    if(!File::isDirectory($path)){
        File::makeDirectory($path, 0777, true, true);
    }

    if ($request->file('myimg')->isValid()) {
        $image = $request->file('myimg');
        $image_name = time().'.'.$image->extension();
        $img = Image::make($image->path());
        // $img->resize(500, 500, function ($const) {
        //     $const->aspectRatio();
        // })->save($path.''.$image_name);
        $img->save($path.''.$image_name);

    }
    return $image_name;
}

function updateImg($upload_path, $data_name){
    $image_name = '';
    $request = request();
    $path = public_path($upload_path);
    if ($request->hasFile('myimg')) {
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if ($request->file('myimg')->isValid()) {
            $image = $request->file('myimg');
            $image_name = time().'.'.$image->extension();

            $img = Image::make($image->path());
            // $img->resize(500, 500, function ($const) {
            //     $const->aspectRatio();
            // })->save($path.''.$image_name);
            $img->save($path.''.$image_name);

            if($data_name != ''  && $data_name != null){
                $file_old = $path.$data_name;
                if(file_exists($file_old)){
                    unlink($file_old);
                }
            }
        }
    }
    return $image_name;
}


function deleteImg($upload_path, $data_name){
    $path = public_path($upload_path);
    if($data_name != ''  && $data_name != null){
        $file_old = $path.$data_name;
        unlink($file_old);
    }
}




// GENERATE
function generateOrderNumber($id){
    return strtoupper(substr($id, 0, 3)) . random_int(10, 99);
}

function generateReferralCode($id){
    return strtoupper(substr($id, 0, 4)) . random_int(100, 999);
}

function generateDigit($id){
    return ($id < 10) ? '00'.$id : ($id < 100 ? '0'.$id : $id);
}

function generateNumberTransaction($id){
    $date = Carbon::now()->format('Ymd');
    $number = ($id < 10) ? '00'.$id : ($id < 100 ? '0'.$id : $id);
    $notrans = 'TRCT' . $date . $number;
    return $notrans;
}

function generateNumberBooking($id){
    $date = Carbon::now()->format('Ymd');
    $number = ($id < 10) ? '00'.$id : ($id < 100 ? '0'.$id : $id);
    $notrans = 'BK' . $date . $number;
    return $notrans;
}

function generateNumberTransactionProduct($id){
    $date = Carbon::now()->format('Ymd');
    $number = ($id < 10) ? '00'.$id : ($id < 100 ? '0'.$id : $id);
    $notrans = 'TRCTP' . $date . $number;
    return $notrans;
}

// RESPONSE API
function responseApi($status, $data, $msg){
    return response()->json([
        'status' => $status,
        'data' => $data,
        'msg' => $msg
    ]);
}

// FORMAT

function format_rupiah($str) {
    if ( ! is_numeric($str)) return false;
    return "Rp ".number_format($str,0,',','.');
}
function format_rupiah2($str) {
    if ( ! is_numeric($str)) return false;
    return number_format($str,0,',','.');
}

function format_date($date, $dayname = false) {
    if ($dayname) return Carbon::parse($date)->translatedFormat('d/m/Y');
    return Carbon::parse($date)->translatedFormat('d/m/Y');
}

function format_datetime($date) {
    // return Carbon::parse($date)->addHours(0)->translatedFormat('d/m/Y H:i:s')." WITA";
    return Carbon::parse($date)->addHours(0)->translatedFormat('d/m/Y');
}

function format_time($date) {
    return Carbon::parse($date)->addHours(1)->translatedFormat('H:i');
}

function format_time_add_hours($date, $hours) {
    $date = Carbon::parse($date);
    $date->addHours($hours + 1);
    return $date->translatedFormat('H:i');
}

// SELECT DATA

function returnStatus($key = 'showall'){
    $arr = ['active'=>'Active', 'inactive'=>'Inactive'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}

function returnProductType($key = 'showall'){
    $arr = ['product'=>'Barang', 'service'=>'Jasa'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}

function returnStaffType($key = 'showall'){
    $arr = ['main'=>'Utama', 'sub'=>'Sub'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}
function returnStatusTransaction($key = 'showall'){
    $arr = ['in_progress'=>'In Progress', 'finish'=>'Finish'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}
function returnTransactionType($key = 'showall'){
    $arr = ['in'=>'Barang Masuk', 'out'=>'Barang Keluar', 'return'=>'Barang Retur', 'crash'=>'Barang Rusak'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}
function returnProductUnitType($key = 'showall'){
    $arr = ['pcs'=>'Pcs', 'pack'=>'Pack', 'dus'=>'Dus', 'kg'=>'Kg', 'bungkus'=>'Bungkus (Bks)', 'gulung'=>'Gulung (Glng)', 'lonjor'=>'Lonjor (Ljr)', 'renteng'=>'Renteng (Rtg)', 'zak'=>'Zak'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}
function returnProductUnitTypePrint($key = 'showall'){
    $arr = ['pcs'=>'Pcs', 'pack'=>'Pack', 'dus'=>'Dus', 'kg'=>'Kg', 'bungkus'=>'Bks', 'gulung'=>'Glng', 'lonjor'=>'Ljr', 'renteng'=>'Rtg', 'zak'=>'Zak'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}
function returnProductInventoryType($key = 'showall'){
    $arr = ['in'=>'In', 'out'=>'Out', 'return'=>'Return'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}


function returnTransaction($key = 'showall'){
    $arr = ['done'=>'Done', 'cancel'=>'Cancel'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}

function returnPackageType($key = 'showall'){
    $arr = ['weekday'=>'Weekday', 'weekend'=>'Weekend', 'everyday'=>'Everyday'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}

function returnStatusConfirmation($key = 'showall'){
    $arr = ['pending'=>'Pending', 'approve'=>'Approve', 'decline'=>'Decline'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}

function returnStatusBooking($key = 'showall'){
    $arr = ['pending'=>'Pending', 'approve'=>'Approve', 'decline'=>'Decline', 'finish'=>'Finish'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}

function returnStatusOrder($key = 'showall'){
    $arr = ['pending'=>'Pending', 'approve'=>'Approve', 'decline'=>'Decline', 'finish'=>'Finish'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}

function returnStatusProgress($key = 'showall'){
    $arr = ['pending'=>'Pending', 'in progress'=>'In Progress', 'done'=>'Done'];
    if ($key == 'showall') return $arr;
    if (array_key_exists($key, $arr)) return $arr[$key];
    return "No Data.";
}

// RANDOM
function set_active_menu($uri, $class = "active") {
    if (is_array($uri)) {
        foreach($uri as $val) {
            if (Route::is($val)) return $class;
        }
    } else {
        if (Route::is($uri)) return $class;
    }
}

function sub_text($str, $max_length = 30) {
    if (strlen($str) > $max_length) {
        $offset = ($max_length - 3) - strlen($str);
        $str = substr($str, 0, strrpos($str, ' ', $offset)) . '...';
    }
    return $str;
}

// status

function format_order_status($key = null) {
	$data = [
		'canceled' => ['val' => "Dibatalkan", 'color' => 'danger'],
		'waiting' => ['val' => "Menunggu Pembayaran", 'color' => 'warning'],
		'paid' => ['val' => "Sudah Dibayar", 'color' => 'info'],
		'completed' => ['val' => "Selesai", 'color' => 'success'],
	];
	$print = array_key_exists($key, $data) ? $data[$key] : null;
	return ($key == null) ? $data : $print;
}

function print_format_status($data) {
	return '<span class="badge badge-' . $data['color'] . '">' . $data['val'] . '</span>';
}


function delete_file($target) {
    $file_path = str_replace(url('/'), "", $target);
    if (File::exists(public_path($file_path))) File::delete(public_path($file_path));
    return true;
}
