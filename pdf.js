
        (() => {

    const downloadPDFElement = document.getElementById("js-download-pdf");

    downloadPDFElement.addEventListener("click", (event) => {
        const doc = new jspdf.jsPDF({
            format: "a4",
            orientation: "portrait",
            unit: "mm"
        });

        html2canvas(document.getElementById("table")).then((canvas) => {
            const imgData = canvas.toDataURL('image/png');
            const imgProps= doc.getImageProperties(imgData);
            const pdfWidth = doc.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
            doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            doc.save(`Order-${new Date().toLocaleDateString("vi-VN")}.pdf`);
        })
    })

})();
