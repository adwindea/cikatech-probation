<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Deposit as DepositM;

class Deposit extends Component
{
    public $progresses = [];
    public $approves = [];
    public $message, $progress_count;

    public function render()
    {
        $this->progresses = DepositM::with('rekening')->where('is_approved', false)->get()->toArray();
        $this->approves = DepositM::with('rekening')->where('is_approved', true)->get()->toArray();
        $this->progress_count = count($this->progresses);
        return view('livewire.deposit');
    }

    public function approve($id){
        $deposit = DepositM::find($id);
        $deposit->is_approved = true;
        if($deposit->save()){
            $this->message = 'Deposit successfully Approved.';
        }
    }

    public function reload($id){
        $deposit = DepositM::find($id);
        $deposit->is_approved = false;
        if($deposit->save()){
            $this->message = 'Deposit successfully Reload.';
        }
    }

    public function delete($id){
        $deposit = DepositM::find($id);
        if($deposit->delete()){
            $this->message = 'Deposit successfully Deleted.';
        }
    }

}
