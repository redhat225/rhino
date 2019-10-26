<?php
/**
 * HTML2PDF Library - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2016 Laurent MINGUET
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
     try
        {
            $html2pdf = new HTML2PDF('P',array(80,100),'fr');
            $html2pdf->setDefaultFont('Helvetica');
            $html2pdf->pdf->SetProtection(array('modify','copy'));
            $html2pdf->writeHTML($this->fetch('content'), isset($_GET['vuehtml']));
            $path=APP."Files".DS."manager".DS.$institution->slug.DS."vouchers".DS.$payment->path_payment;
            $html2pdf->Output($path,'F');
            $payment->route="/manager/visit-invoices/show-meeting-voucher/".$payment->id;

            $path_image = WWW_ROOT.'Files'.DS.'manager'.DS.$institution->slug.DS.'vouchers_images'.DS.$payment->code_payment.'-%d.jpg';

            $payment->voucher_route=$path_image;
            $payment->slug= $institution->slug;
           
            shell_exec('convert -density 150 '.$path.' '.$path_image);

            echo json_encode($payment);
        }
        catch(HTML2PDF_exception $e) {
            echo "abort";
        }
exit();