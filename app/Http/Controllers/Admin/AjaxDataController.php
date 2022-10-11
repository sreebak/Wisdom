<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Contact;
use \App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AjaxDataController extends Controller
{
    
    public function GetProductsSubCategories(Request $request) 
    {
        $select = $request->select;
        $value = $request->value;
        $dependent =$request->dependent;

        $data = DB::table('pdt_sub_categories')
                ->where($select,$value)
                ->get();

        echo json_encode($data);
    }

    public function GetServicesSubCategories(Request $request) 
    {
        $select = $request->select;
        $value = $request->value;
        $dependent =$request->dependent;

        $data = DB::table('ser_sub_categories')
                ->where($select,$value)
                ->get();

        echo json_encode($data);
    }   
    
    public function SaveContact(Request $request)
    {
         return response()->json($request->all());
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->course = $request->course;
        $contact->remarks = '';

        if($contact->save()) {
            $message = "<p class='title'>Name: <b>" . $contact->name ."</b></p>";
            $message .= "<p class='title'>Email: <b>" . $contact->email ."</b></p>";
            $message .= "<p class='title'>Phone: <b>" . $contact->phone ."</b></p>";
            $message .= "<p class='title'>Course: <b>" . $contact->course ."</b></p>";
            $message .= "<p class='title'>Message: <b>" . $contact->message ."</b></p>";

            try {
                $details =[
                    'from' => 'aju@reontel.com',
                    'subject' => 'Website Contact',
                    'template' => 'Emails.template1',
                    'title' => 'Contact from Website ',
                    'body' =>  $message
                ];
    
                Mail::to('reondeveloper@gmail.com')->send(new SendMail($details));
    
                return "Success";
            }
            catch (Exception $ex) {
                return "Failed";
            }  
        }

    }

    public function RemoveFile(Request $request) {
        $storage = $request->storage;
        $filetoremove = $request->filetoremove;

        if(Storage::disk($storage)->delete($filetoremove)) {
            return "Success";
        }
        else {
            return "Failed";
        }

    }

}
