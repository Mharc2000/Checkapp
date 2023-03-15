function generatePDF(){
    const element = document.getElementById("prescription");
    html2pdf()
    .from(element)
    .save();
}