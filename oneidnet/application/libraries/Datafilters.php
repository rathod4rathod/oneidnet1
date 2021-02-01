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
	$blackList=array("anus", "arse", "arsehole", "ass", "ass-hat", "ass-jabber", "ass-pirate", "assbag", "assbandit", 
      "assbanger", "assbite", "assclown", "asscock", "asscracker", "asses", "assface", "assfuck", "assfucker", "assgoblin",
      "asshat", "asshead", "asshole", "asshopper", "assjacker", "asslick", "asslicker", "assmonkey", "assmunch", "assmuncher", 
      "assnigger", "asspirate", "assshit", "assshole", "asssucker", "asswad", "asswipe", "axwound", "bampot", "bastard", "beaner", 
      "bitch", "bitchass", "bitches", "bitchtits", "bitchy", "blow job", "blowjob", "bollocks", "bollox", "boner", "brotherfucker", 
      "bullshit", "bumblefuck", "butt plug", "butt-pirate", "buttfucka", "buttfucker", "camel toe", "carpetmuncher", "chesticle", 
      "chinc", "chink", "choad", "chode", "clit", "clitface", "clitfuck", "clusterfuck", "cock", "cockass", "cockbite", "cockburger",
      "cockface", "cockfucker", "cockhead", "cockjockey", "cockknoker", "cockmaster", "cockmongler", "cockmongruel", "cockmonkey", 
      "cockmuncher", "cocknose", "cocknugget", "cockshit", "cocksmith", "cocksmoke", "cocksmoker", "cocksniffer", "cocksucker", 
      "cockwaffle", "coochie", "coochy", "coon", "cooter", "cracker", "cum", "cumbubble", "cumdumpster", "cumguzzler", "cumjockey",
      "cumslut", "cumtart", "cunnie", "cunnilingus", "cunt", "cuntass", "cuntface", "cunthole", "cuntlicker", "cuntrag", "cuntslut",
      "dago", "damn", "deggo", "dick", "dick-sneeze", "dickbag", "dickbeaters", "dickface", "dickfuck", "dickfucker", "dickhead", 
      "dickhole", "dickjuice", "dickmilk", "dickmonger", "dicks", "dickslap", "dicksucker", "dicksucking", "dicktickler", "dickwad",
      "dickweasel", "dickweed", "dickwod", "dike", "dildo", "dipshit", "doochbag", "dookie", "douche", "douche-fag", "douchebag", 
      "douchewaffle", "dumass", "dumb ass", "dumbass", "dumbfuck", "dumbshit", "dumshit", "dyke", "fag", "fagbag", "fagfucker",
      "faggit", "faggot", "faggotcock", "fagtard", "fatass", "fellatio", "feltch", "flamer", "fuck", "fuckass", "fuckbag", "fuckboy",
      "fuckbrain", "fuckbutt", "fuckbutter", "fucked", "fucker", "fuckersucker", "fuckface", "fuckhead", "fuckhole", "fuckin", 
      "fucking", "fucknut", "fucknutt", "fuckoff", "fucks", "fuckstick", "fucktard", "fucktart", "fuckup", "fuckwad", "fuckwit", 
      "fuckwitt", "fudgepacker", "gay", "gayass", "gaybob", "gaydo", "gayfuck", "gayfuckist", "gaylord", "gaytard", "gaywad", 
      "goddamn", "goddamnit", "gooch", "gook", "gringo", "guido", "handjob", "hard on", "heeb", "hell", "ho", "hoe", "homo",
      "homodumbshit", "honkey", "humping", "jackass", "jagoff", "jap", "jerk off", "jerkass", "jigaboo", "jizz", "jungle bunny",
      "junglebunny", "kike", "kooch", "kootch", "kraut", "kunt", "kyke", "lameass", "lardass", "lesbian", "lesbo", "lezzie", 
      "mcfagget", "mick", "minge", "mothafucka", "mothafuckin\'", "motherfucker", "motherfucking", "muff", "muffdiver", "munging",
      "negro", "nigaboo", "nigga", "nigger", "niggers", "niglet", "nut sack", "nutsack", "paki", "panooch", "pecker", "peckerhead",
      "penis", "penisbanger", "penisfucker", "penispuffer", "piss", "pissed", "pissed off", "pissflaps", "polesmoker", "pollock", 
      "poon", "poonani", "poonany", "poontang", "porch monkey", "porchmonkey", "prick", "punanny", "punta", "pussies", "pussy", 
      "pussylicking", "puto", "queef", "queer", "queerbait", "queerhole", "renob", "rimjob", "ruski", "sand nigger", "sandnigger",
      "schlong", "scrote", "shit", "shitass", "shitbag", "shitbagger", "shitbrains", "shitbreath", "shitcanned", "shitcunt", 
      "shitdick", "shitface", "shitfaced", "shithead", "shithole", "shithouse", "shitspitter", "shitstain", "shitter", "shittiest",
      "shitting", "shitty", "shiz", "shiznit", "skank", "skeet", "skullfuck", "slut", "slutbag", "smeg", "snatch", "spic", "spick", 
      "splooge", "spook", "suckass", "tard", "testicle", "thundercunt", "tit", "titfuck", "tits", "tittyfuck", "twat", "twatlips", 
      "twats", "twatwaffle", "unclefucker", "va-j-j", "vag", "vagina", "vajayjay", "vjayjay", "wank", "wankjob", "wetback", "whore",
      "whorebag", "whoreface", "wop" );
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
