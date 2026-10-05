# Oportunidades Inmobiliarias Peru

Sitio web inmobiliario orientado al mercado peruano. Vende terrenos, casas,
departamentos y proyectos en playa, con sede en Arequipa, Peru.

---

## Stack Tecnologico

| Capa | Tecnologia |
|---|---|
| Servidor | Apache + PHP 8.2 |
| Frontend | PHP puro + Vanilla CSS |
| Fuente | Kanit (Google Fonts) |
| Iconos | flaticon_inmobiliaria + RemixIcon 3.5.0 |
| Animaciones | Animate.css 3.7.2 + GSAP 3.4.2 |
| Slider | Swiper 8 |
| jQuery | 3.7.1 |
| Analytics | Google Analytics 4 + Google Tag Manager |

---

## Estructura del Proyecto

```
.
|-- .agents/                        # Configuracion de Antigravity AI
|   `-- skills/
|       `-- inmobiliaria-ui-design/ # Skill de diseno UI/UX del proyecto
|           `-- SKILL.md
|-- .env.example                    # Plantilla de variables de entorno
|-- .gitignore
|-- docker-compose.yml              # Entorno local Docker (PHP + MySQL + phpMyAdmin)
|-- README.md                       # Este archivo
|-- .htaccess                       # Reescritura de URLs y reglas Apache
|-- header.php                      # Header global con SEO, GA4, GTM y nav
|-- footer.php                      # Footer global con scripts JS
|-- index.php                       # Pagina principal
|-- proyecto.php                    # Pagina de proyectos
|-- alquiler.php                    # Pagina de alquileres
|-- blog.php                        # Blog / novedades
|-- css/
|   `-- styles2k2k2.css             # Unico archivo de estilos global
|-- js/
|   `-- index2jk2j2.js              # JS principal del sitio
|-- img/                            # Imagenes y assets
|-- l1/                             # Landing page independiente #1
`-- depas/                          # Subpagina de departamentos
```

---

## Entorno de Desarrollo Local con Docker

### Prerequisitos

- Docker Desktop instalado y corriendo
- Git

### Levantamiento del entorno

```bash
# 1. Clonar el repositorio
git clone https://github.com/SebastianT28/oportunidadesinmobiliariasper-.git
cd oportunidadesinmobiliariasper-

# 2. Crear el archivo .env con las credenciales locales
cp .env.example .env
# Editar .env si lo deseas (no es obligatorio para desarrollo)

# 3. Levantar los contenedores
docker compose up -d

# 4. Acceder al sitio
# Sitio web:   http://localhost:8080
# phpMyAdmin:  http://localhost:8081
```

### Servicios del docker-compose

| Servicio | Imagen | Puerto local | Descripcion |
|---|---|---|---|
| `php-apache` | `php:8.2-apache` | `8080` | Servidor web con mod_rewrite habilitado |
| `mysql` | `mysql:8.0` | `3306` | Base de datos MySQL |
| `phpmyadmin` | `phpmyadmin/phpmyadmin` | `8081` | Panel de administracion DB |

### Comandos utiles

```bash
# Ver logs del servidor web
docker compose logs -f php-apache

# Detener contenedores
docker compose down

# Detener y eliminar volumenes (BORRA la DB)
docker compose down -v

# Reconstruir contenedores
docker compose up -d --build
```

### Notas sobre el entorno local

- El `mod_rewrite` de Apache se habilita automaticamente al iniciar el contenedor.
- `AllowOverride All` se configura en `apache2.conf` para que el `.htaccess` sea leido.
- La carpeta `Codigo/public_html` se monta como volumen en `/var/www/html`.
- El archivo `.env` **nunca se sube al repositorio** (esta en `.gitignore`).

---

## Configuracion del .htaccess

El archivo `.htaccess` controla la reescritura de URLs y las redirecciones.

### Reglas actuales

