<?php
$this->load->module('templates');
$this->templates->content_header();
//$this->session->userdata('user_id');
?>

              <div class="middle_content">
		<!-- Start Left -->
                <div class="main_content_left">

                    <div class="left_links">

                         <ul>
                            <li class="about_img"><a href="<?php echo base_url().'home/aboutus'?>" ></a></li>
                            <li class="policies_img"><a href="<?php echo base_url().'home/policies'?>" ></a></li>
                            <li class="foundation_img"><a href="<?php echo base_url().'home/foundation'?>"></a></li>
                            <li class="privacy_img_active"><a href="<?php echo base_url().'home/privacy'?>"></a></li>
                            <li class="tc_img"><a href="<?php echo base_url().'home/termsconditions'?>"></a></li>
                            <?php if($type == 'module' && $type != 'representative' && $type != 'add'){?>
                    <li class="cs_img_active"><a href="<?php echo base_url() . 'home/customersupport' ?>"></a></li>
                <?php }else{?>
                    <li class="cs_img"><a href="<?php echo base_url() . 'home/customersupport' ?>"></a></li>
                <?php } ?>
                <li class="cu_img"><a href="<?php echo base_url() . 'home/contactus' ?>"></a></li>
                <li class="all_img"><a href="<?php echo base_url() . 'home/allinone' ?>"></a></li>
                        <?php 
                    $obj = $this->load->module('cookies');
                    $db_api = $this->load->module('db_api');
                    $sup_query = "SELECT * FROM iws_profiles iws INNER JOIN oneid_support os ON os.one_email = iws.email WHERE profile_id='".$obj->getUserID()."'";
                    $emp_rest = $db_api->custom($sup_query);
                    if($emp_rest){?>
                        <li class="sacc_img"><a href="<?php echo base_url() . 'home/emp_support_access'?>"></a></li>
                    <?php } ?>
                <?php 
                    if($add_repre_support != "" || $repre != ""){
                        if($type != 'module' && $type != 'representative' && $type == 'add'){?>
                        <li class="asupp_img_active"><a href="<?php echo base_url() . 'home/createsupport_emp' ?>"></a></li>
                <?php }else{?>
                        <li class="asupp_img"><a href="<?php echo base_url() . 'home/createsupport_emp' ?>"></a></li>
                    <?php }
                    } ?>
                    <?php
                    if($add_repre_support != "" || $repre != "" ){
                        if($type != 'module' && $type != 'add' && $type == 'representative'){?>
                            <li class="arepre_img_active"><a href="<?php echo base_url() . 'home/add_representative' ?>"></a></li>
                    <?php }else{?>
                            <li class="arepre_img"><a href="<?php echo base_url() . 'home/add_representative' ?>"></a></li>
                    <?php }
                    } ?>
                        </ul>


                    </div>

                </div>
                <!-- End Left -->


                <!-- Start Right -->
                <div class="main_content_right">

                    <div class="heading_content">PRIVACY POLICY</div>

                      <div class="main_content_right_scroll">

                    <div class="main_content">The moment the user starts using the ONEIDNET System, Modules and Services, the user is trusting us with his/her data content.</div>

                      <div class="sub_heading_content">PURPOSE:</div>


                    <div class="main_content">The purpose of this Privacy Policy is for the ONEIDNET Internet System users to understand

what user content we collect, why we collect it, and what we do with user content we collect,

together with information about personal, professional and business transactions. Please

take the time to read this policy carefully because it is very important. The ONEIDNET

System provides the user with ways to protect the user’s privacy and security through their

account options.</div>

  <div class="main_content">There are different Modules in the ONEIDNET System providing several services to search

for and share information, to communicate with other people or to create new content, to

make business transactions, to provide professional and personal information, etc. One way

the user shares information with us is by creating a ONEIDNET Account, in this way

ONEIDNET can make our Services to the user faster, easier and better, especially the

Services our users get free of charge.  Some of our services to the user include, providing

cyber space for users to register and establish their own stores, providing cyber space for

