<div>
    <h2 class="text-center text-2xl font-bold mb-8 relative text-yellow-500">
        <span class="italic text-gray-900">CUADERNOS DE PARTES URBANO</span>
        <div class="absolute left-0 top-1/2 transform -translate-y-2/4 w-1/4 border-t-2 border-gray-300"></div>
        <div class="absolute right-0 top-1/2 transform -translate-y-2/4 w-1/4 border-t-2 border-gray-300"></div>
    </h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-md">
            <thead>
                <tr class="bg-red-600">
                    <th class="px-4 py-2 border">Turno</th>
                    <th class="px-4 py-2 border">Operador</th>
                    <th class="px-4 py-2 border">Técnico 1</th>
                    <th class="px-4 py-2 border">Técnico 2</th>
                    <th class="px-4 py-2 border">Centro</th>
                    <th class="px-4 py-2 border">Sin Energía</th>
                    <th class="px-4 py-2 border">Reg</th>
                    <th class="px-4 py-2 border">Fecha</th>
                    <th class="px-4 py-2 border">Hora Inicio</th>
                    <th class="px-4 py-2 border">Hora Fin</th>
                    <th class="px-4 py-2 border">Circuito</th>
                    <th class="px-4 py-2 border">Según</th>
                    <th class="px-4 py-2 border">Informó A</th>
                    <th class="px-4 py-2 border">Causa</th>
                    <th class="px-4 py-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cuadernos as $item)
                    <tr class="text-center hover:bg-gray-100">
                        <td class="px-4 py-2 border text-black">{{ $item->ing_turno ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->operador ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->tecnico1_id ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->tecnico2_id ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->c_center ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->sin_energia ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->reg ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->fecha ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->hora_i ? \Carbon\Carbon::parse($item->hora_i)->format('H:i:s') : 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->hora_f ? \Carbon\Carbon::parse($item->hora_f)->format('H:i:s') : 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->circuito->CI_CIRCUITO ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->segun ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->informo_a ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border text-black">{{ $item->causa ?? 'Vacío' }}</td>
                        <td class="px-4 py-2 border">
                            <div class="flex justify-center gap-3">
                                <button wire:click.prevent="editar({{$item->id}})" class="">Editar</button>
                                <button wire:click.prevent="delete({{$item->id}})" class="">Deshabilitar</button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center px-4 py-4 text-gray-500">No hay clientes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        @if ($showModal)
            <div class="modal-overlay">
                <div class="modal-content overflow-y-auto max-h-[90vh]">
                    <h2 class="text-center text-2xl font-semibold mb-6">Editar Cuaderno de Partes Rural</h2>
    
                    <div class="container">
                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Fecha:</label>
                                <input type="text" class="form-control" value="{{ now()->format('Y-m-d') }}" readonly>
                            </div>
                            <div class="form-group double-field">
                                <label>Turno:</label>
                                <input wire:model="turno" type="text" class="form-control">
                            </div>
                        </div>
    
                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Ing. Turno:</label>
                                <input wire:model="ing_turno" type="text" class="form-control">
                            </div>
                            <div class="form-group double-field">
                                <label>Operador:</label>
                                <input wire:model="operador" type="text" class="form-control">
                            </div>
                        </div>
    
                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Tec. Turno 1:</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group double-field">
                                <label>Tec. Turno 2:</label>
                                <input wire:model="tecnico2_id" type="text" class="form-control">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label>C. Center:</label>
                            <input wire:model="c_center" type="text" class="form-control">
                        </div>
    
                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Sin Energía:</label>
                                <input wire:model="sin_energia" type="text" class="form-control">
                            </div>
                            <div class="form-group double-field">
                                <label>Reg:</label>
                                <input wire:model="reg" type="text" class="form-control">
                            </div>
                        </div>
    
                        <div class="d-flex gap-3">
                            <div class="form-group">
                                <label>Fecha:</label>
                                <input wire:model="fecha" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hora Inicio:</label>
                                <input wire:model="hora_i" type="time" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hora Fin:</label>
                                <input wire:model="hora_f" type="time" class="form-control">
                            </div>
    
                            {{-- CSS de Select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

{{-- JS de Select2 y jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                            <div wire:ignore class="form-group">
                                <label>COD:</label>
                                <select id="select2Circuito" class="form-control" style="width: 100%">
                                    <option value="">Seleccione un circuito</option>
                                    @foreach($ListCir as $circuito)
                                        <option value="{{ $circuito->CI_SERIAL }}">{{ $circuito->CI_CIRCUITO }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <script>
                                function initSelect2Circuito() {
                                    let $select = $('#select2Circuito');
                            
                                    if ($select.length && !$select.hasClass("select2-hidden-accessible")) {
                                        $select.select2({
                                            placeholder: 'Buscar circuito...',
                                            allowClear: true,
                                            width: '100%' // asegura que el ancho esté bien dentro del modal
                                        });
                            
                                        $select.off('change').on('change', function () {
                                            var value = $(this).val();
                                            @this.set('circuitoId', value);
                                        });
                                    }
                                }
                            
                                document.addEventListener('livewire:load', function () {
                                    Livewire.hook('message.processed', () => {
                                        initSelect2Circuito();
                                    });
                                });
                            </script>
                            
                            
                        </div>
    
                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Según:</label>
                                <input wire:model="segun" type="text" class="form-control">
                            </div>
                            <div class="form-group double-field">
                                <label>Se Informó a:</label>
                                <input wire:model="informo_a" type="text" class="form-control">
                            </div>
                        </div>
    
                        <div class="mt-3">
                            <label class="form-label font-semibold">Causa:</label>
                            <textarea wire:model="causa" class="form-control" rows="4"></textarea>
                        </div>
    
                        <div class="text-center mt-4">
                            <button wire:click="actualizar" class="btn btn-primary">Guardar</button>
                            <button wire:click="$set('showModal', false)" class="btn btn-secondary">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    
        <style>
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0,0,0,0.6);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
            }
    
            .modal-content {
                background: white;
                padding: 20px 30px;
                border-radius: 8px;
                width: 90%;
                max-width: 1000px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            }
        </style>
    
        <script>
            document.addEventListener('livewire:load', function () {
                $('#select2Circuito').select2({
                    placeholder: 'Buscar circuito...',
                    allowClear: true,
                    width: 'resolve'
                });
    
                $('#select2Circuito').on('change', function (e) {
                    var value = $(this).val();
                    @this.set('circuitoId', value);
                });
    
                Livewire.hook('message.processed', (message, component) => {
                    $('#select2Circuito').select2({
                        placeholder: 'Buscar circuito...',
                        allowClear: true,
                        width: 'resolve'
                    });
                });
            });
        </script>
    </div>
    
</div>
