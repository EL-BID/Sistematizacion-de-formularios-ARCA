[![Build Status](https://travis-ci.com/EL-BID/Sistematizacion-de-formularios-ARCA.svg?branch=master)](https://travis-ci.com/EL-BID/Sistematizacion-de-formularios-ARCA)
[![Analytics](https://gabeacon.irvinlim.com/UA-168064518-1/ARCA/readme&useReferer)](https://github.com/EL-BID/Sistematizacion-de-formularios-ARCA)

## Diseño de formularios - ARCA
---
Esta herramienta permite sistematizar el diseño y alojamiento de formularios de una forma sencilla a través de hojas Excel. El sistema se compone de tres elementos principales:

**1. Parametrización**: Transformación de un archivo Excel a formulario y base de datos SQL Server.

**2. Módulos de control de formulario y sistema de notificaciones automáticas**: Posee los módulos necesarios para que los formularios creados en la parametrización sean accedidos por usuarios debidamente identificados y autorizados. Adicionalmente posee un módulo de notificaciones que puede ser parametrizado para enviar correos de acuerdo a tareas programadas.

**3. Generación de usuarios**: Posee un módulo para crear los usuarios que pueden acceder a los formularios creados y que nivel de acceso tienen sobre ellos.

**4. Generación de reportes**: Cada formulario parametrizado va acompañado de un módulo que permite generar el contenido de los mismos en formato PDF, Excel y Word

Esta herramienta ha sido desarrollada como parte del proceso para transparentar y agilizar la recolección de información de la Agencia Reguladora y Controladora de Aguas (ARCA) en Ecuador. (Código de la operación: RG-T2744 de las operaciones del BID)

El diseño de formularios ha permitido que, mediante una parametrización sencilla, realizada en una hoja de Excel, obtener un formato listo para diligenciar. Con esto es posible realizar un desarrollo de una manera más ágil; adicionalmente la información se guarda de una forma estructurada y uniforme, lo cual permite realizar procesos de análisis sobre esta sin necesidad de preocuparse porqué estructura de datos va a tener cada formato de recolección de datos.

### Guía de usuario
---
Una vez instalado la herramienta puedes acceder a la Wiki, para esto se puede ingresar a la instalación en la siguiente ruta:
				```r
				http://ip_o_url_instalacion/advanced/frontend/web/manual.php
				```
En el link Instalación de librerias.
Si aún no has instalado la herramienta, también puedes acceder a los contenidos básicos de la guía de usuario en la [wiki](https://github.com/EL-BID/Sistematizacion-de-formularios-ARCA/wiki) de este repositorio.

También es posible encontrar información en la carpeta https://github.com/EL-BID/Sistematizacion-de-formularios-ARCA/master/advanced/documentos 	

### Guía de instalación
---
Este proyecto se ha trabajado sobre la instalación advanced de Yii (https://github.com/yiisoft/yii2-app-advanced), por consiguiente, lo primero que se debe realizar es la instalación de Yii2.

Para instalar Yii se debe tener un servidor con un sistema operativo Windows o Linux que tenga instalado Apache, PHP 5.4 o superior Y composer para la instalación de dependencias.	

La base de datos funciona sobre PosgreSQL, para el correcto funcionamiento de la wiki y de la aplicación se debe restaurar las bases de datos que se encuentran en https://github.com/EL-BID/Sistematizacion-de-formularios-ARCA/master/advanced/frontend/web/examples/sql

Para un ejemplo detallado de la instalación puede dirigirse a la carpeta https://github.com/EL-BID/Sistematizacion-de-formularios-ARCA/master/advanced/documentos en el documento Instalacion.pdf 	

#### Dependencias
El proyecto ha sido trabajado y evaluado utilizando Xampp con PHP 5.4 en ambientes de desarrollo Windows y Linux.

Puede ser descargada desde https://www.apachefriends.org

La aplicación contiene dentro de la carpeta https://github.com/EL-BID/Sistematizacion-de-formularios-ARCA/master/advanced/vendor los módulos necesarios para su funcionamiento, en caso de necesitar actualizar alguno de ellos se debe realizar mediante el comando de composer:

```r
Linux
	php composer.phar update modulo_a_actualizar

Windows
	composer update modulo_a_actualizar
```

### Autor/es 
---
- Andrés Villamizar
- William García
- Diego Torrado

### Licencia 
---
Licencia BID [LICENSE](https://github.com/EL-BID/Sistematizacion-de-formularios-ARCA/master/Licencia.md)

## Limitación de responsabilidades

El BID no será responsable, bajo circunstancia alguna, de daño ni indemnización, moral o patrimonial; directo o indirecto; accesorio o especial; o por vía de consecuencia, previsto o imprevisto, que pudiese surgir:

i. Bajo cualquier teoría de responsabilidad, ya sea por contrato, infracción de derechos de propiedad intelectual, negligencia o bajo cualquier otra teoría; y/o

ii. A raíz del uso de la Herramienta Digital, incluyendo, pero sin limitación de potenciales defectos en la Herramienta Digital, o la pérdida o inexactitud de los datos de cualquier tipo. Lo anterior incluye los gastos o daños asociados a fallas de comunicación y/o fallas de funcionamiento de computadoras, vinculados con la utilización de la Herramienta Digital.
