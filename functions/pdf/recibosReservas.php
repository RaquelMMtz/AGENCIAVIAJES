<?php

use Mpdf\Mpdf;
use Mpdf\Output\Destination;



require_once __DIR__ . '/../../vendor/autoload.php';

include(__DIR__ . "/../../core/config.php");
include(__DIR__ . "/../../functions/sessions/functions.php");
validarAcceso();
//llamar clase ventas
include(__DIR__ . "/../../classes/viajes/reservarClass.php");
$reservasClass = new reservarClass();
//capturar id ventas
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reservas = $reservasClass->getReservasRecibos($id);
    $id_reservas = $reservas['idReserva'];
$fecha_reserva = $reservas['fechaModifica'];
$llegada = $reservas['llegada'];
$salida = $reservas['salida'];
$nombre_hotel = $reservas['nombre'];
$precio_hotel = $reservas['precio'];
$destino = $reservas['destino'];
$duracion = $reservas['duracion'];
} else {
  //  header("Location: ./CENC_Ventas.php");
}

$template = "";

$mpdf = new Mpdf();



$mpdf->WriteHTML('
<style>
  
.invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    line-height: 24px;
    color: #555;
  }
  
  .invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
    border-collapse: collapse;
  }
  
  .invoice-box table td {
    padding: 5px;
    vertical-align: top;
  }
  
  .invoice-box table tr td:nth-child(2) {
    text-align: right;
  }
  
  .invoice-box table tr.top table td {
    padding-bottom: 20px;
  }
  
  .invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
  }
  
  .invoice-box table tr.information table td {
    padding-bottom: 40px;
  }
  
  .invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
  }
  
  .invoice-box table tr.details td {
    padding-bottom: 20px;
  }
  
  .invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
  }
  
  .invoice-box table tr.item.last td {
    border-bottom: none;
  }
  
  .invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
  }
  
  @media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
      width: 100%;
      display: block;
      text-align: center;
    }
  
    .invoice-box table tr.information table td {
      width: 100%;
      display: block;
      text-align: center;
    }
  }

</style>
<title>Recibo</title>
<div class="invoice-box" style="width: 100%;">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="' . $root . '/assets/img/vuelo-en-avion.png" width="100px" alt="Company logo" />
                        </td>

                        <td>
                            Invoice #: ' . $id_reservas . '<br />
                            Fecha Reserva: ' . $fecha_reserva . '<br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            Agenvia Viajes.<br />
                            12345 Sunny Road<br />
                            Sunnyville, TX 12345
                        </td>

                        <td>
                            Acme Corp.<br />
                            CECN<br />
                            viajes@hotmail.com
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Fecha Llegada: <br />
                            ' . $llegada . '
                        </td>

                        <td>
                            Fecha Salida:<br />
                            ' . $salida . '
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>Item</td>
            <td>Precio</td>
        </tr>

        <tr class="item">
            <td style="width: 200px;">Hotel: ' . $nombre_hotel . '</td>
            <td>$' . $precio_hotel . '</td>
        </tr>

        <tr class="item">
            <td>Destino: ' . $destino . '</td>
        </tr>

        <tr class="item">
            <td>Duracion: ' . $duracion . '</td>
        </tr>

        <tr class="total">
            <td></td>
            <td>Total: $' . $precio_hotel . '</td>
        </tr>
    </table>
</div>
');


$mpdf->Output('recibo.pdf', \Mpdf\Output\Destination::INLINE);
