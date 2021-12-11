<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Rekening;
use \App\Deposit;

class FormDeposit extends Component
{
    public $rekenings = [];
    public $rekening_id, $rekening_asal, $amount, $note, $message;

    protected $rules = [
        'rekening_id' => 'required',
        'rekening_asal' => 'required|string',
        'amount' => 'required|numeric',
        'note' => 'required|string'
    ];

    public function render()
    {
        $this->rekenings = Rekening::all()->toArray();
        return view('livewire.form-deposit');
    }

    public function save(){
        $this->validate();

        $data = [
            'rekening_id' => $this->rekening_id,
            'rekening_asal' => $this->rekening_asal,
            'amount' => $this->amount,
            'note' => $this->note,
        ];

        if(Deposit::create($data)){
            $this->resetInput();
            $this->message = 'Deposit successfully created.';
        }
    }

    private function resetInput(){
        $this->rekening_id = null;
        $this->rekening_asal = null;
        $this->amount = null;
        $this->note = null;
    }
}
