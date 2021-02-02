<?php

/******************************************************************************
 *  * Function: 
 * This Function should return false abuse words.
 * Checking for Abuse words in the text Fields.
 * Author: Sravani <sravani@oneidnet.com>
 * Date Written: Feb 17, 2015
 * Return Type: Array
 * USAGE: var_dump( $this->datafilters->profanityFilter("This is the input data") );
 * 
 ******************************************************************************/

class Datafilters {
    public function profanityFilter($input) {
        $input=strtolower($input);
	  $blackList=array("abysmal","adverse","alarming","angry","annoy","anxious","apathy","appalling","atrocious","awful",
        "bad","banal","barbed","belligerent","bemoan","beneath","boring","broken","callous","clumsy","coarse","cold","cold-hearted","collapse","confused",
        "contradictory","contrary","corrosive","corrupt","crazy","creepy","criminal","cruel","cry","cutting","dead","decaying","damage","damaging",
        "dastardly","deplorable","depressed","deprived","deformed","deny","despicable","detrimental","dirty","disease","disgusting","disheveled",
        "dishonest","dishonorable","dismal","distress","dreadful","dreary","enraged","eroding","evil","fail","faulty","fear","feeble","fight","filthy",
        "foul","frighten","frightful","gawky","ghastly","grave","greed","grim","grimace","gross","grotesque","gruesome","guilty","haggard","hard",
        "hard-hearted","harmful","hate","hideous","homely","horrendous","horrible","hostile","hurt","hurtful","icky","ignore","ignorant","ill",
        "immature","imperfect","impossible","inane","inelegant","infernal","injure","injurious","insane","insidious","insipid","jealous","junky",
        "lose","lousy","lumpy","malicious","mean","menacing","messy","misshapen","missing","misunderstood","moan","moldy","monstrous","naive","nasty",
        "naughty","negate","negative","never","no","nobody","nondescript","nonsense","not","noxious","objectionable","odious","offensive","old",
        "oppressive","pain","perturb","pessimistic","petty","plain","poisonous","poor","prejudice","questionable","quirky","quit","reject","renege",
        "repellant","reptilian","repulsive","repugnant","revenge","revolting","rocky","rotten","rude","ruthless","sad","savage","scare","scary","scream",
        "severe","shoddy","shocking","sick","sickening","sinister","slimy","smelly","sobbing","sorry","spiteful","sticky","stinky","stormy","stressful",
        "stuck","stupid","substandard","suspect","suspicious","tense","terrible","terrifying","threatening","ugly","undermine","unfair","unfavorable",
        "unhappy","unhealthy","unjust","unlucky","unpleasant","upset","unsatisfactory","unsightly","untoward","unwanted","unwelcome","unwholesome",
        "unwieldy","unwise","upset","vice","vicious","vile","villainous","vindictive","wary","weary","wicked","woeful","worthless","wound","yell","yucky","zero");
	$in=explode(" ", $input);
	$output=array_intersect($blackList, $in);
  $output=implode(", ",$output);
  return $output;
	//$count=count($output);
/*	if($count>0) {
            return 0;	    
            //echo "The input is a spam";
	} else {
            //echo "The clean data";
            return 1;
        }*/
    }
}

?>
