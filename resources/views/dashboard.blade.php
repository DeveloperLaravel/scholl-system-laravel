<x-app-layout>
    <!-- عنوان لوحة التحكم -->
    <h1 class="text-4xl font-extrabold mb-10 text-red-600 dark:text-yellow-400 text-center">لوحة التحكم</h1>

    <!-- البطاقات الرئيسية -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">

        <x-dashboard-card 
            title="المحطات" 
            :count="\App\Models\Station::count()" 
            description="عدد المحطات المسجلة"
            colorFrom="red-400" 
            colorVia="yellow-200" 
            colorTo="red-300"
        />

        <x-dashboard-card 
            title="الموظفون" 
            :count="\App\Models\User::where('role','employee')->count()" 
            description="عدد الموظفين النشطين"
            colorFrom="blue-400" 
            colorVia="indigo-300" 
            colorTo="blue-500"
        />

        <x-dashboard-card 
            title="متبقي يوم واحد" 
            :count="\App\Models\FuelFill::whereDate('filled_at', now()->addDay()->toDateString())->count()" 
            description="عدد الأشخاص المتبقي لهم يوم لإعادة التعبئة"
            colorFrom="green-400" 
            colorVia="lime-300" 
            colorTo="green-500"
        />

        <x-dashboard-card 
            title="معلومات النظام"
            colorFrom="purple-400" 
            colorVia="pink-300" 
            colorTo="purple-500"
        >
            <p class="mt-4 text-white/90 text-sm leading-relaxed">
                <span class="font-bold">{{ \App\Models\User::count() }}</span> مستخدم<br>
                <span class="font-bold">{{ \App\Models\Vehicle::count() }}</span> سيارة<br>
                آخر تعبئة: {{ \App\Models\FuelFill::latest('created_at')->first()?->created_at->format('d/m/Y') ?? 'لا توجد' }}
            </p>
        </x-dashboard-card>

    </div>

    <!-- قسم الترحيب -->
    <div class="mt-16 p-10 bg-white dark:bg-gray-900 rounded-2xl shadow-2xl max-w-5xl mx-auto text-center">
        <h2 class="text-2xl font-bold mb-4 text-red-600 dark:text-yellow-400">مرحبًا بك في منظومة تعبئة الوقود!</h2>
        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
            هذا النظام يوفر لك معلومات دقيقة حول المحطات، الموظفين، والمستخدمين الذين يحتاجون إلى إعادة تعبئة الوقود قريبًا.
            كل البيانات محدثة تلقائيًا، ويمكنك متابعة كل العمليات من لوحة التحكم بسهولة.
        </p>
    </div>
</x-app-layout>
