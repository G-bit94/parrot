<?php

// error_reporting(E_ALL ^ E_NOTICE);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST = json_decode(file_get_contents('php://input'), true);
    // $prompt_init = $_POST['context'];
    // $temp = $_POST['temp'];
?>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        var payload = <?php echo json_encode($_POST) ?>;
        var response = [];
        // var temp = <?php
                        //  echo json_encode($temp)
                        ?>;


        // var SendInfo = {
        //     "context": context,
        //     "top_p": 0.9,
        //     "temp": temp,
        //     "response_length": 64,
        //     "remove_input": true
        // };

        $.ajax({
            type: 'POST',
            url: 'https://api.eleuther.ai/completion',
            data: JSON.stringify(payload),
            contentType: "application/json; charset=utf-8",
            traditional: true,
            success: function(data) {
                response["generated_text"] = data[0].generated_text;
                response["status"] = "SUCCESS";
            },
            error: function() {
                response["status"] = "ERROR";
            }

        });
    </script>
<?php
    // http_response_code(206);
    echo json_encode($_POST);
}
?>