<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   // Users
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        // Meta
        Schema::create('meta', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('user_meta', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('meta_id')->index();
            //Constrant Foreing Key
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');
            $table->foreign('meta_id')->references('id')->on(config('auth.table', 'meta'))->onDelete('cascade');
            $table->json('value');
            $table->timestamps();
            $table->softDeletes();
            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id', 'meta_id']);
        });
        // User Fortify
        Schema::table('users', function (Blueprint $table) {
            $table->text('two_factor_secret')
                ->after('password')
                ->nullable();

            $table->text('two_factor_recovery_codes')
                ->after('two_factor_secret')
                ->nullable();

            if (Fortify::confirmsTwoFactorAuthentication()) {
                $table->timestamp('two_factor_confirmed_at')
                    ->after('two_factor_recovery_codes')
                    ->nullable();
            }
        });
        // Password Resets
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        // Failed Jobs
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
        // Personal Access Tockens
        /* Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });*/
        // Session
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        // Roles
        Schema::create(config('defender.role_table', 'roles'), function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
        // Permissions
        Schema::create(config('defender.permission_table', 'permissions'), function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('readable_name');
            $table->timestamps();
            $table->softDeletes();
        });
        // Role User
        Schema::create(config('defender.role_user_table', 'role_user'), function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger(config('defender.role_key', 'role_id'))->index();

            //Constrant Foreing Key
            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');
            $table->foreign(config('defender.role_key', 'role_id'))->references('id')
                ->on(config('defender.role_table', 'roles'))
                ->onDelete('cascade');


            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id', config('defender.role_key', 'role_id')]);
        });
        //Permision User
        Schema::create(config('defender.permission_user_table', 'permission_user'), function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unsigned()->index();
            $table->unsignedBigInteger(config('defender.permission_key', 'permission_id'))->index();

            //Constrant Foreing Key

            $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('cascade');
            $table->foreign(config('defender.permission_key', 'permission_id'))->references('id')
                ->on(config('defender.permission_table', 'permissions'))
                ->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary(['user_id', config('defender.permission_key', 'permission_id')]);

            $table->tinyInteger('value')->default(-1);
            $table->timestamp('expires')->nullable();
        });
        //Permission Role
        Schema::create(config('defender.permission_role_table', 'permission_role'), function (Blueprint $table) {
            $table->unsignedBigInteger(config('defender.permission_key', 'permission_id'))->index();
            $table->unsignedBigInteger(config('defender.role_key', 'role_id'))->index();

            //Constrant Foreing Key
            $table->foreign(config('defender.permission_key', 'permission_id'))->references('id')
                ->on(config('defender.permission_table', 'permissions'))
                ->onDelete('cascade');
            $table->foreign(config('defender.role_key', 'role_id'))->references('id')
                ->on(config('defender.role_table', 'roles'))
                ->onDelete('cascade');

            //SETTING THE PRIMARY KEYS
            $table->primary([config('defender.role_key', 'role_id'), config('defender.permission_key', 'permission_id')]);

            $table->tinyInteger('value')->default(-1);
            $table->timestamp('expires')->nullable();
        });
        // Languages
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3)->unique();
            $table->string('name', 100)->unique();
            $table->boolean('is_rtl');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
        // Languages Code
        Schema::create('language_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->json('value');
            $table->timestamps();
        });

        // Modules
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->string('name', 50)->unique();
            $table->longText('description');
            $table->string('icon');
            $table->string('version', 12);
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(array_merge([
                'two_factor_secret',
                'two_factor_recovery_codes',
            ], Fortify::confirmsTwoFactorAuthentication() ? [
                'two_factor_confirmed_at',
            ] : []));
        });

        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('personal_access_tokens');
        //Schema::dropIfExists('sessions');
        Schema::drop(config('defender.role_table', 'roles'));
        Schema::drop(config('defender.permission_table', 'permissions'));
        /// Role User
        Schema::table(config('defender.role_user_table', 'role_user'), function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(config('defender.role_user_table', 'role_user') . '_user_id_foreign');
                $table->dropForeign(config('defender.role_user_table', 'role_user') . '_' . config('defender.role_key', 'role_id') . '_foreign');
            }
        });
        Schema::drop(config('defender.role_user_table', 'role_user'));
        /// Permission User
        Schema::table(config('defender.permission_user_table', 'permission_user'), function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(config('defender.permission_user_table', 'permission_user') . '_user_id_foreign');
                $table->dropForeign(config('defender.permission_user_table', 'permission_user') . '_' . config('defender.permission_key', 'permission_id') . '_foreign');
            }
        });

        Schema::drop(config('defender.permission_user_table', 'permission_user'));
        /// Permission Role
        Schema::table(config('defender.permission_role_table', 'permission_role'), function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign(config('defender.permission_role_table', 'permission_role') . '_' . config('defender.permission_key', 'permission_id') . '_foreign');
                $table->dropForeign(config('defender.permission_role_table', 'permission_role') . '_' . config('defender.role_key', 'role_id') . '_foreign');
            }
        });

        Schema::drop(config('defender.permission_role_table', 'permission_role'));


        /// languages
        Schema::dropIfExists('languages');
        Schema::dropIfExists('language_codes');
    }
};
