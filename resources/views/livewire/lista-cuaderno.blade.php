<div>
    <h2 class="text-center text-2xl font-bold mb-8 relative text-yellow-500">
        <span class="italic text-gray-900">CUADERNOS DE PARTES URBANO</span>
    </h2>
    <div class="d-flex gap-3 mb-4 align-items-center">
        <div class="form-group d-flex align-items-center gap-2">
            <label for="fecha_inicio" class="mb-0">Desde:</label>
            <input type="date" id="fecha_inicio" class="form-control" wire:model="fecha_inicio">
        </div>
        <div class="form-group d-flex align-items-center gap-2">
            <label for="fecha_fin" class="mb-0">Hasta:</label>
            <input type="date" id="fecha_fin" class="form-control" wire:model="fecha_fin">
        </div>

        <button wire:click="filtrar" class="btn btn-sm btn-outline-primary"><i class="fas fa-search"></i> Filtrar</button>
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle text-center shadow-sm">
            <thead class="table-danger text-white">
                <tr>
                    <th>Ing. Turno</th>
                    <th>Operador</th>
                    <th>Técnico 1</th>
                    <th>Técnico 2</th>
                    <th>Centro</th>
                    <th>Sin Energía</th>
                    <th>Reg</th>
                    <th>Fecha</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Circuito</th>
                    <th>Según</th>
                    <th>Informó A</th>
                    <th>Causa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cuadernos as $item)
                    <tr>
                        <td>{{ $item->ing_turno ?? 'Vacío' }}</td>
                        <td>{{ $item->operador ?? 'Vacío' }}</td>
                        <td>{{ $item->tecnico1->TE_NOMBRE ?? 'Vacío' }}</td>
                        <td>{{ $item->tecnico2->TE_NOMBRE ?? 'Vacío' }}</td>
                        <td>{{ $item->c_center ?? 'Vacío' }}</td>
                        <td>{{ $item->sin_energia ?? 'Vacío' }}</td>
                        <td>{{ $item->reg ?? 'Vacío' }}</td>
                        <td>{{ $item->fecha ?? 'Vacío' }}</td>
                        <td>{{ $item->hora_i ? \Carbon\Carbon::parse($item->hora_i)->format('H:i:s') : 'Vacío' }}</td>
                        <td>{{ $item->hora_f ? \Carbon\Carbon::parse($item->hora_f)->format('H:i:s') : 'Vacío' }}</td>
                        <td>{{ $item->circuito->CI_CIRCUITO ?? 'Vacío' }}</td>
                        <td>{{ $item->segun ?? 'Vacío' }}</td>
                        <td>{{ $item->informo_a ?? 'Vacío' }}</td>
                        <td>{{ $item->causa ?? 'Vacío' }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Botón Editar -->
                                <button wire:click.prevent="editar({{ $item->id }})" class="btn btn-sm btn-outline-primary" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                        
                                <!-- Botón Eliminar -->
                                <button wire:click.prevent="delete({{ $item->id }})" class="btn btn-sm btn-outline-danger" title="Deshabilitar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="15" class="text-center text-muted py-3">No hay registros disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    

    <div>
        @if ($showModal)
            <div class="modal-overlay">
                <div class="modal-content overflow-y-auto max-h-[80vh]">
                    <h2 class="text-center text-2xl font-semibold mb-6">Editar Cuaderno de Partes Rural</h2>

                    <div class="container">
                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Fecha:</label>
                                <input type="text" class="form-control" value="{{ now()->format('Y-m-d') }}" readonly style="border-color: #343a40;">
                            </div>
                            <div class="form-group double-field">
                                <label>Turno:</label>
                                <input wire:model="turno" type="text" class="form-control" style="border-color: #343a40;">
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Ing. Turno:</label>
                                <input wire:model="ing_turno" type="text" class="form-control" style="border-color: #343a40;">
                            </div>
                            <div class="form-group double-field">
                                <label>Operador:</label>
                                <input wire:model="operador" type="text" class="form-control" style="border-color: #343a40;">
                            </div>
                        </div>


                        

                        <div class="d-flex gap-3">
                            {{-- Tecnico 1: --}}
                            <div class="form-group double-field">
                                <label>Tec. Turno 1:</label>
                                <select id="select2Tec1" class="form-control" style="width: 100%; border-color: #343a40;" wire:model="tecnico1_id">
                                    <option value="">Seleccione Tecnico 1</option>
                                    @foreach($ListTecnico as $tecnico1)
                                        <option value="{{ $tecnico1->TE_ID }}" {{ $tecnico1->TE_ID == $tecnico1_id ? 'selected' : '' }}>
                                            {{ $tecnico1->TE_NOMBRE }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            {{-- Tecnico 2: --}}
                            <div class="form-group double-field">
                                <label>Tec. Turno 2:</label>
                                <select id="select2Tec2" class="form-control" style="width: 100%; border-color: #343a40;" wire:model="tecnico2_id">
                                    <option value="">Seleccione Tecnico 2</option>
                                    @foreach($ListTecnico as $tecnico2)
                                        <option value="{{ $tecnico2->TE_ID }}" {{ $tecnico2->TE_ID == $tecnico2_id ? 'selected' : '' }}>
                                            {{ $tecnico2->TE_NOMBRE }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>C. Center:</label>
                            <input wire:model="c_center" type="text" class="form-control" style="border-color: #343a40;">
                        </div>

                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Sin Energía:</label>
                                <input wire:model="sin_energia" type="text" class="form-control" style="border-color: #343a40;">
                            </div>
                            <div class="form-group double-field">
                                <label>Reg:</label>
                                <input wire:model="reg" type="text" class="form-control" style="border-color: #343a40;">
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="form-group">
                                <label>Fecha:</label>
                                <input wire:model="fecha" type="date" class="form-control" style="border-color: #343a40;">
                            </div>
                            <div class="form-group">
                                <label>Hora Inicio:</label>
                                <input wire:model="hora_i" type="time" class="form-control" style="border-color: #343a40;">
                            </div>
                            <div class="form-group">
                                <label>Hora Fin:</label>
                                <input wire:model="hora_f" type="time" class="form-control" style="border-color: #343a40;">
                            </div>

                            <div class="form-group">
                                <label>COD:</label>
                                <select class="form-control" wire:model="circuitoId" style="width: 100%; border-color: #343a40;">
                                    <option value="">Seleccione un circuito</option>
                                    @foreach($ListCir as $circuito)
                                        <option value="{{ $circuito->CI_SERIAL }}">{{ $circuito->CI_CIRCUITO }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                        </div>

                        <div class="d-flex gap-3">
                            <div class="form-group double-field">
                                <label>Según:</label>
                                <input wire:model="segun" type="text" class="form-control" style="border-color: #343a40;">
                            </div>
                            <div class="form-group double-field">
                                <label>Se Informó a:</label>
                                <input wire:model="informo_a" type="text" class="form-control" style="border-color: #343a40;">
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="form-label font-semibold">Causa:</label>
                            <textarea wire:model="causa" class="form-control" style="border-color: #343a40;" rows="4"></textarea>
                        </div>

                        <div class="text-center mt-4">
                            <button wire:click="actualizar" class="btn btn-primary">Guardar</button>
                            <button wire:click="closeModal" class="btn btn-secondary">Cancelar</button>
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
                max-height: 80vh;
                box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            }
        </style>

        
    </div>
    
</div>
