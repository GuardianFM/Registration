<?php
//if ($_GET['id'] != '') {
//    $id = $_GET['id'];
//} else {
//    $id = 0;
//}
$id = 11870;
?>



<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

        <style>
            table td,th{
                text-align: center;
            }

            .blinkingpending{
                animation:blinkingpendingText 1s infinite;
            }
            @keyframes blinkingpendingText{
                0%{	background-color: #ffeeb4;	}
                100%{	background-color: #FFFFFF;	}
            }
            .blinkingdelivered{
                animation:blinkingdeliveredText 1s infinite;
            }
            @keyframes blinkingdeliveredText{
                0%{	background-color: #b8e3ff;	}
                100%{	background-color: #FFFFFF;	}
            }

            .blinkingpaid{
                animation:blinkingpaidText 1s infinite;
            }
            @keyframes blinkingpaidText{
                0%{	background-color: #e3ffb8;	}
                100%{	background-color: #FFFFFF;	}
            }

            .blinkingunpaid{
                animation:blinkingunpaidText 1s infinite;
            }
            @keyframes blinkingunpaidText{
                0%{	background-color: #ffc8b4;	}
                100%{	background-color: #FFFFFF;	}
            }

            #statement_dtl{
                opacity: 0.5;
            }
            #statement_dtl:hover{
                opacity:1;
                cursor: pointer;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-12 text-center">
                    <h3>Officer Statement</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1 col-md-1">
                    <label class="badge label-primary">Status</label>
                </div>
                <div class="col-sm-2 col-md-2">

                    <select class="form-control" id="paid_status" onchange="GetOfficerStatement('Fetch');">
                        <option value="PAID">Paid</option>
                        <option value="UNPAID">Un-Paid</option>
                    </select>
                </div>
                <div class="col-sm-1 col-md-1">                    
                    <label class="badge label-primary">From</label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <input type="date" class="form-control" value="<?php echo date("Y-m-01") ?>" onchange="GetOfficerStatement('Fetch');" id="paid_status_from"/>   
                </div>
                <div class="col-sm-1 col-md-1">  
                    <label class="badge label-primary">To</label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <input type="date" class="form-control" value="<?php echo date("Y-m-t") ?>" onchange="GetOfficerStatement('Fetch');" id="paid_status_to"/>  
                </div>
                <div class="col-sm-3 col-md-3 text-center">
                    <input type="button" class="btn btn-info" value="Payment Details"  data-toggle="modal" data-target="#exampleModalCenter" onclick="GetOfficerStatement('Payment-Details');"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <input type="text" id="txtsearch" placeholder="Search" class="form-control"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <table class="table table-bordered table-condensed table-striped" id="tbl_statement">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Timing</th>
                                <th>Hours</th>
                                <th>Expense</th>
                                <th>Amount</th>
                                <th>Net Amount</th>
                                <th>Due Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Payment Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <input type="text" id="txtsearch2" placeholder="Search" class="form-control"/>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <table class="table table-bordered table-condensed table-striped" id="tbl_pmt_dtl">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Payment Date</th>
                                                <th>Amount</th>
                                                <th>Account No.</th>
                                                <th>Sort Code</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>

    <script type="text/javascript">

        $(document).ready(function () {
            GetOfficerStatement('Fetch');
        });



        function GetOfficerStatement(mode) {

            var paid_status_from = document.getElementById('paid_status_from').value;
            var paid_status_to = document.getElementById('paid_status_to').value;
            var paid_status = document.getElementById('paid_status').value;

            if (mode == 'Fetch') {
                var id = '<?php echo $id; ?>';
            } else if (mode == 'Payment-Details') {
                var id = document.getElementById('account_id').value;
            }
            $.ajax({
                url: "Officer_Statement_db.php",
                method: "POST",
                dataType: 'text',
                data: {id: id, paid_status: paid_status, paid_status_from: paid_status_from, paid_status_to: paid_status_to, mode: mode},
                success: function (data)
                {
                    if (mode == 'Fetch') {
                        $('#tbl_statement tbody').html(data);
                    } else {
                        $('#tbl_pmt_dtl tbody').html(data);
                    }
                }
            });
        }

        $('#txtsearch').keyup(function () {
            search_table1($(this).val());
        });
        function search_table1(value) {
            $('#tbl_statement tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                    {
                        found = 'true';
                    }
                });
                if (this.rowIndex >= 1) {
                    if (found == 'true')
                    {
                        $(this).show();
                    } else
                    {
                        $(this).hide();
                    }
                }
            });
        }

        $('#txtsearch2').keyup(function () {
            search_table2($(this).val());
        });
        function search_table2(value) {
            $('#tbl_pmt_dtl tr').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                    {
                        found = 'true';
                    }
                });
                if (this.rowIndex >= 1) {
                    if (found == 'true')
                    {
                        $(this).show();
                    } else
                    {
                        $(this).hide();
                    }
                }
            });
        }


    </script>
</html>
