<?php
   
namespace App\Imports;
   
use App\Models\Table_record;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class DataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
 $check=new Table_record;
     return new Table_record([
            //
             'officename'=>$row['officename'],
            'pincode'=>$row['pincode'],
            'officeType'=>$row['officetype'],
            'deliverystatus'=>$row['deliverystatus'],
            'divisionname'=>$row['divisionname'],
            'regionname'=>$row['regionname'],
            'circlename'=>$row['circlename'],
            'taluk'=>$row['taluk'],
            'districtname'=>$row['districtname'],
            'statename'=>$row['statename'],
           
        ]);
    }
}