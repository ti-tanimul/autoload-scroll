<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public $rowperpage = 5;
    public function index(){
        
        $data['rowperpage'] = $this->rowperpage;

        $data['totalrecords'] = Student::get()->count();

        $data['users'] = Student::skip(0)->take($this->rowperpage)->get();
        return view("home", $data);
    }

    public function show(Request $request){
        $start = $request->get("start");

        $records = Student::skip($start)
            ->take($this->rowperpage)
            ->get();

        $html = "";
        foreach($records as $record){
            $id = $record['id'];
            $name = $record['name'];
            $mobile = $record['mobile'];
            $email = $record['email'];

            $html .= '<div class="card post">
            <div class="card-body">
                <h5>'.$id.'</h5>
                <h5 class="card-title">'.$name.'</h5>
                <h5 class="card-text">'.$mobile.'</h5>
                <h5 class="card-test">'.$email.'</h5>
            </div>
          </div>';
        }
        $data['html'] = $html;
        return response()->json($data);      
    }

    public function scroll(){
        return view('captcha');
        // $details = Student::all();
        // return view("scroll", compact("details"));
    }

    public function getPdf(){
        $data = [
            [
                'quantity' => 1,
                'description' => '1 Year Subscription',
                'price' => '129.00'
            ]
        ];
     
        $pdf = Pdf::loadView('invoice', ['data' => $data]);
        return $pdf->download('invoice.pdf');
    }

    public function reloadCaptcha(){
        return response()->json(['captcha'=>captcha_img('math')]);
    }

    public function captcha(Request $request){
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'captcha' => 'required|captcha',
        ]); 
        return "Form Submitted";
    }

    

}
