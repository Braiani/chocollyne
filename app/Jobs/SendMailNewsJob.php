<?php

namespace App\Jobs;

use App\Cliente;
use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $cliente, $product;

    /**
     * Create a new job instance.
     *
     * @param Cliente $cliente
     * @param Product $product
     */
    public function __construct(Cliente $cliente, Product $product)
    {
        $this->cliente = $cliente;
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cliente = $this->cliente;
        $produto = $this->product;

        $destinatario = $cliente->email;
        $assunto = "Novo item adicionado no Chocollyne! Não perca tempo!";

        try{
            Mail::send('emails.newProduct', ['produto' => $produto, 'cliente' => $cliente], function ($message) use ($destinatario, $assunto){
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $message->to($destinatario);
                $message->subject($assunto);
            });
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
        }
    }
}
