<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rol', 20)->default('usuario')->after('usuario');
        });

        // Migramos automáticamente a los usuarios que ya figuraban como
        // admins en config/galleta.php, para no perder esa configuración.
        $admins = config('galleta.admins', []);

        if (! empty($admins)) {
            DB::table('users')
                ->whereIn('usuario', $admins)
                ->update(['rol' => 'administrador']);
        }
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol');
        });
    }
};
