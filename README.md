<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel Logo">
</p>

<h1 align="center">Multi-Tenant Platform (Laravel)</h1>

<p align="center">
  Plataforma multi-tenant desarrollada en Laravel, enfocada en escalabilidad, aislamiento de datos y arquitectura limpia.
</p>

---

## 🚀 Descripción general

Este proyecto es una **plataforma multi-tenant** construida con **Laravel 12**, pensada para administrar múltiples organizaciones (tenants) desde una base de código única.

Cada tenant representa una federación/organización independiente, con:

- Usuarios propios
- Branding configurable
- Aislamiento lógico de datos
- Panel administrativo dedicado

El sistema fue diseñado priorizando **arquitectura**, **mantenibilidad** y **criterio técnico**, no solo funcionalidad.

---

## 🧠 Conceptos clave

- **Multi-Tenancy por tenant_id** (single database compatible con shared hosting)
- **Resolución de tenant por URL** (`/{tenant}/...`)
- **Aislamiento automático de datos** mediante middleware y scopes
- **Branding dinámico por tenant**
- **Autenticación separada por tenant**
- **Código preparado para escalar a multi-database o VPS**

---

## 🏗 Arquitectura

### Resolución de tenant
- Middleware identifica el tenant desde la ruta
- Se inyecta el contexto del tenant en toda la request
- Las vistas y queries se adaptan automáticamente

### Base de datos
- Modelo central `tenants`
- Tablas compartidas con `tenant_id`
- Seeders diferenciados (central vs tenant)
- Arquitectura pensada para migrar a multi-DB real si el entorno lo permite

### Autenticación
- Usuarios asociados a un tenant
- Login aislado por organización
- Preparado para roles (admin, instructor, alumno)

---

## 🧩 Tecnologías usadas

- **Laravel 12**
- **PHP 8.2**
- **MySQL**
- **Blade + TailwindCSS**
- **Vite**
- **Git / GitHub**

---

## ⚙️ Instalación (local)

```bash
git clone https://github.com/LucasHermida1/tenant-platform.git
cd tenant-platform

composer install
npm install
npm run build

cp .env.example .env
Asegurate de que las credenciales de la base de datos en .env coincidan con tu entorno local (por defecto: MySQL root sin contraseña).

php artisan app:install
php artisan serve
