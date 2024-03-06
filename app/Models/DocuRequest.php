<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocuRequest extends Model
{   
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'requestor_name',
        'request_code',
        'request_type',
        'date_requested',
        'date_processed',
        'request_status',
        'reason'
    ];

    public static function codeType ($request_code) {

        $request_type="";

        switch($request_code){
            case 'CGMC': 
                $request_type = "Certificate of Good Moral Character";
                break;

            case 'CNLWP':
                $request_type = "Certificate of No Leave Without Pay - GSIS";
                break;

            case 'COSP':
                $request_type = "Certification of One and the Same Person";
                break;

            case 'SR':
                $request_type = "Service Record";
                break;

            case 'SRNLWP':
                $request_type = "Service Record w/ No Leave Without Pay - GSIS";
                break;

            case 'COCP':
                $request_type = "Certificate of Contribution - Philhealth (Hospitalized)";
                break;

            case 'PS':
                $request_type = "Payslip with Signature";
                break;

            case 'COE':
                $request_type = "Certificate of Employment";
                break;

            case 'CECB':
                $request_type = "Certificate of Employment with Compenstaion and Benefit";
                break;

            case 'CEDR':
                $request_type = "Certificate of Employment With Duties and Responisibilities";
                break;

            case 'L':
                $request_type = "Leave";
                break;
        }
        return $request_type;
    }
    public $timestamps = false;
}