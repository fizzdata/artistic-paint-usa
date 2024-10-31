<?php

namespace App\Models;

use PHPUnit\Framework\Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use App\Mail\ContactFormMail;

class Contact extends Model
{

    protected $name;
    protected $email;
    protected $phone;
    protected $subject;
    protected $message;

    function __construct($name, $email, $phone, $subject, $message){

        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->message = $message;

    }
    

    public function validate(){

        if(trim($this->name) == ''):
            return 'Name Required';
        endif;

        if(trim($this->email) == ''):
            return 'Email Required';
        endif;

        if(trim($this->phone) == ''):
            return 'Phone Required';
        endif;

        if(trim($this->subject) == ''):
            return 'Subject Required';
        endif;

        if(trim($this->message) == ''):
            return 'Massage Required';
        endif;

        }

    public function send(){

        $mailData = [
            'title' => 'Mail from ArtisticPaintUSA.com',
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message
        ];
         
        try{

            Mail::to(['Office@artisticpaintusa.com'])->send(new ContactFormMail($mailData));

            return true;
        
        } catch(Exception){

            return false;

        }
       
    }
}
