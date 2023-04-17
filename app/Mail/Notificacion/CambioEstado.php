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

class CambioEstado extends Mailable
{
    use Queueable, SerializesModels;

    public $logCarga;
    public $cambioEstado;
    public $proveedores;
    public $proveedorCambioEstado;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LogCarga $logCarga, $cambioEstado,$proveedores,$proveedorCambioEstado)
    {
        $this->logCarga = $logCarga;
        $this->cambioEstado = $cambioEstado;
        $this->proveedores = $proveedores;
        $this->proveedorCambioEstado = $proveedorCambioEstado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $asunto = 'Se ha generado un cambio de estado de pago';
        return $this->view('emails.cambio-estado')->subject($asunto);
    }
}
