<!DOCTYPE html>

<head>
    <title>Schedule Entry Form</title>
    <link rel="icon" type="image/x-icon" href="https://cdn.crunchify.com/favicon.ico" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>



    <div class="w3-container" >
        <div id="id01" class="w3-modal w3-animate-opacity">
            <div class="w3-modal-content w3-card-4">
                <header class="w3-container w3-blue"> 
                    <center>
                        <h2>Add Template</h2>
                    </center>
                </header>
                <div class="w3-container">

                    <br>
                    <label>Title</label>
                    <br>
                    <input type="text"  id="title" class="w3-input"/><br>


                    <label>Write Description</label> 
                    <textarea id="description" class="w3-input w3-border w3-round" rows="6"></textarea>
                    <br>
                    <table style="float: right;"> 
                        <tr>
                            <td>
                                <input type="button" class="w3-btn w3-white w3-border w3-border-red w3-round-large" value="Clear" id="btn_clear">
                            </td>
                            <td>
                                <input type="button" class="w3-btn w3-white w3-border w3-border-blue w3-round-large" value="Save" id="btn_save">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>



                </div>
                <footer class="w3-container w3-blue">
                    <p>Guardian FM</p>
                </footer>
            </div>
        </div>
    </div>


</body>

<script>
    $(document).ready(function () {
        document.getElementById('id01').style.display = "block";
    });


    $('#btn_clear').click(function () {
        document.getElementById('description').value = "";
    });

    $('#btn_save').click(function () {
        var title = document.getElementById('title').value;
        var description = document.getElementById('description').value;

        $.ajax({
            url: "Template_db.php",
            method: "POST",
            data: {title: title, description: description},
            success: function (data)
            {
                alert(data);
                document.getElementById('title').value = "";
                document.getElementById('description').value = "";
            }
        });
    }
    );
</script>