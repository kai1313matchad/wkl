<?php
	$pdf = new Pdf2('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetTitle('Daftar Produk');
	$pdf->SetHeaderData();
	$pdf->setFooterData(array(255,64,0), array(0,64,128));
	$pdf->setImageScale(1.53);
	$pdf->SetHeaderMargin(40);
	$pdf->SetTopMargin(30);
	$pdf->setFooterMargin(15);
	$pdf->SetAutoPageBreak(true);
	$pdf->SetAuthor('Author');
	$pdf->SetDisplayMode('real', 'default');
	$pdf->AddPage();
	$i=0;
	// $html='<h5>Product List Wiklan.com</h5>
	// 		<table bgcolor="#666666" cellpadding="3" border="1">
	// 			<tr bgcolor="#ffffff">
	// 				<th width="5%" align="center">No</th>
	// 				<th width="45%" align="center">Keterangan</th>
	// 				<th width="50%" align="center">Gambar</th>	
	// 			</tr>';
	// foreach ($produk->result_array() as $row) 
	// {
	// 	$i++;
	// 	$html.='<tr bgcolor="#ffffff">
	// 			<td align="center">'.$i.'</td>
	// 			<td>'.$row['item_title'].'</td>
	// 			<td align="center"><img src="marketplace/limapuluh/'.$row['limapuluh'].'" alt="test alt attribute" width="100" height="100"  /></td>
	// 		</tr>';
	// }
	// $html.='</table>';
	$html = '<div style="padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; width: 1170px;">
	<div style="position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left;">	
		
		<div id="container" style="margin: auto; padding:0; display: table; border: 1px solid #ddd; width: 100%; margin-top: 20px;">
			<div id="row" style="display: table-row;">

				<div id="body">
					
					<div id="middle" style="display: table-cell; width: 100%; padding: 5px;">
						<table style="border-collapse: collapse; width: 1100px;">
							<tr>
								<td rowspan="3" style="padding: 10px;" valign="top">
									<div id="logo-box" style="width: 100%;">
										<img src="marketplace/images/logo_blog.jpg" width="100">
									</div>
								</td>
							</tr>
							<tr>
								<td style="border-bottom: 1px solid #f5f5f5;  padding: 10px 10px 10px 0;" valign="top">
									<div style="font-size: 18px;">Jl. Raya Padjajaran, Kota Bogor ( Depan MC Donalds) sisi B vvsss sdaav vdsvs</div>
									<span style="display: inline-block; background-color: #98ce44; min-width: 10px; padding: 3px 7px; font-size: 12px; font-weight: bold; line-height: 1; color: #fff; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 10px;">Billboard</span>
									<div style="font-size: 11px; color: #01b7f2; margin-top: 10px;">#3333020001</div>
									<div style="font-size: 11px; text-transform: uppercase; margin-top: 10px;">JAWA TENGAH - KEBUMEN - JALAN PROTOKOL</div>
								</td>
								<td valign="top" style="border-right: 1px solid #f5f5f5; padding: 10px;">
									<span style="color: #98ce44; font-size: 20px; font-weight: bold; text-align: right; padding-right: 10px;">Rp. 320.000.000</span>
								</td>
								<td style="border-bottom: 1px solid #f5f5f5; padding: 10px; text-transform: uppercase; text-align: center;">
									<h6 style="font-size: 10px; color: #01b7f2; text-transform: uppercase;">tipe</h6>
						  			<p style="font-size: 20px; color: #7db921; margin-top: -15px;">vertikal</p>
								</td>
							</tr>
							<tr>
								<td style="border-right: 1px solid #f5f5f5" colspan="2">
									<table style="width: 100%; margin-top: -20px;">
										<tr>
											<td style="padding-left: 15px; border-right: 1px solid #f5f5f5;" valign="top">
												<h6 style="font-size: 10px; color: #01b7f2; text-transform: uppercase;">awal tayang</h6>
												<p style="font-size: 10px; text-transform: uppercase; margin-top: -15px;">WED NOV 13, 2013 7:50 AM</p>
											</td>
											<td style="padding-left: 15px; border-right: 1px solid #f5f5f5;">
												<h6 style="font-size: 10px; color: #01b7f2; text-transform: uppercase;">akhir tayang</h6>
												<p style="font-size: 10px; text-transform: uppercase; margin-top: -15px;">WED NOV 13, 2013 7:50 AM</p>
											</td>
											<td style="padding-left: 15px;">
												<h6 style="font-size: 10px; color: #01b7f2; text-transform: uppercase;">durasi</h6>
												<p style="font-size: 10px; text-transform: uppercase; margin-top: -15px;">WED NOV 13, 2013 7:50 AM</p>
											</td>
										</tr>
									</table>
								</td>
								<td style="padding: 10px; text-transform: uppercase; text-align: center;">
									<h6 style="font-size: 10px; color: #01b7f2; text-transform: uppercase;">ukuran</h6>
						  			<p style="font-size: 20px; color: #7db921; margin-top: -15px;">8x6 m</p>
								</td>
							</tr>
						</table>
					</div>
				
				</div>

			</div>
		</div>

	</div>
</div>';
	$pdf->Image('assets/images/logo_wiklan.png',10,10,15);
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('daftar_produk.pdf', 'I');
?>