// let print = document.querySelector("#printApplication");
// print.addEventListener("click", () => {

//   // Get the element to print
//   let element = document.getElementById("letter");
// },

  // Define optional configuration
  // let options = {
  //   margin: [10,10],
  //   filename: "myfile.pdf",
  //   // html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true,width:'50',height:'50' ,autoPaging:'text'},
  //   jsPDF: { format: "a4", orientation: "portrait", y: "50" },
  // };
  // Create instance of html2pdf class

  //let exporter = new html2pdf(element, options);
  
  // exporter.save('test.pdf');
  // Download the PDF or...
  // exporter.getPdf(true).then((pdf) => {
  //   console.log('pdf file downloaded');
  // });

  // // Get the jsPDF object to work with it
  // exporter.getPdf(false).then((pdf) => {
  //   console.log('doing something before downloading pdf file');
  //   pdf.save();
  // });

  // You can also use static methods for one time use...
  // options.source = element;
  // options.download = true;
  // html2pdf.getPdf(options);


  /*************************************************   Js pdf   ************************************/


//   let eventHandler = {
//     "#alert": function (element, renderer) {
//       return true;
//     },
//   };
//   let print = document.querySelector("#printApplication");
//     print.addEventListener("click", () => {
//     // var element = document.getElementById('letter');
//     // html2pdf(element,15,15,{
//     //     'elementHandlers': eventHandler
//     // });
//     let option={
//       html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true,width:'50',height:'50' ,autoPaging:'text'}
//     }
//     let letter = document.getElementById("letter");
//     let pdf = new jsPDF(option);
//     pdf.html(letter,option);
//     pdf.save("test.pdf");

//     // let exporter = new html2pdf(element, option);

//   });
  
// });


/****https://www.codexworld.com/convert-html-to-pdf-using-javascript-jspdf/#:~:text=If%20you%20want%20a%20client,HTML%20to%20PDF%20using%20JavaScript. ** */

/*
function Convert_HTML_To_PDF() {
  var elementHTML = document.getElementById('letter');

  html2canvas(elementHTML, {
    useCORS: true,
    onrendered: function(canvas) {
      var pdf = new jsPDF('p', 'pt', 'letter');
      pdf.setFontSize(72)
      var pageHeight = 980;
      var pageWidth = 0;
      for (var i = 0; i <= elementHTML.clientHeight / pageHeight; i++) {
        var srcImg = canvas;
        var sX = 0;
        var sY = pageHeight * i; // start 1 pageHeight down for every new page
        var sWidth = pageWidth;
        var sHeight = pageHeight;
        var dX = 0;
        var dY = 0;
        var dWidth = pageWidth;
        var dHeight = pageHeight;

        window.onePageCanvas = document.createElement("canvas");
        onePageCanvas.setAttribute('width', pageWidth);
        onePageCanvas.setAttribute('height', pageHeight);
        var ctx = onePageCanvas.getContext('2d');
        ctx.drawImage(srcImg, sX, sY, sWidth, sHeight, dX, dY, dWidth, dHeight);

        var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);
        var width = onePageCanvas.width;
        var height = onePageCanvas.clientHeight;

        if (i > 0) // if we're on anything other than the first page, add another page
          pdf.addPage(612, 864); // 8.5" x 12" in pts (inches*72)

        pdf.setPage(i + 1); // now we declare that we're working on that page
        // pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width * .62), (height * .62)); // add content to the page
      }
			
	  // Save the PDF
      pdf.save('document.pdf');
    }
  });
}

*/


// printing letter using window and document object
// refference -> https://www.encodedna.com/javascript/print-html-table-with-image-using-javascript.htm

  var Letter = new function () {
        this.print = function () {
            var tab = document.getElementById('letter');

            var style = "<style>";
                style = style + "table {width: 100%;font: 17px Calibri;}";
                style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
                style = style + "padding: 2px 3px;text-align: center;}";
                style = style + "</style>";

            var win = window.open('', '', 'height=700,width=700');
            win.document.write(style);          //  add the style.
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }
    const  notify=(msg)=>{
      let notifyAt=document.querySelector('#notification')
      notifyAt.innerHTML=msg;
      setTimeout(()=>{
          notifyAt.innerHTML='';
      },3000);
  }