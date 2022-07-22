<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::where('email','info@bvpss.com')->first();
    	if (is_null($setting)) {
    		$setting = new Setting();
            $setting->name    = "BVPSS";
	        $setting->slogan  = "Enhancing Life, Excelling Incase...";
            $setting->contact = "+880 ";
            $setting->email   = "info@bvpss.com";
            $setting->address = "Khulna";
	        $setting->registration_no = "9697";
            $setting->website = "www.bvpss.com";
	        $setting->save();
    	}
    }
}
