<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="inc/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Upload</title>
</head>
<body>
    <div class="wrapper">
        <form action="./upload.php" method="post" enctype="multipart/form-data" id="fileUpload">
            <h2>Upload File</h2>
            <div>
                <input type="file" name="fileSelect" id="fileSelect">
                <button id="browseFile">
                    <p>Browse File</p>
                </button>
            </div>
            <input type="submit" value="Upload">
            <div class="msg"></div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            console.log('jQuery loaded successfully!');

            $('#browseFile').on('click', function(ev) {
                ev.preventDefault();
                $('#fileSelect').click();
            })

            $('#fileUpload').on('submit', function(ev) {
                ev.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: './upload.php',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),
                    success: function(res) {
                        $('.msg').html(res).show();
                    }
                })
            })

            $.ajax({
                type: 'POST',
                url: './ajax.php?f=test',
                data: {'arg1': 'test', 'arg2': 'test3'},
                success: function(res) {
                    console.log('Function evoked');
                    $('.msg').html(res).show();
                }
            })
        })
    </script>
</body>
</html>