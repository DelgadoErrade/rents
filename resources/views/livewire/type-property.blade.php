<div>
    <h2>Tipos de Inmueble</h2>

    @if (session()->has('message'))
        <div style="color: green;">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
        <input type="text" wire:model="tipo_inmueble" placeholder="Tipo de inmueble">
        <button type="submit">{{ $isEdit ? 'Actualizar' : 'Crear' }}</button>
        @if($isEdit)
            <button type="button" wire:click="resetInput">Cancelar</button>
        @endif
        @error('tipo_inmueble') <span style="color: red;">{{ $message }}</span> @enderror
    </form>

    <table border="1" cellpadding="5" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typeProperties as $tp)
                <tr>
                    <td>{{ $tp->id }}</td>
                    <td>{{ $tp->tipo_inmueble }}</td>
                    <td>
                        <button wire:click="edit({{ $tp->id }})">Editar</button>
                        <button wire:click="destroy({{ $tp->id }})" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
