<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\LanguageCode;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Language
        Language::create([
            'name' => 'English',
            'code' => 'en',
            'is_rtl' => false,
            'active' => true,
        ]);
        Language::create([
            'name' => 'Arabic',
            'code' => 'ar',
            'is_rtl' => true,
            'active' => true,
        ]);
        // Language Code
        // Welcome Page
        LanguageCode::create([
            'code' => 'welcome',
            'value' => '{"en": "Welcome","ar": "اهلا وسهلا"}'
        ]);
        // Login Page
        LanguageCode::create([
            'code' => 'login',
            'value' => '{"en": "Login","ar": "تسجيل دخول"}'
        ]);
        LanguageCode::create([
            'code' => 'login.title',
            'value' => '{"en":"Welcome Back","ar":"مرحبًا بعودتك"}'
        ]);
        LanguageCode::create([
            'code' => 'login.subtitle',
            'value' => '{"en":"Please sign in to continue","ar":"الرجاء تسجيل الدخول للمتابعة"}'
        ]);
        LanguageCode::create([
            'code' => 'login.remember',
            'value' => '{"en":"Remember me","ar":"تذكرني"}'
        ]);
        LanguageCode::create([
            'code' => 'login.register',
            'value' => '{"en":"Don\'t have Account?","ar":"ليس لديك حساب؟"}'
        ]);
        LanguageCode::create([
            'code' => 'login.create',
            'value' => '{"en":" Create account","ar":"انشئ حساب "}'
        ]);
        LanguageCode::create([
            'code' => 'login.signin',
            'value' => '{"en":"Sign In","ar":"تسجيل الدخول"}'
        ]);
        LanguageCode::create([
            'code' => 'login.forgot',
            'value' => '{"en":"Forgot Password?","ar":"هل نسيت كلمة السر؟"}'
        ]);
        LanguageCode::create([
            'code' => 'login.or',
            'value' => '{"en":"OR","ar":"أو"}'
        ]);
        LanguageCode::create([
            'code' => 'login.email',
            'value' => '{"en":"Username or email","ar":"اسم المستخدم أو البريد الالكتروني"}'
        ]);
        LanguageCode::create([
            'code' => 'login.password',
            'value' => '{"en":"Password","ar":"كلمة المرور"}'
        ]);
        LanguageCode::create([
            'code' => 'login.privacy',
            'value' => '{"en":"Privacy Policy","ar":"سياسة الخصوصية"}'
        ]);
        LanguageCode::create([
            'code' => 'login.term',
            'value' => '{"en":"Term and Condition","ar":"الشروط والاحكام"}'
        ]);
        LanguageCode::create([
            'code' => 'login.auth.failed',
            'value' => '{"en":"These credentials do not match our records.","ar":"بيانات الاعتماد هذه لا تطابق سجلاتنا."}'
        ]);
        /// Dasboard
        LanguageCode::create([
            'code' => 'profile.logout',
            'value' => '{"en":"Logout","ar":"تسجيل خروج"}'
        ]);
        LanguageCode::create([
            'code' => 'profile.profile.title',
            'value' => '{"en":"Profile","ar":"الملف الشخصي"}'
        ]);
        LanguageCode::create([
            'code' => 'profile.profile.subtitle',
            'value' => '{"en":"Your profile setting","ar":"إعدادات ملفك الشخصي"}'
        ]);

        LanguageCode::create([
            'code' => 'profile.subscription.title',
            'value' => '{"en":"Subscriptions","ar":"الاشتراكات"}'
        ]);
        LanguageCode::create([
            'code' => 'profile.subscription.subtitle',
            'value' => '{"en":"Your Subscriptions","ar":"إدارة اشتراكاتك"}'
        ]);
        LanguageCode::create([
            'code' => 'profile.ticket.title',
            'value' => '{"en":"Tickets","ar":"تذاكر"}'
        ]);
        LanguageCode::create([
            'code' => 'profile.ticket.subtitle',
            'value' => '{"en":"Your Tickets","ar":"التذاكر الخاصة بك"}'
        ]);
        /*LanguageCode::create([
            'code' => '',
            'value' => '{"en":"","ar":""}'
        ]);
        LanguageCode::create([
            'code' => '',
            'value' => '{"en":"","ar":""}'
        ]);*/
    }
}
