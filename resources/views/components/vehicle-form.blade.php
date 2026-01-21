<div class="min-h-screen w-full flex items-center justify-center
            bg-gradient-to-br from-red-100 via-yellow-50 to-red-200
            dark:from-gray-900 dark:to-gray-800 px-4 py-10">

    <div class="w-full max-w-2xl bg-white dark:bg-gray-900
                rounded-3xl shadow-2xl p-8">

        <h2 class="text-3xl font-extrabold mb-8 text-center
                   text-red-600 dark:text-yellow-400">
            ➕ {{ $vehicle ? 'تعديل' : 'إضافة' }} سيارة
        </h2>

        <form id="vehicleForm"
              method="POST"
              action="{{ $vehicle ? route('vehicles.update',$vehicle) : route('vehicles.store') }}"
              class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @if($vehicle) @method('PUT') @endif

            {{-- input component --}}
            @php
                $input = fn($name) => '
                    w-full rounded-xl p-3 transition
                    dark:bg-gray-800 dark:text-white
                    border border-gray-300 dark:border-gray-700
                    focus:border-yellow-400
                ';
            @endphp

            {{-- رقم اللوحة --}}
            <div>
                <label class="label">رقم اللوحة</label>
                <input name="plate_number"
                       value="{{ old('plate_number', $vehicle->plate_number ?? '') }}"
                       class="{{ $input('plate_number') }}">
                <p class="error-msg hidden">رقم اللوحة مطلوب</p>
            </div>

            {{-- رقم الهيكل --}}
            <div>
                <label class="label">رقم الهيكل</label>
                <input name="chassis_number"
                       value="{{ old('chassis_number', $vehicle->chassis_number ?? '') }}"
                       class="{{ $input('chassis_number') }}">
                <p class="error-msg hidden">رقم الهيكل مطلوب</p>
            </div>

            {{-- اسم المالك --}}
            <div>
                <label class="label">اسم المالك</label>
                <input name="owner_name"
                       value="{{ old('owner_name', $vehicle->owner_name ?? '') }}"
                       class="{{ $input('owner_name') }}">
                <p class="error-msg hidden">اسم المالك مطلوب</p>
            </div>

            {{-- جنسية --}}
            <div>
                <label class="label">جنسية المالك</label>
                <input name="owner_nationality"
                       value="{{ old('owner_nationality', $vehicle->owner_nationality ?? '') }}"
                       class="{{ $input('owner_nationality') }}">
            </div>

            {{-- المحطة --}}
            <div class="md:col-span-2">
                <label class="label">المحطة</label>
                <select name="station_id" class="{{ $input('station_id') }}">
                    <option value="">— كل محطات —</option>
                    @foreach($stations as $station)
                        <option value="{{ $station->id }}"
                            @selected(old('station_id', $vehicle->station_id ?? '') == $station->id)>
                            {{ $station->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- زر --}}
            <div class="md:col-span-2 mt-4">
                <button class="w-full py-4 bg-gradient-to-r
                               from-red-500 to-yellow-400
                               text-white font-bold text-lg
                               rounded-2xl shadow-lg hover:scale-105 transition">
                    💾 حفظ البيانات
                </button>
            </div>

        </form>
    </div>
</div>

{{-- styles --}}
<style>
.label{font-weight:600;margin-bottom:.5rem}
.error-msg{color:#ef4444;font-size:.875rem;margin-top:.25rem}
.input-error{border:2px solid #ef4444}
</style>

{{-- JS --}}
<script>
document.getElementById('vehicleForm').addEventListener('submit', e => {
    let ok = true;
    e.target.querySelectorAll('input,select').forEach(el => {
        el.classList.remove('input-error');
        const msg = el.nextElementSibling;
        if(msg?.classList.contains('error-msg')) msg.classList.add('hidden');

        if(el.name !== 'owner_nationality' && el.value.trim()===''){
            ok = false;
            el.classList.add('input-error');
            if(msg) msg.classList.remove('hidden');
        }
    });
    if(!ok) e.preventDefault();
});
</script>
