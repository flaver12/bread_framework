<?php
/**
 * @author syz <aurel@swagpeople.ch>
 * @copyright syz, swagpeople.ch (c) 2014
 *
 * create a pdf with tcpd
 **/

require_once(ROOT.'/core/library/tcpdf/tcpdf.php');

class PDF extends TCPDF {
	public function Header() {
		$this->setJPEGQuality(90);
		$this->Image(ROOT.'/weebroot/imgs/logo.png', 120, 10, 75, 0, 'PNG', 'http://www.gentleman-informatik.ch');
 
	}
	public function Footer() {
		$this->SetY(-15);
		$this->SetFont(PDF_FONT_NAME_MAIN, 'I', 8);
		$this->Cell(0, 10, 'gentleman-informatik.ch - Eh Tighty sach!', 0, false, 'C');
	}
	public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
		$this->SetXY($x+20, $y); // 20 = margin left
		$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		$this->Cell($width, $height, $textval, 0, false, $align);
	}

	protected function registerBill($id, $price){
		$query = new DBQuery();
		$q = "INSERT INTO bBill (customer_id, price, refNum) VALUES ($id, '$price', '5627628')";
		$query->sendQuery($q, true);
	}
}	
