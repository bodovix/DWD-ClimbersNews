    <div data-role="page">
        <?php

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once  'global/ConnectionSingleton.php';
        require_once 'Controller/ElectricImpControl.php';
        require_once  'config/config.php';
        require_once 'Model/ElectricImpSensors.php';

        ?>
        <!--    JQuery 3.3.1  to power custom JS-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../JSHandlers/GetDataReadingJS.js"></script>
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
              crossorigin="anonymous">

        <script src="View/JSHandlers/IOTJS.js"></script>

        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <div data-role="header">
            <div data-role="navbar">
                <ul>
                    <li>
                        <a class="nav-link rel="external" data-ajax='false'" href="<?php echo 'Index.php'; ?>">Return To Main Site</a>
                    </li>
                </ul>
            </div>
        </div>
        <div data-role="main">
            <h3>Recent Readings</h3>
            <ul data-role="listview" id="recentReadingsUL" data-theme="c" data-inset="true" class="ui-listview">
            </ul>
        </div>
        <div data-role="footer" style="margin-top: 20px">
            <div>
                <div>
                    <a   href="Evaluation.php?week=9" data-ajax="false">
                        <span>Gwydion Saxelby   -   </span>
                        <span >1701267@uad.ac.uk   -   </span>
                        <span>Evaluation</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
