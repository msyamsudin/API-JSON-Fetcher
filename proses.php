<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
<?php
$idpel = filter_var($_POST['inIDPEL'], FILTER_SANITIZE_SPECIAL_CHARS);
$waktu = filter_var($_POST['inWaktuCetak'], FILTER_SANITIZE_SPECIAL_CHARS);
$nama = filter_var($_POST['inNama'], FILTER_SANITIZE_SPECIAL_CHARS);
$standMeter = filter_var($_POST['inStandMeter'], FILTER_SANITIZE_SPECIAL_CHARS);
$daya = filter_var($_POST['inDaya'], FILTER_SANITIZE_SPECIAL_CHARS);
$tagPLN = filter_var($_POST['inTagPLN'], FILTER_SANITIZE_SPECIAL_CHARS);
$ref = filter_var($_POST['inREF'], FILTER_SANITIZE_SPECIAL_CHARS);


$mustCharHaveHead = 26;
// Hitung jumlah karakter
$charNama = strlen($nama);
$charStand = strlen($standMeter);

// Hitung selisih karakter
if($charNama <= 26){
    $selisihCharNama = $mustCharHaveHead-$charNama;
} else {
    $selisihCharNama = $charNama-$mustCharHaveHead;
}

$selisihCharStand = $mustCharHaveHead-$charStand;

// Looping untuk penyesuaian jarak
$helperCount = 1;
for($selisihCharNama; $helperCount<=$selisihCharNama; $helperCount++){
    $jarakNamaNo[] = "&nbsp;";
}

$helperCount2 = 1;
for($selisihCharStand; $helperCount2<=$selisihCharStand; $helperCount2++){
    $jarakStandTgl[] = "&nbsp;";
}

// Konversi array menjadi string
$impJarakNamaNo = implode('',$jarakNamaNo);
$impJarakStandTgl = implode('',$jarakStandTgl);



$mustCharHave = 17;

$biayaAdmin = $_POST['inBiayaAdmin'];
$denda = $_POST['inDenda'];
$totalBayar = $_POST['inTotalBayar'];

// Hitung jumlah karakter
$charTagPLN = strlen($tagPLN);
$charBiayaAdm = strlen($biayaAdmin);
$charDenda = strlen($denda);
$charTotalBayar = strlen($totalBayar);

// Hitung selisih karakter
$selisihCharTagPLN = $mustCharHave-$charTagPLN;
$selisihCharAdm = $mustCharHave-$charBiayaAdm;
$selisihCharDenda = $mustCharHave-$charDenda;
$selisihCharTotal = $mustCharHave-$charTotalBayar;

// Looping untuk penyesuaian jarak
$a=1;
for($selisihCharTagPLN; $a<=$selisihCharTagPLN; $a++){
    $jarakTagPLN[] = "&nbsp;";
}
$b=1;
for($selisihCharAdm; $b<=$selisihCharAdm; $b++){
    $jarakAdm[] = "&nbsp;";
}
$c=1;
for($selisihCharDenda; $c<=$selisihCharDenda; $c++){
    $jarakDenda[] ="&nbsp;";
}
$d=6;
for($selisihCharTotal; $d<=$selisihCharTotal; $d++){
    $jarakTotal[] ="&nbsp;";
}

// Konversi array menjadi string
$impJarakTagPLN = implode('',$jarakTagPLN);
$impJarakAdm = implode('',$jarakAdm);
$impJarakDenda = implode('',$jarakDenda);
$impJarakTotal = implode('',$jarakTotal);
?>
  
<style type="text/css">
        #struk {
            font-family:"Courier New";
            font-size:13.5px;
            width:20cm;
            margin-top: 5px;
            line-height: 17px;
        }
        @media print {
        @page { margin: 0}
            body { 
                margin-top: 0px; 
                background: #fff; 
                color: #4F5155; 
                font-family:"Courier New";
                font-size:13.5px;
                line-height: 17px;
                -webkit-print-color-adjust: exact;
            }
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
              }
            
        }
</style>

