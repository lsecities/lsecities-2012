<?php
/**
 * This is the script, generated from source CSV data, which was
 * used to import data from the Media Archive spreadsheet into
 * Pods in September 2013. It is saved here for reference.
 */
$api = new PodAPI();
$api->reset_pod(array("name" => "media_item"));
$api->reset_pod(array("name" => "tag"));
$api->reset_pod(array("name" => "geotag"));

$all_the_tags = array (
  0 => 
  array (
    'name' => '',
  ),
  191 => 
  array (
    'name' => '\'american urban age\'',
  ),
  192 => 
  array (
    'name' => '\'art of making cities\'',
  ),
  193 => 
  array (
    'name' => '\'chameleon institutions\'',
  ),
  194 => 
  array (
    'name' => '\'city for cars\'',
  ),
  195 => 
  array (
    'name' => '\'city for people\'',
  ),
  196 => 
  array (
    'name' => '\'city powers\'',
  ),
  197 => 
  array (
    'name' => '\'cityness\'',
  ),
  199 => 
  array (
    'name' => '\'do no harm\' in urban design',
  ),
  200 => 
  array (
    'name' => '\'door to door\' conections',
  ),
  201 => 
  array (
    'name' => '\'formally informal sector\'',
  ),
  202 => 
  array (
    'name' => '\'frills\'',
  ),
  203 => 
  array (
    'name' => '\'gene pool\'',
  ),
  205 => 
  array (
    'name' => '\'good city\'',
  ),
  206 => 
  array (
    'name' => '\'governance scorecard\'',
  ),
  207 => 
  array (
    'name' => '\'impatient capital\'',
  ),
  208 => 
  array (
    'name' => '\'making places\'',
  ),
  209 => 
  array (
    'name' => '\'ordinary people\'',
  ),
  210 => 
  array (
    'name' => '\'problems\'',
  ),
  211 => 
  array (
    'name' => '\'quality of life equality\'',
  ),
  212 => 
  array (
    'name' => '\'rediscovering mumbai\'',
  ),
  213 => 
  array (
    'name' => '\'ruination\'/\'ruins\'',
  ),
  214 => 
  array (
    'name' => '\'salami planning\'',
  ),
  215 => 
  array (
    'name' => '\'sanitisation of large cities\'',
  ),
  217 => 
  array (
    'name' => '\'secured by design\'',
  ),
  219 => 
  array (
    'name' => '\'shaping the city\'',
  ),
  220 => 
  array (
    'name' => '\'street grain\'',
  ),
  221 => 
  array (
    'name' => '\'the brittle city\'',
  ),
  222 => 
  array (
    'name' => '\'urban age project\'',
  ),
  223 => 
  array (
    'name' => '\'urban magnets\'',
  ),
  224 => 
  array (
    'name' => '\'war on terror',
  ),
  225 => 
  array (
    'name' => '(redo part 3)',
  ),
  226 => 
  array (
    'name' => '-',
  ),
  227 => 
  array (
    'name' => '125th street',
  ),
  228 => 
  array (
    'name' => '1982 asian games',
  ),
  229 => 
  array (
    'name' => '2010 commonwealth games',
  ),
  230 => 
  array (
    'name' => '2012 olympics',
  ),
  231 => 
  array (
    'name' => '20th century',
  ),
  232 => 
  array (
    'name' => '5 borough strategy',
  ),
  233 => 
  array (
    'name' => '74th constitutional amendment',
  ),
  234 => 
  array (
    'name' => '8arti',
  ),
  236 => 
  array (
    'name' => 'abercrombie plan',
  ),
  237 => 
  array (
    'name' => 'absorbing migrant population',
  ),
  238 => 
  array (
    'name' => 'absorbing urban growth',
  ),
  239 => 
  array (
    'name' => 'academic.',
  ),
  241 => 
  array (
    'name' => 'acceleration',
  ),
  242 => 
  array (
    'name' => 'access',
  ),
  243 => 
  array (
    'name' => 'accessibility',
  ),
  249 => 
  array (
    'name' => 'accessibilty',
  ),
  250 => 
  array (
    'name' => 'accessibity',
  ),
  252 => 
  array (
    'name' => 'accidents',
  ),
  253 => 
  array (
    'name' => 'accommdation',
  ),
  254 => 
  array (
    'name' => 'accountability',
  ),
  257 => 
  array (
    'name' => 'achitectural profession',
  ),
  259 => 
  array (
    'name' => 'acknowledgements',
  ),
  263 => 
  array (
    'name' => 'activism',
  ),
  264 => 
  array (
    'name' => 'actors involved',
  ),
  265 => 
  array (
    'name' => 'adaptability',
  ),
  268 => 
  array (
    'name' => 'adaptation',
  ),
  270 => 
  array (
    'name' => 'adaptive strategies',
  ),
  271 => 
  array (
    'name' => 'adding value',
  ),
  272 => 
  array (
    'name' => 'administrative boundaries',
  ),
  273 => 
  array (
    'name' => 'adult education',
  ),
  276 => 
  array (
    'name' => 'advanced economies',
  ),
  277 => 
  array (
    'name' => 'advanced service economies',
  ),
  279 => 
  array (
    'name' => 'advantages of cities for emissions redcution',
  ),
  280 => 
  array (
    'name' => 'advantages of mumbai',
  ),
  281 => 
  array (
    'name' => 'advice',
  ),
  282 => 
  array (
    'name' => 'affordabilty',
  ),
  283 => 
  array (
    'name' => 'affordable housing',
  ),
  288 => 
  array (
    'name' => 'africa',
  ),
  290 => 
  array (
    'name' => 'africa south america',
  ),
  291 => 
  array (
    'name' => 'african cities',
  ),
  292 => 
  array (
    'name' => 'air pollution',
  ),
  293 => 
  array (
    'name' => 'air travel',
  ),
  294 => 
  array (
    'name' => 'airports',
  ),
  296 => 
  array (
    'name' => 'akaya neighbourhood project',
  ),
  297 => 
  array (
    'name' => 'alabama',
  ),
  298 => 
  array (
    'name' => 'alexandra',
  ),
  302 => 
  array (
    'name' => 'alexandra township',
  ),
  303 => 
  array (
    'name' => 'alienation',
  ),
  305 => 
  array (
    'name' => 'alternative city visions',
  ),
  306 => 
  array (
    'name' => 'america',
  ),
  309 => 
  array (
    'name' => 'american cities',
  ),
  311 => 
  array (
    'name' => 'american city',
  ),
  312 => 
  array (
    'name' => 'american offices',
  ),
  313 => 
  array (
    'name' => 'amsterdam',
  ),
  317 => 
  array (
    'name' => 'anacosia waterfront initiative',
  ),
  318 => 
  array (
    'name' => 'anacostia waterfront project',
  ),
  319 => 
  array (
    'name' => 'analysis of cities',
  ),
  320 => 
  array (
    'name' => 'ankara',
  ),
  321 => 
  array (
    'name' => 'anti-urban policies',
  ),
  322 => 
  array (
    'name' => 'apartheid',
  ),
  331 => 
  array (
    'name' => 'architects',
  ),
  339 => 
  array (
    'name' => 'architects position',
  ),
  341 => 
  array (
    'name' => 'architectural',
  ),
  342 => 
  array (
    'name' => 'architectural practice',
  ),
  344 => 
  array (
    'name' => 'architectural profession',
  ),
  345 => 
  array (
    'name' => 'architectural relevance',
  ),
  346 => 
  array (
    'name' => 'architectural symbolism',
  ),
  348 => 
  array (
    'name' => 'architecture',
  ),
  402 => 
  array (
    'name' => 'arkitera architecture center',
  ),
  403 => 
  array (
    'name' => 'arkitera-urban age',
  ),
  405 => 
  array (
    'name' => 'art?',
  ),
  407 => 
  array (
    'name' => 'artist',
  ),
  409 => 
  array (
    'name' => 'asia',
  ),
  410 => 
  array (
    'name' => 'assimilation',
  ),
  411 => 
  array (
    'name' => 'assults',
  ),
  412 => 
  array (
    'name' => 'atlanta',
  ),
  413 => 
  array (
    'name' => 'atlantic yards project',
  ),
  414 => 
  array (
    'name' => 'attitudes',
  ),
  415 => 
  array (
    'name' => 'attract people',
  ),
  416 => 
  array (
    'name' => 'authenticity',
  ),
  417 => 
  array (
    'name' => 'authority',
  ),
  420 => 
  array (
    'name' => 'autonomy',
  ),
  421 => 
  array (
    'name' => 'axiety',
  ),
  424 => 
  array (
    'name' => 'bangalore',
  ),
  425 => 
  array (
    'name' => 'barcelona',
  ),
  436 => 
  array (
    'name' => 'barreirs',
  ),
  437 => 
  array (
    'name' => 'beijing',
  ),
  441 => 
  array (
    'name' => 'benefits',
  ),
  442 => 
  array (
    'name' => 'berlin',
  ),
  466 => 
  array (
    'name' => 'better knowledge base',
  ),
  467 => 
  array (
    'name' => 'bicycle lanes',
  ),
  470 => 
  array (
    'name' => 'bicycle use',
  ),
  471 => 
  array (
    'name' => 'bicycles',
  ),
  475 => 
  array (
    'name' => 'bicycles/cycling',
  ),
  476 => 
  array (
    'name' => 'board of education',
  ),
  480 => 
  array (
    'name' => 'bobby white?',
  ),
  482 => 
  array (
    'name' => 'bogota',
  ),
  486 => 
  array (
    'name' => 'bogotá',
  ),
  504 => 
  array (
    'name' => 'bom retiro',
  ),
  505 => 
  array (
    'name' => 'bonds of intimacy',
  ),
  506 => 
  array (
    'name' => 'bosphorus tunnel project',
  ),
  508 => 
  array (
    'name' => 'bosporus bridge',
  ),
  510 => 
  array (
    'name' => 'brazil',
  ),
  512 => 
  array (
    'name' => 'brickfields',
  ),
  513 => 
  array (
    'name' => 'brittle city',
  ),
  515 => 
  array (
    'name' => 'broadway',
  ),
  516 => 
  array (
    'name' => 'bronx terminal market',
  ),
  517 => 
  array (
    'name' => 'brooklyn',
  ),
  518 => 
  array (
    'name' => 'brownfield development',
  ),
  520 => 
  array (
    'name' => 'brussels',
  ),
  521 => 
  array (
    'name' => 'budapest',
  ),
  522 => 
  array (
    'name' => 'buenos aires',
  ),
  525 => 
  array (
    'name' => 'buildings',
  ),
  531 => 
  array (
    'name' => 'built environment',
  ),
  533 => 
  array (
    'name' => 'built form',
  ),
  535 => 
  array (
    'name' => 'built form typology',
  ),
  537 => 
  array (
    'name' => 'bureaucracy',
  ),
  538 => 
  array (
    'name' => 'burglury',
  ),
  539 => 
  array (
    'name' => 'bus lanes',
  ),
  541 => 
  array (
    'name' => 'bus rail network',
  ),
  543 => 
  array (
    'name' => 'bus rapid transit',
  ),
  545 => 
  array (
    'name' => 'bus rapid transport',
  ),
  546 => 
  array (
    'name' => 'bus stops',
  ),
  548 => 
  array (
    'name' => 'bus system',
  ),
  549 => 
  array (
    'name' => 'buses',
  ),
  566 => 
  array (
    'name' => 'business',
  ),
  570 => 
  array (
    'name' => 'business community',
  ),
  573 => 
  array (
    'name' => 'business continuity',
  ),
  574 => 
  array (
    'name' => 'c40',
  ),
  575 => 
  array (
    'name' => 'cairo',
  ),
  577 => 
  array (
    'name' => 'canary wharf',
  ),
  578 => 
  array (
    'name' => 'canary wharff',
  ),
  585 => 
  array (
    'name' => 'capacity',
  ),
  589 => 
  array (
    'name' => 'cape town',
  ),
  590 => 
  array (
    'name' => 'capital',
  ),
  594 => 
  array (
    'name' => 'capital flows',
  ),
  596 => 
  array (
    'name' => 'capitalism',
  ),
  598 => 
  array (
    'name' => 'capitalist city',
  ),
  601 => 
  array (
    'name' => 'car free centres',
  ),
  603 => 
  array (
    'name' => 'car ownership',
  ),
  609 => 
  array (
    'name' => 'car traffic',
  ),
  611 => 
  array (
    'name' => 'car use',
  ),
  612 => 
  array (
    'name' => 'caracas',
  ),
  614 => 
  array (
    'name' => 'carbon emissions',
  ),
  615 => 
  array (
    'name' => 'carbon emmisions',
  ),
  616 => 
  array (
    'name' => 'carbon emmission reductions',
  ),
  617 => 
  array (
    'name' => 'carbon emmissions',
  ),
  622 => 
  array (
    'name' => 'carbon pricing',
  ),
  623 => 
  array (
    'name' => 'carbon trading mechanisms',
  ),
  624 => 
  array (
    'name' => 'cars',
  ),
  653 => 
  array (
    'name' => 'catchment area',
  ),
  654 => 
  array (
    'name' => 'cbd',
  ),
  660 => 
  array (
    'name' => 'cedric price',
  ),
  663 => 
  array (
    'name' => 'central cities',
  ),
  665 => 
  array (
    'name' => 'central government',
  ),
  666 => 
  array (
    'name' => 'central park',
  ),
  667 => 
  array (
    'name' => 'centralisation',
  ),
  673 => 
  array (
    'name' => 'centralised',
  ),
  674 => 
  array (
    'name' => 'centrality',
  ),
  675 => 
  array (
    'name' => 'centralization',
  ),
  677 => 
  array (
    'name' => 'centre',
  ),
  679 => 
  array (
    'name' => 'centre and periphery',
  ),
  680 => 
  array (
    'name' => 'centre revitalization',
  ),
  681 => 
  array (
    'name' => 'centre vs periphery',
  ),
  683 => 
  array (
    'name' => 'challenge',
  ),
  685 => 
  array (
    'name' => 'challenges',
  ),
  694 => 
  array (
    'name' => 'challenges for delhi',
  ),
  696 => 
  array (
    'name' => 'challenges of planning',
  ),
  698 => 
  array (
    'name' => 'change',
  ),
  704 => 
  array (
    'name' => 'changing economy',
  ),
  705 => 
  array (
    'name' => 'channel growth',
  ),
  706 => 
  array (
    'name' => 'channel market forces',
  ),
  707 => 
  array (
    'name' => 'chapultepec',
  ),
  708 => 
  array (
    'name' => 'character',
  ),
  709 => 
  array (
    'name' => 'characteristics',
  ),
  710 => 
  array (
    'name' => 'cheapness',
  ),
  711 => 
  array (
    'name' => 'chengdu',
  ),
  712 => 
  array (
    'name' => 'chicago',
  ),
  719 => 
  array (
    'name' => 'children',
  ),
  722 => 
  array (
    'name' => 'china',
  ),
  729 => 
  array (
    'name' => 'china\'s urbanisation',
  ),
  730 => 
  array (
    'name' => 'china\'s urbanism',
  ),
  731 => 
  array (
    'name' => 'chinese cities',
  ),
  734 => 
  array (
    'name' => 'choice of olympics site',
  ),
  735 => 
  array (
    'name' => 'cidade tiradentes',
  ),
  737 => 
  array (
    'name' => 'cinema',
  ),
  739 => 
  array (
    'name' => 'cities',
  ),
  752 => 
  array (
    'name' => 'cities and climate change',
  ),
  753 => 
  array (
    'name' => 'cities and emissions',
  ),
  754 => 
  array (
    'name' => 'cities as community products',
  ),
  757 => 
  array (
    'name' => 'cities program',
  ),
  758 => 
  array (
    'name' => 'cities programme',
  ),
  759 => 
  array (
    'name' => 'cities.',
  ),
  760 => 
  array (
    'name' => 'citizen power',
  ),
  761 => 
  array (
    'name' => 'citizens',
  ),
  764 => 
  array (
    'name' => 'citizenship',
  ),
  769 => 
  array (
    'name' => 'city',
  ),
  771 => 
  array (
    'name' => 'city actors',
  ),
  772 => 
  array (
    'name' => 'city administration',
  ),
  773 => 
  array (
    'name' => 'city and state relationship',
  ),
  774 => 
  array (
    'name' => 'city beautiful movement',
  ),
  778 => 
  array (
    'name' => 'city building',
  ),
  779 => 
  array (
    'name' => 'city center',
  ),
  780 => 
  array (
    'name' => 'city centre',
  ),
  781 => 
  array (
    'name' => 'city centres',
  ),
  782 => 
  array (
    'name' => 'city competitiveness',
  ),
  783 => 
  array (
    'name' => 'city council',
  ),
  784 => 
  array (
    'name' => 'city design',
  ),
  786 => 
  array (
    'name' => 'city finances',
  ),
  788 => 
  array (
    'name' => 'city financial default',
  ),
  789 => 
  array (
    'name' => 'city government',
  ),
  792 => 
  array (
    'name' => 'city government powers',
  ),
  793 => 
  array (
    'name' => 'city growth',
  ),
  800 => 
  array (
    'name' => 'city hall',
  ),
  802 => 
  array (
    'name' => 'city identity',
  ),
  806 => 
  array (
    'name' => 'city life',
  ),
  807 => 
  array (
    'name' => 'city life?',
  ),
  809 => 
  array (
    'name' => 'city management',
  ),
  810 => 
  array (
    'name' => 'city network',
  ),
  813 => 
  array (
    'name' => 'city networks',
  ),
  826 => 
  array (
    'name' => 'city planning',
  ),
  829 => 
  array (
    'name' => 'city profile',
  ),
  831 => 
  array (
    'name' => 'city space',
  ),
  832 => 
  array (
    'name' => 'city visioning',
  ),
  835 => 
  array (
    'name' => 'city visions',
  ),
  836 => 
  array (
    'name' => 'city vs region',
  ),
  837 => 
  array (
    'name' => 'city vulnerabilities',
  ),
  838 => 
  array (
    'name' => 'city-ness',
  ),
  839 => 
  array (
    'name' => 'cityness',
  ),
  842 => 
  array (
    'name' => 'cityness.',
  ),
  843 => 
  array (
    'name' => 'ciudad neza',
  ),
  845 => 
  array (
    'name' => 'civic renewal',
  ),
  846 => 
  array (
    'name' => 'civic services',
  ),
  849 => 
  array (
    'name' => 'civicness',
  ),
  851 => 
  array (
    'name' => 'civil society',
  ),
  853 => 
  array (
    'name' => 'civility',
  ),
  854 => 
  array (
    'name' => 'civility\'',
  ),
  855 => 
  array (
    'name' => 'civilty',
  ),
  856 => 
  array (
    'name' => 'class conflict',
  ),
  857 => 
  array (
    'name' => 'class difference',
  ),
  858 => 
  array (
    'name' => 'climate',
  ),
  859 => 
  array (
    'name' => 'climate change',
  ),
  877 => 
  array (
    'name' => 'climate change prognosis',
  ),
  878 => 
  array (
    'name' => 'closed city',
  ),
  879 => 
  array (
    'name' => 'closing remarks',
  ),
  883 => 
  array (
    'name' => 'co2 emissions',
  ),
  885 => 
  array (
    'name' => 'coalition of cities',
  ),
  886 => 
  array (
    'name' => 'coalitions',
  ),
  888 => 
  array (
    'name' => 'cohesion',
  ),
  890 => 
  array (
    'name' => 'collaboration',
  ),
  892 => 
  array (
    'name' => 'cologne',
  ),
  893 => 
  array (
    'name' => 'columbia',
  ),
  896 => 
  array (
    'name' => 'columbia university',
  ),
  898 => 
  array (
    'name' => 'commercial',
  ),
  899 => 
  array (
    'name' => 'commercialisation of public space',
  ),
  903 => 
  array (
    'name' => 'commonwealth games village',
  ),
  904 => 
  array (
    'name' => 'communal bonds',
  ),
  905 => 
  array (
    'name' => 'communal life',
  ),
  906 => 
  array (
    'name' => 'communities',
  ),
  907 => 
  array (
    'name' => 'community',
  ),
  914 => 
  array (
    'name' => 'community benefits agreements',
  ),
  915 => 
  array (
    'name' => 'community engagement',
  ),
  916 => 
  array (
    'name' => 'community group',
  ),
  917 => 
  array (
    'name' => 'community policing',
  ),
  918 => 
  array (
    'name' => 'communties',
  ),
  920 => 
  array (
    'name' => 'communting in london',
  ),
  921 => 
  array (
    'name' => 'communtiy',
  ),
  922 => 
  array (
    'name' => 'communtiy engagement',
  ),
  924 => 
  array (
    'name' => 'commuters',
  ),
  925 => 
  array (
    'name' => 'compact city',
  ),
  927 => 
  array (
    'name' => 'compact development',
  ),
  928 => 
  array (
    'name' => 'compact form',
  ),
  932 => 
  array (
    'name' => 'competition',
  ),
  933 => 
  array (
    'name' => 'complexities',
  ),
  934 => 
  array (
    'name' => 'complexity',
  ),
  941 => 
  array (
    'name' => 'comprehensiveness',
  ),
  943 => 
  array (
    'name' => 'concrete',
  ),
  945 => 
  array (
    'name' => 'conference programme',
  ),
  946 => 
  array (
    'name' => 'conference themes',
  ),
  947 => 
  array (
    'name' => 'conferences',
  ),
  949 => 
  array (
    'name' => 'conflict',
  ),
  950 => 
  array (
    'name' => 'congestion',
  ),
  953 => 
  array (
    'name' => 'congestion charge',
  ),
  958 => 
  array (
    'name' => 'congestion transport system',
  ),
  959 => 
  array (
    'name' => 'congruent layers',
  ),
  961 => 
  array (
    'name' => 'connect',
  ),
  962 => 
  array (
    'name' => 'connecting',
  ),
  963 => 
  array (
    'name' => 'connection',
  ),
  964 => 
  array (
    'name' => 'connection of hubs',
  ),
  965 => 
  array (
    'name' => 'connection with space channel tunnel rail link',
  ),
  966 => 
  array (
    'name' => 'connectivity',
  ),
  968 => 
  array (
    'name' => 'constant change',
  ),
  969 => 
  array (
    'name' => 'construction time',
  ),
  971 => 
  array (
    'name' => 'consultation',
  ),
  973 => 
  array (
    'name' => 'consumerism',
  ),
  974 => 
  array (
    'name' => 'consumption',
  ),
  978 => 
  array (
    'name' => 'contaminated land',
  ),
  979 => 
  array (
    'name' => 'contemporary architecture',
  ),
  980 => 
  array (
    'name' => 'continuity',
  ),
  982 => 
  array (
    'name' => 'control',
  ),
  990 => 
  array (
    'name' => 'convergence',
  ),
  991 => 
  array (
    'name' => 'cooperation',
  ),
  992 => 
  array (
    'name' => 'coordination',
  ),
  994 => 
  array (
    'name' => 'core manhattan',
  ),
  995 => 
  array (
    'name' => 'cores',
  ),
  996 => 
  array (
    'name' => 'correspondence maps',
  ),
  998 => 
  array (
    'name' => 'corridors',
  ),
  999 => 
  array (
    'name' => 'cortiço vivo',
  ),
  1000 => 
  array (
    'name' => 'cosmopolitism',
  ),
  1002 => 
  array (
    'name' => 'cost of living',
  ),
  1003 => 
  array (
    'name' => 'cotemporary office space',
  ),
  1004 => 
  array (
    'name' => 'country',
  ),
  1005 => 
  array (
    'name' => 'court',
  ),
  1006 => 
  array (
    'name' => 'covertibility',
  ),
  1007 => 
  array (
    'name' => 'creative districts',
  ),
  1008 => 
  array (
    'name' => 'creative employment',
  ),
  1009 => 
  array (
    'name' => 'creative industries',
  ),
  1010 => 
  array (
    'name' => 'creative industries?',
  ),
  1011 => 
  array (
    'name' => 'creativity',
  ),
  1012 => 
  array (
    'name' => 'creativity strategies',
  ),
  1013 => 
  array (
    'name' => 'crime',
  ),
  1043 => 
  array (
    'name' => 'crime and disorder act 1998',
  ),
  1045 => 
  array (
    'name' => 'crime hotspot analysis',
  ),
  1047 => 
  array (
    'name' => 'crime prevention design',
  ),
  1049 => 
  array (
    'name' => 'crime rates',
  ),
  1050 => 
  array (
    'name' => 'crime reduction',
  ),
  1051 => 
  array (
    'name' => 'crime reduction strategies',
  ),
  1052 => 
  array (
    'name' => 'crises of urban growth',
  ),
  1054 => 
  array (
    'name' => 'crisis',
  ),
  1055 => 
  array (
    'name' => 'criteria for measuring success',
  ),
  1056 => 
  array (
    'name' => 'cross-border',
  ),
  1058 => 
  array (
    'name' => 'crowd',
  ),
  1059 => 
  array (
    'name' => 'cultural difference',
  ),
  1060 => 
  array (
    'name' => 'cultural heritage',
  ),
  1061 => 
  array (
    'name' => 'cultural identity',
  ),
  1062 => 
  array (
    'name' => 'cultural infrastructure',
  ),
  1065 => 
  array (
    'name' => 'cultural space',
  ),
  1066 => 
  array (
    'name' => 'culture',
  ),
  1086 => 
  array (
    'name' => 'curitiba',
  ),
  1087 => 
  array (
    'name' => 'cycle',
  ),
  1089 => 
  array (
    'name' => 'cycle lanes',
  ),
  1090 => 
  array (
    'name' => 'cycling',
  ),
  1101 => 
  array (
    'name' => 'cyclist',
  ),
  1102 => 
  array (
    'name' => 'deaths',
  ),
  1104 => 
  array (
    'name' => 'debt',
  ),
  1105 => 
  array (
    'name' => 'decay of mumbai',
  ),
  1106 => 
  array (
    'name' => 'decentralisation',
  ),
  1112 => 
  array (
    'name' => 'decentralization',
  ),
  1120 => 
  array (
    'name' => 'decision making',
  ),
  1123 => 
  array (
    'name' => 'declining cities',
  ),
  1139 => 
  array (
    'name' => 'degenerated periphery',
  ),
  1141 => 
  array (
    'name' => 'delhi',
  ),
  1150 => 
  array (
    'name' => 'delhi climate policy',
  ),
  1151 => 
  array (
    'name' => 'deliverance',
  ),
  1152 => 
  array (
    'name' => 'delivery of major projects',
  ),
  1154 => 
  array (
    'name' => 'demand management',
  ),
  1155 => 
  array (
    'name' => 'democracy',
  ),
  1179 => 
  array (
    'name' => 'democratic city',
  ),
  1181 => 
  array (
    'name' => 'demographic change',
  ),
  1182 => 
  array (
    'name' => 'demography',
  ),
  1190 => 
  array (
    'name' => 'demography?',
  ),
  1191 => 
  array (
    'name' => 'denmark',
  ),
  1192 => 
  array (
    'name' => 'densities',
  ),
  1193 => 
  array (
    'name' => 'density',
  ),
  1243 => 
  array (
    'name' => 'desciplinery boundries',
  ),
  1245 => 
  array (
    'name' => 'design',
  ),
  1263 => 
  array (
    'name' => 'design for london',
  ),
  1264 => 
  array (
    'name' => 'design functionality',
  ),
  1265 => 
  array (
    'name' => 'designers',
  ),
  1267 => 
  array (
    'name' => 'designing cities',
  ),
  1269 => 
  array (
    'name' => 'developers',
  ),
  1273 => 
  array (
    'name' => 'developing countries',
  ),
  1276 => 
  array (
    'name' => 'developing world',
  ),
  1277 => 
  array (
    'name' => 'development',
  ),
  1300 => 
  array (
    'name' => 'development plan',
  ),
  1301 => 
  array (
    'name' => 'development strategies',
  ),
  1302 => 
  array (
    'name' => 'dharavi',
  ),
  1307 => 
  array (
    'name' => 'dharavi economy',
  ),
  1308 => 
  array (
    'name' => 'dharavi redevelopment plan',
  ),
  1309 => 
  array (
    'name' => 'diagonal sul',
  ),
  1312 => 
  array (
    'name' => 'differences',
  ),
  1316 => 
  array (
    'name' => 'different transport modes',
  ),
  1317 => 
  array (
    'name' => 'difficulties',
  ),
  1318 => 
  array (
    'name' => 'direct connection',
  ),
  1319 => 
  array (
    'name' => 'disadvantage',
  ),
  1320 => 
  array (
    'name' => 'disadvantages of mumbai',
  ),
  1321 => 
  array (
    'name' => 'disaster management',
  ),
  1322 => 
  array (
    'name' => 'disaster relief',
  ),
  1323 => 
  array (
    'name' => 'discipline',
  ),
  1324 => 
  array (
    'name' => 'disfuntionality',
  ),
  1326 => 
  array (
    'name' => 'disparities',
  ),
  1328 => 
  array (
    'name' => 'disparity between large and small towns',
  ),
  1329 => 
  array (
    'name' => 'displacement',
  ),
  1333 => 
  array (
    'name' => 'dispute mediation',
  ),
  1334 => 
  array (
    'name' => 'divergence',
  ),
  1335 => 
  array (
    'name' => 'diversity',
  ),
  1363 => 
  array (
    'name' => 'diversity of sites',
  ),
  1364 => 
  array (
    'name' => 'divided',
  ),
  1365 => 
  array (
    'name' => 'dna',
  ),
  1367 => 
  array (
    'name' => 'domestic space',
  ),
  1371 => 
  array (
    'name' => 'domestic violence',
  ),
  1373 => 
  array (
    'name' => 'dongtan',
  ),
  1375 => 
  array (
    'name' => 'doubled icrease doubled decrease policy?',
  ),
  1376 => 
  array (
    'name' => 'downsides of globalisation',
  ),
  1377 => 
  array (
    'name' => 'downtown revilitalization',
  ),
  1378 => 
  array (
    'name' => 'drug arrest',
  ),
  1379 => 
  array (
    'name' => 'dual structure',
  ),
  1381 => 
  array (
    'name' => 'duetche bank',
  ),
  1384 => 
  array (
    'name' => 'duetsche bank',
  ),
  1385 => 
  array (
    'name' => 'dustribution',
  ),
  1386 => 
  array (
    'name' => 'düssledorf',
  ),
  1387 => 
  array (
    'name' => 'e-governance',
  ),
  1388 => 
  array (
    'name' => 'earthquake',
  ),
  1389 => 
  array (
    'name' => 'east london',
  ),
  1394 => 
  array (
    'name' => 'east river waterfront',
  ),
  1395 => 
  array (
    'name' => 'eco-stations',
  ),
  1396 => 
  array (
    'name' => 'ecological buildings',
  ),
  1398 => 
  array (
    'name' => 'ecology',
  ),
  1400 => 
  array (
    'name' => 'economc history',
  ),
  1401 => 
  array (
    'name' => 'economic',
  ),
  1407 => 
  array (
    'name' => 'economic and renewal',
  ),
  1409 => 
  array (
    'name' => 'economic and social change',
  ),
  1410 => 
  array (
    'name' => 'economic crisis',
  ),
  1411 => 
  array (
    'name' => 'economic development',
  ),
  1413 => 
  array (
    'name' => 'economic developmnet',
  ),
  1414 => 
  array (
    'name' => 'economic environment',
  ),
  1416 => 
  array (
    'name' => 'economic forecasts',
  ),
  1417 => 
  array (
    'name' => 'economic future',
  ),
  1418 => 
  array (
    'name' => 'economic growth',
  ),
  1422 => 
  array (
    'name' => 'economic history',
  ),
  1423 => 
  array (
    'name' => 'economic inequality',
  ),
  1424 => 
  array (
    'name' => 'economic infrasructure',
  ),
  1425 => 
  array (
    'name' => 'economic integration',
  ),
  1426 => 
  array (
    'name' => 'economic profile',
  ),
  1427 => 
  array (
    'name' => 'economic prosperity',
  ),
  1428 => 
  array (
    'name' => 'economic role',
  ),
  1429 => 
  array (
    'name' => 'economic transformation',
  ),
  1430 => 
  array (
    'name' => 'economic transition',
  ),
  1431 => 
  array (
    'name' => 'economical',
  ),
  1432 => 
  array (
    'name' => 'economical functions of istanbul',
  ),
  1433 => 
  array (
    'name' => 'economics of climate change',
  ),
  1434 => 
  array (
    'name' => 'economies',
  ),
  1435 => 
  array (
    'name' => 'economy',
  ),
  1490 => 
  array (
    'name' => 'education',
  ),
  1501 => 
  array (
    'name' => 'education or workforce',
  ),
  1502 => 
  array (
    'name' => 'effieciency',
  ),
  1503 => 
  array (
    'name' => 'eje central corridor',
  ),
  1504 => 
  array (
    'name' => 'electoral reform',
  ),
  1506 => 
  array (
    'name' => 'electoral system',
  ),
  1508 => 
  array (
    'name' => 'elemental',
  ),
  1512 => 
  array (
    'name' => 'elephant and castle',
  ),
  1515 => 
  array (
    'name' => 'elephant and castle underpasses',
  ),
  1517 => 
  array (
    'name' => 'elevado costa e silva',
  ),
  1519 => 
  array (
    'name' => 'elevated highways',
  ),
  1520 => 
  array (
    'name' => 'emigration',
  ),
  1521 => 
  array (
    'name' => 'emissions',
  ),
  1522 => 
  array (
    'name' => 'emissions inventories',
  ),
  1523 => 
  array (
    'name' => 'emissions mitigation costs',
  ),
  1524 => 
  array (
    'name' => 'emissions reduction',
  ),
  1527 => 
  array (
    'name' => 'emissions reduction policy instruments',
  ),
  1528 => 
  array (
    'name' => 'emissions statistics',
  ),
  1529 => 
  array (
    'name' => 'emissions targets',
  ),
  1530 => 
  array (
    'name' => 'employment',
  ),
  1548 => 
  array (
    'name' => 'employment growth',
  ),
  1549 => 
  array (
    'name' => 'employment loss',
  ),
  1550 => 
  array (
    'name' => 'employment pattern',
  ),
  1551 => 
  array (
    'name' => 'employment rates',
  ),
  1552 => 
  array (
    'name' => 'empower',
  ),
  1553 => 
  array (
    'name' => 'empowering cities',
  ),
  1554 => 
  array (
    'name' => 'emptiness',
  ),
  1555 => 
  array (
    'name' => 'endless city',
  ),
  1556 => 
  array (
    'name' => 'energy',
  ),
  1560 => 
  array (
    'name' => 'energy consumption',
  ),
  1568 => 
  array (
    'name' => 'energy management',
  ),
  1569 => 
  array (
    'name' => 'energy policy',
  ),
  1570 => 
  array (
    'name' => 'energy supply',
  ),
  1571 => 
  array (
    'name' => 'england',
  ),
  1573 => 
  array (
    'name' => 'enviromental footprint',
  ),
  1574 => 
  array (
    'name' => 'environment',
  ),
  1597 => 
  array (
    'name' => 'environment policy',
  ),
  1600 => 
  array (
    'name' => 'equality',
  ),
  1607 => 
  array (
    'name' => 'equality of life',
  ),
  1608 => 
  array (
    'name' => 'equity',
  ),
  1612 => 
  array (
    'name' => 'erosion of modernity',
  ),
  1613 => 
  array (
    'name' => 'escalators',
  ),
  1614 => 
  array (
    'name' => 'ethnic diversity',
  ),
  1615 => 
  array (
    'name' => 'ethnic minorities',
  ),
  1619 => 
  array (
    'name' => 'ethnic/racial tensions',
  ),
  1620 => 
  array (
    'name' => 'europe',
  ),
  1622 => 
  array (
    'name' => 'european',
  ),
  1624 => 
  array (
    'name' => 'european cities',
  ),
  1632 => 
  array (
    'name' => 'european city',
  ),
  1634 => 
  array (
    'name' => 'european cultures',
  ),
  1635 => 
  array (
    'name' => 'euston road',
  ),
  1636 => 
  array (
    'name' => 'eviction',
  ),
  1637 => 
  array (
    'name' => 'evolution',
  ),
  1638 => 
  array (
    'name' => 'evolution of city visioning',
  ),
  1639 => 
  array (
    'name' => 'evolving',
  ),
  1640 => 
  array (
    'name' => 'exclusion',
  ),
  1653 => 
  array (
    'name' => 'exclusionary urban growth',
  ),
  1654 => 
  array (
    'name' => 'existing housing conditions dharavi',
  ),
  1655 => 
  array (
    'name' => 'existing powers',
  ),
  1656 => 
  array (
    'name' => 'expandability',
  ),
  1657 => 
  array (
    'name' => 'expensive',
  ),
  1658 => 
  array (
    'name' => 'expertise',
  ),
  1660 => 
  array (
    'name' => 'explosion',
  ),
  1662 => 
  array (
    'name' => 'export',
  ),
  1663 => 
  array (
    'name' => 'expressive capacity',
  ),
  1664 => 
  array (
    'name' => 'expressway system',
  ),
  1665 => 
  array (
    'name' => 'facilties',
  ),
  1668 => 
  array (
    'name' => 'failures',
  ),
  1670 => 
  array (
    'name' => 'failures of urban design',
  ),
  1671 => 
  array (
    'name' => 'fair structure',
  ),
  1672 => 
  array (
    'name' => 'families',
  ),
  1678 => 
  array (
    'name' => 'faraday market',
  ),
  1679 => 
  array (
    'name' => 'faraday taxi rank',
  ),
  1680 => 
  array (
    'name' => 'fashion district',
  ),
  1681 => 
  array (
    'name' => 'favelas',
  ),
  1683 => 
  array (
    'name' => 'fear',
  ),
  1691 => 
  array (
    'name' => 'federal government',
  ),
  1693 => 
  array (
    'name' => 'federal system',
  ),
  1696 => 
  array (
    'name' => 'feria la salada',
  ),
  1697 => 
  array (
    'name' => 'festivals',
  ),
  1699 => 
  array (
    'name' => 'finance',
  ),
  1700 => 
  array (
    'name' => 'financial crisis',
  ),
  1701 => 
  array (
    'name' => 'financial strategies',
  ),
  1702 => 
  array (
    'name' => 'financing',
  ),
  1704 => 
  array (
    'name' => 'financing of cities',
  ),
  1705 => 
  array (
    'name' => 'financing public transport',
  ),
  1706 => 
  array (
    'name' => 'financing system',
  ),
  1709 => 
  array (
    'name' => 'fiscal reform',
  ),
  1710 => 
  array (
    'name' => 'fiscal resources',
  ),
  1711 => 
  array (
    'name' => 'fixed rail',
  ),
  1712 => 
  array (
    'name' => 'flexibility',
  ),
  1713 => 
  array (
    'name' => 'floating population',
  ),
  1715 => 
  array (
    'name' => 'floor space index',
  ),
  1716 => 
  array (
    'name' => 'flow',
  ),
  1717 => 
  array (
    'name' => 'flows',
  ),
  1718 => 
  array (
    'name' => 'fluidity',
  ),
  1719 => 
  array (
    'name' => 'foreign',
  ),
  1721 => 
  array (
    'name' => 'foreign architects',
  ),
  1722 => 
  array (
    'name' => 'foreign investment.',
  ),
  1723 => 
  array (
    'name' => 'form',
  ),
  1726 => 
  array (
    'name' => 'form and function',
  ),
  1727 => 
  array (
    'name' => 'formal',
  ),
  1729 => 
  array (
    'name' => 'formal planning',
  ),
  1730 => 
  array (
    'name' => 'formalizing informal settlements',
  ),
  1731 => 
  array (
    'name' => 'four conditions for success of design',
  ),
  1732 => 
  array (
    'name' => 'fragmentation',
  ),
  1746 => 
  array (
    'name' => 'fragmented',
  ),
  1747 => 
  array (
    'name' => 'france',
  ),
  1751 => 
  array (
    'name' => 'frank gehry',
  ),
  1752 => 
  array (
    'name' => 'frankfurt',
  ),
  1761 => 
  array (
    'name' => 'free market',
  ),
  1764 => 
  array (
    'name' => 'free university library',
  ),
  1766 => 
  array (
    'name' => 'freedom of movement',
  ),
  1767 => 
  array (
    'name' => 'freight',
  ),
  1768 => 
  array (
    'name' => 'front of station',
  ),
  1769 => 
  array (
    'name' => 'fuctions',
  ),
  1770 => 
  array (
    'name' => 'fuel consumption',
  ),
  1772 => 
  array (
    'name' => 'functional variety',
  ),
  1773 => 
  array (
    'name' => 'funding',
  ),
  1775 => 
  array (
    'name' => 'funding for emissions reduction',
  ),
  1776 => 
  array (
    'name' => 'future',
  ),
  1779 => 
  array (
    'name' => 'future project plans',
  ),
  1781 => 
  array (
    'name' => 'gangs',
  ),
  1782 => 
  array (
    'name' => 'gaps',
  ),
  1784 => 
  array (
    'name' => 'gated communities',
  ),
  1796 => 
  array (
    'name' => 'gated community',
  ),
  1797 => 
  array (
    'name' => 'gates',
  ),
  1799 => 
  array (
    'name' => 'gauteng',
  ),
  1803 => 
  array (
    'name' => 'gauteng global city region project',
  ),
  1804 => 
  array (
    'name' => 'gautrain',
  ),
  1813 => 
  array (
    'name' => 'gdp',
  ),
  1816 => 
  array (
    'name' => 'gecekondus',
  ),
  1817 => 
  array (
    'name' => 'gender balance',
  ),
  1818 => 
  array (
    'name' => 'gentrification',
  ),
  1821 => 
  array (
    'name' => 'geographies of governance',
  ),
  1822 => 
  array (
    'name' => 'geography of concentration',
  ),
  1823 => 
  array (
    'name' => 'geography of dispersal',
  ),
  1824 => 
  array (
    'name' => 'gercekondu',
  ),
  1825 => 
  array (
    'name' => 'germany',
  ),
  1851 => 
  array (
    'name' => 'ghetto',
  ),
  1852 => 
  array (
    'name' => 'glacier retreat',
  ),
  1853 => 
  array (
    'name' => 'global',
  ),
  1862 => 
  array (
    'name' => 'global capital',
  ),
  1865 => 
  array (
    'name' => 'global capitalism',
  ),
  1866 => 
  array (
    'name' => 'global circuits',
  ),
  1871 => 
  array (
    'name' => 'global cities',
  ),
  1880 => 
  array (
    'name' => 'global cities rankings',
  ),
  1881 => 
  array (
    'name' => 'global city',
  ),
  1901 => 
  array (
    'name' => 'global city agenda',
  ),
  1902 => 
  array (
    'name' => 'global city infrastructure',
  ),
  1903 => 
  array (
    'name' => 'global city meaning',
  ),
  1904 => 
  array (
    'name' => 'global city region',
  ),
  1912 => 
  array (
    'name' => 'global economic circuits',
  ),
  1913 => 
  array (
    'name' => 'global economy',
  ),
  1922 => 
  array (
    'name' => 'global growth',
  ),
  1923 => 
  array (
    'name' => 'global organisations',
  ),
  1924 => 
  array (
    'name' => 'global sectors',
  ),
  1925 => 
  array (
    'name' => 'global transport emissions',
  ),
  1927 => 
  array (
    'name' => 'global urbanisation',
  ),
  1928 => 
  array (
    'name' => 'globalisation',
  ),
  1948 => 
  array (
    'name' => 'globalised economies',
  ),
  1949 => 
  array (
    'name' => 'globalised sector',
  ),
  1950 => 
  array (
    'name' => 'globalization',
  ),
  1952 => 
  array (
    'name' => 'gobal city agenda vs local agenda',
  ),
  1953 => 
  array (
    'name' => 'godby vs. montgomery',
  ),
  1954 => 
  array (
    'name' => 'gokturk',
  ),
  1955 => 
  array (
    'name' => 'good design',
  ),
  1957 => 
  array (
    'name' => 'good governance',
  ),
  1960 => 
  array (
    'name' => 'governance',
  ),
  2044 => 
  array (
    'name' => 'governance framework',
  ),
  2046 => 
  array (
    'name' => 'governance of delhi',
  ),
  2048 => 
  array (
    'name' => 'governance of mumbai',
  ),
  2049 => 
  array (
    'name' => 'governance of urbanization',
  ),
  2050 => 
  array (
    'name' => 'governance reform',
  ),
  2053 => 
  array (
    'name' => 'governance structure',
  ),
  2057 => 
  array (
    'name' => 'governance structures',
  ),
  2058 => 
  array (
    'name' => 'governance?',
  ),
  2060 => 
  array (
    'name' => 'governence',
  ),
  2061 => 
  array (
    'name' => 'government',
  ),
  2081 => 
  array (
    'name' => 'government products',
  ),
  2084 => 
  array (
    'name' => 'governments role',
  ),
  2085 => 
  array (
    'name' => 'graffiti',
  ),
  2086 => 
  array (
    'name' => 'grand central terminal',
  ),
  2087 => 
  array (
    'name' => 'greater london authority',
  ),
  2090 => 
  array (
    'name' => 'green',
  ),
  2091 => 
  array (
    'name' => 'green belt',
  ),
  2092 => 
  array (
    'name' => 'green cover',
  ),
  2094 => 
  array (
    'name' => 'green economy',
  ),
  2095 => 
  array (
    'name' => 'green system',
  ),
  2096 => 
  array (
    'name' => 'green transport infrastructure',
  ),
  2097 => 
  array (
    'name' => 'green urban age',
  ),
  2098 => 
  array (
    'name' => 'grids',
  ),
  2099 => 
  array (
    'name' => 'growth',
  ),
  2138 => 
  array (
    'name' => 'growth of city limits',
  ),
  2139 => 
  array (
    'name' => 'growth of small and medium towns',
  ),
  2140 => 
  array (
    'name' => 'guarapiranga',
  ),
  2141 => 
  array (
    'name' => 'gun violence',
  ),
  2142 => 
  array (
    'name' => 'hafencity',
  ),
  2143 => 
  array (
    'name' => 'halle',
  ),
  2146 => 
  array (
    'name' => 'hamburg',
  ),
  2149 => 
  array (
    'name' => 'harbour city',
  ),
  2150 => 
  array (
    'name' => 'harlem',
  ),
  2151 => 
  array (
    'name' => 'hawkers',
  ),
  2152 => 
  array (
    'name' => 'health',
  ),
  2154 => 
  array (
    'name' => 'healthcare',
  ),
  2159 => 
  array (
    'name' => 'heiligendamm targets',
  ),
  2160 => 
  array (
    'name' => 'heritage',
  ),
  2161 => 
  array (
    'name' => 'herman hertzberger',
  ),
  2162 => 
  array (
    'name' => 'hetereogeneity of cities',
  ),
  2163 => 
  array (
    'name' => 'heygate estate',
  ),
  2165 => 
  array (
    'name' => 'high density',
  ),
  2169 => 
  array (
    'name' => 'high growth sectors',
  ),
  2171 => 
  array (
    'name' => 'high income jobs',
  ),
  2173 => 
  array (
    'name' => 'high quality',
  ),
  2174 => 
  array (
    'name' => 'high street 2012',
  ),
  2175 => 
  array (
    'name' => 'high urban densities',
  ),
  2176 => 
  array (
    'name' => 'higher levels of government',
  ),
  2177 => 
  array (
    'name' => 'higher speed',
  ),
  2179 => 
  array (
    'name' => 'highline park',
  ),
  2180 => 
  array (
    'name' => 'highway',
  ),
  2181 => 
  array (
    'name' => 'hillbrow',
  ),
  2182 => 
  array (
    'name' => 'hinge city',
  ),
  2183 => 
  array (
    'name' => 'historic centre/city centre/city centre revitalization',
  ),
  2186 => 
  array (
    'name' => 'historical',
  ),
  2187 => 
  array (
    'name' => 'historical buildings',
  ),
  2188 => 
  array (
    'name' => 'historical city',
  ),
  2190 => 
  array (
    'name' => 'historical development plans',
  ),
  2191 => 
  array (
    'name' => 'historical expansion plans',
  ),
  2192 => 
  array (
    'name' => 'historical growth',
  ),
  2193 => 
  array (
    'name' => 'historical knowledge',
  ),
  2194 => 
  array (
    'name' => 'historical preservation',
  ),
  2195 => 
  array (
    'name' => 'history',
  ),
  2228 => 
  array (
    'name' => 'history of city visions',
  ),
  2229 => 
  array (
    'name' => 'history of housing interventions',
  ),
  2230 => 
  array (
    'name' => 'history of jews',
  ),
  2232 => 
  array (
    'name' => 'history of kings cross',
  ),
  2233 => 
  array (
    'name' => 'home ownership demand',
  ),
  2234 => 
  array (
    'name' => 'homelessness',
  ),
  2238 => 
  array (
    'name' => 'homicide',
  ),
  2239 => 
  array (
    'name' => 'homogeneity',
  ),
  2241 => 
  array (
    'name' => 'hong kong and shanghai bank',
  ),
  2242 => 
  array (
    'name' => 'hope 6 (?)',
  ),
  2243 => 
  array (
    'name' => 'hope six',
  ),
  2244 => 
  array (
    'name' => 'hostels',
  ),
  2245 => 
  array (
    'name' => 'houisng stock',
  ),
  2246 => 
  array (
    'name' => 'house prices',
  ),
  2247 => 
  array (
    'name' => 'house prices.',
  ),
  2248 => 
  array (
    'name' => 'housing',
  ),
  2309 => 
  array (
    'name' => 'housing and infrastructure',
  ),
  2310 => 
  array (
    'name' => 'housing development',
  ),
  2314 => 
  array (
    'name' => 'housing finance',
  ),
  2315 => 
  array (
    'name' => 'housing labour markets',
  ),
  2316 => 
  array (
    'name' => 'housing liberalisation',
  ),
  2317 => 
  array (
    'name' => 'housing market',
  ),
  2321 => 
  array (
    'name' => 'housing policies',
  ),
  2322 => 
  array (
    'name' => 'housing policy',
  ),
  2329 => 
  array (
    'name' => 'housing preservation',
  ),
  2330 => 
  array (
    'name' => 'housing prices',
  ),
  2331 => 
  array (
    'name' => 'housing reforms',
  ),
  2332 => 
  array (
    'name' => 'housing rights',
  ),
  2333 => 
  array (
    'name' => 'housing sector',
  ),
  2334 => 
  array (
    'name' => 'housing space',
  ),
  2335 => 
  array (
    'name' => 'housing supply',
  ),
  2336 => 
  array (
    'name' => 'hudson yards',
  ),
  2337 => 
  array (
    'name' => 'human capital',
  ),
  2338 => 
  array (
    'name' => 'human scale',
  ),
  2339 => 
  array (
    'name' => 'hunger',
  ),
  2341 => 
  array (
    'name' => 'hyper density',
  ),
  2342 => 
  array (
    'name' => 'hypo knowledge',
  ),
  2343 => 
  array (
    'name' => 'hypo-growth',
  ),
  2344 => 
  array (
    'name' => 'ideas',
  ),
  2347 => 
  array (
    'name' => 'identification of dna',
  ),
  2349 => 
  array (
    'name' => 'identity',
  ),
  2358 => 
  array (
    'name' => 'idustry zones',
  ),
  2360 => 
  array (
    'name' => 'immigrants',
  ),
  2365 => 
  array (
    'name' => 'immigration',
  ),
  2376 => 
  array (
    'name' => 'immigration/migration',
  ),
  2377 => 
  array (
    'name' => 'impact',
  ),
  2378 => 
  array (
    'name' => 'impact of informal economy',
  ),
  2379 => 
  array (
    'name' => 'impacts',
  ),
  2382 => 
  array (
    'name' => 'impacts of big projects',
  ),
  2383 => 
  array (
    'name' => 'implementation',
  ),
  2385 => 
  array (
    'name' => 'implicit and explicit mechanisms',
  ),
  2387 => 
  array (
    'name' => 'imports',
  ),
  2389 => 
  array (
    'name' => 'imprint of transport technology',
  ),
  2390 => 
  array (
    'name' => 'improvements',
  ),
  2391 => 
  array (
    'name' => 'inclusion',
  ),
  2416 => 
  array (
    'name' => 'inclusive growth',
  ),
  2419 => 
  array (
    'name' => 'income',
  ),
  2421 => 
  array (
    'name' => 'income generator',
  ),
  2422 => 
  array (
    'name' => 'income poverty',
  ),
  2424 => 
  array (
    'name' => 'incomplete form',
  ),
  2425 => 
  array (
    'name' => 'incremental development',
  ),
  2427 => 
  array (
    'name' => 'india',
  ),
  2444 => 
  array (
    'name' => 'indian cities',
  ),
  2445 => 
  array (
    'name' => 'indian urbanisation',
  ),
  2447 => 
  array (
    'name' => 'indian urbanism',
  ),
  2449 => 
  array (
    'name' => 'indifference',
  ),
  2450 => 
  array (
    'name' => 'individuals',
  ),
  2454 => 
  array (
    'name' => 'industrial',
  ),
  2457 => 
  array (
    'name' => 'industrial growth',
  ),
  2458 => 
  array (
    'name' => 'industrialization',
  ),
  2460 => 
  array (
    'name' => 'inelasticity of land supply',
  ),
  2461 => 
  array (
    'name' => 'inequalities',
  ),
  2464 => 
  array (
    'name' => 'inequality',
  ),
  2487 => 
  array (
    'name' => 'inequity',
  ),
  2489 => 
  array (
    'name' => 'inequlaity',
  ),
  2490 => 
  array (
    'name' => 'infill',
  ),
  2496 => 
  array (
    'name' => 'informal buildings',
  ),
  2498 => 
  array (
    'name' => 'informal development',
  ),
  2499 => 
  array (
    'name' => 'informal economy',
  ),
  2514 => 
  array (
    'name' => 'informal housing',
  ),
  2523 => 
  array (
    'name' => 'informal sector',
  ),
  2524 => 
  array (
    'name' => 'informal sector growth',
  ),
  2526 => 
  array (
    'name' => 'informal settlements',
  ),
  2529 => 
  array (
    'name' => 'informality',
  ),
  2559 => 
  array (
    'name' => 'information',
  ),
  2560 => 
  array (
    'name' => 'information poverty',
  ),
  2562 => 
  array (
    'name' => 'information sharing',
  ),
  2563 => 
  array (
    'name' => 'information technolgy',
  ),
  2564 => 
  array (
    'name' => 'information technologies',
  ),
  2565 => 
  array (
    'name' => 'infrastructure',
  ),
  2576 => 
  array (
    'name' => 'infrastructure and displacement',
  ),
  2577 => 
  array (
    'name' => 'infrastructure finance',
  ),
  2578 => 
  array (
    'name' => 'infrastructure of olympics',
  ),
  2580 => 
  array (
    'name' => 'infrastrucure',
  ),
  2581 => 
  array (
    'name' => 'inhabitation',
  ),
  2582 => 
  array (
    'name' => 'inner-city geographies',
  ),
  2584 => 
  array (
    'name' => 'innovation',
  ),
  2589 => 
  array (
    'name' => 'insecurity',
  ),
  2590 => 
  array (
    'name' => 'institutional landscape',
  ),
  2592 => 
  array (
    'name' => 'institutions',
  ),
  2597 => 
  array (
    'name' => 'integrate',
  ),
  2598 => 
  array (
    'name' => 'integrate movement and space',
  ),
  2599 => 
  array (
    'name' => 'integrate plans',
  ),
  2601 => 
  array (
    'name' => 'integrated planning',
  ),
  2603 => 
  array (
    'name' => 'integrated programs',
  ),
  2604 => 
  array (
    'name' => 'integrated transport network',
  ),
  2606 => 
  array (
    'name' => 'integrated transport plan',
  ),
  2607 => 
  array (
    'name' => 'integration',
  ),
  2613 => 
  array (
    'name' => 'integration of process',
  ),
  2614 => 
  array (
    'name' => 'interconnected',
  ),
  2615 => 
  array (
    'name' => 'interdisciplinarity',
  ),
  2616 => 
  array (
    'name' => 'intergrate',
  ),
  2617 => 
  array (
    'name' => 'interior designers',
  ),
  2618 => 
  array (
    'name' => 'international experience',
  ),
  2619 => 
  array (
    'name' => 'international finacial centre',
  ),
  2620 => 
  array (
    'name' => 'international in-migration',
  ),
  2621 => 
  array (
    'name' => 'international manufacturing centre',
  ),
  2622 => 
  array (
    'name' => 'international trade centre',
  ),
  2623 => 
  array (
    'name' => 'international transportation centre',
  ),
  2624 => 
  array (
    'name' => 'intersection of differences',
  ),
  2626 => 
  array (
    'name' => 'intersection of economies',
  ),
  2627 => 
  array (
    'name' => 'intersections',
  ),
  2629 => 
  array (
    'name' => 'intervene',
  ),
  2630 => 
  array (
    'name' => 'intervention',
  ),
  2632 => 
  array (
    'name' => 'introduction',
  ),
  2638 => 
  array (
    'name' => 'investment',
  ),
  2648 => 
  array (
    'name' => 'investors',
  ),
  2649 => 
  array (
    'name' => 'istanbul',
  ),
  2675 => 
  array (
    'name' => 'istanbul economy',
  ),
  2677 => 
  array (
    'name' => 'istanbul growth',
  ),
  2678 => 
  array (
    'name' => 'istanbul metropolitan municipality',
  ),
  2680 => 
  array (
    'name' => 'istanbul neighbourhoods',
  ),
  2682 => 
  array (
    'name' => 'istanbul population growth',
  ),
  2683 => 
  array (
    'name' => 'istanbul: gated communties',
  ),
  2684 => 
  array (
    'name' => 'istanbuls mobility',
  ),
  2687 => 
  array (
    'name' => 'istiklal street',
  ),
  2688 => 
  array (
    'name' => 'istitutions',
  ),
  2689 => 
  array (
    'name' => 'izmir',
  ),
  2690 => 
  array (
    'name' => 'jane jacobs',
  ),
  2691 => 
  array (
    'name' => 'jardim paulista',
  ),
  2693 => 
  array (
    'name' => 'jawaharlal nehru national urban renewal mission',
  ),
  2694 => 
  array (
    'name' => 'job creation',
  ),
  2695 => 
  array (
    'name' => 'job location',
  ),
  2696 => 
  array (
    'name' => 'jobs',
  ),
  2705 => 
  array (
    'name' => 'jobs decentralising',
  ),
  2706 => 
  array (
    'name' => 'joburg 2030',
  ),
  2712 => 
  array (
    'name' => 'johanensburg',
  ),
  2713 => 
  array (
    'name' => 'johannesburg',
  ),
  2765 => 
  array (
    'name' => 'journalism',
  ),
  2766 => 
  array (
    'name' => 'just society',
  ),
  2768 => 
  array (
    'name' => 'kartal',
  ),
  2770 => 
  array (
    'name' => 'ken livingstone',
  ),
  2774 => 
  array (
    'name' => 'key challenges for mumbai',
  ),
  2775 => 
  array (
    'name' => 'keywords',
  ),
  2776 => 
  array (
    'name' => 'kings cross',
  ),
  2782 => 
  array (
    'name' => 'kings cross development',
  ),
  2790 => 
  array (
    'name' => 'kings cross masterplan',
  ),
  2791 => 
  array (
    'name' => 'kings cross opportunities',
  ),
  2792 => 
  array (
    'name' => 'kings cross regeneration',
  ),
  2793 => 
  array (
    'name' => 'knowledge',
  ),
  2794 => 
  array (
    'name' => 'knowledge based',
  ),
  2795 => 
  array (
    'name' => 'knowledge based economy',
  ),
  2796 => 
  array (
    'name' => 'knowledge capital',
  ),
  2797 => 
  array (
    'name' => 'knowledge communities',
  ),
  2798 => 
  array (
    'name' => 'knowledge economy',
  ),
  2805 => 
  array (
    'name' => 'kolkata',
  ),
  2807 => 
  array (
    'name' => 'la',
  ),
  2808 => 
  array (
    'name' => 'labour',
  ),
  2809 => 
  array (
    'name' => 'labour demand',
  ),
  2810 => 
  array (
    'name' => 'labour force',
  ),
  2811 => 
  array (
    'name' => 'labour forces',
  ),
  2812 => 
  array (
    'name' => 'labour market',
  ),
  2820 => 
  array (
    'name' => 'labour markets',
  ),
  2824 => 
  array (
    'name' => 'labour supply',
  ),
  2825 => 
  array (
    'name' => 'lack of information',
  ),
  2826 => 
  array (
    'name' => 'lagos',
  ),
  2828 => 
  array (
    'name' => 'land',
  ),
  2829 => 
  array (
    'name' => 'land as a commidity',
  ),
  2832 => 
  array (
    'name' => 'land development',
  ),
  2834 => 
  array (
    'name' => 'land distribution',
  ),
  2836 => 
  array (
    'name' => 'land for housing',
  ),
  2838 => 
  array (
    'name' => 'land ownership',
  ),
  2841 => 
  array (
    'name' => 'land rights',
  ),
  2842 => 
  array (
    'name' => 'land use',
  ),
  2848 => 
  array (
    'name' => 'land use policy',
  ),
  2851 => 
  array (
    'name' => 'land value',
  ),
  2852 => 
  array (
    'name' => 'land value taxation',
  ),
  2853 => 
  array (
    'name' => 'land-use',
  ),
  2857 => 
  array (
    'name' => 'land-use policies',
  ),
  2858 => 
  array (
    'name' => 'land-use policy',
  ),
  2859 => 
  array (
    'name' => 'land-value gradient',
  ),
  2861 => 
  array (
    'name' => 'landfill management',
  ),
  2862 => 
  array (
    'name' => 'large scale development',
  ),
  2866 => 
  array (
    'name' => 'large scale projects',
  ),
  2867 => 
  array (
    'name' => 'latin america',
  ),
  2869 => 
  array (
    'name' => 'law enforcement',
  ),
  2871 => 
  array (
    'name' => 'le corbusier',
  ),
  2872 => 
  array (
    'name' => 'lea valley',
  ),
  2874 => 
  array (
    'name' => 'lea valley park',
  ),
  2876 => 
  array (
    'name' => 'leadership',
  ),
  2889 => 
  array (
    'name' => 'legacy',
  ),
  2890 => 
  array (
    'name' => 'legislature',
  ),
  2891 => 
  array (
    'name' => 'legitimacy',
  ),
  2894 => 
  array (
    'name' => 'libraries',
  ),
  2895 => 
  array (
    'name' => 'lima',
  ),
  2897 => 
  array (
    'name' => 'liminal space',
  ),
  2898 => 
  array (
    'name' => 'link',
  ),
  2899 => 
  array (
    'name' => 'listed buildings',
  ),
  2900 => 
  array (
    'name' => 'literature',
  ),
  2902 => 
  array (
    'name' => 'literature on kings cross',
  ),
  2903 => 
  array (
    'name' => 'livable cities',
  ),
  2905 => 
  array (
    'name' => 'liveable cities',
  ),
  2906 => 
  array (
    'name' => 'living space',
  ),
  2907 => 
  array (
    'name' => 'local',
  ),
  2909 => 
  array (
    'name' => 'local and transient population',
  ),
  2910 => 
  array (
    'name' => 'local city',
  ),
  2911 => 
  array (
    'name' => 'local democracy',
  ),
  2912 => 
  array (
    'name' => 'local development plans',
  ),
  2914 => 
  array (
    'name' => 'local economies',
  ),
  2915 => 
  array (
    'name' => 'local goverenment',
  ),
  2916 => 
  array (
    'name' => 'local government',
  ),
  2940 => 
  array (
    'name' => 'local heritage',
  ),
  2941 => 
  array (
    'name' => 'local initiatives',
  ),
  2942 => 
  array (
    'name' => 'local justice center',
  ),
  2943 => 
  array (
    'name' => 'local leaders',
  ),
  2944 => 
  array (
    'name' => 'local protection law',
  ),
  2945 => 
  array (
    'name' => 'local scale',
  ),
  2946 => 
  array (
    'name' => 'localised economies',
  ),
  2947 => 
  array (
    'name' => 'localising',
  ),
  2948 => 
  array (
    'name' => 'location',
  ),
  2952 => 
  array (
    'name' => 'location of population',
  ),
  2954 => 
  array (
    'name' => 'london',
  ),
  3059 => 
  array (
    'name' => 'london climate change action plan',
  ),
  3060 => 
  array (
    'name' => 'london economy',
  ),
  3062 => 
  array (
    'name' => 'london olympic legacy',
  ),
  3063 => 
  array (
    'name' => 'london plan',
  ),
  3066 => 
  array (
    'name' => 'london school of economics',
  ),
  3068 => 
  array (
    'name' => 'london\'s government',
  ),
  3070 => 
  array (
    'name' => 'london\'s growth',
  ),
  3071 => 
  array (
    'name' => 'long term planning',
  ),
  3073 => 
  array (
    'name' => 'long term residents',
  ),
  3074 => 
  array (
    'name' => 'long term unemployment',
  ),
  3075 => 
  array (
    'name' => 'long term vision',
  ),
  3076 => 
  array (
    'name' => 'longer distances',
  ),
  3078 => 
  array (
    'name' => 'los angeles',
  ),
  3080 => 
  array (
    'name' => 'low density',
  ),
  3081 => 
  array (
    'name' => 'low floor buses',
  ),
  3082 => 
  array (
    'name' => 'low income households',
  ),
  3083 => 
  array (
    'name' => 'low income jobs',
  ),
  3085 => 
  array (
    'name' => 'low-carbon',
  ),
  3087 => 
  array (
    'name' => 'low-income housing',
  ),
  3088 => 
  array (
    'name' => 'low-wage workers',
  ),
  3089 => 
  array (
    'name' => 'lower house',
  ),
  3090 => 
  array (
    'name' => 'lower income groups',
  ),
  3091 => 
  array (
    'name' => 'lower lea valley',
  ),
  3092 => 
  array (
    'name' => 'lower manhattan',
  ),
  3094 => 
  array (
    'name' => 'lse',
  ),
  3106 => 
  array (
    'name' => 'lse cities program',
  ),
  3107 => 
  array (
    'name' => 'luz neighbourhood',
  ),
  3109 => 
  array (
    'name' => 'macroeconomic',
  ),
  3110 => 
  array (
    'name' => 'madrid',
  ),
  3111 => 
  array (
    'name' => 'maharashtra',
  ),
  3112 => 
  array (
    'name' => 'maharashtra state housing policy',
  ),
  3113 => 
  array (
    'name' => 'major attacks',
  ),
  3115 => 
  array (
    'name' => 'major issues',
  ),
  3116 => 
  array (
    'name' => 'major issues kings cross faces',
  ),
  3117 => 
  array (
    'name' => 'major projects',
  ),
  3119 => 
  array (
    'name' => 'major urban issues',
  ),
  3120 => 
  array (
    'name' => 'making',
  ),
  3124 => 
  array (
    'name' => 'making of public space',
  ),
  3126 => 
  array (
    'name' => 'malaysia',
  ),
  3128 => 
  array (
    'name' => 'malls',
  ),
  3129 => 
  array (
    'name' => 'malnutrition',
  ),
  3131 => 
  array (
    'name' => 'management',
  ),
  3137 => 
  array (
    'name' => 'managing urban growth',
  ),
  3138 => 
  array (
    'name' => 'manchester',
  ),
  3144 => 
  array (
    'name' => 'manhattan',
  ),
  3154 => 
  array (
    'name' => 'manhattanville',
  ),
  3155 => 
  array (
    'name' => 'manufacturing',
  ),
  3161 => 
  array (
    'name' => 'manufacturing bases',
  ),
  3162 => 
  array (
    'name' => 'manufacturing sector',
  ),
  3164 => 
  array (
    'name' => 'mararay',
  ),
  3166 => 
  array (
    'name' => 'market economy',
  ),
  3168 => 
  array (
    'name' => 'market force',
  ),
  3172 => 
  array (
    'name' => 'market share loss',
  ),
  3173 => 
  array (
    'name' => 'masdar',
  ),
  3174 => 
  array (
    'name' => 'mass housing',
  ),
  3175 => 
  array (
    'name' => 'mass migration',
  ),
  3176 => 
  array (
    'name' => 'mass order',
  ),
  3177 => 
  array (
    'name' => 'mass transit',
  ),
  3179 => 
  array (
    'name' => 'masterplan',
  ),
  3180 => 
  array (
    'name' => 'masterplanning',
  ),
  3183 => 
  array (
    'name' => 'mayor',
  ),
  3191 => 
  array (
    'name' => 'mayor of london',
  ),
  3192 => 
  array (
    'name' => 'mayors',
  ),
  3193 => 
  array (
    'name' => 'medellín',
  ),
  3194 => 
  array (
    'name' => 'media',
  ),
  3196 => 
  array (
    'name' => 'media reports',
  ),
  3197 => 
  array (
    'name' => 'mediterranean',
  ),
  3198 => 
  array (
    'name' => 'mega projects',
  ),
  3201 => 
  array (
    'name' => 'mega transport project successes',
  ),
  3202 => 
  array (
    'name' => 'melrose arch',
  ),
  3203 => 
  array (
    'name' => 'merging transportation and the city',
  ),
  3204 => 
  array (
    'name' => 'methodologies',
  ),
  3206 => 
  array (
    'name' => 'metro',
  ),
  3209 => 
  array (
    'name' => 'metro mall',
  ),
  3210 => 
  array (
    'name' => 'metropolitan',
  ),
  3214 => 
  array (
    'name' => 'metropolitan area',
  ),
  3216 => 
  array (
    'name' => 'metropolitan region',
  ),
  3223 => 
  array (
    'name' => 'metropolitan regions',
  ),
  3225 => 
  array (
    'name' => 'metropolitan strategy',
  ),
  3227 => 
  array (
    'name' => 'metrorail',
  ),
  3229 => 
  array (
    'name' => 'mexico',
  ),
  3230 => 
  array (
    'name' => 'mexico city',
  ),
  3269 => 
  array (
    'name' => 'michael bloomberg',
  ),
  3273 => 
  array (
    'name' => 'michelle facoy?',
  ),
  3274 => 
  array (
    'name' => 'micro and macro level',
  ),
  3275 => 
  array (
    'name' => 'micro and macro mobilty',
  ),
  3276 => 
  array (
    'name' => 'mid-west side manhattan',
  ),
  3277 => 
  array (
    'name' => 'middle classes',
  ),
  3278 => 
  array (
    'name' => 'middle-class',
  ),
  3279 => 
  array (
    'name' => 'miditterranean',
  ),
  3280 => 
  array (
    'name' => 'migrant communties',
  ),
  3283 => 
  array (
    'name' => 'migrant stories',
  ),
  3284 => 
  array (
    'name' => 'migrant workers',
  ),
  3285 => 
  array (
    'name' => 'migrants',
  ),
  3297 => 
  array (
    'name' => 'migration',
  ),
  3313 => 
  array (
    'name' => 'migration\' immigrants',
  ),
  3314 => 
  array (
    'name' => 'militarisation of urban public space',
  ),
  3318 => 
  array (
    'name' => 'millenium bridge',
  ),
  3320 => 
  array (
    'name' => 'millennium bridge',
  ),
  3322 => 
  array (
    'name' => 'minorities',
  ),
  3330 => 
  array (
    'name' => 'minority groups',
  ),
  3331 => 
  array (
    'name' => 'mirgration',
  ),
  3332 => 
  array (
    'name' => 'mistakes',
  ),
  3333 => 
  array (
    'name' => 'mitigation',
  ),
  3335 => 
  array (
    'name' => 'mixed use',
  ),
  3337 => 
  array (
    'name' => 'mixed use?',
  ),
  3339 => 
  array (
    'name' => 'mixed-use',
  ),
  3340 => 
  array (
    'name' => 'mixed-use neighbourhoods',
  ),
  3341 => 
  array (
    'name' => 'mixing typologies',
  ),
  3344 => 
  array (
    'name' => 'mobilising capital',
  ),
  3345 => 
  array (
    'name' => 'mobility',
  ),
  3405 => 
  array (
    'name' => 'mobility and transport',
  ),
  3406 => 
  array (
    'name' => 'mobility concept',
  ),
  3407 => 
  array (
    'name' => 'mobility renaissance',
  ),
  3408 => 
  array (
    'name' => 'mobility?',
  ),
  3409 => 
  array (
    'name' => 'mobilty',
  ),
  3412 => 
  array (
    'name' => 'models',
  ),
  3417 => 
  array (
    'name' => 'models of multiculturalism',
  ),
  3418 => 
  array (
    'name' => 'modern ghettos',
  ),
  3419 => 
  array (
    'name' => 'modernisation',
  ),
  3420 => 
  array (
    'name' => 'modernity',
  ),
  3421 => 
  array (
    'name' => 'motion',
  ),
  3422 => 
  array (
    'name' => 'movement',
  ),
  3425 => 
  array (
    'name' => 'mta',
  ),
  3430 => 
  array (
    'name' => 'mta needs',
  ),
  3431 => 
  array (
    'name' => 'mta plan',
  ),
  3432 => 
  array (
    'name' => 'multi-functioning',
  ),
  3433 => 
  array (
    'name' => 'multi-modal integration',
  ),
  3434 => 
  array (
    'name' => 'multi-polar urbanism',
  ),
  3435 => 
  array (
    'name' => 'multi-use spaces',
  ),
  3436 => 
  array (
    'name' => 'multiculturalism',
  ),
  3440 => 
  array (
    'name' => 'multicuralism',
  ),
  3441 => 
  array (
    'name' => 'multiple city visions',
  ),
  3442 => 
  array (
    'name' => 'multiplicity',
  ),
  3443 => 
  array (
    'name' => 'multipolar economy',
  ),
  3449 => 
  array (
    'name' => 'mumbai',
  ),
  3480 => 
  array (
    'name' => 'mumbai as a world class city',
  ),
  3481 => 
  array (
    'name' => 'mumbai bombings',
  ),
  3482 => 
  array (
    'name' => 'mumbai challenges',
  ),
  3483 => 
  array (
    'name' => 'mumbai city vision',
  ),
  3484 => 
  array (
    'name' => 'mumbai economy',
  ),
  3485 => 
  array (
    'name' => 'mumbai population growth',
  ),
  3486 => 
  array (
    'name' => 'mumbai quality of life',
  ),
  3487 => 
  array (
    'name' => 'mumbai rankings',
  ),
  3488 => 
  array (
    'name' => 'mumbai riots',
  ),
  3490 => 
  array (
    'name' => 'mumbai slums',
  ),
  3491 => 
  array (
    'name' => 'mumbai vision',
  ),
  3492 => 
  array (
    'name' => 'mumbai waterfront project',
  ),
  3494 => 
  array (
    'name' => 'munich',
  ),
  3496 => 
  array (
    'name' => 'murder rate',
  ),
  3498 => 
  array (
    'name' => 'music',
  ),
  3500 => 
  array (
    'name' => 'muslim women',
  ),
  3502 => 
  array (
    'name' => 'n/a',
  ),
  3506 => 
  array (
    'name' => 'nation-states',
  ),
  3507 => 
  array (
    'name' => 'national economy',
  ),
  3508 => 
  array (
    'name' => 'national government',
  ),
  3509 => 
  array (
    'name' => 'national housing policy',
  ),
  3510 => 
  array (
    'name' => 'national power',
  ),
  3511 => 
  array (
    'name' => 'national resources',
  ),
  3512 => 
  array (
    'name' => 'national strategies',
  ),
  3513 => 
  array (
    'name' => 'national urban transport policy',
  ),
  3514 => 
  array (
    'name' => 'nature of the excluded',
  ),
  3516 => 
  array (
    'name' => 'nature of transport hub',
  ),
  3517 => 
  array (
    'name' => 'navi mumbai',
  ),
  3518 => 
  array (
    'name' => 'neighbourhoods',
  ),
  3522 => 
  array (
    'name' => 'netherlands',
  ),
  3525 => 
  array (
    'name' => 'network of global cities',
  ),
  3526 => 
  array (
    'name' => 'network of leaders',
  ),
  3527 => 
  array (
    'name' => 'networked',
  ),
  3528 => 
  array (
    'name' => 'networked offices',
  ),
  3529 => 
  array (
    'name' => 'networks',
  ),
  3531 => 
  array (
    'name' => 'networks of cities',
  ),
  3532 => 
  array (
    'name' => 'neverland\'s',
  ),
  3533 => 
  array (
    'name' => 'new economy',
  ),
  3534 => 
  array (
    'name' => 'new growth centres',
  ),
  3535 => 
  array (
    'name' => 'new infrastructure',
  ),
  3536 => 
  array (
    'name' => 'new language',
  ),
  3537 => 
  array (
    'name' => 'new mobility',
  ),
  3538 => 
  array (
    'name' => 'new sectors',
  ),
  3539 => 
  array (
    'name' => 'new theory',
  ),
  3540 => 
  array (
    'name' => 'new urbanism',
  ),
  3544 => 
  array (
    'name' => 'new york',
  ),
  3638 => 
  array (
    'name' => 'new york city',
  ),
  3639 => 
  array (
    'name' => 'new york growth',
  ),
  3640 => 
  array (
    'name' => 'new york subway',
  ),
  3641 => 
  array (
    'name' => 'new york workforce',
  ),
  3642 => 
  array (
    'name' => 'new york\'s attractiveness',
  ),
  3643 => 
  array (
    'name' => 'new york\'s economy',
  ),
  3644 => 
  array (
    'name' => 'new york\'s transport conflicts',
  ),
  3645 => 
  array (
    'name' => 'new york\'s transport objectives',
  ),
  3646 => 
  array (
    'name' => 'new york\'s transport system',
  ),
  3647 => 
  array (
    'name' => 'neza-chimalhuacan corridor',
  ),
  3648 => 
  array (
    'name' => 'no car day',
  ),
  3649 => 
  array (
    'name' => 'non-gun violence',
  ),
  3650 => 
  array (
    'name' => 'non-interaction',
  ),
  3651 => 
  array (
    'name' => 'non-motorized transport',
  ),
  3652 => 
  array (
    'name' => 'non-verbal',
  ),
  3653 => 
  array (
    'name' => 'notting hill',
  ),
  3654 => 
  array (
    'name' => 'objectives',
  ),
  3656 => 
  array (
    'name' => 'office architecture',
  ),
  3657 => 
  array (
    'name' => 'office buildings',
  ),
  3659 => 
  array (
    'name' => 'office design',
  ),
  3660 => 
  array (
    'name' => 'office development',
  ),
  3661 => 
  array (
    'name' => 'office developments',
  ),
  3662 => 
  array (
    'name' => 'office economy',
  ),
  3663 => 
  array (
    'name' => 'office space',
  ),
  3664 => 
  array (
    'name' => 'office spaces',
  ),
  3665 => 
  array (
    'name' => 'office types',
  ),
  3666 => 
  array (
    'name' => 'offices',
  ),
  3667 => 
  array (
    'name' => 'olympic bid',
  ),
  3668 => 
  array (
    'name' => 'olympic games',
  ),
  3669 => 
  array (
    'name' => 'olympic legacy',
  ),
  3670 => 
  array (
    'name' => 'olympics',
  ),
  3675 => 
  array (
    'name' => 'olympics site',
  ),
  3676 => 
  array (
    'name' => 'olympics: visons',
  ),
  3677 => 
  array (
    'name' => 'open city',
  ),
  3683 => 
  array (
    'name' => 'open policy',
  ),
  3684 => 
  array (
    'name' => 'open space',
  ),
  3686 => 
  array (
    'name' => 'open spaces',
  ),
  3687 => 
  array (
    'name' => 'operating revenues',
  ),
  3688 => 
  array (
    'name' => 'opportunity',
  ),
  3689 => 
  array (
    'name' => 'organic development',
  ),
  3691 => 
  array (
    'name' => 'organic planning',
  ),
  3693 => 
  array (
    'name' => 'organisation structures',
  ),
  3694 => 
  array (
    'name' => 'organised crime',
  ),
  3695 => 
  array (
    'name' => 'original function',
  ),
  3696 => 
  array (
    'name' => 'over-crowed',
  ),
  3697 => 
  array (
    'name' => 'overcrowding?',
  ),
  3698 => 
  array (
    'name' => 'overdetermined form of built environment',
  ),
  3699 => 
  array (
    'name' => 'overseas born',
  ),
  3700 => 
  array (
    'name' => 'oversimplification',
  ),
  3702 => 
  array (
    'name' => 'owners of cities',
  ),
  3704 => 
  array (
    'name' => 'p bourdieu\'s',
  ),
  3706 => 
  array (
    'name' => 'pace of urban change',
  ),
  3707 => 
  array (
    'name' => 'parallel road network',
  ),
  3708 => 
  array (
    'name' => 'paris',
  ),
  3724 => 
  array (
    'name' => 'paris riots',
  ),
  3726 => 
  array (
    'name' => 'park',
  ),
  3727 => 
  array (
    'name' => 'parking',
  ),
  3730 => 
  array (
    'name' => 'parking structures',
  ),
  3732 => 
  array (
    'name' => 'parks',
  ),
  3739 => 
  array (
    'name' => 'particapatory planning',
  ),
  3740 => 
  array (
    'name' => 'participation',
  ),
  3759 => 
  array (
    'name' => 'participatory budgeting',
  ),
  3760 => 
  array (
    'name' => 'participatory decision-making',
  ),
  3761 => 
  array (
    'name' => 'participatory design',
  ),
  3762 => 
  array (
    'name' => 'partnership',
  ),
  3764 => 
  array (
    'name' => 'pattern of urbanisation',
  ),
  3765 => 
  array (
    'name' => 'pedestrain movement',
  ),
  3766 => 
  array (
    'name' => 'pedestrains',
  ),
  3770 => 
  array (
    'name' => 'pedestrian',
  ),
  3772 => 
  array (
    'name' => 'pedestrian infrastructure',
  ),
  3774 => 
  array (
    'name' => 'pedestrian only streets',
  ),
  3775 => 
  array (
    'name' => 'pedestrian open space',
  ),
  3776 => 
  array (
    'name' => 'pedestrianised zones',
  ),
  3777 => 
  array (
    'name' => 'pedestrianization',
  ),
  3778 => 
  array (
    'name' => 'pedestrians',
  ),
  3795 => 
  array (
    'name' => 'pen station',
  ),
  3796 => 
  array (
    'name' => 'pennsylvania',
  ),
  3797 => 
  array (
    'name' => 'people',
  ),
  3798 => 
  array (
    'name' => 'per-capita allocation of public urban expenditure',
  ),
  3799 => 
  array (
    'name' => 'perception',
  ),
  3800 => 
  array (
    'name' => 'perception of crime',
  ),
  3803 => 
  array (
    'name' => 'peripheral cities',
  ),
  3805 => 
  array (
    'name' => 'peripheralization',
  ),
  3807 => 
  array (
    'name' => 'periphery',
  ),
  3810 => 
  array (
    'name' => 'permibilty',
  ),
  3811 => 
  array (
    'name' => 'personal space',
  ),
  3812 => 
  array (
    'name' => 'physical',
  ),
  3815 => 
  array (
    'name' => 'physical and social',
  ),
  3817 => 
  array (
    'name' => 'physical barreirs',
  ),
  3818 => 
  array (
    'name' => 'physical developments',
  ),
  3819 => 
  array (
    'name' => 'physical fabric',
  ),
  3821 => 
  array (
    'name' => 'physical infrastructure',
  ),
  3822 => 
  array (
    'name' => 'physical integration',
  ),
  3823 => 
  array (
    'name' => 'physical size',
  ),
  3824 => 
  array (
    'name' => 'physical space',
  ),
  3826 => 
  array (
    'name' => 'physical structure',
  ),
  3828 => 
  array (
    'name' => 'place',
  ),
  3829 => 
  array (
    'name' => 'plan',
  ),
  3831 => 
  array (
    'name' => 'plan yc strategic plan',
  ),
  3832 => 
  array (
    'name' => 'planned',
  ),
  3833 => 
  array (
    'name' => 'planned city',
  ),
  3834 => 
  array (
    'name' => 'planned designed city',
  ),
  3835 => 
  array (
    'name' => 'planners',
  ),
  3840 => 
  array (
    'name' => 'planning',
  ),
  3907 => 
  array (
    'name' => 'planning for people',
  ),
  3908 => 
  array (
    'name' => 'planning history',
  ),
  3910 => 
  array (
    'name' => 'planning innovations',
  ),
  3914 => 
  array (
    'name' => 'planning issues',
  ),
  3915 => 
  array (
    'name' => 'planning process',
  ),
  3916 => 
  array (
    'name' => 'planning reform',
  ),
  3917 => 
  array (
    'name' => 'planyc',
  ),
  3918 => 
  array (
    'name' => 'pluralism',
  ),
  3919 => 
  array (
    'name' => 'polarisation',
  ),
  3920 => 
  array (
    'name' => 'police',
  ),
  3921 => 
  array (
    'name' => 'policies',
  ),
  3926 => 
  array (
    'name' => 'policing',
  ),
  3943 => 
  array (
    'name' => 'policy',
  ),
  3971 => 
  array (
    'name' => 'policy engagement',
  ),
  3973 => 
  array (
    'name' => 'policy makers',
  ),
  3974 => 
  array (
    'name' => 'political',
  ),
  3979 => 
  array (
    'name' => 'political change',
  ),
  3982 => 
  array (
    'name' => 'political coalition',
  ),
  3983 => 
  array (
    'name' => 'political context of turkey',
  ),
  3984 => 
  array (
    'name' => 'political integration',
  ),
  3985 => 
  array (
    'name' => 'political leadership',
  ),
  3989 => 
  array (
    'name' => 'political reform',
  ),
  3990 => 
  array (
    'name' => 'political response',
  ),
  3992 => 
  array (
    'name' => 'political system',
  ),
  3993 => 
  array (
    'name' => 'political transitions',
  ),
  3994 => 
  array (
    'name' => 'political voice',
  ),
  3996 => 
  array (
    'name' => 'political will',
  ),
  3998 => 
  array (
    'name' => 'politicians',
  ),
  3999 => 
  array (
    'name' => 'politics',
  ),
  4002 => 
  array (
    'name' => 'pollution',
  ),
  4005 => 
  array (
    'name' => 'polycentric',
  ),
  4006 => 
  array (
    'name' => 'polycentric city',
  ),
  4007 => 
  array (
    'name' => 'polycentric urban system',
  ),
  4009 => 
  array (
    'name' => 'pondu?',
  ),
  4010 => 
  array (
    'name' => 'poor',
  ),
  4016 => 
  array (
    'name' => 'poor governance',
  ),
  4017 => 
  array (
    'name' => 'population',
  ),
  4021 => 
  array (
    'name' => 'population and economic growth',
  ),
  4022 => 
  array (
    'name' => 'population growth',
  ),
  4023 => 
  array (
    'name' => 'populist modernity',
  ),
  4024 => 
  array (
    'name' => 'ports and logistics zones',
  ),
  4026 => 
  array (
    'name' => 'post-communist',
  ),
  4027 => 
  array (
    'name' => 'post-industrial',
  ),
  4028 => 
  array (
    'name' => 'postmodernism?',
  ),
  4030 => 
  array (
    'name' => 'potential governance structures',
  ),
  4031 => 
  array (
    'name' => 'potential impacts of climate change',
  ),
  4032 => 
  array (
    'name' => 'povernment',
  ),
  4033 => 
  array (
    'name' => 'poverty',
  ),
  4046 => 
  array (
    'name' => 'poverty of compassion',
  ),
  4048 => 
  array (
    'name' => 'power',
  ),
  4052 => 
  array (
    'name' => 'power of city visions',
  ),
  4053 => 
  array (
    'name' => 'powers',
  ),
  4054 => 
  array (
    'name' => 'practice',
  ),
  4058 => 
  array (
    'name' => 'preservation',
  ),
  4059 => 
  array (
    'name' => 'preservation process',
  ),
  4060 => 
  array (
    'name' => 'pressures on the centre',
  ),
  4061 => 
  array (
    'name' => 'prices',
  ),
  4062 => 
  array (
    'name' => 'priorities',
  ),
  4063 => 
  array (
    'name' => 'prison admissions',
  ),
  4064 => 
  array (
    'name' => 'private',
  ),
  4065 => 
  array (
    'name' => 'private finance',
  ),
  4066 => 
  array (
    'name' => 'private language',
  ),
  4067 => 
  array (
    'name' => 'private property and urban housing',
  ),
  4068 => 
  array (
    'name' => 'private sector',
  ),
  4070 => 
  array (
    'name' => 'private sector incentives',
  ),
  4071 => 
  array (
    'name' => 'private sector involvement',
  ),
  4072 => 
  array (
    'name' => 'privatisation',
  ),
  4074 => 
  array (
    'name' => 'privatisation of land',
  ),
  4077 => 
  array (
    'name' => 'problems',
  ),
  4082 => 
  array (
    'name' => 'problems of cities',
  ),
  4083 => 
  array (
    'name' => 'problems with dharavi redevelopment',
  ),
  4084 => 
  array (
    'name' => 'process challenges',
  ),
  4085 => 
  array (
    'name' => 'production',
  ),
  4088 => 
  array (
    'name' => 'production of space',
  ),
  4090 => 
  array (
    'name' => 'professional household',
  ),
  4091 => 
  array (
    'name' => 'professionalism',
  ),
  4092 => 
  array (
    'name' => 'professionals',
  ),
  4093 => 
  array (
    'name' => 'project so',
  ),
  4095 => 
  array (
    'name' => 'projects',
  ),
  4097 => 
  array (
    'name' => 'property development',
  ),
  4101 => 
  array (
    'name' => 'property market',
  ),
  4102 => 
  array (
    'name' => 'property rates',
  ),
  4103 => 
  array (
    'name' => 'property structure',
  ),
  4106 => 
  array (
    'name' => 'protection',
  ),
  4107 => 
  array (
    'name' => 'proximity',
  ),
  4109 => 
  array (
    'name' => 'public',
  ),
  4113 => 
  array (
    'name' => 'public access space',
  ),
  4115 => 
  array (
    'name' => 'public and private sector',
  ),
  4119 => 
  array (
    'name' => 'public authority',
  ),
  4120 => 
  array (
    'name' => 'public awareness campaigns',
  ),
  4122 => 
  array (
    'name' => 'public bus system',
  ),
  4123 => 
  array (
    'name' => 'public consultation',
  ),
  4126 => 
  array (
    'name' => 'public engagement',
  ),
  4128 => 
  array (
    'name' => 'public festivals',
  ),
  4129 => 
  array (
    'name' => 'public health',
  ),
  4131 => 
  array (
    'name' => 'public housing',
  ),
  4133 => 
  array (
    'name' => 'public investment',
  ),
  4134 => 
  array (
    'name' => 'public life',
  ),
  4135 => 
  array (
    'name' => 'public open spaces',
  ),
  4137 => 
  array (
    'name' => 'public order',
  ),
  4138 => 
  array (
    'name' => 'public participation',
  ),
  4141 => 
  array (
    'name' => 'public participation in development',
  ),
  4143 => 
  array (
    'name' => 'public pedestrian space',
  ),
  4144 => 
  array (
    'name' => 'public perceptions',
  ),
  4146 => 
  array (
    'name' => 'public plaza\'z',
  ),
  4147 => 
  array (
    'name' => 'public private partnership',
  ),
  4149 => 
  array (
    'name' => 'public private partnerships',
  ),
  4151 => 
  array (
    'name' => 'public realm',
  ),
  4154 => 
  array (
    'name' => 'public sector',
  ),
  4157 => 
  array (
    'name' => 'public space',
  ),
  4232 => 
  array (
    'name' => 'public space strategies',
  ),
  4233 => 
  array (
    'name' => 'public spaces',
  ),
  4241 => 
  array (
    'name' => 'public transits',
  ),
  4242 => 
  array (
    'name' => 'public transport',
  ),
  4300 => 
  array (
    'name' => 'public transport infrastructure',
  ),
  4301 => 
  array (
    'name' => 'public vs private transport',
  ),
  4302 => 
  array (
    'name' => 'public-private',
  ),
  4303 => 
  array (
    'name' => 'public-private partnerships',
  ),
  4305 => 
  array (
    'name' => 'public/private',
  ),
  4306 => 
  array (
    'name' => 'pudong',
  ),
  4308 => 
  array (
    'name' => 'puerto bicentenario',
  ),
  4309 => 
  array (
    'name' => 'pune',
  ),
  4310 => 
  array (
    'name' => 'purpose of design',
  ),
  4311 => 
  array (
    'name' => 'pycological barriers',
  ),
  4312 => 
  array (
    'name' => 'pysical form',
  ),
  4314 => 
  array (
    'name' => 'pysical planning',
  ),
  4316 => 
  array (
    'name' => 'qualifications',
  ),
  4317 => 
  array (
    'name' => 'quality of life',
  ),
  4329 => 
  array (
    'name' => 'quality public spaces',
  ),
  4331 => 
  array (
    'name' => 'race',
  ),
  4336 => 
  array (
    'name' => 'racial targeting',
  ),
  4339 => 
  array (
    'name' => 'radical modernity',
  ),
  4340 => 
  array (
    'name' => 'rail',
  ),
  4341 => 
  array (
    'name' => 'rail based system.',
  ),
  4343 => 
  array (
    'name' => 'rail system',
  ),
  4344 => 
  array (
    'name' => 'railway',
  ),
  4346 => 
  array (
    'name' => 'railway system',
  ),
  4347 => 
  array (
    'name' => 'railways',
  ),
  4363 => 
  array (
    'name' => 'railways/metro',
  ),
  4365 => 
  array (
    'name' => 'randstad delta',
  ),
  4367 => 
  array (
    'name' => 'rap',
  ),
  4368 => 
  array (
    'name' => 'rapid actions',
  ),
  4369 => 
  array (
    'name' => 'rapid housing development',
  ),
  4370 => 
  array (
    'name' => 'real estate',
  ),
  4375 => 
  array (
    'name' => 'real estate development',
  ),
  4376 => 
  array (
    'name' => 'reality',
  ),
  4382 => 
  array (
    'name' => 'recent history of mumbai',
  ),
  4383 => 
  array (
    'name' => 'recession',
  ),
  4385 => 
  array (
    'name' => 'reclaiming valleys',
  ),
  4387 => 
  array (
    'name' => 'red hook',
  ),
  4388 => 
  array (
    'name' => 'redevelopment',
  ),
  4398 => 
  array (
    'name' => 'redevelopment and informal economy',
  ),
  4399 => 
  array (
    'name' => 'redistribution',
  ),
  4404 => 
  array (
    'name' => 'reduce traffic',
  ),
  4405 => 
  array (
    'name' => 'reform',
  ),
  4407 => 
  array (
    'name' => 'reform challenges',
  ),
  4408 => 
  array (
    'name' => 'reformulation of economic power',
  ),
  4409 => 
  array (
    'name' => 'regeneration',
  ),
  4434 => 
  array (
    'name' => 'regeneration green enterprise',
  ),
  4435 => 
  array (
    'name' => 'regeneration projects',
  ),
  4436 => 
  array (
    'name' => 'regeneration/renewal',
  ),
  4446 => 
  array (
    'name' => 'regional',
  ),
  4448 => 
  array (
    'name' => 'regional centres',
  ),
  4449 => 
  array (
    'name' => 'regional government',
  ),
  4450 => 
  array (
    'name' => 'regional plan',
  ),
  4454 => 
  array (
    'name' => 'regional planning',
  ),
  4455 => 
  array (
    'name' => 'regional strategic plan',
  ),
  4456 => 
  array (
    'name' => 'regionalism',
  ),
  4457 => 
  array (
    'name' => 'regulation',
  ),
  4459 => 
  array (
    'name' => 'reichstag',
  ),
  4461 => 
  array (
    'name' => 'relationship',
  ),
  4462 => 
  array (
    'name' => 'relationship between social and visual',
  ),
  4463 => 
  array (
    'name' => 'relationships',
  ),
  4464 => 
  array (
    'name' => 'religion',
  ),
  4465 => 
  array (
    'name' => 'renaissance',
  ),
  4466 => 
  array (
    'name' => 'renewable energy',
  ),
  4467 => 
  array (
    'name' => 'renewal',
  ),
  4475 => 
  array (
    'name' => 'rennaissance of london',
  ),
  4476 => 
  array (
    'name' => 'rennovation',
  ),
  4477 => 
  array (
    'name' => 'rent',
  ),
  4478 => 
  array (
    'name' => 'rent act',
  ),
  4479 => 
  array (
    'name' => 'rental housing sector',
  ),
  4480 => 
  array (
    'name' => 'rental/ownership',
  ),
  4481 => 
  array (
    'name' => 'research alliance',
  ),
  4482 => 
  array (
    'name' => 'reserve lanes',
  ),
  4483 => 
  array (
    'name' => 'resettlement',
  ),
  4484 => 
  array (
    'name' => 'reshaped',
  ),
  4486 => 
  array (
    'name' => 'residential committee',
  ),
  4488 => 
  array (
    'name' => 'residential demand',
  ),
  4489 => 
  array (
    'name' => 'residents',
  ),
  4490 => 
  array (
    'name' => 'resileince',
  ),
  4492 => 
  array (
    'name' => 'resilience',
  ),
  4493 => 
  array (
    'name' => 'resilient',
  ),
  4496 => 
  array (
    'name' => 'resolve barreirs',
  ),
  4497 => 
  array (
    'name' => 'resources',
  ),
  4498 => 
  array (
    'name' => 'responsive government',
  ),
  4499 => 
  array (
    'name' => 'restauration',
  ),
  4501 => 
  array (
    'name' => 'restoration',
  ),
  4502 => 
  array (
    'name' => 'restriction',
  ),
  4503 => 
  array (
    'name' => 'restructuring',
  ),
  4504 => 
  array (
    'name' => 'restructuring of cities',
  ),
  4505 => 
  array (
    'name' => 'restructuring of economy',
  ),
  4506 => 
  array (
    'name' => 'resurgence',
  ),
  4507 => 
  array (
    'name' => 'retro-fitting',
  ),
  4508 => 
  array (
    'name' => 'retrofitting',
  ),
  4512 => 
  array (
    'name' => 'reurbanisation',
  ),
  4514 => 
  array (
    'name' => 'reuse',
  ),
  4515 => 
  array (
    'name' => 'revenue',
  ),
  4516 => 
  array (
    'name' => 'rich',
  ),
  4518 => 
  array (
    'name' => 'right to the city',
  ),
  4521 => 
  array (
    'name' => 'rights of light?',
  ),
  4522 => 
  array (
    'name' => 'rio de janeiro',
  ),
  4523 => 
  array (
    'name' => 'rising fairs',
  ),
  4524 => 
  array (
    'name' => 'risk',
  ),
  4527 => 
  array (
    'name' => 'risk society',
  ),
  4528 => 
  array (
    'name' => 'risks',
  ),
  4529 => 
  array (
    'name' => 'river',
  ),
  4530 => 
  array (
    'name' => 'river lea',
  ),
  4531 => 
  array (
    'name' => 'river thames',
  ),
  4533 => 
  array (
    'name' => 'road based system',
  ),
  4535 => 
  array (
    'name' => 'road conditions',
  ),
  4536 => 
  array (
    'name' => 'road infrastructure',
  ),
  4537 => 
  array (
    'name' => 'road safety',
  ),
  4542 => 
  array (
    'name' => 'road space',
  ),
  4543 => 
  array (
    'name' => 'road system',
  ),
  4545 => 
  array (
    'name' => 'road traffic injuries',
  ),
  4547 => 
  array (
    'name' => 'roads',
  ),
  4553 => 
  array (
    'name' => 'robbery',
  ),
  4554 => 
  array (
    'name' => 'roles',
  ),
  4555 => 
  array (
    'name' => 'rules',
  ),
  4556 => 
  array (
    'name' => 'rural issues',
  ),
  4557 => 
  array (
    'name' => 'rural-urban migration',
  ),
  4560 => 
  array (
    'name' => 'russia and bulgaria',
  ),
  4561 => 
  array (
    'name' => 'safety',
  ),
  4584 => 
  array (
    'name' => 'safety polices',
  ),
  4585 => 
  array (
    'name' => 'santa fe',
  ),
  4586 => 
  array (
    'name' => 'santiago',
  ),
  4588 => 
  array (
    'name' => 'sao paulo',
  ),
  4601 => 
  array (
    'name' => 'sas stockholm',
  ),
  4602 => 
  array (
    'name' => 'satallite cities',
  ),
  4606 => 
  array (
    'name' => 'satellite townships',
  ),
  4607 => 
  array (
    'name' => 'scale',
  ),
  4609 => 
  array (
    'name' => 'scale of cities',
  ),
  4610 => 
  array (
    'name' => 'schools',
  ),
  4611 => 
  array (
    'name' => 'scope',
  ),
  4612 => 
  array (
    'name' => 'seagram building',
  ),
  4613 => 
  array (
    'name' => 'sector',
  ),
  4614 => 
  array (
    'name' => 'security',
  ),
  4644 => 
  array (
    'name' => 'security measures',
  ),
  4647 => 
  array (
    'name' => 'security system',
  ),
  4648 => 
  array (
    'name' => 'see above',
  ),
  4649 => 
  array (
    'name' => 'segregation',
  ),
  4664 => 
  array (
    'name' => 'self employment',
  ),
  4666 => 
  array (
    'name' => 'self-organization',
  ),
  4667 => 
  array (
    'name' => 'self-service urbanisation',
  ),
  4668 => 
  array (
    'name' => 'sense of cohesion',
  ),
  4671 => 
  array (
    'name' => 'sense of place',
  ),
  4672 => 
  array (
    'name' => 'seoul underground station',
  ),
  4673 => 
  array (
    'name' => 'separation',
  ),
  4674 => 
  array (
    'name' => 'september 11',
  ),
  4678 => 
  array (
    'name' => 'series of centres',
  ),
  4679 => 
  array (
    'name' => 'service',
  ),
  4680 => 
  array (
    'name' => 'service delivery',
  ),
  4683 => 
  array (
    'name' => 'service government',
  ),
  4684 => 
  array (
    'name' => 'service sector',
  ),
  4688 => 
  array (
    'name' => 'services',
  ),
  4689 => 
  array (
    'name' => 'services poverty',
  ),
  4691 => 
  array (
    'name' => 'sessions',
  ),
  4692 => 
  array (
    'name' => 'shangahi',
  ),
  4694 => 
  array (
    'name' => 'shanghai',
  ),
  4756 => 
  array (
    'name' => 'shanghia',
  ),
  4757 => 
  array (
    'name' => 'shape',
  ),
  4760 => 
  array (
    'name' => 'shaping cities',
  ),
  4761 => 
  array (
    'name' => 'shibuya station',
  ),
  4762 => 
  array (
    'name' => 'shopping malls',
  ),
  4767 => 
  array (
    'name' => 'short-term investors',
  ),
  4768 => 
  array (
    'name' => 'shrinking cities',
  ),
  4781 => 
  array (
    'name' => 'sidewalks',
  ),
  4784 => 
  array (
    'name' => 'silicon valley',
  ),
  4786 => 
  array (
    'name' => 'similarities',
  ),
  4788 => 
  array (
    'name' => 'singapore',
  ),
  4791 => 
  array (
    'name' => 'single activity',
  ),
  4792 => 
  array (
    'name' => 'single use',
  ),
  4793 => 
  array (
    'name' => 'size',
  ),
  4794 => 
  array (
    'name' => 'skills',
  ),
  4795 => 
  array (
    'name' => 'skills gap',
  ),
  4796 => 
  array (
    'name' => 'skyline',
  ),
  4799 => 
  array (
    'name' => 'skyscrapers',
  ),
  4800 => 
  array (
    'name' => 'slogans of global cities',
  ),
  4801 => 
  array (
    'name' => 'slowness',
  ),
  4804 => 
  array (
    'name' => 'slum avoidance',
  ),
  4805 => 
  array (
    'name' => 'slum improvement',
  ),
  4806 => 
  array (
    'name' => 'slum redevelopment',
  ),
  4807 => 
  array (
    'name' => 'slum rehabilitation',
  ),
  4811 => 
  array (
    'name' => 'slum rehabilitation authority',
  ),
  4812 => 
  array (
    'name' => 'slum resettlement',
  ),
  4813 => 
  array (
    'name' => 'slum upgradation',
  ),
  4814 => 
  array (
    'name' => 'slum upgrading',
  ),
  4819 => 
  array (
    'name' => 'slummification',
  ),
  4820 => 
  array (
    'name' => 'slums',
  ),
  4840 => 
  array (
    'name' => 'small cities?',
  ),
  4846 => 
  array (
    'name' => 'small sities',
  ),
  4856 => 
  array (
    'name' => 'so?',
  ),
  4858 => 
  array (
    'name' => 'sociability',
  ),
  4859 => 
  array (
    'name' => 'social',
  ),
  4863 => 
  array (
    'name' => 'social and physical fabric',
  ),
  4864 => 
  array (
    'name' => 'social clusters',
  ),
  4866 => 
  array (
    'name' => 'social cohesion',
  ),
  4867 => 
  array (
    'name' => 'social complexity of large scale projects',
  ),
  4868 => 
  array (
    'name' => 'social control',
  ),
  4873 => 
  array (
    'name' => 'social democratic',
  ),
  4874 => 
  array (
    'name' => 'social differentiation',
  ),
  4875 => 
  array (
    'name' => 'social dimensions of urban growth',
  ),
  4876 => 
  array (
    'name' => 'social diversification',
  ),
  4877 => 
  array (
    'name' => 'social dna',
  ),
  4879 => 
  array (
    'name' => 'social engagement',
  ),
  4880 => 
  array (
    'name' => 'social exclusion',
  ),
  4887 => 
  array (
    'name' => 'social housing',
  ),
  4891 => 
  array (
    'name' => 'social implications',
  ),
  4892 => 
  array (
    'name' => 'social inclusion',
  ),
  4898 => 
  array (
    'name' => 'social inequality',
  ),
  4899 => 
  array (
    'name' => 'social infrastructure',
  ),
  4900 => 
  array (
    'name' => 'social integration',
  ),
  4901 => 
  array (
    'name' => 'social interaction',
  ),
  4902 => 
  array (
    'name' => 'social justice',
  ),
  4904 => 
  array (
    'name' => 'social landscape',
  ),
  4907 => 
  array (
    'name' => 'social life',
  ),
  4909 => 
  array (
    'name' => 'social mobility',
  ),
  4910 => 
  array (
    'name' => 'social movements',
  ),
  4911 => 
  array (
    'name' => 'social organisation',
  ),
  4912 => 
  array (
    'name' => 'social outcomes',
  ),
  4913 => 
  array (
    'name' => 'social political difference',
  ),
  4914 => 
  array (
    'name' => 'social practice',
  ),
  4915 => 
  array (
    'name' => 'social problems',
  ),
  4916 => 
  array (
    'name' => 'social segregation',
  ),
  4917 => 
  array (
    'name' => 'social sturcture',
  ),
  4919 => 
  array (
    'name' => 'socialist international metropolis',
  ),
  4920 => 
  array (
    'name' => 'socialist regime',
  ),
  4921 => 
  array (
    'name' => 'socio-cultural development',
  ),
  4923 => 
  array (
    'name' => 'socio-spatial segregation',
  ),
  4924 => 
  array (
    'name' => 'solidarity',
  ),
  4928 => 
  array (
    'name' => 'solutions',
  ),
  4929 => 
  array (
    'name' => 'solving crime',
  ),
  4931 => 
  array (
    'name' => 'solving problems',
  ),
  4932 => 
  array (
    'name' => 'sources of emissions',
  ),
  4933 => 
  array (
    'name' => 'south africa',
  ),
  4951 => 
  array (
    'name' => 'south african cities network',
  ),
  4955 => 
  array (
    'name' => 'south african cities networks',
  ),
  4956 => 
  array (
    'name' => 'south america',
  ),
  4957 => 
  array (
    'name' => 'southwark',
  ),
  4958 => 
  array (
    'name' => 'soweto',
  ),
  4964 => 
  array (
    'name' => 'space',
  ),
  4967 => 
  array (
    'name' => 'space and place',
  ),
  4968 => 
  array (
    'name' => 'spaces',
  ),
  4969 => 
  array (
    'name' => 'spatial',
  ),
  4973 => 
  array (
    'name' => 'spatial agglomeration',
  ),
  4974 => 
  array (
    'name' => 'spatial concentration',
  ),
  4975 => 
  array (
    'name' => 'spatial distribution',
  ),
  4976 => 
  array (
    'name' => 'spatial distribution of violence',
  ),
  4977 => 
  array (
    'name' => 'spatial dna',
  ),
  4979 => 
  array (
    'name' => 'spatial geography',
  ),
  4980 => 
  array (
    'name' => 'spatial planning',
  ),
  4981 => 
  array (
    'name' => 'spatial segregation',
  ),
  4982 => 
  array (
    'name' => 'spatial studies',
  ),
  4984 => 
  array (
    'name' => 'speed',
  ),
  4990 => 
  array (
    'name' => 'speed of growth',
  ),
  4991 => 
  array (
    'name' => 'sprawl',
  ),
  5000 => 
  array (
    'name' => 'sprawl/density',
  ),
  5001 => 
  array (
    'name' => 'squatter settlements',
  ),
  5002 => 
  array (
    'name' => 'squatting',
  ),
  5003 => 
  array (
    'name' => 'stakeholder groups',
  ),
  5004 => 
  array (
    'name' => 'standardization',
  ),
  5006 => 
  array (
    'name' => 'state',
  ),
  5009 => 
  array (
    'name' => 'state intervention',
  ),
  5010 => 
  array (
    'name' => 'state vs market',
  ),
  5011 => 
  array (
    'name' => 'staten island',
  ),
  5012 => 
  array (
    'name' => 'statistics',
  ),
  5014 => 
  array (
    'name' => 'stern review',
  ),
  5016 => 
  array (
    'name' => 'storytelling in cities',
  ),
  5017 => 
  array (
    'name' => 'straight administration?',
  ),
  5018 => 
  array (
    'name' => 'strategic city development plans',
  ),
  5019 => 
  array (
    'name' => 'strategic planning',
  ),
  5026 => 
  array (
    'name' => 'strategies',
  ),
  5028 => 
  array (
    'name' => 'strategy',
  ),
  5029 => 
  array (
    'name' => 'street',
  ),
  5031 => 
  array (
    'name' => 'street crime',
  ),
  5033 => 
  array (
    'name' => 'street design manual',
  ),
  5034 => 
  array (
    'name' => 'street fabric',
  ),
  5036 => 
  array (
    'name' => 'street level activity',
  ),
  5038 => 
  array (
    'name' => 'street parking',
  ),
  5039 => 
  array (
    'name' => 'street vendors',
  ),
  5040 => 
  array (
    'name' => 'streets',
  ),
  5046 => 
  array (
    'name' => 'streets of new york',
  ),
  5047 => 
  array (
    'name' => 'structural change',
  ),
  5048 => 
  array (
    'name' => 'structural changes',
  ),
  5049 => 
  array (
    'name' => 'structural composition',
  ),
  5050 => 
  array (
    'name' => 'structural transformation',
  ),
  5052 => 
  array (
    'name' => 'structure',
  ),
  5062 => 
  array (
    'name' => 'structure of city',
  ),
  5063 => 
  array (
    'name' => 'structures',
  ),
  5065 => 
  array (
    'name' => 'stuttgart',
  ),
  5066 => 
  array (
    'name' => 'sub-centres',
  ),
  5067 => 
  array (
    'name' => 'suburban',
  ),
  5072 => 
  array (
    'name' => 'suburbanisation',
  ),
  5076 => 
  array (
    'name' => 'suburbia',
  ),
  5078 => 
  array (
    'name' => 'suburbs',
  ),
  5083 => 
  array (
    'name' => 'subway lines',
  ),
  5084 => 
  array (
    'name' => 'success',
  ),
  5085 => 
  array (
    'name' => 'successes',
  ),
  5086 => 
  array (
    'name' => 'sucessful cities',
  ),
  5088 => 
  array (
    'name' => 'sultanbyli',
  ),
  5090 => 
  array (
    'name' => 'superpool',
  ),
  5092 => 
  array (
    'name' => 'supply-led',
  ),
  5093 => 
  array (
    'name' => 'surface transportation',
  ),
  5094 => 
  array (
    'name' => 'surveilance',
  ),
  5096 => 
  array (
    'name' => 'surveillance',
  ),
  5098 => 
  array (
    'name' => 'surveillence',
  ),
  5102 => 
  array (
    'name' => 'susainabilty',
  ),
  5103 => 
  array (
    'name' => 'sustainability',
  ),
  5129 => 
  array (
    'name' => 'sustainabilty',
  ),
  5133 => 
  array (
    'name' => 'sustainable',
  ),
  5134 => 
  array (
    'name' => 'sustainable development',
  ),
  5138 => 
  array (
    'name' => 'sustainable growth',
  ),
  5140 => 
  array (
    'name' => 'sustainable transport',
  ),
  5142 => 
  array (
    'name' => 'swiss re building',
  ),
  5144 => 
  array (
    'name' => 'symbolism',
  ),
  5150 => 
  array (
    'name' => 'são paulo',
  ),
  5181 => 
  array (
    'name' => 'tall buildings',
  ),
  5183 => 
  array (
    'name' => 'taloyrist architecture',
  ),
  5185 => 
  array (
    'name' => 'target',
  ),
  5186 => 
  array (
    'name' => 'tarlaba..',
  ),
  5187 => 
  array (
    'name' => 'taxation',
  ),
  5193 => 
  array (
    'name' => 'taxes',
  ),
  5196 => 
  array (
    'name' => 'taxis',
  ),
  5198 => 
  array (
    'name' => 'taylorist',
  ),
  5199 => 
  array (
    'name' => 'taylorite',
  ),
  5200 => 
  array (
    'name' => 'technologies',
  ),
  5201 => 
  array (
    'name' => 'technology',
  ),
  5206 => 
  array (
    'name' => 'ten guiding principles for mumbai planning',
  ),
  5207 => 
  array (
    'name' => 'tensions between city visions and urban form',
  ),
  5208 => 
  array (
    'name' => 'tensions of global cities',
  ),
  5209 => 
  array (
    'name' => 'terrorism',
  ),
  5217 => 
  array (
    'name' => 'terrorists',
  ),
  5218 => 
  array (
    'name' => 'tfl',
  ),
  5219 => 
  array (
    'name' => 'thames gateway',
  ),
  5225 => 
  array (
    'name' => 'the greater london authority',
  ),
  5226 => 
  array (
    'name' => 'the larkin building',
  ),
  5227 => 
  array (
    'name' => 'the london plan',
  ),
  5228 => 
  array (
    'name' => 'the open city',
  ),
  5230 => 
  array (
    'name' => 'the soth bronx',
  ),
  5231 => 
  array (
    'name' => 'themes',
  ),
  5234 => 
  array (
    'name' => 'theory',
  ),
  5235 => 
  array (
    'name' => 'threat',
  ),
  5236 => 
  array (
    'name' => 'threats',
  ),
  5238 => 
  array (
    'name' => 'three frontier construction',
  ),
  5239 => 
  array (
    'name' => 'three grand elminations',
  ),
  5240 => 
  array (
    'name' => 'time',
  ),
  5242 => 
  array (
    'name' => 'time poverty',
  ),
  5243 => 
  array (
    'name' => 'times square',
  ),
  5247 => 
  array (
    'name' => 'togetherness',
  ),
  5249 => 
  array (
    'name' => 'tokyo',
  ),
  5254 => 
  array (
    'name' => 'tokyo economic development',
  ),
  5256 => 
  array (
    'name' => 'tokyo urban history',
  ),
  5258 => 
  array (
    'name' => 'topography',
  ),
  5259 => 
  array (
    'name' => 'total world population',
  ),
  5260 => 
  array (
    'name' => 'tourism',
  ),
  5263 => 
  array (
    'name' => 'towers',
  ),
  5265 => 
  array (
    'name' => 'town centres',
  ),
  5266 => 
  array (
    'name' => 'traditions',
  ),
  5267 => 
  array (
    'name' => 'trafalgar square',
  ),
  5269 => 
  array (
    'name' => 'traffic',
  ),
  5277 => 
  array (
    'name' => 'traffic congestion',
  ),
  5282 => 
  array (
    'name' => 'traffic jams',
  ),
  5283 => 
  array (
    'name' => 'traffic safety',
  ),
  5284 => 
  array (
    'name' => 'traffic safety?',
  ),
  5285 => 
  array (
    'name' => 'trains',
  ),
  5289 => 
  array (
    'name' => 'tranformation',
  ),
  5290 => 
  array (
    'name' => 'transfer',
  ),
  5291 => 
  array (
    'name' => 'transform',
  ),
  5292 => 
  array (
    'name' => 'transformation',
  ),
  5304 => 
  array (
    'name' => 'transformation of london',
  ),
  5305 => 
  array (
    'name' => 'transformation of status- quo',
  ),
  5306 => 
  array (
    'name' => 'transforming mumbai',
  ),
  5307 => 
  array (
    'name' => 'transit',
  ),
  5308 => 
  array (
    'name' => 'transit planning',
  ),
  5311 => 
  array (
    'name' => 'transit system',
  ),
  5312 => 
  array (
    'name' => 'transition',
  ),
  5313 => 
  array (
    'name' => 'transmilenio',
  ),
  5314 => 
  array (
    'name' => 'transparency',
  ),
  5315 => 
  array (
    'name' => 'transport',
  ),
  5409 => 
  array (
    'name' => 'transport capacity',
  ),
  5410 => 
  array (
    'name' => 'transport costs',
  ),
  5411 => 
  array (
    'name' => 'transport development',
  ),
  5412 => 
  array (
    'name' => 'transport developments',
  ),
  5413 => 
  array (
    'name' => 'transport history',
  ),
  5414 => 
  array (
    'name' => 'transport hub',
  ),
  5415 => 
  array (
    'name' => 'transport improvement',
  ),
  5416 => 
  array (
    'name' => 'transport infrastructure',
  ),
  5420 => 
  array (
    'name' => 'transport integration',
  ),
  5421 => 
  array (
    'name' => 'transport mode share',
  ),
  5422 => 
  array (
    'name' => 'transport nodal growth points',
  ),
  5423 => 
  array (
    'name' => 'transport oriented development',
  ),
  5424 => 
  array (
    'name' => 'transport planning',
  ),
  5437 => 
  array (
    'name' => 'transport policies',
  ),
  5438 => 
  array (
    'name' => 'transport policy',
  ),
  5453 => 
  array (
    'name' => 'transport problems',
  ),
  5454 => 
  array (
    'name' => 'transport projects',
  ),
  5458 => 
  array (
    'name' => 'transport statistics',
  ),
  5460 => 
  array (
    'name' => 'transport system',
  ),
  5464 => 
  array (
    'name' => 'transport system needs',
  ),
  5465 => 
  array (
    'name' => 'transport systems',
  ),
  5466 => 
  array (
    'name' => 'transportation',
  ),
  5470 => 
  array (
    'name' => 'transportation hubs',
  ),
  5471 => 
  array (
    'name' => 'transportation system',
  ),
  5476 => 
  array (
    'name' => 'travel mode',
  ),
  5481 => 
  array (
    'name' => 'travel time',
  ),
  5489 => 
  array (
    'name' => 'trip flows',
  ),
  5491 => 
  array (
    'name' => 'trip length',
  ),
  5492 => 
  array (
    'name' => 'trip time',
  ),
  5493 => 
  array (
    'name' => 'trustee function',
  ),
  5494 => 
  array (
    'name' => 'turkey',
  ),
  5508 => 
  array (
    'name' => 'twin towers',
  ),
  5510 => 
  array (
    'name' => 'typologies',
  ),
  5513 => 
  array (
    'name' => 'uk',
  ),
  5531 => 
  array (
    'name' => 'ulrich beck',
  ),
  5532 => 
  array (
    'name' => 'unemployment',
  ),
  5536 => 
  array (
    'name' => 'uneven growth',
  ),
  5542 => 
  array (
    'name' => 'uniformity',
  ),
  5543 => 
  array (
    'name' => 'united states',
  ),
  5547 => 
  array (
    'name' => 'unity',
  ),
  5548 => 
  array (
    'name' => 'universities',
  ),
  5551 => 
  array (
    'name' => 'unjust corrupt',
  ),
  5553 => 
  array (
    'name' => 'unofficial stories',
  ),
  5554 => 
  array (
    'name' => 'unplanned development',
  ),
  5556 => 
  array (
    'name' => 'upper-middle classes',
  ),
  5557 => 
  array (
    'name' => 'urban',
  ),
  5562 => 
  array (
    'name' => 'urban age',
  ),
  5629 => 
  array (
    'name' => 'urban age agenda',
  ),
  5631 => 
  array (
    'name' => 'urban age conference',
  ),
  5632 => 
  array (
    'name' => 'urban age project',
  ),
  5633 => 
  array (
    'name' => 'urban age survey',
  ),
  5635 => 
  array (
    'name' => 'urban age themes',
  ),
  5636 => 
  array (
    'name' => 'urban agglomeration',
  ),
  5638 => 
  array (
    'name' => 'urban centres',
  ),
  5640 => 
  array (
    'name' => 'urban change',
  ),
  5645 => 
  array (
    'name' => 'urban coalitions',
  ),
  5648 => 
  array (
    'name' => 'urban crime',
  ),
  5649 => 
  array (
    'name' => 'urban decay',
  ),
  5653 => 
  array (
    'name' => 'urban decision making',
  ),
  5654 => 
  array (
    'name' => 'urban decline',
  ),
  5667 => 
  array (
    'name' => 'urban demographics',
  ),
  5668 => 
  array (
    'name' => 'urban density',
  ),
  5669 => 
  array (
    'name' => 'urban design',
  ),
  5691 => 
  array (
    'name' => 'urban design masterplans',
  ),
  5692 => 
  array (
    'name' => 'urban design?',
  ),
  5693 => 
  array (
    'name' => 'urban development',
  ),
  5707 => 
  array (
    'name' => 'urban development agency',
  ),
  5708 => 
  array (
    'name' => 'urban development cycle',
  ),
  5709 => 
  array (
    'name' => 'urban economic growth',
  ),
  5710 => 
  array (
    'name' => 'urban economies',
  ),
  5711 => 
  array (
    'name' => 'urban economy',
  ),
  5714 => 
  array (
    'name' => 'urban fabric',
  ),
  5718 => 
  array (
    'name' => 'urban flight',
  ),
  5719 => 
  array (
    'name' => 'urban form',
  ),
  5728 => 
  array (
    'name' => 'urban geography',
  ),
  5729 => 
  array (
    'name' => 'urban governance',
  ),
  5734 => 
  array (
    'name' => 'urban gowth',
  ),
  5737 => 
  array (
    'name' => 'urban growth',
  ),
  5740 => 
  array (
    'name' => 'urban growth/decline',
  ),
  5746 => 
  array (
    'name' => 'urban heritage',
  ),
  5747 => 
  array (
    'name' => 'urban history',
  ),
  5748 => 
  array (
    'name' => 'urban housing statistics',
  ),
  5749 => 
  array (
    'name' => 'urban ideal',
  ),
  5750 => 
  array (
    'name' => 'urban identity',
  ),
  5751 => 
  array (
    'name' => 'urban inequality',
  ),
  5752 => 
  array (
    'name' => 'urban infrastructure',
  ),
  5757 => 
  array (
    'name' => 'urban innovation',
  ),
  5758 => 
  array (
    'name' => 'urban interventions',
  ),
  5759 => 
  array (
    'name' => 'urban istitutions',
  ),
  5760 => 
  array (
    'name' => 'urban labour markets',
  ),
  5761 => 
  array (
    'name' => 'urban land ceiling act',
  ),
  5762 => 
  array (
    'name' => 'urban landscape',
  ),
  5765 => 
  array (
    'name' => 'urban language',
  ),
  5766 => 
  array (
    'name' => 'urban living',
  ),
  5768 => 
  array (
    'name' => 'urban manufacturing',
  ),
  5769 => 
  array (
    'name' => 'urban models',
  ),
  5773 => 
  array (
    'name' => 'urban planning',
  ),
  5777 => 
  array (
    'name' => 'urban planning in mumbai',
  ),
  5778 => 
  array (
    'name' => 'urban population',
  ),
  5779 => 
  array (
    'name' => 'urban population growth',
  ),
  5780 => 
  array (
    'name' => 'urban population statistics',
  ),
  5781 => 
  array (
    'name' => 'urban poverty',
  ),
  5785 => 
  array (
    'name' => 'urban poverty rate',
  ),
  5786 => 
  array (
    'name' => 'urban problems',
  ),
  5787 => 
  array (
    'name' => 'urban production',
  ),
  5788 => 
  array (
    'name' => 'urban regional and european fabric',
  ),
  5789 => 
  array (
    'name' => 'urban renewal',
  ),
  5796 => 
  array (
    'name' => 'urban resurgence',
  ),
  5797 => 
  array (
    'name' => 'urban scale',
  ),
  5799 => 
  array (
    'name' => 'urban services',
  ),
  5802 => 
  array (
    'name' => 'urban society',
  ),
  5803 => 
  array (
    'name' => 'urban space',
  ),
  5804 => 
  array (
    'name' => 'urban spaces',
  ),
  5808 => 
  array (
    'name' => 'urban sprawl',
  ),
  5811 => 
  array (
    'name' => 'urban structure',
  ),
  5813 => 
  array (
    'name' => 'urban structures',
  ),
  5814 => 
  array (
    'name' => 'urban terrorism',
  ),
  5815 => 
  array (
    'name' => 'urban theory',
  ),
  5817 => 
  array (
    'name' => 'urban transformation',
  ),
  5818 => 
  array (
    'name' => 'urban transition',
  ),
  5820 => 
  array (
    'name' => 'urban transport',
  ),
  5824 => 
  array (
    'name' => 'urban transport system',
  ),
  5826 => 
  array (
    'name' => 'urban-rural growth differential',
  ),
  5827 => 
  array (
    'name' => 'urbanisation',
  ),
  5833 => 
  array (
    'name' => 'urbanisation growth',
  ),
  5835 => 
  array (
    'name' => 'urbanisation rate',
  ),
  5836 => 
  array (
    'name' => 'urbanism',
  ),
  5839 => 
  array (
    'name' => 'urbanity',
  ),
  5844 => 
  array (
    'name' => 'urbanity\'',
  ),
  5845 => 
  array (
    'name' => 'urbanization',
  ),
  5848 => 
  array (
    'name' => 'usa',
  ),
  5850 => 
  array (
    'name' => 'uses',
  ),
  5852 => 
  array (
    'name' => 'uses of places',
  ),
  5853 => 
  array (
    'name' => 'uses of space',
  ),
  5854 => 
  array (
    'name' => 'uses of spaces',
  ),
  5855 => 
  array (
    'name' => 'utility leakages',
  ),
  5857 => 
  array (
    'name' => 'vehicle movement',
  ),
  5858 => 
  array (
    'name' => 'venice',
  ),
  5859 => 
  array (
    'name' => 'verbal',
  ),
  5860 => 
  array (
    'name' => 'versatility',
  ),
  5861 => 
  array (
    'name' => 'viaducts',
  ),
  5862 => 
  array (
    'name' => 'violence',
  ),
  5872 => 
  array (
    'name' => 'virtual',
  ),
  5875 => 
  array (
    'name' => 'vision',
  ),
  5885 => 
  array (
    'name' => 'visionaries',
  ),
  5886 => 
  array (
    'name' => 'visionary planning',
  ),
  5890 => 
  array (
    'name' => 'visionary thinking',
  ),
  5891 => 
  array (
    'name' => 'visioning istanbul',
  ),
  5893 => 
  array (
    'name' => 'visions',
  ),
  5899 => 
  array (
    'name' => 'visual forms',
  ),
  5900 => 
  array (
    'name' => 'visual order',
  ),
  5901 => 
  array (
    'name' => 'visual pollution',
  ),
  5902 => 
  array (
    'name' => 'vunerable cities',
  ),
  5904 => 
  array (
    'name' => 'wages',
  ),
  5905 => 
  array (
    'name' => 'walking',
  ),
  5908 => 
  array (
    'name' => 'walter sisulu square',
  ),
  5909 => 
  array (
    'name' => 'washington',
  ),
  5910 => 
  array (
    'name' => 'washington d.c',
  ),
  5911 => 
  array (
    'name' => 'washington d.c.',
  ),
  5916 => 
  array (
    'name' => 'washington dc',
  ),
  5922 => 
  array (
    'name' => 'washington: urban renewal',
  ),
  5923 => 
  array (
    'name' => 'waste',
  ),
  5924 => 
  array (
    'name' => 'waste management',
  ),
  5926 => 
  array (
    'name' => 'water',
  ),
  5932 => 
  array (
    'name' => 'water & sanitation',
  ),
  5933 => 
  array (
    'name' => 'water and sanitation',
  ),
  5934 => 
  array (
    'name' => 'water basins',
  ),
  5936 => 
  array (
    'name' => 'water management',
  ),
  5937 => 
  array (
    'name' => 'water policy',
  ),
  5938 => 
  array (
    'name' => 'waterfront',
  ),
  5940 => 
  array (
    'name' => 'waterfront revitalization',
  ),
  5942 => 
  array (
    'name' => 'wealth',
  ),
  5946 => 
  array (
    'name' => 'welfare',
  ),
  5947 => 
  array (
    'name' => 'welfare system',
  ),
  5948 => 
  array (
    'name' => 'west chelsea',
  ),
  5949 => 
  array (
    'name' => 'western',
  ),
  5951 => 
  array (
    'name' => 'western constructs',
  ),
  5953 => 
  array (
    'name' => 'westway',
  ),
  5957 => 
  array (
    'name' => 'white city',
  ),
  5959 => 
  array (
    'name' => 'white city development',
  ),
  5962 => 
  array (
    'name' => 'white city project',
  ),
  5964 => 
  array (
    'name' => 'white city scheme',
  ),
  5965 => 
  array (
    'name' => 'who\'s city? service sector',
  ),
  5966 => 
  array (
    'name' => 'woking',
  ),
  5967 => 
  array (
    'name' => 'work',
  ),
  5968 => 
  array (
    'name' => 'work and life',
  ),
  5969 => 
  array (
    'name' => 'work and spaces',
  ),
  5970 => 
  array (
    'name' => 'work vs housing',
  ),
  5971 => 
  array (
    'name' => 'worker migrants',
  ),
  5973 => 
  array (
    'name' => 'working places',
  ),
  5974 => 
  array (
    'name' => 'world',
  ),
  5975 => 
  array (
    'name' => 'world city',
  ),
  5977 => 
  array (
    'name' => 'world class city',
  ),
  5978 => 
  array (
    'name' => 'world squares project',
  ),
  5980 => 
  array (
    'name' => 'world trade centre site',
  ),
  5981 => 
  array (
    'name' => 'world\'s fair 1939',
  ),
  5982 => 
  array (
    'name' => 'worldliness',
  ),
  5983 => 
  array (
    'name' => 'xochimilco',
  ),
  5984 => 
  array (
    'name' => 'yangshan project',
  ),
  5985 => 
  array (
    'name' => 'yangtze river delta',
  ),
  5986 => 
  array (
    'name' => 'younger population',
  ),
  5987 => 
  array (
    'name' => 'zocalo',
  ),
  5988 => 
  array (
    'name' => 'zoning',
  ),
  5992 => 
  array (
    'name' => 'zoo lake',
  ),
  5993 => 
  array (
    'name' => 'zurich',
  ),
);
$all_the_geotags = array (
  0 => 
  array (
    'name' => '',
  ),
  4 => 
  array (
    'name' => 'berlin',
  ),
  60 => 
  array (
    'name' => 'bogota',
  ),
  62 => 
  array (
    'name' => 'bogotá',
  ),
  63 => 
  array (
    'name' => 'bogotá and são paulo',
  ),
  64 => 
  array (
    'name' => 'brasilia',
  ),
  65 => 
  array (
    'name' => 'chile',
  ),
  66 => 
  array (
    'name' => 'china',
  ),
  71 => 
  array (
    'name' => 'curitiba',
  ),
  72 => 
  array (
    'name' => 'delhi',
  ),
  80 => 
  array (
    'name' => 'dharavi',
  ),
  84 => 
  array (
    'name' => 'east end',
  ),
  87 => 
  array (
    'name' => 'general',
  ),
  90 => 
  array (
    'name' => 'geographic focus',
  ),
  91 => 
  array (
    'name' => 'german cities',
  ),
  97 => 
  array (
    'name' => 'global cities',
  ),
  103 => 
  array (
    'name' => 'indian cities',
  ),
  109 => 
  array (
    'name' => 'istanbul',
  ),
  163 => 
  array (
    'name' => 'johannesburg',
  ),
  170 => 
  array (
    'name' => 'kolkata',
  ),
  171 => 
  array (
    'name' => 'latin america',
  ),
  172 => 
  array (
    'name' => 'london',
  ),
  222 => 
  array (
    'name' => 'maharashtra',
  ),
  223 => 
  array (
    'name' => 'mediterranean',
  ),
  224 => 
  array (
    'name' => 'mexico city',
  ),
  237 => 
  array (
    'name' => 'mumbai',
  ),
  273 => 
  array (
    'name' => 'new york',
  ),
  456 => 
  array (
    'name' => 'new york london',
  ),
  462 => 
  array (
    'name' => 'oaxaca',
  ),
  463 => 
  array (
    'name' => 'paris',
  ),
  470 => 
  array (
    'name' => 'rio de janeiro',
  ),
  471 => 
  array (
    'name' => 'santiago',
  ),
  472 => 
  array (
    'name' => 'sao paulo',
  ),
  544 => 
  array (
    'name' => 'shaghai',
  ),
  546 => 
  array (
    'name' => 'shanghai',
  ),
  594 => 
  array (
    'name' => 'singapore',
  ),
  598 => 
  array (
    'name' => 'south america',
  ),
  615 => 
  array (
    'name' => 'são paulo',
  ),
  617 => 
  array (
    'name' => 'tokyo',
  ),
  621 => 
  array (
    'name' => 'turkey',
  ),
  624 => 
  array (
    'name' => 'united states',
  ),
  625 => 
  array (
    'name' => 'urban age overview',
  ),
  632 => 
  array (
    'name' => 'washington',
  ),
  633 => 
  array (
    'name' => 'washington d.c',
  ),
  634 => 
  array (
    'name' => 'washington dc',
  ),
);
$all_the_media_items = array (
  0 => 
  array (
    'slug' => sanitize_title("title"),
    'name' => 'title',
    'format' => 'format (audio/video/text)',
    'type' => 'type (article, book chapter, talk, discussion panel)',
    'date' => 'date',
    'language2' => 'language',
    'running_time' => 'running time',
    'geotags' => 
    array (
      0 => 'geographic focus',
    ),
    'tags' => 
    array (
      0 => 'keywords',
    ),
  ),
  1 => 
  array (
    'slug' => sanitize_title("A .Rule of Law. for Cities  "),
    'name' => 'A .Rule of Law. for Cities  ',
    'format' => 'text',
    'type' => 'article',
    'date' => '2007-11',
    'language2' => 'English',
    'running_time' => 'running time',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'informality',
      2 => 'policy',
      3 => 'development',
      4 => 'planning',
    ),
  ),
  2 => 
  array (
    'slug' => sanitize_title("Mumbai\'s Emerging Future"),
    'name' => 'Mumbai\'s Emerging Future',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2007-11-02',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
      1 => 'dharavi',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'planning',
      2 => 'slums',
      3 => 'development',
      4 => 'democracy',
      5 => 'good governance',
    ),
  ),
  3 => 
  array (
    'slug' => sanitize_title("Climate Change, Risk and Urbanisation"),
    'name' => 'Climate Change, Risk and Urbanisation',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2007-11-03',
    'language2' => 'English',
    'running_time' => '20min?',
    'geotags' => 
    array (
      0 => 'mumbai',
      1 => 'dharavi',
    ),
    'tags' => 
    array (
      0 => 'stern review',
      1 => 'climate change',
      2 => 'india',
      3 => 'environment',
      4 => 'energy management',
      5 => 'energy policy',
      6 => 'water management',
      7 => 'water policy',
      8 => 'sustainability',
    ),
  ),
  4 => 
  array (
    'slug' => sanitize_title("A Matter of People  "),
    'name' => 'A Matter of People  ',
    'format' => 'text',
    'type' => 'article',
    'date' => '2007-11',
    'language2' => 'English',
    'running_time' => '20min?',
    'geotags' => 
    array (
      0 => 'mumbai',
      1 => 'dharavi',
    ),
    'tags' => 
    array (
      0 => 'immigration/migration',
      1 => 'slums',
      2 => 'informality',
      3 => 'governance',
      4 => 'transport',
    ),
  ),
  5 => 
  array (
    'slug' => sanitize_title("The Multicultural City"),
    'name' => 'The Multicultural City',
    'format' => 'text',
    'type' => 'article',
    'date' => '2008-12',
    'language2' => 'English',
    'running_time' => '20min?',
    'geotags' => 
    array (
      0 => 'mumbai',
      1 => 'dharavi',
    ),
    'tags' => 
    array (
      0 => 'transit',
      1 => 'multicuralism',
      2 => 'immigration',
      3 => 'assimilation',
      4 => 'ethnic diversity',
      5 => 'literature',
      6 => 'religion',
      7 => 'music',
    ),
  ),
  6 => 
  array (
    'slug' => sanitize_title("Social Engagement in Latin American Cities"),
    'name' => 'Social Engagement in Latin American Cities',
    'format' => 'text',
    'type' => 'article',
    'date' => '2008-12',
    'language2' => 'English',
    'running_time' => '20min?',
    'geotags' => 
    array (
      0 => 'latin america',
      1 => 'são paulo',
      2 => 'rio de janeiro',
    ),
    'tags' => 
    array (
      0 => 'latin america',
      1 => 'social engagement',
      2 => 'urban poverty',
      3 => 'self-organization',
      4 => 'dispute mediation',
      5 => 'participatory budgeting',
      6 => 'gangs',
      7 => 'land rights',
    ),
  ),
  7 => 
  array (
    'slug' => sanitize_title("Elemental: Housing as Investment, not Social Expense"),
    'name' => 'Elemental: Housing as Investment, not Social Expense',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2008-12-03',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'chile',
      1 => 'santiago',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'housing policy',
      2 => 'resettlement',
      3 => 'architecture',
      4 => 'participation',
      5 => 'participatory design',
      6 => 'participatory decision-making',
      7 => 'elemental',
      8 => 'informal settlements',
    ),
  ),
  8 => 
  array (
    'slug' => sanitize_title("Keynote"),
    'name' => 'Keynote',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2008-12-05',
    'language2' => 'Portuguese (Brazil)',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'brasilia',
      1 => 'são paulo',
      2 => 'oaxaca',
      3 => 'curitiba',
    ),
    'tags' => 
    array (
      0 => 'city design',
      1 => 'urban structure',
      2 => 'mobility',
      3 => 'transport',
      4 => 'bus rapid transit',
      5 => 'architecture',
      6 => 'sustainability',
      7 => 'multi-modal integration',
      8 => 'urban identity',
    ),
  ),
  9 => 
  array (
    'slug' => sanitize_title("The immutable intersection of vast mobilities"),
    'name' => 'The immutable intersection of vast mobilities',
    'format' => 'text',
    'type' => 'article',
    'date' => '2009-11',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'turkey',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'capital',
      2 => 'migration',
      3 => 'economic',
      4 => 'immigration',
      5 => 'policy engagement',
      6 => 'cross-border',
      7 => 'inner-city geographies',
      8 => 'global',
    ),
  ),
  10 => 
  array (
    'slug' => sanitize_title("Istanbul within a Europe of cities "),
    'name' => 'Istanbul within a Europe of cities ',
    'format' => 'text',
    'type' => 'article',
    'date' => '2009-11',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'turkey',
    ),
    'tags' => 
    array (
      0 => 'european cities',
      1 => 'central cities',
      2 => 'peripheral cities',
      3 => 'economic and renewal',
      4 => 'restauration',
      5 => 'foreign',
      6 => 'tourism',
      7 => 'growth',
      8 => 'standardization',
      9 => 'centralization',
      10 => 'urban design',
      11 => 'urban planning',
      12 => 'architecture',
    ),
  ),
  11 => 
  array (
    'slug' => sanitize_title("American metropolitan cities in the post-recession period"),
    'name' => 'American metropolitan cities in the post-recession period',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2009-11-05',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'turkey',
    ),
    'tags' => 
    array (
      0 => 'economy',
      1 => 'low-carbon',
      2 => 'innovation',
      3 => 'sustainable growth',
      4 => 'recession',
      5 => 'unemployment',
      6 => 'metropolitan',
    ),
  ),
  12 => 
  array (
    'slug' => sanitize_title("Urban culture in the cities of the Mediterranean"),
    'name' => 'Urban culture in the cities of the Mediterranean',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2009-11-05',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mediterranean',
      1 => '',
    ),
    'tags' => 
    array (
      0 => 'architects',
      1 => 'planners',
      2 => 'urban geography',
      3 => 'urban ideal',
      4 => 'economy',
      5 => 'urban development',
      6 => 'mediterranean',
    ),
  ),
  13 => 
  array (
    'slug' => sanitize_title("Arkitera Spatial Study   "),
    'name' => 'Arkitera Spatial Study   ',
    'format' => 'text',
    'type' => 'newspaper essay  ',
    'date' => '2009-11  ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul',
      1 => 'architects',
      2 => 'architecture',
      3 => 'green',
      4 => 'urbanisation',
      5 => 'public spaces',
      6 => 'arkitera architecture center',
      7 => 'problems',
    ),
  ),
  14 => 
  array (
    'slug' => sanitize_title("Istanbul\'s spatial dynamics "),
    'name' => 'Istanbul\'s spatial dynamics ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'technology',
      1 => 'modernisation',
      2 => 'economic prosperity',
      3 => 'mobilty',
      4 => 'segregation',
      5 => 'exclusion',
      6 => 'gated communities',
      7 => 'regeneration',
      8 => 'gokturk',
      9 => '',
    ),
  ),
  15 => 
  array (
    'slug' => sanitize_title("Urban spaces in and around Istanbul "),
    'name' => 'Urban spaces in and around Istanbul ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'turkey',
      1 => 'history',
      2 => 'housing',
      3 => 'decentralisation',
      4 => 'economy',
      5 => 'urban infrastructure',
    ),
  ),
  16 => 
  array (
    'slug' => sanitize_title("Tarlaba.. "),
    'name' => 'Tarlaba.. ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'tarlaba..',
      1 => 'history',
      2 => 'migrants',
      3 => 'istiklal street',
      4 => 'regeneration',
      5 => '',
    ),
  ),
  17 => 
  array (
    'slug' => sanitize_title("Istanbul\'s Gecekondus "),
    'name' => 'Istanbul\'s Gecekondus ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'self-service urbanisation',
      1 => 'history',
      2 => 'mass migration',
      3 => 'mass housing',
      4 => 'welfare',
      5 => 'urban living',
      6 => 'migrants',
      7 => 'gercekondu',
    ),
  ),
  18 => 
  array (
    'slug' => sanitize_title("Istanbul\'s choice "),
    'name' => 'Istanbul\'s choice ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'turkey',
      1 => 'istanbul',
      2 => 'culture',
      3 => 'globalisation',
      4 => 'land',
      5 => 'real estate',
      6 => 'regeneration',
      7 => 'housing',
      8 => 'renaissance',
      9 => 'change',
      10 => 'gentrification',
      11 => 'european',
      12 => 'mirgration',
      13 => 'public space',
      14 => 'worldliness',
    ),
  ),
  19 => 
  array (
    'slug' => sanitize_title("Is there a road ahead? "),
    'name' => 'Is there a road ahead? ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul',
      1 => 'traffic',
      2 => 'congestion transport system',
      3 => 'population and economic growth',
      4 => 'metropolitan',
      5 => 'transport planning',
      6 => 'transport policies',
      7 => 'sustainable transport',
      8 => 'infrastructure',
    ),
  ),
  20 => 
  array (
    'slug' => sanitize_title("Local governance in Istanbul "),
    'name' => 'Local governance in Istanbul ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul',
      1 => 'governence',
      2 => 'turkey',
      3 => 'government',
      4 => 'migration',
      5 => 'decentralisation',
      6 => 'democracy',
      7 => 'central government',
      8 => 'minority groups',
    ),
  ),
  21 => 
  array (
    'slug' => sanitize_title("Istanbul in a global context "),
    'name' => 'Istanbul in a global context ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'globalisation',
      1 => 'global',
      2 => '',
    ),
  ),
  22 => 
  array (
    'slug' => sanitize_title("Deciphering Istanbul "),
    'name' => 'Deciphering Istanbul ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'topography',
      1 => 'istanbul',
      2 => 'public space',
      3 => 'architectural',
      4 => '',
    ),
  ),
  23 => 
  array (
    'slug' => sanitize_title("Cities in modern Turkey "),
    'name' => 'Cities in modern Turkey ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'turkey',
      1 => 'istanbul',
      2 => 'ankara',
      3 => 'izmir',
      4 => 'political transitions',
      5 => 'radical modernity',
      6 => 'populist modernity',
      7 => 'erosion of modernity',
      8 => 'urban',
      9 => 'urban development',
      10 => 'urbanisation',
      11 => 'government',
      12 => 'planning',
      13 => 'gecekondus',
      14 => 'history',
      15 => 'growth',
      16 => 'cities',
    ),
  ),
  24 => 
  array (
    'slug' => sanitize_title("It\'s Istanbul (not globalisation) "),
    'name' => 'It\'s Istanbul (not globalisation) ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'global',
      1 => 'turkey',
      2 => 'istanbul',
      3 => 'globalisation',
    ),
  ),
  25 => 
  array (
    'slug' => sanitize_title("Istanbul within a Europe of cities "),
    'name' => 'Istanbul within a Europe of cities ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'european cities',
      1 => 'central cities',
      2 => 'peripheral cities',
      3 => 'economic and renewal',
      4 => 'restauration',
      5 => 'foreign',
      6 => 'tourism',
      7 => 'growth',
      8 => 'standardization',
      9 => 'centralization',
      10 => 'urban design',
      11 => 'urban planning',
      12 => 'architecture',
      13 => 'turkey',
      14 => 'miditterranean',
    ),
  ),
  26 => 
  array (
    'slug' => sanitize_title("City Making as Climate Policy "),
    'name' => 'City Making as Climate Policy ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'cities',
      1 => 'climate',
      2 => 'carbon emissions',
      3 => 'global',
      4 => 'urbanisation',
      5 => 'urban population',
      6 => 'transport',
      7 => 'compact city',
      8 => 'environment',
      9 => 'government',
      10 => 'policy',
    ),
  ),
  27 => 
  array (
    'slug' => sanitize_title("Green Economy for an Urban Age "),
    'name' => 'Green Economy for an Urban Age ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'cities',
      1 => 'green economy',
      2 => 'climate change',
      3 => 'green urban age',
      4 => 'urban development',
      5 => 'planning',
      6 => 'design',
    ),
  ),
  28 => 
  array (
    'slug' => sanitize_title("The immutable intersection of vast mobilities "),
    'name' => 'The immutable intersection of vast mobilities ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'capital',
      2 => 'migration',
      3 => 'economic',
      4 => 'immigration',
      5 => 'policy engagement',
      6 => 'cross-border',
      7 => 'inner-city geographies',
      8 => 'global',
    ),
  ),
  29 => 
  array (
    'slug' => sanitize_title("The city too big to fail "),
    'name' => 'The city too big to fail ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2009-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul',
      1 => 'urbanisation',
      2 => 'urban history',
      3 => 'turkey',
      4 => 'urban problems',
    ),
  ),
  30 => 
  array (
    'slug' => sanitize_title("Implementing Urban Change | Implementando A Mudança Urbana "),
    'name' => 'Implementing Urban Change | Implementando A Mudança Urbana ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'regeneration',
      2 => 'urban interventions',
      3 => 'sustainable development',
      4 => 'public-private partnerships',
      5 => 'metropolitan strategy',
      6 => 'public participation',
      7 => 'urban development agency',
      8 => 'urban governance',
      9 => 'strategic planning',
    ),
  ),
  31 => 
  array (
    'slug' => sanitize_title("Safe Spaces in São Paulo | Espaços Seguros Em São Paulo"),
    'name' => 'Safe Spaces in São Paulo | Espaços Seguros Em São Paulo',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'crime',
      2 => 'spatial distribution of violence',
      3 => 'centre and periphery',
      4 => 'quality of life',
      5 => 'crime reduction strategies',
      6 => 'segregation',
      7 => 'social diversification',
      8 => 'sociability',
    ),
  ),
  32 => 
  array (
    'slug' => sanitize_title("Worlds Set Apart | Mundos Separados "),
    'name' => 'Worlds Set Apart | Mundos Separados ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'inequality',
      2 => 'centre vs periphery',
      3 => 'activism',
      4 => 'social movements',
      5 => 'urban flight',
      6 => 'crime',
      7 => 'violence',
      8 => 'periphery',
      9 => 'public space',
      10 => '',
    ),
  ),
  33 => 
  array (
    'slug' => sanitize_title("Mobility and the Urban Poor | Mobilidade E Pobreza Urbana"),
    'name' => 'Mobility and the Urban Poor | Mobilidade E Pobreza Urbana',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'urban poverty',
      1 => 'mobility',
      2 => 'sao paulo',
      3 => 'transport costs',
      4 => 'urban transport',
      5 => 'public transport',
      6 => 'accessibility',
      7 => 'land use',
      8 => '',
    ),
  ),
  34 => 
  array (
    'slug' => sanitize_title("São Paulo\'s Urban Transport Infrastructure | Infra-Estrutura De Transporte Urbano De São Paulo "),
    'name' => 'São Paulo\'s Urban Transport Infrastructure | Infra-Estrutura De Transporte Urbano De São Paulo ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'urban transport',
      2 => 'transport infrastructure',
      3 => 'public transport',
      4 => 'transport statistics',
      5 => 'transport planning',
      6 => 'transport policy',
      7 => 'transport projects',
      8 => '',
    ),
  ),
  35 => 
  array (
    'slug' => sanitize_title("The Multicultural City | A Cidade Multicultural "),
    'name' => 'The Multicultural City | A Cidade Multicultural ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'urban transport',
      2 => 'transport infrastructure',
      3 => 'public transport',
      4 => 'transport statistics',
      5 => 'transport planning',
      6 => 'transport policy',
      7 => 'transport projects',
      8 => '',
    ),
  ),
  36 => 
  array (
    'slug' => sanitize_title("New Urban Opportunities | Novas Oportunidades Urbanas "),
    'name' => 'New Urban Opportunities | Novas Oportunidades Urbanas ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'urban development',
      2 => 'urban form',
      3 => 'transport',
      4 => 'real estate',
      5 => 'architecture',
      6 => 'land use policy',
      7 => 'historic centre/city centre/city centre revitalization',
      8 => 'urban landscape',
      9 => '',
    ),
  ),
  37 => 
  array (
    'slug' => sanitize_title("Urban Age City Survey | Pesquisa De Cidades Da Urban Age "),
    'name' => 'Urban Age City Survey | Pesquisa De Cidades Da Urban Age ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'urban development',
      2 => 'urban form',
      3 => 'transport',
      4 => 'real estate',
      5 => 'architecture',
      6 => 'land use policy',
      7 => 'historic centre/city centre/city centre revitalization',
      8 => 'urban landscape',
      9 => '',
    ),
  ),
  38 => 
  array (
    'slug' => sanitize_title("Social Engagement in Latin American Cities | Engajamento Social Nas Cidades Latino-Americanas "),
    'name' => 'Social Engagement in Latin American Cities | Engajamento Social Nas Cidades Latino-Americanas ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'urban development',
      2 => 'urban form',
      3 => 'transport',
      4 => 'real estate',
      5 => 'architecture',
      6 => 'land use policy',
      7 => 'historic centre/city centre/city centre revitalization',
      8 => 'urban landscape',
      9 => '',
    ),
  ),
  39 => 
  array (
    'slug' => sanitize_title("From Waste to Public Space | Do Lixo Ao Espaço Público "),
    'name' => 'From Waste to Public Space | Do Lixo Ao Espaço Público ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'waste management',
      2 => 'public space',
      3 => 'emissions reduction',
      4 => 'landfill management',
      5 => '',
    ),
  ),
  40 => 
  array (
    'slug' => sanitize_title("The Challenges of Climate Change in Latin America | O Problema Da Mudança Climática Na América Latina "),
    'name' => 'The Challenges of Climate Change in Latin America | O Problema Da Mudança Climática Na América Latina ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'latin america',
      1 => 'climate change',
      2 => 'mitigation',
      3 => 'adaptation',
      4 => 'adaptive strategies',
      5 => 'emissions reduction',
    ),
  ),
  41 => 
  array (
    'slug' => sanitize_title("Cities and Climate Change | Cidades e Mudanças Climáticas"),
    'name' => 'Cities and Climate Change | Cidades e Mudanças Climáticas',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'climate change',
      1 => 'emissions',
      2 => 'emissions inventories',
      3 => 'cities and emissions',
      4 => 'mitigation',
    ),
  ),
  42 => 
  array (
    'slug' => sanitize_title("The Mobility DNA of Cities | O DNA da Mobilidade Nas Cidades "),
    'name' => 'The Mobility DNA of Cities | O DNA da Mobilidade Nas Cidades ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'social exclusion',
      2 => 'travel time',
      3 => 'travel mode',
      4 => 'accessibility',
      5 => 'public transport',
    ),
  ),
  43 => 
  array (
    'slug' => sanitize_title("Politics, Power, Cities | Políticas, Poder, Cidades "),
    'name' => 'Politics, Power, Cities | Políticas, Poder, Cidades ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'social exclusion',
      2 => 'travel time',
      3 => 'travel mode',
      4 => 'accessibility',
      5 => 'public transport',
    ),
  ),
  44 => 
  array (
    'slug' => sanitize_title("Building Urban Assets in South America | Construindo Ativos Territoriais na América Do Sul"),
    'name' => 'Building Urban Assets in South America | Construindo Ativos Territoriais na América Do Sul',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'social exclusion',
      2 => 'travel time',
      3 => 'travel mode',
      4 => 'accessibility',
      5 => 'public transport',
    ),
  ),
  45 => 
  array (
    'slug' => sanitize_title("The Specialised Differences of Global Cities | As Diferentes Especializações Das Cidades Globais "),
    'name' => 'The Specialised Differences of Global Cities | As Diferentes Especializações Das Cidades Globais ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'social exclusion',
      2 => 'travel time',
      3 => 'travel mode',
      4 => 'accessibility',
      5 => 'public transport',
    ),
  ),
  46 => 
  array (
    'slug' => sanitize_title("Fine Tuning South American Cities | Sintonizando as Cidades Sul-Americanas "),
    'name' => 'Fine Tuning South American Cities | Sintonizando as Cidades Sul-Americanas ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'south america',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'social exclusion',
      2 => 'travel time',
      3 => 'travel mode',
      4 => 'accessibility',
      5 => 'public transport',
    ),
  ),
  47 => 
  array (
    'slug' => sanitize_title("The Vitality Of A Growth-Less City? "),
    'name' => 'The Vitality Of A Growth-Less City? ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2008-05 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'german cities',
    ),
    'tags' => 
    array (
      0 => 'berlin',
      1 => 'urban decline',
      2 => 'culture',
      3 => 'quality of life',
      4 => 'knowledge economy',
      5 => 'creative industries?',
    ),
  ),
  48 => 
  array (
    'slug' => sanitize_title("Lessons from Mumbai "),
    'name' => 'Lessons from Mumbai ',
    'format' => 'text',
    'type' => 'feature interview, may 2008 ',
    'date' => '2008-05 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'india',
      1 => 'mumbai',
      2 => 'inequality',
      3 => 'public transport',
      4 => 'slums',
      5 => 'indian urbanism',
    ),
  ),
  49 => 
  array (
    'slug' => sanitize_title("Quality of Life in Cities Today (interview) "),
    'name' => 'Quality of Life in Cities Today (interview) ',
    'format' => 'text',
    'type' => 'feature interview, may 2008 ',
    'date' => '2008-05 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'bogotá and são paulo',
    ),
    'tags' => 
    array (
      0 => 'india',
      1 => 'mumbai',
      2 => 'inequality',
      3 => 'public transport',
      4 => 'slums',
      5 => 'indian urbanism',
    ),
  ),
  50 => 
  array (
    'slug' => sanitize_title("Urban Transport in Indian Cities  "),
    'name' => 'Urban Transport in Indian Cities  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'india',
      2 => 'delhi',
      3 => 'public transport',
      4 => 'transport policy',
      5 => 'trains',
      6 => 'governance',
      7 => 'jawaharlal nehru national urban renewal mission',
      8 => 'pedestrians',
      9 => 'buses',
      10 => 'bicycles',
      11 => 'national urban transport policy',
      12 => 'mobility',
    ),
  ),
  51 => 
  array (
    'slug' => sanitize_title("India\'s Urban Shift  "),
    'name' => 'India\'s Urban Shift  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'india',
      1 => 'china',
      2 => 'kolkata',
      3 => 'mumbai',
      4 => 'bangalore',
      5 => 'governance',
      6 => 'public health',
      7 => 'housing',
      8 => 'slums',
      9 => 'history',
      10 => 'architecture',
      11 => '',
    ),
  ),
  52 => 
  array (
    'slug' => sanitize_title("The Economics of Climate Change  "),
    'name' => 'The Economics of Climate Change  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'environment',
      1 => 'energy',
      2 => 'sustainability',
      3 => 'policy',
      4 => 'governance',
      5 => 'climate change',
      6 => '',
    ),
  ),
  53 => 
  array (
    'slug' => sanitize_title("Democracy in Urban Indian "),
    'name' => 'Democracy in Urban Indian ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'india',
      1 => 'democracy',
      2 => 'governance',
      3 => '74th constitutional amendment',
      4 => 'centralisation',
      5 => 'local government',
    ),
  ),
  54 => 
  array (
    'slug' => sanitize_title("Cities and City Regions in Today\'s Global Age  "),
    'name' => 'Cities and City Regions in Today\'s Global Age  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'economy',
      1 => 'globalisation',
      2 => 'chicago',
      3 => 'informal economy',
      4 => 'global economy',
      5 => 'global cities',
    ),
  ),
  55 => 
  array (
    'slug' => sanitize_title("Mumbai: The Compact Megacity  "),
    'name' => 'Mumbai: The Compact Megacity  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'india',
      1 => 'mumbai',
      2 => 'transport',
      3 => 'density',
      4 => 'trains',
      5 => 'pedestrians',
      6 => 'mobility',
      7 => 'housing',
    ),
  ),
  56 => 
  array (
    'slug' => sanitize_title("Uncovering the Myth of Urban Development in Mumbai  "),
    'name' => 'Uncovering the Myth of Urban Development in Mumbai  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'migration',
      2 => 'employment',
      3 => 'density',
      4 => 'slums',
      5 => 'transport',
    ),
  ),
  57 => 
  array (
    'slug' => sanitize_title("Maximum City  "),
    'name' => 'Maximum City  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'development',
      2 => 'city life',
      3 => 'governance',
      4 => 'social organisation',
      5 => 'urban renewal',
    ),
  ),
  58 => 
  array (
    'slug' => sanitize_title("Remaking Mumbai  "),
    'name' => 'Remaking Mumbai  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'planning',
      2 => 'governance',
      3 => 'democracy',
      4 => 'urban renewal',
      5 => 'development',
    ),
  ),
  59 => 
  array (
    'slug' => sanitize_title("Future of Indian Cities  "),
    'name' => 'Future of Indian Cities  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'india',
      2 => 'economy',
      3 => 'informality',
      4 => 'planning',
      5 => 'free market',
    ),
  ),
  60 => 
  array (
    'slug' => sanitize_title("A .Rule of Law. for Cities  "),
    'name' => 'A .Rule of Law. for Cities  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'india',
      2 => 'economy',
      3 => 'informality',
      4 => 'planning',
      5 => 'free market',
    ),
  ),
  61 => 
  array (
    'slug' => sanitize_title("A Matter of People  "),
    'name' => 'A Matter of People  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2007-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'india',
      2 => 'economy',
      3 => 'informality',
      4 => 'planning',
      5 => 'free market',
    ),
  ),
  62 => 
  array (
    'slug' => sanitize_title("German Metropolitan Networks An Alternative to the Global City  "),
    'name' => 'German Metropolitan Networks An Alternative to the Global City  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban decay',
      1 => 'germany',
      2 => 'multi-polar urbanism',
      3 => 'global city',
      4 => 'global city region',
      5 => 'history',
      6 => 'berlin',
      7 => 'hamburg',
      8 => 'frankfurt',
      9 => 'munich',
      10 => 'stuttgart',
      11 => 'cologne',
      12 => 'düssledorf',
      13 => 'city networks',
      14 => 'decentralisation',
    ),
  ),
  63 => 
  array (
    'slug' => sanitize_title("Berlin: A Profile "),
    'name' => 'Berlin: A Profile ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'berlin',
      1 => 'architecture',
      2 => 'urban decay',
      3 => 'history',
      4 => 'fragmentation',
      5 => 'regeneration',
      6 => 'economy',
      7 => 'culture',
      8 => 'social life',
      9 => 'squatting',
    ),
  ),
  64 => 
  array (
    'slug' => sanitize_title("Listening To The City "),
    'name' => 'Listening To The City ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'urban age overview',
    ),
    'tags' => 
    array (
      0 => 'berlin',
      1 => 'mexico city',
      2 => 'shanghai',
      3 => 'johannesburg',
      4 => 'redevelopment',
      5 => 'planning',
      6 => 'culture',
      7 => 'london',
      8 => 'literature',
      9 => 'kings cross',
      10 => 'zocalo',
      11 => 'mobility',
      12 => 'urban age',
    ),
  ),
  65 => 
  array (
    'slug' => sanitize_title("The Open City "),
    'name' => 'The Open City ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'urban age overview',
    ),
    'tags' => 
    array (
      0 => 'planning',
      1 => 'urban design',
      2 => 'le corbusier',
      3 => 'architecture',
      4 => '\'the brittle city\'',
      5 => 'urban decay',
      6 => 'urban renewal',
      7 => 'urban growth',
      8 => 'closed city',
      9 => 'open city',
      10 => 'jane jacobs',
      11 => 'diversity',
      12 => 'public space',
      13 => 'mobility',
      14 => 'incomplete form',
      15 => 'democracy',
      16 => 'participation',
      17 => 'london',
    ),
  ),
  66 => 
  array (
    'slug' => sanitize_title("Cities at the Intersection of New Histories "),
    'name' => 'Cities at the Intersection of New Histories ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'urban age overview',
    ),
    'tags' => 
    array (
      0 => 'economy',
      1 => 'city networks',
      2 => 'global circuits',
      3 => 'globalisation',
      4 => 'homogeneity',
      5 => 'diversity',
      6 => 'informality',
      7 => 'inequality',
      8 => 'right to the city',
    ),
  ),
  67 => 
  array (
    'slug' => sanitize_title("Moving People - Making City "),
    'name' => 'Moving People - Making City ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'urban age overview',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'transport',
      2 => 'cars',
      3 => 'london',
      4 => 'new york',
      5 => 'berlin',
      6 => 'cycling',
      7 => 'public transport',
      8 => 'shanghai',
      9 => 'mexico city',
      10 => 'johannesburg',
      11 => 'pedestrians',
      12 => 'housing',
      13 => 'ciudad neza',
      14 => 'soweto',
      15 => 'sustainability',
      16 => 'policy',
    ),
  ),
  68 => 
  array (
    'slug' => sanitize_title("Governance and Legal Structures "),
    'name' => 'Governance and Legal Structures ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'urban age overview',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'fragmentation',
      2 => 'participation',
      3 => 'democracy',
      4 => 'global city',
      5 => 'policy',
      6 => 'privatisation',
      7 => 'exclusion',
    ),
  ),
  69 => 
  array (
    'slug' => sanitize_title("Feeling the Urban Age "),
    'name' => 'Feeling the Urban Age ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'urban age overview',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'mexico city',
      2 => 'informality',
      3 => 'exclusion',
      4 => 'segregation',
      5 => 'planning',
      6 => 'governance',
      7 => 'johannesburg',
      8 => 'transport',
      9 => 'mobility',
      10 => 'new york',
      11 => 'diversity',
      12 => 'public space',
      13 => 'shanghai',
      14 => 'gated communities',
      15 => 'housing',
      16 => 'london',
      17 => 'retro-fitting',
    ),
  ),
  70 => 
  array (
    'slug' => sanitize_title("Is the Concept of Public Space Vanishing "),
    'name' => 'Is the Concept of Public Space Vanishing ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'urban age overview',
    ),
    'tags' => 
    array (
      0 => 'public space',
      1 => 'shanghai',
      2 => 'mexico city',
      3 => 'surveillance',
      4 => 'johannesburg',
      5 => 'security',
      6 => 'gated communities',
    ),
  ),
  71 => 
  array (
    'slug' => sanitize_title("The View From Outside "),
    'name' => 'The View From Outside ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'johannesburg',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'apartheid',
      2 => 'history',
      3 => 'gated communities',
      4 => 'regeneration',
      5 => 'south africa',
      6 => 'planning',
    ),
  ),
  72 => 
  array (
    'slug' => sanitize_title("Johannesburg A World Class African City "),
    'name' => 'Johannesburg A World Class African City ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'johannesburg',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'policy',
      2 => 'exclusion',
      3 => 'apartheid',
      4 => 'inclusion',
      5 => 'informality',
      6 => 'global city',
      7 => 'faraday taxi rank',
      8 => 'joburg 2030',
      9 => 'world class city',
    ),
  ),
  73 => 
  array (
    'slug' => sanitize_title("Housing Johannesburg "),
    'name' => 'Housing Johannesburg ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'johannesburg',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'housing',
      2 => 'segregation',
      3 => 'informality',
      4 => 'migrants',
      5 => 'regeneration',
      6 => 'gated communities',
    ),
  ),
  74 => 
  array (
    'slug' => sanitize_title("An Unlikely Global City  "),
    'name' => 'An Unlikely Global City  ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'johannesburg',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'economy',
      2 => 'globalisation',
      3 => 'informal economy',
      4 => 'joburg 2030',
    ),
  ),
  75 => 
  array (
    'slug' => sanitize_title("Transport As Justice "),
    'name' => 'Transport As Justice ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'johannesburg',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'transport',
      2 => 'transport policy',
      3 => 'public transport',
      4 => 'trains',
      5 => 'governance',
      6 => 'apartheid',
      7 => 'gautrain',
    ),
  ),
  76 => 
  array (
    'slug' => sanitize_title("Making Public Life "),
    'name' => 'Making Public Life ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'johannesburg',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'transport',
      2 => 'transport policy',
      3 => 'public transport',
      4 => 'trains',
      5 => 'governance',
      6 => 'apartheid',
      7 => 'gautrain',
    ),
  ),
  77 => 
  array (
    'slug' => sanitize_title("Towards A Eurpean Urban Form "),
    'name' => 'Towards A Eurpean Urban Form ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-05 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'german cities',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'polycentric urban system',
      2 => 'city network',
      3 => 'germany',
      4 => 'transport',
      5 => 'economy',
    ),
  ),
  78 => 
  array (
    'slug' => sanitize_title("The Luxury Of Emptiness "),
    'name' => 'The Luxury Of Emptiness ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-05 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'german cities',
    ),
    'tags' => 
    array (
      0 => 'urban decline',
      1 => 'shrinking cities',
      2 => 'germany',
      3 => 'halle',
      4 => 'public space',
      5 => '',
    ),
  ),
  79 => 
  array (
    'slug' => sanitize_title("Looking For The Future "),
    'name' => 'Looking For The Future ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-05 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'german cities',
    ),
    'tags' => 
    array (
      0 => 'germany',
      1 => 'demography',
      2 => 'urban decline',
      3 => 'shrinking cities',
      4 => 'transport',
      5 => 'global city',
      6 => 'berlin',
      7 => 'city network',
      8 => 'munich',
      9 => 'frankfurt',
      10 => 'economy',
    ),
  ),
  80 => 
  array (
    'slug' => sanitize_title("Germany: A Global Cities System? "),
    'name' => 'Germany: A Global Cities System? ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-05 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'german cities',
    ),
    'tags' => 
    array (
      0 => 'global city',
      1 => 'globalisation',
      2 => 'germany',
      3 => 'history',
      4 => 'frankfurt',
      5 => 'city network',
      6 => 'polycentric urban system',
      7 => 'economy',
    ),
  ),
  81 => 
  array (
    'slug' => sanitize_title("Urban Networks On The Move "),
    'name' => 'Urban Networks On The Move ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-05 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'german cities',
    ),
    'tags' => 
    array (
      0 => 'european city',
      1 => 'postmodernism?',
      2 => 'suburbia',
      3 => 'redevelopment',
      4 => 'reurbanisation',
    ),
  ),
  82 => 
  array (
    'slug' => sanitize_title("City design - a new planning paradigm "),
    'name' => 'City design - a new planning paradigm ',
    'format' => 'text',
    'type' => 'discussion paper ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'general',
    ),
    'tags' => 
    array (
      0 => 'european city',
      1 => 'postmodernism?',
      2 => 'suburbia',
      3 => 'redevelopment',
      4 => 'reurbanisation',
    ),
  ),
  83 => 
  array (
    'slug' => sanitize_title("The Complexities of Change "),
    'name' => 'The Complexities of Change ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'economic role',
      2 => 'structural transformation',
      3 => 'economic profile',
      4 => 'labour force',
      5 => 'urban services',
      6 => 'challenges',
    ),
  ),
  84 => 
  array (
    'slug' => sanitize_title("Back From The Brink "),
    'name' => 'Back From The Brink ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'growth',
      2 => 'urban sprawl',
      3 => 'population',
      4 => 'challenges',
      5 => 'air pollution',
      6 => 'water',
      7 => 'governance',
      8 => '',
    ),
  ),
  85 => 
  array (
    'slug' => sanitize_title("The Breathing Spaces of The City "),
    'name' => 'The Breathing Spaces of The City ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'public space',
      2 => 'chapultepec',
      3 => 'civil society',
      4 => 'strategy',
      5 => 'vision',
      6 => 'cultural space',
      7 => '',
    ),
  ),
  86 => 
  array (
    'slug' => sanitize_title("More Housing or a Better City? "),
    'name' => 'More Housing or a Better City? ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'housing',
      2 => 'policy',
      3 => 'land-use policy',
      4 => 'governance',
      5 => 'housing policy',
      6 => 'low-income housing',
      7 => '',
    ),
  ),
  87 => 
  array (
    'slug' => sanitize_title("The Informal Economy as a Way of Life "),
    'name' => 'The Informal Economy as a Way of Life ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'informal economy',
      2 => 'scale',
      3 => 'scope',
      4 => 'attitudes',
      5 => 'statistics',
      6 => 'impact of informal economy',
      7 => '',
    ),
  ),
  88 => 
  array (
    'slug' => sanitize_title("Governing The Mega City "),
    'name' => 'Governing The Mega City ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'governance',
      2 => 'long term vision',
      3 => 'metropolitan strategy',
      4 => 'poor governance',
      5 => 'reform',
      6 => '',
    ),
  ),
  89 => 
  array (
    'slug' => sanitize_title("Congestion At The Limits? "),
    'name' => 'Congestion At The Limits? ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'mobility',
      2 => 'transport',
      3 => 'traffic congestion',
      4 => 'transport policy',
      5 => 'transport projects',
      6 => 'car ownership',
      7 => 'public transport',
      8 => 'transport infrastructure',
      9 => 'cycling',
      10 => 'public bus system',
    ),
  ),
  90 => 
  array (
    'slug' => sanitize_title("Linkages Between Formal and Informal Processes "),
    'name' => 'Linkages Between Formal and Informal Processes ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'informality',
      1 => 'informal economy',
      2 => 'squatter settlements',
      3 => 'informal housing',
      4 => 'formal planning',
      5 => 'street vendors',
      6 => 'hawkers',
      7 => 'road space',
      8 => '',
    ),
  ),
  91 => 
  array (
    'slug' => sanitize_title("A Mexico Reflection "),
    'name' => 'A Mexico Reflection ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'olympic games',
      2 => 'earthquake',
      3 => 'economic crisis',
      4 => 'centre vs periphery',
    ),
  ),
  92 => 
  array (
    'slug' => sanitize_title("Mexico City In The 21st Century "),
    'name' => 'Mexico City In The 21st Century ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'global city',
      2 => 'urban economy',
      3 => 'land use',
      4 => 'santa fe',
      5 => 'socio-spatial segregation',
      6 => 'employment pattern',
      7 => 'urban transformation',
      8 => 'real estate development',
      9 => 'centre revitalization',
      10 => 'centrality',
      11 => '',
    ),
  ),
  93 => 
  array (
    'slug' => sanitize_title("Mexico City\'s Socio-Cultural Development  "),
    'name' => 'Mexico City\'s Socio-Cultural Development  ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2006-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'socio-cultural development',
      2 => 'historical city',
      3 => 'industrialization',
      4 => 'globalization',
      5 => 'culture',
      6 => '',
    ),
  ),
  94 => 
  array (
    'slug' => sanitize_title("The European City Model and Its Critics "),
    'name' => 'The European City Model and Its Critics ',
    'format' => 'text',
    'type' => 'discussion paper ',
    'date' => '2006-01 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'general',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'socio-cultural development',
      2 => 'historical city',
      3 => 'industrialization',
      4 => 'globalization',
      5 => 'culture',
      6 => '',
    ),
  ),
  95 => 
  array (
    'slug' => sanitize_title("Was New York Alright? Almost "),
    'name' => 'Was New York Alright? Almost ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-Sum ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'planning',
      2 => 'urban age',
      3 => '',
    ),
  ),
  96 => 
  array (
    'slug' => sanitize_title("Civility  "),
    'name' => 'Civility  ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-Sum ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'class difference',
      1 => 'cultural difference',
      2 => 'history of jews',
    ),
  ),
  97 => 
  array (
    'slug' => sanitize_title("The Deep Economic History Of Place: It Matters "),
    'name' => 'The Deep Economic History Of Place: It Matters ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-Sum ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'economc history',
      1 => 'global cities',
      2 => 'urban age',
      3 => 'economy',
      4 => 'information technologies',
    ),
  ),
  98 => 
  array (
    'slug' => sanitize_title("Empowering The City: London/New York "),
    'name' => 'Empowering The City: London/New York ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-Sum ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'city government',
      1 => 'london',
      2 => 'new york',
      3 => 'greater london authority',
      4 => 'city government powers',
      5 => 'urban age',
      6 => 'transport',
      7 => 'city planning',
      8 => 'london plan',
    ),
  ),
  99 => 
  array (
    'slug' => sanitize_title("Power: Shanghai, New York, London "),
    'name' => 'Power: Shanghai, New York, London ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-Ath ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'london',
      2 => 'shanghai',
      3 => 'power',
      4 => 'government',
      5 => 'global city',
      6 => 'decision making',
      7 => 'empowering cities',
    ),
  ),
  100 => 
  array (
    'slug' => sanitize_title("Signalling Changes "),
    'name' => 'Signalling Changes ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-Ath ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'transformation',
      2 => 'architecture',
      3 => 'skyline',
      4 => 'skyscrapers',
      5 => 'city visioning',
      6 => 'symbolism',
      7 => 'london',
      8 => 'new york',
      9 => 'architectural symbolism',
      10 => '',
    ),
  ),
  101 => 
  array (
    'slug' => sanitize_title("Shanghai Transformations "),
    'name' => 'Shanghai Transformations ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-Ath ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'n/a',
    ),
  ),
  102 => 
  array (
    'slug' => sanitize_title("Cityness In The Urban Age "),
    'name' => 'Cityness In The Urban Age ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-Ath ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'urbanism',
      2 => 'urbanity',
      3 => 'western constructs',
      4 => 'cityness',
      5 => 'lagos',
      6 => 'new york',
      7 => 'london',
      8 => 'chicago',
      9 => 'public space',
      10 => 'making',
      11 => '',
    ),
  ),
  103 => 
  array (
    'slug' => sanitize_title("Has Planning Forgotten About Design "),
    'name' => 'Has Planning Forgotten About Design ',
    'format' => 'text',
    'type' => 'discussion paper ',
    'date' => '2005-12 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'general',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'urbanism',
      2 => 'urbanity',
      3 => 'western constructs',
      4 => 'cityness',
      5 => 'lagos',
      6 => 'new york',
      7 => 'london',
      8 => 'chicago',
      9 => 'public space',
      10 => 'making',
      11 => '',
    ),
  ),
  104 => 
  array (
    'slug' => sanitize_title("The New Urban Visions of London: Is safety in public space the major issue? "),
    'name' => 'The New Urban Visions of London: Is safety in public space the major issue? ',
    'format' => 'text',
    'type' => 'reflection paper ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'safety',
      1 => 'public space',
      2 => 'security',
      3 => 'london',
      4 => 'crime',
      5 => 'policies',
      6 => 'elephant and castle',
      7 => 'lower lea valley',
      8 => 'regeneration',
      9 => 'planners',
      10 => 'city',
      11 => 'olympics',
    ),
  ),
  105 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'transport',
      2 => 'mobility',
      3 => 'transport history',
      4 => 'cities',
      5 => 'public transport',
    ),
  ),
  106 => 
  array (
    'slug' => sanitize_title("London Visions "),
    'name' => 'London Visions ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'history',
      2 => 'planning',
    ),
  ),
  107 => 
  array (
    'slug' => sanitize_title("Governing The Ungovernable? "),
    'name' => 'Governing The Ungovernable? ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'ken livingstone',
      2 => 'government',
      3 => 'visions',
      4 => 'policy',
      5 => 'planning',
    ),
  ),
  108 => 
  array (
    'slug' => sanitize_title("Accommodating Growth or Conflict? "),
    'name' => 'Accommodating Growth or Conflict? ',
    'format' => 'text',
    'type' => 'reflection paper ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'housing',
      2 => 'growth',
      3 => 'policies',
      4 => 'design',
    ),
  ),
  109 => 
  array (
    'slug' => sanitize_title("Expanding the City Core "),
    'name' => 'Expanding the City Core ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'economic',
      2 => 'development',
      3 => 'policies',
      4 => 'economy',
      5 => 'office economy',
      6 => 'growth',
      7 => 'planning',
      8 => 'office development',
    ),
  ),
  110 => 
  array (
    'slug' => sanitize_title("Delivering Urban Governance In London "),
    'name' => 'Delivering Urban Governance In London ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'urban governance',
      2 => 'urban',
      3 => 'design',
      4 => 'urban decision making',
      5 => 'policy',
      6 => 'public/private',
      7 => 'partnership',
      8 => 'government',
      9 => 'community',
      10 => 'the greater london authority',
    ),
  ),
  111 => 
  array (
    'slug' => sanitize_title("Design and Measurement "),
    'name' => 'Design and Measurement ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'urban design',
      1 => 'cities',
      2 => 'architecture',
      3 => 'urban age',
      4 => '',
    ),
  ),
  112 => 
  array (
    'slug' => sanitize_title("King\'s Cross-Roads "),
    'name' => 'King\'s Cross-Roads ',
    'format' => 'text',
    'type' => 'bulletin essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross',
      1 => 'london',
    ),
  ),
  113 => 
  array (
    'slug' => sanitize_title("Towards A European City Model? "),
    'name' => 'Towards A European City Model? ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'european',
      1 => 'city',
      2 => 'transformation',
    ),
  ),
  114 => 
  array (
    'slug' => sanitize_title("Changing Values "),
    'name' => 'Changing Values ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-11 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'public space',
      2 => '',
    ),
  ),
  115 => 
  array (
    'slug' => sanitize_title("The Speed and The Friction "),
    'name' => 'The Speed and The Friction ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'growth',
      2 => 'speed of growth',
      3 => 'development',
      4 => 'history',
      5 => '',
    ),
  ),
  116 => 
  array (
    'slug' => sanitize_title("Faster But Further "),
    'name' => 'Faster But Further ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'transport',
      2 => 'transformation',
      3 => 'statistics',
      4 => 'cars',
      5 => 'rail',
      6 => 'land-use policies',
      7 => 'urban sprawl',
      8 => 'cycling',
      9 => 'walking',
      10 => 'non-motorized transport',
    ),
  ),
  117 => 
  array (
    'slug' => sanitize_title("Living With the Future "),
    'name' => 'Living With the Future ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-07 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'social landscape',
      2 => 'migrants',
      3 => 'labour market',
      4 => 'economic development',
      5 => 'economic growth',
      6 => 'services',
      7 => 'manufacturing',
      8 => 'strategic planning',
      9 => 'housing',
      10 => '',
    ),
  ),
  118 => 
  array (
    'slug' => sanitize_title("Understanding The City "),
    'name' => 'Understanding The City ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'urban age',
      2 => 'london',
      3 => 'economy',
      4 => 'jobs',
      5 => 'labour market',
      6 => 'public transport',
      7 => 'housing',
      8 => 'ethnic minorities',
      9 => 'high density',
      10 => 'low density',
    ),
  ),
  119 => 
  array (
    'slug' => sanitize_title("Feeling Safe In The City "),
    'name' => 'Feeling Safe In The City ',
    'format' => 'text',
    'type' => 'newspaper essay ',
    'date' => '2005-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'civility\'',
      1 => 'safety',
      2 => 'policing',
    ),
  ),
  120 => 
  array (
    'slug' => sanitize_title("The Resurgence of Urban Centralities: A Look at Contemporary New York "),
    'name' => 'The Resurgence of Urban Centralities: A Look at Contemporary New York ',
    'format' => 'text',
    'type' => 'reflection paper ',
    'date' => '2005-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urbanisation',
      1 => 'urban growth',
      2 => 'american cities',
      3 => 'new york growth',
      4 => 'inequalities',
      5 => 'economy',
      6 => 'restructuring of cities',
      7 => 'knowledge based economy',
      8 => 'new york\'s economy',
      9 => 'high urban densities',
      10 => 'innovation',
      11 => 'employment',
      12 => 'creative industries',
      13 => 'manufacturing',
      14 => 'labour market',
      15 => 'creativity strategies',
      16 => 'new york\'s attractiveness',
      17 => 'globalisation',
      18 => 'low-wage workers',
      19 => 'long term unemployment',
      20 => 'design',
      21 => 'architecture',
      22 => 'architectural symbolism',
      23 => 'design functionality',
      24 => 'urban design',
      25 => 'cotemporary office space',
      26 => 'urban space',
      27 => '',
    ),
  ),
  121 => 
  array (
    'slug' => sanitize_title("Travelling Less, Living Better, Who Pays?  "),
    'name' => 'Travelling Less, Living Better, Who Pays?  ',
    'format' => 'text',
    'type' => 'reflection paper ',
    'date' => '2005-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'urban transport',
      2 => 'public transport',
      3 => 'sustainable transport',
      4 => 'manhattan',
      5 => 'energy consumption',
      6 => 'new york\'s transport system',
      7 => 'new york\'s transport conflicts',
      8 => 'new york\'s transport objectives',
      9 => 'pedestrian open space',
      10 => 'transport developments',
      11 => 'visionary thinking',
      12 => 'cycling',
      13 => 'commuters',
      14 => 'financing public transport',
      15 => 'transit system',
      16 => 'investment',
      17 => 'land value taxation',
      18 => 'urban economy',
      19 => 'transport planning',
      20 => 'transport capacity',
      21 => 'infrastructure',
      22 => 'urban age',
      23 => 'transport development',
    ),
  ),
  122 => 
  array (
    'slug' => sanitize_title("Feeling Safe in the Crowd "),
    'name' => 'Feeling Safe in the Crowd ',
    'format' => 'text',
    'type' => 'reflection paper ',
    'date' => '2005-02 ',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'security',
      1 => 'safety',
      2 => 'public space',
      3 => 'new york',
      4 => 'terrorism',
      5 => 'surveillence',
      6 => 'crime',
      7 => 'policing',
      8 => 'design',
      9 => 'militarisation of urban public space',
      10 => 'commercialisation of public space',
      11 => 'public and private sector',
      12 => '',
    ),
  ),
  123 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'security',
      1 => 'safety',
      2 => 'public space',
      3 => 'new york',
      4 => 'terrorism',
      5 => 'surveillence',
      6 => 'crime',
      7 => 'policing',
      8 => 'design',
      9 => 'militarisation of urban public space',
      10 => 'commercialisation of public space',
      11 => 'public and private sector',
      12 => '',
    ),
  ),
  124 => 
  array (
    'slug' => sanitize_title("Urban Age Project"),
    'name' => 'Urban Age Project',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'security',
      1 => 'safety',
      2 => 'public space',
      3 => 'new york',
      4 => 'terrorism',
      5 => 'surveillence',
      6 => 'crime',
      7 => 'policing',
      8 => 'design',
      9 => 'militarisation of urban public space',
      10 => 'commercialisation of public space',
      11 => 'public and private sector',
      12 => '',
    ),
  ),
  125 => 
  array (
    'slug' => sanitize_title("The Urban Age Context"),
    'name' => 'The Urban Age Context',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '10min?',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'security',
      1 => 'safety',
      2 => 'public space',
      3 => 'new york',
      4 => 'terrorism',
      5 => 'surveillence',
      6 => 'crime',
      7 => 'policing',
      8 => 'design',
      9 => 'militarisation of urban public space',
      10 => 'commercialisation of public space',
      11 => 'public and private sector',
      12 => '',
    ),
  ),
  126 => 
  array (
    'slug' => sanitize_title("Urban Age Cities"),
    'name' => 'Urban Age Cities',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:20:32',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'culture',
      1 => 'identity',
      2 => 'participation',
      3 => 'inclusion',
      4 => 'exclusion',
      5 => 'community',
      6 => 'partnership',
    ),
  ),
  127 => 
  array (
    'slug' => sanitize_title("Speaking Urbanism from Africa"),
    'name' => 'Speaking Urbanism from Africa',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:16:43',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'africa',
      1 => 'urban theory',
      2 => 'governance',
      3 => 'development',
      4 => 'poverty',
      5 => 'informality',
      6 => 'slums',
      7 => 'inclusion',
      8 => 'exclusion',
      9 => 'economy',
    ),
  ),
  128 => 
  array (
    'slug' => sanitize_title("Johannesburg, World Class African City"),
    'name' => 'Johannesburg, World Class African City',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:14:10',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'policy',
      2 => 'inclusion',
      3 => 'soweto',
      4 => 'segregation',
      5 => 'housing',
      6 => 'history',
      7 => 'demography',
      8 => 'economy',
      9 => 'inequality',
      10 => 'governance',
      11 => 'global city region',
    ),
  ),
  129 => 
  array (
    'slug' => sanitize_title("Introduction Session"),
    'name' => 'Introduction Session',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:42:48',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'policy',
      2 => 'inclusion',
      3 => 'soweto',
      4 => 'segregation',
      5 => 'housing',
      6 => 'history',
      7 => 'demography',
      8 => 'economy',
      9 => 'inequality',
      10 => 'governance',
      11 => 'global city region',
    ),
  ),
  130 => 
  array (
    'slug' => sanitize_title("US Cities"),
    'name' => 'US Cities',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:42:48',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'policy',
      2 => 'inclusion',
      3 => 'soweto',
      4 => 'segregation',
      5 => 'housing',
      6 => 'history',
      7 => 'demography',
      8 => 'economy',
      9 => 'inequality',
      10 => 'governance',
      11 => 'global city region',
    ),
  ),
  131 => 
  array (
    'slug' => sanitize_title("Sao Paulo"),
    'name' => 'Sao Paulo',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:14:08',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'history',
      2 => 'migration',
      3 => 'immigration',
      4 => 'multiculturalism',
      5 => 'crime',
      6 => 'security',
      7 => 'organised crime',
      8 => 'culture',
      9 => 'favelas',
      10 => 'slums',
      11 => 'segregation',
      12 => 'race',
      13 => 'identity',
    ),
  ),
  132 => 
  array (
    'slug' => sanitize_title("Johannesburg "),
    'name' => 'Johannesburg ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:14:48',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'migrants',
      2 => 'migration',
      3 => 'immigration',
      4 => 'mobility',
      5 => 'diversity',
      6 => 'multiculturalism',
      7 => 'public space',
      8 => 'citizenship',
      9 => 'culture',
      10 => 'identity',
    ),
  ),
  133 => 
  array (
    'slug' => sanitize_title("Cities Accomodating Difference"),
    'name' => 'Cities Accomodating Difference',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:27:57',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'migrants',
      2 => 'migration',
      3 => 'immigration',
      4 => 'mobility',
      5 => 'diversity',
      6 => 'multiculturalism',
      7 => 'public space',
      8 => 'citizenship',
      9 => 'culture',
      10 => 'identity',
    ),
  ),
  134 => 
  array (
    'slug' => sanitize_title("Johannesburg\'s Economies: Globally Competitive, Locally Integrated?"),
    'name' => 'Johannesburg\'s Economies: Globally Competitive, Locally Integrated?',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:03:59',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'globalisation',
      2 => 'global city region',
    ),
  ),
  135 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:10:54',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'global economy',
      1 => 'globalisation',
      2 => 'informal economy',
      3 => 'informality',
      4 => 'networks of cities',
      5 => '',
    ),
  ),
  136 => 
  array (
    'slug' => sanitize_title("Alexandra.s Labour Force"),
    'name' => 'Alexandra.s Labour Force',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:18:53',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'alexandra township',
      1 => 'employment',
      2 => 'economy',
      3 => 'regeneration',
      4 => 'development',
      5 => 'shopping malls',
    ),
  ),
  137 => 
  array (
    'slug' => sanitize_title("The Transformation of the Central Business District"),
    'name' => 'The Transformation of the Central Business District',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:14:35',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'cbd',
      2 => 'real estate',
      3 => 'business',
      4 => 'economy',
      5 => 'property development',
      6 => 'suburbs',
      7 => 'soweto',
      8 => 'shopping malls',
      9 => 'housing',
      10 => 'economy',
      11 => 'regeneration',
    ),
  ),
  138 => 
  array (
    'slug' => sanitize_title("Labour Markets and Work Places"),
    'name' => 'Labour Markets and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:05:21',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'alexandra',
      2 => 'mexico',
      3 => 'economy',
      4 => 'labour market',
      5 => 'jobs',
      6 => 'informal economy',
      7 => 'apartheid',
    ),
  ),
  139 => 
  array (
    'slug' => sanitize_title("Labour Markets and Work Places"),
    'name' => 'Labour Markets and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:21',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'employment',
      2 => 'inclusion',
      3 => 'solidarity',
      4 => 'public space',
      5 => 'informality',
      6 => 'slums',
      7 => 'world city',
    ),
  ),
  140 => 
  array (
    'slug' => sanitize_title("Labour Markets and Work Places"),
    'name' => 'Labour Markets and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:03:34',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'offices',
      2 => 'work',
      3 => 'development',
    ),
  ),
  141 => 
  array (
    'slug' => sanitize_title("Labour Markets and Work Places"),
    'name' => 'Labour Markets and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:04:05',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'informality',
      2 => 'planning',
      3 => 'development',
      4 => 'business',
      5 => 'solidarity',
      6 => 'inclusion',
      7 => 'participation',
      8 => 'regeneration',
    ),
  ),
  142 => 
  array (
    'slug' => sanitize_title("Labour Markets and Work Places"),
    'name' => 'Labour Markets and Work Places',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:44:49',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'informality',
      2 => 'planning',
      3 => 'development',
      4 => 'business',
      5 => 'solidarity',
      6 => 'inclusion',
      7 => 'participation',
      8 => 'regeneration',
    ),
  ),
  143 => 
  array (
    'slug' => sanitize_title("Governance and the City"),
    'name' => 'Governance and the City',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:44:49',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'informality',
      2 => 'planning',
      3 => 'development',
      4 => 'business',
      5 => 'solidarity',
      6 => 'inclusion',
      7 => 'participation',
      8 => 'regeneration',
    ),
  ),
  144 => 
  array (
    'slug' => sanitize_title("Introduction"),
    'name' => 'Introduction',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:12:09',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'governance',
      2 => 'local government',
      3 => 'planning',
      4 => 'redistribution',
      5 => 'city networks',
      6 => 'global city region',
      7 => 'south african cities network',
    ),
  ),
  145 => 
  array (
    'slug' => sanitize_title("Governance and the City"),
    'name' => 'Governance and the City',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:12:09',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'governance',
      2 => 'local government',
      3 => 'planning',
      4 => 'redistribution',
      5 => 'city networks',
      6 => 'global city region',
      7 => 'south african cities network',
    ),
  ),
  146 => 
  array (
    'slug' => sanitize_title("Governance and the City"),
    'name' => 'Governance and the City',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:12:09',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'governance',
      2 => 'local government',
      3 => 'planning',
      4 => 'redistribution',
      5 => 'city networks',
      6 => 'global city region',
      7 => 'south african cities network',
    ),
  ),
  147 => 
  array (
    'slug' => sanitize_title("Governance and the City"),
    'name' => 'Governance and the City',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:00',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'washington d.c.',
      2 => 'history',
      3 => 'local government',
      4 => 'redistribution',
      5 => 'education',
    ),
  ),
  148 => 
  array (
    'slug' => sanitize_title("Governance and the City"),
    'name' => 'Governance and the City',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:27',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'bogotá',
      1 => 'local government',
      2 => 'governance',
      3 => 'good governance',
      4 => 'santiago',
      5 => 'redistribution',
      6 => 'equality',
    ),
  ),
  149 => 
  array (
    'slug' => sanitize_title("Governance and the City"),
    'name' => 'Governance and the City',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:05:55',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'governance',
      2 => 'local government',
      3 => 'decentralisation',
      4 => 'planning',
      5 => 'south african cities network',
    ),
  ),
  150 => 
  array (
    'slug' => sanitize_title("Governance and the City"),
    'name' => 'Governance and the City',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '07/07/2006',
    'language2' => 'English',
    'running_time' => '00:05:23',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'south africa',
      2 => 'local government',
      3 => 'joburg 2030',
      4 => 'governance',
      5 => 'democracy',
      6 => 'global city',
    ),
  ),
  151 => 
  array (
    'slug' => sanitize_title("Transport as Justice"),
    'name' => 'Transport as Justice',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:10',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'transport',
      2 => 'inclusion',
      3 => 'segregation',
    ),
  ),
  152 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:17:29',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'bogotá',
      1 => 'johannesburg',
      2 => 'equality',
      3 => 'transport',
      4 => 'mobility',
      5 => 'social justice',
      6 => 'public space',
      7 => 'education',
      8 => 'public transport',
      9 => 'cycling',
      10 => 'buses',
      11 => 'no car day',
      12 => 'transmilenio',
      13 => 'density',
      14 => 'pedestrians',
      15 => 'cars',
    ),
  ),
  153 => 
  array (
    'slug' => sanitize_title("Equal access to transport"),
    'name' => 'Equal access to transport',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:18:33',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'transport',
      2 => 'apartheid',
      3 => 'density',
      4 => 'exclusion',
      5 => 'inclusion',
      6 => 'south africa',
      7 => 'mobility',
      8 => 'inequality',
      9 => 'public transport',
      10 => 'buses',
      11 => 'pedestrians',
      12 => 'policy',
      13 => 'joburg 2030',
      14 => 'global city',
      15 => 'integrated transport plan',
      16 => 'buses',
      17 => 'governance',
      18 => 'gautrain',
      19 => 'participation',
    ),
  ),
  154 => 
  array (
    'slug' => sanitize_title("Transport nodes and critical social space "),
    'name' => 'Transport nodes and critical social space ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:14:59',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'transport',
      2 => 'public transport',
      3 => 'policy',
      4 => 'governance',
      5 => 'buses',
      6 => 'cars',
      7 => 'gautrain',
    ),
  ),
  155 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:09:09',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'equality',
      2 => 'cars',
      3 => 'pedestrians',
      4 => 'road safety',
      5 => 'mobility',
      6 => 'transport planning',
      7 => 'inclusion',
    ),
  ),
  156 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:36',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'gauteng',
      2 => 'transport',
      3 => 'security',
      4 => 'law enforcement',
      5 => 'violence',
      6 => 'cycling',
      7 => 'metrorail',
      8 => 'gautrain',
      9 => 'railways',
      10 => 'roads',
      11 => '',
    ),
  ),
  157 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:36',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'gauteng',
      2 => 'transport',
      3 => 'security',
      4 => 'law enforcement',
      5 => 'violence',
      6 => 'cycling',
      7 => 'metrorail',
      8 => 'gautrain',
      9 => 'railways',
      10 => 'roads',
      11 => '',
    ),
  ),
  158 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:09:49',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'transport',
      2 => 'social justice',
      3 => 'public transport',
      4 => 'time poverty',
      5 => 'road safety',
      6 => 'public health',
      7 => 'inclusion',
      8 => 'mobility',
    ),
  ),
  159 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:04:46',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'transport',
      2 => 'development',
      3 => 'diversity',
      4 => 'public transport',
      5 => 'taxis',
      6 => 'informality',
      7 => '',
    ),
  ),
  160 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:31',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'gauteng',
      2 => 'cars',
      3 => 'transport',
      4 => 'taxis',
      5 => 'governance',
      6 => 'transport planning',
      7 => '',
    ),
  ),
  161 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:03:37',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'bogotá',
      2 => 'gautrain',
    ),
  ),
  162 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:34:41',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'bogotá',
      2 => 'gautrain',
    ),
  ),
  163 => 
  array (
    'slug' => sanitize_title("Making City in the Post-Apartheid Metropolis"),
    'name' => 'Making City in the Post-Apartheid Metropolis',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:34:41',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'bogotá',
      2 => 'gautrain',
    ),
  ),
  164 => 
  array (
    'slug' => sanitize_title("City space and safety strategy"),
    'name' => 'City space and safety strategy',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:16:30',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'public space',
      2 => 'democracy',
      3 => 'social cohesion',
      4 => 'social interaction',
      5 => 'informal economy',
      6 => 'crime',
      7 => 'gated communities',
      8 => 'segregation',
      9 => 'cars',
      10 => 'transport',
      11 => 'informality',
      12 => 'safety',
      13 => 'security',
      14 => 'demography?',
      15 => 'management',
      16 => 'exclusion',
    ),
  ),
  165 => 
  array (
    'slug' => sanitize_title("Re-imagining the city: Public space in contemporary Johannesburg "),
    'name' => 'Re-imagining the city: Public space in contemporary Johannesburg ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:16:22',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'public space',
      2 => 'architecture',
      3 => 'apartheid',
      4 => 'streets',
      5 => 'parks',
      6 => 'social life',
      7 => 'exclusion',
      8 => 'walter sisulu square',
      9 => 'metro mall',
      10 => 'faraday market',
      11 => 'zoo lake',
      12 => 'soweto',
      13 => 'alexandra',
      14 => 'consumerism',
      15 => 'gated communities',
    ),
  ),
  166 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:07:42',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'security',
      2 => 'safety',
      3 => 'democracy',
      4 => 'crime',
      5 => 'violence',
      6 => 'france',
      7 => 'são paulo',
      8 => 'public space',
    ),
  ),
  167 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:05:41',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'joburg 2030',
      2 => 'safety',
      3 => 'crime',
      4 => 'security',
      5 => 'policing',
      6 => 'local government',
      7 => 'urban design',
      8 => 'management',
    ),
  ),
  168 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:03:57',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'walking',
      2 => 'pedestrians',
      3 => 'cars',
      4 => 'mobility',
      5 => 'inclusion',
    ),
  ),
  169 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:28',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'crime',
      1 => 'south africa',
      2 => 'violence',
      3 => 'integrated planning',
      4 => 'policing',
    ),
  ),
  170 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:33:34',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'crime',
      1 => 'south africa',
      2 => 'violence',
      3 => 'integrated planning',
      4 => 'policing',
    ),
  ),
  171 => 
  array (
    'slug' => sanitize_title("Quality Housing"),
    'name' => 'Quality Housing',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:37',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'housing',
      2 => 'housing policy',
    ),
  ),
  172 => 
  array (
    'slug' => sanitize_title("The city.s housing challenge"),
    'name' => 'The city.s housing challenge',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:19:08',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'housing',
      2 => 'housing policy',
      3 => 'housing market',
      4 => 'migration',
      5 => 'hostels',
      6 => 'rental/ownership',
      7 => 'joburg 2030',
      8 => 'sustainability',
    ),
  ),
  173 => 
  array (
    'slug' => sanitize_title("Building inclusive urban neighbourhoods"),
    'name' => 'Building inclusive urban neighbourhoods',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:12:16',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'housing',
      2 => 'housing market',
      3 => 'brickfields',
      4 => 'melrose arch',
      5 => 'gated community',
      6 => 'hillbrow',
      7 => 'akaya neighbourhood project',
      8 => 'slum upgrading',
      9 => 'community',
      10 => 'architecture',
    ),
  ),
  174 => 
  array (
    'slug' => sanitize_title("Housing and Urban Neighbourhoods"),
    'name' => 'Housing and Urban Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:57',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'segregation',
      1 => 'housing',
      2 => 'governance',
      3 => 'inclusion',
      4 => 'sprawl/density',
      5 => 'london',
      6 => 'mexico city',
      7 => 'housing policy',
      8 => 'planning',
      9 => 'hope 6 (?)',
    ),
  ),
  175 => 
  array (
    'slug' => sanitize_title("Housing and Urban Neighbourhoods"),
    'name' => 'Housing and Urban Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:05:14',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'community',
    ),
  ),
  176 => 
  array (
    'slug' => sanitize_title("Housing and Urban Neighbourhoods"),
    'name' => 'Housing and Urban Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:06:36',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'governance',
      2 => 'infrastructure',
      3 => 'planning',
      4 => 'alexandra',
      5 => 'housing market',
      6 => 'social inclusion',
    ),
  ),
  177 => 
  array (
    'slug' => sanitize_title("Housing and Urban Neighbourhoods"),
    'name' => 'Housing and Urban Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:04:18',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'johannesburg',
      2 => 'redevelopment',
      3 => 'property market',
    ),
  ),
  178 => 
  array (
    'slug' => sanitize_title("Housing and Urban Neighbourhoods"),
    'name' => 'Housing and Urban Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:08:01',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'homelessness',
      1 => 'johannesburg',
      2 => 'informal housing',
      3 => 'development',
      4 => 'displacement',
    ),
  ),
  179 => 
  array (
    'slug' => sanitize_title("Housing and Urban Neighbourhoods"),
    'name' => 'Housing and Urban Neighbourhoods',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:08:01',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'homelessness',
      1 => 'johannesburg',
      2 => 'informal housing',
      3 => 'development',
      4 => 'displacement',
    ),
  ),
  180 => 
  array (
    'slug' => sanitize_title("An academic reflection"),
    'name' => 'An academic reflection',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:08:01',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'homelessness',
      1 => 'johannesburg',
      2 => 'informal housing',
      3 => 'development',
      4 => 'displacement',
    ),
  ),
  181 => 
  array (
    'slug' => sanitize_title("A practical reflection"),
    'name' => 'A practical reflection',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:07:01',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'johannesburg',
      2 => 'south africa',
      3 => 'capitalism',
      4 => 'povernment',
      5 => 'policy',
      6 => 'crime',
      7 => 'race',
    ),
  ),
  182 => 
  array (
    'slug' => sanitize_title("A political reflection"),
    'name' => 'A political reflection',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2006',
    'language2' => 'English',
    'running_time' => '00:04:56',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'usa',
      1 => 'south africa',
      2 => 'apartheid',
      3 => 'urban age',
      4 => 'city-ness',
      5 => 'globalisation',
      6 => 'migration',
      7 => 'inequality',
    ),
  ),
  183 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:04:56',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'terrorism',
    ),
  ),
  184 => 
  array (
    'slug' => sanitize_title("Urban Age Project: The story so far"),
    'name' => 'Urban Age Project: The story so far',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:13:13',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'lse cities program',
      2 => 'themes',
      3 => 'housing labour markets',
      4 => 'transport',
      5 => 'public space',
      6 => 'physical and social',
      7 => 'problems of cities',
      8 => 'sessions',
    ),
  ),
  185 => 
  array (
    'slug' => sanitize_title("Urban Age Project: The story so far"),
    'name' => 'Urban Age Project: The story so far',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:06:27',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'liveable cities',
      1 => 'mistakes',
      2 => 'shanghai',
      3 => 'physical',
      4 => 'social',
    ),
  ),
  186 => 
  array (
    'slug' => sanitize_title("Shanghai"),
    'name' => 'Shanghai',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English; Chinese',
    'running_time' => '00:15.51',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'history',
      1 => 'shanghai',
      2 => 'urban form',
      3 => 'culture',
      4 => 'architecture',
      5 => 'urban development',
      6 => 'city centre',
      7 => 'open policy',
      8 => 'pondu?',
      9 => 'masterplan',
      10 => 'sub-centres',
      11 => 'land-use',
      12 => 'railway',
      13 => 'mass transit',
      14 => 'highway',
      15 => 'green system',
      16 => 'export',
      17 => 'historical buildings',
      18 => 'preservation',
      19 => 'tranformation',
    ),
  ),
  187 => 
  array (
    'slug' => sanitize_title("New York"),
    'name' => 'New York',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English; Chinese',
    'running_time' => '00:21.09',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'successes',
      2 => 'crime reduction',
      3 => 'home ownership demand',
      4 => 'transportation',
      5 => 'ethnic/racial tensions',
      6 => 'homelessness',
      7 => 'challenges',
      8 => 'market share loss',
      9 => 'employment',
      10 => 'residential demand',
      11 => 'mass transit',
      12 => 'surface transportation',
      13 => 'education',
      14 => 'business continuity',
      15 => 'threats',
      16 => 'national resources',
      17 => 'cost of living',
      18 => 'priorities',
      19 => 'physical developments',
      20 => '5 borough strategy',
      21 => 'projects',
      22 => 'manhattan',
      23 => 'world trade centre site',
      24 => 'redevelopment',
      25 => 'east river waterfront',
      26 => 'mid-west side manhattan',
      27 => 'hudson yards',
      28 => '',
    ),
  ),
  188 => 
  array (
    'slug' => sanitize_title("London"),
    'name' => 'London',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English; Chinese',
    'running_time' => '00.20.58',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'urban change',
      1 => 'london',
      2 => 'population growth',
      3 => 'immigration',
      4 => 'knowledge economy',
      5 => 'challenges',
      6 => 'house prices',
      7 => 'transport',
      8 => 'centre',
      9 => 'brownfield development',
      10 => 'waste',
      11 => 'supply-led',
      12 => 'transport improvement',
      13 => 'fixed rail',
      14 => 'bus lanes',
      15 => 'congestion charge',
      16 => 'pressures on the centre',
      17 => 'green belt',
      18 => 'polycentric city',
      19 => 'regional centres',
      20 => 'growth',
      21 => 'corridors',
      22 => 'thames gateway',
      23 => 'brownfield development',
      24 => 'olympic bid',
      25 => 'contaminated land',
      26 => 'vision',
      27 => 'visionaries',
      28 => 'waste management',
      29 => 'information technolgy',
    ),
  ),
  189 => 
  array (
    'slug' => sanitize_title("Power: comparing systems of urban governance"),
    'name' => 'Power: comparing systems of urban governance',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00.20.58',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'new york',
      2 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'global city',
      1 => 'new york',
      2 => 'london',
      3 => 'shanghai',
      4 => 'power',
      5 => 'decentralisation',
      6 => 'centralisation',
      7 => 'government',
      8 => 'income generator',
      9 => 'autonomy',
      10 => 'authority',
      11 => 'national government',
      12 => 'regional government',
      13 => 'local government',
      14 => 'citizens',
      15 => 'city government',
      16 => 'empower',
      17 => 'national power',
      18 => 'london\'s growth',
      19 => 'higher levels of government',
      20 => '',
    ),
  ),
  190 => 
  array (
    'slug' => sanitize_title("Identity: the meaning of form in three cities"),
    'name' => 'Identity: the meaning of form in three cities',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'new york',
      2 => 'shaghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'new york',
      2 => 'london',
      3 => 'symbolism',
      4 => 'towers',
      5 => 'tall buildings',
      6 => 'twin towers',
      7 => 'canary wharff',
      8 => 'transformation',
      9 => 'growth',
      10 => 'london\'s government',
      11 => 'cedric price',
      12 => 'construction time',
      13 => 'skyline',
      14 => 'millennium bridge',
      15 => 'city identity',
      16 => 'city hall',
      17 => 'change',
      18 => 'river thames',
      19 => 'history',
      20 => 'structure',
      21 => 'reshaped',
      22 => '',
    ),
  ),
  191 => 
  array (
    'slug' => sanitize_title("Open Discussion"),
    'name' => 'Open Discussion',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'new york',
      2 => 'shaghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'new york',
      2 => 'london',
      3 => 'symbolism',
      4 => 'towers',
      5 => 'tall buildings',
      6 => 'twin towers',
      7 => 'canary wharff',
      8 => 'transformation',
      9 => 'growth',
      10 => 'london\'s government',
      11 => 'cedric price',
      12 => 'construction time',
      13 => 'skyline',
      14 => 'millennium bridge',
      15 => 'city identity',
      16 => 'city hall',
      17 => 'change',
      18 => 'river thames',
      19 => 'history',
      20 => 'structure',
      21 => 'reshaped',
      22 => '',
    ),
  ),
  192 => 
  array (
    'slug' => sanitize_title("After the Surge: How to Enhance Shanghai\'s Urban Economy"),
    'name' => 'After the Surge: How to Enhance Shanghai\'s Urban Economy',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'economy',
    ),
  ),
  193 => 
  array (
    'slug' => sanitize_title("Urban Age so far . Labour market"),
    'name' => 'Urban Age so far . Labour market',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English; Chinese',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'economy',
      2 => 'manufacturing',
      3 => 'transformation',
      4 => 'transition',
      5 => 'multiplicity',
      6 => 'labour market',
      7 => 'qualifications',
      8 => 'employment',
      9 => 'global city',
      10 => 'skills gap',
      11 => 'working places',
    ),
  ),
  194 => 
  array (
    'slug' => sanitize_title("The future economic profile of Shanghai"),
    'name' => 'The future economic profile of Shanghai',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'economic future',
      1 => 'china',
      2 => 'shanghai',
      3 => 'world city',
      4 => 'socialist international metropolis',
      5 => 'economy',
      6 => 'speed',
      7 => 'size',
      8 => 'connectivity',
      9 => 'economic forecasts',
      10 => 'manufacturing bases',
      11 => 'yangtze river delta',
      12 => 'international manufacturing centre',
      13 => 'yangshan project',
      14 => 'international transportation centre',
      15 => 'international trade centre',
      16 => 'international finacial centre',
    ),
  ),
  195 => 
  array (
    'slug' => sanitize_title("Architectural typologies of Shanghai.s new economy"),
    'name' => 'Architectural typologies of Shanghai.s new economy',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English; Chinese',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'cedric price',
      1 => 'office design',
      2 => 'office architecture',
      3 => 'social',
      4 => 'physical',
      5 => 'history',
      6 => 'the larkin building',
      7 => 'office types',
      8 => 'taylorist',
      9 => 'social democratic',
      10 => 'networked',
      11 => 'lower house',
      12 => 'seagram building',
      13 => 'american offices',
      14 => 'architects',
      15 => 'interior designers',
      16 => 'developers',
      17 => 'herman hertzberger',
      18 => 'sas stockholm',
      19 => 'networked offices',
      20 => 'global organisations',
      21 => 'shanghai',
    ),
  ),
  196 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'labour markets',
      1 => '\'gene pool\'',
      2 => 'high growth sectors',
      3 => 'high income jobs',
      4 => 'low income jobs',
      5 => 'silicon valley',
      6 => 'informal economy',
      7 => 'advanced service economies',
      8 => '',
    ),
  ),
  197 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'Chinese',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'labour markets',
      1 => '\'gene pool\'',
      2 => 'high growth sectors',
      3 => 'high income jobs',
      4 => 'low income jobs',
      5 => 'silicon valley',
      6 => 'informal economy',
      7 => 'advanced service economies',
      8 => '',
    ),
  ),
  198 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'future',
      1 => 'shanghai',
      2 => 'economy',
      3 => 'global',
      4 => 'local',
      5 => 'relationship',
      6 => 'state vs market',
      7 => 'city vs region',
      8 => 'competition',
      9 => 'cooperation',
      10 => '',
    ),
  ),
  199 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'relationships',
      1 => 'policy makers',
      2 => 'changing economy',
      3 => 'education or workforce',
      4 => 'wages',
      5 => 'prices',
      6 => 'disparities',
      7 => 'location',
      8 => 'jobs',
      9 => 'housing',
      10 => 'housing market',
      11 => 'housing prices',
      12 => 'shanghai',
      13 => 'new york',
      14 => 'structural changes',
      15 => 'skills',
      16 => '',
    ),
  ),
  200 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'economic',
      2 => 'spatial',
      3 => 'structure',
      4 => 'metropolitan area',
      5 => 'manufacturing sector',
      6 => 'service sector',
      7 => 'dual structure',
      8 => 'global cities',
    ),
  ),
  201 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'economic',
      2 => 'spatial',
      3 => 'structure',
      4 => 'metropolitan area',
      5 => 'manufacturing sector',
      6 => 'service sector',
      7 => 'dual structure',
      8 => 'global cities',
    ),
  ),
  202 => 
  array (
    'slug' => sanitize_title("Faster but Further: Is Shanghai\'s Transport System Moving in the Right Direction?"),
    'name' => 'Faster but Further: Is Shanghai\'s Transport System Moving in the Right Direction?',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'mobility',
    ),
  ),
  203 => 
  array (
    'slug' => sanitize_title("Urban Age so far . Mobility"),
    'name' => 'Urban Age so far . Mobility',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'structures',
      2 => 'city planning',
      3 => 'pedestrian',
      4 => 'cycle',
      5 => 'public transport',
      6 => 'car free centres',
      7 => 'higher speed',
      8 => 'longer distances',
      9 => 'parking',
      10 => 'shanghai',
      11 => 'sustainability',
      12 => 'new york',
      13 => 'car traffic',
      14 => 'energy consumption',
      15 => 'car ownership',
    ),
  ),
  204 => 
  array (
    'slug' => sanitize_title("Planning for movement and people"),
    'name' => 'Planning for movement and people',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English; Chinese',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'structures',
      2 => 'city planning',
      3 => 'pedestrian',
      4 => 'cycle',
      5 => 'public transport',
      6 => 'car free centres',
      7 => 'higher speed',
      8 => 'longer distances',
      9 => 'parking',
      10 => 'shanghai',
      11 => 'sustainability',
      12 => 'new york',
      13 => 'car traffic',
      14 => 'energy consumption',
      15 => 'car ownership',
    ),
  ),
  205 => 
  array (
    'slug' => sanitize_title("Designing spaces for movement"),
    'name' => 'Designing spaces for movement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'bogotá',
      1 => 'cars',
      2 => 'shanghai',
      3 => 'sustainability',
      4 => 'transport system',
      5 => 'density',
      6 => 'public transport',
      7 => 'bicycle use',
      8 => 'pedestrian only streets',
      9 => 'quality of life',
      10 => 'equality',
      11 => '\'city for cars\'',
      12 => '\'city for people\'',
      13 => 'tokyo',
      14 => 'parallel road network',
      15 => '\'good city\'',
      16 => 'public space',
      17 => 'chengdu',
      18 => 'mobility',
      19 => 'transport problems',
      20 => 'traffic jams',
      21 => 'road infrastructure',
      22 => 'elevated highways',
      23 => 'atlanta',
      24 => 'new york',
      25 => 'reserve lanes',
      26 => 'buses',
      27 => 'car use',
      28 => 'economy',
      29 => 'zurich',
      30 => 'manhattan',
      31 => 'social differentiation',
      32 => 'integrate',
      33 => 'amsterdam',
      34 => 'poor',
      35 => 'neverland\'s',
    ),
  ),
  206 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'public transport',
      1 => 'subway lines',
      2 => 'shanghai',
      3 => 'spatial distribution',
      4 => 'housing',
      5 => 'city centres',
      6 => 'low income households',
    ),
  ),
  207 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'public transport',
      1 => 'investment',
      2 => 'expensive',
      3 => 'economy',
      4 => 'cars',
      5 => 'density',
      6 => 'demand management',
      7 => 'congestion charge',
      8 => 'middle classes',
      9 => 'bus lanes',
      10 => 'speed',
      11 => '',
    ),
  ),
  208 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'transport planning',
      2 => 'traffic',
      3 => 'road conditions',
      4 => 'government',
      5 => 'road system',
      6 => 'mobility',
      7 => 'cars',
      8 => 'transport system',
      9 => 'trip time',
      10 => 'trip length',
      11 => 'expressway system',
    ),
  ),
  209 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'tokyo',
      1 => 'population',
      2 => 'density',
      3 => 'transportation system',
      4 => 'cars',
      5 => 'railway system',
      6 => 'research alliance',
      7 => 'land-use',
      8 => 'road system',
      9 => 'centre',
    ),
  ),
  210 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'response',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'road traffic injuries',
      1 => 'china',
      2 => 'india',
      3 => 'deaths',
      4 => 'urbanisation growth',
      5 => 'informal sector growth',
      6 => 'pedestrians',
      7 => 'bicycles',
      8 => 'bicycle lanes',
      9 => 'urban transport system',
      10 => 'shanghai',
      11 => 'delhi',
      12 => 'road based system',
      13 => 'rail based system.',
    ),
  ),
  211 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'road traffic injuries',
      1 => 'china',
      2 => 'india',
      3 => 'deaths',
      4 => 'urbanisation growth',
      5 => 'informal sector growth',
      6 => 'pedestrians',
      7 => 'bicycles',
      8 => 'bicycle lanes',
      9 => 'urban transport system',
      10 => 'shanghai',
      11 => 'delhi',
      12 => 'road based system',
      13 => 'rail based system.',
    ),
  ),
  212 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'urban change',
      1 => 'management',
      2 => 'urban models',
      3 => 'united states',
      4 => 'models',
      5 => 'practice',
      6 => 'governance',
      7 => 'leadership',
      8 => 'individuals',
      9 => 'transformation',
      10 => 'london',
      11 => 'thames gateway',
      12 => 'new york',
      13 => 'regional plan',
      14 => 'vision',
      15 => 'new urbanism',
      16 => 'compact form',
      17 => 'urban renewal',
      18 => 'planning innovations',
      19 => 'housing',
      20 => 'washington d.c.',
      21 => 'city beautiful movement',
      22 => 'shanghai',
      23 => 'satallite cities',
      24 => 'reality',
      25 => 'density',
      26 => '',
    ),
  ),
  213 => 
  array (
    'slug' => sanitize_title("How do we Govern? The Theory and Praxis of Urban Models"),
    'name' => 'How do we Govern? The Theory and Praxis of Urban Models',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'urban change',
      1 => 'management',
      2 => 'urban models',
      3 => 'united states',
      4 => 'models',
      5 => 'practice',
      6 => 'governance',
      7 => 'leadership',
      8 => 'individuals',
      9 => 'transformation',
      10 => 'london',
      11 => 'thames gateway',
      12 => 'new york',
      13 => 'regional plan',
      14 => 'vision',
      15 => 'new urbanism',
      16 => 'compact form',
      17 => 'urban renewal',
      18 => 'planning innovations',
      19 => 'housing',
      20 => 'washington d.c.',
      21 => 'city beautiful movement',
      22 => 'shanghai',
      23 => 'satallite cities',
      24 => 'reality',
      25 => 'density',
      26 => '',
    ),
  ),
  214 => 
  array (
    'slug' => sanitize_title("How do we Govern? The Theory and Praxis of Urban Models"),
    'name' => 'How do we Govern? The Theory and Praxis of Urban Models',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '08/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'urban change',
      1 => 'management',
      2 => 'urban models',
      3 => 'united states',
      4 => 'models',
      5 => 'practice',
      6 => 'governance',
      7 => 'leadership',
      8 => 'individuals',
      9 => 'transformation',
      10 => 'london',
      11 => 'thames gateway',
      12 => 'new york',
      13 => 'regional plan',
      14 => 'vision',
      15 => 'new urbanism',
      16 => 'compact form',
      17 => 'urban renewal',
      18 => 'planning innovations',
      19 => 'housing',
      20 => 'washington d.c.',
      21 => 'city beautiful movement',
      22 => 'shanghai',
      23 => 'satallite cities',
      24 => 'reality',
      25 => 'density',
      26 => '',
    ),
  ),
  215 => 
  array (
    'slug' => sanitize_title("Living With the Future: How can Shanghai\'s Residents Keep Up With the City\'s Transformation?"),
    'name' => 'Living With the Future: How can Shanghai\'s Residents Keep Up With the City\'s Transformation?',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'urban change',
      1 => 'management',
      2 => 'urban models',
      3 => 'united states',
      4 => 'models',
      5 => 'practice',
      6 => 'governance',
      7 => 'leadership',
      8 => 'individuals',
      9 => 'transformation',
      10 => 'london',
      11 => 'thames gateway',
      12 => 'new york',
      13 => 'regional plan',
      14 => 'vision',
      15 => 'new urbanism',
      16 => 'compact form',
      17 => 'urban renewal',
      18 => 'planning innovations',
      19 => 'housing',
      20 => 'washington d.c.',
      21 => 'city beautiful movement',
      22 => 'shanghai',
      23 => 'satallite cities',
      24 => 'reality',
      25 => 'density',
      26 => '',
    ),
  ),
  216 => 
  array (
    'slug' => sanitize_title("Urban Age so far . Public life"),
    'name' => 'Urban Age so far . Public life',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'diversity',
      1 => 'social control',
      2 => 'shanghai',
      3 => 'residential committee',
      4 => 'chinese cities',
      5 => 'security',
      6 => 'surveilance',
      7 => 'security',
      8 => 'worker migrants',
      9 => 'crime',
      10 => 'citizenship',
      11 => 'togetherness',
      12 => 'migrants',
      13 => 'gates',
      14 => 'families',
      15 => 'control',
      16 => '',
    ),
  ),
  217 => 
  array (
    'slug' => sanitize_title("Quality of life and spatial distribution of migrants in Shanghai"),
    'name' => 'Quality of life and spatial distribution of migrants in Shanghai',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/07/2005',
    'language2' => 'English; Chinese',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'diversity',
      1 => 'social control',
      2 => 'shanghai',
      3 => 'residential committee',
      4 => 'chinese cities',
      5 => 'security',
      6 => 'surveilance',
      7 => 'security',
      8 => 'worker migrants',
      9 => 'crime',
      10 => 'citizenship',
      11 => 'togetherness',
      12 => 'migrants',
      13 => 'gates',
      14 => 'families',
      15 => 'control',
      16 => '',
    ),
  ),
  218 => 
  array (
    'slug' => sanitize_title("Society and urban space: observations on Shanghai"),
    'name' => 'Society and urban space: observations on Shanghai',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'public realm',
      1 => '20th century',
      2 => 'crisis',
      3 => 'complexity',
      4 => 'public order',
      5 => 'motion',
      6 => 'traffic',
      7 => 'speed',
      8 => 'movement',
      9 => 'single use',
      10 => 'pedestrianised zones',
      11 => 'single activity',
      12 => 'non-interaction',
      13 => 'restriction',
      14 => 'paris',
      15 => 'london',
      16 => 'freedom of movement',
      17 => 'local',
      18 => 'public',
      19 => 'taylorite',
      20 => 'fuctions',
      21 => 'capitalism',
      22 => 'visual order',
      23 => 'non-verbal',
      24 => 'verbal',
      25 => 'michelle facoy?',
      26 => 'mass order',
      27 => 'power',
      28 => 'modernity',
      29 => 'shanghai',
      30 => 'crowd',
      31 => 'urban fabric',
      32 => 'sense of place',
      33 => 'identity',
    ),
  ),
  219 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'historical preservation',
      1 => 'urban heritage',
      2 => 'cultural identity',
      3 => 'history',
      4 => 'local protection law',
      5 => 'listed buildings',
      6 => 'hong kong and shanghai bank',
      7 => 'restoration',
      8 => 'rennovation',
      9 => 'original function',
      10 => 'transform',
      11 => 'housing preservation',
      12 => 'preservation process',
      13 => 'residents',
      14 => 'local heritage',
      15 => 'shanghai',
    ),
  ),
  220 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'population',
      1 => 'long term residents',
      2 => 'economy',
      3 => 'income',
      4 => 'unemployment',
      5 => 'poverty',
      6 => 'diversity',
      7 => 'labour forces',
      8 => 'urban development',
      9 => 'designers',
      10 => 'housing space',
      11 => 'public space',
      12 => '\'ordinary people\'',
      13 => 'migrants',
      14 => 'segregation',
      15 => 'local goverenment',
      16 => 'welfare system',
      17 => 'security system',
      18 => 'communtiy',
      19 => 'migrant workers',
      20 => '',
    ),
  ),
  221 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'east end',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'migrants',
      2 => 'immigrants',
      3 => 'east london',
      4 => 'canary wharff',
      5 => 'sense of cohesion',
      6 => 'typologies',
      7 => 'mixing typologies',
      8 => 'adult education',
      9 => 'facilties',
      10 => 'migrant communties',
      11 => 'cultural infrastructure',
    ),
  ),
  222 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'east end',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'migrants',
      2 => 'immigrants',
      3 => 'east london',
      4 => 'canary wharff',
      5 => 'sense of cohesion',
      6 => 'typologies',
      7 => 'mixing typologies',
      8 => 'adult education',
      9 => 'facilties',
      10 => 'migrant communties',
      11 => 'cultural infrastructure',
    ),
  ),
  223 => 
  array (
    'slug' => sanitize_title("Public Life and Urban Space"),
    'name' => 'Public Life and Urban Space',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'east end',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'migrants',
      2 => 'immigrants',
      3 => 'east london',
      4 => 'canary wharff',
      5 => 'sense of cohesion',
      6 => 'typologies',
      7 => 'mixing typologies',
      8 => 'adult education',
      9 => 'facilties',
      10 => 'migrant communties',
      11 => 'cultural infrastructure',
    ),
  ),
  224 => 
  array (
    'slug' => sanitize_title("Trading City for Space: Does More Personal Living Space Lead to Urban Sprawl in Shanghai?"),
    'name' => 'Trading City for Space: Does More Personal Living Space Lead to Urban Sprawl in Shanghai?',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'china',
    ),
    'tags' => 
    array (
      0 => 'living space',
      1 => 'personal space',
      2 => 'density',
      3 => 'sprawl',
      4 => 'social implications',
      5 => 'park',
      6 => 'housing',
      7 => 'urban fabric',
      8 => 'urbanity',
      9 => 'urban age',
      10 => 'urbanism',
      11 => 'time',
      12 => 'citizenship',
      13 => 'public space',
      14 => '',
    ),
  ),
  225 => 
  array (
    'slug' => sanitize_title("Searching for space"),
    'name' => 'Searching for space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'china',
    ),
    'tags' => 
    array (
      0 => 'social practice',
      1 => 'social control',
      2 => 'design',
      3 => 'built form',
      4 => 'la',
      5 => 'physical space',
      6 => 'density',
      7 => 'shanghia',
      8 => 'manhattan',
      9 => 'london',
      10 => 'space',
      11 => 'models',
      12 => 'berlin',
      13 => 'new york',
      14 => 'urban structure',
      15 => 'inhabitation',
      16 => 'time',
      17 => 'change',
      18 => 'planning',
      19 => 'planned',
      20 => 'plan',
      21 => 'intervene',
      22 => 'houisng stock',
      23 => 'urban fabric',
      24 => 'evolution',
    ),
  ),
  226 => 
  array (
    'slug' => sanitize_title("Designing the city: Lessons from hyper-growth"),
    'name' => 'Designing the city: Lessons from hyper-growth',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'hypo-growth',
      2 => 'population',
      3 => 'gdp',
      4 => 'economic developmnet',
      5 => 'new york',
      6 => 'london',
      7 => 'paris',
      8 => 'density',
      9 => 'high density',
      10 => 'growth',
      11 => 'structural composition',
      12 => 'industrial growth',
      13 => 'china\'s urbanisation',
      14 => 'architecture',
      15 => 'design',
      16 => 'foreign architects',
      17 => 'planners',
      18 => 'hyper density',
      19 => 'intergrate',
      20 => 'integration of process',
      21 => 'hypo knowledge',
      22 => 'floating population',
    ),
  ),
  227 => 
  array (
    'slug' => sanitize_title("Housing and Neighbourhoods"),
    'name' => 'Housing and Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'china',
    ),
    'tags' => 
    array (
      0 => 'city space',
      1 => 'shanghai',
      2 => 'planning',
      3 => 'urban spaces',
      4 => 'policy',
      5 => 'doubled icrease doubled decrease policy?',
      6 => 'urban development',
      7 => 'china',
      8 => 'design',
      9 => '',
    ),
  ),
  228 => 
  array (
    'slug' => sanitize_title("Housing and Neighbourhoods"),
    'name' => 'Housing and Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'china',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'chinese cities',
      2 => 'china\'s urbanism',
      3 => 'social political difference',
      4 => 'three grand elminations',
      5 => 'suburbs',
      6 => 'three frontier construction',
      7 => 'urban production',
      8 => 'floating population',
      9 => 'mobilty',
      10 => 'historical',
      11 => 'straight administration?',
      12 => 'public space',
      13 => 'socialist regime',
      14 => 'rent',
      15 => '',
    ),
  ),
  229 => 
  array (
    'slug' => sanitize_title("Housing and Neighbourhoods"),
    'name' => 'Housing and Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'china',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'solutions',
      2 => 'london',
      3 => 'problems',
      4 => 'characteristics',
      5 => 'china',
      6 => 'transfer',
      7 => 'knowledge',
      8 => 'advice',
    ),
  ),
  230 => 
  array (
    'slug' => sanitize_title("Housing and Neighbourhoods"),
    'name' => 'Housing and Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shanghai',
      1 => 'over-crowed',
      2 => 'urban sprawl',
      3 => 'future',
      4 => 'threat',
      5 => 'density',
      6 => 'dustribution',
      7 => 'rapid housing development',
      8 => 'pudong',
      9 => 'singapore',
    ),
  ),
  231 => 
  array (
    'slug' => sanitize_title("Housing and Neighbourhoods"),
    'name' => 'Housing and Neighbourhoods',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'rights of light?',
      1 => 'streets',
      2 => 'pudong',
      3 => 'design',
      4 => 'proximity',
      5 => 'architecture',
      6 => '',
    ),
  ),
  232 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shangahi',
      1 => '\'cityness\'',
      2 => 'making',
      3 => 'intersections',
      4 => 'differences',
      5 => 'urbanity',
      6 => 'public space',
      7 => 'western',
      8 => 'gaps',
      9 => 'urban agglomeration',
      10 => 'cosmopolitism',
      11 => 'london',
      12 => 'muslim women',
      13 => 'intersection of differences',
      14 => 'manhattan',
      15 => 'public access space',
      16 => 'making of public space',
      17 => 'taloyrist architecture',
      18 => 'chicago',
      19 => 'office buildings',
      20 => 'street',
      21 => 'public space',
      22 => 'street fabric',
      23 => 'inequalities',
      24 => '',
    ),
  ),
  233 => 
  array (
    'slug' => sanitize_title("Cityness in the Urban Age"),
    'name' => 'Cityness in the Urban Age',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'shangahi',
      1 => '\'cityness\'',
      2 => 'making',
      3 => 'intersections',
      4 => 'differences',
      5 => 'urbanity',
      6 => 'public space',
      7 => 'western',
      8 => 'gaps',
      9 => 'urban agglomeration',
      10 => 'cosmopolitism',
      11 => 'london',
      12 => 'muslim women',
      13 => 'intersection of differences',
      14 => 'manhattan',
      15 => 'public access space',
      16 => 'making of public space',
      17 => 'taloyrist architecture',
      18 => 'chicago',
      19 => 'office buildings',
      20 => 'street',
      21 => 'public space',
      22 => 'street fabric',
      23 => 'inequalities',
      24 => '',
    ),
  ),
  234 => 
  array (
    'slug' => sanitize_title("Shanghai - the Speed and the Friction"),
    'name' => 'Shanghai - the Speed and the Friction',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'speed',
      1 => 'slowness',
      2 => 'urban gowth',
      3 => '',
    ),
  ),
  235 => 
  array (
    'slug' => sanitize_title("Shanghai - the Speed and the Friction"),
    'name' => 'Shanghai - the Speed and the Friction',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'speed',
      1 => 'slowness',
      2 => 'urban gowth',
      3 => '',
    ),
  ),
  236 => 
  array (
    'slug' => sanitize_title("Conclusions"),
    'name' => 'Conclusions',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '09/07/2005',
    'language2' => 'English',
    'running_time' => '00:15.16',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'speed',
      1 => 'slowness',
      2 => 'urban gowth',
      3 => '',
    ),
  ),
  237 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:05:02',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'india',
      1 => 'urban age',
    ),
  ),
  238 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:06:35',
    'geotags' => 
    array (
      0 => 'shanghai',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'cities programme',
      2 => 'lse',
      3 => 'india',
    ),
  ),
  239 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:08:25',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'lse',
      2 => 'urban age',
      3 => 'indian urbanisation',
      4 => 'rural-urban migration',
      5 => 'urban poverty',
      6 => 'inclusive growth',
      7 => 'mumbai slums',
      8 => 'slum redevelopment',
      9 => 'urban infrastructure',
      10 => 'water & sanitation',
      11 => 'transportation',
    ),
  ),
  240 => 
  array (
    'slug' => sanitize_title("Introduction"),
    'name' => 'Introduction',
    'format' => 'video; audio',
    'type' => 'introduction',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:08:14',
    'geotags' => 
    array (
      0 => 'indian cities',
    ),
    'tags' => 
    array (
      0 => 'introduction',
      1 => 'mumbai challenges',
      2 => 'inequality',
      3 => 'global urbanisation',
      4 => 'indian urbanisation',
      5 => 'urban economic growth',
      6 => 'urban infrastructure',
      7 => 'urban services',
      8 => 'livable cities',
    ),
  ),
  241 => 
  array (
    'slug' => sanitize_title("The Urban Age and India, Pt 1"),
    'name' => 'The Urban Age and India, Pt 1',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English
',
    'running_time' => '00:07:58',
    'geotags' => 
    array (
      0 => 'global cities',
    ),
    'tags' => 
    array (
      0 => 'conference programme',
      1 => 'conference themes',
      2 => 'urban age agenda',
      3 => '',
    ),
  ),
  242 => 
  array (
    'slug' => sanitize_title("The Urban Age and India, Pt 2"),
    'name' => 'The Urban Age and India, Pt 2',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English
',
    'running_time' => '00:07:54',
    'geotags' => 
    array (
      0 => 'global cities',
    ),
    'tags' => 
    array (
      0 => 'inequality',
      1 => 'livable cities',
      2 => 'political will',
      3 => 'urban age agenda',
      4 => 'urban demographics',
      5 => 'major urban issues',
      6 => 'urban growth',
      7 => 'endless city',
    ),
  ),
  243 => 
  array (
    'slug' => sanitize_title("The Urban Age and India, Pt 3"),
    'name' => 'The Urban Age and India, Pt 3',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English
',
    'running_time' => '00:07:21',
    'geotags' => 
    array (
      0 => 'global cities',
    ),
    'tags' => 
    array (
      0 => 'energy consumption',
      1 => 'density',
      2 => 'governance',
      3 => 'physical fabric',
      4 => 'housing',
      5 => '',
    ),
  ),
  244 => 
  array (
    'slug' => sanitize_title("Cities in a Global Context, Pt 1"),
    'name' => 'Cities in a Global Context, Pt 1',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:07:51',
    'geotags' => 
    array (
      0 => 'global cities',
    ),
    'tags' => 
    array (
      0 => 'global cities',
      1 => 'knowledge capital',
      2 => 'space and place',
      3 => 'geography of dispersal',
      4 => 'geography of concentration',
      5 => 'right to the city',
      6 => 'global economy',
    ),
  ),
  245 => 
  array (
    'slug' => sanitize_title("Cities in a Global Context, Pt 2"),
    'name' => 'Cities in a Global Context, Pt 2',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:06:29',
    'geotags' => 
    array (
      0 => 'global cities',
    ),
    'tags' => 
    array (
      0 => 'global circuits',
      1 => 'global city infrastructure',
      2 => 'inequality',
      3 => 'informal economy',
    ),
  ),
  246 => 
  array (
    'slug' => sanitize_title("Cities in a Global Context, Pt 3"),
    'name' => 'Cities in a Global Context, Pt 3',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:06:53',
    'geotags' => 
    array (
      0 => 'global cities',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'global cities rankings',
      2 => 'mumbai rankings',
      3 => 'network of global cities',
      4 => 'urban governance',
      5 => '',
    ),
  ),
  247 => 
  array (
    'slug' => sanitize_title("The Future of India.s Cities, Pt 1"),
    'name' => 'The Future of India.s Cities, Pt 1',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:06:39',
    'geotags' => 
    array (
      0 => 'indian cities',
    ),
    'tags' => 
    array (
      0 => 'urban transition',
      1 => 'urbanisation rate',
      2 => 'pattern of urbanisation',
      3 => 'urban-rural growth differential',
      4 => 'exclusionary urban growth',
      5 => 'growth of small and medium towns',
    ),
  ),
  248 => 
  array (
    'slug' => sanitize_title("The Future of India.s Cities, Pt 2"),
    'name' => 'The Future of India.s Cities, Pt 2',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:05:47',
    'geotags' => 
    array (
      0 => 'indian cities',
    ),
    'tags' => 
    array (
      0 => 'absorbing migrant population',
      1 => 'absorbing urban growth',
      2 => 'urban poverty rate',
      3 => 'disparity between large and small towns',
      4 => 'per-capita allocation of public urban expenditure',
      5 => 'economic infrasructure',
      6 => 'social dimensions of urban growth',
      7 => 'urban economy',
      8 => 'informal economy',
      9 => '\'formally informal sector\'',
    ),
  ),
  249 => 
  array (
    'slug' => sanitize_title("The Future of India.s Cities, Pt 3"),
    'name' => 'The Future of India.s Cities, Pt 3',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:08:54',
    'geotags' => 
    array (
      0 => 'indian cities',
    ),
    'tags' => 
    array (
      0 => 'peripheralization',
      1 => 'land-value gradient',
      2 => '\'sanitisation of large cities\'',
      3 => 'degenerated periphery',
      4 => '',
    ),
  ),
  250 => 
  array (
    'slug' => sanitize_title("The Future of India.s Cities, Pt 3"),
    'name' => 'The Future of India.s Cities, Pt 3',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:08:54',
    'geotags' => 
    array (
      0 => 'indian cities',
    ),
    'tags' => 
    array (
      0 => 'peripheralization',
      1 => 'land-value gradient',
      2 => '\'sanitisation of large cities\'',
      3 => 'degenerated periphery',
      4 => '',
    ),
  ),
  251 => 
  array (
    'slug' => sanitize_title("Introduction"),
    'name' => 'Introduction',
    'format' => 'video; audio',
    'type' => 'introduction',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:03:07',
    'geotags' => 
    array (
      0 => 'indian cities',
    ),
    'tags' => 
    array (
      0 => 'introduction',
      1 => 'analysis of cities',
      2 => 'major issues',
      3 => 'slums',
      4 => 'urban infrastructure',
      5 => 'migration',
      6 => 'urban terrorism',
      7 => 'security',
      8 => '',
    ),
  ),
  252 => 
  array (
    'slug' => sanitize_title("Reenergising English Cities and the London 2012 Olympics "),
    'name' => 'Reenergising English Cities and the London 2012 Olympics ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:21:30',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'politicians',
      1 => 'london',
      2 => '2012 olympics',
      3 => 'olympics',
      4 => 'pluralism',
      5 => 'political leadership',
      6 => 'transformation of london',
      7 => 'economic transition',
      8 => 'rennaissance of london',
      9 => 'london economy',
      10 => 'diversity',
      11 => 'immigration',
      12 => 'state intervention',
      13 => 'city visioning',
      14 => 'greater london authority',
      15 => 'civic renewal',
      16 => 'public spaces',
      17 => 'public investment',
      18 => 'transport infrastructure',
      19 => 'crime',
      20 => 'poverty',
      21 => 'inequality',
      22 => 'olympics site',
      23 => 'east london',
      24 => 'choice of olympics site',
      25 => 'regeneration',
      26 => 'olympic legacy',
      27 => 'community engagement',
      28 => '',
    ),
  ),
  253 => 
  array (
    'slug' => sanitize_title("Developing Urban Visions "),
    'name' => 'Developing Urban Visions ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:17:34',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'city visions',
      1 => 'city visioning',
      2 => 'shaping cities',
      3 => 'urban form',
      4 => 'history of city visions',
      5 => 'world\'s fair 1939',
      6 => 'american city',
      7 => 'evolution of city visioning',
      8 => 'power of city visions',
      9 => 'global city meaning',
      10 => 'slogans of global cities',
      11 => 'pace of urban change',
      12 => 'tensions between city visions and urban form',
      13 => 'shanghai',
      14 => 'new york city',
      15 => 'london',
      16 => 'governance of urbanization',
      17 => 'washington dc',
      18 => 'mexico city',
      19 => 'multiple city visions',
      20 => 'hetereogeneity of cities',
      21 => '',
    ),
  ),
  254 => 
  array (
    'slug' => sanitize_title("Mumbai\'s Emerging Future "),
    'name' => 'Mumbai\'s Emerging Future ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:15:31',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'advantages of mumbai',
      2 => 'disadvantages of mumbai',
      3 => 'housing',
      4 => 'transport system',
      5 => 'education',
      6 => 'slum resettlement',
      7 => 'water and sanitation',
      8 => 'civic services',
      9 => 'mumbai quality of life',
      10 => 'urban planning in mumbai',
      11 => 'governance of mumbai',
      12 => 'development plan',
      13 => '\'salami planning\'',
      14 => 'dharavi',
      15 => 'good governance',
      16 => 'security',
      17 => 'public participation',
      18 => '\'governance scorecard\'',
      19 => 'mumbai city vision',
      20 => 'long term planning',
      21 => 'ten guiding principles for mumbai planning',
      22 => 'political reform',
      23 => 'governance reform',
      24 => 'planning reform',
    ),
  ),
  255 => 
  array (
    'slug' => sanitize_title("Transforming Mumbai into a World-Class City "),
    'name' => 'Transforming Mumbai into a World-Class City ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:12:24',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'transforming mumbai',
      2 => 'mumbai as a world class city',
      3 => 'mumbai vision',
      4 => 'mumbai economy',
      5 => 'decay of mumbai',
      6 => 'urban land ceiling act',
      7 => 'floor space index',
      8 => 'recent history of mumbai',
      9 => 'slummification',
      10 => 'public transport',
      11 => 'unemployment',
      12 => '\'rediscovering mumbai\'',
      13 => 'city competitiveness',
      14 => 'key challenges for mumbai',
      15 => 'governance',
      16 => 'equity',
      17 => '',
    ),
  ),
  256 => 
  array (
    'slug' => sanitize_title("Mumbai: Which Way Forward "),
    'name' => 'Mumbai: Which Way Forward ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:13:17',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'mumbai population growth',
      2 => 'growth of city limits',
      3 => 'urban form',
      4 => 'historical expansion plans',
      5 => 'historical development plans',
      6 => 'new growth centres',
      7 => 'navi mumbai',
      8 => 'public transport',
      9 => 'transport oriented development',
      10 => 'managing urban growth',
      11 => 'transport nodal growth points',
      12 => '',
    ),
  ),
  257 => 
  array (
    'slug' => sanitize_title("Mumbai: Which Way Forward"),
    'name' => 'Mumbai: Which Way Forward',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:07:38',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'crises of urban growth',
      2 => 'employment',
      3 => 'alienation',
      4 => 'inequity',
      5 => 'political voice',
      6 => 'sustainability',
      7 => 'income poverty',
      8 => 'information poverty',
      9 => 'services poverty',
      10 => 'poverty of compassion',
      11 => 'social exclusion',
      12 => 'nature of the excluded',
      13 => 'malnutrition',
      14 => 'hunger',
      15 => 'minorities',
      16 => 'mumbai riots',
      17 => '',
    ),
  ),
  258 => 
  array (
    'slug' => sanitize_title("Mumbai: Which Way Forward"),
    'name' => 'Mumbai: Which Way Forward',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:07:38',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'crises of urban growth',
      2 => 'employment',
      3 => 'alienation',
      4 => 'inequity',
      5 => 'political voice',
      6 => 'sustainability',
      7 => 'income poverty',
      8 => 'information poverty',
      9 => 'services poverty',
      10 => 'poverty of compassion',
      11 => 'social exclusion',
      12 => 'nature of the excluded',
      13 => 'malnutrition',
      14 => 'hunger',
      15 => 'minorities',
      16 => 'mumbai riots',
      17 => '',
    ),
  ),
  259 => 
  array (
    'slug' => sanitize_title("Urban Inequality "),
    'name' => 'Urban Inequality ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:26:07',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'urban inequality',
      1 => 'inequality',
      2 => 'urban design',
      3 => '\'art of making cities\'',
      4 => 'global capitalism',
      5 => 'visual forms',
      6 => '\'do no harm\' in urban design',
      7 => '\'impatient capital\'',
      8 => 'short-term investors',
      9 => 'financing of cities',
      10 => '\'chameleon institutions\'',
      11 => 'scale of cities',
      12 => 'reformulation of economic power',
      13 => 'failures of urban design',
      14 => 'large scale projects',
      15 => 'social complexity of large scale projects',
      16 => 'eviction',
      17 => '\'street grain\'',
      18 => 'overdetermined form of built environment',
      19 => 'form and function',
      20 => 'public spaces',
      21 => '',
    ),
  ),
  260 => 
  array (
    'slug' => sanitize_title("Introduction"),
    'name' => 'Introduction',
    'format' => 'video; audio',
    'type' => 'introduction',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:12:24',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'introduction',
      1 => 'mumbai',
      2 => 'globalisation',
      3 => 'downsides of globalisation',
      4 => 'inequality',
      5 => 'new york',
      6 => 'harlem',
      7 => 'gentrification',
      8 => 'displacement',
      9 => 'central park',
      10 => 'housing',
      11 => 'housing finance',
      12 => 'housing rights',
      13 => 'infrastructure and displacement',
      14 => 'land for housing',
      15 => 'informal settlements',
      16 => 'rent act',
      17 => 'planning process',
      18 => '',
    ),
  ),
  261 => 
  array (
    'slug' => sanitize_title("Reforming the Housing Debate "),
    'name' => 'Reforming the Housing Debate ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:11:01',
    'geotags' => 
    array (
      0 => 'maharashtra',
      1 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'maharashtra',
      2 => 'maharashtra state housing policy',
      3 => 'affordable housing',
      4 => 'national housing policy',
      5 => 'lower income groups',
      6 => 'housing reforms',
      7 => 'housing liberalisation',
      8 => 'housing supply',
      9 => 'urban housing statistics',
      10 => 'informal housing',
      11 => 'slum rehabilitation',
      12 => 'rental housing sector',
      13 => 'housing and infrastructure',
      14 => 'private sector incentives',
      15 => 'satellite townships',
      16 => '',
    ),
  ),
  262 => 
  array (
    'slug' => sanitize_title("DHARAVI . A GLOBAL CASE STUDY
"),
    'name' => 'DHARAVI . A GLOBAL CASE STUDY
',
    'format' => 'video; audio',
    'type' => 'talk ',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:11:26',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'dharavi',
      1 => 'mumbai',
      2 => 'slum rehabilitation',
      3 => 'sustainability',
      4 => 'housing',
      5 => 'slum rehabilitation authority',
      6 => 'existing housing conditions dharavi',
      7 => 'dharavi redevelopment plan',
      8 => '',
    ),
  ),
  263 => 
  array (
    'slug' => sanitize_title("DHARAVI . A GLOBAL CASE STUDY
"),
    'name' => 'DHARAVI . A GLOBAL CASE STUDY
',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:09:20',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'dharavi',
      1 => 'mumbai',
      2 => 'public consultation',
      3 => 'lack of information',
      4 => 'public participation',
      5 => 'dharavi economy',
      6 => 'redevelopment and informal economy',
      7 => 'problems with dharavi redevelopment',
      8 => '',
    ),
  ),
  264 => 
  array (
    'slug' => sanitize_title("Housing for the Poor in Developing Country Cities: The Bogotá Case  "),
    'name' => 'Housing for the Poor in Developing Country Cities: The Bogotá Case  ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:18:39',
    'geotags' => 
    array (
      0 => 'bogota',
    ),
    'tags' => 
    array (
      0 => 'bogota',
      1 => 'urban transition',
      2 => 'slums',
      3 => 'international experience',
      4 => '\'quality of life equality\'',
      5 => 'land for housing',
      6 => 'private property and urban housing',
      7 => 'inelasticity of land supply',
      8 => 'slum improvement',
      9 => 'slum avoidance',
      10 => 'formalizing informal settlements',
      11 => 'social inclusion',
      12 => 'pedestrianization',
      13 => 'social infrastructure',
      14 => 'public pedestrian space',
      15 => 'pedestrian infrastructure',
      16 => 'public spaces',
      17 => 'housing',
      18 => '',
    ),
  ),
  265 => 
  array (
    'slug' => sanitize_title("The Mexico City: Ciudad Neza "),
    'name' => 'The Mexico City: Ciudad Neza ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:08:13',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'ciudad neza',
      2 => 'informal settlements',
      3 => 'historical growth',
      4 => 'economic history',
      5 => 'history of housing interventions',
      6 => 'spatial geography',
      7 => 'informal development',
      8 => 'housing policy',
      9 => '',
    ),
  ),
  266 => 
  array (
    'slug' => sanitize_title("Tokyo to Mumbai & Back"),
    'name' => 'Tokyo to Mumbai & Back',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:08:56',
    'geotags' => 
    array (
      0 => 'tokyo',
      1 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'tokyo',
      1 => 'mumbai',
      2 => 'dharavi',
      3 => 'incremental development',
      4 => 'periphery',
      5 => 'tokyo urban history',
      6 => 'unplanned development',
      7 => 'tokyo economic development',
      8 => 'market economy',
      9 => 'built form typology',
      10 => 'organic planning',
      11 => 'organic development',
      12 => '',
    ),
  ),
  267 => 
  array (
    'slug' => sanitize_title("Tokyo to Mumbai & Back"),
    'name' => 'Tokyo to Mumbai & Back',
    'format' => 'video; audio',
    'type' => 'discussion; open debate',
    'date' => '02/11/2007',
    'language2' => 'English',
    'running_time' => '00:08:56',
    'geotags' => 
    array (
      0 => 'tokyo',
      1 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'tokyo',
      1 => 'mumbai',
      2 => 'dharavi',
      3 => 'incremental development',
      4 => 'periphery',
      5 => 'tokyo urban history',
      6 => 'unplanned development',
      7 => 'tokyo economic development',
      8 => 'market economy',
      9 => 'built form typology',
      10 => 'organic planning',
      11 => 'organic development',
      12 => '',
    ),
  ),
  268 => 
  array (
    'slug' => sanitize_title("Introduction"),
    'name' => 'Introduction',
    'format' => 'video; audio',
    'type' => 'introduction',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:01:55',
    'geotags' => 
    array (
      0 => 'tokyo',
      1 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'introduction',
      1 => 'climate change',
    ),
  ),
  269 => 
  array (
    'slug' => sanitize_title("Climate Change, Risk and Urbanisation"),
    'name' => 'Climate Change, Risk and Urbanisation',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:31:04',
    'geotags' => 
    array (
      0 => 'tokyo',
      1 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'stern review',
      1 => 'cities and climate change',
      2 => 'economics of climate change',
      3 => 'climate change',
      4 => 'potential impacts of climate change',
      5 => 'climate change prognosis',
      6 => 'emissions reduction',
      7 => 'emissions statistics',
      8 => 'emissions targets',
      9 => 'emissions mitigation costs',
      10 => 'sources of emissions',
      11 => 'carbon pricing',
      12 => 'emissions reduction policy instruments',
      13 => 'city vulnerabilities',
      14 => 'glacier retreat',
      15 => 'adaptation',
      16 => 'development',
      17 => 'london',
      18 => 'masdar',
      19 => 'dongtan',
      20 => 'woking',
      21 => 'advantages of cities for emissions redcution',
      22 => 'carbon trading mechanisms',
      23 => 'funding for emissions reduction',
      24 => 'heiligendamm targets',
      25 => '',
    ),
  ),
  270 => 
  array (
    'slug' => sanitize_title("Green Delhi "),
    'name' => 'Green Delhi ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:27:14',
    'geotags' => 
    array (
      0 => 'delhi',
    ),
    'tags' => 
    array (
      0 => 'delhi',
      1 => 'challenges for delhi',
      2 => 'institutional landscape',
      3 => 'governance framework',
      4 => 'governance of delhi',
      5 => 'pollution',
      6 => 'development',
      7 => 'housing',
      8 => 'housing development',
      9 => 'civic services',
      10 => 'public transport',
      11 => 'green cover',
      12 => 'public perceptions',
      13 => 'utility leakages',
      14 => 'public awareness campaigns',
      15 => 'public participation in development',
      16 => 'urban governance',
      17 => '',
    ),
  ),
  271 => 
  array (
    'slug' => sanitize_title("Green Delhi "),
    'name' => 'Green Delhi ',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:27:14',
    'geotags' => 
    array (
      0 => 'delhi',
    ),
    'tags' => 
    array (
      0 => 'delhi',
      1 => 'challenges for delhi',
      2 => 'institutional landscape',
      3 => 'governance framework',
      4 => 'governance of delhi',
      5 => 'pollution',
      6 => 'development',
      7 => 'housing',
      8 => 'housing development',
      9 => 'civic services',
      10 => 'public transport',
      11 => 'green cover',
      12 => 'public perceptions',
      13 => 'utility leakages',
      14 => 'public awareness campaigns',
      15 => 'public participation in development',
      16 => 'urban governance',
      17 => '',
    ),
  ),
  272 => 
  array (
    'slug' => sanitize_title("Introduction"),
    'name' => 'Introduction',
    'format' => 'video; audio',
    'type' => 'introduction',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:09:54',
    'geotags' => 
    array (
      0 => 'delhi',
    ),
    'tags' => 
    array (
      0 => 'introduction',
      1 => 'planning',
      2 => 'india',
      3 => 'indian cities',
      4 => 'masterplanning',
      5 => 'mumbai',
      6 => 'urban poverty',
      7 => 'pune',
      8 => 'urban infrastructure',
      9 => '',
    ),
  ),
  273 => 
  array (
    'slug' => sanitize_title("How Cities are Planned"),
    'name' => 'How Cities are Planned',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '-',
    'geotags' => 
    array (
      0 => 'delhi',
    ),
    'tags' => 
    array (
      0 => '-',
    ),
  ),
  274 => 
  array (
    'slug' => sanitize_title("Governance and City Design"),
    'name' => 'Governance and City Design',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:16:10',
    'geotags' => 
    array (
      0 => 'delhi',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'planning',
      2 => 'governance',
      3 => 'city administration',
      4 => 'geographies of governance',
      5 => 'new york',
      6 => 'berlin',
      7 => 'london',
      8 => 'mexico city',
      9 => 'administrative boundaries',
      10 => 'governance structures',
      11 => 'delhi',
      12 => 'india',
      13 => 'mumbai',
      14 => '',
    ),
  ),
  275 => 
  array (
    'slug' => sanitize_title("Shaping the City"),
    'name' => 'Shaping the City',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:14:27',
    'geotags' => 
    array (
      0 => 'delhi',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'strategic planning',
      2 => 'land use',
      3 => 'density',
      4 => 'transport mode share',
      5 => 'mixed use',
      6 => 'london',
      7 => 'new york',
      8 => 'berlin',
      9 => 'mumbai',
      10 => '\'shaping the city\'',
      11 => 'london plan',
      12 => 'thames gateway',
      13 => 'transport integration',
      14 => 'strategic city development plans',
      15 => 'urban development cycle',
      16 => '',
    ),
  ),
  276 => 
  array (
    'slug' => sanitize_title("Learning from Planning in Johannesburg "),
    'name' => 'Learning from Planning in Johannesburg ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:13:46',
    'geotags' => 
    array (
      0 => 'johannesburg',
    ),
    'tags' => 
    array (
      0 => 'johannesburg',
      1 => 'apartheid',
      2 => 'spatial segregation',
      3 => 'service delivery',
      4 => 'governance structure',
      5 => 'planning',
      6 => 'particapatory planning',
      7 => 'gauteng',
      8 => 'integration',
      9 => 'transport planning',
      10 => 'spatial planning',
      11 => 'challenges',
      12 => '',
    ),
  ),
  277 => 
  array (
    'slug' => sanitize_title("The São Paulo Case "),
    'name' => 'The São Paulo Case ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:09:51',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'planning',
      2 => 'challenges',
      3 => 'housing',
      4 => 'education',
      5 => 'governance structure',
      6 => '',
    ),
  ),
  278 => 
  array (
    'slug' => sanitize_title("Shaping Singapore "),
    'name' => 'Shaping Singapore ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:11:54',
    'geotags' => 
    array (
      0 => 'singapore',
    ),
    'tags' => 
    array (
      0 => 'singapore',
      1 => 'city profile',
      2 => 'planning history',
      3 => 'strategic planning',
      4 => 'public housing',
      5 => 'transport planning',
      6 => 'land use',
      7 => 'urban design',
      8 => '',
    ),
  ),
  279 => 
  array (
    'slug' => sanitize_title("Shaping Singapore "),
    'name' => 'Shaping Singapore ',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:11:54',
    'geotags' => 
    array (
      0 => 'singapore',
    ),
    'tags' => 
    array (
      0 => 'singapore',
      1 => 'city profile',
      2 => 'planning history',
      3 => 'strategic planning',
      4 => 'public housing',
      5 => 'transport planning',
      6 => 'land use',
      7 => 'urban design',
      8 => '',
    ),
  ),
  280 => 
  array (
    'slug' => sanitize_title("Governing Global Cities: Who Decides? "),
    'name' => 'Governing Global Cities: Who Decides? ',
    'format' => 'video; audio',
    'type' => 'talk',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:25:42',
    'geotags' => 
    array (
      0 => 'singapore',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'governance reform',
      2 => 'alternative city visions',
      3 => 'right to the city',
      4 => 'tensions of global cities',
      5 => 'exclusion',
      6 => 'global city agenda',
      7 => 'potential governance structures',
      8 => 'responsive government',
      9 => 'governance structure',
      10 => 'gobal city agenda vs local agenda',
      11 => 'reform challenges',
      12 => 'local democracy',
      13 => 'decentralization',
      14 => '(redo part 3)',
    ),
  ),
  281 => 
  array (
    'slug' => sanitize_title("Introduction"),
    'name' => 'Introduction',
    'format' => 'video; audio',
    'type' => 'introduction',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:04:36',
    'geotags' => 
    array (
      0 => 'singapore',
    ),
    'tags' => 
    array (
      0 => 'introduction',
      1 => 'inclusive growth',
      2 => 'mumbai',
      3 => 'delhi',
      4 => 'exclusion',
      5 => 'rural issues',
      6 => '',
    ),
  ),
  282 => 
  array (
    'slug' => sanitize_title("RUNNING CITIES DEBATE"),
    'name' => 'RUNNING CITIES DEBATE',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:16:34',
    'geotags' => 
    array (
      0 => 'delhi',
    ),
    'tags' => 
    array (
      0 => 'delhi',
      1 => '1982 asian games',
      2 => '2010 commonwealth games',
      3 => 'migration',
      4 => 'bureaucracy',
      5 => 'governance',
      6 => 'urban development',
      7 => 'commonwealth games village',
      8 => 'slum rehabilitation',
      9 => '',
    ),
  ),
  283 => 
  array (
    'slug' => sanitize_title("RUNNING CITIES DEBATE"),
    'name' => 'RUNNING CITIES DEBATE',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:11:41',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'governance',
      2 => 'disaster management',
      3 => 'infrastructure',
      4 => 'service delivery',
      5 => 'e-governance',
      6 => 'urban services',
      7 => '',
    ),
  ),
  284 => 
  array (
    'slug' => sanitize_title("RUNNING CITIES DEBATE"),
    'name' => 'RUNNING CITIES DEBATE',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:10:20',
    'geotags' => 
    array (
      0 => 'kolkata',
    ),
    'tags' => 
    array (
      0 => 'kolkata',
      1 => 'inclusive growth',
      2 => 'city management',
      3 => 'service delivery',
      4 => 'infrastrucure',
      5 => 'health',
      6 => 'education',
      7 => 'slum upgradation',
      8 => 'governance structure',
      9 => '',
    ),
  ),
  285 => 
  array (
    'slug' => sanitize_title("RUNNING CITIES DEBATE"),
    'name' => 'RUNNING CITIES DEBATE',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:11:32',
    'geotags' => 
    array (
      0 => 'mumbai',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'slums',
      2 => 'environment',
      3 => 'rural-urban migration',
      4 => 'housing',
      5 => 'slum rehabilitation',
      6 => 'mobility',
      7 => 'public transport',
      8 => 'infrastructure finance',
      9 => '',
    ),
  ),
  286 => 
  array (
    'slug' => sanitize_title("RUNNING CITIES DEBATE"),
    'name' => 'RUNNING CITIES DEBATE',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:11:25',
    'geotags' => 
    array (
      0 => 'bogota',
    ),
    'tags' => 
    array (
      0 => 'bogota',
      1 => 'inclusion',
      2 => 'class conflict',
      3 => 'inequality',
      4 => 'transport',
      5 => 'public vs private transport',
      6 => 'land ownership',
      7 => '',
    ),
  ),
  287 => 
  array (
    'slug' => sanitize_title("RUNNING CITIES DEBATE"),
    'name' => 'RUNNING CITIES DEBATE',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:16:26',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'sao paulo',
      1 => 'governance',
      2 => 'city financial default',
      3 => 'healthcare',
      4 => 'education',
      5 => 'traffic congestion',
      6 => 'slums',
      7 => 'city and state relationship',
      8 => 'transport system',
      9 => 'private sector involvement',
      10 => 'public space',
      11 => 'downtown revilitalization',
      12 => 'public festivals',
      13 => '',
    ),
  ),
  288 => 
  array (
    'slug' => sanitize_title("RUNNING CITIES DEBATE"),
    'name' => 'RUNNING CITIES DEBATE',
    'format' => 'video; audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:10:53',
    'geotags' => 
    array (
      0 => 'washington dc',
    ),
    'tags' => 
    array (
      0 => 'washington dc',
      1 => 'accountability',
      2 => 'city finances',
      3 => 'healthcare',
      4 => 'waterfront revitalization',
      5 => 'public consultation',
      6 => 'governance',
      7 => '',
    ),
  ),
  289 => 
  array (
    'slug' => sanitize_title("CLOSING REMARKS
"),
    'name' => 'CLOSING REMARKS
',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:10:53',
    'geotags' => 
    array (
      0 => 'washington dc',
    ),
    'tags' => 
    array (
      0 => 'washington dc',
      1 => 'accountability',
      2 => 'city finances',
      3 => 'healthcare',
      4 => 'waterfront revitalization',
      5 => 'public consultation',
      6 => 'governance',
      7 => '',
    ),
  ),
  290 => 
  array (
    'slug' => sanitize_title("CLOSING REMARKS"),
    'name' => 'CLOSING REMARKS',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:03:52',
    'geotags' => 
    array (
      0 => 'washington dc',
    ),
    'tags' => 
    array (
      0 => 'city design',
      1 => 'long term planning',
      2 => 'infrastructure',
      3 => 'private finance',
      4 => 'governance',
      5 => 'inequality',
      6 => 'institutions',
      7 => '',
    ),
  ),
  291 => 
  array (
    'slug' => sanitize_title("CLOSING REMARKS"),
    'name' => 'CLOSING REMARKS',
    'format' => 'audio; video',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:05:57',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'political leadership',
      1 => 'sao paulo',
      2 => 'governance',
      3 => 'reform',
      4 => 'transport',
      5 => 'fiscal reform',
      6 => 'electoral system',
      7 => 'brazil',
      8 => '',
    ),
  ),
  292 => 
  array (
    'slug' => sanitize_title("CLOSING REMARKS"),
    'name' => 'CLOSING REMARKS',
    'format' => 'audio; video',
    'type' => 'discussion',
    'date' => '03/11/2007',
    'language2' => 'English',
    'running_time' => '00:04:15',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'cities',
      2 => 'governance',
      3 => 'closing remarks',
      4 => 'acknowledgements',
      5 => '',
    ),
  ),
  293 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:11:53',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'cities',
      2 => 'governance',
      3 => 'closing remarks',
      4 => 'acknowledgements',
      5 => '',
    ),
  ),
  294 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:11:34',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'cities',
      2 => 'governance',
      3 => 'closing remarks',
      4 => 'acknowledgements',
      5 => '',
    ),
  ),
  295 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:04:52',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'cities',
      2 => 'governance',
      3 => 'closing remarks',
      4 => 'acknowledgements',
      5 => '',
    ),
  ),
  296 => 
  array (
    'slug' => sanitize_title("Urban Age Project"),
    'name' => 'Urban Age Project',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'English',
    'running_time' => '00:27:07',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  297 => 
  array (
    'slug' => sanitize_title("The German city network: a polycentric global city?"),
    'name' => 'The German city network: a polycentric global city?',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:18:40',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  298 => 
  array (
    'slug' => sanitize_title("Patterns of connectivity within the German city network"),
    'name' => 'Patterns of connectivity within the German city network',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:15:11',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  299 => 
  array (
    'slug' => sanitize_title("Germany\'s Metropolitan Network"),
    'name' => 'Germany\'s Metropolitan Network',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:04:45',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  300 => 
  array (
    'slug' => sanitize_title("Germany\'s Metropolitan Network"),
    'name' => 'Germany\'s Metropolitan Network',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:07:46',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  301 => 
  array (
    'slug' => sanitize_title("Germany\'s Metropolitan Network"),
    'name' => 'Germany\'s Metropolitan Network',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:05:43',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  302 => 
  array (
    'slug' => sanitize_title("Germany\'s Metropolitan Network"),
    'name' => 'Germany\'s Metropolitan Network',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:06:30',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  303 => 
  array (
    'slug' => sanitize_title("Germany\'s Metropolitan Network"),
    'name' => 'Germany\'s Metropolitan Network',
    'format' => 'audio',
    'type' => 'response',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:07:04',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  304 => 
  array (
    'slug' => sanitize_title("Germany\'s Metropolitan Network"),
    'name' => 'Germany\'s Metropolitan Network',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:26:36',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shrinking cities',
      2 => 'new york',
      3 => 'germany',
      4 => 'mexico city',
      5 => 'transport',
      6 => 'barcelona',
      7 => 'paris',
      8 => 'london',
      9 => 'growth',
      10 => 'shanghai',
      11 => 'bogotá',
      12 => 'poverty',
      13 => 'diversity',
      14 => 'density',
      15 => 'mobility',
      16 => 'railways',
    ),
  ),
  305 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'English',
    'running_time' => '00:16:35',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'global city',
      1 => 'frankfurt',
      2 => 'economy',
      3 => 'decentralization',
      4 => 'germany',
      5 => 'multipolar economy',
      6 => 'city networks',
      7 => 'european cities',
      8 => 'small cities?',
    ),
  ),
  306 => 
  array (
    'slug' => sanitize_title("Urban Development in Germany"),
    'name' => 'Urban Development in Germany',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:11:35',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'global city',
      1 => 'frankfurt',
      2 => 'economy',
      3 => 'decentralization',
      4 => 'germany',
      5 => 'multipolar economy',
      6 => 'city networks',
      7 => 'european cities',
      8 => 'small cities?',
    ),
  ),
  307 => 
  array (
    'slug' => sanitize_title("City of Halle"),
    'name' => 'City of Halle',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:09:44',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'global city',
      1 => 'frankfurt',
      2 => 'economy',
      3 => 'decentralization',
      4 => 'germany',
      5 => 'multipolar economy',
      6 => 'city networks',
      7 => 'european cities',
      8 => 'small cities?',
    ),
  ),
  308 => 
  array (
    'slug' => sanitize_title("Düsseldorf "),
    'name' => 'Düsseldorf ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:10:28',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'global city',
      1 => 'frankfurt',
      2 => 'economy',
      3 => 'decentralization',
      4 => 'germany',
      5 => 'multipolar economy',
      6 => 'city networks',
      7 => 'european cities',
      8 => 'small cities?',
    ),
  ),
  309 => 
  array (
    'slug' => sanitize_title("Hamburg"),
    'name' => 'Hamburg',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:11:45',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'global city',
      1 => 'frankfurt',
      2 => 'economy',
      3 => 'decentralization',
      4 => 'germany',
      5 => 'multipolar economy',
      6 => 'city networks',
      7 => 'european cities',
      8 => 'small cities?',
    ),
  ),
  310 => 
  array (
    'slug' => sanitize_title("European Cities in a Global Context"),
    'name' => 'European Cities in a Global Context',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '09/05/2006',
    'language2' => 'German',
    'running_time' => '00:06:42',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'global city',
      1 => 'frankfurt',
      2 => 'economy',
      3 => 'decentralization',
      4 => 'germany',
      5 => 'multipolar economy',
      6 => 'city networks',
      7 => 'european cities',
      8 => 'small cities?',
    ),
  ),
  311 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '10/05/2006',
    'language2' => 'English',
    'running_time' => '00:15:18',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'planning',
      2 => 'cinema',
      3 => 'art?',
      4 => 'kings cross',
      5 => 'redevelopment',
      6 => 'city life?',
      7 => 'germany',
      8 => 'shrinking cities',
      9 => 'halle',
    ),
  ),
  312 => 
  array (
    'slug' => sanitize_title("Building typology and urban space: Lessons from the European City"),
    'name' => 'Building typology and urban space: Lessons from the European City',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:13:26',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'planning',
      2 => 'cinema',
      3 => 'art?',
      4 => 'kings cross',
      5 => 'redevelopment',
      6 => 'city life?',
      7 => 'germany',
      8 => 'shrinking cities',
      9 => 'halle',
    ),
  ),
  313 => 
  array (
    'slug' => sanitize_title("Cityness and urban space"),
    'name' => 'Cityness and urban space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '10/05/2006',
    'language2' => 'English',
    'running_time' => '00:26:08',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'declining cities',
      1 => 'uneven growth',
      2 => 'uk',
      3 => 'london',
      4 => 'urban growth/decline',
      5 => 'minorities',
      6 => 'density',
      7 => 'taxation',
      8 => 'manchester',
      9 => 'regeneration',
      10 => 'infill',
    ),
  ),
  314 => 
  array (
    'slug' => sanitize_title("City Form and Urbanity"),
    'name' => 'City Form and Urbanity',
    'format' => 'audio',
    'type' => 'response',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:05:58',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'declining cities',
      1 => 'uneven growth',
      2 => 'uk',
      3 => 'london',
      4 => 'urban growth/decline',
      5 => 'minorities',
      6 => 'density',
      7 => 'taxation',
      8 => 'manchester',
      9 => 'regeneration',
      10 => 'infill',
    ),
  ),
  315 => 
  array (
    'slug' => sanitize_title("City Form and Urbanity"),
    'name' => 'City Form and Urbanity',
    'format' => 'audio',
    'type' => 'response',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:08:37',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'declining cities',
      1 => 'uneven growth',
      2 => 'uk',
      3 => 'london',
      4 => 'urban growth/decline',
      5 => 'minorities',
      6 => 'density',
      7 => 'taxation',
      8 => 'manchester',
      9 => 'regeneration',
      10 => 'infill',
    ),
  ),
  316 => 
  array (
    'slug' => sanitize_title("City Form and Urbanity"),
    'name' => 'City Form and Urbanity',
    'format' => 'audio',
    'type' => 'response',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:06:23',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'declining cities',
      1 => 'uneven growth',
      2 => 'uk',
      3 => 'london',
      4 => 'urban growth/decline',
      5 => 'minorities',
      6 => 'density',
      7 => 'taxation',
      8 => 'manchester',
      9 => 'regeneration',
      10 => 'infill',
    ),
  ),
  317 => 
  array (
    'slug' => sanitize_title("City Form and Urbanity"),
    'name' => 'City Form and Urbanity',
    'format' => 'audio',
    'type' => 'resposne',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:05:16',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'declining cities',
      1 => 'uneven growth',
      2 => 'uk',
      3 => 'london',
      4 => 'urban growth/decline',
      5 => 'minorities',
      6 => 'density',
      7 => 'taxation',
      8 => 'manchester',
      9 => 'regeneration',
      10 => 'infill',
    ),
  ),
  318 => 
  array (
    'slug' => sanitize_title("City Form and Urbanity"),
    'name' => 'City Form and Urbanity',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:17:22',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'declining cities',
      1 => 'uneven growth',
      2 => 'uk',
      3 => 'london',
      4 => 'urban growth/decline',
      5 => 'minorities',
      6 => 'density',
      7 => 'taxation',
      8 => 'manchester',
      9 => 'regeneration',
      10 => 'infill',
    ),
  ),
  319 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '10/05/2006',
    'language2' => 'English',
    'running_time' => '00:14:15',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  320 => 
  array (
    'slug' => sanitize_title("Urbanity without density"),
    'name' => 'Urbanity without density',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:12:13',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  321 => 
  array (
    'slug' => sanitize_title("Communication of growth and shrinkage"),
    'name' => 'Communication of growth and shrinkage',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:18:31',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  322 => 
  array (
    'slug' => sanitize_title("Success Beyond Growth"),
    'name' => 'Success Beyond Growth',
    'format' => 'audio',
    'type' => 'response',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:07:14',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  323 => 
  array (
    'slug' => sanitize_title("Success Beyond Growth"),
    'name' => 'Success Beyond Growth',
    'format' => 'audio',
    'type' => 'response',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:05:15',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  324 => 
  array (
    'slug' => sanitize_title("Success Beyond Growth"),
    'name' => 'Success Beyond Growth',
    'format' => 'audio',
    'type' => 'resposne',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:05:22',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  325 => 
  array (
    'slug' => sanitize_title("Success Beyond Growth"),
    'name' => 'Success Beyond Growth',
    'format' => 'audio',
    'type' => 'response',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:03:10',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  326 => 
  array (
    'slug' => sanitize_title("Success Beyond Growth"),
    'name' => 'Success Beyond Growth',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:22:17',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  327 => 
  array (
    'slug' => sanitize_title("German Cities . Résumé"),
    'name' => 'German Cities . Résumé',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:20:14',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  328 => 
  array (
    'slug' => sanitize_title("Closing Remarks"),
    'name' => 'Closing Remarks',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '10/05/2006',
    'language2' => 'German',
    'running_time' => '00:03:09',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'small sities',
      2 => 'uk',
      3 => 'declining cities',
      4 => 'policy',
      5 => 'regeneration/renewal',
      6 => 'urban decline',
      7 => '',
    ),
  ),
  329 => 
  array (
    'slug' => sanitize_title("Opening session"),
    'name' => 'Opening session',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2005-11 - 12',
    'language2' => 'English ',
    'running_time' => '2.21',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london school of economics',
      1 => 'urban age',
      2 => '',
    ),
  ),
  330 => 
  array (
    'slug' => sanitize_title("Urban Age project the story so far"),
    'name' => 'Urban Age project the story so far',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2005-11 - 12',
    'language2' => 'English ',
    'running_time' => '9.01',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'cities',
      2 => 'urban form',
      3 => 'growth',
      4 => 'london',
      5 => 'london school of economics',
      6 => 'cities program',
    ),
  ),
  331 => 
  array (
    'slug' => sanitize_title("Debate - The European City Model"),
    'name' => 'Debate - The European City Model',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '2.53',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'cities',
    ),
  ),
  332 => 
  array (
    'slug' => sanitize_title("Debate - The European City Model"),
    'name' => 'Debate - The European City Model',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '2005-11 - 12',
    'language2' => 'English ',
    'running_time' => '3.43',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'barcelona',
      1 => 'traditions',
      2 => 'character',
      3 => 'unity',
      4 => 'festivals',
    ),
  ),
  333 => 
  array (
    'slug' => sanitize_title("Debate - The European City Model"),
    'name' => 'Debate - The European City Model',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '2.19',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'amsterdam',
      1 => 'culture',
      2 => 'cultural heritage',
      3 => 'density',
    ),
  ),
  334 => 
  array (
    'slug' => sanitize_title("Debate - The European City Model"),
    'name' => 'Debate - The European City Model',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '2.52',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'budapest',
      1 => 'european cultures',
      2 => 'culture',
    ),
  ),
  335 => 
  array (
    'slug' => sanitize_title("Debate - The European City Model"),
    'name' => 'Debate - The European City Model',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '3.03',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'washington',
      1 => 'planned designed city',
      2 => 'public spaces',
      3 => 'divided',
    ),
  ),
  336 => 
  array (
    'slug' => sanitize_title("Debate - The European City Model"),
    'name' => 'Debate - The European City Model',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.36',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'brussels',
      1 => 'history',
      2 => 'festivals',
    ),
  ),
  337 => 
  array (
    'slug' => sanitize_title("Debate - The European City Model"),
    'name' => 'Debate - The European City Model',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '5.02',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'bogota',
      1 => 'equality',
      2 => 'inclusion',
      3 => '',
    ),
  ),
  338 => 
  array (
    'slug' => sanitize_title("Debate - The European City Model"),
    'name' => 'Debate - The European City Model',
    'format' => 'audio',
    'type' => 'discussion',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '3.58',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'culture',
      1 => 'history',
      2 => 'london',
      3 => 'diversity',
      4 => 'neighbourhoods',
      5 => 'identity',
    ),
  ),
  339 => 
  array (
    'slug' => sanitize_title("The Future of London "),
    'name' => 'The Future of London ',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '14.2',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'themes',
    ),
  ),
  340 => 
  array (
    'slug' => sanitize_title("London the Global Context"),
    'name' => 'London the Global Context',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '13.19',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'new york',
      2 => 'shanghai',
      3 => 'disadvantage',
      4 => 'transport',
      5 => 'ethnic minorities',
      6 => 'railway',
      7 => 'bus system',
      8 => 'growth',
      9 => 'accommdation',
      10 => 'infrastructure',
      11 => 'quality of life',
    ),
  ),
  341 => 
  array (
    'slug' => sanitize_title("Living In London "),
    'name' => 'Living In London ',
    'format' => 'audio ',
    'type' => 'talk ',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '14.04',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'housing',
      2 => 'families',
      3 => 'neighbourhoods',
      4 => 'east london',
      5 => 'ethnic minorities',
      6 => 'communities',
    ),
  ),
  342 => 
  array (
    'slug' => sanitize_title("Designing London "),
    'name' => 'Designing London ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '10.11',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'physical fabric',
      2 => 'design',
      3 => '',
    ),
  ),
  343 => 
  array (
    'slug' => sanitize_title("Moving in London "),
    'name' => 'Moving in London ',
    'format' => 'audio ',
    'type' => 'talk ',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '10.53',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'london',
      2 => 'infrastructure',
      3 => 'problems',
      4 => 'suburban',
      5 => 'public transport',
      6 => '',
    ),
  ),
  344 => 
  array (
    'slug' => sanitize_title("Delivering urban governance "),
    'name' => 'Delivering urban governance ',
    'format' => 'audio ',
    'type' => 'talk ',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '12.32',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'government',
      2 => 'public private partnerships',
      3 => 'decision making',
      4 => 'authority',
      5 => 'public',
    ),
  ),
  345 => 
  array (
    'slug' => sanitize_title("Debate "),
    'name' => 'Debate ',
    'format' => 'audio ',
    'type' => 'open discussion ',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '18.45',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'government',
      2 => 'public private partnerships',
      3 => 'decision making',
      4 => 'authority',
      5 => 'public',
    ),
  ),
  346 => 
  array (
    'slug' => sanitize_title("Expanding the City Core "),
    'name' => 'Expanding the City Core ',
    'format' => 'audio ',
    'type' => 'talk ',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.15',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'white city',
      1 => 'urban age',
      2 => 'london',
    ),
  ),
  347 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '21.33',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'white city scheme',
      1 => 'regeneration',
    ),
  ),
  348 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '16.4',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'labour market',
      1 => 'london',
      2 => 'conflict',
      3 => 'economy',
      4 => 'employment',
      5 => 'gender balance',
      6 => 'job location',
      7 => 'communting in london',
      8 => 'employment rates',
    ),
  ),
  349 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.37',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'white city project',
      1 => '\'problems\'',
      2 => 'intersection of economies',
      3 => '',
    ),
  ),
  350 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.26',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'employment',
      1 => 'london',
      2 => 'white city project',
      3 => 'labour markets',
      4 => 'fragmented',
    ),
  ),
  351 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.06',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'development',
      1 => 'designers',
      2 => 'design',
      3 => 'community',
      4 => 'office spaces',
      5 => '',
    ),
  ),
  352 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.44',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'social outcomes',
      1 => 'economic development',
      2 => 'labour market',
      3 => 'micro and macro level',
      4 => 'impacts of big projects',
      5 => 'employment growth',
      6 => 'growth',
      7 => 'london economy',
      8 => 'white city',
      9 => '',
    ),
  ),
  353 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.16',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'risk',
      1 => 'developers',
      2 => 'mobilty',
      3 => 'office developments',
      4 => 'london',
    ),
  ),
  354 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.5',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'white city development',
      1 => 'barreirs',
      2 => 'physical barreirs',
      3 => 'pycological barriers',
      4 => '',
    ),
  ),
  355 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '5.31',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'white city development',
      2 => 'form',
      3 => '',
    ),
  ),
  356 => 
  array (
    'slug' => sanitize_title("Expanding the City Core"),
    'name' => 'Expanding the City Core',
    'format' => 'audio',
    'type' => 'open discussion ',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '26.58',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'white city development',
      2 => 'form',
      3 => '',
    ),
  ),
  357 => 
  array (
    'slug' => sanitize_title("Changing Values"),
    'name' => 'Changing Values',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '4.24',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'elephant and castle',
      2 => 'urban age themes',
      3 => 'public space',
      4 => 'public life',
    ),
  ),
  358 => 
  array (
    'slug' => sanitize_title("Changing Values"),
    'name' => 'Changing Values',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '14.17',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'regeneration',
      1 => 'politics',
      2 => 'elephant and castle',
      3 => 'southwark',
      4 => 'regeneration projects',
      5 => 'london',
      6 => 'social housing',
      7 => 'jobs',
      8 => 'education',
      9 => 'social problems',
      10 => 'physical',
    ),
  ),
  359 => 
  array (
    'slug' => sanitize_title("Changing Values"),
    'name' => 'Changing Values',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '11.4',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'elephant and castle underpasses',
      1 => 'bus stops',
      2 => 'crime',
      3 => 'crime hotspot analysis',
      4 => 'crime prevention design',
      5 => 'communtiy engagement',
      6 => 'regeneration',
      7 => 'street crime',
      8 => 'heygate estate',
      9 => 'domestic violence',
      10 => '\'secured by design\'',
      11 => 'location',
      12 => 'good design',
      13 => 'crime and disorder act 1998',
      14 => 'solving crime',
    ),
  ),
  360 => 
  array (
    'slug' => sanitize_title("Changing Values"),
    'name' => 'Changing Values',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '51.4',
    'geotags' => 
    array (
      0 => 'sao paulo',
    ),
    'tags' => 
    array (
      0 => 'elephant and castle underpasses',
      1 => 'bus stops',
      2 => 'crime',
      3 => 'crime hotspot analysis',
      4 => 'crime prevention design',
      5 => 'communtiy engagement',
      6 => 'regeneration',
      7 => 'street crime',
      8 => 'heygate estate',
      9 => 'domestic violence',
      10 => '\'secured by design\'',
      11 => 'location',
      12 => 'good design',
      13 => 'crime and disorder act 1998',
      14 => 'solving crime',
    ),
  ),
  361 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11 - 12',
    'language2' => 'English',
    'running_time' => '3.53',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross development',
      1 => 'literature on kings cross',
      2 => '',
    ),
  ),
  362 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '16.18',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross development',
      1 => 'history of kings cross',
      2 => 'connection of hubs',
      3 => 'euston road',
      4 => 'uses of spaces',
      5 => 'transport hub',
      6 => 'major issues kings cross faces',
      7 => 'nature of transport hub',
      8 => 'front of station',
      9 => 'kings cross masterplan',
      10 => 'urban fabric',
      11 => '',
    ),
  ),
  363 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '13.08',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross development',
      1 => 'opportunity',
      2 => 'challenges',
      3 => 'actors involved',
      4 => 'complexity',
      5 => 'process challenges',
      6 => 'tfl',
      7 => 'integration',
      8 => 'transport',
      9 => 'movement',
      10 => 'connection with space channel tunnel rail link',
      11 => 'physical infrastructure',
      12 => 'pedestrain movement',
      13 => 'vehicle movement',
      14 => 'uses of space',
      15 => 'integrate movement and space',
      16 => 'different transport modes',
      17 => '',
    ),
  ),
  364 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '4.07',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross',
      1 => 'urban regional and european fabric',
      2 => 'human scale',
    ),
  ),
  365 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '5.27',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross regeneration',
      1 => 'imprint of transport technology',
      2 => 'social and physical fabric',
      3 => 'catchment area',
      4 => 'local and transient population',
      5 => '',
    ),
  ),
  366 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '4.55',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'mega transport project successes',
      1 => 'failures',
      2 => 'criteria for measuring success',
      3 => 'historical knowledge',
      4 => 'better knowledge base',
      5 => '',
    ),
  ),
  367 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '4.42',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross development',
      1 => 'place',
      2 => 'perception',
      3 => 'permibilty',
      4 => 'kings cross opportunities',
      5 => 'resolve barreirs',
      6 => 'uses of places',
      7 => 'attract people',
      8 => '',
    ),
  ),
  368 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '6.04',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross development',
      1 => 'public space',
      2 => '',
    ),
  ),
  369 => 
  array (
    'slug' => sanitize_title("Bringing London Together"),
    'name' => 'Bringing London Together',
    'format' => 'audio',
    'type' => 'open discussion',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '12.34',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross development',
      1 => 'public space',
      2 => '',
    ),
  ),
  370 => 
  array (
    'slug' => sanitize_title("Accommodation Growth Or Conflict"),
    'name' => 'Accommodation Growth Or Conflict',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '0.12',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross development',
      1 => 'public space',
      2 => '',
    ),
  ),
  371 => 
  array (
    'slug' => sanitize_title("Accommodation Growth Or Conflict"),
    'name' => 'Accommodation Growth Or Conflict',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '0.12',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'kings cross development',
      1 => 'public space',
      2 => '',
    ),
  ),
  372 => 
  array (
    'slug' => sanitize_title("Accommodation Growth Or Conflict"),
    'name' => 'Accommodation Growth Or Conflict',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '11.59',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'lea valley',
      1 => 'communties',
      2 => 'social clusters',
      3 => 'public open spaces',
      4 => 'olympics',
      5 => 'lea valley park',
      6 => 'infrastructure of olympics',
      7 => '',
    ),
  ),
  373 => 
  array (
    'slug' => sanitize_title("Accommodation Growth Or Conflict"),
    'name' => 'Accommodation Growth Or Conflict',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '01:14:04',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'lea valley',
      1 => 'communties',
      2 => 'social clusters',
      3 => 'public open spaces',
      4 => 'olympics',
      5 => 'lea valley park',
      6 => 'infrastructure of olympics',
      7 => '',
    ),
  ),
  374 => 
  array (
    'slug' => sanitize_title("Planning in a unplanned City"),
    'name' => 'Planning in a unplanned City',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '13.41',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'design',
      1 => 'planning',
      2 => 'architecture',
      3 => 'solving problems',
      4 => 'adding value',
      5 => 'effieciency',
      6 => 'expressive capacity',
      7 => 'purpose of design',
      8 => 'four conditions for success of design',
      9 => 'economy',
      10 => 'knowledge communities',
    ),
  ),
  375 => 
  array (
    'slug' => sanitize_title("Planning in a unplanned City"),
    'name' => 'Planning in a unplanned City',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '19.07',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'mega projects',
      1 => 'planning',
      2 => 'planners',
      3 => 'visions',
      4 => 'pysical planning',
      5 => 'renewal',
      6 => 'ideas',
      7 => 'desciplinery boundries',
      8 => 'comprehensiveness',
      9 => 'pysical form',
      10 => 'delivery of major projects',
      11 => '',
    ),
  ),
  376 => 
  array (
    'slug' => sanitize_title("Planning in a unplanned City"),
    'name' => 'Planning in a unplanned City',
    'format' => 'audio',
    'type' => 'discussion ',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '55.42',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'mega projects',
      1 => 'planning',
      2 => 'planners',
      3 => 'visions',
      4 => 'pysical planning',
      5 => 'renewal',
      6 => 'ideas',
      7 => 'desciplinery boundries',
      8 => 'comprehensiveness',
      9 => 'pysical form',
      10 => 'delivery of major projects',
      11 => '',
    ),
  ),
  377 => 
  array (
    'slug' => sanitize_title("London in the Urban Age"),
    'name' => 'London in the Urban Age',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '9.19',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'urbanity\'',
      1 => 'complexity',
      2 => 'relationship between social and visual',
      3 => 'community',
      4 => 'urban design',
      5 => 'mega projects',
      6 => '',
    ),
  ),
  378 => 
  array (
    'slug' => sanitize_title("London in the Urban Age"),
    'name' => 'London in the Urban Age',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '5.32',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'major attacks',
      1 => 'public space',
      2 => 'social control',
      3 => 'major projects',
      4 => 'vunerable cities',
      5 => '',
    ),
  ),
  379 => 
  array (
    'slug' => sanitize_title("London in the Urban Age"),
    'name' => 'London in the Urban Age',
    'format' => 'audio',
    'type' => 'discussion ',
    'date' => '2005-11- 13',
    'language2' => 'English',
    'running_time' => '40.11',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'major attacks',
      1 => 'public space',
      2 => 'social control',
      3 => 'major projects',
      4 => 'vunerable cities',
      5 => '',
    ),
  ),
  380 => 
  array (
    'slug' => sanitize_title("Opening "),
    'name' => 'Opening ',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '00:06:10',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => '',
    ),
  ),
  381 => 
  array (
    'slug' => sanitize_title("Opening"),
    'name' => 'Opening',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '11.21',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'lse',
      2 => 'berlin',
    ),
  ),
  382 => 
  array (
    'slug' => sanitize_title("Opening"),
    'name' => 'Opening',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'German ',
    'running_time' => '17.12',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'lse',
      2 => 'berlin',
    ),
  ),
  383 => 
  array (
    'slug' => sanitize_title("Opening"),
    'name' => 'Opening',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'German ',
    'running_time' => '23.23',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'lse',
      2 => 'berlin',
    ),
  ),
  384 => 
  array (
    'slug' => sanitize_title("Introduction "),
    'name' => 'Introduction ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '23.38',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'shanghai',
      2 => 'mexico city',
      3 => 'caracas',
      4 => 'london',
      5 => 'new york',
      6 => 'city growth',
      7 => 'rural-urban migration',
      8 => 'energy consumption',
      9 => 'density',
      10 => 'quality of life',
      11 => 'sustainability',
      12 => 'johannesburg',
      13 => 'berlin',
      14 => 'cairo',
      15 => 'architecture',
      16 => 'public space',
    ),
  ),
  385 => 
  array (
    'slug' => sanitize_title("Introduction"),
    'name' => 'Introduction',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '37.17',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'policy',
      2 => 'sustainability',
      3 => 'globalisation',
      4 => 'city growth',
      5 => 'sprawl',
      6 => 'migration',
      7 => 'city networks',
      8 => 'environment',
      9 => 'slums',
      10 => 'new york',
      11 => 'shanghai',
      12 => 'london',
      13 => 'mexico city',
      14 => 'johannesburg',
      15 => 'governance',
      16 => 'planning',
      17 => 'usa',
      18 => 'cityness',
      19 => 'diversity',
      20 => 'nation-states',
      21 => '',
    ),
  ),
  386 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '2.44',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'n/a',
    ),
  ),
  387 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '22.37',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'globalisation',
      1 => 'urban age',
      2 => 'economy',
      3 => 'global cities',
      4 => 'city networks',
      5 => 'service sector',
      6 => 'knowledge economy',
      7 => 'density',
      8 => 'informality',
      9 => 'creativity',
      10 => 'culture',
      11 => 'employment',
    ),
  ),
  388 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '5.33',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'columbia university',
      2 => 'bronx terminal market',
      3 => 'atlantic yards project',
      4 => 'community benefits agreements',
      5 => 'housing',
      6 => 'jobs',
    ),
  ),
  389 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '5.2',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'africa',
      1 => 'african cities',
      2 => 'urban theory',
      3 => 'informality',
    ),
  ),
  390 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '4.11',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'informality',
      2 => 'informal housing',
      3 => 'informal economy',
      4 => '',
    ),
  ),
  391 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2006 - 11 - 10',
    'language2' => 'German',
    'running_time' => '5.48',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'informality',
      2 => 'informal housing',
      3 => 'informal economy',
      4 => '',
    ),
  ),
  392 => 
  array (
    'slug' => sanitize_title("Labour Market and Work Places"),
    'name' => 'Labour Market and Work Places',
    'format' => 'audio',
    'type' => 'open discussion ',
    'date' => '2006 - 11 - 10',
    'language2' => 'English ',
    'running_time' => '28.48',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'informality',
      2 => 'informal housing',
      3 => 'informal economy',
      4 => '',
    ),
  ),
  393 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'talk ',
    'date' => '2006 - 11 - 10',
    'language2' => 'English ',
    'running_time' => '28.48',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'informality',
      2 => 'informal housing',
      3 => 'informal economy',
      4 => '',
    ),
  ),
  394 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '24.56',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'democracy',
      2 => 'public space',
      3 => 'walking',
      4 => 'inclusion',
      5 => 'cars',
      6 => 'pedestrians',
      7 => 'road safety',
      8 => 'transport policy',
      9 => 'bogotá',
      10 => 'inequality',
      11 => 'mobility',
      12 => 'london',
      13 => 'new york',
      14 => 'shanghai',
      15 => 'johannesburg',
      16 => 'mexico city',
      17 => 'public transport',
      18 => 'density',
      19 => 'bicycles/cycling',
      20 => 'railways',
      21 => 'buses',
    ),
  ),
  395 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '6.05',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'transport policy',
      2 => 'london',
      3 => 'governance',
      4 => 'ken livingstone',
      5 => 'congestion charge',
      6 => 'public transport',
      7 => 'inclusion',
      8 => 'sustainability',
    ),
  ),
  396 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'German ',
    'running_time' => '6.3',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'transport policy',
      2 => 'london',
      3 => 'governance',
      4 => 'ken livingstone',
      5 => 'congestion charge',
      6 => 'public transport',
      7 => 'inclusion',
      8 => 'sustainability',
    ),
  ),
  397 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '7.49',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'cars',
      2 => 'mobility',
      3 => 'parking',
      4 => 'public transport',
      5 => 'germany',
      6 => 'planning',
      7 => 'transport policy',
    ),
  ),
  398 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '7.06',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'transport policy',
      2 => 'public space',
      3 => 'democracy',
      4 => 'diversity',
      5 => '',
    ),
  ),
  399 => 
  array (
    'slug' => sanitize_title("Mobility and Transport"),
    'name' => 'Mobility and Transport',
    'format' => 'audio',
    'type' => 'open discussion ',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '28.52',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'transport policy',
      2 => 'public space',
      3 => 'democracy',
      4 => 'diversity',
      5 => '',
    ),
  ),
  400 => 
  array (
    'slug' => sanitize_title("Panel discussion "),
    'name' => 'Panel discussion ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'German',
    'running_time' => '12.12',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'transport policy',
      2 => 'public space',
      3 => 'democracy',
      4 => 'diversity',
      5 => '',
    ),
  ),
  401 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '12.31',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'democracy',
      2 => 'london',
      3 => 'shanghai',
      4 => 'new york',
      5 => 'fragmentation',
      6 => 'metropolitan regions',
      7 => 'johanensburg',
      8 => 'berlin',
      9 => 'regionalism',
      10 => 'globalisation',
      11 => 'economy',
      12 => 'global city',
      13 => 'privatisation',
      14 => 'public-private partnerships',
      15 => 'immigrants',
      16 => 'local government',
    ),
  ),
  402 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '4.29',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'washington dc',
      1 => 'governance',
      2 => 'democracy',
      3 => 'participation',
      4 => 'planning',
      5 => 'policy',
      6 => 'metropolitan region',
      7 => '',
    ),
  ),
  403 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '8.13',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'demography',
      2 => 'economy',
      3 => 'transport',
      4 => 'environment',
      5 => 'governance',
      6 => 'fragmentation',
      7 => 'democracy',
      8 => 'electoral system',
      9 => 'local government',
    ),
  ),
  404 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '7.45',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'governance',
      2 => 'local government',
      3 => 'cape town',
      4 => 'johannesburg',
      5 => 'fragmentation',
      6 => 'metropolitan regions',
      7 => 'south african cities networks',
      8 => 'gauteng global city region project',
    ),
  ),
  405 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '4.17',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'governance',
      2 => 'local government',
      3 => 'accountability',
      4 => 'democracy',
    ),
  ),
  406 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'English',
    'running_time' => '9.16',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'metropolitan region',
      2 => 'planning',
      3 => 'governance',
      4 => 'fragmentation',
      5 => 'leadership',
      6 => 'transport',
      7 => 'cbd',
      8 => 'city growth',
    ),
  ),
  407 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 10',
    'language2' => 'German',
    'running_time' => '7.54',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'metropolitan region',
      2 => 'planning',
      3 => 'governance',
      4 => 'fragmentation',
      5 => 'leadership',
      6 => 'transport',
      7 => 'cbd',
      8 => 'city growth',
    ),
  ),
  408 => 
  array (
    'slug' => sanitize_title("Public life and urban space"),
    'name' => 'Public life and urban space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German',
    'running_time' => '7.54',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'metropolitan region',
      2 => 'planning',
      3 => 'governance',
      4 => 'fragmentation',
      5 => 'leadership',
      6 => 'transport',
      7 => 'cbd',
      8 => 'city growth',
    ),
  ),
  409 => 
  array (
    'slug' => sanitize_title("Public life and urban space"),
    'name' => 'Public life and urban space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German',
    'running_time' => '7.54',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'metropolitan region',
      2 => 'planning',
      3 => 'governance',
      4 => 'fragmentation',
      5 => 'leadership',
      6 => 'transport',
      7 => 'cbd',
      8 => 'city growth',
    ),
  ),
  410 => 
  array (
    'slug' => sanitize_title("Public life and urban space"),
    'name' => 'Public life and urban space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German ',
    'running_time' => '5.54',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'metropolitan region',
      2 => 'planning',
      3 => 'governance',
      4 => 'fragmentation',
      5 => 'leadership',
      6 => 'transport',
      7 => 'cbd',
      8 => 'city growth',
    ),
  ),
  411 => 
  array (
    'slug' => sanitize_title("Public life and urban space"),
    'name' => 'Public life and urban space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '8.23',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'policing',
      2 => 'india',
      3 => 'terrorism',
      4 => 'mumbai bombings',
      5 => 'crime',
      6 => 'disaster relief',
      7 => 'transport',
    ),
  ),
  412 => 
  array (
    'slug' => sanitize_title("Public life and urban space"),
    'name' => 'Public life and urban space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '8.25',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'race',
      1 => 'exclusion',
      2 => 'godby vs. montgomery',
      3 => 'alabama',
      4 => 'immigration',
      5 => 'crime',
      6 => 'policing',
      7 => 'legitimacy',
      8 => 'social inclusion',
      9 => 'safety',
      10 => 'equality',
      11 => 'democracy',
      12 => 'urban design?',
    ),
  ),
  413 => 
  array (
    'slug' => sanitize_title("Public life and urban space"),
    'name' => 'Public life and urban space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '9.01',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'safety',
      1 => 'fear',
      2 => 'crime',
      3 => 'inclusion',
      4 => 'terrorism',
      5 => 'security',
      6 => 'policing',
      7 => 'paris',
      8 => 'paris riots',
    ),
  ),
  414 => 
  array (
    'slug' => sanitize_title("Public life and urban space"),
    'name' => 'Public life and urban space',
    'format' => 'audio',
    'type' => 'open discussion ',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '48.59',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'safety',
      1 => 'fear',
      2 => 'crime',
      3 => 'inclusion',
      4 => 'terrorism',
      5 => 'security',
      6 => 'policing',
      7 => 'paris',
      8 => 'paris riots',
    ),
  ),
  415 => 
  array (
    'slug' => sanitize_title("Reflection"),
    'name' => 'Reflection',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '17.26',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'planning',
      1 => 'urban design',
      2 => 'shanghai',
      3 => 'urban age',
      4 => 'brittle city',
      5 => 'open city',
      6 => 'gated communities',
      7 => 'streets',
      8 => 'ecology',
      9 => 'mixed use?',
      10 => 'centralisation',
      11 => 'new york',
      12 => 'johannesburg',
      13 => 'architecture',
      14 => 'adaptability',
      15 => 'berlin',
    ),
  ),
  416 => 
  array (
    'slug' => sanitize_title("Housing and urban neighbourhoods"),
    'name' => 'Housing and urban neighbourhoods',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '17.26',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'planning',
      1 => 'urban design',
      2 => 'shanghai',
      3 => 'urban age',
      4 => 'brittle city',
      5 => 'open city',
      6 => 'gated communities',
      7 => 'streets',
      8 => 'ecology',
      9 => 'mixed use?',
      10 => 'centralisation',
      11 => 'new york',
      12 => 'johannesburg',
      13 => 'architecture',
      14 => 'adaptability',
      15 => 'berlin',
    ),
  ),
  417 => 
  array (
    'slug' => sanitize_title("Housing and urban neighbourhoods"),
    'name' => 'Housing and urban neighbourhoods',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '19.21',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'architecture',
      2 => 'density',
      3 => 'streets',
      4 => 'urban design',
      5 => 'cairo',
      6 => 'public space',
      7 => 'johannesburg',
      8 => 'barcelona',
      9 => 'planning',
      10 => 'berlin',
      11 => 'new york',
      12 => 'alexandra',
      13 => 'gated communities',
      14 => 'shanghai',
      15 => 'london',
      16 => 'notting hill',
      17 => 'adaptability',
      18 => 'caracas',
      19 => '',
    ),
  ),
  418 => 
  array (
    'slug' => sanitize_title("Housing and urban neighbourhoods"),
    'name' => 'Housing and urban neighbourhoods',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '5.59',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'density',
      2 => 'overcrowding?',
    ),
  ),
  419 => 
  array (
    'slug' => sanitize_title("Housing and urban neighbourhoods"),
    'name' => 'Housing and urban neighbourhoods',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '5.49',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban decay',
      1 => '\'ruination\'/\'ruins\'',
      2 => 'migration\' immigrants',
      3 => 'fear',
      4 => 'safety',
      5 => 'public space',
    ),
  ),
  420 => 
  array (
    'slug' => sanitize_title("Housing and urban neighbourhoods"),
    'name' => 'Housing and urban neighbourhoods',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '8.38',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'land use',
      1 => 'sprawl',
      2 => 'migration',
      3 => 'demography',
      4 => 'segregation',
      5 => 'housing',
      6 => 'london',
      7 => 'renewal',
      8 => 'reuse',
      9 => 'cars',
      10 => 'community policing',
    ),
  ),
  421 => 
  array (
    'slug' => sanitize_title("Housing and urban neighbourhoods"),
    'name' => 'Housing and urban neighbourhoods',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '5.53',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'redevelopment',
      1 => 'urban design',
      2 => 'race',
      3 => 'segregation',
      4 => 'education',
      5 => 'professionalism',
      6 => 'universities',
      7 => 'interdisciplinarity',
      8 => 'planning',
    ),
  ),
  422 => 
  array (
    'slug' => sanitize_title("Housing and urban neighbourhoods"),
    'name' => 'Housing and urban neighbourhoods',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '4.59',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'housing',
      2 => 'domestic space',
      3 => 'public space',
      4 => 'informality',
    ),
  ),
  423 => 
  array (
    'slug' => sanitize_title("German Cities"),
    'name' => 'German Cities',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German',
    'running_time' => '5.43',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'housing',
      2 => 'domestic space',
      3 => 'public space',
      4 => 'informality',
    ),
  ),
  424 => 
  array (
    'slug' => sanitize_title("German Cities"),
    'name' => 'German Cities',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German',
    'running_time' => '15.09',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'housing',
      2 => 'domestic space',
      3 => 'public space',
      4 => 'informality',
    ),
  ),
  425 => 
  array (
    'slug' => sanitize_title("Panel discussion "),
    'name' => 'Panel discussion ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German',
    'running_time' => '15.09',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'south africa',
      1 => 'housing',
      2 => 'domestic space',
      3 => 'public space',
      4 => 'informality',
    ),
  ),
  426 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '21.53',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'energy consumption',
      1 => 'architecture',
      2 => 'density',
      3 => 'berlin',
      4 => 'london',
      5 => 'world squares project',
      6 => 'trafalgar square',
      7 => 'pedestrians',
      8 => 'millenium bridge',
      9 => 'swiss re building',
      10 => 'public space',
      11 => 'ecological buildings',
      12 => 'reichstag',
      13 => 'free university library',
      14 => 'airports',
      15 => 'beijing',
    ),
  ),
  427 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German',
    'running_time' => '5.57',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'energy consumption',
      1 => 'architecture',
      2 => 'density',
      3 => 'berlin',
      4 => 'london',
      5 => 'world squares project',
      6 => 'trafalgar square',
      7 => 'pedestrians',
      8 => 'millenium bridge',
      9 => 'swiss re building',
      10 => 'public space',
      11 => 'ecological buildings',
      12 => 'reichstag',
      13 => 'free university library',
      14 => 'airports',
      15 => 'beijing',
    ),
  ),
  428 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '4.25',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'berlin',
      1 => 'london',
      2 => 'property development',
      3 => 'symbolism',
    ),
  ),
  429 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German',
    'running_time' => '4.48',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'berlin',
      1 => 'london',
      2 => 'property development',
      3 => 'symbolism',
    ),
  ),
  430 => 
  array (
    'slug' => sanitize_title("Panel discussion"),
    'name' => 'Panel discussion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'German',
    'running_time' => '9.1',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'berlin',
      1 => 'london',
      2 => 'property development',
      3 => 'symbolism',
    ),
  ),
  431 => 
  array (
    'slug' => sanitize_title("Reflection "),
    'name' => 'Reflection ',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '9.43',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'architecture',
      2 => 'governance',
      3 => 'policing',
      4 => 'transport',
      5 => 'economy',
      6 => 'sustainability',
      7 => 'security',
    ),
  ),
  432 => 
  array (
    'slug' => sanitize_title("Reflection"),
    'name' => 'Reflection',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '2.32',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'architecture',
      2 => 'governance',
      3 => 'policing',
      4 => 'transport',
      5 => 'economy',
      6 => 'sustainability',
      7 => 'security',
    ),
  ),
  433 => 
  array (
    'slug' => sanitize_title("Reflection"),
    'name' => 'Reflection',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '2006 - 11 - 11',
    'language2' => 'English',
    'running_time' => '4.54',
    'geotags' => 
    array (
      0 => 'berlin',
    ),
    'tags' => 
    array (
      0 => 'urban age',
    ),
  ),
  434 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 5.48 Video: 5.49',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'urban age conference',
      1 => 'istanbul',
      2 => 'turkey',
      3 => 'lse',
      4 => 'duetsche bank',
    ),
  ),
  435 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 9.38 Video: 9.40',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'lse',
      1 => 'urban age',
      2 => 'conferences',
      3 => 'collaboration',
      4 => 'chicago',
      5 => 'istanbul',
      6 => 'universities',
      7 => 'problems',
      8 => 'global cities',
      9 => 'academic.',
    ),
  ),
  436 => 
  array (
    'slug' => sanitize_title("Introducing the urban age"),
    'name' => 'Introducing the urban age',
    'format' => 'audio + video ',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 31.09 Video: 31.08',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'global',
      1 => 'slums',
      2 => 'environment',
      3 => 'energy',
      4 => 'consumption',
      5 => 'sustainable',
      6 => 'growth',
      7 => 'economic',
      8 => 'asia',
      9 => 'africa south america',
      10 => 'national economy',
      11 => 'gdp',
      12 => 'wealth',
      13 => 'informal sector',
      14 => 'culture',
      15 => 'consumption',
      16 => 'climate change',
      17 => 'transport',
      18 => 'istanbul',
      19 => 'built form',
      20 => 'architecture',
      21 => 'public space',
      22 => 'regeneration',
      23 => 'cityness.',
    ),
  ),
  437 => 
  array (
    'slug' => sanitize_title("Introducing the urban age"),
    'name' => 'Introducing the urban age',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 13.46 Video: 13.52',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul',
      1 => 'people',
      2 => 'quality of life',
      3 => 'younger population',
      4 => 'economical',
      5 => 'jobs',
      6 => 'traffic congestion',
      7 => 'crime',
      8 => 'education',
      9 => 'environment',
      10 => 'house prices.',
    ),
  ),
  438 => 
  array (
    'slug' => sanitize_title("Cities in the global context"),
    'name' => 'Cities in the global context',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'English',
    'running_time' => '9.4',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'lse',
      1 => 'urban age',
      2 => 'conferences',
      3 => 'collaboration',
      4 => 'chicago',
      5 => 'istanbul',
      6 => 'universities',
      7 => 'problems',
      8 => 'global cities',
      9 => 'academic.',
    ),
  ),
  439 => 
  array (
    'slug' => sanitize_title("Cities in the global context"),
    'name' => 'Cities in the global context',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11- 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 21.50 Video: 21.45',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'macroeconomic',
      1 => 'urban development',
      2 => 'history',
      3 => 'world',
      4 => 'economy',
      5 => 'urbanization',
      6 => 'growth',
      7 => 'economic growth',
      8 => 'country',
      9 => 'acceleration',
      10 => 'gdp',
      11 => 'global growth',
      12 => 'convergence',
      13 => 'divergence',
      14 => 'structural transformation',
      15 => 'technology',
      16 => 'climate change',
      17 => 'cities.',
    ),
  ),
  440 => 
  array (
    'slug' => sanitize_title("Cities in the global context"),
    'name' => 'Cities in the global context',
    'format' => 'audio + video',
    'type' => 'talk ',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 16.44 Video:16.50',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'economy',
      1 => 'low-carbon',
      2 => 'innovation',
      3 => 'sustainable growth',
      4 => 'recession',
      5 => 'unemployment',
      6 => 'metropolitan',
    ),
  ),
  441 => 
  array (
    'slug' => sanitize_title("Cities in the global context"),
    'name' => 'Cities in the global context',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'English',
    'running_time' => '13.16',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'financing',
      1 => 'economy',
      2 => 'private sector',
      3 => 'public sector',
      4 => 'economic environment',
      5 => 'capital',
      6 => 'consumption',
      7 => 'urbanization',
      8 => 'housing',
      9 => 'public private partnership',
      10 => 'duetche bank',
      11 => 'risk',
      12 => 'cities',
    ),
  ),
  442 => 
  array (
    'slug' => sanitize_title("Cities in the global context"),
    'name' => 'Cities in the global context',
    'format' => 'audio + video',
    'type' => 'discussion ',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 54.58 Video: 54.27',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'financing',
      1 => 'economy',
      2 => 'private sector',
      3 => 'public sector',
      4 => 'economic environment',
      5 => 'capital',
      6 => 'consumption',
      7 => 'urbanization',
      8 => 'housing',
      9 => 'public private partnership',
      10 => 'duetche bank',
      11 => 'risk',
      12 => 'cities',
    ),
  ),
  443 => 
  array (
    'slug' => sanitize_title("Cities and social capital"),
    'name' => 'Cities and social capital',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 20.41 Video: 20.40',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul',
      1 => 'global',
      2 => 'flows',
      3 => 'governance',
      4 => 'human capital',
      5 => 'networks',
      6 => 'europe',
      7 => 'turkey',
      8 => 'capital flows',
      9 => 'investment',
      10 => 'emigration',
      11 => 'migration',
      12 => 'professionals',
      13 => 'mobility',
      14 => 'germany',
      15 => 'russia and bulgaria',
      16 => 'capital flows',
      17 => 'politics',
      18 => 'culture',
      19 => 'foreign investment.',
    ),
  ),
  444 => 
  array (
    'slug' => sanitize_title("Cities and social capital"),
    'name' => 'Cities and social capital',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 -05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 17.58   Video: 17.55',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'turkey',
      1 => 'istanbul',
      2 => 'economy',
      3 => 'growth',
      4 => 'change',
      5 => 'mobility',
      6 => 'political context of turkey',
      7 => 'housing',
      8 => 'economical functions of istanbul',
      9 => '',
    ),
  ),
  445 => 
  array (
    'slug' => sanitize_title("Cities and social capital"),
    'name' => 'Cities and social capital',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio:16.35   Video: 16.37 ',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'global capital',
      1 => 'istanbul',
      2 => 'global economy',
      3 => 'globalisation',
      4 => 'political change',
      5 => 'local government',
      6 => 'urban coalitions',
      7 => 'property structure',
      8 => 'privatisation of land',
      9 => 'land as a commidity',
      10 => 'capitalist city',
      11 => '',
    ),
  ),
  446 => 
  array (
    'slug' => sanitize_title("Cities and social capital"),
    'name' => 'Cities and social capital',
    'format' => 'audio + video',
    'type' => 'discussion ',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio:13.24   Video: 13.37',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'global capital',
      1 => 'istanbul',
      2 => 'global economy',
      3 => 'globalisation',
      4 => 'political change',
      5 => 'local government',
      6 => 'urban coalitions',
      7 => 'property structure',
      8 => 'privatisation of land',
      9 => 'land as a commidity',
      10 => 'capitalist city',
      11 => '',
    ),
  ),
  447 => 
  array (
    'slug' => sanitize_title("Cities and social capital"),
    'name' => 'Cities and social capital',
    'format' => 'audio + video',
    'type' => 'discussion',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio:22.45   Video: 22.48',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'global capital',
      1 => 'istanbul',
      2 => 'global economy',
      3 => 'globalisation',
      4 => 'political change',
      5 => 'local government',
      6 => 'urban coalitions',
      7 => 'property structure',
      8 => 'privatisation of land',
      9 => 'land as a commidity',
      10 => 'capitalist city',
      11 => '',
    ),
  ),
  448 => 
  array (
    'slug' => sanitize_title("Cities and cultures"),
    'name' => 'Cities and cultures',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio:19.25   Video: 19.28',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'hinge city',
      1 => 'community',
      2 => 'quality of life',
      3 => 'communal life',
      4 => 'urban development',
      5 => 'families',
      6 => 'communal bonds',
      7 => 'housing',
      8 => 'bonds of intimacy',
    ),
  ),
  449 => 
  array (
    'slug' => sanitize_title("Cities and cultures"),
    'name' => 'Cities and cultures',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 11.42  Video: 11.46',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul: gated communties',
      1 => 'mumbai',
      2 => 'slums',
      3 => 'journalism',
      4 => 'storytelling in cities',
      5 => 'unofficial stories',
      6 => 'migrant stories',
      7 => 'media',
    ),
  ),
  450 => 
  array (
    'slug' => sanitize_title("Cities and cultures"),
    'name' => 'Cities and cultures',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 14.25  Video: 14.26',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul',
      1 => 'democratic city',
      2 => 'consultation',
      3 => 'owners of cities',
    ),
  ),
  451 => 
  array (
    'slug' => sanitize_title("Cities and cultures"),
    'name' => 'Cities and cultures',
    'format' => 'audio + video',
    'type' => 'discussion ',
    'date' => '2009 - 11 -05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 20.08  Video: 20.11',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul',
      1 => 'democratic city',
      2 => 'consultation',
      3 => 'owners of cities',
    ),
  ),
  452 => 
  array (
    'slug' => sanitize_title("Confronting history and urban change "),
    'name' => 'Confronting history and urban change ',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 -05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 18.21  Video: 18.20',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'see above',
    ),
  ),
  453 => 
  array (
    'slug' => sanitize_title("Confronting history and urban change"),
    'name' => 'Confronting history and urban change',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009 - 11 -05',
    'language2' => 'Video: Turkish, Audio: English',
    'running_time' => 'Audio: 32.15  Video: 32.18',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'dna',
      1 => 'istanbul',
      2 => 'spatial',
      3 => 'social dna',
      4 => 'physical structure',
      5 => 'land ownership',
      6 => 'structure',
      7 => 'explosion',
      8 => 'buildings',
      9 => 'history',
      10 => 'land distribution',
      11 => 'formal',
      12 => 'informal buildings',
      13 => 'political',
      14 => 'families',
      15 => 'land development',
      16 => 'spatial dna',
      17 => 'methodologies',
      18 => 'social sturcture',
      19 => 'implicit and explicit mechanisms',
      20 => 'social landscape',
      21 => 'urban spaces',
      22 => 'congruent layers',
      23 => 'identification of dna',
      24 => 'istanbul neighbourhoods',
      25 => 'correspondence maps',
      26 => 'p bourdieu\'s',
    ),
  ),
  454 => 
  array (
    'slug' => sanitize_title("Confronting history and urban change"),
    'name' => 'Confronting history and urban change',
    'format' => 'audio + video',
    'type' => 'discussion ',
    'date' => '2009 - 11 - 05',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio:47.15  Video: 47.17',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'dna',
      1 => 'istanbul',
      2 => 'spatial',
      3 => 'social dna',
      4 => 'physical structure',
      5 => 'land ownership',
      6 => 'structure',
      7 => 'explosion',
      8 => 'buildings',
      9 => 'history',
      10 => 'land distribution',
      11 => 'formal',
      12 => 'informal buildings',
      13 => 'political',
      14 => 'families',
      15 => 'land development',
      16 => 'spatial dna',
      17 => 'methodologies',
      18 => 'social sturcture',
      19 => 'implicit and explicit mechanisms',
      20 => 'social landscape',
      21 => 'urban spaces',
      22 => 'congruent layers',
      23 => 'identification of dna',
      24 => 'istanbul neighbourhoods',
      25 => 'correspondence maps',
      26 => 'p bourdieu\'s',
    ),
  ),
  455 => 
  array (
    'slug' => sanitize_title("Enviornments and cities"),
    'name' => 'Enviornments and cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 9.45  Video: 09.45',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'climate change',
      1 => 'transport',
      2 => 'global transport emissions',
      3 => 'turkey',
      4 => 'germany',
      5 => 'built environment',
    ),
  ),
  456 => 
  array (
    'slug' => sanitize_title("Enviornments and cities"),
    'name' => 'Enviornments and cities',
    'format' => 'video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'English',
    'running_time' => '9.45',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'climate change',
      1 => 'transport',
      2 => 'global transport emissions',
      3 => 'turkey',
      4 => 'germany',
      5 => 'built environment',
    ),
  ),
  457 => 
  array (
    'slug' => sanitize_title("Enviornments and cities"),
    'name' => 'Enviornments and cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'English',
    'running_time' => '19.32',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'planyc',
      2 => 'reduce traffic',
      3 => 'susainabilty',
      4 => 'new mobility',
      5 => 'public transits',
      6 => 'streets of new york',
      7 => 'carbon emmission reductions',
      8 => 'enviromental footprint',
      9 => 'plan yc strategic plan',
      10 => 'safety polices',
      11 => 'public spaces',
      12 => 'pedestrains',
      13 => 'cars',
      14 => 'buses',
      15 => 'cycling',
      16 => 'street design manual',
      17 => 'public plaza\'z',
    ),
  ),
  458 => 
  array (
    'slug' => sanitize_title("Enviornments and cities"),
    'name' => 'Enviornments and cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 16.09  Video: 16.05',
    'geotags' => 
    array (
      0 => 'delhi',
    ),
    'tags' => 
    array (
      0 => 'green transport infrastructure',
      1 => 'delhi',
      2 => 'congestion',
      3 => 'accidents',
      4 => 'bus rapid transit',
      5 => 'low floor buses',
      6 => 'bicycle lanes',
      7 => 'pedestrian infrastructure',
      8 => 'traffic safety',
      9 => 'travel time',
      10 => 'media reports',
      11 => 'delhi climate policy',
    ),
  ),
  459 => 
  array (
    'slug' => sanitize_title("Enviornments and cities"),
    'name' => 'Enviornments and cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 18.04   Video: 18.03',
    'geotags' => 
    array (
      0 => 'istanbul',
      1 => 'paris',
    ),
    'tags' => 
    array (
      0 => 'capacity',
      1 => 'mobility',
      2 => 'bus rapid transport',
      3 => 'public transport',
      4 => 'istanbul',
      5 => 'congestion',
      6 => 'city center',
      7 => 'mobility renaissance',
      8 => 'paris',
      9 => 'eco-stations',
      10 => 'micro and macro mobilty',
      11 => 'transport planning',
      12 => 'transport',
      13 => 'proximity',
      14 => 'accessibilty',
      15 => 'rapid actions',
      16 => '\'door to door\' conections',
      17 => 'direct connection',
      18 => 'cycle lanes',
    ),
  ),
  460 => 
  array (
    'slug' => sanitize_title("Enviornments and cities"),
    'name' => 'Enviornments and cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 18.45   Video: 18.49',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'sustainabilty',
      1 => 'mobility',
      2 => 'transportation system',
      3 => 'future project plans',
      4 => 'co2 emissions',
      5 => 'traffic congestion',
      6 => 'quality of life',
      7 => 'travel time',
      8 => 'car ownership',
      9 => 'fuel consumption',
      10 => 'urban age survey',
      11 => 'road safety',
      12 => 'bosporus bridge',
      13 => 'mararay',
      14 => 'trip flows',
      15 => 'location of population',
      16 => 'bus rail network',
      17 => 'bosphorus tunnel project',
      18 => 'accessibity',
      19 => 'transport planning',
      20 => 'public transport',
      21 => 'cars',
    ),
  ),
  461 => 
  array (
    'slug' => sanitize_title("Enviornments and cities"),
    'name' => 'Enviornments and cities',
    'format' => 'audio + video',
    'type' => 'discussion ',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 46.27   Video: 46.28',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'sustainabilty',
      1 => 'mobility',
      2 => 'transportation system',
      3 => 'future project plans',
      4 => 'co2 emissions',
      5 => 'traffic congestion',
      6 => 'quality of life',
      7 => 'travel time',
      8 => 'car ownership',
      9 => 'fuel consumption',
      10 => 'urban age survey',
      11 => 'road safety',
      12 => 'bosporus bridge',
      13 => 'mararay',
      14 => 'trip flows',
      15 => 'location of population',
      16 => 'bus rail network',
      17 => 'bosphorus tunnel project',
      18 => 'accessibity',
      19 => 'transport planning',
      20 => 'public transport',
      21 => 'cars',
    ),
  ),
  462 => 
  array (
    'slug' => sanitize_title("Designing sustainable cities "),
    'name' => 'Designing sustainable cities ',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 20.50   Video: 21.01',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'paris',
    ),
    'tags' => 
    array (
      0 => 'compact city',
      1 => 'polycentric',
      2 => 'sustainabilty',
      3 => 'architecture',
      4 => 'buildings',
      5 => 'sprawl',
      6 => 'transport',
      7 => 'paris',
      8 => 'london',
      9 => 'the london plan',
      10 => 'transportation hubs',
      11 => 'transparency',
      12 => 'connection',
      13 => 'separation',
      14 => '',
    ),
  ),
  463 => 
  array (
    'slug' => sanitize_title("Designing sustainable cities"),
    'name' => 'Designing sustainable cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 20.33   Video: 20.31',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'paris',
    ),
    'tags' => 
    array (
      0 => 'cheapness',
      1 => 'architects',
      2 => 'architecture',
      3 => 'democracy',
      4 => '\'frills\'',
      5 => 'design',
      6 => 'sustainabilty',
      7 => 'istanbul growth',
      8 => 'equality',
      9 => 'frank gehry',
    ),
  ),
  464 => 
  array (
    'slug' => sanitize_title("Designing sustainable cities"),
    'name' => 'Designing sustainable cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 20.43   Video: 20.33',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'paris',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'public transport',
      2 => 'buses',
      3 => 'istanbuls mobility',
      4 => 'london',
      5 => 'public space',
      6 => 'democracy',
      7 => 'government products',
      8 => 'poor',
      9 => 'pedestrains',
      10 => 'sidewalks',
      11 => 'suburbanisation',
      12 => 'parks',
      13 => 'shopping malls',
      14 => 'equity',
      15 => 'sustainable development',
      16 => 'cities as community products',
      17 => 'children',
      18 => '',
    ),
  ),
  465 => 
  array (
    'slug' => sanitize_title("Designing sustainable cities"),
    'name' => 'Designing sustainable cities',
    'format' => 'audio + video',
    'type' => 'discussion ',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 15.13   Video: 15.14',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'paris',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'public transport',
      2 => 'buses',
      3 => 'istanbuls mobility',
      4 => 'london',
      5 => 'public space',
      6 => 'democracy',
      7 => 'government products',
      8 => 'poor',
      9 => 'pedestrains',
      10 => 'sidewalks',
      11 => 'suburbanisation',
      12 => 'parks',
      13 => 'shopping malls',
      14 => 'equity',
      15 => 'sustainable development',
      16 => 'cities as community products',
      17 => 'children',
      18 => '',
    ),
  ),
  466 => 
  array (
    'slug' => sanitize_title("Istanbul visions and projects "),
    'name' => 'Istanbul visions and projects ',
    'format' => 'audio ',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Turkish',
    'running_time' => '20.16',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'paris',
    ),
    'tags' => 
    array (
      0 => 'transport',
      1 => 'public transport',
      2 => 'buses',
      3 => 'istanbuls mobility',
      4 => 'london',
      5 => 'public space',
      6 => 'democracy',
      7 => 'government products',
      8 => 'poor',
      9 => 'pedestrains',
      10 => 'sidewalks',
      11 => 'suburbanisation',
      12 => 'parks',
      13 => 'shopping malls',
      14 => 'equity',
      15 => 'sustainable development',
      16 => 'cities as community products',
      17 => 'children',
      18 => '',
    ),
  ),
  467 => 
  array (
    'slug' => sanitize_title("Istanbul visions and projects"),
    'name' => 'Istanbul visions and projects',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 18.54   Video: 18.53',
    'geotags' => 
    array (
      0 => 'london',
      1 => 'washington',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'olympics: visons',
      2 => 'political will',
      3 => 'mobilising capital',
      4 => 'integration',
      5 => 'economic integration',
      6 => 'transport',
      7 => 'canary wharf',
      8 => 'series of centres',
      9 => 'physical integration',
      10 => 'social integration',
      11 => 'diversity of sites',
      12 => 'integrated programs',
      13 => 'political integration',
      14 => 'washington: urban renewal',
      15 => 'waterfront',
      16 => '',
    ),
  ),
  468 => 
  array (
    'slug' => sanitize_title("Istanbul visions and projects"),
    'name' => 'Istanbul visions and projects',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 20.16  Video: 20.17',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'london',
      1 => 'planning',
      2 => 'transformation',
      3 => 'mayor of london',
      4 => 'space',
      5 => 'abercrombie plan',
      6 => 'strategies',
      7 => 'diversity',
      8 => 'open city',
      9 => 'ideas',
      10 => 'design for london',
      11 => 'town centres',
      12 => 'transport',
      13 => 'growth',
      14 => 'housing',
      15 => 'public space strategies',
      16 => 'olympics',
      17 => 'kings cross',
      18 => 'river lea',
      19 => 'high street 2012',
      20 => 'regeneration green enterprise',
    ),
  ),
  469 => 
  array (
    'slug' => sanitize_title("Istanbul visions and projects"),
    'name' => 'Istanbul visions and projects',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 16.22  Video: 16.18',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul economy',
      1 => 'industrial',
      2 => 'turkey',
      3 => 'imports',
      4 => 'water basins',
      5 => 'challenges of planning',
      6 => 'masterplanning',
      7 => 'strategic planning',
      8 => 'local development plans',
      9 => 'integrate plans',
      10 => 'istanbul metropolitan municipality',
      11 => 'visioning istanbul',
      12 => 'objectives',
      13 => 'urban centres',
      14 => 'idustry zones',
      15 => 'housing development',
      16 => 'ports and logistics zones',
      17 => 'kartal',
    ),
  ),
  470 => 
  array (
    'slug' => sanitize_title("Istanbul visions and projects"),
    'name' => 'Istanbul visions and projects',
    'format' => 'audio + video',
    'type' => 'discussion ',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 42.53 Video: 42.56',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'istanbul economy',
      1 => 'industrial',
      2 => 'turkey',
      3 => 'imports',
      4 => 'water basins',
      5 => 'challenges of planning',
      6 => 'masterplanning',
      7 => 'strategic planning',
      8 => 'local development plans',
      9 => 'integrate plans',
      10 => 'istanbul metropolitan municipality',
      11 => 'visioning istanbul',
      12 => 'objectives',
      13 => 'urban centres',
      14 => 'idustry zones',
      15 => 'housing development',
      16 => 'ports and logistics zones',
      17 => 'kartal',
    ),
  ),
  471 => 
  array (
    'slug' => sanitize_title("Designing sustainable cities "),
    'name' => 'Designing sustainable cities ',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 22.14 Video: 22.18',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'hafencity',
      1 => 'hamburg',
      2 => 'open city',
      3 => 'transformation of status- quo',
      4 => 'urban design',
      5 => 'heritage',
      6 => 'public-private',
      7 => 'harbour city',
      8 => 'mobility concept',
      9 => 'investors',
    ),
  ),
  472 => 
  array (
    'slug' => sanitize_title("Designing sustainable cities"),
    'name' => 'Designing sustainable cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 17.14 Video: 17.13',
    'geotags' => 
    array (
      0 => 'mexico city',
    ),
    'tags' => 
    array (
      0 => 'retrofitting',
      1 => 'mexico city',
      2 => 'security',
      3 => 'crime',
      4 => 'fear',
      5 => 'power',
      6 => 'civil society',
      7 => 'planning',
      8 => 'public transport',
      9 => 'mobility',
      10 => 'mayor',
      11 => 'policies',
      12 => 'housing policies',
      13 => 'projects',
      14 => 'architects',
    ),
  ),
  473 => 
  array (
    'slug' => sanitize_title("Designing sustainable cities"),
    'name' => 'Designing sustainable cities',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 19.08 Video: 19.03',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'urban scale',
      1 => 'architects position',
      2 => 'achitectural profession',
      3 => 'istanbul',
      4 => 'production',
      5 => 'intervention',
      6 => 'arkitera-urban age',
      7 => 'spatial studies',
      8 => '8arti',
      9 => 'so?',
      10 => 'superpool',
      11 => 'reclaiming valleys',
      12 => 'sultanbyli',
      13 => 'project so',
      14 => 'cars',
      15 => 'parking structures',
      16 => 'street level activity',
      17 => 'implementation',
    ),
  ),
  474 => 
  array (
    'slug' => sanitize_title("Designing sustainable cities"),
    'name' => 'Designing sustainable cities',
    'format' => 'audio + video',
    'type' => 'discussion ',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio:36.33  Video: 36.19',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'urban scale',
      1 => 'architects position',
      2 => 'achitectural profession',
      3 => 'istanbul',
      4 => 'production',
      5 => 'intervention',
      6 => 'arkitera-urban age',
      7 => 'spatial studies',
      8 => '8arti',
      9 => 'so?',
      10 => 'superpool',
      11 => 'reclaiming valleys',
      12 => 'sultanbyli',
      13 => 'project so',
      14 => 'cars',
      15 => 'parking structures',
      16 => 'street level activity',
      17 => 'implementation',
    ),
  ),
  475 => 
  array (
    'slug' => sanitize_title("Closing remarks"),
    'name' => 'Closing remarks',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio:10.40  Video: 10.42',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'economic growth',
      1 => 'urban population growth',
      2 => 'urbanisation',
      3 => 'istanbul population growth',
      4 => 'total world population',
      5 => 'urban population statistics',
      6 => 'developing countries',
      7 => 'global city',
      8 => 'urban age',
      9 => 'local initiatives',
      10 => 'democracy',
    ),
  ),
  476 => 
  array (
    'slug' => sanitize_title("Closing remarks "),
    'name' => 'Closing remarks ',
    'format' => 'audio + video',
    'type' => 'talk',
    'date' => '2009- 11 - 06',
    'language2' => 'Video: English, Audio: Turkish',
    'running_time' => 'Audio: 2.27  Video: 02.32',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'lse',
      1 => 'istanbul',
    ),
  ),
  477 => 
  array (
    'slug' => sanitize_title("Conference Welcome"),
    'name' => 'Conference Welcome',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => 'Audio: 2.27  Video: 02.32',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'new york',
      2 => 'lse',
      3 => 'duetche bank',
    ),
  ),
  478 => 
  array (
    'slug' => sanitize_title("An agenda for the city: The Urban Age project"),
    'name' => 'An agenda for the city: The Urban Age project',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:15:06',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'urban age project',
      1 => 'lse',
      2 => 'urban living',
      3 => 'developing world',
      4 => 'new york',
      5 => 'london',
      6 => 'physical and social',
      7 => 'themes',
      8 => 'labour market',
      9 => 'mobility and transport',
      10 => 'public space',
      11 => 'housing',
      12 => 'security',
      13 => 'urban form',
    ),
  ),
  479 => 
  array (
    'slug' => sanitize_title("Civility and urban space"),
    'name' => 'Civility and urban space',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '16.47',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'multiculturalism',
      1 => 'economic inequality',
      2 => 'wealth',
      3 => 'civility',
      4 => 'history of jews',
      5 => 'venice',
      6 => 'berlin',
      7 => 'london',
      8 => 'ghetto',
      9 => 'state',
      10 => 'indifference',
      11 => 'identity',
      12 => 'gated communities',
      13 => 'rich',
      14 => 'poor',
      15 => 'economic growth',
      16 => 'modern ghettos',
      17 => 'uniformity',
      18 => 'urban society',
      19 => 'models of multiculturalism',
      20 => 'history',
      21 => 'diversity',
      22 => '',
    ),
  ),
  480 => 
  array (
    'slug' => sanitize_title("Two models of the Metropolis"),
    'name' => 'Two models of the Metropolis',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '16.47',
    'geotags' => 
    array (
      0 => 'istanbul',
    ),
    'tags' => 
    array (
      0 => 'n/a',
    ),
  ),
  481 => 
  array (
    'slug' => sanitize_title("Understanding the city: Socio-economic trends and spatial pattern"),
    'name' => 'Understanding the city: Socio-economic trends and spatial pattern',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:15:34',
    'geotags' => 
    array (
      0 => 'new york',
      1 => 'london',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'london',
      2 => 'physical size',
      3 => 'similarities',
      4 => 'public transport',
      5 => 'overseas born',
      6 => 'international in-migration',
      7 => 'differences',
      8 => 'densities',
      9 => 'social segregation',
      10 => 'centralisation',
      11 => 'governance',
      12 => 'economies',
      13 => 'fragmentation',
      14 => 'inequality',
      15 => '',
    ),
  ),
  482 => 
  array (
    'slug' => sanitize_title("Empowering the city: Legal structures and political power"),
    'name' => 'Empowering the city: Legal structures and political power',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:12:35',
    'geotags' => 
    array (
      0 => 'new york london',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'london',
      2 => 'city government',
      3 => 'mayor',
      4 => 'city council',
      5 => 'similarities',
      6 => 'service government',
      7 => 'greater london authority',
      8 => 'capacity',
      9 => 'london plan',
      10 => 'vision',
    ),
  ),
  483 => 
  array (
    'slug' => sanitize_title("Working in the city: Local economies in a global environment"),
    'name' => 'Working in the city: Local economies in a global environment',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:15:57',
    'geotags' => 
    array (
      0 => 'new york london',
    ),
    'tags' => 
    array (
      0 => 'local economies',
      1 => 'localised economies',
      2 => 'spatial agglomeration',
      3 => 'centralised',
      4 => 'technology',
      5 => 'global economy',
      6 => 'information',
      7 => 'localising',
      8 => 'global sectors',
      9 => 'urban manufacturing',
      10 => 'globalised economies',
      11 => 'professional household',
      12 => 'globalised sector',
      13 => 'new sectors',
      14 => 'advanced economies',
      15 => 'new york',
      16 => 'london',
    ),
  ),
  484 => 
  array (
    'slug' => sanitize_title("Designing the city: The architecture of identity"),
    'name' => 'Designing the city: The architecture of identity',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:13:50',
    'geotags' => 
    array (
      0 => 'new york london',
    ),
    'tags' => 
    array (
      0 => 'architects',
      1 => 'designing cities',
      2 => 'city identity',
      3 => 'malaysia',
      4 => 'canary wharff',
      5 => 'architectural practice',
      6 => 'london',
      7 => 'new york',
      8 => 'amsterdam',
      9 => 'cohesion',
      10 => 'oversimplification',
      11 => 'urban development',
      12 => 'developers',
      13 => 'complexity',
      14 => 'history',
      15 => '',
    ),
  ),
  485 => 
  array (
    'slug' => sanitize_title("Debate"),
    'name' => 'Debate',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:13:50',
    'geotags' => 
    array (
      0 => 'new york london',
    ),
    'tags' => 
    array (
      0 => 'architects',
      1 => 'designing cities',
      2 => 'city identity',
      3 => 'malaysia',
      4 => 'canary wharff',
      5 => 'architectural practice',
      6 => 'london',
      7 => 'new york',
      8 => 'amsterdam',
      9 => 'cohesion',
      10 => 'oversimplification',
      11 => 'urban development',
      12 => 'developers',
      13 => 'complexity',
      14 => 'history',
      15 => '',
    ),
  ),
  486 => 
  array (
    'slug' => sanitize_title("Do jobs build cities or do cities build jobs?"),
    'name' => 'Do jobs build cities or do cities build jobs?',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:01:32',
    'geotags' => 
    array (
      0 => 'new york london',
    ),
    'tags' => 
    array (
      0 => 'n/a',
    ),
  ),
  487 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:36',
    'geotags' => 
    array (
      0 => 'new york london',
    ),
    'tags' => 
    array (
      0 => 'restructuring',
      1 => 'labour markets',
      2 => '\'urban magnets\'',
      3 => 'manufacturing',
      4 => 'urban economies',
      5 => 'urban labour markets',
      6 => 'location',
      7 => 'work and life',
      8 => 'post-industrial',
      9 => 'knowledge based',
      10 => 'structural change',
      11 => 'employment',
      12 => 'labour supply',
      13 => 'labour demand',
      14 => 'diversity',
      15 => 'new york',
      16 => 'land-use',
      17 => '',
    ),
  ),
  488 => 
  array (
    'slug' => sanitize_title("New media networking and manufacturing in dense urban environments"),
    'name' => 'New media networking and manufacturing in dense urban environments',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:16:10',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'jobs',
      2 => 'employment',
      3 => 'knowledge economy',
      4 => 'liminal space',
      5 => 'public space',
      6 => 'economy',
      7 => 'manufacturing',
      8 => 'employment loss',
      9 => 'new york workforce',
      10 => 'self employment',
      11 => 'creative districts',
      12 => 'multi-use spaces',
      13 => 'work and spaces',
      14 => 'fashion district',
      15 => 'lower manhattan',
      16 => 'brooklyn',
      17 => 'housing',
      18 => 'regional planning',
      19 => 'jobs decentralising',
      20 => 'local scale',
      21 => 'innovation',
      22 => 'creative employment',
    ),
  ),
  489 => 
  array (
    'slug' => sanitize_title("Building typologies of the economy of change"),
    'name' => 'Building typologies of the economy of change',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:15:26',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'contemporary architecture',
      1 => 'flexibility',
      2 => 'technology',
      3 => 'expandability',
      4 => 'identity',
      5 => 'versatility',
      6 => 'covertibility',
      7 => 'change',
      8 => 'fluidity',
      9 => 'form',
      10 => 'identity',
      11 => 'ulrich beck',
      12 => 'risk society',
      13 => 'complexities',
      14 => 'multi-functioning',
      15 => 'grids',
      16 => 'emptiness',
      17 => 'resilience',
      18 => '',
    ),
  ),
  490 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:06:52',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'london',
      2 => 'economy',
      3 => 'job creation',
      4 => 'globalisation',
      5 => 'political system',
      6 => 'local government',
      7 => 'impact',
      8 => 'investment',
      9 => 'government',
      10 => 'crime',
      11 => 'tourism',
      12 => 'employment',
      13 => 'self employment',
      14 => 'work vs housing',
    ),
  ),
  491 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:03:39',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'shape',
      1 => 'buildings',
      2 => 'virtual',
    ),
  ),
  492 => 
  array (
    'slug' => sanitize_title("Debate Part 1"),
    'name' => 'Debate Part 1',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:03:39',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'shape',
      1 => 'buildings',
      2 => 'virtual',
    ),
  ),
  493 => 
  array (
    'slug' => sanitize_title("Debate Part 1"),
    'name' => 'Debate Part 1',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:03:39',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'shape',
      1 => 'buildings',
      2 => 'virtual',
    ),
  ),
  494 => 
  array (
    'slug' => sanitize_title("An urban age in a suburban country?"),
    'name' => 'An urban age in a suburban country?',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:44:41',
    'geotags' => 
    array (
      0 => 'united states',
    ),
    'tags' => 
    array (
      0 => 'policies',
      1 => 'new york',
      2 => 'america',
      3 => 'american cities',
      4 => 'sprawl',
      5 => 'suburban',
      6 => 'centralisation',
      7 => 'resurgence',
      8 => 'urban innovation',
      9 => 'growth',
      10 => 'future',
      11 => 'immigration',
      12 => 'demographic change',
      13 => 'economic transformation',
      14 => 'restructuring of economy',
      15 => 'compact development',
      16 => 'urban form',
      17 => 'urban resurgence',
      18 => 'property rates',
      19 => 'urban crime',
      20 => 'government',
      21 => 'suburbs',
      22 => 'ethnic minorities',
      23 => 'anti-urban policies',
      24 => 'city building',
      25 => 'economic and social change',
      26 => 'federal government',
      27 => 'network of leaders',
      28 => 'pennsylvania',
      29 => 'innovation',
      30 => 'density',
      31 => 'growth',
      32 => '\'american urban age\'',
      33 => 'city actors',
      34 => 'coalition of cities',
      35 => 'infrastructure',
      36 => 'political coalition',
      37 => 'urban language',
    ),
  ),
  495 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:09:12',
    'geotags' => 
    array (
      0 => 'new york',
      1 => '',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'transport',
      2 => 'financial strategies',
      3 => 'sustainability',
      4 => 'planning',
      5 => 'urban density',
      6 => 'energy',
      7 => 'new york',
      8 => 'manhattan',
      9 => 'staten island',
      10 => 'public transport',
      11 => 'car ownership',
      12 => 'cycling',
      13 => 'public transport infrastructure',
      14 => 'street parking',
      15 => 'planning for people',
      16 => 'pedestrians',
      17 => 'urban spaces',
      18 => 'high density',
      19 => 'high quality',
      20 => 'functional variety',
    ),
  ),
  496 => 
  array (
    'slug' => sanitize_title("Making a transport strategy work for New York"),
    'name' => 'Making a transport strategy work for New York',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:16:25',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'transportation',
      1 => 'new york',
      2 => 'mobility',
      3 => 'infrastructure',
      4 => 'public transport',
      5 => 'global city',
      6 => 'local city',
      7 => 'manhattan',
      8 => 'scale',
      9 => 'freight',
      10 => 'institutions',
      11 => 'planning',
      12 => 'stakeholder groups',
      13 => 'congestion',
      14 => 'core manhattan',
      15 => 'jobs',
      16 => 'pen station',
      17 => 'grand central terminal',
      18 => 'new infrastructure',
      19 => 'planning issues',
      20 => 'investment',
      21 => 'transport projects',
      22 => 'benefits',
      23 => 'funding',
      24 => 'strategies',
      25 => 'regional strategic plan',
      26 => 'technology',
      27 => 'organisation structures',
    ),
  ),
  497 => 
  array (
    'slug' => sanitize_title("Financing urban transport"),
    'name' => 'Financing urban transport',
    'format' => 'audio ',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:14:16',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'history',
      1 => 'new york',
      2 => 'public transport',
      3 => 'new york subway',
      4 => 'rail system',
      5 => 'fair structure',
      6 => 'rising fairs',
      7 => 'political response',
      8 => 'mta',
      9 => 'public authority',
      10 => 'legislature',
      11 => 'debt',
      12 => 'revenue',
      13 => 'taxes',
      14 => 'operating revenues',
      15 => 'mta plan',
      16 => 'transportation system',
      17 => 'economy',
      18 => 'funding',
      19 => 'fiscal resources',
      20 => '',
    ),
  ),
  498 => 
  array (
    'slug' => sanitize_title("Making places for movement"),
    'name' => 'Making places for movement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:14:06',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'integration',
      1 => 'urban structures',
      2 => 'transport systems',
      3 => 'flow',
      4 => 'movement',
      5 => 'cores',
      6 => 'connecting',
      7 => 'tokyo',
      8 => 'high density',
      9 => 'land value',
      10 => 'shibuya station',
      11 => 'structure of city',
      12 => 'interconnected',
      13 => 'escalators',
      14 => 'seoul underground station',
      15 => 'public spaces',
      16 => 'social',
      17 => 'commercial',
      18 => 'merging transportation and the city',
    ),
  ),
  499 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:05:56',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mta needs',
      1 => 'investment',
      2 => 'infrastructure',
      3 => 'improvements',
      4 => 'difficulties',
      5 => 'political response',
      6 => 'new york',
      7 => 'political leadership',
      8 => 'transport system needs',
    ),
  ),
  500 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:05:39',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'transportation system',
      1 => 'new york',
      2 => 'mta',
      3 => 'public sector',
      4 => 'investment',
      5 => 'political leadership',
      6 => 'capacity',
    ),
  ),
  501 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:06:04',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mta',
      1 => 'investment',
      2 => 'financing system',
      3 => 'federal system',
      4 => 'transit planning',
      5 => 'leadership',
      6 => 'suburban',
      7 => 'urban',
      8 => 'institutions',
      9 => 'business community',
      10 => '',
    ),
  ),
  502 => 
  array (
    'slug' => sanitize_title("Debate Part 1"),
    'name' => 'Debate Part 1',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:06:04',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mta',
      1 => 'investment',
      2 => 'financing system',
      3 => 'federal system',
      4 => 'transit planning',
      5 => 'leadership',
      6 => 'suburban',
      7 => 'urban',
      8 => 'institutions',
      9 => 'business community',
      10 => '',
    ),
  ),
  503 => 
  array (
    'slug' => sanitize_title("Debate Part 1"),
    'name' => 'Debate Part 1',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:06:04',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mta',
      1 => 'investment',
      2 => 'financing system',
      3 => 'federal system',
      4 => 'transit planning',
      5 => 'leadership',
      6 => 'suburban',
      7 => 'urban',
      8 => 'institutions',
      9 => 'business community',
      10 => '',
    ),
  ),
  504 => 
  array (
    'slug' => sanitize_title("Connecting urban governance and planning"),
    'name' => 'Connecting urban governance and planning',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:04:11',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'fragmentation',
      2 => 'complexity',
      3 => 'local leaders',
      4 => 'vision',
    ),
  ),
  505 => 
  array (
    'slug' => sanitize_title("Panel Discussion"),
    'name' => 'Panel Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:09:51',
    'geotags' => 
    array (
      0 => 'washington d.c',
    ),
    'tags' => 
    array (
      0 => 'washington d.c',
      1 => 'planning',
      2 => 'governance',
      3 => 'planned city',
      4 => 'mayor',
      5 => 'citizen power',
      6 => 'history',
      7 => 'federal government',
      8 => 'trustee function',
      9 => 'polarisation',
    ),
  ),
  506 => 
  array (
    'slug' => sanitize_title("Panel Discussion"),
    'name' => 'Panel Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:12:13',
    'geotags' => 
    array (
      0 => 'bogotá',
    ),
    'tags' => 
    array (
      0 => 'post-communist',
      1 => 'urban design',
      2 => 'equality of life',
      3 => 'rules',
      4 => 'citizens',
      5 => 'governance',
      6 => 'vision',
      7 => 'columbia',
      8 => 'success',
      9 => 'failures',
      10 => 'bogota',
      11 => 'cars',
      12 => 'cyclist',
      13 => 'suburbs',
      14 => 'density',
      15 => 'traffic',
      16 => 'pedestrians',
      17 => 'urban planning',
      18 => 'politics',
      19 => '',
    ),
  ),
  507 => 
  array (
    'slug' => sanitize_title("Panel Discussion"),
    'name' => 'Panel Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:09:35',
    'geotags' => 
    array (
      0 => 'london',
    ),
    'tags' => 
    array (
      0 => 'government',
      1 => 'fragmentation',
      2 => 'governance',
      3 => 'istitutions',
      4 => 'complexity',
      5 => 'connect',
      6 => 'link',
      7 => 'capacity',
      8 => 'deliverance',
      9 => 'control',
      10 => 'resources',
      11 => 'congestion charge',
      12 => 'ken livingstone',
      13 => 'existing powers',
      14 => '',
    ),
  ),
  508 => 
  array (
    'slug' => sanitize_title("Panel Discussion"),
    'name' => 'Panel Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:09:35',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mayors',
      1 => 'powers',
      2 => 'control',
      3 => 'planning',
      4 => 'land-use',
      5 => 'transportation',
      6 => '\'city powers\'',
      7 => 'new york',
    ),
  ),
  509 => 
  array (
    'slug' => sanitize_title("Panel Discussion"),
    'name' => 'Panel Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:10:32',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'planning',
      1 => 'structure',
      2 => 'new york',
      3 => 'large scale development',
      4 => 'control',
      5 => 'visionary planning',
      6 => 'government',
      7 => 'times square',
      8 => 'market force',
      9 => 'westway',
      10 => 'mayor',
      11 => 'board of education',
      12 => 'michael bloomberg',
    ),
  ),
  510 => 
  array (
    'slug' => sanitize_title("Debate Part 1"),
    'name' => 'Debate Part 1',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:10:32',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'planning',
      1 => 'structure',
      2 => 'new york',
      3 => 'large scale development',
      4 => 'control',
      5 => 'visionary planning',
      6 => 'government',
      7 => 'times square',
      8 => 'market force',
      9 => 'westway',
      10 => 'mayor',
      11 => 'board of education',
      12 => 'michael bloomberg',
    ),
  ),
  511 => 
  array (
    'slug' => sanitize_title("Debate Part 1"),
    'name' => 'Debate Part 1',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '25/02/2005',
    'language2' => 'English',
    'running_time' => '00:10:32',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'planning',
      1 => 'structure',
      2 => 'new york',
      3 => 'large scale development',
      4 => 'control',
      5 => 'visionary planning',
      6 => 'government',
      7 => 'times square',
      8 => 'market force',
      9 => 'westway',
      10 => 'mayor',
      11 => 'board of education',
      12 => 'michael bloomberg',
    ),
  ),
  512 => 
  array (
    'slug' => sanitize_title("Feeling safe in the crowd"),
    'name' => 'Feeling safe in the crowd',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:01:37',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'planning',
      1 => 'structure',
      2 => 'new york',
      3 => 'large scale development',
      4 => 'control',
      5 => 'visionary planning',
      6 => 'government',
      7 => 'times square',
      8 => 'market force',
      9 => 'westway',
      10 => 'mayor',
      11 => 'board of education',
      12 => 'michael bloomberg',
    ),
  ),
  513 => 
  array (
    'slug' => sanitize_title("Civilizing security in New York: A view from Europe"),
    'name' => 'Civilizing security in New York: A view from Europe',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:15:31',
    'geotags' => 
    array (
      0 => 'new york',
      1 => 'paris',
    ),
    'tags' => 
    array (
      0 => 'safety',
      1 => 'insecurity',
      2 => 'risks',
      3 => 'threats',
      4 => 'new york',
      5 => 'paris',
      6 => 'protection',
      7 => 'civilty',
      8 => 'differences',
      9 => 'public space',
      10 => 'security',
      11 => 'surveillance',
      12 => 'terrorists',
      13 => 'target',
      14 => '\'war on terror',
      15 => 'technologies',
      16 => 'national strategies',
      17 => 'france',
      18 => 'mayor',
      19 => 'perception of crime',
      20 => 'september 11',
      21 => '',
    ),
  ),
  514 => 
  array (
    'slug' => sanitize_title("Crime currents in New York and the co-production of security"),
    'name' => 'Crime currents in New York and the co-production of security',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:16:35',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'crime',
      1 => 'new york',
      2 => 'spatial concentration',
      3 => 'homicide',
      4 => 'gun violence',
      5 => 'non-gun violence',
      6 => 'robbery',
      7 => 'assults',
      8 => 'burglury',
      9 => 'drug arrest',
      10 => 'prison admissions',
      11 => 'crime rates',
      12 => 'race',
      13 => 'immigration',
      14 => 'police',
      15 => 'security',
      16 => 'public space',
      17 => 'the soth bronx',
      18 => 'development strategies',
      19 => 'transformation',
      20 => 'physical space',
      21 => 'design',
      22 => 'gentrification',
      23 => 'red hook',
      24 => 'local justice center',
      25 => 'court',
      26 => '',
    ),
  ),
  515 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:30',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'columbia',
      1 => 'bogotá',
      2 => 'safety',
      3 => 'murder rate',
      4 => 'developing countries',
      5 => 'just society',
      6 => 'france',
      7 => 'america',
      8 => 'unjust corrupt',
      9 => 'legitimacy',
      10 => 'public space',
      11 => 'security',
      12 => 'quality public spaces',
      13 => 'perception of crime',
    ),
  ),
  516 => 
  array (
    'slug' => sanitize_title("Does space matter to public life?"),
    'name' => 'Does space matter to public life?',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:14:27',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'columbia',
      1 => 'bogotá',
      2 => 'safety',
      3 => 'murder rate',
      4 => 'developing countries',
      5 => 'just society',
      6 => 'france',
      7 => 'america',
      8 => 'unjust corrupt',
      9 => 'legitimacy',
      10 => 'public space',
      11 => 'security',
      12 => 'quality public spaces',
      13 => 'perception of crime',
    ),
  ),
  517 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:11',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'september 11',
      1 => 'resilient',
      2 => 'impacts',
      3 => 'political',
      4 => 'security measures',
      5 => 'axiety',
      6 => 'safety',
      7 => 'fear',
      8 => 'racial targeting',
      9 => 'employment',
    ),
  ),
  518 => 
  array (
    'slug' => sanitize_title("Debate Part 1"),
    'name' => 'Debate Part 1',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:11',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'september 11',
      1 => 'resilient',
      2 => 'impacts',
      3 => 'political',
      4 => 'security measures',
      5 => 'axiety',
      6 => 'safety',
      7 => 'fear',
      8 => 'racial targeting',
      9 => 'employment',
    ),
  ),
  519 => 
  array (
    'slug' => sanitize_title("Debate Part 1"),
    'name' => 'Debate Part 1',
    'format' => 'audio',
    'type' => 'debate',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:11',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'september 11',
      1 => 'resilient',
      2 => 'impacts',
      3 => 'political',
      4 => 'security measures',
      5 => 'axiety',
      6 => 'safety',
      7 => 'fear',
      8 => 'racial targeting',
      9 => 'employment',
    ),
  ),
  520 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:34',
    'geotags' => 
    array (
      0 => 'new york',
      1 => 'london',
      2 => '',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'neighbourhoods',
      2 => 'london',
      3 => 'new york',
      4 => 'manhattan',
      5 => 'continuity',
      6 => 'density',
      7 => 'uses',
      8 => 'regulation',
      9 => 'affordable housing',
      10 => 'bobby white?',
      11 => 'public space',
      12 => 'open space',
    ),
  ),
  521 => 
  array (
    'slug' => sanitize_title("Affordable housing, manufacturing and the artist community: Williamsburg Green Point Waterfront"),
    'name' => 'Affordable housing, manufacturing and the artist community: Williamsburg Green Point Waterfront',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:34',
    'geotags' => 
    array (
      0 => 'new york',
      1 => 'london',
      2 => '',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'neighbourhoods',
      2 => 'london',
      3 => 'new york',
      4 => 'manhattan',
      5 => 'continuity',
      6 => 'density',
      7 => 'uses',
      8 => 'regulation',
      9 => 'affordable housing',
      10 => 'bobby white?',
      11 => 'public space',
      12 => 'open space',
    ),
  ),
  522 => 
  array (
    'slug' => sanitize_title("Integrating large institutions into fine grain urban neighbourhoods: Columbia University expansion"),
    'name' => 'Integrating large institutions into fine grain urban neighbourhoods: Columbia University expansion',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:18:47',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'columbia university',
      1 => 'new york',
      2 => 'design',
      3 => 'urban istitutions',
      4 => 'manhattanville',
      5 => 'mixed-use neighbourhoods',
      6 => 'history',
      7 => 'viaducts',
      8 => 'industrial',
      9 => 'legacy',
      10 => 'vision',
      11 => '125th street',
      12 => 'broadway',
      13 => 'mixed-use',
      14 => 'connectivity',
      15 => 'open spaces',
      16 => 'river',
      17 => 'public realm',
      18 => 'networks',
      19 => 'density',
      20 => 'challenges',
      21 => '',
    ),
  ),
  523 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:08',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'challenges',
      1 => 'affordable housing',
      2 => 'mixed use',
      3 => 'public spaces',
      4 => 'immigrants',
      5 => 'new york',
      6 => 'channel growth',
      7 => 'affordabilty',
      8 => 'density',
      9 => 'urban design masterplans',
      10 => 'growth',
      11 => 'zoning',
    ),
  ),
  524 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:07:22',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'zoning',
      2 => 'urban planning',
      3 => 'office space',
      4 => 'visions',
      5 => 'upper-middle classes',
      6 => 'public engagement',
      7 => 'plan',
      8 => 'service',
      9 => 'who\'s city? service sector',
    ),
  ),
  525 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:05:55',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'suburbanisation',
      2 => 'middle-class',
      3 => 'rich',
      4 => 'poor',
      5 => 'disparities',
      6 => 'global economy',
      7 => 'new economy',
      8 => 'housing sector',
      9 => 'service sector',
      10 => 'decentralisation',
      11 => 'governments role',
      12 => 'channel market forces',
      13 => 'zoning',
      14 => 'constant change',
    ),
  ),
  526 => 
  array (
    'slug' => sanitize_title("Response"),
    'name' => 'Response',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:06:35',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'housing policy',
      1 => 'community group',
      2 => 'government',
      3 => 'citizens',
      4 => 'private',
      5 => 'public',
      6 => 'sector',
      7 => 'roles',
      8 => 'jobs',
      9 => 'waterfront',
      10 => 'zoning',
      11 => 'infrastructure',
      12 => 'affordable housing',
      13 => 'density',
      14 => 'spaces',
      15 => 'manufacturing',
      16 => '',
    ),
  ),
  527 => 
  array (
    'slug' => sanitize_title("Towards an urban model"),
    'name' => 'Towards an urban model',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:01:39',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'private language',
      2 => '',
    ),
  ),
  528 => 
  array (
    'slug' => sanitize_title("Panel Discussion"),
    'name' => 'Panel Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:10:27',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'evolving',
      2 => 'new theory',
      3 => 'new language',
      4 => 'architectural relevance',
      5 => 'architectural profession',
      6 => 'authenticity',
      7 => '',
    ),
  ),
  529 => 
  array (
    'slug' => sanitize_title("Panel Discussion"),
    'name' => 'Panel Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:04:04',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'new york',
      2 => 'space',
      3 => 'media',
      4 => 'theory',
      5 => 'production',
      6 => 'discipline',
      7 => '',
    ),
  ),
  530 => 
  array (
    'slug' => sanitize_title("Panel Discussion"),
    'name' => 'Panel Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:08:53',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'visions',
      2 => 'reality',
      3 => 'artist',
      4 => 'expertise',
      5 => 'civicness',
      6 => 'production of space',
      7 => 'concrete',
      8 => 'resileince',
    ),
  ),
  531 => 
  array (
    'slug' => sanitize_title("Open Discussion"),
    'name' => 'Open Discussion',
    'format' => 'audio',
    'type' => 'panel discussion',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:08:53',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'architecture',
      1 => 'visions',
      2 => 'reality',
      3 => 'artist',
      4 => 'expertise',
      5 => 'civicness',
      6 => 'production of space',
      7 => 'concrete',
      8 => 'resileince',
    ),
  ),
  532 => 
  array (
    'slug' => sanitize_title("New York is almost alright? Towards a programme for the urban age"),
    'name' => 'New York is almost alright? Towards a programme for the urban age',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:01:59',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
    ),
  ),
  533 => 
  array (
    'slug' => sanitize_title("Contributions"),
    'name' => 'Contributions',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:05:05',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'metropolitan',
      1 => 'suburbs',
      2 => 'new york',
      3 => 'environment',
      4 => 'public engagement',
      5 => 'leadership',
    ),
  ),
  534 => 
  array (
    'slug' => sanitize_title("Contributions"),
    'name' => 'Contributions',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:02:16',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'social',
      1 => 'global',
      2 => 'global economy',
      3 => 'global circuits',
    ),
  ),
  535 => 
  array (
    'slug' => sanitize_title("Contributions"),
    'name' => 'Contributions',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:04:33',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'social mobility',
      2 => 'inequlaity',
      3 => 'wealth',
      4 => 'income',
      5 => 'wealth',
      6 => 'architects',
      7 => '\'making places\'',
      8 => '\'urban age project\'',
    ),
  ),
  536 => 
  array (
    'slug' => sanitize_title("Contributions"),
    'name' => 'Contributions',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:03:52',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'sucessful cities',
      1 => 'challenge',
      2 => 'new york',
      3 => 'coordination',
      4 => 'coalitions',
      5 => 'disfuntionality',
      6 => 'regional',
      7 => 'state',
      8 => 'government',
    ),
  ),
  537 => 
  array (
    'slug' => sanitize_title("Comments and Closing Remarks"),
    'name' => 'Comments and Closing Remarks',
    'format' => 'audio',
    'type' => 'talk',
    'date' => '26/02/2005',
    'language2' => 'English',
    'running_time' => '00:19:51',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'sucessful cities',
      1 => 'challenge',
      2 => 'new york',
      3 => 'coordination',
      4 => 'coalitions',
      5 => 'disfuntionality',
      6 => 'regional',
      7 => 'state',
      8 => 'government',
    ),
  ),
  538 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'video',
    'type' => 'talk',
    'date' => '03/12/2008',
    'language2' => 'English',
    'running_time' => '00:04:01',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
    ),
  ),
  539 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'video',
    'type' => 'talk',
    'date' => '03/12/2008',
    'language2' => 'English',
    'running_time' => '00:05:36',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'growth',
      2 => 'labour',
    ),
  ),
  540 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'video',
    'type' => 'talk',
    'date' => '03/12/2008',
    'language2' => 'English',
    'running_time' => '00:05:25',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'lse',
      2 => 'south america',
    ),
  ),
  541 => 
  array (
    'slug' => sanitize_title("Welcome"),
    'name' => 'Welcome',
    'format' => 'video',
    'type' => 'talk',
    'date' => '03/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:08:07',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'urban age',
      2 => 'health',
      3 => 'traffic',
      4 => 'mobility',
      5 => 'transport',
      6 => 'environment',
      7 => 'pollution',
      8 => 'visual pollution',
      9 => 'buenos aires',
      10 => 'information sharing',
    ),
  ),
  542 => 
  array (
    'slug' => sanitize_title("The Urban Age and South America"),
    'name' => 'The Urban Age and South America',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:13:31',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'growth',
      2 => 'new york',
      3 => 'london',
      4 => 'mumbai',
      5 => 'são paulo',
      6 => 'density',
      7 => 'transport',
      8 => 'social inequality',
      9 => 'climate change',
    ),
  ),
  543 => 
  array (
    'slug' => sanitize_title("Cities in a Global Context"),
    'name' => 'Cities in a Global Context',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:18:45',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'economy',
      1 => 'global economic circuits',
      2 => 'new york',
      3 => 'knowledge economy',
      4 => 'homogeneity',
      5 => 'global cities',
      6 => 'financial crisis',
    ),
  ),
  544 => 
  array (
    'slug' => sanitize_title("Governance and City Making in South America"),
    'name' => 'Governance and City Making in South America',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:15:22',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'governance',
      1 => 'santiago',
      2 => 'growth',
      3 => 'decentralization',
      4 => 'democracy',
      5 => 'fragmentation',
      6 => 'sprawl',
      7 => 'buenos aires',
      8 => 'governance reform',
      9 => 'local government',
    ),
  ),
  545 => 
  array (
    'slug' => sanitize_title("Governing the Metropolis: The Case of Sao Paulo"),
    'name' => 'Governing the Metropolis: The Case of Sao Paulo',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:13:15',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'metropolitan region',
      2 => 'governance',
      3 => 'economy',
    ),
  ),
  546 => 
  array (
    'slug' => sanitize_title("Urban Age Sao Paulo Survey"),
    'name' => 'Urban Age Sao Paulo Survey',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:14:28',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'quality of life',
      1 => 'england',
      2 => 'local government',
      3 => 'london',
      4 => 'são paulo',
      5 => 'safety',
      6 => 'crime',
      7 => 'healthcare',
    ),
  ),
  547 => 
  array (
    'slug' => sanitize_title("Discussion"),
    'name' => 'Discussion',
    'format' => 'video',
    'type' => 'discussion',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:14:28',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'quality of life',
      1 => 'england',
      2 => 'local government',
      3 => 'london',
      4 => 'são paulo',
      5 => 'safety',
      6 => 'crime',
      7 => 'healthcare',
    ),
  ),
  548 => 
  array (
    'slug' => sanitize_title("A Vision for Sao Paulo"),
    'name' => 'A Vision for Sao Paulo',
    'format' => 'av',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:29:53',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'the open city',
      2 => 'são paulo',
      3 => 'growth',
      4 => 'migration',
      5 => 'demography',
      6 => 'traffic',
      7 => 'transport',
      8 => 'public transport',
      9 => 'housing',
      10 => 'public space',
      11 => 'culture',
      12 => 'social inclusion',
      13 => 'governance',
      14 => 'local government',
      15 => 'railways/metro',
      16 => 'roads',
      17 => 'taxes',
      18 => 'electoral reform',
    ),
  ),
  549 => 
  array (
    'slug' => sanitize_title("Sao Paulo City Stories: Jardim Angela"),
    'name' => 'Sao Paulo City Stories: Jardim Angela',
    'format' => 'video',
    'type' => 'film',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:04:30',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'the open city',
      2 => 'são paulo',
      3 => 'growth',
      4 => 'migration',
      5 => 'demography',
      6 => 'traffic',
      7 => 'transport',
      8 => 'public transport',
      9 => 'housing',
      10 => 'public space',
      11 => 'culture',
      12 => 'social inclusion',
      13 => 'governance',
      14 => 'local government',
      15 => 'railways/metro',
      16 => 'roads',
      17 => 'taxes',
      18 => 'electoral reform',
    ),
  ),
  550 => 
  array (
    'slug' => sanitize_title("Keynote"),
    'name' => 'Keynote',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:12:07',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'washington dc',
      1 => 'inequality',
      2 => 'public realm',
      3 => 'hope six',
      4 => 'anacosia waterfront initiative',
      5 => 'inclusion',
    ),
  ),
  551 => 
  array (
    'slug' => sanitize_title("Securing Los Angeles"),
    'name' => 'Securing Los Angeles',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:54',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'los angeles',
      1 => 'diversity',
      2 => 'policing',
      3 => 'inclusion',
    ),
  ),
  552 => 
  array (
    'slug' => sanitize_title("Inequalities, Fear and Transgressions in the City of Walls"),
    'name' => 'Inequalities, Fear and Transgressions in the City of Walls',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:13:05',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'fear',
      2 => 'gated communities',
      3 => 'crime',
      4 => 'violence',
      5 => 'segregation',
      6 => 'inequality',
      7 => 'music',
      8 => 'rap',
      9 => 'public space',
      10 => 'graffiti',
    ),
  ),
  553 => 
  array (
    'slug' => sanitize_title("Inequalities, Fear and Transgressions in the City of Walls"),
    'name' => 'Inequalities, Fear and Transgressions in the City of Walls',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:09:09',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'safety',
      1 => 'são paulo',
      2 => 'violence',
      3 => 'jardim paulista',
      4 => 'cidade tiradentes',
      5 => 'security',
      6 => 'inequality',
      7 => 'policing',
    ),
  ),
  554 => 
  array (
    'slug' => sanitize_title("Discussion"),
    'name' => 'Discussion',
    'format' => 'video',
    'type' => 'discussion',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:09:09',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'safety',
      1 => 'são paulo',
      2 => 'violence',
      3 => 'jardim paulista',
      4 => 'cidade tiradentes',
      5 => 'security',
      6 => 'inequality',
      7 => 'policing',
    ),
  ),
  555 => 
  array (
    'slug' => sanitize_title("From the Slum Tenement of Solon Street to the Union Building"),
    'name' => 'From the Slum Tenement of Solon Street to the Union Building',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:09:03',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'slums',
      1 => 'participation',
      2 => 'bom retiro',
      3 => 'cortiço vivo',
      4 => 'housing',
      5 => 'slum upgrading',
    ),
  ),
  556 => 
  array (
    'slug' => sanitize_title("Medellin Santo Domingo: Metroo Cable and Biblioteca Espana"),
    'name' => 'Medellin Santo Domingo: Metroo Cable and Biblioteca Espana',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Spanish',
    'running_time' => '00:10:17',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'medellín',
      1 => 'education',
      2 => 'urban design',
      3 => 'violence',
      4 => 'transport',
      5 => 'libraries',
      6 => 'parks',
      7 => 'public space',
      8 => 'schools',
      9 => 'access',
      10 => 'mobility',
      11 => 'participation',
      12 => 'integration',
      13 => 'slum upgrading',
    ),
  ),
  557 => 
  array (
    'slug' => sanitize_title("Working with Favelas in Rio de Janeiro"),
    'name' => 'Working with Favelas in Rio de Janeiro',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:09:29',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'rio de janeiro',
      1 => 'slums',
      2 => 'favelas',
      3 => 'exclusion',
      4 => 'informality',
      5 => 'culture',
      6 => 'development',
      7 => 'slum upgrading',
    ),
  ),
  558 => 
  array (
    'slug' => sanitize_title("Sao Paulo Guarapiranga: Economic Retrieval in the Periphery"),
    'name' => 'Sao Paulo Guarapiranga: Economic Retrieval in the Periphery',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:06:48',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'guarapiranga',
      2 => 'slums',
      3 => 'slum upgrading',
      4 => 'environment',
      5 => 'public space',
    ),
  ),
  559 => 
  array (
    'slug' => sanitize_title("Elemental: Housing as Investment, not Social Expense"),
    'name' => 'Elemental: Housing as Investment, not Social Expense',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:13:37',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'social housing',
      2 => 'participation',
      3 => 'elemental',
      4 => 'architecture',
    ),
  ),
  560 => 
  array (
    'slug' => sanitize_title("Discussion"),
    'name' => 'Discussion',
    'format' => 'video',
    'type' => 'discussion',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:13:37',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'social housing',
      2 => 'participation',
      3 => 'elemental',
      4 => 'architecture',
    ),
  ),
  561 => 
  array (
    'slug' => sanitize_title("Sao Paulo City Stories: Juliana Cidade Tiradentes"),
    'name' => 'Sao Paulo City Stories: Juliana Cidade Tiradentes',
    'format' => 'video',
    'type' => 'film',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:13:37',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'housing',
      1 => 'social housing',
      2 => 'participation',
      3 => 'elemental',
      4 => 'architecture',
    ),
  ),
  562 => 
  array (
    'slug' => sanitize_title("Keynote"),
    'name' => 'Keynote',
    'format' => 'av',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:14:43',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'lima',
      2 => 'transport',
      3 => 'governance',
      4 => 'traffic',
      5 => 'public transport',
      6 => 'roads',
      7 => 'buses',
      8 => 'pedestrians',
      9 => 'social inclusion',
    ),
  ),
  563 => 
  array (
    'slug' => sanitize_title("New York City\'s Sustainable Transport Agenda"),
    'name' => 'New York City\'s Sustainable Transport Agenda',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:11:58',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'transport',
      2 => 'growth',
      3 => 'streets',
      4 => 'traffic safety?',
      5 => 'mobility?',
      6 => 'urban design',
      7 => 'buses',
      8 => 'bicycles',
      9 => 'pedestrians',
    ),
  ),
  564 => 
  array (
    'slug' => sanitize_title("Strategies for Urban Mobility: A Comparative Overview"),
    'name' => 'Strategies for Urban Mobility: A Comparative Overview',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:48',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'berlin',
      1 => 'transport',
      2 => 'railways',
      3 => 'madrid',
      4 => 'los angeles',
      5 => 'beijing',
      6 => 'cars',
      7 => 'transport policy',
      8 => 'são paulo',
      9 => 'london',
    ),
  ),
  565 => 
  array (
    'slug' => sanitize_title("Mexico City: Bus Corridors for Centro and East Zone"),
    'name' => 'Mexico City: Bus Corridors for Centro and East Zone',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:48',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'mexico city',
      2 => 'transport',
      3 => 'public transport',
      4 => 'cars',
      5 => 'roads',
      6 => 'eje central corridor',
      7 => 'buses',
      8 => 'pedestrians',
      9 => 'planning',
      10 => 'neza-chimalhuacan corridor',
      11 => 'urban design',
    ),
  ),
  566 => 
  array (
    'slug' => sanitize_title("The Sao Paulo 2025 Transport Strategy"),
    'name' => 'The Sao Paulo 2025 Transport Strategy',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:09:11',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'transport',
      2 => 'public transport',
      3 => 'cycling',
      4 => 'metro',
      5 => 'railways',
      6 => 'transport policy',
    ),
  ),
  567 => 
  array (
    'slug' => sanitize_title("A New Look at Bus Corridors for Sao Paulo"),
    'name' => 'A New Look at Bus Corridors for Sao Paulo',
    'format' => 'video',
    'type' => 'talk',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:10:45',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'cars',
      2 => 'public transport',
      3 => 'são paulo',
      4 => 'metro',
      5 => 'buses',
      6 => 'railways',
      7 => 'integrated transport network',
      8 => 'elevado costa e silva',
    ),
  ),
  568 => 
  array (
    'slug' => sanitize_title("Discussion"),
    'name' => 'Discussion',
    'format' => 'video',
    'type' => 'discussion',
    'date' => '04/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:10:45',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mobility',
      1 => 'cars',
      2 => 'public transport',
      3 => 'são paulo',
      4 => 'metro',
      5 => 'buses',
      6 => 'railways',
      7 => 'integrated transport network',
      8 => 'elevado costa e silva',
    ),
  ),
  569 => 
  array (
    'slug' => sanitize_title("Opening Statement"),
    'name' => 'Opening Statement',
    'format' => 'video',
    'type' => 'tallk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:11:21',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'climate change',
      1 => 'sustainability',
      2 => 'carbon emmissions',
      3 => 'uk',
      4 => 'europe',
      5 => 'environment',
      6 => 'cars',
      7 => 'air travel',
      8 => 'london',
      9 => 'são paulo',
      10 => 'governance',
      11 => 'local government',
      12 => '',
    ),
  ),
  570 => 
  array (
    'slug' => sanitize_title("Reducing Carbon Emissions in London"),
    'name' => 'Reducing Carbon Emissions in London',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:38',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'carbon emmissions',
      1 => 'london',
      2 => 'climate change',
      3 => 'london climate change action plan',
      4 => 'transport',
      5 => 'public transport',
      6 => 'retrofitting',
      7 => 'energy supply',
      8 => 'c40',
    ),
  ),
  571 => 
  array (
    'slug' => sanitize_title("Sao Paulo\'s Environmental Agenda"),
    'name' => 'Sao Paulo\'s Environmental Agenda',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:11:35',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'environment policy',
      2 => 'water',
      3 => 'cars',
      4 => 'carbon emmisions',
      5 => 'renewable energy',
      6 => 'energy consumption',
    ),
  ),
  572 => 
  array (
    'slug' => sanitize_title("Netherlands: Climate Change and Urbanism"),
    'name' => 'Netherlands: Climate Change and Urbanism',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:08',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'netherlands',
      1 => 'climate change',
      2 => 'water',
      3 => 'carbon emmissions',
      4 => 'environment policy',
      5 => 'environment',
      6 => 'planning',
      7 => 'randstad delta',
      8 => 'sustainability',
      9 => 'governance?',
    ),
  ),
  573 => 
  array (
    'slug' => sanitize_title("Discussion"),
    'name' => 'Discussion',
    'format' => 'video',
    'type' => 'discussion',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:08',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'netherlands',
      1 => 'climate change',
      2 => 'water',
      3 => 'carbon emmissions',
      4 => 'environment policy',
      5 => 'environment',
      6 => 'planning',
      7 => 'randstad delta',
      8 => 'sustainability',
      9 => 'governance?',
    ),
  ),
  574 => 
  array (
    'slug' => sanitize_title("Greening Mexico City"),
    'name' => 'Greening Mexico City',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Spanish',
    'running_time' => '00:11:31',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mexico city',
      1 => 'xochimilco',
      2 => 'water',
      3 => 'parks',
      4 => 'environment',
    ),
  ),
  575 => 
  array (
    'slug' => sanitize_title("The Carbon Neutral Environment"),
    'name' => 'The Carbon Neutral Environment',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:44',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'environment',
      1 => 'sustainability',
      2 => 'carbon emmissions',
      3 => 'denmark',
      4 => 'china',
      5 => 'dongtan',
      6 => 'density',
      7 => 'planning',
      8 => 'uk',
      9 => 'beijing',
      10 => 'energy',
      11 => 'quality of life',
    ),
  ),
  576 => 
  array (
    'slug' => sanitize_title("Water Voids Project in Sao Paulo"),
    'name' => 'Water Voids Project in Sao Paulo',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:13:02',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'water',
      2 => 'history',
      3 => 'slums',
      4 => 'public space',
      5 => 'redevelopment',
    ),
  ),
  577 => 
  array (
    'slug' => sanitize_title("Ecobuilding for Sao Paulo"),
    'name' => 'Ecobuilding for Sao Paulo',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:14:53',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'climate change',
      2 => 'retrofitting',
      3 => 'urban design',
      4 => 'sustainability',
      5 => 'architecture',
      6 => 'luz neighbourhood',
    ),
  ),
  578 => 
  array (
    'slug' => sanitize_title("Discussion"),
    'name' => 'Discussion',
    'format' => 'video',
    'type' => 'discussion',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:14:53',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'climate change',
      2 => 'retrofitting',
      3 => 'urban design',
      4 => 'sustainability',
      5 => 'architecture',
      6 => 'luz neighbourhood',
    ),
  ),
  579 => 
  array (
    'slug' => sanitize_title("Keynote"),
    'name' => 'Keynote',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:26:17',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'cars',
      1 => 'buses',
      2 => 'curitiba',
      3 => 'transport',
      4 => 'public transport',
      5 => 'mobility',
      6 => 'cycling',
      7 => 'sustainability',
    ),
  ),
  580 => 
  array (
    'slug' => sanitize_title("Delivering Quality Environments in New York"),
    'name' => 'Delivering Quality Environments in New York',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:08:07',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'new york',
      1 => 'lower manhattan',
      2 => 'renewal',
      3 => 'development',
      4 => 'west chelsea',
      5 => 'highline park',
      6 => 'architecture',
    ),
  ),
  581 => 
  array (
    'slug' => sanitize_title("Interventions in the Global City"),
    'name' => 'Interventions in the Global City',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:12:17',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'environment',
      1 => 'cars',
      2 => 'transport',
      3 => 'sustainability',
      4 => 'density',
      5 => 'urban design',
      6 => 'architecture',
    ),
  ),
  582 => 
  array (
    'slug' => sanitize_title("Mechanism for Delivery"),
    'name' => 'Mechanism for Delivery',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:11:06',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'washington dc',
      1 => 'planning',
      2 => 'renewal',
      3 => 'anacostia waterfront project',
      4 => '',
    ),
  ),
  583 => 
  array (
    'slug' => sanitize_title("Sao Paulo: Delivering Urban Infrastructure"),
    'name' => 'Sao Paulo: Delivering Urban Infrastructure',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:13:53',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'planning',
      2 => 'public space',
      3 => 'parks',
      4 => 'environment',
    ),
  ),
  584 => 
  array (
    'slug' => sanitize_title("Sao Paulo: New Urban Interventions"),
    'name' => 'Sao Paulo: New Urban Interventions',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:10:31',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'sprawl',
      2 => 'renewal',
      3 => 'mobility',
      4 => 'participation',
      5 => 'architecture',
      6 => 'environment',
      7 => 'planning',
    ),
  ),
  585 => 
  array (
    'slug' => sanitize_title("Discussion"),
    'name' => 'Discussion',
    'format' => 'video',
    'type' => 'discussion',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:10:31',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'sprawl',
      2 => 'renewal',
      3 => 'mobility',
      4 => 'participation',
      5 => 'architecture',
      6 => 'environment',
      7 => 'planning',
    ),
  ),
  586 => 
  array (
    'slug' => sanitize_title("Keynote"),
    'name' => 'Keynote',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:10:31',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'sprawl',
      2 => 'renewal',
      3 => 'mobility',
      4 => 'participation',
      5 => 'architecture',
      6 => 'environment',
      7 => 'planning',
    ),
  ),
  587 => 
  array (
    'slug' => sanitize_title("Sao Paulo: Diagonal Sul"),
    'name' => 'Sao Paulo: Diagonal Sul',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:14:50',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'redevelopment',
      2 => 'diagonal sul',
    ),
  ),
  588 => 
  array (
    'slug' => sanitize_title("Designing the Open City"),
    'name' => 'Designing the Open City',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:11:49',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'netherlands',
      1 => 'architecture',
      2 => 'open city',
      3 => 'integration',
      4 => 'hamburg',
      5 => 'london olympic legacy',
    ),
  ),
  589 => 
  array (
    'slug' => sanitize_title("Lima: Urban Interventions"),
    'name' => 'Lima: Urban Interventions',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:56',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'lima',
      1 => 'growth',
      2 => 'architecture',
      3 => 'transport',
      4 => 'malls',
      5 => 'poverty',
    ),
  ),
  590 => 
  array (
    'slug' => sanitize_title("Consolidating Buenos Aires"),
    'name' => 'Consolidating Buenos Aires',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:08:29',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'buenos aires',
      1 => 'puerto bicentenario',
      2 => 'feria la salada',
      3 => 'informality',
      4 => 'development',
    ),
  ),
  591 => 
  array (
    'slug' => sanitize_title("Mumbai: The Waterfront Project"),
    'name' => 'Mumbai: The Waterfront Project',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:59',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'public space',
      2 => 'mumbai waterfront project',
      3 => 'environment',
      4 => 'participation',
    ),
  ),
  592 => 
  array (
    'slug' => sanitize_title("Discussion"),
    'name' => 'Discussion',
    'format' => 'video',
    'type' => 'discussion',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:10:59',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'mumbai',
      1 => 'public space',
      2 => 'mumbai waterfront project',
      3 => 'environment',
      4 => 'participation',
    ),
  ),
  593 => 
  array (
    'slug' => sanitize_title("Closing Remarks"),
    'name' => 'Closing Remarks',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:10:59',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'brazil',
      2 => 'employment',
      3 => 'governance',
    ),
  ),
  594 => 
  array (
    'slug' => sanitize_title("Closing Remarks"),
    'name' => 'Closing Remarks',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:05:08',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'urban age',
      1 => 'globalisation',
      2 => 'finance',
      3 => 'transport',
    ),
  ),
  595 => 
  array (
    'slug' => sanitize_title("Closing Remarks"),
    'name' => 'Closing Remarks',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'Portuguese',
    'running_time' => '00:05:08',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'growth',
      2 => 'knowledge economy',
      3 => 'global circuits',
      4 => 'diagonal sul',
    ),
  ),
  596 => 
  array (
    'slug' => sanitize_title("Closing Remarks"),
    'name' => 'Closing Remarks',
    'format' => 'video',
    'type' => 'talk',
    'date' => '05/12/2008',
    'language2' => 'English',
    'running_time' => '00:02:34',
    'geotags' => 
    array (
      0 => 'new york',
    ),
    'tags' => 
    array (
      0 => 'são paulo',
      1 => 'growth',
      2 => 'knowledge economy',
      3 => 'global circuits',
      4 => 'diagonal sul',
    ),
  ),
);

$tags_api = new PodAPI('tag', 'php');
$tags_api->import($all_the_tags);

$geotags_api = new PodAPI('geotag', 'php');
$geotags_api->import($all_the_geotags);

$media_items_api = new PodAPI('media_item', 'php');
$media_items_api->import($all_the_media_items);


?>
