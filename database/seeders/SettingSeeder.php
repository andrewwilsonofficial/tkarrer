<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'our_message',
                'value' => 'يوفّر موقع تقارير قاعدة بيانات للتقارير والدراسات والأدلة المعرفية المنشورة والمعدة لغرض التداول، والتي تصدرها الجهات الحكومية أو الشركات أو القطاع الثالث.
                يعاني الباحثين والمهتمين من صعوبة في الوصول السريع والسهل إلى هذه الإصدارات لتفرقها في مواقع إلكترونية ومنصات تواصل مختلفة ومتعددة، أو لتعطل روابط الوصول إلى هذه الإصدارات مع مرور الوقت.
                يسعى موقع تقارير إلى تقديم تجربة مستخدم سريعة وسهلة للوصول إلى هذه الإصدارات المتداولة، مع بيان اسم الجهة المصدرة ورابط الوصول لها، مع إمكانية الاطلاع والتحميل',
            ],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::create($setting);
        }
    }
}
