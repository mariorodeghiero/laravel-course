<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class IuguUpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ex:IuguUpdateStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza status de pagamento.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Lib::setApiKey("");

        $invoices = Lib::search()->results();

        foreach ($invoices as $invoice) {

            $doesntExist = DB::table('tablename')->where('num_inscricao', $invoice->id)->doesntExist();

            if ($doesntExist) {
                DB::table('tablename')->insert([
                    'num_inscricao' => $invoice->id,
                    'codigo' => $invoice->id,
                    'status_pagamento' => $invoice->status,
                    'pagamento_gerado' => $invoice->created_at,
                    'pagamento_vencimento' => $invoice->due_date,
                ]);
            } else {
                DB::table('tablename')->where('num_inscricao', $invoice->id)->update(['status_pagamento' => $invoice->status]);
            }
        }
    }
}
