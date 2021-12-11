<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Content as ContentM;

class Content extends Component
{
    public $contents = [];
    public $input = [
        'title' => '',
        'content' => ''
    ];
    public $message = '';

    protected $rules = [
        'contents.*.title' => 'required|string',
        'contents.*.content' => 'required|string',
    ];

    public function render()
    {
        $this->contents = ContentM::orderBy('id', 'desc')->get()->toArray();
        return view('livewire.content');
    }

    public function submit()
    {
        $this->validate();

        $content = ContentM::create([
            'title' => $this->input['title'],
            'content' => $this->input['content'],
        ]);

        if($content){
            $this->resetInput();
            $this->message = 'Content successfully added.';
        }
    }

    public function edit($id, $index)
    {
        $content = ContentM::find($id);

        $content->title = $this->contents[$index]['title'];
        $content->content = $this->contents[$index]['content'];

        if($content->save()){
            $this->message = 'Content successfully edited.';
        }
    }

    public function delete($id)
    {
        $content = ContentM::find($id);
        if($content->delete()){
            $this->message = 'Content successfully deleted.';
        };
    }

    private function resetInput(){
        $this->input['title'] = null;
        $this->input['content'] = null;
    }

}