```apache
Options +FollowSymLinks
Options -Indexes

RewriteBase /

# HTTPS SEGURO — DESHABILITADO EN LOCAL/DOCKER
# Descomentar las dos lineas de abajo solo en produccion (SiteGround)
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Redireccion sin WWW
RewriteCond %{HTTP_HOST} ^www.oportunidadesinmobiliariasperu.com [NC]
RewriteRule ^(.*)$ https://oportunidadesinmobiliariasperu.com/$1 [L,R=301]

RewriteEngine on
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteCond %{SCRIPT_FILENAME} !-f
Rewriterule ^/ index.php
Rewriterule ^proyecto proyecto.php
Rewriterule ^alquiler alquiler.php
Rewriterule ^novedades/(.+)?$ blog.php?p=$1 [L]
Rewriterule ^novedades blog.php
Rewriterule ^articulo/(.+)?$ article.php?id=$1
Rewriterule ^error error.php
Rewriterule ^sitemap sitemap.xml

ErrorDocument 404 /error.php
```

---

## Despliegue a Produccion en SiteGround

### Antes de subir a produccion — Checklist obligatorio

#### 1. Habilitar forzado HTTPS en .htaccess

En el archivo `.htaccess`, **descomentar** las siguientes lineas (quitarle el `#`):

```apache
# DE ESTO:
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# A ESTO:
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

> **Por que esta comentado en local:** Docker no tiene certificado SSL configurado,
> por lo que la regla causaria un loop de redireccion infinita. En SiteGround,
> el SSL de Let's Encrypt ya esta activo y la regla funciona correctamente.

#### 2. Verificar credenciales de base de datos

Si el sitio usa conexion a MySQL, asegurarse de que las credenciales apuntan
a la base de datos de SiteGround (no al `localhost` de Docker).

#### 3. Subir archivos via FTP o Git Deploy

**Opcion A — FTP/SFTP (recomendada para actualizaciones parciales):**
- Conectarse con FileZilla u otro cliente SFTP a SiteGround
- Subir el contenido de `Codigo/public_html/` a la carpeta `public_html` del hosting
- NO subir: `.env`, `docker-compose.yml`, `.agents/`, `.git/`, `README.md`

**Opcion B — Git Deploy desde SiteGround:**
- En el panel de SiteGround (Site Tools > Git), conectar el repositorio
- Configurar el directorio de despliegue como `public_html`
- Realizar el deploy desde la rama `main`

#### 4. Archivos que NO deben estar en produccion

| Archivo / Carpeta | Razon |
|---|---|
| `.env` | Contiene credenciales — ya en `.gitignore` |
| `docker-compose.yml` | Solo para entorno local |
| `.agents/` | Configuracion del agente AI, no del sitio |
| `README.md` | Documentacion interna |
| `.gitignore` | No relevante para Apache |

> En SiteGround, si se usa Git Deploy, agregar un `.cpanel.yml` o
> configurar las reglas de despliegue para excluir estos archivos.

#### 5. Cache y optimizacion en SiteGround

- Activar **SG Optimizer** desde el panel de SiteGround
- Habilitar cache de paginas estaticas
- Verificar que los assets (CSS, JS, imagenes) se sirvan con headers de cache correctos

#### 6. Verificacion post-despliegue

- [ ] El sitio carga en `https://oportunidadesinmobiliariasperu.com`
- [ ] El HTTP redirige automaticamente a HTTPS (301)
- [ ] El WWW redirige a sin-WWW
- [ ] Las URLs amigables funcionan (`/proyecto`, `/alquiler`, `/novedades`)
- [ ] El error 404 muestra `/error.php`
- [ ] Google Analytics y GTM registran visitas correctamente
- [ ] Las imagenes cargan (verificar rutas absolutas vs. relativas)

---

## Agente AI — Antigravity

Este proyecto usa **Antigravity** como asistente de codigo con skills especializadas.

### Skill activa: `inmobiliaria-ui-design`

Ubicada en `.agents/skills/inmobiliaria-ui-design/SKILL.md`, esta skill guia
al agente en:

- Uso correcto de los design tokens CSS del proyecto
- Patrones de componentes (cards, CTAs, secciones, carruseles)
- Principios UX adaptados a la audiencia peruana
- Responsive mobile-first con breakpoint en 1024px
- Checklist de validacion antes de entregar cambios

El agente la activa automaticamente cuando se le pide trabajar en la interfaz
visual del sitio.

---

## Historial de cambios relevantes

| Version | Descripcion |
|---|---|
| `feat: Primer avance` | Correcciones SEO, GA4 y GTM |
| `chore: Infra local + skill AI` | Docker local, .htaccess documentado, skill Antigravity UI/UX |

---

*Desarrollado por Sinopsis Marketing para Oportunidades Inmobiliarias Peru.*