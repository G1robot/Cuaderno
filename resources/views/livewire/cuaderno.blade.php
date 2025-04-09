<div>
    <style>
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-group label {
            min-width: 120px;
            margin-right: 10px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            flex: 1;
        }
        .double-field {
            flex: 1;
        }
    </style>
    <h1 style="color: black"> Bienvenido {{ Auth::user()->name }}</h1>
    <div class="container mt-4 p-4 border rounded shadow-sm bg-light">
        <h2 class="text-center mb-4">CUADERNO DE PARTES RURAL</h2>
            <div class="d-flex gap-3">
                <div class="form-group double-field">
                    <label>Fecha:</label>
                    <input style="border-color: #343a40;" type="text" class="form-control" value="{{ now()->format('Y-m-d') }}" readonly>
                </div>
                <div class="form-group double-field">
                    <label>Turno:</label>
                    <input style="border-color: #343a40;" type="text" class="form-control" name="turno" style="border-color: #343a40;">
                </div>
            </div>
            <div class="d-flex gap-3">
                <div class="form-group double-field">
                    <label>Ing. Turno:</label>
                    <input wire:model="ing_turno" style="border-color: #343a40;" type="text" class="form-control" name="ing_turno" style="border-color: #343a40;">
                </div>
                <div class="form-group double-field">
                    <label>Operador:</label>
                    <input wire:model="operador"  style="border-color: #343a40;" type="text" class="form-control" name="operador" style="border-color: #343a40;">
                </div>
            </div>
            <div class="d-flex gap-3">
                <div class="form-group double-field">
                    <label>Tec. Turno 1:</label>
                    <input  style="border-color: #343a40;" type="text" class="form-control" name="tec_turno_1" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group double-field">
                    <label>Tec. Turno 2:</label>
                    <input wire:model="tecnico2_id"  style="border-color: #343a40;" type="text" class="form-control" name="tec_turno_2">
                </div>
            </div>
            <div class="form-group">
                <label>C. Center:</label>
                <input wire:model="c_center"  style="border-color: #343a40;" type="text" class="form-control" name="c_center">
            </div>

            <div class="d-flex gap-3">
                <div class="form-group double-field">
                    <label>Sin Energía:</label>
                    <input wire:model="sin_energia"  style="border-color: #343a40;" type="text" class="form-control" name="sin_energia">
                </div>
                <div class="form-group double-field">
                    <label>Reg:</label>
                    <input wire:model="reg"  style="border-color: #343a40;" type="text" class="form-control" name="reg">
                </div>
            </div>

            <div class="d-flex gap-3">
                <div class="form-group">
                    <label>Fecha:</label>
                    <input wire:model="fecha"  style="border-color: #343a40;" type="date" class="form-control" name="fecha">
                </div>
                <div class="form-group">
                    <label>Hora Inicio:</label>
                    <input wire:model="hora_i"  style="border-color: #343a40;" type="time" class="form-control" name="hora_i">
                </div>
                <div class="form-group">
                    <label>Hora Fin:</label>
                    <input wire:model="hora_f"  style="border-color: #343a40;" type="time" class="form-control" name="hora_f">
                </div>

                
                {{-- otro --}}
                {{-- CSS de Select2 --}}
                
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
                    $(document).ready(function () {
                        $('#select2Circuito').select2({
                            placeholder: 'Buscar circuito...',
                            allowClear: true,
                        });
                
                        // Escuchar cambios y actualizar propiedad Livewire
                        $('#select2Circuito').on('change', function (e) {
                            var value = $(this).val();
                            @this.set('circuitoId', value);
                        });
                    });
                
                    // Para reinicializar cuando Livewire renderice de nuevo
                    document.addEventListener('livewire:load', function () {
                        Livewire.hook('message.processed', (message, component) => {
                            $('#select2Circuito').select2({
                                placeholder: 'Buscar circuito...',
                                allowClear: true,
                            });
                        });
                    });
                </script>
             
            </div>

            <div class="d-flex gap-3">
                <div class="form-group double-field">
                    <label>Según:</label>
                    <input wire:model="segun" style="border-color: #343a40;" type="text" class="form-control" name="segun">
                </div>
                <div class="form-group double-field">
                    <label>Se Informó a:</label>
                    <input wire:model="informo_a" style="border-color: #343a40;" type="text" class="form-control" name="se_informo_a">
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label" style="font-weight: bold;">Causa:</label>
                <textarea wire:model="causa" style="border-color: #343a40;" class="form-control" name="causa" rows="4"></textarea>
            </div>

            <div class="text-center mt-4">
                <button wire:click="guardar" class="btn btn-primary">Guardar</button>
            </div>
    </div>
</div>