users to establish and register their offices, providing the most advanced system for users to

get jobs through the cv bank, video and voice communication, e-mail services, traveling

services, marketing and advertising services, professional network, social network, popularity

network, video and music upload and download, news, internet tv services, shipping

services, a direct access ONEIDNET staff network, and a search engine that shows relevant

results to users in every possible search area over the internet, to show the user more

relevant search results, to help the user connect with people, groups of people, businesses,

government, companies, and connect with their own system and their own network or to

make sharing and doing business with others quicker and easier. ONEIDNET wants its users

to on how we use their information and how much we care about protecting the users’

privacy, data and the protection of their overall ONEIDNET Personal Internet System.</div>

                 <div class="sub_heading_content">PRIVACY POLICY CONDITIONS:</div>


                <div class="main_content">What data is provided by users to ONEIDNET and why it is provided, how ONEIDNET uses the data. The Modules we offer in the Internet System, including how to access and update

the users’ data.</div>

  <div class="main_content">The ONEIDNET users’ privacy, data and protection of these is one of the top priorities for ONEIDNET so whether the user is new to ONEIDNET or the user has now been using our
Internet System for a long time, please take the time to get to know our privacy policies and
how much the users are protected. Please do not hesitate to contact us if you have any
questions.</div>

                 <div class="sub_heading_content">INFORMATION PROVIDED TO ONEIDNET:</div>

                   <div class="main_content">ONEIDNET collects information from the Internet System enable us to provide better Modules and Services to all of our users. ONEIDNET wants to provide our users with the
best possible services from basic social clicks, to what type of job a user wants, to helping
users in setting up their own business, to dealing directly with any company across the world.
The things that users need the most, all available in one system, what music and videos
users might like, and every service our System Modules provide are all made possible when
ONEIDNET utilizes the information we collect to serve people in the best way possible.</div>

<div class="sub_heading_content">HOW INFORMATION IS PROVIDED TO ONEIDNET:</div>


 <div class="main_content">Regarding the information users provide to ONEIDNET, users require only one ONEIDNET

account to use all of our Services in our Modules. Once a user signs up and registers for a

ONEIDNET account, we will forward an e-mail to the user within the System, which will

instruct for the user to go to their NetPro Module to complete the user’s ONEIDNET profile,

completing the user’s NetPro profile will ensure that the user is able to use all the System

Modules immediately.  All Modules are automatically connected and interfaced with the

information provided when completing the NetPro profile, thus populating the entire System.

When users go to complete their NetProl profile, we’ll request for personal information, like

user’s name, telephone number or credit card information to store with the user’s account.

We will also request information like professional history, such as professional degrees,

identifications, registrations, licenses, etc. These are used for the System to function in being

able to verify credentials and qualifications for jobs by Companies through the Corporate

Office Module for example.</div>


<div class="main_content">ONEIDNET collects information about the Modules and Services that the user uses and how
the user uses them, like when the user uploads or creates a new cv, or visits the system to
open a new store, or takes time to share something in their social network, or the user opens
an office on behalf of the company he/she works for are just some of the ways we interact
with the System users to better provide our services through our System Modules.</div>

<div class="sub_heading_content">EQUIPMENT:</div>

<div class="main_content">ONEIDNET will require to associate the user’s ONEIDNET account with the devices he/she
uses to log into the System. The type of information we will collect from the user’s devices
may include hardware model number, type of operating system and version, device
identifiers, phone number if the device is for making phone calls, service provider, etc.</div>


<div class="sub_heading_content">LOGS:</div>

<div class="main_content">When the user uses our System, Modules and Services or views and utilizes content
provided by ONEIDNET, we automatically collect and store the user’s log information
in server</div>

<div class="sub_heading_content">LOCATION:</div>

<div class="main_content">ONEIDNET will access the user’s location when the user is using our System, Modules and

Services. We may collect and process information about your actual location by use of
technologies to determine location, IP address, and other identifiers that may provide
ONEIDNET with information on nearby equipment for internet access, access points and
service towers.</div>

