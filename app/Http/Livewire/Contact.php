<?php

namespace App\Http\Livewire;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{
    public $data, $name, $email, $selectedId;
    public $updateMode = false;

    public function render()
    {
        $this->data = ModelsContact::all();
        return view('livewire.contact');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns',
        ]);

        ModelsContact::create([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->resetInput();
    }

    public function edit($id)
    {
        $record = ModelsContact::findOrFail($id);
        $this->selectedId = $id;
        $this->name = $record->name;
        $this->email = $record->email;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => 'required|numeric',
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns',
        ]);

        if ($this->selectedId) {
            $record = ModelsContact::find($this->selectedId);
            $record->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Contact::where('id', $id)->first();
            $record->delete();
        }
    }
}
