#!/usr/bin/perl
#instmodsh ---this is the command to display the modules installed on system, execute the command in terminal
# after executing the above command will prompt to enter the list of options displayed
#use strict;
#use warnings;
use DBI;
use Time::Piece;
#use DateTime;
$currentdate=localtime->strftime('%Y-%m-%d');
$dbh = DBI->connect('dbi:mysql:db_oneidnet','root','Weldone123') or die "Connection Error: $DBI::errstr\n";
$sql = "select * from os_store_renewals_info where date(expired_on)='$datetime' and is_renewed=1";
#print "query:$sql\n";
$sth = $dbh->prepare($sql);
$sth->execute or die "SQL Error: $DBI::errstr\n";
my $filename = '/home/pavani/Desktop/data.txt';
open FILE,">>",$filename or die $!;
print "todays datetime:".getCurrentTime()."\n";
while (@row = $sth->fetchrow_array) {
	$str="";	
	$expires_on=$row[5];
	$store_aid=$row[1];
	$str=$store_aid."~".$expires_on."\n";
	print FILE $str;	
} 
close FILE;
my $datetime=getCurrentTime();

sub getCurrentTime {
    my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst)=localtime(time);
    my $nice_timestamp = sprintf ( "%04d-%02d-%02d %02d:%02d:%02d",$year+1900,$mon+1,$mday,$hour,$min,$sec);
    return $nice_timestamp;
}