<div class="sub_heading_content">BROWSING:</div>

<div class="main_content">ONEIDNET uses various technologies to collect and store information when the user visits

the ONEIDNET Internet System, Modules and Service, and this may include using cookies or

similar technologies to identify your browser or device. Our ONEIDNET automatic analysis

helps users and businesses owners analyze the traffic, content, data, activity, transactions to

their social networks, professional networks, stores, offices, etc.</div>

<div class="main_content">Information we collect when the user is signed in to his/her ONEIDNET System and Modules is associated with the user’s ONEIDNET account. Information associated with the user’s
ONEIDNET account is treated as personal and professional information.</div>

<div class="sub_heading_content">USE OF INFORMATION:</div>


<div class="main_content">ONEIDNET uses the information collected in our Internet System to provide,
maintain, protect and improve the Modules and Services for the user, to develop new ones,
and to protect ONEIDNET and our users. We also use information to provide the user with a
personalized Internet System. An Internet personalized System is a System that provides the
user with only the Internet content he/she wants and give the user control of their system.
</div>

<div class="main_content">ONEIDNET uses the name the user provides when the user first signs up and registers in the

System.  This name is used across all the System Modules and Services we offer through

the user’s ONEIDNET account. In other words, the user name the user selects will be used

for their personal and social activities as well as their business and professional ones.  It is

extremely important to choose a professional name for the user’s ONEIDNET profile. The

user will have the ability to not broadcast their social activities to certain users, groups,

companies or not make their social activities public at all.
</div>

<div class="main_content">Through the user’s ONEIDNET Account, we will display the user’s Profile name, Profile

photo(s), and actions the user takes on the ONEIDNET System, Modules and Services, so
keep in mind that the user’s Profile information is used across the entire ONEIDNET platform
and this will be displayed in personal, business, commercial, professional, social and
worldwide contexts. We will respect the choices the user makes to provide suitable visibility
settings for the user’s ONEIDNET ONEIDNET.
</div>

<div class="sub_heading_content">TRANSPARENCY:</div>

<div class="main_content">One of ONEIDNET’s top priorities is to be clear about the information we collect from our users and to assure our users that no one moral entity or physical entity will have access to
their private information, including our ONEIDNET policy to not under any circumstances
allow access to any government whether local, national or international, to our user’s private
information. This is so that the user can make meaningful choices when they are using the
System, Modules and Services and to feel completely free and assured that their information
is safe with ONEIDNET.
</div>

<div class="main_content">The System user is able to view and edit his/her preferences in each System Module as
designed for the users to manage their own preferences and settings with categories that
interests each specific user. The user also chooses how they want to see marketing and
advertising as he/she wants to manage and maintain each Module in their System.
</div>

<div class="main_content">
The user is also able to change the appearances of the Modules and how his/her Profile for
each Module appears to others.
</div>

<div class="main_content">
The user may at his/her discretion arrange, rearrange and pin the Modules in their System in

order to personalize the ONEIDNET Internet System according to his/her needs. Additionally,

the user may minimize the Modules to bar size, enlarge the Modules to be able to view single

broadcasts, while the Modules are not active, they will still continue to broadcast and the

Module, which the user selects will appear in the center window to be the active Module the

user will be working on.
</div>

<div class="main_content">
The user will choose in each Module if he/she wants their profile for that Module to be public
or private and what content he/she wants to appear in the System or in each individual
Module.
</div>

<div class="main_content">
The use of cookies in the ONEIDNET Internet System is the standard use across the World

Wide Web, where the cookies associated with the System and the Modules are logged and

set in the user’s browsing equipment, this is order to make our Services run faster and better

in the user’s browsing equipment. Cookies are very important in order for the ONEIDNET

Internet System to remember the user’s System and Modules preferences.
</div>

<div class="sub_heading_content">USER INFORMATION:</div>

