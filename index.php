<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generar PDF</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
  <?php
  require_once "./funciones_pdf/MiFPDF.php";
  require_once "./funciones_pdf/MiPDFLib.php";

  function fpdf() {
    $titulo = $_GET['titulo'];
    $contenido = $_GET['contenido'];
    $flag = $_GET['flag'];
    if ($flag) {
      $tipoletra = $_GET['tipoletra'];
      $tamano = $_GET['tamano'];
      $alineacion = $_GET['alineacion'];
      $pdf = new MiFPDF($titulo, $contenido, $tipoletra, $tamano, $alineacion);
    } else {
      $pdf = new MiFPDF($titulo, $contenido);
    }
    $pdf->mostrarPDF();
    $pdf_g = $pdf->generaDoc();
    $pdf->almacenaDoc($pdf_g);
    $pdf->devuelveDoc($pdf_g);
  }

  function pdflib() {
    $titulo = $_GET['titulo'];
    $contenido = $_GET['contenido'];
    $flag = $_GET['flag'];
    if ($flag) {
      $tipoletra = $_GET['tipoletra'];
      $tamano = $_GET['tamano'];
      $alineacion = $_GET['alineacion'];
      $pdf = new MiPDFLib($titulo, $contenido, $tipoletra, $tamano, $alineacion);
    } else {
      $pdf = new MiPDFLib($titulo, $contenido);
    }
    $pdf->mostrarPDF();
    $pdf_g = $pdf->generaDoc();
    $pdf->almacenaDoc($pdf_g);
    $pdf->devuelveDoc($pdf_g);
  }

  if (sizeof($_GET) == 4 || sizeof($_GET) == 7) {
    $libreria = $_GET['libreria'];
    if($libreria == "fpdf") fpdf();
    if ($libreria == "pdflib") pdflib();
  }
  ?>

  <div class="container my-4">
    <p class="fs-2 fw-bold text-center font-monospace">Generar PDF</p>
    <form method="GET" action=".">
      <div class="mb-3">
        <label class="form-label">Titulo <span class="text-danger">*</span></label>
        <input type="text" name="titulo" placeholder="Escribe aquí el título del PDF..." class="form-control" maxlength="30" required>
        <div class="form-text">Tamaño máximo: 30 caracteres</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Contenido <span class="text-danger">*</span></label>
        <textarea class="form-control" name="contenido" placeholder="Escribe aquí el contenido del PDF..." rows="5" maxlength="255" required></textarea>
        <div class="form-text">Tamaño máximo: 255 caracteres</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Librería <span class="text-danger">*</span></label>
        <select class="form-select" name="libreria" required>
          <option value="fpdf">FPDF</option>
          <option value="pdflib">PDFlib</option>
        </select>
      </div>
      <div id="opciones" onclick="opciones()" class="col-2 btn btn-secondary">Más Opciones</div>
      <hr>
      <input id="flag" type="hidden" name="flag" value="0">
      <div class="mb-3">
        <label class="form-label">Tipo de Letra</label>
        <select class="form-select" name="tipoletra" id="op1" disabled>
          <option value="Arial">Arial</option>
          <option value="Helvetica">Helvetica</option>
          <option value="Courier">Courier</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Tamaño (en px)</label>
        <input type="number" name="tamano" min=10 max=40 step=2 class="form-control" value="12" id="op2" disabled>
      </div>
      <div id="alineacion" class="mb-3">
        <label class="form-label">Alineación</label>
        <select class="form-select" name="alineacion" id="op3" disabled>
          <option value="L">Izquierda</option>
          <option value="R">Derecha</option>
          <option value="C">Centrada</option>
        </select>
      </div>
      <div class="mt-4 text-center">
        <button type="submit" class="col-4 btn btn-primary">Crear PDF</button>
        <div class="form-text">Se guarda automáticamente en la carpeta <b>/pdf</b> del proyecto</div>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function opciones() {
      let opciones = document.getElementById("opciones");
      let op1 = document.getElementById("op1");
      let op2 = document.getElementById("op2");
      let op3 = document.getElementById("op3");

      op1.disabled = !op1.disabled;
      op2.disabled = !op2.disabled;
      op3.disabled = !op3.disabled;

      let flag = document.getElementById("flag");
      if (Number(flag.value)) {
        flag.value = "0";
        opciones.classList.remove("btn-primary");
        opciones.classList.add("btn-secondary");
      } else {
        flag.value = "1";
        opciones.classList.remove("btn-secondary");
        opciones.classList.add("btn-primary");
      }
    }
  </script>
</body>

</html>