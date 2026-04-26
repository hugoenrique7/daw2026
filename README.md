# Proyecto de Fichaje de Funcionarios

## Nombre del proyecto

**Proyecto de Fichaje de Funcionarios**

---

## Descripción

Este proyecto es una aplicación web sencilla desarrollada en **PHP** y **MySQL** para gestionar el fichaje de funcionarios.  
Permite registrar entradas y salidas, agregar nuevos funcionarios y consultar el historial de fichajes almacenado en la base de datos.

---

## Tecnologías usadas

- **PHP**
- **MySQL**
- **HTML**
- **Servidor local** (XAMPP, WAMP o LAMP)

---

## Características principales

- Registro de nuevos funcionarios.
- Fichaje de entrada.
- Fichaje de salida.
- Visualización del historial de fichajes.
- Conexión a base de datos MySQL mediante `mysqli`.
- Estructura simple y fácil de entender para fines educativos.

---

## Requisitos

Antes de ejecutar el proyecto, necesitas:

- PHP instalado.
- MySQL instalado.
- Un servidor local como **XAMPP**, **WAMP** o **LAMP**.
- Navegador web.
- Base de datos creada manualmente.

---

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/hugoenrique7/daw2026.git
```

### 2. Crear la base de datos

En MySQL, crea la base de datos:

```sql
CREATE DATABASE fichaje_funcionarios;
```

### 3. Crear las tablas

Usa este script SQL:

```sql
CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE fichajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    funcionario_id INT,
    tipo VARCHAR(10),
    fecha DATETIME,
    FOREIGN KEY (funcionario_id) REFERENCES funcionarios(id)
);
```

### 4. Configurar la conexión

Edita el archivo `config.php` con tus datos de conexión:

```php
<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "fichaje_funcionarios";

$conexion = new mysqli($servidor, $usuario, $contrasena, $baseDeDatos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
```

### 5. Ejecutar el proyecto

Coloca la carpeta en tu servidor local y abre en el navegador:

```bash
http://localhost/daw2026/index.php
```

---

## Uso

### Ejemplo 1: Agregar un funcionario

1. Abre la aplicación en el navegador.
2. En el formulario **Agregar Funcionario**, escribe un nombre.
3. Pulsa el botón **Agregar Funcionario**.

Ejemplo:
- Nombre: `Juan Pérez`

### Ejemplo 2: Registrar una entrada

1. Selecciona un funcionario en el desplegable.
2. Elige **Entrada**.
3. Haz clic en **Fichar**.

Ejemplo:
- Funcionario: `Juan Pérez`
- Tipo: `Entrada`

### Ejemplo 3: Registrar una salida

1. Selecciona un funcionario.
2. Elige **Salida**.
3. Haz clic en **Fichar**.

Ejemplo:
- Funcionario: `Juan Pérez`
- Tipo: `Salida`

### Ejemplo 4: Ver historial

Debajo del formulario se mostrará una tabla con:

- Nombre del funcionario
- Tipo de fichaje
- Fecha y hora

---

## Estructura del proyecto

```plaintext
daw2026/
│
├── config.php
├── funciones.php
└── index.php
```

### Descripción de archivos

- **config.php**: contiene la conexión a la base de datos.
- **funciones.php**: agrupa las funciones para gestionar funcionarios y fichajes.
- **index.php**: muestra la interfaz y procesa las acciones del sistema.

---

## Autor

**Hugo Enrique**
