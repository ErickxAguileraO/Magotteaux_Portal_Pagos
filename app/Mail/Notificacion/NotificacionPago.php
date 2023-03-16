<?php

namespace App\Mail\Notificacion;

use App\Models\Carga;
use App\Models\Correo;
use App\Models\LogCarga;
use App\Models\Pago;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionPago extends Mailable
{
    use Queueable, SerializesModels;

    public $correo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LogCarga $correo)
    {
        $this->correo = $correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $asunto = 'Carga masiva';
        return $this->view('emails.notificacion')->subject($asunto);
    }
}
