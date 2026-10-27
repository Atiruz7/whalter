# WALTHER - Plataforma Web y Marca Personal

Sitio web dinámico y panel de administración para la marca personal **WALTHER**, desarrollado con **Laravel 13**, **PHP 8.4**, **Blade**, **Tailwind CSS** y **Vite**.

---

## 1. Identidad de la Marca

- **Marca:** WALTHER
- **Creador:** Walther Qquesuallpa Yucra
- **Pilares de contenido:**
  1. Bienes raíces
  2. Motivación
  3. Crecimiento personal
  4. Emprendimiento
  5. Deporte y vida activa
- **Frase central:** *“Inspira. Aprende. Emprende. Invierte. Crece.”*
- **Misión:** Inspirar y ayudar a las personas a crecer en lo personal, profesional y económico, compartiendo conocimientos, experiencias y oportunidades.
- **Visión:** Convertir a WALTHER en una marca personal reconocida y confiable, con alcance nacional e internacional.
- **Valores:** Disciplina, perseverancia, responsabilidad, servicio, integridad, fe y propósito, y superación.

---

## 2. Arquitectura y Módulos Implementados

### A. Página Pública (`/`)
1. **Header:**
   - Logotipo dinámico (imagen o inicial tipográfica con nombre de marca).
   - Navegación responsive con menú drawer para dispositivos móviles.
   - Acceso discreto al panel de administración con candado.
   - Enlace a `#servicios` condicionado dinámicamente a la existencia de servicios activos.
2. **Hero Principal (`#inicio`):**
   - Imagen de fondo editable con degradado de respaldo elegante.
   - Título y descripción configurables (si se dejan vacíos, no muestran contenedores vacíos).
   - Botones configurables con validación estricta de texto y URL.
3. **Hero 2: “Conversemos y tomemos un café”:**
   - Imagen de fondo `hero2-fondoBanner.jpg` en alta resolución.
   - Reproductor de video nativo para móviles y escritorio (`hero2.mp4` precargado, 2.9 MB).
   - Botón directo a WhatsApp con número configurable y mensaje precargado exacto:
     > *“Deseo agendar una reunión mientras nos tomamos un café”*
   - Ocultamiento seguro del botón si no se ha configurado un número válido.
4. **Productos y Servicios (`#servicios`):**
   - Carrusel responsivo con soporte táctil (touch snap) y flechas de navegación en escritorio.
   - Soporte para imagen, nombre, descripción y precio.
   - La sección pública desaparece por completo si no hay servicios activos.
5. **Footer y Contacto (`#contacto`):**
   - Redes sociales: Facebook, TikTok y WhatsApp (solo se muestran si están configuradas).
   - Crédito *“Hecho por B1T”* con enlace web configurable.
   - Resumen y pilares de la marca.

### B. Panel de Administración (`/admin`)
- **Autenticación segura:** Protegido contra accesos no autorizados con middleware `auth` y protección CSRF.
- **Gestión de Contenido (`/admin/contenido`):**
  - Edición de nombre del sitio, descripción (tagline) y logotipo.
  - Gestión de imagen, título, descripción y botones del Hero 1.
  - Gestión de fondo, texto y video de Hero 2 (validación MP4/WebM hasta 20 MB).
  - Configuración de WhatsApp, mensaje predeterminado, Facebook, TikTok y enlace B1T.
  - Opciones de eliminación individual para cada archivo multimedia.
- **Gestión de Servicios (`/admin/productos`):**
  - CRUD completo (Crear, Listar, Editar, Eliminar).
  - Subida de imágenes, orden de visualización en carrusel y conmutador de visibilidad (`is_active`).
- **Perfil de Administrador (`/admin/perfil`):**
  - Actualización de nombre y correo electrónico con validación de unicidad.
  - Cambio seguro de contraseña exigiendo la contraseña actual y confirmación cifrada con Bcrypt.

---

## 3. Requisitos del Sistema

- **PHP:** >= 8.3 (Recomendado PHP 8.4) con extensiones `pdo`, `pdo_sqlite`, `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `fileinfo`.
- **Composer:** >= 2.2
- **Node.js:** >= 18.x y NPM
- **Base de Datos:** SQLite (desarrollo local) o MySQL / MariaDB (producción)

---

## 4. Instalación y Configuración Local

1. **Clonar o descargar el repositorio:**
   ```bash
   cd whalter
   ```

2. **Instalar dependencias de PHP:**
   ```bash
   composer install
   ```

3. **Configurar el entorno:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Crear el enlace simbólico para archivos multimedia:**
   ```bash
   php artisan storage:link
   ```

5. **Ejecutar migraciones y seeders idempotentes:**
   ```bash
   php artisan migrate --seed
   ```

6. **Instalar dependencias de frontend y compilar:**
   ```bash
   npm install
   npm run build
   ```

7. **Iniciar el servidor local:**
   ```bash
   php artisan serve
   ```
   Accede a la web en: `http://localhost:8000`

