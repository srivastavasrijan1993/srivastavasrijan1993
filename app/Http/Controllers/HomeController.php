<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Table_record;
use Response;
class HomeController extends Controller
{
    //

    public function index()
    {

        $data=Table_record::paginate('50');
        $total=Table_record::get();
        return view('home',compact('data','total'));
    }
 
   public function import() 
    {
        ini_set('memory_limit', '-1');
        Excel::import(new DataImport,request()->file('file'));
           
        return back();
    }
public function record()
{
     $total=Table_record::get();
 return response()->json(['data'=>$total]);
}

public function addrecord()
{
 
       ini_set('memory_limit', '-1');
     $d='http://data.gov.in/sites/default/files/all_india_pin_code.csv';
if (($handle = fopen($d, 'r')) !== FALSE) { // Check the resource is valid
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!
        // echo "<pre>";
        // // print_r($data); // Array
         $check=Table_record::where(['officename'=>$data[0],'pincode'=>$data[1],'officeType'=>$data[2],'deliverystatus'=>$data[3],'divisionname'=>$data[4],'regionname'=>$data[5],'circlename'=>$data[6],'taluk'=>$data[7],'districtname'=>$data[8],'statename'=>$data[9]])->first();
        if(empty($check))
        {
 if(!empty($data[0])){

$data1=new Table_record;
$data1->officename=$data[0];
$data1->pincode=$data[1];
$data1->officeType=$data[2];
$data1->deliverystatus=$data[3];
$data1->divisionname=$data[4];
$data1->regionname=$data[5];
$data1->circlename=$data[6];
$data1->taluk=$data[7];
$data1->districtname=$data[8];
$data1->statename=$data[9];
$data1->save();
echo "done";
      }
      else
      {
        echo "error";
   
  }
    }
 
    }
    fclose($handle);
}
}

public function storagedata()
{
    $d=file_get_contents('http://data.gov.in/sites/default/files/all_india_pin_code.csv');
$name=time();
    Storage::disk('local')->put('data'.$name.'.csv', $d);
 
}
}