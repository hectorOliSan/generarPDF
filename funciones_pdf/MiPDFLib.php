<?php
class MiPDFLib extends MiPDF
{
  private const COLOR = "#334B33";

  public function generaDoc()
  {
    $titulo = $this->getTitulo();
    $contenido = $this->getContenido();
    $tipoletra = $this->getTipoletra();
    $tamano = $this->getTamano();

    $alineacion = ["L" => "Left", "R" => "Right", "C" => "Center"];
    $a = $this->getAlineacion();


    $p = new PDFlib();
    $p->begin_document("", "");
    $p->begin_page_ext(0, 0, "width=a4.width height=a4.height");

    // Título
    $opciones = "fontname=" . $tipoletra . " fontsize=" . $tamano .
      " leading=100% alignment=" . $alineacion[$a] .
      " fillcolor={" . MiPDFLib::COLOR . " } fakebold";
    $texto = $p->create_textflow($titulo, $opciones);
    $p->fit_textflow($texto, 20, 800, 570, 750, "fitmethod=auto");

    // Contenido
    $opciones = "fontname=" . $tipoletra . " fontsize=" . $tamano .
      " leading=100% alignment=" . $alineacion[$a] .
      " fillcolor={" . MiPDFLib::COLOR . " }";
    $texto = $p->create_textflow($contenido, $opciones);
    $p->fit_textflow($texto, 20, 720, 570, 50, "fitmethod=auto");

    $p->end_page_ext("");
    $p->end_document("");
    return $p;
  }

  public function almacenaDoc($pdf)
  {
  }

  public function devuelveDoc($pdf)
  {
    $titulo = $this->getTitulo();
    $buf = $pdf->get_buffer();
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=" . $titulo . ".pdf");
    readfile("./pdf/test.pdf");
    print $buf;
  }

  public function mostrarPDF()
  {
    $s = parent::mostrarPDF();
    echo $s . "<br>" .
      " Librería:<b>" . get_class($this) . "</b>" .
      "</p>";
  }
}
