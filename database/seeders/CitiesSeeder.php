<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cities = [
            [
                "rank" => 1,
                "name" => "Amman",
                "arabic_name" => "عمان",

                "governorate" => "Amman"
            ],
            [
                "rank" => 2,
                "name" => "Zarqa",
                "arabic_name" => "الزرقاء",

                "governorate" => "Zarqa"
            ],
            [
                "rank" => 3,
                "name" => "Irbid",
                "arabic_name" => "إربد",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 4,
                "name" => "Russeifa",
                "arabic_name" => "الرصيفة",

                "governorate" => "Zarqa"
            ],
            [
                "rank" => 5,
                "name" => "Sahab",
                "arabic_name" => "سحاب",

                "governorate" => "Amman"
            ],
            [
                "rank" => 6,
                "name" => "Ar Ramtha",
                "arabic_name" => "الرمثا",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 7,
                "name" => "Aqaba",
                "arabic_name" => "العقبة",

                "governorate" => "Aqaba"
            ],
            [
                "rank" => 8,
                "name" => "Mafraq",
                "arabic_name" => "المفرق",

                "governorate" => "Mafraq"
            ],
            [
                "rank" => 9,
                "name" => "Madaba",
                "arabic_name" => "مأدبا",

                "governorate" => "Madaba"
            ],
            [
                "rank" => 10,
                "name" => "As-Salt",
                "arabic_name" => "السلط",

                "governorate" => "al-Balqa"
            ],
            [
                "rank" => 11,
                "name" => "Al-Jizah",
                "arabic_name" => "الجيزة",

                "governorate" => "Amman"
            ],
            [
                "rank" => 12,
                "name" => "Ain Al-Basha",
                "arabic_name" => "عين الباشا",

                "governorate" => "al-Balqa"
            ],
            [
                "rank" => 13,
                "name" => "Aydoun",
                "arabic_name" => "ايدون",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 14,
                "name" => "Ad-Dhlail",
                "arabic_name" => "الضليل",

                "governorate" => "Zarqa"
            ],
            [
                "rank" => 15,
                "name" => "Jerash",
                "arabic_name" => "جرش",

                "governorate" => "Jerash"
            ],
            [
                "rank" => 16,
                "name" => "As-Sarih",
                "arabic_name" => "الصريح",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 17,
                "name" => "Al-Hashimiyah",
                "arabic_name" => "الهاشمية",

                "governorate" => "Zarqa"
            ],
            [
                "rank" => 18,
                "name" => "Ma'an",
                "arabic_name" => "معان",

                "governorate" => "Ma'an"
            ],
            [
                "rank" => 19,
                "name" => "Beit Ras",
                "arabic_name" => "بيت راس",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 20,
                "name" => "Al Husn",
                "arabic_name" => "الحصن",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 21,
                "name" => "At-Turrah",
                "arabic_name" => "الطرة",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 22,
                "name" => "Naour",
                "arabic_name" => "ناعور",

                "governorate" => "Amman"
            ],
            [
                "rank" => 23,
                "name" => "Karak",
                "arabic_name" => "الكرك",

                "governorate" => "Karak"
            ],
            [
                "rank" => 24,
                "name" => "Kufranjah",
                "arabic_name" => "كفرنجة",

                "governorate" => "Ajloun"
            ],
            [
                "rank" => 25,
                "name" => "Der Abi Saeed",
                "arabic_name" => "دير ابي سعيد",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 26,
                "name" => "No'ayymeh",
                "arabic_name" => "النعيمة",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 27,
                "name" => "Ash-Shajarah",
                "arabic_name" => "الشجرة",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 28,
                "name" => "Tafilah",
                "arabic_name" => "الطفيلة",

                "governorate" => "Tafilah"
            ],
            [
                "rank" => 29,
                "name" => "Mu'tah",
                "arabic_name" => "مؤتة",

                "governorate" => "Karak"
            ],
            [
                "rank" => 30,
                "name" => "Ghor es-Safi",
                "arabic_name" => "غور الصافي",

                "governorate" => "Karak"
            ],
            [
                "rank" => 31,
                "name" => "Anjara",
                "arabic_name" => "عنجرة",

                "governorate" => "Ajloun"
            ],
            [
                "rank" => 32,
                "name" => "Al Mashar'e",
                "arabic_name" => "المشارع",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 33,
                "name" => "Huwwarah",
                "arabic_name" => "حواره",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 34,
                "name" => "Kafr Yubah",
                "arabic_name" => "كفر يوبا",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 35,
                "name" => "Kuraymeh",
                "arabic_name" => "كريمة",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 36,
                "name" => "At-Taybeh",
                "arabic_name" => "الطيبة",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 37,
                "name" => "Al-Mazar Ash-Shamali",
                "arabic_name" => "المزار الشمالي",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 38,
                "name" => "As-Sukhneh",
                "arabic_name" => "السخنة",

                "governorate" => "Zarqa"
            ],
            [
                "rank" => 39,
                "name" => "Al-Khalidiyah Al-Jadeedah",
                "arabic_name" => "الخالدية الجديدة",

                "governorate" => "Mafraq"
            ],
            [
                "rank" => 40,
                "name" => "Bushra",
                "arabic_name" => "بشرى",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 41,
                "name" => "Um Al-Sumaq Al-Janoubi",
                "arabic_name" => "ام السماق الجنوبي",

                "governorate" => "Amman"
            ],
            [
                "rank" => 42,
                "name" => "Judayteh",
                "arabic_name" => "جديتا",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 43,
                "name" => "Fuheis",
                "arabic_name" => "الفحيص",

                "governorate" => "Balqa"
            ],
            [
                "rank" => 44,
                "name" => "Al-Mazar Al-Janoubi",
                "arabic_name" => "المزار الجنوبي",

                "governorate" => "Karak"
            ],
            [
                "rank" => 45,
                "name" => "Shuna Ash-Shamaliyeh",
                "arabic_name" => "شونة الشمالية",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 46,
                "name" => "Kafr Al-Ma’",
                "arabic_name" => "كفر الماء",

                "governorate" => "Irbid"
            ],
            [
                "rank" => 47,
                "name" => "Mahis",
                "arabic_name" => "ماحص",

                "governorate" => "Balqa"
            ]
        ];

        for ($i = 0; $i < sizeof($cities); $i++) {
            City::create($cities[$i]);
        }
    }
}
