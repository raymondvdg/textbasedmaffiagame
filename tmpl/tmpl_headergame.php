<!-- begin GAME tmpl_header -->

<html>
    <head><title><?php echo title; ?> | <?php echo version; ?> | <?php echo slogan; ?></title>
            <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
var counter = 0;
$(function(){
 $('p#add_field').click(function(){
 counter += 1;
 $('#container').append(
 '<strong>Hobby No. ' + counter + '</strong><br />'
 + '<input id="field_' + counter + '" name="dynfields[]' + '" type="text" /><br />' );

 });
});
</script>
    <link rel="stylesheet" type="text/css" href="tmpl/stylingGame.css" /> 
</head>
    <body>
    <div class="topbar"><?php echo title; ?></div>
    
