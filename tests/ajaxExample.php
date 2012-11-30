<?php
function isAJAX() {
    return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
}

if (isAJAX()) {
    $offset = (int) strip_tags($_GET['offset']);
    $date = new DateTime();
    $date->modify ("+{$offset} hours");
    $info['time'] = $date->format('H:i:s');
    $info['msg'] = "Es una petición AJAX!\n";
    echo json_encode($info);
    exit();
}
?>
<!-- Utiliza jQuery del CDN de Google. Utiliza el jQuery local si es necesario -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>!window.jQuery && document.write('<script src="js/jquery-1.8.3.js"><\/script>')</script>
<script>
    $(document).ready(function(){
        $('#gettime').click(getTime);
    });
    function getTime(event){
        event.preventDefault();
        event.stopPropagation();
        var offset = $('#offset').val();
        $.getJSON("ajaxExample.php", { offset: offset}, function(json) {
            $('#resquest').html(json.msg+'('+json.time+')');
            //console.log(json);
        });
        /* $.getJSON is a shorthand of $.ajax
        $.ajax({
            url: url,
            dataType: 'json',
            data: data,
            success: callback
        });
        */
    }
</script>
<form>
    <fieldset><legend>AJAX</legend>
        <label for="offset"></label><input id="offset" type="number" value ="4"/>
        <input type="submit" id="gettime" value="Get Time">
    </fieldset>
</form>
<div id="resquest"></div>
