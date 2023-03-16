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

    public $logCarga;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LogCarga $logCarga)
    {
        $this->logCarga = $logCarga;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $asunto = 'Se ha generado un nuevo documento de pago en la plataforma de pago Magotteaux';
        return $this->view('emails.notificacion')->subject($asunto);
    }
}
