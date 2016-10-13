
<script src="/web/assets/36c7fd10/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.imgareaselect.pack.js"></script>
<a id="Link1">Ajax1</a>
<a id="Link2">Ajax2</a>
<br />
<img id="imgcontainer" style="max-width:500px;" src="">

<script>
    $(document).ready(function(){
        ias = $('#imgcontainer').imgAreaSelect({
            instance: true,
            aspectRatio: '4:4',
        });

        $('#Link1').click(function(){
            $.ajax({
                type: "POST",
                url: "/web/ajaxworker.php",
                data: "ajaxroute=/web/crops/52346f315d919107d4083b8d5d49f881.jpg",
                success: function(data){
                    $('#imgcontainer').attr('src',data);
                    ias.setOptions({ show: true });
                    ias.cancelSelection();}
            });
        });
        $('#Link2').click(function(){

            $.ajax({
                type: "POST",
                url: "ajaxworker.php",
                data: "ajaxroute=/web/crops/9591a8391f0426f9d2d9d62f3a1b6a30.jpg",
                success: function(data){
                    setTimeout(function(){$('#imgcontainer').attr('src',data);},500);
                    ias.setOptions({ show: true });
                    ias.cancelSelection();
                }
            });
        });

    });
</script>