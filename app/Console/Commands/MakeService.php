<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use File;

class MakeService extends Command
{
    protected $signature = 'make:service {name : اسم الService}';
    protected $description = 'إنشاء Service جديد داخل app/Services';

    public function handle()
    {
        $name = $this->argument('name');
        $className = Str::studly($name);
        $folder = app_path('Services');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $filePath = $folder.'/'.$className.'.php';

        if (File::exists($filePath)) {
            $this->error("Service $className موجود بالفعل!");
            return 1;
        }

        $template = "<?php

namespace App\Services;

class $className
{
    //
}
";

        File::put($filePath, $template);
        $this->info("✅ Service $className تم إنشاؤه بنجاح في $filePath");
        return 0;
    }
}
