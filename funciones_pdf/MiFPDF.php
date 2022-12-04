<?php
require('fpdf.php');
require "MiPDF.php";
class MiFPDF extends MiPDF
{
  private const COLOR = "#333B4B";
  private const R = 51;
  private const G = 59;
  private const B = 75;

  private $pdf;

  public function generaDoc()
  {
    $titulo = $this->getTitulo();
    $contenido = $this->getContenido();
    $tipoletra = $this->getTipoletra();
    $tamano = $this->getTamano();
    $alineacion = $this->getAlineacion();

    $this->pdf = new FPDF();
    $this->pdf->AddPage();
    $this->pdf->SetTextColor(MiFPDF::R, MiFPDF::G, MiFPDF::B);

    // Título
    $this->pdf->SetFont($tipoletra, 'B', $tamano);
    $this->pdf->MultiCell(0, 15, utf8_decode($titulo), false, $alineacion);

    $this->pdf->Ln(20);

    // Contenido
    $this->pdf->SetFont($tipoletra, '', $tamano);
    $this->pdf->MultiCell(0, 15, utf8_decode($contenido), false, $alineacion);
  }

  public function almacenaDoc()
  {
    $dir_nombre = "./pdf/" . $this->getTitulo() . ".pdf";
    $this->pdf->Output('F', $dir_nombre, true);
  }

  public function devuelveDoc()
  {
    $this->pdf->Output();
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
