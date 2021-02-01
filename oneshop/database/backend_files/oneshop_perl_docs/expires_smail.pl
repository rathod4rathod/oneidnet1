#!/usr/bin/perl
#instmodsh ---this is the command to display the modules installed on system, execute the command in terminal
# after executing the above command will prompt to enter the list of options displayed
#use strict;
#use warnings;
use DBI;
use Time::Piece;
use Date::Parse;
$datetime=localtime->strftime('%Y-%m-%d');
$dbh = DBI->connect('dbi:mysql:db_oneidnet','root','Weldone123') or die "Connection Error: $DBI::errstr\n";
$currenttime=getCurrentTime();
print "current date and time".$currenttime."\n";
my $filename = '/home/pavani/Desktop/edata.txt';
my @data;
$i=0;
if (open(my $fh, '<:encoding(UTF-8)', $filename)) {
  while (my $row = <$fh>) {
    chomp $row;
    $data[$i]=$row;
    $i++;
  }
} else {
  warn "Could not open file '$filename' $!";
}

#@data_arry=split /~/,$data;
while(my($str,$str1)=each @data){
	my $sql='';
	@tmp=split /~/,$str1;
	#print $tmp[0]."->".$tmp[1]."---";
	$storeid=$tmp[0];
	$expires_on=$tmp[1];
	$ret=compareDates($expires_on,$currenttime);
	if($ret eq "greater"){
		#`php sendmail.php send`;
		print "date2 is greater than date1\n";
	}else{
		print "date2 is lesser than date1\n";
	}
}
sub compareDates{
	#print "Inside the compareDates function:";
	$date1=$_[0];
	$date2=$_[1];
	$udate1 = str2time($date1);
	$udate2 = str2time($date2);

	if ($udate2 > $udate1) {
		return "greater";
	} else {
		return "lesser";
	}
}

sub getCurrentTime {
    my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst)=localtime(time);
    my $nice_timestamp = sprintf ("%04d-%02d-%02d %02d:%02d:%02d",$year+1900,$mon+1,$mday,$hour,$min,$sec);
    return $nice_timestamp;
}