<div class="main_content">
All the ONEIDNET Internet System Modules allows the user to share different types of
information with other users, stores, agents, companies, government offices, and several
different types of entities. It is crucial to keep in mind that when the user makes their
information public in the ONEIDNET Internet System, not only will his/her friends in their
social networks will be able to see his/her posting and content, but also businesses,
companies, employers, store managers, and other professional networks will be able to see
the public content, which is the reason why our Internet System provides the user with
different options for managing his/her content according to each System Module settings.
</div>

<div class="sub_heading_content">THE USER’S PERSONAL AND PROFESSIONAL INFORMATION:</div>

<div class="main_content">
When the user is using our ONEIDNET Internet System our goal is to provide the user with
quick access to all their personal and professional information. In the event that a user or
multiple users input the wrong information, the System provides ways for the user to update
or delete his/her information quickly. We will maintain the user information when we use it for
legitimate business or legal purposes. When the user enters his/her personal and
professional information the System will ask the user to verify their identity before posting
certain information and documentation in their ONEIDNET account.
</div>


<div class="main_content">
ONEIDNET will reject requests that are unreasonable, illegal, repetitive, technically
impractical, privacy risks, or excessively affecting the functionality, effectiveness and
efficiency of the System and Modules.
</div>

<div class="main_content">
One of ONEIDNET’s top priorities is to protect information from accidental and/or malicious
destruction, this is why when a user deletes information from our ONEIDNET Internet System
and Services, the information may not be deleted immediately from our servers and backup
systems. There are a lot of services that ONEIDNET provides to its users free of charge and
updating, maintaining and operating the personalized Internet System for every ONEIDNET
user is part of our free services unless disproportionate efforts to provide any of the free
services in our ONEIDNET Internet System.
</div>

<div class="sub_heading_content">ONEIDNET INFORMATION:</div>

<div class="main_content">
The user’s personal and professional information will only be shared to the companies,
organizations, physical entities and other users the user decides to share it with through each
one of the System Modules. No ONEIDNET’s personnel as it is ONEIDNET’s policy to
completely safeguard the users’ information is authorized to share any ONEIDNET data with
any one entity, whether local, national or international, physical person or moral entity and in
particular to any government entity under any circumstances without exception.
</div>

<div class="sub_heading_content">ADMINISTRATORS:</div>

<div class="main_content">
In cases where the ONEIDNET account is managed by an account administrator, for
example, in One Shop or in Corporate Office as the managers of the Store or the Office, then
the administrator who provides user support to the user’s employer will have access to the
user’s ONEIDNET account information including all Modules’ data. In this case, the user
should specify between the administrator and the user what type of information will be
accessed by the administrator in the user’s ONEIDNET account. Only the user can grant
access to administrators into their ONEIDNET accounts.
</div>

<div class="sub_heading_content">EXTERNAL PROCESSING:</div>

<div class="main_content">
ONEIDNET does not provide users’ personal or professional information to third parties,
trusted businesses or persons for any reason or under any circumstances. According to
ONEIDNET’s Privacy Policy the users’ information will strictly be handled only by ONEIDNET
personnel who will keep users’ information safe and secure.
</div>

<div class="sub_heading_content">AGREEMENT CHANGES:</div>

<div class="main_content">
We at ONEIDNET may modify agreements and related ONEIDNET policies from time to time,
herein after known as (“Revisions”) by posting these Revisions in the ONEIDNET Internet
System, Modules and Services at <a href="#" target="_blank">www.oneidne.com.</a>
</div>


<div class="main_content">
The Revisions are effective immediately upon posting in the ONEIDNET System. Users and

Organizations will receive notice of the Revisions(s) in the next applicable monthly invoice.

Users and Organizations will then have up to thirty (30) calendar days from the invoice notice

of such Revisions to provide ONEIDNET with written notice that the Revisions adversely

affect the user’s or organization’s use of the Service(s).
</div>



<div class="main_content">
If after the notice issued by ONEIDNET through our Internet System, we are able to verify

such adverse effect, but are unable to reasonably mitigate the Revision’s impact on such

Services, the user or organization may terminate the impacted Service(s) without further

obligation to ONEIDNET beyond the date of payment of the user or organization’s due

