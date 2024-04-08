<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
public function sendmail(Request $request){
$request->validate([
 'name' => 'required',
 'email' => 'required|email',
 'subject' => 'required',
 'message' => 'required',
//  'file'    => 'file|max:4000',
]);


if($this->isOnline()){
$mail_data = [

'recipient' => 'mutukutest@gmail.com',
'fromEmail' =>$request->email,
'fromName' =>$request->name,
'subject' => $request->subject,
'body'  => $request->message,
'file_path' => 'attachments/mutukutaskcard.docx',
];

\Mail::send('email-template',$mail_data,function($message) use ($mail_data){

    $message->to($mail_data['recipient'])
            ->from($mail_data['fromEmail'],$mail_data['fromName'])
            ->subject($mail_data['subject'])
            ->attach(public_path($mail_data['file_path']));
});

return redirect()->back()->with('success','Email sent successfully');

}else{
    return redirect()->back()->withInput()->with('error','Check your internet connectivity');
}
   }

   public function isOnline($site= "https://youtube.com/"){
    if(@fopen($site,"r")){
        return true;
    }
    else{
    return false;
    }
   }
}
