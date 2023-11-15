<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->data=$request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {       
        // return $this->view('orders.shipped');
     
    //     return $this->subject($this->data->subject, 'osama Laravel8')
    //     ->view('orders.shipped')
    //   ->attachFromPath($this->data->myfiles->path(), $this->data->myfiles->getClientOriginalName());
    //         return $this->view('orders.shipped');

    $this->from('osamajanab9999@gmail.com', 'using laravel8')
    ->subject($this->data->subject)
    ->view('orders.shipped');

// Get all the files to be attached
$files = $this->data->myfiles;
// Attach each file to the email
foreach ($files as $file) {
    $this->attachFromPath($file->path(), $file->getClientOriginalName());
}
    }
    /**
    *
    * @param string $path The path to the file.
    * @param string $name The name of the file.
    *
    * @return $this
    */
   public function attachFromPath(string $path, string $name)
   {
       return $this->attach($path, [
           'as' => $name,
       ]);
   }
}


      
// return [
//     Attachment::fromPath($this->data->myfiles->path())
//     ->as($this->data->myfiles->getClientOriginalName())
//     ->withMime($this->data->myfiles->getClientMimeType()),
// ];