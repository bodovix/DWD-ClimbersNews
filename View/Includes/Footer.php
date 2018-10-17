<?php

require_once 'Controller/FooterControl.php';
$myTest = new FooterControl();
?>
<footer class="position-sticky " style="position: absolute;bottom: 0;">
    <div class="row bg-secondary" >
        <div class=" col ">
            <p class="mb-0">Gwydion Saxelby</p>
            <p class="mb-0">1701267@uad.ac.uk</p>
        </div>

        <did class=" bg-secondary col offset-md-6 offset-sm-0">
           <?php echo $myTest->loadRelatedPageLink($pathToPage) ?>
        </did>
    </div>
</footer>
<!--dependencies for bootstrap for Bootstrap functionality-->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"-->
<!--        crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