<body>
    
    <div id="logo">
        <table style="margin-left: 2px; width: 680px; margin-bottom: 0px; margin-top: 13px;">
                            <tr>
                    <td class="logo_mitra_bl" style="float: left;">
                        <img src="logo_mitra_bl_fix.png">                    
                    </td>
                    <td class="barcode" style="float: right;">
                        <img src="https://mpdesktop.fastpay.co.id/fp_web_struk_service/index.php/service/generate_barcode/<?=$idpel?>/10" alt="barcode idpel <?=$idpel?>">
                        <!-- <img src="http://10.0.76.46/struk/struk_service/index.php/service/generate_barcode//10" alt="barcode idpel "> -->
                    </td> 
                    <td class="logo_biller" style="float: right;">
                                            </td>
                </tr>
                    </table>    
    </div>
    <html>
    <div id="struk" style="margin-left: 4px;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>STRUK&nbsp;PEMBAYARAN&nbsp;TAGIHAN&nbsp;LISTRIK</strong>
        <!-- <br>IDPEL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?=$idpel?> -->
        <br>NAMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?=$nama.$impJarakNamaNo?>NO&nbsp;REF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?=$ref?>
        <br>STAND&nbsp;METER&nbsp;&nbsp;:&nbsp;<?=$standMeter.$impJarakStandTgl?>TANGGAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?=$waktu?>
        <br>TARIF/DAYA&nbsp;&nbsp;&nbsp;:&nbsp;<?=$daya?>&nbsp;VA
        <br>TAG&nbsp;+&nbsp;BANK&nbsp;&nbsp;&nbsp;:&nbsp;Rp<?=$impJarakTagPLN.$tagPLN?>
        <br>BIAYA&nbsp;ADMIN&nbsp;&nbsp;:&nbsp;Rp<?=$impJarakAdm.$biayaAdmin?>
        <br>TOTAL&nbsp;DENDA&nbsp;&nbsp;:&nbsp;Rp<?=$impJarakDenda.$denda?>
        <br>-----------------------------------
        <br><p style="font-size:121%; font-weight: bold;">TOTAL&nbsp;BAYAR&nbsp;&nbsp;:&nbsp;Rp<?=$impJarakTotal.$totalBayar?></p>
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>PLN&nbsp;MENYATAKAN&nbsp;STRUK&nbsp;INI&nbsp;SEBAGAI&nbsp;BUKTI&nbsp;PEMBAYARAN&nbsp;YANG&nbsp;SAH.</strong>
        <br>"Untuk&nbsp;Informasi&nbsp;Lebih&nbsp;Lanjut,&nbsp;Silahkan&nbsp;Hubungi&nbsp;Call&nbsp;Center&nbsp;123&nbsp;Atau&nbsp;Kantor&nbsp;PLN&nbsp;Terdekat."
        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terima&nbsp;Kasih
    </div>
    </html>
    <button style="height:50px;width:800px;font-size:25px" id="btnHome" hidden>Go....... Home...!</button>

    
    <script language="javascript">
        //window.onload = function() { window.print();  }
        
        var OLECMDID = 6;
        /* OLECMDID values:        * 6 - print        * 7 - print preview        * 1 - open window        * 4 - Save As        */
        if (navigator.appName == "Microsoft Internet Explorer")
        {
             var PrintCommand = '<object ID="PrintCommandObject" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></object>';
             document.body.insertAdjacentHTML('beforeEnd', PrintCommand);
             if(PrintCommandObject)
             {
               try
               {
                PrintCommandObject.ExecWB(OLECMDID, -1);
                PrintCommandObject.outerHTML = "";
               }
               catch(e){
                 window.print();
                 }
             }
        }
        else {
            window.print();
        }
        
    </script>
</body>
<script>
    var is_chrome = function () { return Boolean(window.chrome); }
    window.onload = function() {
        if(is_chrome){
            /*
            * These 2 lines are here because as usual, for other browsers,
            * the window is a tiny 100x100 box that the user will barely see.
            * On Chrome, it needs to be big enough for the dialogue to be read
            * (NB, it also includes a page preview).
            */
            window.moveTo(0,0);
            window.resizeTo(640, 480);

            // This line causes the print dialogue to appear, as usual:
            window.print();

            /*
            * This setTimeout isn't fired until after .print() has finished
            * or the dialogue is closed/cancelled.
            * It doesn't need to be a big pause, 500ms seems OK.
            */
            setTimeout(function(){
                $("button#btnHome").show();
            }, 500);
        } else {
            // For other browsers we can do things more briefly:
            window.print();
            window.close();
        }
    }

        $("#btnHome").on("click", function() {
            window.location.href = "./";
        });
</script>
