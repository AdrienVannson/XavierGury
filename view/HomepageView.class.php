<?php
/*
 * HomepageView
 */

include_once(__DIR__.'/../model/SettingsFactory.class.php');
include_once(__DIR__.'/../model/ProjectFactory.class.php');
include_once('HTMLView.class.php');


class HomepageView extends HTMLView
{

    protected function getHeadDescription ()
    {
        return strip_tags(SettingsFactory::getSettings()->getDescription());
    }

    protected function sendStyles ()
    {
        ?>

        <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }

        #title {
            margin: 0;
            font-weight: normal;
        }

        #infos {
            position: absolute;
            width: 360px;
            top: 0;
            left: 0;
            padding: 10px;

            background-color: #FFF;

            text-align: justify;
            text-indent: 2em;
            font-size: 1.2em;
            color: #212121;
        }

        #description {
            position: absolute;
            left: -100%;
            right: 100%;

            padding: 20px;

            background-color: #FFF;

            transition: right 1s, left 1s;
        }

        #infos:hover #description {
            left: 0;
            right: 0;
        }


        /* Texte au survol */
        svg a text {
            font-size: 0.85em;
            opacity: 0;

            transition: opacity .5s;
        }

        svg a:hover text {
            opacity: 1;
        }


        @media (max-width: 992px) {

            #infos {
                width: 240px;
            }

        }
	    </style>

        <?php
    }

    protected function sendBody ()
    {
        $firstLevelProjects = getFirstLevelProjects();
        ?>
        <body>

        <div id="infos">
            <h1 id="title">Xavier Gury</h1>
            <div id="description"><?php echo SettingsFactory::getSettings()->getDescription(); ?></div>
        </div>


        <div style="display: flex; height:100vh;">
            <div style="margin:auto;">
                <svg style="max-width:90vw; max-height:90vh; height:100vh; width:100vw;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 413.67205 422.23108">


        <a xlink:href="<?php echo $firstLevelProjects[0]->getUrl();?>">
            <path
            id="path4180"
            d="m 91.118262,239.1671 c 15.815518,4.64306 26.310488,6.0979 28.079558,-2.81757 2.84392,-14.33233 -5.24062,-21.02657 -17.31263,-27.14932 -10.074188,-5.10948 -16.024758,-16.78491 -20.014848,-29.84597 -4.42423,-14.48215 4.0942,-32.53856 -3.40308,-41.59919 -7.70018,-9.30585 -17.10065,-2.22284 -30.86959,-21.68164 C 37.554452,101.87995 35.970852,90.553862 33.872292,81.727982 28.278932,58.204172 6.5946622,113.73424 4.0105622,129.67325 c -2.61215,16.11197 -2.19132,32.42853 4.18946,46.28307 8.3231998,18.07211 12.7720598,23.65646 30.3522198,35.47529 17.13525,11.51971 36.7505,23.09242 52.56602,27.73549 z"
            style="fill:#<?php echo $firstLevelProjects[0]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />

            <text x=15 y=170><?php echo $firstLevelProjects[0]->getName();?></text>
        </a>

        <a xlink:href="<?php echo $firstLevelProjects[1]->getUrl();?>">
            <path
            id="path4172"
            d="m 168.28233,131.11275 c 6.41717,-5.77669 7.32834,-27.83627 6.81855,-35.229058 -0.58941,-8.54713 -4.41943,-13.25827 -12.75319,-19.82426 -8.33376,-6.56599 -24.12939,8.43698 -32.57743,12.50064 -5.16171,2.48287 -19.6195,18.336278 -26.44131,27.332608 -6.821808,8.99634 -10.193968,24.59872 -10.808058,35.04431 -1.04958,17.8531 -1.26269,29.7995 7.32361,40.65864 8.586298,10.85914 20.203048,10.6066 26.769038,21.2132 6.56599,10.60661 -2.40653,32.77044 17.03891,37.8212 19.44543,5.05077 33.84192,7.13616 39.90844,3.21626 8.20749,-5.30331 8.5863,-24.36994 7.82869,-35.22908 -0.75762,-10.85914 -10.10153,-20.20305 -19.1929,-27.7792 -9.09138,-7.57614 -20.31821,-18.23032 -18.68783,-29.16815 1.63038,-10.93783 8.35632,-24.78041 14.77348,-30.55711 z"
            style="fill:#<?php echo $firstLevelProjects[1]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />

            <text style="font-size: 0.65em;" dx=98 dy=150><?php echo $firstLevelProjects[1]->getName();?></text>
        </a>

        <a xlink:href="<?php echo $firstLevelProjects[2]->getUrl();?>">
            <path
            id="path4178"
            d="m 135.67736,71.055722 c 10.08576,-4.94616 28.11049,-13.19627 38.33938,-16.05784 10.45867,-2.92586 35.62712,-1.48457 41.02322,-1.31871 7.8033,0.23985 13.69843,-6.07635 18.06468,-15.06214 3.57906,-7.36577 15.48459,-22.81406 11.25078,-29.2165101 -3.94482,-5.96543 -19.99041,-6.61437 -41.004,-6.88725 -20.42495,-0.26523 -47.67573,3.55905 -58.78536,5.60969 -16.15408,2.9817401 -41.47971,14.3132701 -50.571088,22.1419501 -9.09137,7.82868 -32.76342,20.97553 -39.60733,26.22282 -7.85962,6.02604 -14.64722,5.55584 -13.63706,13.38452 1.01015,7.82868 6.78789,25.72825 9.56581,29.51633 2.77792,3.788068 14.4575,21.514498 23.97689,23.145098 8.88758,1.52237 11.51299,-3.40665 18.53617,-10.96418 5.93093,-6.38216 17.726248,-22.236048 22.598448,-26.220628 4.21095,-3.4438 20.24946,-14.29315 20.24946,-14.29315 z"
            style="fill:#<?php echo $firstLevelProjects[2]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />

            <text x=100 y=46><?php echo $firstLevelProjects[2]->getName();?></text>
        </a>

        <a xlink:href="<?php echo $firstLevelProjects[3]->getUrl();?>">
            <path
            id="path4170"
            d="m 253.82064,225.81863 c 4.26601,1.63667 25.92787,-0.20798 35.93117,-6.82193 7.30039,-4.82685 8.84021,-16.03686 9.59782,-33.71453 0.75762,-17.67767 -1.38896,-48.36105 -9.09137,-65.91245 -3.37805,-7.69753 -16.6394,-27.165938 -30.30458,-38.512058 -9.1807,-7.62269 -27.40039,-15.15229 -48.61359,-16.41499 -17.41077,-1.03636 -37.15997,-3.90728 -37.75445,6.43973 -0.45107,7.85107 6.18718,5.68211 10.35406,19.69798 4.02274,13.481528 -5.35635,24.142548 2.02031,29.041888 5.70923,1.32951 10.41693,-1.80627 16.79377,-1.76778 15.90991,0.25254 30.38974,10.46286 36.11296,16.66752 8.12315,8.80647 11.3173,20.64155 7.95496,38.63833 -4.04969,21.67581 -4.84775,25.19283 -3.40996,31.94952 2.7323,12.84005 10.4089,20.70877 10.4089,20.70877 z"
            style="fill:#<?php echo $firstLevelProjects[3]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />

            <text x=196 y=108><?php echo $firstLevelProjects[3]->getName();?></text>
        </a>

        <a xlink:href="<?php echo $firstLevelProjects[4]->getUrl();?>">
            <path
            id="path4176"
            d="m 263.61548,70.882402 c 13.13199,8.20749 24.8804,24.44055 30.55712,32.324878 4.54568,6.31345 9.97004,11.52788 21.71827,14.77348 13.05704,3.60718 27.94573,1.92324 33.20878,-10.6066 5.84692,-13.919878 16.03616,-15.657368 10.60659,-26.263958 -6.91403,-13.50651 -19.31916,-31.31473 -30.93592,-40.15357 -15.82622,-12.0417 -27.77919,-18.56155 -43.43656,-23.99112 -13.12513,-4.55146 -26.26396,-7.1973301 -31.8198,3.66181 -5.55584,10.85914 -23.63034,36.88981 -13.5108,38.63832 10.09877,1.74493 23.61232,11.61676 23.61232,11.61676 z"
            style="fill:#<?php echo $firstLevelProjects[4]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />

            <text style="font-size: .7em;" x=263 y=64><?php echo $firstLevelProjects[4]->getName();?></text>
        </a>

        <a xlink:href="<?php echo $firstLevelProjects[5]->getUrl();?>">
            <path
            id="path4174"
            d="m 308.18846,155.29975 c 2.033,12.69779 2.20632,35.08178 -1.83429,52.00183 -4.04061,16.92006 6.37998,25.20523 14.71374,35.81183 8.33376,10.6066 22.69839,50.07634 44.41667,35.68167 21.71828,-14.39467 38.66837,-24.56999 43.97168,-44.01543 5.3033,-19.44544 -3.283,-57.32616 -6.566,-68.43783 -3.28299,-11.11168 -18.38377,-47.33502 -22.81726,-54.98153 -4.41044,-7.60678 -3.09542,-12.844018 -12.98405,-10.60968 -6.76914,1.5295 -8.01057,14.69246 -14.82361,21.1318 -5.29804,5.00744 -12.43999,8.38235 -21.62854,8.06853 -4.60571,-0.1573 -14.73133,-3.14912 -20.09627,-0.41624 -6.00251,3.05766 -2.35207,25.76505 -2.35207,25.76505 z"
            style="fill:#<?php echo $firstLevelProjects[5]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />

            <text x=336 y=190>Vidéos</text>
        </a>


        <a xlink:href="/images">
            <path
            id="path4149"
            d="m 200.62398,239.16506 c -1.07143,10.53571 11.25,19.82143 18.39286,19.46429 7.14285,-0.35715 27.05079,-12.35066 25.17857,-23.39287 -1.77034,-10.44134 -10.65676,-19.36658 -12.13018,-31.0281 -1.19274,-9.44009 7.66589,-35.93618 5.88018,-50.75761 -1.37802,-11.43756 -20.35714,-25.71428 -33.57143,-26.42856 -13.21429,-0.71429 -24.64286,8.92856 -31.78571,16.78571 -7.14286,7.85714 -10.89287,20.35714 -6.60715,25.89286 5.98053,7.72484 34.23069,27.82462 35.89286,43.21428 1.07143,9.9202 -1.25,26.25 -1.25,26.25 z"
            style="fill:#2b2e34;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />

            <text style="fill:white" x=180 y=165>Images</text>
        </a>

        <a xlink:href="/10-Journal">
            <path
            id="path4182"
            d="m 256.77939,305.45621 c -16.44727,-11.96684 -37.16337,-25.09458 -28.80566,-35.74552 4.40769,-5.6171 20.73417,-15.81021 24.86553,-23.09912 3.73125,-6.58301 13.81944,-12.05302 25.61621,-11.90033 16.31705,0.2112 26.06314,3.0289 33.39292,14.28537 8.48213,13.02616 11.42887,24.78574 25.71285,34.92439 14.40562,10.22499 12.28239,12.64477 5.86547,30.29128 -6.41691,17.64651 -20.85496,23.26131 -31.81719,35.02565 -5.62987,6.04182 -19.1005,20.41391 -20.58759,39.03622 -1.05049,13.15494 13.46934,24.83698 -0.26737,28.87611 -19.02149,5.59306 -27.00451,2.94108 -26.2024,-18.716 0.80212,-21.65708 9.89274,-39.30359 13.1012,-46.78999 3.20845,-7.4864 4.65358,-16.42938 -1.08849,-25.99433 -6.69772,-11.15685 -19.78548,-20.19373 -19.78548,-20.19373 z"
            style="fill:#2b2e34;fill-opacity:1;fill-rule:evenodd;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />

            <text style="fill:white" x=263 y=290>Journal</text>
        </a>

                </svg>
            </div>
        </div>

        </body>
        <?php
    }

}