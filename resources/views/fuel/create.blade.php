 <x-app-layout>
    <x-fuel-layout>
        <x-fuel-header />
 

        <x-fuel-error />
<x-fuel-form :action="route('fuel.fill.store')" />
        <x-fuel-scanner />
    </x-fuel-layout>
</x-app-layout>
