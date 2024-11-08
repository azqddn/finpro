<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
               'companyName'=>'Pasar Mini Afkar Sdn Bhd',
               'companyAddress'=>'No.16, Jalan 6 Taipan 2, 70450, Senawang, Negeri Sembilan',
               'companyPhone'=>'06 111 2222',
               'companyEmail'=> 'nidya.trading@gmail.com',
               'companySsm'=> 'asdasdsadas.pdf',
               'companyType'=>'sendiri',
               'companyLogo'=>'asadd.png',
               'ssmCert'=>'asda.pdf',
               'registrationNo'=>'sasa1221',
            ],
        ];
    
        foreach ($companies as $key => $companies) {
            Company::create($companies);
        }
    }
}
