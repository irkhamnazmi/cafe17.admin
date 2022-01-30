<?php
          use Dompdf\Dompdf; 
          $dompdf = new Dompdf();
          $page = ob_get_contents();
          ob_end_clean();
          $dompdf->loadHtml($page);
  
         
          $dompdf->setPaper('A4', 'potrait');
  
  
          // Render the HTML as PDF
          $dompdf->render();
          
          // Name of Document      
         
  
          // Output the generated PDF to Browser
          $dompdf->stream('report_by_date');
  