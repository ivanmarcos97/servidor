<?php
class Autor {
  // Definici�n de las constantes de clase.
  const APELLIDO_ENTRE_PARENTESIS = 1;
  const APELLIDO_ENTRE_COMILLAS = 2;
  // Definici�n de los atributos.
  public  $nombre;    // nombre del autor
  public  $apellido; // apellido del autor
  // M�todo constructor.
  public function __construct($patronyme) {
    // Initializar el nombre y el apellido
    // desde el nombre completo pasado como argumento.
    [$this->apellido,$this->nombre] = explode(' ',$patronyme);
  }
  // M�todo de conversi�n del objeto en cadena
  public function __toString() {
    // Devuelve el apellido y el nombre.
    return "$this->apellido $this->nombre";
  }
  // M�todo de formateo del nombre del autor.
  public function format($format = NULL) {
    switch ($format) {
      case Autor::APELLIDO_ENTRE_PARENTESIS:
        $valor = "$this->nombre ($this->apellido)";
        break;
      case Autor::APELLIDO_ENTRE_COMILLAS:
        $valor = "$this->nombre, $this->apellido";
        break;
      case NULL:
        $valor = "$this->apellido $this->nombre";
        break;
      default:
        throw new Exception('Formato desconocido');
    };
    return $valor;
  }
}
?>
