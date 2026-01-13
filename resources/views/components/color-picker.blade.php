{{-- Color Picker Component - Gunakan dengan @include('components.color-picker') --}}
{{--
Cara pakai:
@include('components.color-picker', [
'name' => 'gradient',
'label' => 'Gradient Background',
'value' => old('gradient'),
'type' => 'gradient',
'icon' => 'fill-drip',
'iconColor' => 'blue-500'
])
--}}

<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        <i class="fas fa-{{ $icon ?? 'palette' }} text-{{ $iconColor ?? 'orange-500' }} mr-1"></i>
        {{ $label }}
    </label>

    @if($type === 'gradient')
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            {{-- From Color --}}
            <div>
                <label class="text-xs text-gray-600 mb-1 block">From</label>
                <select
                    class="gradient-from w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 text-sm">
                    <option value="">Pilih Warna</option>
                    @foreach(['red', 'orange', 'amber', 'yellow', 'lime', 'green', 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink', 'rose'] as $color)
                        <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- From Shade --}}
            <div>
                <label class="text-xs text-gray-600 mb-1 block">Shade</label>
                <select
                    class="gradient-from-shade w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 text-sm">
                    <option value="">Pilih</option>
                    @foreach(['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'] as $shade)
                        <option value="{{ $shade }}">{{ $shade }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Via Color (Optional) --}}
            <div>
                <label class="text-xs text-gray-600 mb-1 block">Via (Optional)</label>
                <select
                    class="gradient-via w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 text-sm">
                    <option value="">None</option>
                    @foreach(['red', 'orange', 'amber', 'yellow', 'lime', 'green', 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink', 'rose'] as $color)
                        <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Via Shade --}}
            <div>
                <label class="text-xs text-gray-600 mb-1 block">Shade</label>
                <select
                    class="gradient-via-shade w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 text-sm">
                    <option value="">Pilih</option>
                    @foreach(['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'] as $shade)
                        <option value="{{ $shade }}">{{ $shade }}</option>
                    @endforeach
                </select>
            </div>

            {{-- To Color --}}
            <div>
                <label class="text-xs text-gray-600 mb-1 block">To</label>
                <select
                    class="gradient-to w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 text-sm">
                    <option value="">Pilih Warna</option>
                    @foreach(['red', 'orange', 'amber', 'yellow', 'lime', 'green', 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink', 'rose'] as $color)
                        <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- To Shade --}}
            <div>
                <label class="text-xs text-gray-600 mb-1 block">Shade</label>
                <select
                    class="gradient-to-shade w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 text-sm">
                    <option value="">Pilih</option>
                    @foreach(['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'] as $shade)
                        <option value="{{ $shade }}">{{ $shade }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Preview --}}
        <div class="mt-3">
            <div class="gradient-preview h-20 rounded-lg border-2 border-gray-300 bg-gradient-to-r"
                id="gradient-preview-{{ $name }}"></div>
        </div>

        {{-- Hidden Input --}}
        <input type="hidden" name="{{ $name }}" class="gradient-result" value="{{ $value ?? '' }}">

    @elseif($type === 'single')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            {{-- Color --}}
            <div>
                <label class="text-xs text-gray-600 mb-1 block">Warna</label>
                <select
                    class="single-color w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 text-sm">
                    <option value="">Pilih Warna</option>
                    @foreach(['red', 'orange', 'amber', 'yellow', 'lime', 'green', 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'purple', 'fuchsia', 'pink', 'rose', 'gray', 'slate', 'zinc', 'neutral', 'stone'] as $color)
                        <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Shade --}}
            <div>
                <label class="text-xs text-gray-600 mb-1 block">Kecerahan</label>
                <select
                    class="single-shade w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 text-sm">
                    <option value="">Pilih</option>
                    @foreach(['50', '100', '200', '300', '400', '500', '600', '700', '800', '900'] as $shade)
                        <option value="{{ $shade }}">{{ $shade }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Preview --}}
        <div class="mt-3">
            <div class="single-preview h-20 rounded-lg border-2 border-gray-300" id="single-preview-{{ $name }}"></div>
        </div>

        {{-- Hidden Input --}}
        <input type="hidden" name="{{ $name }}" class="single-result" value="{{ $value ?? '' }}">
    @endif

    <p class="text-xs text-gray-500 mt-2">
        <i class="fas fa-info-circle"></i> {{ $helpText ?? 'Pilih kombinasi warna untuk tampilan yang menarik' }}
    </p>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Gradient Handler
            document.querySelectorAll('.gradient-from, .gradient-from-shade, .gradient-via, .gradient-via-shade, .gradient-to, .gradient-to-shade').forEach(select => {
                select.addEventListener('change', function () {
                    const container = this.closest('div').parentElement.parentElement;
                    updateGradient(container);
                });
            });

            // Single Color Handler
            document.querySelectorAll('.single-color, .single-shade').forEach(select => {
                select.addEventListener('change', function () {
                    const container = this.closest('div').parentElement.parentElement;
                    updateSingleColor(container);
                });
            });

            function updateGradient(container) {
                const fromColor = container.querySelector('.gradient-from').value;
                const fromShade = container.querySelector('.gradient-from-shade').value;
                const viaColor = container.querySelector('.gradient-via').value;
                const viaShade = container.querySelector('.gradient-via-shade').value;
                const toColor = container.querySelector('.gradient-to').value;
                const toShade = container.querySelector('.gradient-to-shade').value;

                let gradientClass = '';
                let preview = container.querySelector('.gradient-preview');

                if (fromColor && fromShade) {
                    gradientClass = `from-${fromColor}-${fromShade}`;
                }

                if (viaColor && viaShade) {
                    gradientClass += ` via-${viaColor}-${viaShade}`;
                }

                if (toColor && toShade) {
                    gradientClass += ` to-${toColor}-${toShade}`;
                }

                // Update hidden input
                container.querySelector('.gradient-result').value = gradientClass.trim();

                // Update preview
                if (gradientClass.trim()) {
                    preview.className = `gradient-preview h-20 rounded-lg border-2 border-gray-300 bg-gradient-to-r ${gradientClass}`;
                } else {
                    preview.className = 'gradient-preview h-20 rounded-lg border-2 border-gray-300 bg-gradient-to-r';
                }
            }

            function updateSingleColor(container) {
                const color = container.querySelector('.single-color').value;
                const shade = container.querySelector('.single-shade').value;

                let colorClass = '';
                let preview = container.querySelector('.single-preview');

                if (color && shade) {
                    colorClass = `bg-${color}-${shade}`;
                }

                // Update hidden input
                container.querySelector('.single-result').value = colorClass;

                // Update preview
                if (colorClass) {
                    preview.className = `single-preview h-20 rounded-lg border-2 border-gray-300 ${colorClass}`;
                } else {
                    preview.className = 'single-preview h-20 rounded-lg border-2 border-gray-300';
                }
            }

            // Parse existing values on load
            document.querySelectorAll('.gradient-result').forEach(input => {
                if (input.value) {
                    parseGradient(input.value, input.closest('div').parentElement);
                }
            });

            document.querySelectorAll('.single-result').forEach(input => {
                if (input.value) {
                    parseSingleColor(input.value, input.closest('div').parentElement);
                }
            });

            function parseGradient(value, container) {
                // Parse format: from-pink-200 via-pink-300 to-pink-400
                const parts = value.split(' ');

                parts.forEach(part => {
                    if (part.startsWith('from-')) {
                        const [, color, shade] = part.match(/from-(\w+)-(\d+)/) || [];
                        if (color) container.querySelector('.gradient-from').value = color;
                        if (shade) container.querySelector('.gradient-from-shade').value = shade;
                    } else if (part.startsWith('via-')) {
                        const [, color, shade] = part.match(/via-(\w+)-(\d+)/) || [];
                        if (color) container.querySelector('.gradient-via').value = color;
                        if (shade) container.querySelector('.gradient-via-shade').value = shade;
                    } else if (part.startsWith('to-')) {
                        const [, color, shade] = part.match(/to-(\w+)-(\d+)/) || [];
                        if (color) container.querySelector('.gradient-to').value = color;
                        if (shade) container.querySelector('.gradient-to-shade').value = shade;
                    }
                });

                updateGradient(container);
            }

            function parseSingleColor(value, container) {
                // Parse format: bg-orange-500
                const match = value.match(/bg-(\w+)-(\d+)/);
                if (match) {
                    const [, color, shade] = match;
                    container.querySelector('.single-color').value = color;
                    container.querySelector('.single-shade').value = shade;
                    updateSingleColor(container);
                }
            }
        });
    </script>
@endpush