<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        $jsonData = '[
            {
                "id" : 1,
                "tiltle_services_card": "ضريبة الدخل",
                "bode_services_card": "خدمة الإستعلام عن ضريبة الدخل لدى الموطن من خلال منظومتنا المعتمدة من الضرائب المصرية",
                "routeService": /,
                "status": false

            },
            {
                "id" : 2,
                "tiltle_services_card": "المرتبات و الاجور",
                "bode_services_card": "خدمة الإستعلام عنالمرتبات و الأجور لدى الموطن من خلال منظومتنا المعتمدة من الضرائب المصرية",
                "routeService": /salaries,
                "status": true
            },
            {
                "id" : 3,
                "tiltle_services_card": "القيمة المضافة",
                "bode_services_card": "خدمة الإستعلام عن القيمة المضافة من خلال منظومتنا المعتمدة من الضرائب المصرية",
                "routeService": "/",
                "status": false
            },
            {
                "id" : 4,
                "tiltle_services_card": "خصم و تحصيل",
                "bode_services_card": "خدمة الإستعلام عن خصم و تحصيل تحت حساب الضريبة من خلال منظومتنا المعتمدة من الضرائب المصرية",
                "routeService": "/",
                "status": false
            },
            {
                "id" : 5,
                "tiltle_services_card": "إلتزام الممول بسداد الإقرار الضريبى",
                "bode_services_card": "خدمة الإستعلام عن إلتزام العميل من خلال منظومتنا المعتمدة من الضرائب المصرية",
                "routeService": "/",
                "status": false
            },
            {
                "id" : 6,
                "tiltle_services_card": "وقف نشاط اللممول",
                "bode_services_card": "خدمة الإستعلام عن وقف نشاط اللممول من خلال منظومتنا المعتمدة من الضرائب المصرية",
                "routeService": "/",
                "status": false
            },
            {
                "id" : 7,
                "tiltle_services_card": "وقف التعامل مع الممول",
                "bode_services_card": "خدمة الإستعلام عن ضوقف التعامل مع الممول في مصلحة الضرائب المصرية من خلال منظومتنا المعتمدة من الضرائب المصرية",
                "routeService": "/",
                "status": false
            },
            {
                "id" : 8,
                "tiltle_services_card": "صلاحية البطاقة الضريبية",
                "bode_services_card": "خدمة الإستعلام عن صلاحية البطاقة الضريبية من خلال منظومتنا المعتمدة من الضرائب المصرية",
                "routeService": "/",
                "status": false
            }
        ]';

        $services = json_decode($jsonData, true);

        foreach ($services as $serviceData) {
            Service::create([
                'name' => $serviceData['tiltle_services_card'],
                'description' => $serviceData['bode_services_card'],
                'status' =>  $serviceData['status'],
            ]);
        }
    }
}
