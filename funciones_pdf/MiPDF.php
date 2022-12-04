<?php
interface iPDF
{
  public function mostrarPDF();
}

abstract class MiPDF implements iPDF
{
  private $titulo;
  private $contenido;
  private $tipoletra;
  private $tamano;
  private $alineacion;

  public function __construct()
  {
    $args = func_get_args();
    $n_args = func_num_args();

    if (method_exists($this, $function = '__construct' . $n_args)) {
      call_user_func_array(array($this, $function), $args);
    }
  }

  public function __construct2($titulo, $contenido)
  {
    $this->titulo = $titulo;
    $this->contenido = $contenido;
    $this->tipoletra = "Arial";
    $this->tamano = 12;
    $this->alineacion = "L";
  }

  public function __construct5($titulo, $contenido, $tipoletra, $tamano, $alineacion)
  {
    $this->titulo = $titulo;
    $this->contenido = $contenido;
    $this->tipoletra = $tipoletra;
    $this->tamano = $tamano;
    $this->alineacion = $alineacion;
  }

  /**
   * Get the value of titulo
   */
  public function getTitulo()
  {
    return $this->titulo;
  }

  /**
   * Set the value of titulo
   */
  public function setTitulo($titulo): self
  {
    $this->titulo = $titulo;

    return $this;
  }

  /**
   * Get the value of contenido
   */
  public function getContenido()
  {
    return $this->contenido;
  }

  /**
   * Set the value of contenido
   */
  public function setContenido($contenido): self
  {
    $this->contenido = $contenido;

    return $this;
  }

  /**
   * Get the value of tipoletra
   */
  public function getTipoletra()
  {
    return $this->tipoletra;
  }

  /**
   * Set the value of tipoletra
   */
  public function setTipoletra($tipoletra): self
  {
    $this->tipoletra = $tipoletra;

    return $this;
  }

  /**
   * Get the value of tamano
   */
  public function getTamano()
  {
    return $this->tamano;
  }

  /**
   * Set the value of tamano
   */
  public function setTamano($tamano): self
  {
    $this->tamano = $tamano;

    return $this;
  }

  /**
   * Get the value of alineacion
   */
  public function getAlineacion()
  {
    return $this->alineacion;
  }

  /**
   * Set the value of alineacion
   */
  public function setAlineacion($alineacion): self
  {
    $this->alineacion = $alineacion;

    return $this;
  }

  public abstract function generaDoc();
  public abstract function almacenaDoc();
  public abstract function devuelveDoc();

  public function mostrarPDF()
  {
    echo "<p class='fs-5 text-center font-monospace'>" .
      "<b>" . $this->titulo . "</b><br>" .
      $this->contenido . "<br>" .
      " Letra:<b>" . $this->tipoletra . "</b>" .
      " Tamaño:<b>" . $this->tamano . "</b>" .
      " Alineación:<b>" . $this->alineacion . "</b>";
  }
}
