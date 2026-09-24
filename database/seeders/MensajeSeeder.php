<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Illuminate\Database\Seeder;

class MensajeSeeder extends Seeder
{
    public function run(): void
    {
        $mensajes = [
            'Tendrás un día de alegrías y buenos momentos, disfrútalos como nunca.',
            'Concéntrate en lo que quieres lograr y ganarás. No lo olvides.',
            'El cielo será tu límite, pues grandes acontecimientos te sucederán.',
            'Te sentirás feliz como un niño y verás al mundo con sus ojos.',
            'Vivirás tu vejez con comodidades y riquezas materiales.',
            'Confía en tu suerte, que es mucha y te rodeará de prosperidad.',
            'No todo el mundo puede recibir las mismas cosas. Sé práctico.',
            'Te aguarda una larga y feliz vida.',
            'Hoy es el momento de explorar: no temas.',
            'Muy pronto serás incluido en muchas reuniones, fiestas y tertulias.',
            'Cuando busques lo que más deseas, recuerda hacer tu mejor esfuerzo.',
            'Tienes por delante un maravilloso día para triunfar; disfrútalo y compártelo.',
            'Hoy serás reconocido por tus dones especiales y lograrás ser feliz por muchas horas.',
            'Tu corazón estallará de alegría con la llegada de buenas noticias.',
            'Mañana puede ser muy tarde para disfrutar lo que tienes hoy.',
            'Serás promovido en tu trabajo debido a tus logros y capacidades.',
        ];

        foreach ($mensajes as $texto) {
            Mensaje::create(['mensaje' => $texto]);
        }
    }
}
