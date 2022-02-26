 <script src="https://cdn.jsdelivr.net/npm/uuid@latest/dist/umd/uuidv4.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
 <script src="https://unpkg.com/html2canvas@1.3.2/dist/html2canvas.min.js"></script>
 <?php 
 require 'connect.php';
 ?>
 <div class="modal fade" id="modal-order-detail">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 style="text-align: center; ">
                    Đơn hàng chi tiết
                </h1>
            </div>
            <div class="modal-body">
                <?php
                $customer_id = $_SESSION['customer_id'];
                $sql = "select receivers.*, receipts.note from receivers join receipts on receipts.receiver_id = receivers.id where receipts.customer_id = '$customer_id' and receipts.id = '$receipt_id'";
                $result = mysqli_query($connect,$sql);
                $receipt = mysqli_fetch_array($result);
                $receiver_name = $receipt['name'];
                $receiver_phone = $receipt['phone'];
                $receiver_address = $receipt['address'];
                $note = $receipt['note'];
                ?>
                <table width="600px" height="300px" class="border left">
                    <tr>
                        <th colspan="2" class="border">
                            Người nhận:
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2" class="border" style="text-align: left;">
                            Họ và Tên:
                            <?php echo $receiver_name ?>
                            <br>
                            Số điện thoại:
                            <?php echo $receiver_phone ?>
                            <br>  
                            Địa chỉ:
                            <?php echo $receiver_address ?>
                            <br>
                            Note:
                            <?php echo $note ?>
                        </td>
                    </tr>
                    <tr>
                        <th class="border" colspan="2">
                            Sản phẩm:
                        </th>
                    </tr>
                    <?php 
                    $sql = "select
                    receipts.*,
                    receipt_detail.quantity,
                    products.name as product_name,
                    products.price as product_price,
                    products.image as product_image
                    from receipts
                    join receipt_detail on receipts.id = receipt_detail.receipt_id
                    join products on products.id = receipt_detail.product_id
                    where
                    receipts.id = '$receipt_id'";
                    $result = mysqli_query($connect,$sql);
                    $receipt = mysqli_fetch_array($result);
                    foreach ($result as $each) {
                        $sum = $each['quantity'] * $each['product_price'];
                        ?>
                        <tr>
                            <td class="border" style=" vertical-align: text-top; text-align: left;">
                                <?php echo $each['product_name'] ?>
                                <br>
                                <img width="100px" height="50px" src="admin/products/<?php echo $each['product_image']; ?>">
                            </td>
                            <td class="border" style=" vertical-align: text-top; text-align: right;">
                                <?php echo number_format($each['product_price']) ?> VNĐ
                                <br>
                                x
                                <?php echo $each['quantity'] ?>
                                <br>
                                <?php echo number_format($sum) ?> VNĐ
                            </td>
                        </tr>
                        <?php  
                    }
                    ?>
                    <tr>
                        <th class="border" >
                            Tổng tiền
                        </th>
                        <td class="border right">
                            <?php echo number_format($receipt['total']) ?> VNĐ
                        </td>
                    </tr>
                </table>
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