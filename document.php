<!DOCTYPE html>
<html>
    <title>Upload Documents</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

    <body>
    <center>
        <div class="w3-container">
            <h2>Upload Documents</h2>
            <div class="w3-panel w3-green" style="width:100%; border-radius: 10px;">
                <p></p>
            </div>

            <br>
            <div class="w3-responsive">
                <table class="w3-table-all w3-card-4 w3-hoverable w3-striped w3-small w3-centered">
                    <tr>
                        <th>SIA License</th>
                        <th>Passport</th>
                        <th>Utility Bill</th>
                        <th>Other</th>
                    </tr>
                    <tr>
                        <td>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload Image" name="submit">
                            </form>
                        </td>
                       
                        <td>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload Image" name="submit">
                            </form>
                        </td>
                        <td>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload Image" name="submit">
                            </form>
                        </td>
                        <td>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload Image" name="submit">
                            </form>
                        </td>
                    </tr>



                </table>

            </div>
            <br>

            <button class="w3-btn w3-white w3-border w3-border-green w3-round-xxlarge"><i style='font-size:16px' class='fas'>NEXT &#xf061;</i></button>

        </div>
    </center>





</body>
</html>
