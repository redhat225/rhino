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
//manage invoices
class InvoiceGenerator{
/*Properties*/
    private $paper_disposition;
    private $dimensions;
    private $path_output;
    //content to fecth for
    private $content;

    public function __construct($paper_disposition, $dimensions)
    {
        $this->paper_disposition = $paper_disposition;
        $this->dimensions = $dimensions;
    }

    public function save_invoice()
    {
     try
        {
            $html2pdf = new HTML2PDF($this->paper_disposition,$this->dimensions,'fr');
            $html2pdf->setDefaultFont('Helvetica');
            $html2pdf->pdf->SetProtection(array('modify','copy'));
            $html2pdf->writeHTML($this->content, isset($_GET['vuehtml']));
            $html2pdf->Output($this->path_output,'F');

            return true;
        }
        catch(HTML2PDF_exception $e) {
            return false;
        }
    } 

    public function setDimensions($dimensions)
    {
        $this->dimensions=$dimensions;
    }

    public function setPaperDisposition($paper_disposition)
    {
        $this->paper_disposition = $paper_disposition;
    }

    public function setPathOutput($out_put)
    {
        $this->path_output = $out_put;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
}

//save firstly the invoice
    $invoice_generator = new InvoiceGenerator('P',array(80,180));
    $path=APP."Files".DS."manager".DS.$institution->slug.DS."invoices".DS.$visit->visit_invoices[0]->code_invoice.'.pdf';
    $invoice_generator->setPathOutput($path);
    $invoice_generator->setContent($this->fetch('invoice_content'));

        if($invoice_generator->save_invoice() === true)
        {

                //building invoice image
                $path = APP."Files".DS."manager".DS.$institution->slug.DS.'invoices'.DS.$visit->visit_invoices[0]->code_invoice.'.pdf';
                $path_image = WWW_ROOT.'Files'.DS.'manager'.DS.$institution->slug.DS.'invoices_images'.DS.$visit->visit_invoices[0]->code_invoice.'-%d.jpg';

                shell_exec('convert -density 150 '.$path.' '.$path_image);

            // check if linking an invoice and a voucher
            $payment_way_id = $visit->visit_invoices[0]->visit_invoice_payment_way_id;
            $perc_insurance = $visit->visit_invoices[0]->perc_insurance;
            if($payment_way_id === 1 || ($payment_way_id===3 && $perc_insurance!=="100"))
            {
                $path = APP."Files".DS."manager".DS.$institution->slug.DS."vouchers".DS.$visit->visit_invoices[0]->visit_invoice_payments[0]->path_payment;
                $invoice_generator = new InvoiceGenerator('P',array(80,100));

                $invoice_generator->setPathOutput($path);
                $invoice_generator->setContent($this->fetch('voucher_content'));

                if($invoice_generator->save_invoice() === true)
                {

                  //building voucher image
                   $path = APP."Files".DS."manager".DS.$institution->slug.DS.'vouchers'.DS.$visit->visit_invoices[0]->visit_invoice_payments[0]->path_payment;

                   $path_image = WWW_ROOT.'Files'.DS.'manager'.DS.$institution->slug.DS.'vouchers_images'.DS.$visit->visit_invoices[0]->visit_invoice_payments[0]->code_payment.'-%d.jpg';

                   shell_exec('convert -density 150 '.$path.' '.$path_image);


                   echo "/manager/visit-invoices/show-meeting-voucher/".$visit->visit_invoices[0]->visit_invoice_payments[0]->id; 
                }
                else
                {
                   echo "Facture générée , reçu de paiement non généré, générez le reçu depuis le menu états.";
                }

            }
            else
            {
                echo "/manager/visit-invoices/show-meeting-invoice/".$visit->visit_invoices[0]->id;
            }
        }
        else
        {
            echo "Facture non générée, veuillez contacter le support";
        }
exit();