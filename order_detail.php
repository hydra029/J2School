 <script src="https://cdn.jsdelivr.net/npm/uuid@latest/dist/umd/uuidv4.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
 <script src="https://unpkg.com/html2canvas@1.3.2/dist/html2canvas.min.js"></script>
 <?php
 require 'connect.php';
 ?>
 <style type="text/css">
   .tr {
    padding: 5px;
}
</style>
<div class="modal fade" id="modal-order-detail">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content" id="element_to_print">
            <div>
                <div class="modal-header">
                    <h1 style="text-align: center; ">
                        Đơn hàng chi tiết
                    </h1>
                </div>
                <div class="modal-body" >
                    <table width="600px" class="left" id="rcv">
                        <tr>
                            <th colspan="3">
                                Người nhận:
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <button id = "js-download-pdf">In PDF</button>
            <script src="pdf.js"></script>
            <div class="modal-footer">
                <button type="submit" id="btn-cancel" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-order-detail").click(function(event) {
            event.preventDefault;
            $('#modal-order-detail').modal('show');
            $("#rcv").find("tr:gt(0)").remove();
            let btn = $(this);
            let id = btn.data('id');
            $.ajax({
                url: 'order_data.php',
                type: 'POST',
                dataType: 'json',
                data: {id},
            })
            .done(function(response) {
                $("#rcv").find('tbody')

                .append($('<tr>')
                    .append($('<td>')
                        .append($('<span>').text('Họ và Tên:'))
                        .append($('<span>').text(response['name']))
                        .append($('<br>'))
                        .append($('<span>').text('Số điện thoại:'))
                        .append($('<span>').text(response['phone']))
                        .append($('<br>'))
                        .append($('<span>').text('Địa chỉ:'))
                        .append($('<span>').text(response['address']))
                        .append($('<br>'))
                        .append($('<span>').text('Note:'))
                        .append($('<span>').text(response['note']))
                        .attr('colspan', '3')
                        .css('text-align', 'left')
                        )
                    )
                .append($('<tr>')
                    .append($('<th>').text('Sản phẩm').attr('colspan','3').css('text-align', 'center')
                        )
                    )
                for (var i = 0; i < response['num']; i++) {
                    let sum =  response[i]['quantity'] * response[i]['product']['price'];
                    let price = response[i]['product']['price'];
                    price = price.toLocaleString();
                    sum = sum.toLocaleString();
                    $("#rcv").find('tbody')
                    .append($('<tr>')
                        .append($('<td>')
                            .append($('<img>').attr({
                                src: 'admin/products/' + response[i]['product']['image'],
                                width: '75px',
                                height: '75px',
                            }))
                            .attr('width', '75px')
                            )
                        .append($('<td>')
                            .append($('<span>').text(response[i]['product']['name']))
                            .css('text-align', 'left')
                            .attr('width', '350px')
                            )
                        .append($('<td>')
                            .append($('<span>').text(response[i]['price'] + ' VNĐ'))
                            .append($('<br>'))
                            .append($('<span>').text('x' + response[i]['quantity']))
                            .append($('<br>'))
                            .append($('<span>').text(sum + ' VNĐ'))
                            .css('text-align', 'right')
                            )
                        )
                }
                $("#rcv").find('tbody')
                .append($('<tr>')
                    .append($('<td>')
                        .append($('<span>').text('Tổng:'))
                        .attr('colspan', '2')
                        )
                    .append($('<td>')
                        .append($('<span>').text(response['total'] + ' VNĐ'))
                        .attr('class', 'right')
                        )
                    )
            })
        });
    });
    (() => {
        const downloadPDFElement = document.getElementById("js-download-pdf");
        downloadPDFElement.addEventListener("click", (event) => {
            const doc = new jspdf.jsPDF({
                format: "a4",
                orientation: "portrait",
                unit: "mm"
            });
            html2canvas(document.getElementById("element_to_print")).then((canvas) => {
                const imgData = canvas.toDataURL('image/png');
                const imgProps= doc.getImageProperties(imgData);
                const pdfWidth = doc.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                doc.save(`Order-${new Date().toLocaleDateString("vi-VN")}.pdf`);
            })
        })
    })();
</script>