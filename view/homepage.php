<?php 
/* View */
include_once(__DIR__.'/head.php');
?>

<!DOCTYPE HTML>
<html lang="fr">
<?php

$codeHead = '<meta name="keywords" content="xavier gury, art, peinture, illustration, installation, exposition, objet, animation">';

$codeHead .= '<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">';

$codeHead .= "<style>

body {
	margin: 0;
}

#title {
	margin:0;
	font-weight:normal;
}

#infos {
	position: absolute;
	width: 360px;
	top: 0;
	left: 0;
	padding: 10px;

	background-color: #FFF;

	text-align: justify;
	text-indent: 16px;
	font-size: 1.2em;
	font-family: 'Roboto', sans-serif;
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


@media (max-width: 992px) {

	#infos {
		width: 240px;
	}

}
</style>";

show_head('Accueil', array(), array(), $codeHead);

?>
<body>

<div id="infos">
	<h1 id="title">Xavier Gury</h1>
	
	<div id="description">
		<p>Diplômé de l’école de l’image d’Epinal (DNAP en 1999 et DNSEP en 2001), je suis professeur certifié d’Arts plastiques. Je vis à Moriville et enseigne au collège de Darney-Monthureux dans les Vosges.</p>

		<p>Mon travail mêle illustrations, dessins et peintures que je pratique sur des supports qui vont du livre, à la toile en passant par le rouleau de papier et des supports de récupération (cartes, planches, etc…).
		Ma production, essentiellement figurative, s’organise à travers des séries (les 100 je me sens, corps à corps, l’image qui parle, déchirés, le dessin du jour…) afin de développer et d’explorer pour chaque série un sujet, un style, une méthode ou une situation plastique.</p>

		<p>Dans un déploiement tout azimuts et à travers des dispositifs sérielles, je dévoile mon corps, mes pensées, mes émotions, mes sentiments,  mes rêves et mes cauchemars en amenant le spectateur à s’interroger sur le sens produit tout en distillant de façon implicite de multiples références artistiques qui me sont chères.</p>
	</div>
</div>


<div style="display: flex; height:100vh;">
	<div style="margin:auto;">
		<svg style="max-width:90vw; max-height:90vh; height:100vh; width:100vw;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 836 821">