---

## 5. Credenciales de Prueba Controladas

- **URL de acceso:** `http://localhost:8000/admin/login`
- **Correo:** `admin@walther.test`
- **Contraseña:** `password`

*(Nota de seguridad: Cambie esta contraseña desde el módulo "Mi perfil" inmediatamente después del despliegue).*

---

## 6. Pruebas Automatizadas

El proyecto cuenta con una suite completa de pruebas en PHPUnit / Pest:

```bash
php artisan test
```

Resultados verificados:
- Carga de página pública con y sin servicios activos.
- Redirección de rutas protegidas para invitados.
- Inicio de sesión y autenticación exitosa / credenciales erróneas.
- Actualización y persistencia de configuración del sitio.
- CRUD de servicios y subida/borrado de imágenes.
- Actualización de perfil y cambio de contraseña con contraseña actual.
- Idempotencia comprobada de los seeders (sin duplicación de registros).
- Validación de formatos y tamaños máximos de video (MP4/WebM hasta 20 MB).

---

## 7. Guía de Despliegue en InfinityFree

**Dominio destino:** `walther.infinitifree.com`

### Consideraciones técnicas del alojamiento gratuito:
1. **Versión de PHP:** Configure la versión de PHP a **PHP 8.3** desde el panel de control de InfinityFree (cPanel).
2. **Directorio raíz (`htdocs`):** InfinityFree sirve el contenido desde la carpeta `htdocs`.
   - **Opción recomendada:** Subir todo el proyecto a la carpeta raíz de la cuenta (un nivel arriba de `htdocs`) y colocar únicamente el contenido de `public/` dentro de `htdocs/`.
   - Modificar `htdocs/index.php` para apuntar a la carpeta superior:
     ```php
     if (file_exists($maintenance = __DIR__.'/../whalter/storage/framework/maintenance.php')) {
         require $maintenance;
     }

     require __DIR__.'/../whalter/vendor/autoload.php';

     $app = require_once __DIR__.'/../whalter/bootstrap/app.php';
     ```
3. **Base de Datos MySQL:**
   - Crear una base de datos MySQL desde el panel de InfinityFree.
   - Importar el archivo listo para producción:
     `database/walther_export.sql`
     mediante **phpMyAdmin**.
   - En el archivo `.env` del servidor, configure:
     ```env
     APP_ENV=production
     APP_DEBUG=false
     APP_URL=http://walther.infinitifree.com

     DB_CONNECTION=mysql
     DB_HOST=sqlXXX.infinityfree.com
     DB_PORT=3306
     DB_DATABASE=if0_xxxxxxxx_walther
     DB_USERNAME=if0_xxxxxxxx
     DB_PASSWORD=su_contraseña_mysql

     FILESYSTEM_DISK=public
     ```
4. **Archivos multimedia (`storage`):**
   - En servidores compartidos donde `symlink()` está deshabilitado, Laravel 13 cuenta con la ruta nativa `Route::get('storage/{path}')` que sirve archivos dinámicamente sin requerir el symlink del sistema operativo.
   - Los assets principales predeterminados (`hero2-fondoBanner.jpg` y `hero2.mp4`) se encuentran en `public/images/` y `public/videos/`, garantizando su visualización inmediata sin configuración adicional.
5. **Compilación previa de Frontend:**
   - InfinityFree no posee Node.js. Suba la carpeta `public/build/` generada por `npm run build`.

---

## 8. Exportación de Base de Datos

El volcado SQL completo con la estructura y los datos iniciales de la marca se encuentra en:
- `database/walther_export.sql`

Incluye:
- Tabla `users` con el administrador de prueba.
- Tabla `site_settings` con los textos de marca, Hero 1, Hero 2, WhatsApp y redes.
- Tabla `products` con los 5 servicios iniciales según los pilares de Walther.
- Tablas de infraestructura de Laravel (`sessions`, `cache`, `cache_locks`).

---

## 9. Autores y Contribuciones

- **Marca Personal:** Walther Qquesuallpa Yucra
- **Desarrollo y Auditoría Full-Stack:** B1T / Equipo de Desarrollo
  - Resolución de conflictos Git y restauración de archivos de configuración (`composer.json`, `app.css`, `routes/web.php`).
  - Implementación dinámica de Hero 1, Hero 2 con video MP4/WebM y enlace de WhatsApp con mensaje precargado exacto.
  - Carrusel interactivo y responsivo de servicios y productos.
  - Panel administrativo integral de configuración, servicios y perfil.
  - Corrección de rutas de almacenamiento, pruebas automatizadas y exportación SQL para despliegue.
