# Farmacia POS con Laravel 12

Este proyecto es un sistema de punto de venta para una farmacia desarrollado en Laravel 12. El sistema está diseñado para gestionar de forma integral el proceso de compra de medicamentos, desde que el cliente se registra e inicia sesión, hasta la generación de tickets en PDF y el reporte de ventas filtradas para el administrador.

## Tabla de Contenidos

- [Características](#características)
- [Tecnologías Utilizadas](#tecnologías-utilizadas)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Uso](#uso)
  - [Cliente](#cliente)
  - [Administrador](#administrador)
- [Reportes y Tickets PDF](#reportes-y-tickets-pdf)
- [Mejoras Futuras](#mejoras-futuras)
- [Licencia](#licencia)

## Características

### Funcionalidades para el Cliente:
- **Registro e inicio de sesión:** El cliente puede crear su cuenta y acceder al sistema.
- **Visualización de medicamentos:** Se muestran todos los medicamentos disponibles y se destacan los más vendidos.
- **Carrito de compras:** Posibilidad de agregar medicamentos al carrito, ver el contenido, eliminar productos y confirmar compra.
- **Historial de compras:** Consulta de las ventas realizadas con detalles de cada compra.
- **Ticket de compra:** Generación y descarga de tickets en formato PDF para cada venta.

### Funcionalidades para el Administrador:
- **CRUD de Medicamentos:** Crear, actualizar, eliminar y listar medicamentos.
- **Gestión de clientes:** (Extensible siguiendo el mismo patrón del CRUD de medicamentos).
- **Dashboard administrativo:** Estadísticas en tiempo real:
  - Total de ventas, ingresos totales y medicamentos vendidos.
  - Top 5 medicamentos más vendidos.
  - Listado de ventas recientes.
- **Reportes de ventas:** 
  - Reporte de ventas filtrado por fecha.
  - Filtros opcionales por cliente y producto.
  - Exportación del reporte a PDF.

## Tecnologías Utilizadas

- **Backend:** Laravel 12
- **Frontend:** Blade, Tailwind CSS (instalado y configurado con Laravel Breeze)
- **PDF:** [barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)
- **Gestión de sesiones:** Para el control del carrito de compras

## Instalación

### Requisitos Previos:
- PHP 8+
- Composer
- MySQL (o el motor de base de datos que prefieras)
- Node.js y npm

### Pasos de Instalación:

1. **Clonar el repositorio:**

   ```bash
   git clone <URL-del-repositorio>
   cd K_Farmacia



*************************************************************************************************************************************

*************************************************************************************************************************************

*************************************************************************************************************************************

*************************************************************************************************************************************

*************************************************************************************************************************************


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# K_Farmacia
