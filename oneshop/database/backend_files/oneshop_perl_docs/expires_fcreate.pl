#!/usr/bin/perl
#instmodsh ---this is the command to display the modules installed on system, execute the command in terminal
# after executing the above command will prompt to enter the list of options displayed
#use strict;
#use warnings;
use DBI;
use Time::Piece;
#use DateTime;
$datetime=localtime->strftime('%Y-%m-%d');
my $ndatetime=getNextDateTime();
my @datetime_arry=split / /,$ndatetime;
my $ndatetime_arry=$datetime_arry[0];
my @ndate_arry=split /-/,$ndatetime_arry;
my $ndate=$ndate_arry[0]."-".$ndate_arry[1]."-".$ndate_arry[2];
print "next date:".$ndate;
$dbh = DBI->connect('dbi:mysql:db_oneidnet','root','Weldone123') or die "Connection Error: $DBI::errstr\n";
#$sql = "select * from os_store_renewals_info where date(expired_on)='$ndate' and is_renewed=1";
$sql="select stores.store_id_fk,profiles.profile_id,profiles.email,stores.store_id_fk,stores.expired_on,is_renewed from os_store_renewals_info stores inner join os_all_store allstores on stores.store_id_fk=allstores.store_aid inner join iws_profiles profiles on allstores.created_by=profiles.profile_id where date(stores.expired_on)='$ndate' and is_renewed=1 GROUP BY allstores.store_aid";
print "query:$sql\n";
$sth = $dbh->prepare($sql);
$sth->execute or die "SQL Error: $DBI::errstr\n";
my $filename = '/home/pavani/Desktop/estores.txt';
open FILE,">>",$filename or die $!;
while (@row = $sth->fetchrow_array) {
	$str="";	
	$expires_on=$row[4];
	$store_aid=$row[0];
	$email_id=$row[2];
	$str=$store_aid."~".$expires_on."~".$email_id."~N"."\n";
	print FILE $str;	
}
close FILE;
my $datetime=getCurrentTime();
sub getCurrentTime {
    my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst)=localtime(time);
    my $nice_timestamp = sprintf ( "%04d-%02d-%02d %02d:%02d:%02d",$year+1900,$mon+1,$mday,$hour,$min,$sec);
    return $nice_timestamp;
}

sub getNextDateTime {
    my ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst)=localtime(time+24*3600);
    my $nice_timestamp = sprintf ( "%04d-%02d-%02d %02d:%02d:%02d",$year+1900,$mon+1,$mday,$hour,$min,$sec);
    return $nice_timestamp;
	#print "inside the getNextDateTime function:".$nice_timestamp;
}
