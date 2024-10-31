<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request){

    //dd($request->input('name'));

        $form = new Contact($request->input('name'), $request->input('email'), $request->input('phone'), $request->input('subject'), $request->input('message'));

        $error = $form->validate();

        if($error):
            return response()->json(['success' => false, 'msg' => $error]);
        endif;

        if($form->send()):

            return response()->json(['success' => true, 'msg' => 'Massage was Sent Successfully!!']);

        else:

            return response()->json(['success' => false, 'msg' => 'Unable to send Message']);

        endif;



    }
}
