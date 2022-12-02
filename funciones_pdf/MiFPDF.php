<?php
require('fpdf.php');
require "MiPDF.php";
class MiFPDF extends MiPDF
{
  private const COLOR = "#333B4B";
  private const R = 51;
  private const G = 59;
  private const B = 75;

  public function generaDoc()
  {
    $titulo = $this->getTitulo();
    $contenido = $this->getContenido();
    $tipoletra = $this->getTipoletra();
    $tamano = $this->getTamano();
    $alineacion = $this->getAlineacion();

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetTextColor(MiFPDF::R, MiFPDF::G, MiFPDF::B);

    // Título
    $pdf->SetFont($tipoletra, 'B', $tamano);
    $pdf->MultiCell(0, 15, utf8_decode($titulo), false, $alineacion);

    $pdf->Ln(20);

    // Contenido
    $pdf->SetFont($tipoletra, '', $tamano);
    $pdf->MultiCell(0, 15, utf8_decode($contenido), false, $alineacion);
    return $pdf;
  }

  public function almacenaDoc($pdf)
  {
    $dir = "./pdf/";
    $nombre = $this->getTitulo() . ".pdf";
    $dir_nombre = $dir . $nombre;
    $pdf->Output('F', $dir_nombre, true);
  }

  public function devuelveDoc($pdf)
  {
    $pdf->Output();
  }

  public function mostrarPDF()
  {
    $s = parent::mostrarPDF();
    echo $s . "<br>" .
      " Librería:<b>" . get_class($this) . "</b>" .
      " Color:<b>" . MiFPDF::COLOR . "</b>" .
      "</p>";
  }
}
