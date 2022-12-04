<?php
class MiPDFLib extends MiPDF
{
  private const COLOR = "#334B33";
  private $pdf;
  private $buf;
  private $titulo;

  public function generaDoc()
  {
    $this->titulo = $this->getTitulo();
    $contenido = $this->getContenido();
    $tipoletra = $this->getTipoletra();
    $tamano = $this->getTamano();

    $alineacion = ["L" => "Left", "R" => "Right", "C" => "Center"];
    $a = $this->getAlineacion();

    $this->pdf = new PDFlib();
    $this->pdf->begin_document("", "");
    $this->pdf->begin_page_ext(0, 0, "width=a4.width height=a4.height");

    $opciones = "fontname=" . $tipoletra . " fontsize=" . $tamano .
    " leading=100% alignment=" . $alineacion[$a] .
    " fillcolor={" . MiPDFLib::COLOR . " }";

    // Título
    $texto = $this->pdf->create_textflow($this->titulo, $opciones." fakebold");
    $this->pdf->fit_textflow($texto, 20, 800, 570, 750, "fitmethod=auto");

    // Contenido
    $texto = $this->pdf->create_textflow($contenido, $opciones);
    $this->pdf->fit_textflow($texto, 20, 720, 570, 50, "fitmethod=auto");

    $this->pdf->end_page_ext("");
    $this->pdf->end_document("");

    $this->buf = $this->pdf->get_buffer();
  }

  public function almacenaDoc()
  {
    $dir_nombre = "./pdf/" . $this->titulo . ".pdf";
    file_put_contents($dir_nombre, $this->buf);
  }

  public function devuelveDoc()
  {
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=" . $this->titulo . ".pdf");
    print $this->buf;
  }

  public function mostrarPDF()
  {
    $s = parent::mostrarPDF();
    echo $s . "<br>" .
      " Librería:<b>" . get_class($this) . "</b>" .
      " Color:<b>" . MiPDFLib::COLOR . "</b>" .
      "</p>";
  }
}
