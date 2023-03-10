<?php

namespace App\Mail\RecuperarContrasena;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordRestaurada extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $contrasena;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $usuario, string $contrasena)
    {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.restore_password')->subject('Nueva contraseña');
    }
}
