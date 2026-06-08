# UnIS — Unidad de Igualdad Sustantiva
> Portal y sistema de administración de la **Unidad de Igualdad Sustantiva (UnIS)** de la Secretaría de Planeación, Finanzas y Administración del Estado de Puebla.

Este sistema es una plataforma web integral diseñada para la difusión de actividades, transparencia, participación ciudadana y captación de denuncias relativas a la igualdad de género y la prevención de conductas hostiles en el ámbito laboral de la administración pública.

---

## 🚀 Características Principales

### 🌐 Portal Público (Experiencia Ciudadana y del Personal)
*   **Actualidad y Difusión:** Feeds dinámicos de noticias y comunicados oficiales.
*   **Eventos y Agenda:** Lista de actividades con fechas, ubicaciones y galerías fotográficas autoadministrables para cada evento.
*   **Pronunciamientos:** Módulo especial para los posicionamientos oficiales de los directivos e integrantes de la Unidad.
*   **Identidad Organizacional:** Estructura orgánica con fichas individuales de los miembros del equipo, incluyendo áreas, extensiones telefónicas de contacto y frases de compromiso social.
*   **Transparencia Activa:** Repositorio documental categorizado (Marco Jurídico, Informe Anual, Plan Anual de Trabajo y Actas de Sesiones) organizado mediante un tablero interactivo con pestañas de filtrado.
*   **Buzón de Denuncias Seguro:** Sistema de captación de reportes o sugerencias que permite envíos anónimos o identificados. Genera un número de folio o ticket único con formato `UNIS-AAAA-XXXX` para el seguimiento del usuario.
*   **Formulario de Contacto:** Canal directo para dudas y solicitudes generales del portal.
*   **Evaluación Interactiva (Calidad):** Widget interactivo al pie de página que permite valorar la utilidad del portal con emojis (`😊`, `😐`, `😞`), incluyendo retroalimentación de texto protegido por Cloudflare Turnstile.

### 🔐 Panel de Administración (Gestión Interna)
*   **Autenticación Segura:** Sistema de acceso privado basado en Laravel Breeze.
*   **Dashboard de Control:** Resumen de mensajes recibidos, estado de denuncias y accesos rápidos.
*   **Gestores de Contenido (CRUDs):** Control total (crear, editar, eliminar, activar/desactivar) de:
    *   Noticias
    *   Eventos y galerías de fotos (subida y borrado asíncrono de imágenes)
    *   Comunicados y Pronunciamientos
    *   Documentos de transparencia y subida de archivos PDF
    *   Banners rotativos del Home
    *   Métricas e indicadores de impacto
    *   Miembros de la Organización y Efemérides
*   **Administrador de Denuncias:** Panel confidencial para la revisión de quejas, actualización de estados (*Recibido*, *En revisión*, *Resuelto*) y registro de notas de seguimiento interno.
*   **Ajustes Generales:** Configuración dinámica de dirección de contacto, teléfonos, correos y enlaces a redes sociales oficiales.

---

## 🛠️ Tecnologías Utilizadas

*   **Core:** [Laravel 12.x](https://laravel.com/) (PHP >= 8.2)
*   **Frontend UI:** [Tailwind CSS](https://tailwindcss.com/) & [Alpine.js](https://alpinejs.dev/)
*   **Assets Bundler:** [Vite](https://vitejs.dev/)
*   **Integraciones:** [Cloudflare Turnstile](https://www.cloudflare.com/products/turnstile/) (para la protección contra spam en formularios de contacto y retroalimentación).
*   **Base de datos:** Soporte completo para MySQL/PostgreSQL y configuración por defecto en SQLite para entornos rápidos de desarrollo.

---

## 📦 Instalación y Configuración

Sigue estos pasos para desplegar el proyecto localmente o en un servidor:

### Requisitos Previos
*   **PHP >= 8.2** (con extensiones requeridas por Laravel como `mbstring`, `openssl`, `xml`, `zip`, `pdo_sqlite` o `pdo_mysql`)
*   **Composer**
*   **Node.js & NPM**

### 1. Clonar el repositorio
```bash
git clone https://github.com/ItsNery/unis.git
cd unis
```

### 2. Configurar Variables de Entorno
Copia el archivo `.env.example` y renómbralo a `.env`:
```bash
cp .env.example .env
```
Abre tu `.env` y configura tus accesos a la base de datos y llaves de Cloudflare Turnstile:
```env
# Conexión por defecto a SQLite (creará la base de datos automáticamente si no existe)
DB_CONNECTION=sqlite

# O si prefieres MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=unis
# DB_USERNAME=root
# DB_PASSWORD=

# Llaves de Cloudflare Turnstile (Obligatorio para que funcionen los formularios)
TURNSTILE_SITE_KEY=tu_site_key_aqui
TURNSTILE_SECRET_KEY=tu_secret_key_aqui
```

### 3. Instalación Unificada
El proyecto cuenta con un script de instalación rápida predefinido en `composer.json` que instalará las dependencias de PHP, generará la llave de seguridad de Laravel, ejecutará las migraciones, sembrará los datos base, instalará dependencias de Node y compilará los archivos de frontend:

```bash
composer run setup
```

> [!TIP]
> **Pasos Manuales Equivalentes:** Si prefieres correr los comandos de manera individual, ejecuta:
> 1. `composer install`
> 2. `php artisan key:generate`
> 3. `php artisan migrate --seed`
> 4. `npm install`
> 5. `npm run build`

### 🔑 Credenciales del Administrador por Defecto
El sembrador (`DatabaseSeeder`) crea una cuenta de administrador inicial:
*   **Email:** `admin@unis.gob.mx`
*   **Password:** `admin123`

---

## ⚡ Comandos Útiles de Desarrollo

*   **Servidor de Desarrollo Unificado:** Enciende de manera simultánea el servidor de Laravel, los escuchas de colas (`queues`), el visor de logs `Laravel Pail` y el compilador en tiempo real de Vite:
    ```bash
    composer run dev
    ```
*   **Ejecución de Pruebas:** Ejecuta la suite de pruebas unitarias y de integración del proyecto:
    ```bash
    composer run test
    ```

---

## 📂 Estructura del Proyecto Clave

*   [`app/Http/Controllers/`](file:///c:/laragon/www/unis-1/app/Http/Controllers/): Controladores que gestionan la lógica pública e interna del portal.
*   [`app/Models/`](file:///c:/laragon/www/unis-1/app/Models/): Modelos Eloquent de datos del sistema (`Noticia`, `Denuncia`, `Evento`, etc.).
*   [`resources/views/partials/welcome/`](file:///c:/laragon/www/unis-1/resources/views/partials/welcome/): Componentes individuales y secciones del Home principal público.
*   [`resources/views/admin/`](file:///c:/laragon/www/unis-1/resources/views/admin/): Vistas de administración interna para los CRUDs.
*   [`database/migrations/`](file:///c:/laragon/www/unis-1/database/migrations/): Definición del esquema relacional de la base de datos.
*   [`routes/web.php`](file:///c:/laragon/www/unis-1/routes/web.php): Definición de rutas públicas y privadas agrupadas.