<defs id="defs6"/>
  <path
     id="path4138"
     d="m 541.48577,810.63999 c -8.38946,-5.78221 -11.52258,-13.30155 -12.20663,-29.2954 -1.33705,-31.26202 5.97746,-67.47153 20.25179,-100.25366 3.06355,-7.03568 6.24586,-15.47591 7.07182,-18.75608 2.069,-8.21676 0.76869,-18.24905 -3.56588,-27.51183 -6.93677,-14.82352 -13.36825,-20.02935 -46.51674,-37.652 -45.88203,-24.39215 -59.89169,-36.77958 -62.01347,-54.83265 -1.62389,-13.81679 5.39468,-21.56727 40.03786,-44.21302 20.34531,-13.29942 22.16566,-14.9815 29.02537,-26.82038 5.76348,-9.94694 13.15138,-17.72269 18.92396,-19.91743 7.89952,-3.00339 21.86023,-5.14187 34.65128,-5.30784 12.76196,-0.16558 14.21857,0.0684 20.27095,3.25602 4.08691,2.15247 8.46435,3.43441 11.72745,3.43441 6.62013,0 11.82622,3.20795 19.92389,12.2769 7.80705,8.74349 12.74258,18.64685 16.64237,33.39361 1.64292,6.21253 4.12521,13.52503 5.51623,16.25 1.39102,2.72496 8.50963,10.4992 15.81915,17.27608 23.11977,21.43506 29.76307,33.31216 29.81457,53.30341 0.0625,24.2877 -10.35614,45.16867 -31.82031,63.77374 -35.5524,30.81671 -52.64986,52.50963 -61.21078,77.66302 -3.77137,11.08094 -4.01692,12.95471 -4.72612,36.06324 -0.47186,15.3757 -1.3046,25.35909 -2.2555,27.04045 -2.37869,4.20592 -14.0312,14.14427 -20.32079,17.33145 -4.54686,2.30407 -17.07231,5.62814 -21.20755,5.62814 -0.40826,0 -2.13308,-0.9586 -3.83292,-2.13018 z m 13.33446,-9.73746 c 5.89596,-2.4635 16.39663,-10.23009 18.07734,-13.37053 0.73405,-1.37157 1.7788,-13.26972 2.32167,-26.44032 0.86438,-20.97038 1.39555,-25.15565 4.27389,-33.67503 9.44362,-27.95147 25.31194,-48.79611 59.527,-78.19472 25.51434,-21.92269 33.00931,-35.86335 33.03859,-61.4518 0.0113,-10.30019 -0.48743,-14.15214 -2.3195,-17.8974 -4.15663,-8.4973 -12.91979,-18.74191 -25.39125,-29.68378 -14.08979,-12.36168 -16.70986,-16.7367 -22.78336,-38.04382 -5.65447,-19.837 -9.49543,-25.64809 -22.73007,-34.38886 -14.50565,-9.5802 -22.69049,-11.77728 -40.67187,-10.9176 -7.43465,0.35543 -15.63711,1.425 -18.22769,2.3768 -6.20483,2.2797 -11.59099,7.5053 -15.31916,14.8625 -3.94969,7.79435 -15.42598,20.11623 -23.51664,25.24941 -21.10928,13.39292 -39.74611,26.38581 -42.05158,29.31674 -2.14061,2.72133 -2.50255,4.37355 -1.84943,8.44226 2.34357,14.59965 13.72658,24.6002 50.57196,44.42999 9.28125,4.99507 22.09635,11.91918 28.478,15.38692 23.05102,12.52575 35.38807,30.84786 35.51329,52.74184 0.0581,10.16466 -2.85927,19.86444 -12.64493,42.04195 -10.5974,24.01721 -16.77482,54.56447 -16.90257,83.58305 -0.0596,13.5378 0.29752,16.41814 2.67342,21.5625 3.0313,6.56342 3.50273,6.75659 9.93289,4.0699 z M 671.14588,518.80418 c -11.22477,-5.91576 -13.08948,-8.21685 -23.99089,-29.6054 -3.97961,-7.80799 -11.69262,-20.13514 -17.14002,-27.39365 -14.98485,-19.96691 -17.79063,-26.91061 -19.76484,-48.91371 -1.21835,-13.57893 -0.85429,-17.75926 3.82071,-43.87129 3.52394,-19.68279 3.54876,-44.09735 0.0665,-65.33966 -1.4395,-8.78057 -2.61721,-19.7935 -2.61721,-24.47319 0,-7.41816 -0.26607,-12.62721 3.10253,-17.71287 4.72335,-7.13095 14.39777,-11.77698 21.78579,-15.53984 l 12.28008,-3.42321 -13.89158,-0.87759 c -5.60215,-0.35391 -17.26532,-1.08164 -20.63693,-2.0829 -5.67458,-1.68516 -6.70513,-2.6599 -13.86586,-13.11487 -4.25463,-6.21191 -9.97896,-16.14993 -12.72073,-22.08448 -9.0302,-19.54584 -17.99858,-30.51659 -43.35976,-53.04078 -20.1411,-17.88802 -23.29994,-21.22084 -31.64828,-33.39127 -12.27872,-17.90024 -14.9547,-27.588141 -12.47659,-45.169341 2.20412,-15.63731 3.97505,-22.2131 7.14128,-26.51681 1.66231,-2.2595 4.16285,-5.86161 5.55675,-8.00469 2.0066,-3.08509 4.65072,-4.61569 12.6974,-7.35013 8.98096,-3.05193 11.41328,-3.37586 20.91197,-2.78502 14.2518,0.88651 25.88,4.86773 51.99893,17.80325 34.63806,17.15464 56.9788,32.25011 78.56896,53.08843 15.50406,14.964161 22.99384,24.822971 30.87438,40.639971 7.40861,14.8698 9.08585,22.92821 8.48031,40.74445 -0.41305,12.15301 -0.76131,13.74774 -4.2261,19.35189 -2.07676,3.3591 -6.95295,8.6491 -10.83597,11.75555 -8.69454,6.95573 -34.59412,21.73118 -47.06464,26.8499 l -19.86496,3.49063 19.11077,0.36506 c 15.69814,0.29987 27.0211,-3.48892 40.69615,-13.99291 8.72275,-6.70006 16.39555,-12.71567 20.37625,-21.12302 3.4554,-7.29794 8.08157,-10.21909 18.0542,-11.4002 5.95938,-0.7058 6.10704,-0.63751 10.67512,4.93722 3.80827,4.64749 37.1702,69.57242 44.05789,85.74007 5.11977,12.01776 20.63403,53.42691 24.17719,64.53136 8.69978,27.26545 9.36618,31.47726 9.39447,59.375 0.0239,23.52895 -0.20289,26.23154 -2.77195,33.0402 -6.65767,17.64449 -19.52473,33.74685 -37.25584,46.62342 -13.53161,9.82684 -41.80568,24.80803 -49.12708,26.03029 -2.51303,0.41954 -8.0762,1.88429 -12.36256,3.255 -7.07681,2.26305 -25.26544,4.741 -34.70659,4.7283 -2.0625,-0.002 -8.13716,-2.3172 -13.49925,-5.14316 z m 44.50126,-7.96395 c 5.36362,-1.68855 10.57594,-3.0701 11.58293,-3.0701 3.68822,0 26.31407,-11.50746 38.25219,-19.45499 18.93112,-12.60296 30.93733,-26.30173 37.46843,-42.75058 2.61214,-6.57877 2.85069,-9.17761 2.89555,-31.54443 0.0376,-18.75476 -0.46027,-26.73307 -2.15932,-34.60197 -5.73293,-26.551 -24.56357,-75.51233 -44.86313,-116.64803 -8.31201,-16.84375 -17.02865,-34.54914 -19.37029,-39.34531 -3.94413,-8.07835 -9.66144,-15.65469 -11.81349,-15.65469 -0.50182,0 -4.55319,4.66257 -9.00305,10.36127 -8.7159,11.16197 -14.45002,16.35652 -27.02667,24.48353 -10.2417,6.61817 -21.21079,10.47612 -37.74102,12.06897 -16.83871,1.62258 -21.01609,1.58848 -25.64242,8.63525 -0.9358,1.4254 -4.66516,4.86335 -4.37036,10.99927 0.17378,3.61718 1.50964,14.73296 2.96858,24.70171 3.86177,26.3871 3.63705,50.13551 -0.7027,74.25961 -6.90929,38.40778 -3.05879,60.39368 14.36362,82.01469 8.47274,10.51456 13.0521,17.92489 22.21765,35.95261 7.49178,14.73555 8.06333,15.48274 14.23579,18.61057 11.90077,6.03057 21.86933,6.28363 38.70771,0.98262 z M 657.37795,226.12136 c 23.65869,-11.98999 38.58332,-22.47742 42.34809,-29.75772 2.51994,-4.87302 2.4053,-27.29288 -0.18498,-36.17913 -4.43548,-15.21638 -18.96067,-37.24094 -33.57862,-50.91531 -33.97335,-31.780401 -97.69773,-66.196761 -126.94231,-68.559191 -7.48436,-0.60459 -8.58772,-0.35775 -13.99355,3.13063 -3.2277,2.08284 -6.73616,5.46475 -7.79656,7.51535 -2.94835,5.70146 -6.08123,26.04279 -5.12324,33.26443 1.67297,12.6115 14.40296,31.205361 32.04104,46.800221 20.34641,17.98948 39.88237,37.92399 45.42281,46.34949 2.93856,4.46875 8.91234,15.08186 13.27506,23.5847 8.63141,16.82239 16.65495,26.96095 22.84607,28.86836 2.17436,0.66989 8.17212,1.04531 13.32837,0.83428 7.86134,-0.32177 10.82534,-1.11873 18.35782,-4.93611 z M 430.7352,500.47306 c -8.79647,-3.04032 -12.28565,-5.55034 -17.27922,-12.43019 -8.06535,-11.11196 -10.21939,-27.67218 -6.15548,-47.32319 2.86058,-13.83225 1.77264,-24.547 -3.64826,-35.93096 -5.56724,-11.69123 -16.63846,-25.42199 -30.38037,-37.67835 -19.86475,-17.71731 -31.78602,-30.41785 -34.96969,-37.25559 -7.8779,-16.9198 0.18535,-34.14606 29.13272,-62.23891 11.94604,-11.5934 16.90243,-15.48373 24.52848,-19.25273 8.6103,-4.25543 10.77281,-4.78197 21.82556,-5.3142 14.56794,-0.7015 22.03634,1.08168 37.10619,8.85958 14.20665,7.33239 31.62689,24.59616 35.55441,35.23506 5.99999,16.25278 4.69156,34.78113 -5.164,73.12655 -8.33107,32.41403 -8.34751,32.23945 5.69183,60.43999 12.70008,25.5104 15.09518,32.7767 13.20992,40.07659 -4.15012,16.06963 -9.89027,22.79676 -27.05782,31.7102 -19.54579,10.14822 -30.2714,12.16617 -42.39427,7.97615 z m 26.35389,-10.82316 c 16.7467,-5.90874 27.49303,-16.22666 29.0588,-27.90035 0.74596,-5.56154 -3.93414,-18.30108 -12.66795,-34.483 -3.00453,-5.56678 -6.98119,-14.34017 -8.83701,-19.49642 -2.92408,-8.12434 -3.28015,-10.62566 -2.66919,-18.75 0.38776,-5.15625 2.44888,-15.5553 4.58027,-23.10899 10.84087,-38.42039 12.06081,-61.23573 4.06027,-75.93535 -6.67178,-12.25826 -25.33402,-25.83603 -42.6299,-31.01553 -10.8266,-3.24218 -23.1314,-4.59482 -31.84382,-0.99808 -4.41753,1.82368 -20.41085,18.29861 -23.8691,20.60199 -6.40248,4.83657 -22.69198,25.20196 -24.19457,37.31209 0.82939,7.35836 4.21224,11.40161 30.71935,36.71653 37.27999,35.60325 45.92116,53.03142 41.07366,82.84042 -2.80292,17.23623 -2.69843,28.19607 0.35155,36.87384 4.56225,12.98043 12.90982,20.32218 23.17368,20.38147 2.75,0.0159 8.91228,-1.35149 13.69396,-3.03862 z m -268.06896,6.79507 c -11.48806,-1.01623 -24.81214,-5.36123 -33.125,-10.80212 -8.41126,-5.5053 -17.78161,-13.79827 -41.52463,-36.75026 -12.52605,-12.10872 -25.744798,-23.98424 -29.374998,-26.39004 -3.63021,-2.40579 -13.06912,-8.62604 -20.97537,-13.82277 -17.10211,-11.24111 -24.34679,-17.2887 -34.30817,-28.63921 -8.94143,-10.18833 -16.19148,-21.34935 -20.5155101,-31.58244 -2.99628,-7.09089 -3.19906,-8.8895 -3.24855,-28.813 l -0.0528,-21.25 9.0293001,-20.7972 c 8.9001,-20.49958 13.66008,-33.58692 17.23846,-47.39634 3.66885,-14.15856 13.32016,-31.39439 22.99949,-41.07371 7.58428,-7.58428 26.87879,-16.35775 35.97376,-16.35775 3.59538,0 16.381768,8.58402 21.543748,14.4632 5.19264,5.91409 7.92334,11.62866 11.90405,24.9118 4.60068,15.3519 12.16665,30.72085 17.37461,35.29351 2.3552,2.06789 9.56283,6.61495 16.01694,10.1046 20.82794,11.26134 21.2288,12.19381 22.3975,52.10189 0.4832,16.5 1.52893,32.8125 2.32385,36.25 1.98978,8.60445 10.20459,25.23524 16.23066,32.85881 3.08052,3.89713 10.17868,9.84842 18.46969,15.48547 23.46938,15.9568 46.97074,40.8686 50.31625,53.33601 1.47626,5.5014 -0.92229,18.56285 -4.80719,26.17787 -2.96656,5.81494 -10.83616,12.92248 -18.31856,16.54464 -10.90512,5.27909 -35.11004,7.9567 -55.56756,6.14704 z m 47.17232,-13.65307 c 14.28622,-6.14576 21.94429,-20.90501 17.23927,-33.22492 -3.28151,-8.59251 -22.94129,-28.47465 -42.53659,-43.01769 -19.2671,-14.29946 -24.8272,-20.29076 -32.29036,-34.79464 -9.1532,-17.78825 -9.71268,-20.70167 -10.72698,-55.85952 -1.13346,-39.28844 -0.59512,-37.98753 -19.93886,-48.18303 -16.90691,-8.91112 -25.51061,-20.76846 -33.97043,-46.81697 -6.72273,-20.69989 -9.41323,-24.93141 -20.551038,-32.32201 -6.41024,-4.25359 -9.7821,-4.16045 -19.16739,0.52943 -13.74283,6.86738 -26.34048,24.00167 -30.26765,41.16758 -2.69691,11.78831 -11.98439,37.60319 -17.90111,49.75671 -7.23187,14.85499 -8.68451,22.07769 -8.06747,40.11229 0.4059,11.86352 1.06333,15.87414 3.609,22.01646 9.63022,23.23633 29.89605,43.14499 65.52229,64.36751 8.54023,5.08741 15.766278,11.09977 29.999998,24.96117 34.1223,33.22974 42.58084,40.2999 56.94204,47.59563 13.83031,7.02604 16.29107,7.49271 36.82147,6.98289 16.01494,-0.39767 19.71865,-0.87681 25.28381,-3.27089 z m 68.76264,3.23975 c -11.67705,-4.27908 -17.53322,-12.40366 -19.01932,-26.38652 -1.19983,-11.2892 -1.67444,-12.77035 -4.31318,-13.46039 -1.42006,-0.37136 -4.08648,-3.92957 -6.43475,-8.58687 -8.69315,-17.24108 -16.04268,-25.67925 -36.79271,-42.24255 -29.4052,-23.47214 -42.0705,-41.33845 -44.62936,-62.95648 -0.66802,-5.64352 -0.85627,-19.91017 -0.4187,-31.73107 l 0.795,-21.47737 -3.81096,-7.5495 c -4.26504,-8.44898 -4.61428,-11.22282 -2.02958,-16.12035 2.47254,-4.68498 15.75385,-17.26863 27.03898,-25.61862 5.19495,-3.84381 13.9983,-12.22405 19.56298,-18.62278 25.79839,-29.66502 50.45379,-49.24251 75.36506,-59.8432 13.17144,-5.60496 20.30845,-6.06927 28.61216,-1.86147 7.49469,3.79785 16.46858,11.60627 20.00825,17.40972 3.37898,5.54003 5.14682,18.14747 5.98196,42.66093 1.19608,35.10769 -1.66589,42.24629 -27.9865,69.80632 -23.54232,24.65092 -25.36429,27.28975 -25.36429,36.73597 0,5.37332 0.85877,9.0652 3.20292,13.76927 4.49892,9.02815 17.37403,22.45609 32.24722,33.63186 33.15504,24.91282 44.94211,37.21257 51.03942,53.25942 3.73673,9.83425 0.49485,17.29415 -15.07089,34.67977 -9.06301,10.12264 -19.32656,18.03968 -33.16659,25.58389 -15.53807,8.4698 -35.30804,12.40465 -44.81712,8.92002 z M 339.10293,472.733 c 21.87331,-11.02891 41.70847,-29.57778 46.20799,-43.21145 1.36358,-4.13173 1.12432,-5.19243 -3.0987,-13.73713 -5.83754,-11.81148 -15.41873,-21.4735 -37.93537,-38.25545 -21.48438,-16.01262 -37.28573,-31.55505 -42.08061,-41.39113 -2.7831,-5.70917 -3.54726,-9.04226 -3.58226,-15.625 -0.0705,-13.25045 0.92009,-14.68407 34.49674,-49.9278 13.22358,-13.88012 17.82632,-22.52169 19.037,-35.74167 1.10847,-12.10379 -1.31687,-50.81465 -3.51187,-56.0531 -4.33516,-10.34606 -16.47003,-19.77014 -25.45691,-19.77014 -6.33975,0 -19.55889,4.74347 -28.4289,10.20124 -18.07841,11.12376 -34.09672,25.58743 -55.66912,50.26623 -6.65792,7.61665 -15.3869,16.03165 -20,19.28063 -12.4898,8.79646 -18.64147,13.99921 -19.40797,16.41425 -0.38263,1.20555 0.86083,5.51532 2.76324,9.57727 3.44769,7.36135 3.45961,7.48094 3.66478,36.76038 0.18803,26.83567 0.4387,29.96931 2.89975,36.25 7.4221,18.94144 16.47537,30.20332 38.51713,47.91365 23.61948,18.978 29.17912,25.35005 40.20635,46.08154 4.8259,9.07281 7.02597,15.00707 8.75019,23.60207 3.69068,18.39739 8.92943,22.98321 25.12854,21.99664 7.43751,-0.45297 11.17571,-1.44221 17.5,-4.63103 z m 213.6672,-32.41512 c -1.71875,-0.54305 -9.03125,-3.31322 -16.25,-6.15594 -28.35309,-11.16536 -33.27835,-14.87487 -40.81159,-30.73775 -9.81146,-20.66015 -10.1015,-34.35456 -1.46976,-69.39578 3.18505,-12.92996 3.73495,-17.24968 3.19631,-25.1082 -1.04112,-15.18974 -8.89495,-31.78955 -21.81245,-46.10268 -11.91555,-13.20291 -35.19667,-22.6032 -62.00293,-25.03511 -21.57584,-1.9574 -25.37317,-3.13216 -29.81373,-9.22341 -7.0584,-9.68218 -8.41804,-13.7294 -10.41641,-31.00633 -3.18346,-27.52254 -5.96508,-35.5854 -16.2064,-46.97621 -5.63309,-6.26535 -5.73933,-6.53295 -3.95986,-9.97406 1.96126,-3.79267 12.51042,-14.18115 16.49926,-16.24797 1.33241,-0.69038 4.4961,-1.6293 7.03041,-2.08647 6.56112,-1.1836 82.29396,3.92366 93.51715,6.30659 29.02531,6.16271 52.94205,20.081 79.0154,45.98281 13.8943,13.80288 24.2627,28.57262 34.7636,49.52061 8.1444,16.24706 9.80591,21.29464 14.38219,43.69215 8.49067,41.55571 8.9882,62.01879 2.45142,100.82729 -7.54202,44.77666 -9.86852,52.71724 -18.23866,62.2503 -7.4632,8.50011 -20.1826,12.53221 -29.87395,9.47016 z m 15.16854,-10.7599 c 5.23747,-2.7084 10.30492,-14.16096 13.5122,-30.53785 12.45926,-63.61926 12.69658,-73.25341 3.03097,-123.04259 -4.71777,-24.30201 -7.96581,-33.13753 -20.58512,-55.99685 -7.843,-14.20726 -13.95166,-22.29885 -26.12659,-34.60755 -9.33594,-9.43852 -28.76288,-24.06791 -41.45553,-31.21795 -10.16798,-5.72783 -31.50991,-12.38443 -44.19371,-13.78412 -21.07706,-2.3259 -77.15739,-4.19559 -81.0222,-2.70123 l -3.54645,1.37125 2.29645,3.61332 c 12.02215,18.9161 12.61612,20.68656 14.88479,44.36737 1.96262,20.48629 4.10475,27.01944 10.67084,32.54444 3.9655,3.33676 3.93601,3.33004 27.36581,6.2426 20.45169,2.54236 29.6857,4.91514 42.05645,10.80685 12.84745,6.11876 22.11444,14.53474 31.56984,28.67072 16.04438,23.98662 17.70548,38.37554 8.94498,77.48374 -2.21941,9.9078 -3.78861,20.50821 -3.80068,25.67487 -0.0468,19.97027 9.72441,41.43837 21.72746,47.73741 3.97726,2.0872 38.0794,15.14502 39.87653,15.26884 0.54976,0.0379 2.70705,-0.81408 4.79396,-1.89327 z M 160.69449,240.20353 c -10.1095,-3.06282 -27.3622,-25.00135 -40.74272,-51.8084 -8.58944,-17.20841 -12.34578,-27.68979 -15.90321,-44.375 -1.48086,-5.26815 2.61254,-18.53804 6.3991,-21.59489 6.86352,-6.32056 12.52807,-10.08228 22.32247,-14.8239 7.21875,-3.49471 17.71419,-8.576421 23.32319,-11.292671 13.09452,-6.34126 22.13596,-12.68858 38.14185,-26.77656 17.52326,-15.42354 23.425,-19.45081 39.97256,-27.27681 26.36309,-12.46813 57.08243,-22.14391 95.92481,-30.21375 21.69648,-4.5076297 56.0752,-4.7788397 85.76259,-0.67656 24.9284,3.44467 32.70256,5.37046 42.32943,10.48568 9.36119,4.97408 25.56371,20.73509 29.29999,28.50162 3.32437,6.91026 3.56787,15.78299 0.66917,24.38267 -2.78359,8.25814 -18.038,23.6498 -28.43614,28.691981 -6.62584,3.21296 -8.62356,3.57243 -19.375,3.48643 -6.5931,-0.0527 -16.10235,-1.00654 -21.13168,-2.11956 -17.3118,-3.83122 -26.675,-2.65481 -63.35577,7.96017 -31.0489,8.98519 -61.35751,19.53309 -70.46623,24.52344 -9.43398,5.16853 -24.51286,16.46207 -35.23988,26.39341 -4.23504,3.9209 -16.56599,18.96287 -27.40212,33.4266 -20.17321,26.9266 -29.20386,36.3177 -39.07512,40.63477 -6.56086,2.86933 -17.74135,4.06975 -23.01729,2.47133 z m 21.19013,-11.93662 c 7.85062,-5.13668 14.17802,-12.53119 30.96139,-36.18297 17.33398,-24.42776 28.30096,-36.05827 48.04912,-50.95623 6.1875,-4.66784 15.75,-10.66707 21.25,-13.33163 19.69434,-9.54121 93.26069,-32.301631 113.30783,-35.055881 10.96916,-1.50704 21.00186,-0.9334 35.2114,2.01327 17.30331,3.58825 24.1366,1.96396 34.59565,-8.22347 10.58846,-10.31349 13.4566,-19.27933 9.13975,-28.57096 -3.68257,-7.92634 -18.64978,-21.73911 -29.16163,-26.91234 -8.66147,-4.2626 -11.28669,-4.86216 -33.125,-7.56525 -49.6128,-6.14097 -67.61244,-5.47767 -104.9128,3.86608 -31.33746,7.85005 -43.95427,12.04485 -61.3052,20.38258 -17.08057,8.20783 -28.14736,15.71085 -42.5,28.81402 -13.63341,12.44656 -24.98371,19.67682 -50.10035,31.914461 -22.49605,10.96081 -34.04839,18.97975 -36.75444,25.51275 -3.12957,7.55545 3.40887,27.60137 18.33372,56.20852 9.87311,18.92425 15.96411,28.05395 22.89268,34.31351 9.81575,8.86794 15.07438,9.69071 24.11788,3.77354 z"
     style="fill:#000000" />
  
  <a xlink:href="<?php echo $firstLevelProjects[0]->getUrl(); ?>">
  <path
     id="path4222"
     d="m 84.552506,184.54006 c -9.820755,1.44883 -17.863246,8.33205 -24.873145,14.92005 -12.738644,12.31689 -16.249387,30.41452 -21.829435,46.47961 -4.989643,16.6985 -12.959062,32.34583 -18.78664,48.7884 -3.042828,10.89636 -1.834367,22.41961 -1.504545,33.5772 1.151457,17.65075 12.586185,32.51292 24.142201,45.02702 19.065461,20.62092 45.62149,31.84146 65.861208,51.08785 18.47567,16.29061 35.25801,34.63983 55.36199,48.99845 8.45327,5.29527 17.30637,10.48999 27.01664,13.03543 12.67803,1.71468 25.59636,0.76864 38.28893,-0.41211 13.73406,-1.93073 26.10386,-13.75821 27.48038,-27.75551 0.61145,-10.65796 -7.77549,-18.81043 -14.32686,-26.11853 -13.63405,-14.40139 -29.9271,-25.83311 -44.82226,-38.81213 -10.86004,-9.93488 -18.19484,-22.96914 -23.15502,-36.59123 -4.4126,-16.28346 -3.56742,-33.2612 -4.70292,-49.94865 -0.88579,-9.67711 0.0494,-20.24575 -4.92458,-28.98172 -5.27691,-7.18344 -14.40447,-9.82395 -21.33598,-15.03899 -13.54974,-8.45063 -20.43175,-23.67706 -25.74132,-37.99784 -4.96606,-12.79199 -8.38768,-28.02279 -20.979638,-35.69886 -3.370236,-2.1179 -7.057077,-4.51983 -11.169006,-4.55844 z"
     style="opacity:1;fill:#<?php echo $firstLevelProjects[0]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#3f3f3f;stroke-width:0;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
  </a>
  
  <a xlink:href="<?php echo $firstLevelProjects[1]->getUrl(); ?>">
  <path
     id="path4224"
     d="m 322.2342,157.73124 c -26.20015,4.1424 -46.75879,23.24777 -65.32019,40.8121 -15.68178,15.98691 -29.92254,33.57779 -48.33924,46.63082 -4.90591,4.09388 -12.90866,9.61683 -8.46194,16.99979 6.89887,17.20938 3.54868,36.24286 5.07682,54.33439 0.33439,9.30884 -1.04949,19.09203 5.00728,27.00062 12.05933,28.25135 40.35873,43.40773 60.52238,64.94582 13.92619,16.02133 22.05746,35.85173 27.16318,56.23431 2.26501,9.70058 12.08198,15.40317 21.69642,14.08861 21.90389,-1.53188 40.13041,-16.39622 55.17941,-31.18575 6.68409,-7.65123 16.23726,-18.24541 10.09807,-28.92934 -13.27645,-27.56404 -42.78989,-41.05225 -63.21323,-62.39327 -9.45847,-9.63842 -21.91942,-19.56667 -21.42979,-34.51855 -1.99393,-12.70498 8.05686,-21.79012 15.47513,-30.45525 14.16829,-17.54714 35.79896,-32.73896 37.78671,-57.04891 0.8234,-18.75114 -0.0695,-37.88752 -4.15955,-56.23672 -4.49399,-10.16651 -15.6289,-19.80164 -27.08146,-20.27867 z"
     style="opacity:1;fill:#<?php echo $firstLevelProjects[1]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#3f3f3f;stroke-width:0;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
  </a>
  
  <a xlink:href="<?php echo $firstLevelProjects[2]->getUrl(); ?>">
  <path
     id="path4226"
     d="m 355.14528,18.676151 c -29.42983,0.631866 -57.95106,9.639486 -85.85814,18.252963 -27.44779,8.665757 -52.01686,24.527999 -73.00622,44.021877 -22.54595,18.536483 -51.07785,27.531589 -74.31028,44.926479 -6.67288,4.74376 -9.51593,13.29863 -6.27416,20.97073 7.4552,25.31443 19.68662,49.27243 34.57154,71.00537 6.42851,8.48823 17.54704,19.35484 28.96781,13.22835 17.53625,-11.20356 27.77102,-30.34067 40.57018,-46.19514 21.31502,-28.27962 48.90628,-53.52825 83.40385,-63.77611 30.01818,-10.0808 60.06367,-20.95616 91.33212,-26.534295 15.74538,-2.321016 31.35119,1.110943 46.91319,2.876356 15.50448,1.147089 28.86944,-11.438214 34.67486,-24.801059 C 481.10542,58.442874 468.52912,46.74211 458.4706,38.820253 447.45392,29.176227 433.47741,23.924858 418.94407,22.894392 397.80655,20.136221 376.4641,18.671184 355.14528,18.676151 Z"
     style="opacity:1;fill:#<?php echo $firstLevelProjects[2]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#3f3f3f;stroke-width:0;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
  </a>

  <a xlink:href="<?php echo $firstLevelProjects[3]->getUrl(); ?>">
  <path
     id="path4228"
     d="m 378.67036,135.71523 c -3.54024,0.17685 -13.12868,-0.48543 -10.66439,5.63016 6.92108,11.46145 13.6324,23.49544 14.24792,37.22367 2.57586,14.21352 1.55228,31.5006 12.84317,42.24496 8.56897,5.64721 19.84749,4.43026 29.56223,6.784 22.87636,2.22055 46.58256,9.66719 62.03478,27.62252 11.70999,13.49052 23.35272,30.33011 21.50582,49.23608 1.63978,22.94061 -7.44097,44.89303 -7.85513,67.85267 1.56895,17.20264 8.10167,36.65058 24.06815,45.48824 12.82538,5.46805 25.84685,11.56923 39.52406,14.27845 11.09506,-1.65423 13.43215,-15.31723 16.38585,-24.1066 9.94768,-39.38579 16.1969,-80.79801 7.81206,-121.09529 -3.58045,-23.0263 -10.85257,-45.36218 -22.31176,-65.6984 -14.51291,-28.39407 -39.81717,-49.68279 -66.36505,-66.46258 -21.33168,-11.30096 -45.31946,-17.13094 -69.44585,-17.21728 -17.09759,-0.88835 -34.214,-1.94566 -51.34186,-1.7806 z"
     style="opacity:1;fill:#<?php echo $firstLevelProjects[3]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#3f3f3f;stroke-width:0;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
  </a>

  <a xlink:href="<?php echo $firstLevelProjects[4]->getUrl(); ?>">
  <path
     id="path4234"
	 d="m 532.70557,39.483472 c -12.44322,1.418167 -19.46936,14.379904 -20.30178,25.843034 -3.12041,12.630117 -2.11481,26.346079 5.5139,37.249354 15.28565,22.24196 36.60561,39.46914 55.00813,59.00576 12.26212,10.79446 20.94051,24.59767 28.21634,39.11473 7.1984,10.80168 12.07259,25.79948 25.20716,30.77965 15.45335,3.6459 30.64305,-2.76576 43.58268,-10.7557 10.69209,-7.16269 24.57195,-12.40497 30.68113,-24.45983 2.8572,-11.90811 2.35925,-24.7978 -0.2331,-36.73421 C 688.10091,122.8716 656.41442,97.243365 624.98576,77.01177 599.07116,61.207078 571.85373,45.400393 541.60857,39.971275 c -2.95194,-0.337763 -5.93123,-0.533944 -8.903,-0.487803 z"
     style="opacity:1;fill:#<?php echo $firstLevelProjects[4]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#3f3f3f;stroke-width:0;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
  </a>

  <a xlink:href="<?php echo $firstLevelProjects[5]->getUrl(); ?>">
  <path
     id="path4236"
	 d="m 726.19034,207.24445 c -16.2485,20.53707 -36.44317,41.55632 -63.88056,44.2507 -12.01991,2.90101 -27.38663,0.62368 -35.71776,11.7289 -7.59724,5.72855 -3.09862,15.23576 -2.67275,22.91593 5.16004,33.46551 4.76581,67.50243 -0.83804,100.88642 -2.49788,21.30371 -1.51643,44.53639 11.78645,62.41909 13.50301,17.65162 23.64599,37.39875 34.86727,56.48819 10.73587,10.09782 27.16261,11.60024 40.90337,7.56695 33.33903,-7.96435 65.99234,-25.61297 86.072,-54.05242 5.48735,-9.09084 11.61397,-18.65205 9.5831,-29.74876 -0.58518,-16.98549 1.02285,-34.27933 -0.88346,-51.07923 -16.78262,-58.48826 -42.62743,-114.01192 -72.01311,-167.13453 -1.65915,-1.97613 -4.50457,-6.22885 -7.20651,-4.24124 z"
     style="opacity:1;fill:#<?php echo $firstLevelProjects[5]->getColor();?>;fill-opacity:1;fill-rule:evenodd;stroke:#3f3f3f;stroke-width:0;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
  </a>

  <a xlink:href="/themes">
  <path
     id="path4257"
     d="m 407.60014,254.78669 c -6.75697,-0.30791 -13.57893,1.47385 -18.23427,6.68424 -16.80011,14.2116 -34.88669,29.44839 -41.94306,51.08878 -2.14991,6.99836 2.60538,13.25423 7.506,17.66228 16.92883,18.81594 36.42643,35.26357 51.85574,55.37597 9.7932,12.66353 13.96834,29.0073 12.00964,44.84925 -2.02752,17.34785 -5.76246,37.85767 5.72615,53.06635 4.86741,6.28829 12.22714,11.97349 20.67024,10.23403 15.07608,-2.19395 30.97795,-9.19952 39.12053,-22.67085 6.46578,-9.56539 1.49845,-21.0741 -2.74573,-30.37529 -6.11962,-14.60791 -14.91011,-28.37784 -18.24819,-43.9927 0.49726,-22.03929 9.32254,-42.83049 12.30665,-64.68136 2.86094,-16.74775 3.22717,-36.30217 -8.9865,-49.67868 -14.84297,-16.31939 -36.52065,-28.29102 -59.0372,-27.56202 z"
     style="opacity:1;fill:#2b2e34;fill-opacity:1;fill-rule:evenodd;stroke:#3f3f3f;stroke-width:0;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
  </a>


  <a xlink:href="/10-Journal">
  <path
     id="path4232"
     d="m 561.22162,455.44967 c -13.58442,-0.36644 -29.58795,2.64819 -36.41942,15.91487 -14.58555,26.35499 -44.96589,36.84458 -66.16579,56.47461 -6.4501,8.24262 0.46208,19.37417 5.77433,26.37501 17.99259,16.36918 40.64602,26.54116 61.52757,38.65655 18.42245,9.07673 37.4256,22.273 42.50602,43.41613 6.87673,22.3686 -6.99723,43.28102 -13.79003,63.73235 -10.88191,28.44525 -14.82126,59.30772 -13.28122,89.60917 1.68571,4.91676 3.15784,13.43452 9.386,14.00211 8.34223,-2.8362 16.4682,-7.96689 22.20105,-14.68936 4.93359,-13.50778 2.71666,-28.51606 4.73625,-42.61428 2.11052,-31.20535 21.90953,-57.94668 43.61698,-78.97789 18.40355,-18.73483 43.85063,-34.37713 50.28149,-61.62711 1.87063,-15.83332 4.24384,-34.75828 -8.09652,-47.24439 -10.52481,-12.80912 -24.50972,-22.86237 -33.46285,-36.8788 -8.44408,-17.61767 -9.32283,-40.78991 -27.28092,-52.29345 -12.02231,-8.90717 -26.24513,-15.26749 -41.53294,-13.85552 z"
     style="opacity:1;fill:#2b2e34;fill-opacity:1;fill-rule:evenodd;stroke:#3f3f3f;stroke-width:0;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" />
  </a>

		</svg>
	</div>
</div>

</body>
</html>