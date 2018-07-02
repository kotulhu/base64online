<?php
/*
 * Author: Revenger
 * url: khtulhu.org.ua
 */
if(isset($_POST['form'])){
    parse_str($_POST['form'],$fields);
//    var_dump($_POST);exit;
    if(isset($fields['b']) && isset($fields['mode'])){
        if($fields['mode'] == 'e'){
            echo base64_encode($fields['b']);
        } elseif($fields['mode'] == 'd'){
            echo base64_decode($fields['b']);
        } else {
            echo "Ошибка, не выбран режим";
        }
    }
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Кодировщик-раскодировщик base64</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<script>
    function c(form,event) {
        event.preventDefault();
        $.post("<?php echo $_SERVER['PHP_SELF']?>", {
            form:form
        })
            .done(function (data) {
                $('#response').val(data);
            });
        return false;
    }
</script>
</head>
    <body>
        <div class="container">
            <form class="form-horizontal" id="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="enc">Текст:</label>
                    <textarea class="form-control" id="enc" name="b" placeholder="Ввод"></textarea>
                </div>
                <div class="form-group">
                    <input type="radio" id="enc" name="mode" value="e" checked> Закодировать
                    <input type="radio" id="dec" name="mode" value="d"> Раскодировать
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <button type="button" class="btn btn-default" onclick="c($(this).closest('#form').serialize(),event)">Submit</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <textarea class="form-control" id="response" placeholder="Вывод"></textarea>
                </div>
            </div>
        </div>
    </body>
</html>