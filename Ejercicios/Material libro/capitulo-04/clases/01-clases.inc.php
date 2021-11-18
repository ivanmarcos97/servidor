<?php
// Definición de una clase destinada a almacenar información 
// sobre un usuario.
class usuario {
  // Definición de los atributos.
  public  $apellido; // apellido del usuario
  public  $nombre; // nombre del usuario
  public  $idioma = 'es_ES'; // idioma del usuario
                             // español de manera predeterminada
  private $timestamp; // fecha/hora de creación (privado)
  // Definición de los métodos:
  // - método constructor
  public function __construct($nombre,$apellido) {
    // Inicializar el nombre y el apellido
    // con los valores de los parámetros.
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    // Inicializar la marca de tiempo con la función time().
    $this->timestamp = time();
  }
  // - método destructor
  public function __destruct() {
    // Simplmente muestra un mensaje.
    echo "<p><b>Eliminación de $this->apellido</b></p>";
  }
  // - método de conversión del objeto en cadena
  public function __toString() {
    // Devuelve el apellido y el nombre.
    return "__toString = $this->apellido - $this->nombre";
  }
  // - método que modifica el idioma del usuario.
  public function idioma($idioma) {
    $this->idioma = $idioma;
  }
  // - método (privée) que da formato a la fecha/hora
  //   de creación del usuario.
  private function FormatoDeLaMarcaDeTiempo() {
    setlocale(LC_TIME,$this->idioma.'.UTF8'); // juego de caracteres UTF8
    return strftime('%c', $this->timestamp);
  }
  // - método que da información sobre el usuario
  public function información() {
    $creación = $this->FormatoDeLaMarcaDeTiempo();
    return "$this->nombre $this->apellido - $creación";
  }
}
?>
