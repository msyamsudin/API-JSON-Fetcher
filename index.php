<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <title>BukaFastpay</title>
  </head>
  <body>
      <style>
          body {background-color: #949494;}
      </style>

    <div class="container pt-3">
        <h1 class="display-4 text-white">Bukalapak x Fastpay | PLN</h1>
    </div>

    <div class="container pt-3">
        <div class="input-group input-group-sm">
            <input type="text" class="form-control" id="inAPIurl" name="inAPIurl" placeholder="INSERT URL API..." required>
            <div class="input-group-append">
                <button id="btnFetchData" type="button" class="btn btn-warning btn-sm">Fetch Data</button>
           </div>
        </div>
    </div>

    <!-- CONTENT -->
    <script>
    $(function(){
        // Do something..
    });       
    </script>

    <div class="container pt-3">
        <form action="proses.php" method="post" id="myForm">
            <div class="col-8 mx-auto text-center form p-2">

                    <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">NO. REF</span>
                            </div>
                            <input type="text" class="form-control" id="inREF" name="inREF" required readonly>
                        </div>
            
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Waktu Cetak</span>
                            </div>
                            <input type="text" class="form-control" id="inWaktuCetak" name="inWaktuCetak" required readonly>
                        </div>
            
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID Pelanggan</span>
                            </div>
                            <input type="text" class="form-control" id="inIDPEL" name="inIDPEL" required readonly>
                        </div>
            
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nama Pelanggan</span>
                            </div>
                            <input type="text" class="form-control" id="inNama" name="inNama" required readonly>
                        </div>
            
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tarif/Daya</span>
                            </div>
                            <input type="text" class="form-control" id="inDaya" name="inDaya" required readonly>
                        </div>
            
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Stand Meter</span>
                            </div>
                            <input type="text" class="form-control" id="inStandMeter" name="inStandMeter" required readonly>
                        </div>
            
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">TAG PLN+Bank</span>
                            </div>
                            <input type="text" class="form-control hitungTagDenda data-for-modal" id="inTagPLN" name="inTagPLN"required readonly>
                        </div>
            
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Total Denda</span>
                            </div>
                            <input type="text" class="form-control hitungTagDenda data-for-modal" id="inDenda" name="inDenda" required readonly>
                        </div>

                        <!-- Hidden [Form bantuan] Total biaya tag+denda -->
                        <input type="hidden" class="form-control" id="inTagDenda" name="inTagDenda" value="0" required>
                      
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Biaya Admin</span>
                            </div>
                            <input type="text" class="form-control data-for-modal" id="inBiayaAdmin" name="inBiayaAdmin" value="0" required readonly>
                        </div>
            
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control HitungUlangAdmin data-for-modal" id="inTotalBayar" name="inTotalBayar" required>
                            <div class="input-group-append">
                                 <!-- Button trigger modal -->
                                <button type="button" id="btnKonfirmasi" class="btn btn-danger" data-toggle="modal" data-target="#konfirmasiModal">KONFIRMASI</button>
                            </div>
                        </div>
            
                        <!-- Modal -->
                        <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="konfirmasiModalLabel">Yakin simpan data di bawah ini?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                            <th class="table-dark" scope="row">Tag PLN+Bank</th>
                                            <td id="tagModal">dummy</td>
                                            </tr>
                                            <tr>
                                            <th class="table-dark" scope="row">Denda</th>
                                            <td id="dendaModal">dummy</td>
                                            </tr>
                                            <tr>
                                            <th class="table-dark" scope="row">Admin</th>
                                            <td id="adminModal">dummy</td>
                                            </tr>
                                            <tr>
                                            <th class="table-dark" scope="row">Total Bayar</th>
                                            <td id="bayarModal">dummy</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                </div>
                                <div class="modal-footer btn-group btn-group-toggle">
                                    <button id="btnNantiDulu" type="button" class="btn btn-danger" data-dismiss="modal">Nanti dulu</button>
                                    <button id="btnOK" data-dismiss="modal" type="button" class="btn btn-success">Oke deh</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                        
                        <div class="btn-group float-right">
                            <button id="btn-struk-bpjs" class="btn btn-sm mt-2 btn-warning" type="button">Cetak Struk BPJS</button>
                            <!-- <button class="btn btn-sm mt-2 btn-primary" type="submit">Submit Data</button> -->
                        </div>


                    </div>
                    <!-- End Div row -->
        </form>
    </div>

    <script>
        function resetForm() {
            $("input#inTotalBayar").val('');
            $("input#inBiayaAdmin").val(0);
        }

        function resetDataModal() {
            $("#tagModal").removeData();
            $("#dendaModal").removeData();
            $("#adminModal").removeData();
            $("#bayarModal").removeData();
        }

        $("button#btn-struk-bpjs").on("click", function(){
            window.location.href = "./bpjs";
        })

        $("input.hitungTagDenda").keyup(function() {
            let tagPLN = $("input#inTagPLN").val();
            let denda = $("input#inDenda").val();
            let pureTagPLN = tagPLN.replace(/\./g,"");
            let pureDenda = denda.replace(/\./g,"");
            let totalTagDenda = parseInt(pureTagPLN)+parseInt(pureDenda);
            $("input#inTagDenda").attr("value", totalTagDenda);
        });

        $("input#inTagPLN").focus(function(){
            resetForm();
        })
        
        $("input#inDenda").focus(function(){
            resetForm();
        })

        $("input#inBiayaAdmin").focus(function() {
            let inTagDenda = $("input#inTagDenda").val();

            // Hitung hiaya admin
            let headVal = inTagDenda.charAt(0);
            let zeroVal = inTagDenda.length-2;
            let zeroValArr = new Array();
            
            if(headVal == 1 && zeroVal < 4) {
                headVal = 2;
            }

            for(let i=0; i<zeroVal; i++) {
                zeroValArr[i] = 0;
            }

            let fixADM = headVal+zeroValArr.join().replace(/,/g,"")
            $("input#inBiayaAdmin").prop("value",fixADM);

            let biayaADM = $("input#inBiayaAdmin").val();
            let purebiayaADM = biayaADM.replace(/\./g,"");
            let totalBayar = parseInt(inTagDenda)+parseInt(purebiayaADM);
            $("input#inTotalBayar").val(totalBayar);
        });

        $("input.HitungUlangAdmin").keyup(function(){
            let totalSementara = $("input#inTotalBayar").val();
            let pureTotal = totalSementara.replace(/\./g,"");
            let TagDenda = $("input#inTagDenda").val();
            let fixBiayaADM = parseInt(pureTotal)-parseInt(TagDenda);

            $("input#inBiayaAdmin").prop("value", fixBiayaADM);
        })

        $("button#btnKonfirmasi").on("click", function() {
            let arrData = $("input.data-for-modal").map(function() {
                return $(this).val();
            }).get();

            $("#tagModal").text(arrData[0]).mask('000.000.000.000.000', {reverse: true});
            $("#dendaModal").text(arrData[1]).mask('000.000.000.000.000', {reverse: true});
            $("#adminModal").text(arrData[2]).mask('000.000.000.000.000', {reverse: true});
            $("#bayarModal").text(arrData[3]).mask('000.000.000.000.000', {reverse: true});           
        });

        $("button#btnNantiDulu").on("click", function() {
            resetDataModal();
        });

        $("button#btnOK").on("click", function() {
            $("#inTagPLN").mask('000.000.000.000.000', {reverse: true});
            $("#inDenda").mask('000.000.000.000.000', {reverse: true});
            $("#inBiayaAdmin").mask('000.000.000.000.000', {reverse: true});
            $("#inTotalBayar").mask('000.000.000.000.000', {reverse: true}); 
            $("#myForm").submit();
        });

        // Set tanggal dan waktu pembayaran
        let dateName = function ( timedata ) {
            yearN = timedata.substr(0, 4);
            monthN = timedata.substr(5, 2);
            dayN = timedata.substr(8, 2);
            timeN = timedata.substr(11, 5);

        let monthNames = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "Mei",
            "Jun",
            "Jul",
            "Ags",
            "Sep",
            "Okt",
            "Nov",
            "Des"
        ];

        let dayNames = [
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu",
            "Minggu"
        ];

        let today = new Date( yearN, monthN-1, dayN );
        let dateDay = today.getDate();
        let dayname = dayNames[today.getDay()-1];
        let dateMonth = monthNames[today.getMonth()];
        let dateYear = today.getFullYear();

        let fullDate = dayname + ", " + dateDay + " " + dateMonth + " " + dateYear + ", " + timeN + " WIB";
        $("input#inWaktuCetak").val(fullDate);
    };       

    </script>
    <!-- END CONTENT -->

    <!-- Fetch and place data from Bukalapak API -->
    <script>
        $("button#btnFetchData").on("click", function(){
            let url = $("input#inAPIurl").val();
            $.get(url, function(data){
                $("input#inREF").val(data['data']['reference_number']);
                $("input#inWaktuCetak").val(data["nothing"]); // belum diset
                $("input#inIDPEL").val(data["data"]["customer_number"]);
                $("input#inNama").val(data["data"]["customer_name"]);
                $("input#inDaya").val(data["data"]["segmentation"]+" / "+data['data']['power']);
                $("input#inStandMeter").val(data["data"]["stand_meter"]);
                $("input#inTagPLN").val(data["data"]['bills'][0]['amount']);
                $("input#inDenda").val(data["data"]['bills'][0]['penalty_fee']);

                // set nama hari, tanggal dan waktu pembayaran
                dateName( data["data"]["succeeded_at"] );
            });
                $("input#inTagPLN").focus();
        });
    </script>
    </body>
</html>