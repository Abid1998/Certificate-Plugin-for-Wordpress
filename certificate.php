<?php
/*
Plugin Name:  Certificate Generator Plugin Created by Mohd Abid
Description: This plugin is used for Certificate Generation and checking if database data exists. If database data exists, then a certificate is generated.
Version: 4.0
Author: Mohd Abid
Author URI:  https://linkedin.com/in/mohd-abid/
Plugin URI:  https://github.com/Abid1998/Certificate-Plugin-for-Wordpress
*/

// Enqueue the CSS file
function enqueue_certificate_styles() {
    wp_enqueue_style('certificate-styles', plugins_url('certificate/certificate-style.css'), array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_certificate_styles');

// Include FPDF library
require 'fpdf/fpdf.php';

// Define PDF class
class PDF extends FPDF
{
}


function process_certificate_request() {
    if (isset($_POST['Submit'])) {
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $wpdb;
        // Your table name
        $table_name = $wpdb->prefix . 'tblstcertificate';
        $Stid = $_POST['Stid'];
        $sql = $wpdb->prepare("SELECT * FROM $table_name WHERE Stid = %d", $Stid);

        // Use $wpdb->get_row to fetch a single row
        $result = $wpdb->get_row($sql, ARRAY_A);

        if ($result !== null) {
           
            $Stid = $result['Stid'];
            $Stname = $result['name'];
            $Stdate = $result['StDate'];
            $StPer = $result['StPer'];

            $pdf = new PDF();
            $pdf->AddPage('L', 'A4');
            $pdf->header();
            $pdf->Ln(15);
            $pdf->SetFont('Arial', '', 10);
            $theme_path = get_template_directory() . '/FEA.jpg';
            $pdf->Image($theme_path, 0, 0, 295, 210);
            
            // Add Name text
            $pdf->SetY(75);
            $pdf->SetFont('Arial', '', 30);
            $pdf->Cell(0, 25, $Stname , 0, 1, 'C');
        
            // Add Student Id text
            $pdf->SetFont('Arial', '', 13);
            $pdf->SetX(92);
            $pdf->Cell(0, 20, $Stid , 0, 'C');
        
            // Add Student Per text
            $pdf->SetFont('Arial', '', 13);
            $pdf->SetY(110);
            $pdf->SetX(170);
            $pdf->Cell(0, 0, $StPer . '%', 0, 'C');
        
            // Add Student Date text
            $pdf->SetFont('Arial', '', 13);
            $pdf->SetY(173);
            $pdf->SetX(39);
            $pdf->Cell(0, 0, $Stdate, 0, 'C');
            $pdf->Output();
            exit;
        } else {
            echo "<script>alert('Student id does not exist');</script>";
        }
    }
}


// Function to generate the certificate form shortcode
function generate_certificate_form() {
    ob_start();
    ?>
    <form action="" method="POST" class="from-Certificate">
        <input type="number" class="form-control form-control-sm mt-4 text-center" placeholder="Enter student id"
               name="Stid" required/><br />
        <input type="submit" value="Submit" class="btn btn-sm col-md-12 my-3 btn-color" name="Submit">
    </form>
    <?php
    return ob_get_clean();
}

// Add action hooks
add_action('init', 'process_certificate_request');
add_shortcode('certificate_form', 'generate_certificate_form');
?>

