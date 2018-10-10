
$(document).ready(function () {

  


  $("#fecha_evento").datepicker($.datepicker.regional["es"]);


  // PDF
      $(function () {

        $('#cmd').click(function () {
          html2canvas($(".invoice"), {
            onrendered: function (canvas) {
              var imgData = canvas.toDataURL(
                'image/jpeg');
              var doc = new jsPDF('L', 'mm');

              doc.addImage(imgData, 'JPEG', 10, 10);
              //  pagesplit: true 
              doc.save('sample-file.pdf');
            }
          });
        })
      })


      
     

        
       

  


});