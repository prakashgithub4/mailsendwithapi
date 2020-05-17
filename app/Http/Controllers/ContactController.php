<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Validator;
class ContactController extends Controller
{
    //
    public function senMail(Request $request){

        $validation = Validator::make($request->all(),[ 
        'email' =>['required', 'string', 'email']
        
    ]);
        if ($validation->fails()) {
            return response()->json(['error'=>$validation->errors()],400);
        }
        $email= $request->input('email');
        $data['name'] =$request->input('name');
        $data['message'] = $request->input('message');
         Mail::to($email)->send(new ContactMail($data));

         if (Mail::failures()) {
        return response()->json(["msg"=>"mail has been send successfully","success"=>true],400);
    }
    else{
    	return response()->json(["msg"=>"mail has been send successfully","success"=>true],200);
    }
       
    }
}
