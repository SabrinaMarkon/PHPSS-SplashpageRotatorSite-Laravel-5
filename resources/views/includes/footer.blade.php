<div class="footercontainer">
    <div class='footer'>&copy; 2017 Sabrina Markon <a href="http://phpsitescripts.com" target="_blank">PHPSiteScripts.com</a></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/5eb2577710.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script>
    document.createElement('video');
</script>
<![endif]-->
<script>
    var whereami = this.location.pathname;
    var res = whereami.replace("/", "");
    if (res === '') {
        res = 'home';
    }
    $('#' + res).parents('li,ul').addClass('active');
</script>
