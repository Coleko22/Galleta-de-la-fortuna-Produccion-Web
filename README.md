# 🥠 Galleta de la Fortuna

App web en **Laravel** donde cada usuario abre galletas de la fortuna, recibe un mensaje aleatorio y guarda su historial. Tiene un panel de administración con gestión de mensajes, usuarios, estadísticas y auditoría. Proyecto final de **Producción Web**.

![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?logo=mysql&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind-4-06B6D4?logo=tailwindcss&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?logo=vite&logoColor=white)

### 🔗 [Ver demo en vivo](https://TU-APP.onrender.com)

> **Usuario de prueba:** `colo` · **Contraseña:** `1234`
>
> La demo está en un plan gratuito: si no se usó en un rato, la primera carga puede tardar alrededor de un minuto.

---

## ✨ Funcionalidades

### Usuarios
- 🔐 **Registro e inicio de sesión** con contraseñas hasheadas y opción "recordarme".
- 🥠 **Abrir una galleta:** muestra un mensaje aleatorio que nunca repite el último que te tocó.
- 🌤️ **Clima en vivo de Buenos Aires** junto al mensaje, consumiendo la API pública de [Open-Meteo](https://open-meteo.com/). Si la API no responde, la app sigue funcionando igual.
- 📜 **Historial paginado** con todas las galletas abiertas.

### Administración
- 🛡️ **Roles de usuario** (`usuario` / `administrador`) protegidos con un middleware propio.
- ✏️ **CRUD de mensajes** con validación.
- 👥 **Listado de usuarios** con la cantidad de galletas que abrió cada uno y su historial.
- 📊 **Estadísticas:** mensajes más frecuentes y usuarios más activos.
- 🧾 **Log de auditoría:** registra logins (exitosos y fallidos), galletas abiertas y cambios en los mensajes.

## 📸 Capturas

<!-- Reemplazá cada src por tus imágenes -->

| Login | Galleta abierta |
|:---:|:---:|
| <img src="docs/img/login.png" alt="Login" width="400"> | <img src="docs/img/galleta.png" alt="Galleta abierta" width="400"> |

| Historial | Panel admin |
|:---:|:---:|
| <img src="docs/img/historial.png" alt="Historial" width="400"> | <img src="docs/img/admin.png" alt="Panel de administración" width="400"> |

| Estadísticas | Auditoría |
|:---:|:---:|
| <img src="docs/img/estadisticas.png" alt="Estadísticas" width="400"> | <img src="docs/img/auditoria.png" alt="Auditoría" width="400"> |


## 🏗️ Cómo está hecho

- **MVC con Laravel:** controladores separados por responsabilidad (`AuthController`, `GalletaController`, `HistorialController`, `AdminController`).
- **Eloquent** con relaciones entre `User`, `Mensaje` y `GalletaAbierta`.
- **Middleware `EsAdmin`** que protege todas las rutas bajo `/admin`.
- **Servicio de auditoría** propio que escribe y lee un log con formato estructurado.
- **Migraciones y seeders** para levantar la base con datos de prueba en un solo comando.
- **Blade + Tailwind CSS 4**, compilado con Vite.
- **Consumo de una API externa** con el cliente HTTP de Laravel, con timeout y manejo de errores.

### Modelo de datos

| Tabla | Descripción |
|---|---|
| `users` | Usuarios con su rol |
| `mensajes` | Mensajes posibles de las galletas |
| `galletas_abiertas` | Cada galleta abierta: quién, qué mensaje y cuándo |

<!-- IMAGEN opcional: diagrama entidad-relación -->
<p align="center">
  <img src="docs/img/der.png" alt="Diagrama entidad-relación" width="550">
</p>

## 🚀 Cómo correrlo en local

### Requisitos
- PHP 8.3+
- Composer
- Node.js 20+
- MySQL 8

### Pasos

```bash
# 1. Clonar el repo
git clone https://github.com/Coleko22/Galleta-de-la-fortuna-Produccion-Web
cd TU_REPO

# 2. Instalar dependencias
composer install
npm install

# 3. Configurar el entorno
cp .env.example .env
php artisan key:generate
```

Creá una base de datos vacía en MySQL y completá los datos en el `.env`:

```env
DB_DATABASE=galletamensajes
DB_USERNAME=colo
DB_PASSWORD=1234
```

```bash
# 4. Crear las tablas y cargar datos de prueba
php artisan migrate --seed

# 5. Levantar el servidor (Laravel + Vite)
composer run dev
```


## 📁 Estructura

```
app/
├── Http/
│   ├── Controllers/     # Auth, Galleta, Historial, Admin
│   └── Middleware/      # EsAdmin
├── Models/              # User, Mensaje, GalletaAbierta
└── Services/            # Auditoria
database/
├── migrations/
└── seeders/             # Mensajes y usuarios de prueba
resources/views/
├── auth/                # Login y registro
├── galleta/             # Abrir galleta y ver mensaje
├── historial/
└── admin/               # Dashboard, mensajes, usuarios, estadísticas, auditoría
routes/web.php
```

<p align="center">Proyecto académico · Producción Web</p>
