<?php 
    require('fpdf/fpdf.php');

    require "functions.php";

    $id = $_GET["idBooking"];

    $bank = query(
        "SELECT audit.idBooking AS 'BOOKING ID', audit.checkIn AS 'CHECK-IN', audit.checkOut AS 'CHECK-OUT', pemesanan.alamatHotel AS 'ALAMAT', kamar.hargaKamar AS 'HARGA'
        FROM audit
        INNER JOIN pemesanan on audit.idBooking = pemesanan.idBooking
        INNER JOIN kamar on audit.noKamar = kamar.noKamar
        WHERE audit.idBooking = '$id';"
    )[0];

    $total = query(
        "SELECT SUM(kamar.hargaKamar) AS 'HARGA'
        FROM audit
        INNER JOIN pemesanan on audit.idBooking = pemesanan.idBooking
        INNER JOIN kamar on audit.noKamar = kamar.noKamar
        WHERE audit.idBooking = '$id';"
    )[0];

    $show = query(
        "SELECT pemesanan.idBooking AS 'BOOKING ID',kamar.jenisKamar AS 'JENIS KAMAR', kamar.hargaKamar AS 'HARGA KAMAR'
        FROM audit
        INNER JOIN pemesanan on audit.idBooking = pemesanan.idBooking
        INNER JOIN kamar on audit.noKamar = kamar.noKamar
        WHERE pemesanan.idBooking = '$id'
        -- GROUP BY kamar.jenisKamar;"
    );

    // $temp = $show['JENIS KAMAR'];

    // $itung = query(
    //     "SELECT pemesanan.idBooking AS 'BOOKING ID', COUNT(kamar.jenisKamar) AS 'itung', kamar.jenisKamar
    //     FROM audit
    //     INNER JOIN pemesanan on audit.idBooking = pemesanan.idBooking
    //     INNER JOIN kamar on audit.noKamar = kamar.noKamar
    //     WHERE audit.idBooking LIKE '$id' AND kamar.jenisKamar = '$temp'
    //     GROUP BY audit.idBooking;"
    // );


    $idBooking = $bank["BOOKING ID"];
    $checkIn = $bank["CHECK-IN"];
    $checkOut = $bank["CHECK-OUT"];
    $alamat = $bank["ALAMAT"];
    $bayar = $total["HARGA"];

    $pdf = new FPDF();

    $pdf->AddPage();
    
    $pdf->Ln(10);
    $pdf->Image('dark.jpg',0,0,-1);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFont('Arial','B',25);
    $pdf->Cell(0,0,'iRooms',0,200,'C');
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0,15,'OYO HOTELS',0,200,'C');
    $pdf->Ln(5);
    $pdf->SetX(33);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,5,'Detail Booking',0,3,'L');

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,5,"BOOKING ID: $idBooking",0,3,'L');

    $pdf->Cell(0,5,"CHECK-IN: $checkIn",0,3,'L');

    $pdf->Cell(0,5,"CHECK-OUT: $checkOut",0,3,'L');

    $pdf->Cell(0,5,"ALAMAT: $alamat",0,3,'L');

    $pdf->Cell(0,5,"Total pembayaran yang harus dibayarkan-Rp. $bayar",0,3,'L');

    $pdf->Image("irooms.jpg",37,80,-180);

    $pdf->Ln(110);
    $pdf->SetX(33);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(0,5,"Ini adalah janji kami untuk anda",0,3,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(0,5,"Free Wifi | Linen Bersih | Kamar mandi Higienis",0,3,'L');
    $pdf->Ln(5);
    $pdf->SetX(33);

    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(0,5,"Rincian Pembayaran",0,3,'L');
    
    $pdf->SetFont('Arial','',10);
    foreach($show as $row):
        $jenis = $row["JENIS KAMAR"];
        $harga = $row["HARGA KAMAR"];


        $pdf->Cell(0,5,"1 x $jenis        Rp. $harga",0,3);
        // $pdf->Cell(0,10,"      $harga",0,3,'L');
    endforeach;  
    $pdf->Cell(0,5,"Total              Rp. $bayar",0,3,'L');  


    $pdf->Output();
?>

    