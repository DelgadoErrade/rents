<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TypeProperty;

class TypePropertyComponent extends Component
{
    public $tipo_inmueble, $typePropertyId;
    public $isEdit = false;

    public function render()
    {
        return view('livewire.type-property', [
            'typeProperties' => TypeProperty::all()
        ]);
    }

    public function resetInput()
    {
        $this->tipo_inmueble = '';
        $this->typePropertyId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'tipo_inmueble' => 'required|string|max:45',
        ]);

        TypeProperty::create([
            'tipo_inmueble' => $this->tipo_inmueble,
        ]);

        $this->resetInput();
        session()->flash('message', 'Tipo de inmueble creado.');
    }

    public function edit($id)
    {
        $typeProperty = TypeProperty::findOrFail($id);
        $this->typePropertyId = $typeProperty->id;
        $this->tipo_inmueble = $typeProperty->tipo_inmueble;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'tipo_inmueble' => 'required|string|max:45',
        ]);

        $typeProperty = TypeProperty::findOrFail($this->typePropertyId);
        $typeProperty->update([
            'tipo_inmueble' => $this->tipo_inmueble,
        ]);

        $this->resetInput();
        session()->flash('message', 'Tipo de inmueble actualizado.');
    }

    public function destroy($id)
    {
        TypeProperty::destroy($id);
        session()->flash('message', 'Tipo de inmueble eliminado.');
    }
}