amounts, including Termination Charges, if any. This shall be the user or organization sole and exclusive remedy.
</div>

<div class="sub_heading_content">DELIVERY OF SERVICES:</div>

<div class="sub_sub_heading_content">CONTRACTS:</div>


<div class="main_content">
Every Customer shall submit to ONEIDNET a properly completed and signed Service

Contract to initiate Services on a ONEIDNET Internet System Module. A Service Contract

shall become binding on the parties when (i) it is specifically accepted by ONEIDNET either

electronically or in writing, (ii) ONEIDNET begins providing the Services described in the

Service Contract or (iii) ONEIDNET takes any action towards the commencement of the

specific Service described in the Service Contract. When a Service Contract becomes

effective it shall be deemed part of, and shall be subject to, the Agreement. This is the Service

Contract General Agreement, specific Service Contract Terms are executed between the

parties for each System Module and Service.
</div>

<div class="sub_sub_heading_content">SERVICE COMMENCEMENT DATE:</div>

<div class="main_content">
Upon the instance when the Service Contract becomes binding on the parties, ONEIDNET

shall notify the user or the organization that the Services are available for use, and the date of

such notice shall be called the “Service Commencement Date.” Any failure or refusal on the

part of the user or organization to be ready to receive the Services on the Service

Commencement Date shall not relieve the user or organization of its obligation to pay

applicable Service charges.
</div>

<div class="sub_sub_heading_content">ONEIDNET LIMITATION OF SERVICES:</div>


<div class="main_content">
ONEIDNET Services are provided according to the Internet System Specific Module Services, for most System Modules, ONEIDNET’s service is as a “Service Vehicle” and ONEIDNET is not the physical or moral entity actually performing the commercial, business or professional services transactions, which are specific activities of the user or the organization, for example, in the System One Shop Module, ONEIDNET is not the physical entity that actually sells or purchases products or services in the One Shop Stores, these activities are actually performed by the user or organization, which owns the particular Store.  ONEIDNET performs as a “Service Vehicle” for users or organizations to sell and purchase in One Shop. ONEIDNET charges a percentage for each sale from the Store Owner(s) and a monthly fee to maintain and operate his/her store.
</div>

<div class="main_content">
The user or the organization must complete a Module Service specific Service Contract to execute a binding agreement specific for that Service, which will become part of this General Service Contract Agreement.
</div>

<div class="sub_sub_heading_content">USER OR ORGANIZATION TRANSACTIONS:</div>
<div class="main_content">
ONEIDNET shall have no obligation or responsibility for the user and/or organization personal, business, commercial or professional transactions that are not part of any executed and signed agreement between ONEIDNET and any user and/or organization party. Users and/or organizations perform activities, actions and transactions through the ONEIDNET Internet System that are the sole responsibility of that user and/or organization.  For example, the selling of products or services in One Shop, or the recruitment of a candidate in Corporate Office, or company’s video interviews of candidates in VCom, and many of the specific services under each System Module.
</div>


<div class="main_content">
Users and/or organizations are responsible for all charges applicable to the different tiers or services provided in each specific System Module, including but not limited to, maintenance, operation, specific service charge, package or (level) of service charge, all applicable fees, taxes, and other worldwide service charges.
</div>

<div class="sub_sub_heading_content">ADMINISTRATIVE ONEIDNET MODULE:</div>

<div class="main_content">
The Module used for the ONEIDNET System Administration is “One Network,” this is the designated and only Module that will handle all Service Contract Agreements, whether General or Specific, if the agreements are not executed through the One Network Module it is not valid and not enforceable. Users and/or organizations use the same ID and password throughout the ONEIDNET Internet System, so by using the System, each user and/or organization is already able to contact the personnel of One Network directly through our customer support vehicles specified in every Module and in One Network.
</div>






















<div style="float: right">
                     <a href="#top">  <img src="images/backtotop.png"  width="20" height="20" title="top"> </a>
                 </div>


</div>

                <!-- End Right -->
              </div>


            </div>






</body>

</html>